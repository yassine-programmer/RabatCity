@extends("layouts.app")

@section('css')
    <link  href="/css/styleTheme.css" rel="stylesheet">
    <link  href="/css/responsive/responsive.css" rel="stylesheet">
@endsection


@section("content")

    <!-- ****** Welcome Area Start ****** -->
    <section class="fplus-hero-area" style="background-image: url({{$categorie[0]->Categorie_image}})" id="home">
        <div class="hero-content-area d-flex justify-content-end">
            <div class="hero-text">
                <h2>{{$categorie[0]->Categorie_intitule}}</h2>
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
                            <div class="section-heading text-center">
                                <h4>{{$article->Article_titre}}</h4>
                                <div class="section-heading-line"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="about-us-content wow fadeInLeftBig" data-wow-delay="0.5">
                        <div class="row no-gutters align-items-center">
                            <div class="col-12">
                                <div class="about-us-text wow fadeIn" data-wow-delay="1.5s" data-wow-delay="0.5s" onmouseover="ShowOnHover({{$article->Article_id}});" onmouseleave="Hide({{$article->Article_id}});">
                                    {!! $article->Article_text !!}
                                    @if(Session::get('role')=='admin' || Session::get('role')=='moderator')
                                        <br>
                                        <li class="list-group-item d-none" id="manager_btn_{{$article->Article_id}}">
                                            {!! Form::open([ 'action'=>['ArticlesController@destroy',$article->Article_id],'method' => 'post' ,'class'=>'pull-right hidden','id'=>'form_'.$article->Article_id]) !!}
                                            {{ Form::hidden('_method','DELETE') }}
                                            <button class="btn btn-danger"  onclick="document.getElementById('form_{{$article->Article_id}}').submit();">
                                                <i class="fa fa-trash-o fa-lg"></i> Delete</button>
                                            {!! Form::close() !!}
                                            <a class="btn btn-default btn-sm" id="Edit_btn" href="/articles/{{$article->Article_id}}/edit">
                                                <i class="fa fa-cog"></i> Edit</a>
                                        </li>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- ****** About Us Area end ****** -->
            <!-- ****** new article ****** -->
                <div class="section-heading text-center" style="margin-top: 70px">
                    <h4>Articles Recent</h4>
                    <div class="section-heading-line"></div>
                    <div class="container">
                        <div class="row">
                            <!-- Single Feature -->
                            @php($newArticles = App\Article::where('Article_id','<>',$article->Article_id)->take(3)->get()->sortByDesc('created_at', false))
                            @foreach($newArticles as $newArticle)
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="fplus-single-feature wow fadeInUp" data-wow-delay="1s">
                                    <a href="#">
                                        <img  src="{{$newArticle->Article_image}}"  alt="" style="height: 200px;width:400px; ">
                                    </a>
                                    <div class="feature-title d-flex align-items-center" style="margin-top: 20px">
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
