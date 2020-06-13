
@extends("layouts.app")
@section("content")
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Launch demo modal
    </button>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width: 45%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel">Modifier votre photo de profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center" style="background-color: #d4ecf8;">
                    <img src="https://psdgang.com//wp-content/uploads/2017/04/002.gif" style="width: 50%">
                </div>
                <div class="modal-body text-center bg-light">
                    <div id="upload_form" class="text-center " >
                        <!--  Form::open(['action'=>'ImagesController@store','method'=>'POST','enctype'=>'multipart/form-data']) !!} -->
                        <div class="form-group pt-lg-5 pb-lg-3">
                            {{Form::file('image')}}
                        </div>
                        <br>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    {{Form::submit('Upload',['class'=>'btn btn-primary','formaction'=>'ImagesController@store'])}}
                </div>
            </div>
        </div>
    </div>

@endsection
