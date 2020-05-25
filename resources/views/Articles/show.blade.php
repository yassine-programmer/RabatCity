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
                                <div class="about-us-text wow fadeIn" data-wow-delay="1.5s" data-wow-delay="0.5s" onmouseover="ShowOnHover({{$categorie[0]->Categorie_id}});" onmouseleave="Hide({{$categorie[0]->Categorie_id}});">
                                    {!! $article->Article_text !!}
                                    @if(Session::get('role')=='admin' || Session::get('role')=='moderator')
                                        <br>
                                        <li class="list-group-item d-none" id="manager_btn_{{$categorie[0]->Categorie_id}}">
                                            {!! Form::open([ 'action'=>['ThemesController@destroy',$categorie[0]->Categorie_id],'method' => 'post' ,'class'=>'pull-right hidden','id'=>'form_'.$categorie[0]->Categorie_id]) !!}
                                            {{ Form::hidden('_method','DELETE') }}
                                            <button class="btn btn-danger"  onclick="document.getElementById('form_{{$categorie[0]->Categorie_id}}').submit();">
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

            </section>
            <!-- ****** About Us Area end ****** -->

                
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
