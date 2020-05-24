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
                        <h4>Categories</h4>
                        <div class="section-heading-line"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Single Blog Post Area -->

                    @foreach($articles as $article)
                        <div class="col-12 col-md-6 col-lg-4 mt-5">
                            <div class="fplus-single-blog-area wow fadeInUp" data-wow-delay="0.5s" onmouseover="ShowOnHover({{$theme ?? ''->Theme_id ?? ''}});" onmouseleave="Hide({{$theme ?? ''->Theme_id ?? ''}});">
                                <!-- Blog Thumbnail -->
                                <a href="/articles/{{$article->Article_id}}">
                                    <img  src="{{$article->Article_image}}"  alt="" style="height: 200px;width:400px; "></a>
                                <!-- Blog Content -->

                                <div class="fplus-blog-content">

                                    <a class="text-center" href="/articles/{{$article->Article_id}}"><h4>{{$article->Article_titre}}</h4></a>



                                    <ul class="list-group list-group-flush">
                                        @if(Session::get('role')=='admin' || Session::get('role')=='moderator')
                                            <li class="list-group-item d-none" id="manager_btn_">

                                                {{ Form::hidden('_method','DELETE') }}
                                                <button class="btn btn-danger"  onclick="document.getElementById('form_').submit();">
                                                    <i class="fa fa-trash-o fa-lg"></i> Delete</button>

                                                <a class="btn btn-default btn-sm" id="Edit_btn" href="/themes//edit">
                                                    <i class="fa fa-cog"></i> Edit</a>
                                            </li>
                                        @endif
                                    </ul>

                                </div>

                            </div>
                        </div>
                    @endforeach
                @if(Session::get('role')=='admin' || Session::get('role')=='moderator')

                    <div class="col-12 col-md-6 col-lg-4" style="padding-top: 4%;">
                        <a href="/articles/create/{{$categorie_parent->Categorie_id}}">
                            <div class="fplus-single-blog-area wow fadeInUp add" data-wow-delay="0.5s" style=" border: 3px dashed" >
                                <img src="https://i.imgur.com/AJbD4F6.png" style="width: 120px; margin-top: 50%; margin-bottom: 50%; margin-left: 35%;">
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
