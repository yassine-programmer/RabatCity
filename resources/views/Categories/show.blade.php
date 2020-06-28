@extends("layouts.app")

@section('css')
    <link  href="/css/styleTheme.css" rel="stylesheet">
    <link  href="/css/responsive/responsive.css" rel="stylesheet">
    <link href="/css/add.css" rel="stylesheet">
@endsection


@section("content")

    <!-- ****** Welcome Area Start ****** -->
    <section class="fplus-hero-area" style="background-image: url({{$categorie_parent->Categorie_image}})" id="home">
        <div class="hero-content-area d-flex justify-content-center">
            <div class="hero-text">
                @php($theme = App\Theme::find($categorie_parent->Theme_id))
                <!-- link display -->
                    <a href="/Themes/{{$theme->Theme_type}}">{{$theme->Theme_type}}</a> / <a href="/themes/{{$theme->Theme_id}}">{{$theme->Theme_intitule}}</a> /
                    <!-- showing all categories-->
                    @foreach($l_categories as $l_categorie)
                        <a href="/categories/{{$l_categorie->Categorie_id}}">{{$l_categorie->Categorie_intitule}}</a> /
                    @endforeach
                <h4>{{$categorie_parent->Categorie_intitule}}</h4>
                    <hr>
                <h6 data-toggle="tooltip" data-placement="top" title="{{$categorie_parent->Categorie_description}}">
                    @php($titre = substr($categorie_parent->Categorie_description,0,50))
                    @if(strlen($categorie_parent->Categorie_description)>50){{$titre}}...@else {{$titre}} @endif
                </h6>
                @if(Session::get('role')=='admin' || Session::get('role')=='moderator')
                    <a href="/categories/{{$categorie_parent->Categorie_id}}/create-sous-categorie" class="view-portfolio-btn" id="scrollDown">
                        <i class="fa fa-plus" aria-hidden="true"></i>Creer sous categories</a>
                @endif
            </div>
        </div>
    </section>
    <br>
    <!-- ****** Blog Area Start ****** -->
    <section class="fplus-blog-area bg-gray section-padding-0-120" id="news">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading text-center">
                        <h4>Categories</h4>
                        <div class="section-heading-line"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Single Blog Post Area -->
                @if(count($categories_fils)>0)
                    @foreach($categories_fils as $categorie)
                        <div class="col-12 col-md-6 col-lg-3 mt-5" @if($categorie->Categorie_archiver == 0) style="opacity: 0.4;
                                                                    filter: alpha(opacity=40);" @endif>
                            <div class="fplus-single-blog-area wow fadeInUp" data-wow-delay="0.5s" onmouseover="ShowOnHover({{$categorie->Categorie_id}});" onmouseleave="Hide({{$categorie->Categorie_id}});">
                                <!-- Blog Thumbnail -->
                                <a href="/categories/{{$categorie->Categorie_id}}" data-toggle="tooltip" data-placement="top" title="{{$categorie->Categorie_intitule}}">
                                    <img  src="{{$categorie->Categorie_image}}"  alt="" class="grow" style="height: 200px;width:400px; "></a>
                                <!-- Blog Content -->

                                <div class="fplus-blog-content">

                                    <a class="text-center" href="/categories/{{$categorie->Categorie_id}}" >
                                        <h4 data-toggle="tooltip" data-placement="top" title="{{$categorie->Categorie_intitule}}">
                                            @php($titre = substr($categorie->Categorie_intitule,0,12))
                                            @if(strlen($categorie->Categorie_intitule)>12){{$titre}}...@else {{$titre}} @endif</h4></a>

                                    @php($categories = App\Categorie::where('Cat_id',$categorie->Categorie_id)->take(3)->get())
                                    @php($articles = App\Article::where('Categorie_id',$categorie->Categorie_id)->take(3)->get())
                                    <ul class="list-group list-group-flush">
                                        @for($i=0;$i<3;$i++)
                                            @if(isset($categories[$i]))
                                                <li class="list-group-item"><a href="/categories/{{$categories[$i]->Categorie_id}}" data-toggle="tooltip" data-placement="top" title="{{$categories[$i]->Categorie_intitule}}">
                                                        @php($titre = substr($categories[$i]->Categorie_intitule,0,20))
                                                        @if(strlen($categories[$i]->Categorie_intitule)>20){{$titre}}...@else {{$titre}} @endif
                                                    </a></li>
                                            @elseif(isset($articles[$i]))
                                                <li class="list-group-item">
                                                    <a href="/articles/{{$articles[$i]->Article_id}}" data-toggle="tooltip" data-placement="top" title="{{$articles[$i]->Article_titre}}">
                                                        @php($titre = substr($articles[$i]->Article_titre,0,13))
                                                        @if(strlen($articles[$i]->Article_titre)>13)<i class="fa fa-file" aria-hidden="true"></i>{{$titre}}...
                                                        @else<i class="fa fa-file" aria-hidden="true"></i>{{$titre}} @endif
                                                    </a></li>
                                            @else
                                                <li class="list-group-item"><a href="#">
                                                        ...
                                                    </a></li>
                                            @endif
                                        @endfor
                                        @if(Session::get('role')=='admin' || Session::get('role')=='moderator')
                                            <li class="list-group-item d-none" id="manager_btn_{{$categorie->Categorie_id}}">
                                                <div class="row">
                                                    <a class="col-12 btn btn-outline-secondary btn-sm float-left" id="Edit_btn" href="/categories/{{$categorie->Categorie_id}}/edit">
                                                        <i class="fa fa-cog"></i> Edit</a>
                                                    <a class="col-12 btn btn-outline-danger btn-sm float-righ mt-sm-1" href="/Categoriearchive/{{$categorie->Categorie_id}}" >
                                                        <i class="fa fa-archive" aria-hidden="true"></i>Archiver
                                                    </a>
                                                </div>
                                                <br>
                                                @if(Session::get('role')=='admin')
                                                    <div class="row justify-content-center d-flex">
                                                        <div style="display:none;">
                                                    {!! Form::open([ 'action'=>['CategoriesController@destroy',$categorie->Categorie_id],'method' => 'post' ,'class'=>'pull-right hidden','id'=>'form_'.$categorie->Categorie_id]) !!}
                                                        </div>
                                                    {{ Form::hidden('_method','DELETE') }}
                                                    <button type="button" class="btn btn-danger btn-sm w-100"  onclick="if(confirm('Est-ce que vous voulez supprimer?\r\nCela peut engendrer la supression d autre table'))document.getElementById('form_{{$categorie->Categorie_id}}').submit();">
                                                        <i class="fa fa-trash-o fa-lg"></i> Delete</button>
                                                    {!! Form::close() !!}
                                                        </div>
                                                    @endif
                                            </li>
                                        @endif
                                    </ul>

                                </div>

                            </div>
                        </div>
                    @endforeach
                @endif
                @if(Session::get('role')=='admin' || Session::get('role')=='moderator')
                        <div class="col-12 col-md-6 col-lg-3  mt-5 add justify-content-center d-flex align-items-center justify-content-center" style=" border: 3px dashed">
                            <a href="/categories/{{$categorie_parent->Categorie_id}}/create-sous-categorie">
                                <div class="d-flex align-items-center justify-content-center" >
                                    <img src="https://i.imgur.com/7yPHMCB.png" style="width: 70%">
                                </div>
                            </a>
                        </div>
                @endif
            </div>
        </div>
        <br>
    </section>
    <!-- ****** Blog Area End ****** -->




@endsection


@section('script')
    <script>
        function ShowOnHover($id) {
            var x = document.getElementById('manager_btn_'+$id);

            x.classList.remove('d-none');
            x.classList.add('d-inline');
        }
        function Hide($id){
            var x = document.getElementById('manager_btn_'+$id);
            x.classList.remove('d-inline');
            x.classList.add('d-none');
        }
    </script>
    <!-- Popper js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <!-- All Plugins js -->
    <script type="application/javascript" src="/js/others/plugins.js"></script>
    <!-- Active JS -->
    <script type="application/javascript" src="/js/active.js"></script>
@endsection
