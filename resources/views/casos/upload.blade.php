
<div class="col-md-6">
        <section class="content-header row">
            <h1 class="pull-left">
                Archivos
            </h1>
            <h1 class="pull-right">
                <button id="AddNewUploads" class="btn btn-primary btn-sm pull-right" style="margin-top: -5px;margin-bottom: 5px">Subir</button>
            </h1>
        </section>

        <form action="{{ action('CasoController@upload_files') }}" id="fm_dropzone_main"  enctype="multipart/form-data" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="caso_id" value="{{ $caso->id }}">
            <a id="closeDZ1"><i class="fa fa-times"></i></a>
            <div class="dz-message"><i class="fa fa-cloud-upload"></i><br>Drop files here to upload</div>
        </form>

        <div class="box box-primary">
            <div class="box-body">
                <ul class="files_container">

                </ul>
            </div>
        </div>
</div>

<div class="modal fade" id="EditFileModal" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document" style="width:90%;">
        <div class="modal-content" style="width: 1000px;">
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-times"></i></button>
                <!--<button type="button" class="next"><i class="fa fa-chevron-right"></i></button>
                <button type="button" class="prev"><i class="fa fa-chevron-left"></i></button>-->
                <h4 class="modal-title" id="myModalLabel">File: </h4>
            </div>
            <div class="modal-body p0" style="padding: 0px;">
                <div class="row m0" style="margin:0px;">
                    <div class="col-xs-8 col-sm-8 col-md-8">
                        <div class="fileObject">

                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        {!! Form::open(['class' => 'file-info-form']) !!}
                        <input type="hidden" name="file_id" value="0">
                        <div class="form-group">
                            <label for="filename">File Name</label>
                            <input class="form-control" placeholder="File Name" name="filename" type="text" value="" readonly>
                        </div>
                        <div class="form-group">
                            <label for="url">URL</label>
                            <input class="form-control" placeholder="URL" name="url" type="text" readonly value="" readonly>
                        </div>
                        <div class="form-group">
                            <label for="caption">Label</label>
                            <input class="form-control" placeholder="Caption" name="caption" type="text" value="" readonly>
                        </div>

                        <div class="form-group">
                            <label for="public">Is Public ?</label>
                            {{ Form::checkbox("isPublic", "public", false, []) }}
                            <div class="Switch Ajax Round On" style="vertical-align:top;margin-left:10px;"><div class="Toggle"></div></div>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div><!--.row-->
            </div>
            <div class="modal-footer">
                <a class="btn btn-success" id="downFileBtn" href="">Descargar</a>
                <button type="button" class="btn btn-danger" id="delFileBtn">Borrar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>


@push('custom-scripts')
    <script src="{{ URL::asset('js/dropzone.min.js') }}"></script>
    <script>
        var bsurl = '<?php echo config('app.url');?>';
        var fm_dropzone_main = null;
        var cntFiles = null;
        $(function () {

            fm_dropzone_main = new Dropzone("#fm_dropzone_main", {
                maxFilesize: 2,
                acceptedFiles: "image/*,application/pdf",
                init: function() {
                    this.on("complete", function(file) {
                        this.removeFile(file);
                    });
                    this.on("success", function(file) {
                        console.log("addedfile");
                        console.log(file);
                        loadUploadedFiles();
                    });
                    this.on("error", function(response, error) {
                        alert(error.message);
                    });
                }
            });

            $("#fm_dropzone_main").slideUp();
            $("#AddNewUploads").on("click", function() {
                $("#fm_dropzone_main").slideDown();
            });
            $("#closeDZ1").on("click", function() {
                $("#fm_dropzone_main").slideUp();
            });


            $("body").on("click", "ul.files_container .fm_file_sel", function() {
                var upload = $(this).attr("upload");
                upload = JSON.parse(upload);

                $("#EditFileModal .modal-title").html("File: "+upload.name);
                $(".file-info-form input[name=file_id]").val(upload.id);
                $(".file-info-form input[name=filename]").val(upload.name);
                $(".file-info-form input[name=url]").val(bsurl+'/uploads/files/'+upload.hash+'/'+upload.name);
                $(".file-info-form input[name=caption]").val(upload.caption);
                $("#EditFileModal #downFileBtn").attr("href", bsurl+'/uploads/files/'+upload.hash+'/'+upload.name+"?download=1");


                @if(!config('laraadmin.uploads.private_uploads'))
                if(upload.public == "1") {
                    $(".file-info-form input[name=public]").attr("checked", !0);
                    $(".file-info-form input[name=public]").next().removeClass("On").addClass("Off");
                } else {
                    $(".file-info-form input[name=public]").attr("checked", !1);
                    $(".file-info-form input[name=public]").next().removeClass("Off").addClass("On");
                }
                @endif

                $("#EditFileModal .fileObject").empty();
                if($.inArray(upload.extension, ["jpg", "jpeg", "png", "gif", "bmp"]) > -1) {
                    $("#EditFileModal .fileObject").append('<img src="'+bsurl+'/uploads/files/'+upload.hash+'/'+upload.name+'">');
                    $("#EditFileModal .fileObject").css("padding", "15px 0px");
                } else {
                    switch (upload.extension) {
                        case "pdf":
                            // TODO: Object PDF
                            $("#EditFileModal .fileObject").append('<object width="100%" height="325" data="'+bsurl+'/uploads/files/'+upload.hash+'/'+upload.name+'"></object>');
                            $("#EditFileModal .fileObject").css("padding", "0px");
                            break;
                        default:
                            $("#EditFileModal .fileObject").append('<i class="fa fa-file-text-o"></i>');
                            $("#EditFileModal .fileObject").css("padding", "15px 0px");
                            break;
                    }
                }
                $("#EditFileModal").modal('show');
            });


            $("#EditFileModal #delFileBtn").on("click", function() {
                if(confirm("Borrar imagen "+$(".file-info-form input[name=filename]").val()+" ?")) {
                    $.ajax({
                        url: bsurl + '{{   '/casos/delete_file' }}',
                        method: 'POST',
                        data: $("form.file-info-form").serialize(),
                        success: function( data ) {
                            console.log(data);
                            loadUploadedFiles();
                            $("#EditFileModal").modal('hide');
                        }
                    });
                }
            });

            loadUploadedFiles();
        });
        function loadUploadedFiles() {
            // load folder files
            $.ajax({
                dataType: 'json',
                url: "{{ action('CasoController@uploaded_files', ['caso_id'=>$caso->id]) }}",
                success: function ( json ) {
                    console.log(json);
                    cntFiles = json.uploads;
                    $("ul.files_container").empty();
                    if(cntFiles.length) {
                        for (var index = 0; index < cntFiles.length; index++) {
                            var element = cntFiles[index];
                            var li = formatFile(element);
                            $("ul.files_container").append(li);
                        }
                    } else {
                        $("ul.files_container").html("<div class='text-center text-danger' style='margin-top:40px;'>No Files</div>");
                    }
                }
            });
        }
        function formatFile(upload) {
            var image = '';
            if($.inArray(upload.extension, ["jpg", "jpeg", "png", "gif", "bmp"]) > -1) {
                image = '<img src="'+bsurl+'/uploads/files/'+upload.hash+'/'+upload.name+'">';
            } else {
                switch (upload.extension) {
                    case "pdf":
                        image = '<i class="fa fa-file-pdf-o"></i>';
                        break;
                    default:
                        image = '<i class="fa fa-file-text-o"></i>';
                        break;
                }
            }
            return '<li><a class="fm_file_sel" data-toggle="tooltip" data-placement="top" title="'+upload.name+'" upload=\''+JSON.stringify(upload)+'\'> '+image+upload.name+'</a></li>';
        }
    </script>
@endpush


<style>
    #fm_dropzone_main {
        border: 1px dashed #0087F7;
        border-radius: 5px;
        background: white;
        text-align: center;
        margin-top: 15px;
        margin-bottom: 15px;
        min-height: 100px;
        padding: 8px;
        vertical-align: middle;
        cursor: pointer;
    }

    #fm_dropzone_main div.dz-message i.fa {
        font-size: 40px;
    }

    #fm_dropzone_main #closeDZ1 {
        display: block;
        position: relative;
        width: 10px;
        float: right;
        margin-top: -2px;
        margin-right: 2px;
    }

    #fm_dropzone_main div.dz-message {
        display: block;
        padding: 20px 0px;
    //color: #999;
    }

    #EditFileModal .fileObject img {
        max-width: 100%;
        max-height: 300px;
    }

    .files_container li a img {
        max-width: 33%;
        max-height: 300px;
    }

    #EditFileModal .file-info-form {
        padding: 10px;
        height: 330px;
        background: #f3f3f3;
        border-left: solid 1px #ddd;
        margin-bottom:0px;
    }

    .p0 {
        padding: 0px;
    }

    .modal-content {
        position: relative;
        background-color: #fff;
        border: 1px solid #999;
        border: 1px solid rgba(0, 0, 0, 0.2);
        border-radius: 6px;
        box-shadow: 0 3px 9px rgba(0, 0, 0, 0.5);
        background-clip: padding-box;
        outline: 0;
    }

    #EditFileModal .modal-header h4.modal-title {
        padding: 13px 15px;
    }


    #EditFileModal .modal-header {
        padding: 0px;
        border-bottom-color: #ddd;
    }

    #EditFileModal label {
        font-size: 10px;

    }

    #EditFileModal .modal-header button {
        float: right;
        padding: 15px;
        background: #FFF;
        border: 0px;
        border-left-width: 0px;
        border-left-style: none;
        border-left-color: currentcolor;
        border-left: solid 1px #ddd;
        text-align: center;
        width: 50px;
        height: 51px;
        margin-top: 0px;
        font-size: 17px;
        color: #d6d6d6;
        opacity: 1;
    }

    #EditFileModal .col-xs-8, #EditFileModal .col-xs-4 {
        padding: 0px;
    }

    .m0 {
        margin: 0px;
    }

</style>