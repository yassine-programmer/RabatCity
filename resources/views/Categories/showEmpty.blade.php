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
                    <a href="/categories/{{$categorie_parent->Categorie_id}}/create-sous-categorie" class="view-portfolio-btn" id="scrollDown">
                        <i class="fa fa-plus" aria-hidden="true"></i>Creer sous categories</a>
                <br>
                    <a href="/articles/create/{{$categorie_parent->Categorie_id}}" class="view-portfolio-btn" id="scrollDown">
                        <i class="fa fa-plus" aria-hidden="true"></i>Creer article</a>
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

                @if(Session::get('role')=='admin' || Session::get('role')=='moderator')
                    <div class="col-12 col-md-6 col-lg-4" style="padding-top: 4%;">
                        <a href="/categories/{{$categorie_parent->Categorie_id}}/create-sous-categorie">
                        <div class="fplus-single-blog-area wow fadeInUp add" data-wow-delay="0.5s" style=" border: 3px dashed" >
                            <img src="https://i.imgur.com/7yPHMCB.png" style="width: 120px; margin-top: 50%; margin-bottom: 50%; margin-left: 29%;">
                        </div>
                        </a>
                    </div>
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
