<div id="themes" style="margin-top: 30px;">
    @php($Themes = \Illuminate\Support\Facades\DB::select("select * from themes where Theme_archiver=0 order by created_at desc"))
    @if(count($Themes)>0)
    <div class="pb-4" style="width: 700px!important;margin-top: 30px!important;">

            @foreach($Themes as $Theme)
            <div class="container row  grow" data-wow-delay="0.5s" onmouseover="ShowOnHover({{$Theme->Theme_id}});" onmouseleave="Hide({{$Theme->Theme_id}});"  style="border: 1px solid #a6a6a6!important;
                                                box-shadow: 1px 1px 12px #a6a6a6;" >
                <div class="col-4" >
                    <a href="/themes/{{$Theme->Theme_id}}">
                        <img  src="{{$Theme->Theme_image}}"  alt="" style="height: 100px;width:250px;margin-left: -59px;
                                                border-right:1px solid #ccc!important;
                                                border-left:1px solid #ccc!important;
                                              box-shadow: 1px 1px 5px #b8b894;" ></a>
                </div>
                <div class="col-8 d-flex align-items-center justify-content-start " >
                    <a class="text-left" href="/themes/{{$Theme->Theme_id}}"><h4>{{$Theme->Theme_intitule}}</h4></a>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-md-4">
                    <ul class="row" data-wow-delay="0.5s" onmouseover="ShowOnHover({{$Theme->Theme_id}});" onmouseleave="Hide({{$Theme->Theme_id}});">
                        <li class=" list-group-item d-none" id="manager_btn_{{$Theme->Theme_id}}">
                            <a class="col-12 btn btn-outline-secondary btn-sm ml-sm-1 border-0" id="Edit_btn" href="/themes/{{$Theme->Theme_id}}/edit">
                                <i class="fa fa-cog"></i> Edit</a>
                            <a class=" col-12 btn btn-outline-danger btn-sm ml-sm-1 border-0" href="/Themearchive/{{$Theme->Theme_id}}" >
                                <i class="fa fa-archive" aria-hidden="true"></i>Archiver
                            </a>
                            @if(Session::get('role')=='admin')
                                <div style="display: none;">
                                    {!! Form::open([ 'action'=>['ThemesController@destroy',$Theme->Theme_id],'method' => 'post' ,'class'=>'pull-right hidden','id'=>'form_'.$Theme->Theme_id]) !!}
                                </div>
                                 {{ Form::hidden('_method','DELETE') }}
                                <button type="button" class="btn btn-danger btn-sm w-100" style="margin-left: 4px!important;"  onclick="if(confirm('Est-ce que vous voulez supprimer?\r\nCela peut engendrer la supression d autre table'))document.getElementById('form_{{$Theme->Theme_id}}').submit();">
                                    <i class="fa fa-trash-o fa-lg"></i> Delete</button>
                                {!! Form::close() !!}
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
                @endforeach
    </div>
    @else
        <br>
        <div class="alert alert-info">
            <strong>Info!</strong> Aucun theme est archivé.
        </div>
    @endif
</div>