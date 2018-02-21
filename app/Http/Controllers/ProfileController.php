<?php

namespace App\Http\Controllers;

use App\DataTables\ProfileDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateProfileRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\UpdatePersonalProfileRequest;
use App\Repositories\ProfileRepository;
use App\User;
use Flash;
use Alert;
use App\Http\Controllers\AppBaseController;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Response;
use Illuminate\Support\Facades\Auth;

class ProfileController extends AppBaseController
{
    /** @var  ProfileRepository */
    private $profileRepository;

    public function __construct(ProfileRepository $profileRepo)
    {
        $this->profileRepository = $profileRepo;
    }

    /**
     * Display a listing of the Profile.
     *
     * @param ProfileDataTable $profileDataTable
     * @return Response
     */
    public function index(ProfileDataTable $profileDataTable)
    {
        return $profileDataTable->render('profiles.index');
    }

    /**
     * Show the form for creating a new Profile.
     *
     * @return Response
     */
    public function create()
    {
        $users = \DB::table('users')->pluck('email', 'id');
        return view('profiles.create')->with('users', $users);
    }

    /**
     * Store a newly created Profile in storage.
     *
     * @param CreateProfileRequest $request
     *
     * @return Response
     */
    public function store(CreateProfileRequest $request)
    {
        //
        $input = $request->all();

        $profile = $this->profileRepository->create($input);

        Flash::success('Profile saved successfully.');

        return redirect(route('profiles.index'));
    }

    /**
     * Display the specified Profile.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $profile = $this->profileRepository->findWithoutFail($id);

        if (empty($profile)) {
            Flash::error('Profile not found');

            return redirect(route('profiles.index'));
        }

        return view('profiles.show')->with('profile', $profile);
    }

    /**
     * Show the form for editing the specified Profile.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $profile = $this->profileRepository->findWithoutFail($id);

        if (empty($profile)) {
            Flash::error('Profile not found');

            return redirect(route('profiles.index'));
        }

        // The user is logged in...
        // Check user ID
        $id_user = Auth::id();
        /*
         * we obtain from table users the user with id $id, we use get and then pluck to
         * transform to a collection values email and id
        */
        $users = \DB::table('users')->where('id', $id_user)->get()->pluck('email', 'id');

        return view('profiles.edit')->with(compact('profile','users'));
    }

    /**
     * Update the specified Profile in storage.
     *
     * @param  int              $id
     * @param UpdateProfileRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProfileRequest $request)
    {
        $profile = $this->profileRepository->findWithoutFail($id);

        if (empty($profile)) {
            Flash::error('Profile not found');

            return redirect(route('profiles.index'));
        }

        $profile = $this->profileRepository->update($request->all(), $id);

        Flash::success('Profile updated successfully.');

        return redirect(route('profiles.index'));
    }

    /**
     * Remove the specified Profile from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $profile = $this->profileRepository->findWithoutFail($id);

        if (empty($profile)) {
            Flash::error('Profile not found');

            return redirect(route('profiles.index'));
        }

        $this->profileRepository->delete($id);

        Flash::success('Profile deleted successfully.');

        return redirect(route('profiles.index'));
    }

    /**
     * Show the form for creating a new Profile or updating a created one (always personal).
     *
     * @return Response
     */
    public function personalProfile()
    {
            // The user is logged in...
            // Check user ID
            $id = Auth::id();
            $profile = $this->profileRepository->findByField('users_id',$id);

            /*
             * we obtain from table users the user with id $id, we use get and then pluck to
             * transform to a collection values email and id
            */
            $users = \DB::table('users')->where('id', $id)->get()->pluck('email', 'id');

            if (!isset($profile[0])) {
                return view('profiles.create-personal')->with('users', $users);
            }else{
                $profile = $profile[0];
            }

            return view('profiles.personalProfile')->with(compact('profile','users'));

    }

    /**
     * Update the personal Profile in storage.
     *
     * @param  int              $id
     * @param UpdatePersonalProfileRequest $request
     *
     * @return Response
     */
    public function updatePersonalProfile($id, UpdatePersonalProfileRequest $request)
    {
        $profile = $this->profileRepository->findWithoutFail($id);

        if (empty($profile)) {
            Flash::error('Profile not found');

            return redirect(route('profiles.personal-profile'));
        }
        // Check user ID
        $id_auth = Auth::id();

        if($profile->users_id != $id_auth){
            Alert::success(trans('backpack::base.user_profile_different'))->flash();
            return redirect(route('profiles.personal-profile'));
        }

        $profile = $this->profileRepository->update($request->except('users_id', 'rut', 'fechaNacimiento') , $id);
        Alert::success(trans('backpack::base.profile_updated'))->flash();
        //Flash::success('Profile updated successfully.');

        return redirect(route('profiles.personal-profile'));
    }

}
