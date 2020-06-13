
<!-- Modal -->
<div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width: 45%;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLabel">Modifier votre photo de profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center" style="background-color: #d4ecf8;">

                <a class="text-white bg-transparent" onclick="document.getElementById('fileupload').click()" style="padding: 15%">
                    <img  id="picpreview" src="{{$user->image}}" class="profilepic2 mb-5 mt-5" >
                </a>
            </div>
            <div class="modal-body text-center bg-light">
                <div id="upload_form" class="text-center " >
                    {!! Form::open(['action'=>'ImagesController@store','method'=>'POST','enctype'=>'multipart/form-data']) !!}
                    <div class="form-group pt-lg-5 pb-lg-3">
                        {{Form::file('image',['id'=>'fileupload','accept'=>'image/*'])}}
                    </div>
                    <br>
                    <small><b>Taille max : 2Mo</b></small>
                    <br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    {{Form::submit('Upload',['class'=>'btn btn-primary','formaction'=>'images'])}}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#picpreview').attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }

    $("#fileupload").change(function() {
        readURL(this);
    });
</script>
