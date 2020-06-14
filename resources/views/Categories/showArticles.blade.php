@extends("layouts.app")

@section('css')
    <link  href="/css/styleTheme.css" rel="stylesheet">
    <link  href="/css/responsive/responsive.css" rel="stylesheet">
    <link href="/css/add.css" rel="stylesheet">
@endsection


@section("content")

    <!-- ****** Welcome Area Start ****** -->
    <section class="fplus-hero-area" style="background-image: url({{$categorie_parent->Categorie_image}})" id="home">
        <div class="hero-content-area d-flex justify-content-end">
            <div class="hero-text">
                @php($theme = App\Theme::find($categorie_parent->Theme_id))
                <!-- link display -->
                     <a href="/Themes/{{$theme->Theme_type}}">{{$theme->Theme_type}}</a> / <a href="/themes/{{$theme->Theme_id}}">{{$theme->Theme_intitule}}</a> /
                    <!-- showing all categories-->
                    @foreach($l_categories as $l_categorie)

                        <a href="/categories/{{$l_categorie->Categorie_id}}">{{$l_categorie->Categorie_intitule}}</a> /
                    @endforeach
                <h2>{{$categorie_parent->Categorie_intitule}}</h2>
                <h5>{{$categorie_parent->Categorie_description}}</h5>
                @if(Session::get('role')=='admin' || Session::get('role')=='moderator')
                    <a href="/articles/create/{{$categorie_parent->Categorie_id}}" class="view-portfolio-btn" id="scrollDown">
                        <i class="fa fa-plus" aria-hidden="true"></i>Ajouter article</a>
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
                        <h4>Articles</h4>
                        <div class="section-heading-line"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Single Blog Post Area -->
                @if(count($articles)==1)
                    @php(header('Location: /Articles/'.$articles[0]->Article_id))
                    @php(exit())
                    @endif
                    @foreach($articles as $article)
                        <div class="col-12 col-md-6 col-lg-4 mt-5" @if($article->Article_archiver == 0) style="opacity: 0.4;
                                                                    filter: alpha(opacity=40);" @endif>
                            <div class="fplus-single-blog-area wow fadeInUp" data-wow-delay="0.5s" onmouseover="ShowOnHover({{$article->Article_id}});" onmouseleave="Hide({{$article->Article_id}});">
                                <!-- Blog Thumbnail -->
                                <a href="/Articles/{{$article->Article_id}}">
                                    <img  src="{{$article->Article_image}}"  alt="" class="grow" style="height: 200px;width:400px; "></a>
                                <!-- Blog Content -->
                                <div class="fplus-blog-content">
                                    <a class="text-center" href="/Articles/{{$article->Article_id}}"><h4>{{$article->Article_titre}}</h4></a>
                                    <ul class="list-group list-group-flush">
                                        @if(Session::get('role')=='admin' || Session::get('role')=='moderator')
                                            <li class="list-group-item d-none" id="manager_btn_{{$article->Article_id}}">
                                                <a class="btn btn-outline-secondary btn-sm float-left" id="Edit_btn" href="/articles/{{$article->Article_id}}/edit">
                                                    <i class="fa fa-cog"></i> Edit</a>
                                                <a class="btn btn-outline-danger btn-sm ml-sm-1"href="/Articlearchive/{{$article->Article_id}}" >
                                                    <i class="fa fa-archive" aria-hidden="true"></i>Archiver
                                                </a>
                                                @if(Session::get('role')=='admin')
                                                    {!! Form::open([ 'action'=>['ArticlesController@destroy',$article->Article_id],'method' => 'post' ,'class'=>'pull-right hidden','id'=>'form_'.$article->Article_id]) !!}
                                                    {{ Form::hidden('_method','DELETE') }}
                                                    <button type="button" class="btn btn-danger btn-sm"  onclick="if(confirm('Est-ce que vous voulez supprimer?\r\nCela peut engendrer la supression d autre table'))document.getElementById('form_{{$article->Article_id}}').submit();">
                                                        <i class="fa fa-trash-o fa-lg"></i> Delete</button>
                                                    {!! Form::close() !!}
                                                    @endif
                                            </li>
                                        @endif
                                    </ul>

                                </div>

                            </div>
                        </div>
                    @endforeach
                @if(Session::get('role')=='admin' || Session::get('role')=='moderator')

                    <div class="col-12 col-md-6 col-lg-4 mt-5 add justify-content-center d-flex align-items-center justify-content-center" style=" border: 3px dashed">
                        <a href="/articles/create/{{$categorie_parent->Categorie_id}}">
                            <div class="d-flex align-items-center justify-content-center" >
                                <img src="https://i.imgur.com/AJbD4F6.png" style="width: 50%">
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
