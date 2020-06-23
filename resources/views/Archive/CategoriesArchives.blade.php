@if(Session::get('role')=='admin' || Session::get('role')=='moderator')
<div class="d-none" id="categories" style="margin-top: 30px;">
    @php($Categories = \Illuminate\Support\Facades\DB::select("select * from categories where Categorie_archiver=0 order by created_at desc"))
    @if(count($Categories)>0)
        <div class="pb-4" style="width: 700px!important;margin-top: 30px!important;">

            @foreach($Categories as $categorie)
                <div class="container row  grow" data-wow-delay="0.5s" onmouseover="ShowOnHover({{$categorie->Categorie_id}});" onmouseleave="Hide({{$categorie->Categorie_id}});"  style="border: 1px solid #a6a6a6!important;
                                                box-shadow: 1px 1px 12px #a6a6a6;" >
                    <div class="col-4" >
                        <a href="/categories/{{$categorie->Categorie_id}}">
                            <img  src="{{$categorie->Categorie_image}}"  alt="" style="height: 100px;width:250px;margin-left: -59px;
                                                border-right:1px solid #ccc!important;
                                                border-left:1px solid #ccc!important;
                                              box-shadow: 1px 1px 5px #b8b894;" ></a>
                    </div>
                    <div class="col-8 d-flex align-items-center justify-content-start " >
                        <a class="text-left" href="/categories/{{$categorie->Categorie_id}}"><h4>{{$categorie->Categorie_intitule}}</h4></a>
                    </div>
                </div>
                <div class="row justify-content-md-center">
                    <div class="col-md-4">
                        <ul class="row" data-wow-delay="0.5s" onmouseover="ShowOnHover({{$categorie->Categorie_id}});" onmouseleave="Hide({{$categorie->Categorie_id}});">
                            <li class=" list-group-item d-none" id="manager_btn_{{$categorie->Categorie_id}}">
                                <a class="col-12 btn btn-outline-secondary btn-sm ml-sm-1 border-0" id="Edit_btn" href="/categories/{{$categorie->Categorie_id}}/edit">
                                    <i class="fa fa-cog"></i> Edit</a>
                                <a class=" col-12 btn btn-outline-danger btn-sm ml-sm-1 border-0" href="/Categoriearchive/{{$categorie->Categorie_id}}" >
                                    <i class="fa fa-archive" aria-hidden="true"></i>Desarchiver
                                </a>
                                @if(Session::get('role')=='admin')
                                    <div style="display: none;">
                                        {!! Form::open([ 'action'=>['CategoriesController@destroy',$categorie->Categorie_id],'method' => 'post' ,'class'=>'pull-right hidden','id'=>'form_'.$categorie->Categorie_id]) !!}
                                    </div>
                                    {{ Form::hidden('_method','DELETE') }}
                                    <button type="button" class="btn btn-danger btn-sm w-100" style="margin-left: 4px!important;"  onclick="if(confirm('Est-ce que vous voulez supprimer?\r\nCela peut engendrer la supression d autre table'))document.getElementById('form_{{$categorie->Categorie_id}}').submit();">
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
            <strong>Info!</strong> Aucune categorie est archivé.
        </div>
    @endif
</div>
@else
    @include('errors.404')
@endif
