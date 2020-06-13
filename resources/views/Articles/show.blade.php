    @extends("layouts.app")

@section('css')
    <link  href="/css/styleTheme.css" rel="stylesheet">
    <link  href="/css/responsive/responsive.css" rel="stylesheet">
@endsection


@section("content")

    <!-- ****** Welcome Area Start ****** -->
    <section class="fplus-hero-area" style="background-image: url({{$categorie[0]->Categorie_image}})" id="home">
        <div class="hero-content-area d-flex justify-content-center">
            <div class="hero-text">
                @php($testArticles = \Illuminate\Support\Facades\DB::select("select * from articles where Categorie_id = ".$categorie[0]->Categorie_id.""))
                @if(count($testArticles) > 1)
                    @php($theme = App\Theme::find($categorie[0]->Theme_id))
                <!-- link display -->
                    <a href="/Themes/{{$theme->Theme_type}}">{{$theme->Theme_type}}</a> / <a href="/themes/{{$theme->Theme_id}}">{{$theme->Theme_intitule}}</a> /
                    <!-- showing all categories-->
                    @foreach($l_categories as $l_categorie)

                        <a href="/categories/{{$l_categorie->Categorie_id}}">{{$l_categorie->Categorie_intitule}}</a> /
                    @endforeach
                @else
                    @if(empty($categorie[0]->Cat_id))
                        <h2>
                            <a href="/themes/{{$categorie[0]->Theme_id}}">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i>{{$categorie[0]->Categorie_intitule}}
                            </a>
                        </h2>
                    @else
                        <h2>
                            <a href="/categories/{{$categorie[0]->Cat_id}}">
                                <i class="fa fa-arrow-left" aria-hidden="true"></i>{{$categorie[0]->Categorie_intitule}}
                            </a>
                        </h2>
                        @endif
                @endif


                    <h5>{{$categorie[0]->Categorie_description}}</h5>
                @if(Session::get('role')=='admin' || Session::get('role')=='moderator')
                    <a href="/articles/create/{{$categorie[0]->Categorie_id}}" class="view-portfolio-btn" id="scrollDown">
                        <i class="fa fa-plus" aria-hidden="true"></i>Creer un nouveau Article</a>
                @endif
            </div>
        </div>
    </section>
    <br>
    <!-- ****** About Us Area Start ****** -->
            <section class="fplus-about-us-area bg-gray section-padding-120" id="about">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-heading text-center grow">
                                <h4>{{$article->Article_titre}}</h4>
                                <div class="section-heading-line"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="about-us-content wow fadeInLeftBig" data-wow-delay="0.5" @if($article->Article_archiver == 0) style="opacity: 0.4;
                                                                    filter: alpha(opacity=40);" @endif >
                        <div class="row no-gutters align-items-center" style="border-bottom:1px solid #ccc!important;
                                                                                box-shadow: 1px 1px 50px #b8b894;">
                            <div class="col-12">
                                <div class="about-us-text wow fadeIn" data-wow-delay="1.5s" data-wow-delay="0.5s" onmouseover="ShowOnHover({{$article->Article_id}});" onmouseleave="Hide({{$article->Article_id}});">
                                    {!! $article->Article_text !!}
                                    <hr>
                                    <p class="text-right">Publier le -  {{$article->created_at}}</p>
                                    <br>
                                    <p class="text-right"><i class="fa fa-eye" aria-hidden="true"></i>
                                        {{$article->Article_vue}}</p>
                                    @if(Session::get('role')=='admin' || Session::get('role')=='moderator')
                                        <br>
                                        <li class="list-group-item d-none" id="manager_btn_{{$article->Article_id}}">
                                            {!! Form::open([ 'action'=>['ArticlesController@destroy',$article->Article_id],'method' => 'post' ,'class'=>'pull-right hidden','id'=>'form_'.$article->Article_id]) !!}
                                            {{ Form::hidden('_method','DELETE') }}
                                            <button class="btn btn-danger btn-sm"  onclick="document.getElementById('form_{{$article->Article_id}}').submit();">
                                                <i class="fa fa-trash-o fa-lg"></i> Delete</button>
                                            {!! Form::close() !!}
                                            <a class="btn btn-default btn-sm" id="Edit_btn" href="/articles/{{$article->Article_id}}/edit">
                                                <i class="fa fa-cog"></i> Edit</a>
                                            <a class="btn btn-default btn-sm"href="/Articlearchive/{{$article->Article_id}}" >
                                                <i class="fa fa-archive" aria-hidden="true"></i>Archivé
                                            </a>
                                        </li>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- ****** About Us Area end ****** -->
            <!-- Banner-->
                <div class="weekly3-news-area pt-80 pb-130 fixed-bg-img1" style="margin-top: 70px">
                    <div class="container" >
                        <div class="weekly3-wrapper">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="slider-wrapper" style="height: 200px">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- Banner-->
            <!-- ****** new article ****** -->
                <div class="section-heading text-center" style="margin-top: 70px">
                    <div class="grow">
                        <h4>Articles Recent</h4>
                        <div class="section-heading-line"></div>
                    </div>

                    <div class="container">
                        <div class="row">
                            <!-- Single Feature -->
                            @php($newArticles = \Illuminate\Support\Facades\DB::select("select * from articles where Article_id <> ".$article->Article_id." and Article_archiver = 1 order by created_at desc LIMIT 3"))
                            @foreach($newArticles as $newArticle)
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="fplus-single-feature wow fadeInUp grow" data-wow-delay="1s"
                                     style="border-bottom:1px solid #ccc!important;
                                            box-shadow: 1px 1px 12px #b8b894;">
                                    <a href="#">
                                        <img  src="{{$newArticle->Article_image}}"  alt="" style="height: 200px;width:400px; ">
                                    </a>
                                    <div class="feature-title d-flex align-items-center text-center" style="margin-top: 20px">
                                        <h5>{{$newArticle->Article_titre}}</h5>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <!-- Single Feature -->
                        </div>
                    </div>
                </div>
            </section>
                <!-- ****** new article end ****** -->


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
