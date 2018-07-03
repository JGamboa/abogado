<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUploadRequest;
use App\Http\Requests\UpdateUploadRequest;
use App\Repositories\UploadRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Illuminate\Support\Facades\Input;
use Response;
use App\Models\Upload;
use File;
use Illuminate\Support\Facades\Response as FacadeResponse;
use Illuminate\Support\Facades\Auth;

class UploadController extends AppBaseController
{
    /** @var  UploadRepository */
    private $uploadRepository;

    public function __construct(UploadRepository $uploadRepo)
    {
        $this->uploadRepository = $uploadRepo;
    }

    /**
     * Display a listing of the Upload.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->uploadRepository->pushCriteria(new RequestCriteria($request));
        $uploads = $this->uploadRepository->all();

        return view('uploads.index')
            ->with('uploads', $uploads);
    }

    /**
     * Show the form for creating a new Upload.
     *
     * @return Response
     */
    public function create()
    {
        return view('uploads.create');
    }

    /**
     * Store a newly created Upload in storage.
     *
     * @param CreateUploadRequest $request
     *
     * @return Response
     */
    public function store(CreateUploadRequest $request)
    {
        $input = $request->all();

        $upload = $this->uploadRepository->create($input);

        Flash::success('Upload saved successfully.');

        return redirect(route('uploads.index'));
    }

    /**
     * Display the specified Upload.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $upload = $this->uploadRepository->findWithoutFail($id);

        if (empty($upload)) {
            Flash::error('Upload not found');

            return redirect(route('uploads.index'));
        }

        return view('uploads.show')->with('upload', $upload);
    }

    /**
     * Show the form for editing the specified Upload.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $upload = $this->uploadRepository->findWithoutFail($id);

        if (empty($upload)) {
            Flash::error('Upload not found');

            return redirect(route('uploads.index'));
        }

        return view('uploads.edit')->with('upload', $upload);
    }

    /**
     * Update the specified Upload in storage.
     *
     * @param  int              $id
     * @param UpdateUploadRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUploadRequest $request)
    {
        $upload = $this->uploadRepository->findWithoutFail($id);

        if (empty($upload)) {
            Flash::error('Upload not found');

            return redirect(route('uploads.index'));
        }

        $upload = $this->uploadRepository->update($request->all(), $id);

        Flash::success('Upload updated successfully.');

        return redirect(route('uploads.index'));
    }

    /**
     * Remove the specified Upload from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $upload = $this->uploadRepository->findWithoutFail($id);

        if (empty($upload)) {
            Flash::error('Upload not found');

            return redirect(route('uploads.index'));
        }

        $this->uploadRepository->delete($id);

        Flash::success('Upload deleted successfully.');

        return redirect(route('uploads.index'));
    }

    /**
     * Get file
     *
     * @return \Illuminate\Http\Response
     */
    public function get_file($hash, $name)
    {
        $upload = Upload::where("hash", $hash)->first();

        // Validate Upload Hash & Filename
        if(!isset($upload->id) || $upload->name != $name) {
            return response()->json([
                'status' => "failure",
                'message' => "Unauthorized Access 1"
            ]);
        }

        if($upload->isPublic == 1) {
            $upload->isPublic = true;
        } else {
            $upload->isPublic = false;
        }

        // Validate if Image is Public
        if(!$upload->isPublic && !isset(Auth::user()->id)) {
            return response()->json([
                'status' => "failure",
                'message' => "Unauthorized Access 2",
            ]);
        }

            $path = $upload->path;
            $folder = storage_path('uploads');

            if(!File::exists($folder.DIRECTORY_SEPARATOR.$path))
                abort(404);


            // Check if thumbnail
            $size = Input::get('s');
            if(isset($size)) {
                if(!is_numeric($size)) {
                    $size = 150;
                }
                /*$thumbpath = storage_path("thumbnails/".basename($upload->path)."-".$size."x".$size);

                if(File::exists($thumbpath)) {
                    $path = $thumbpath;
                } else {
                    // Create Thumbnail
                    LAHelper::createThumbnail($upload->path, $thumbpath, $size, $size, "transparent");
                    $path = $thumbpath;
                }*/
            }

            $file = File::get($folder.DIRECTORY_SEPARATOR.$path);
            $type = File::mimeType($folder.DIRECTORY_SEPARATOR.$path);
            $download = Input::get('download');
            if(isset($download)) {
                return response()->download($folder.DIRECTORY_SEPARATOR.$path, $upload->name);
            } else {
                $response = FacadeResponse::make($file, 200);
                $response->header("Content-Type", $type);
            }

            return $response;

    }

    /**
     * Upload fiels via DropZone.js
     *
     * @return \Illuminate\Http\Response
     */
    public function upload_files() {

        $input = Input::all();

        if(Input::hasFile('file')) {
            /*
            $rules = array(
                'file' => 'mimes:jpg,jpeg,bmp,png,pdf|max:3000',
            );
            $validation = Validator::make($input, $rules);
            if ($validation->fails()) {
                return response()->json($validation->errors()->first(), 400);
            }
            */
            $file = Input::file('file');

            $folder = storage_path('uploads');
            $filename = $file->getClientOriginalName();

            $date_append = date("Y-m-d-His-");
            $upload_success = Input::file('file')->move($folder, $date_append.$filename);

            if( $upload_success ) {

                // Get public preferences
                // config("laraadmin.uploads.default_public")
                $public = Input::get('public');
                if(isset($public)) {
                    $public = true;
                } else {
                    $public = false;
                }

                $upload = Upload::create([
                    "name" => $filename,
                    "path" => $folder.DIRECTORY_SEPARATOR.$date_append.$filename,
                    "extension" => pathinfo($filename, PATHINFO_EXTENSION),
                    "caption" => "",
                    "hash" => "",
                    "isPublic" => $public,
                    "empleado_id" => null,
                ]);
                // apply unique random hash to file
                while(true) {
                    $hash = strtolower(str_random(20));
                    if(!Upload::where("hash", $hash)->count()) {
                        $upload->hash = $hash;
                        break;
                    }
                }
                $upload->save();

                return response()->json([
                    "status" => "success",
                    "upload" => $upload
                ], 200);
            } else {
                return response()->json([
                    "status" => "error"
                ], 400);
            }
        } else {
            return response()->json('error: upload file not found.', 400);
        }
    }

    /**
     * Get all files from uploads folder
     *
     * @return \Illuminate\Http\Response
     */
    public function uploaded_files()
    {
        $uploads = array();

        $uploads = Upload::all();
        // print_r(Auth::user()->roles);
        /*if(Entrust::hasRole('SUPER_ADMIN')) {
            $uploads = Upload::all();
        } else {
            if(config('laraadmin.uploads.private_uploads')) {
                // Upload::where('user_id', 0)->first();
                $uploads = Auth::user()->uploads;
            } else {
                $uploads = Upload::all();
            }
        }*/
        $uploads2 = array();
        foreach ($uploads as $upload) {
            $u = (object) array();
            $u->id = $upload->id;
            $u->name = $upload->name;
            $u->extension = $upload->extension;
            $u->hash = $upload->hash;
            $u->public = $upload->public;
            $u->caption = $upload->caption;
            $u->user = isset($upload->user->nombres) ? $upload->user->nombres : '';

            $uploads2[] = $u;
        }

        // $folder = storage_path('/uploads');
        // $files = array();
        // if(file_exists($folder)) {
        //     $filesArr = File::allFiles($folder);
        //     foreach ($filesArr as $file) {
        //         $files[] = $file->getfilename();
        //     }
        // }
        // return response()->json(['files' => $files]);
        return response()->json(['uploads' => $uploads2]);
    }
}
