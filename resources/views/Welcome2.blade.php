@extends("layouts.app")
@section('css')
    <!-- CSS here -->
    <link href="/css/add.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets/css/ticker-style.css">
    <link rel="stylesheet" href="/assets/css/flaticon.css">
    <link rel="stylesheet" href="/assets/css/slicknav.css">
    <link rel="stylesheet" href="/assets/css/animate.min.css">
    <link rel="stylesheet" href="/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="/assets/css/themify-icons.css">
    <link rel="stylesheet" href="/assets/css/slick.css">
    <link rel="stylesheet" href="/assets/css/nice-select.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/css/form/util.css">
    <link rel="stylesheet" type="text/css" href="/css/form/main.css">
    <!-- RECAPTCHA-->
    <script src="https://www.google.com/recaptcha/api.js"></script>



@endsection
@section("content")
<!-- Preloader Start
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="preloader-circle"></div>
            <div class="preloader-img pere-text">
                <img src="assets/img/logo/logo.png" alt="">
            </div>
        </div>
    </div>
</div>
<-- Preloader Start -->

<main>
    <!-- Trending Area Start -->
    <div class="trending-area fix pt-25" style="background-color: #f9f9f9">
        <div class="container" style="background-color: #f9f9f9">
            <div class="trending-main" style="background-color: #f9f9f9">
                <div class="row">
                    <div class="col-lg-8">
                        <!-- Trending Top -->
                        <div class="slider-active">
                            <!-- Single -->
                            @php($newArticle = \Illuminate\Support\Facades\DB::select("select * from articles where Categorie_id in (select Categorie_id from categories where Theme_id in (select Theme_id from themes where Theme_type = 'actualites'))order by created_at desc LIMIT 1"))
                            @if(count($newArticle)==1)
                            <div class="single-slider">
                                <div class="trending-top mb-30 " >
                                    <div class="trend-top-img imgHome1"  style="border:1px solid #ccc!important;
                                                              border-bottom: 0;
                                                              box-shadow: 5px 6px 12px #b8b894;">
                                        <a href="/Articles/{{$newArticle[0]->Article_id}}">
                                        <img src="{{$newArticle[0]->Article_image}}" alt="" style="height: 680px; object-fit: ">
                                        </a>
                                        <div class="trend-top-cap">
                                            <span class="bgr" data-animation="fadeInUp" data-delay=".2s" data-duration="1000ms">News</span>
                                            <h2><a class="homeTitle" href="/Articles/{{$newArticle[0]->Article_id}}" data-animation="fadeInUp" data-delay=".4s" data-duration="1000ms">{{$newArticle[0]->Article_titre}}</a></h2>
                                            <p data-animation="fadeInUp" data-delay=".6s" data-duration="1000ms">Posted - {{$newArticle[0]->created_at}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                @endif

                        </div>
                    </div>
                    <!-- Right content -->
                    <div class="col-lg-4">
                        <!-- Trending Top -->
                        <div class="row">
                            <div class="col-lg-12 col-md-6 col-sm-6" >
                                <div class="trending-top mb-30">
                                    <div class="trend-top-img imgHome1" style="border:1px solid #ccc!important;
                                                                            box-shadow: 4px 4px 12px #b8b894;">
                                        <a href="/Themes/rabat">
                                        <img src="/storage/photos/shares/Rabat_theme.jpg" alt="">
                                        </a>
                                        <div class="trend-top-cap trend-top-cap2">
                                            <span class="bgb">Rabat</span>
                                            <h2><a class="homeTitle" href="/Themes/rabat">Decouvrir la capitale du Maroc , Rabat</a></h2>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            @php($Presidant = \Illuminate\Support\Facades\DB::select("select * from articles where Article_titre = 'Mot du président'"))
                            @if(count($Presidant) == 1)
                            <div class="col-lg-12 col-md-6 col-sm-6">
                                <div class="trending-top mb-30">
                                    <div class="trend-top-img imgHome1" style="border:1px solid #ccc!important;
                                                                            box-shadow: 4px 4px 12px #b8b894;">
                                        <a href="/Articles/{{$Presidant[0]->Article_id}}">
                                        <img src="{{$Presidant[0]->Article_image}}" alt="">
                                        </a>
                                        <div class="trend-top-cap trend-top-cap2">
                                            <span class="bgg">Mot </span>
                                            <h2><a class="homeTitle" href="/Articles/{{$Presidant[0]->Article_id}}">{{$Presidant[0]->Article_titre}}</a></h2>
                                            <p>{{$Presidant[0]->created_at}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Trending Area End -->
    <!-- Whats New Start -->
    <section class="whats-news-area pt-50 pb-20 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="whats-news-wrapper"  style="border:1px solid #ccc!important;
                                                        box-shadow: 4px 4px 12px #b8b894;">
                        <!-- Heading & Nav Button -->
                        <div class="row justify-content-between align-items-end mb-15 ">
                            <div class="col-xl-4">
                                <div class="section-tittle mb-30">
                                    <h3 class="grow" id="result">Actualités</h3>
                                </div>
                            </div>
                            <div class="col-xl-8 col-md-9">
                                <div class="properties__button">
                                    <!--Nav Button  -->
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <a class="nav-item nav-link active" id="nav-home-tab" onclick="afficher('nav-home-tab')" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Actualités</a>
                                            <a class="nav-item nav-link" id="nav-profile-tab"  onclick="afficher('nav-profile-tab')" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Service</a>
                                            <a class="nav-item nav-link" id="nav-contact-tab"  onclick="afficher('nav-contact-tab')" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Activités</a>
                                            <a class="nav-item nav-link" id="nav-last-tab"  onclick="afficher('nav-last-tab')" data-toggle="tab" href="#nav-last" role="tab" aria-controls="nav-contact" aria-selected="false">Événement</a>
                                            <a class="nav-item nav-link" id="nav-Sports"  onclick="afficher('nav-Sports')" data-toggle="tab" href="#nav-nav-Sport" role="tab" aria-controls="nav-contact" aria-selected="false">Commune</a>
                                        </div>
                                    </nav>
                                    <!--End Nav Button  -->
                                </div>
                            </div>
                        </div>
                        <script type="application/javascript">
                            function afficher($id) {
                               var val = document.getElementById($id).innerText;
                                document.getElementById("result").innerHTML= val ;
                            }
                        </script>
                        <!-- Tab content -->
                        <div class="row">
                            <div class="col-12">
                                <!-- Nav Card -->
                                <div class="tab-content" id="nav-tabContent">
                                    <!-- card one -->
                                    <div class="tab-pane fade show active DivHome" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <div class="row">
                                            <!-- Left Details Caption -->
                                            @php($newArticle = \Illuminate\Support\Facades\DB::select("select * from articles where Categorie_id in (select Categorie_id from categories where Theme_id in (select Theme_id from themes where Theme_type = 'actualites')) and  Article_archiver=1 order by created_at desc LIMIT 5"))
                                            @if(!empty($newArticle[0]))
                                            <div class="col-xl-6 col-lg-12">
                                                <div class="whats-news-single mb-40 mb-40">
                                                    <div class="whates-img">
                                                        <a href="/Articles/{{$newArticle[0]->Article_id}}"><img src="{{$newArticle[0]->Article_image}}" alt=""></a>
                                                    </div>
                                                    <div class="whates-caption">
                                                        <h4><a href="/Articles/{{$newArticle[0]->Article_id}}">{{$newArticle[0]->Article_titre}}</a></h4>
                                                        <span>posted   -   {{$newArticle[0]->created_at}}</span>
                                                    </div>
                                                </div>
                                            </div>

                                            @endif

                                            <!-- Right single caption -->

                                                    <div class="col-xl-6 col-lg-12">
                                                        <div class="row">
                                                            <!-- single -->
                                                            @for($i=1;$i <= 4;$i++)
                                                                @if(!empty($newArticle[$i]))
                                                            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                                <div class="whats-right-single mb-20">
                                                                    <div class="whats-right-img">
                                                                        <a href="/Articles/{{$newArticle[0]->Article_id}}">
                                                                        <img class="imgHome" src="{{$newArticle[$i]->Article_image}}" alt="">
                                                                        </a>
                                                                    </div>
                                                                    <div class="whats-right-cap">
                                                                        <span class="colorb">News</span>
                                                                        <h4><a href="/Articles/{{$newArticle[$i]->Article_id}}">{{$newArticle[$i]->Article_titre}}</a></h4>
                                                                        <p>posted   -   {{$newArticle[$i]->created_at}}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                                @endif
                                                            @endfor
                                                        </div>
                                                    </div>
                                        </div>
                                    </div>
                                    <!-- Card two -->
                                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                        <div class="row">
                                            <!-- Left Details Caption -->
                                            @php($newArticle = \Illuminate\Support\Facades\DB::select("select * from articles where Categorie_id in (select Categorie_id from categories where Theme_id in (select Theme_id from themes where Theme_type = 'services')) and  Article_archiver=1 order by created_at desc LIMIT 5"))
                                            @if(!empty($newArticle[0]))
                                            <div class="col-xl-6 col-lg-12">
                                                <div class="whats-news-single mb-40 mb-40">
                                                    <div class="whates-img">
                                                        <a href="/Articles/{{$newArticle[0]->Article_id}}">
                                                        <img src="{{$newArticle[0]->Article_image}}" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="whates-caption">
                                                        <h4><a href="/Articles/{{$newArticle[0]->Article_id}}">{{$newArticle[0]->Article_titre}}</a></h4>
                                                        <span>posted   -   {{$newArticle[0]->created_at}}</span>
                                                    </div>
                                                </div>
                                            </div>

                                            @endif

                                            <!-- Right single caption -->

                                            <div class="col-xl-6 col-lg-12">
                                                <div class="row">
                                                    <!-- single -->
                                                    @for($i=1;$i <= 4;$i++)
                                                        @if(!empty($newArticle[$i]))
                                                            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                                <div class="whats-right-single mb-20">
                                                                    <div class="whats-right-img">
                                                                        <a href="/Articles/{{$newArticle[0]->Article_id}}">
                                                                        <img class="imgHome" src="{{$newArticle[$i]->Article_image}}" alt="" >
                                                                        </a>
                                                                    </div>
                                                                    <div class="whats-right-cap">
                                                                        <span class="colorb">service</span>
                                                                        <h4><a href="/Articles/{{$newArticle[$i]->Article_id}}">{{$newArticle[$i]->Article_titre}}</a></h4>
                                                                        <p>{{$newArticle[$i]->created_at}}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endfor
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Card three -->
                                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                                        <div class="row">
                                            <!-- Left Details Caption -->
                                            @php($newArticle = \Illuminate\Support\Facades\DB::select("select * from articles where Categorie_id in (select Categorie_id from categories where Theme_id in (select Theme_id from themes where Theme_type = 'activites')) and  Article_archiver=1 order by created_at desc LIMIT 5"))
                                            @if(!empty($newArticle[0]))
                                            <div class="col-xl-6 col-lg-12">
                                                <div class="whats-news-single mb-40 mb-40">
                                                    <div class="whates-img">
                                                        <a href="/Articles/{{$newArticle[0]->Article_id}}">
                                                            <img src="{{$newArticle[0]->Article_image}}" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="whates-caption">
                                                        <h4><a href="/Articles/{{$newArticle[0]->Article_id}}">{{$newArticle[0]->Article_titre}}</a></h4>
                                                        <span>posted   -   {{$newArticle[0]->created_at}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif

                                            <!-- Right single caption -->

                                            <div class="col-xl-6 col-lg-12">
                                                <div class="row">
                                                    <!-- single -->
                                                    @for($i=1;$i <= 4;$i++)
                                                        @if(!empty($newArticle[$i]))
                                                            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                                <div class="whats-right-single mb-20">
                                                                    <div class="whats-right-img">
                                                                        <a href="/Articles/{{$newArticle[0]->Article_id}}">
                                                                            <img class="imgHome" src="{{$newArticle[$i]->Article_image}}" alt="" style="height: 70px ; @if($i==1) width: 120px @else width: 80px @endif">
                                                                        </a>
                                                                    </div>
                                                                    <div class="whats-right-cap">
                                                                        <span class="colorb">activité</span>
                                                                        <h4><a href="/Articles/{{$newArticle[$i]->Article_id}}">{{$newArticle[$i]->Article_titre}}</a></h4>
                                                                        <p>{{$newArticle[$i]->created_at}}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endfor
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- card fure -->
                                    <div class="tab-pane fade" id="nav-last" role="tabpanel" aria-labelledby="nav-last-tab">
                                        <div class="row">
                                            <!-- Left Details Caption -->
                                            @php($newArticle = \Illuminate\Support\Facades\DB::select("select * from articles where Categorie_id in (select Categorie_id from categories where Theme_id in (select Theme_id from themes where Theme_type = 'evenement')) and  Article_archiver=1 order by created_at desc LIMIT 5"))
                                            @if(!empty($newArticle[0]))
                                                <div class="col-xl-6 col-lg-12">
                                                    <div class="whats-news-single mb-40 mb-40">
                                                        <div class="whates-img">
                                                            <a href="/Articles/{{$newArticle[0]->Article_id}}">
                                                                <img src="{{$newArticle[0]->Article_image}}" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="whates-caption">
                                                            <h4><a href="/Articles/{{$newArticle[0]->Article_id}}">{{$newArticle[0]->Article_titre}}</a></h4>
                                                            <span>posted   -   {{$newArticle[0]->created_at}}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                        @endif

                                        <!-- Right single caption -->

                                            <div class="col-xl-6 col-lg-12">
                                                <div class="row">
                                                    <!-- single -->
                                                    @for($i=1;$i <= 4;$i++)
                                                        @if(!empty($newArticle[$i]))
                                                            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                                <div class="whats-right-single mb-20">
                                                                    <div class="whats-right-img">
                                                                        <a href="/Articles/{{$newArticle[0]->Article_id}}">
                                                                            <img class="imgHome" src="{{$newArticle[$i]->Article_image}}" alt="" style="height: 70px ; @if($i==1) width: 120px @else width: 80px @endif">
                                                                        </a>
                                                                    </div>
                                                                    <div class="whats-right-cap">
                                                                        <span class="colorb">événement</span>
                                                                        <h4><a href="/Articles/{{$newArticle[$i]->Article_id}}">{{$newArticle[$i]->Article_titre}}</a></h4>
                                                                        <p>{{$newArticle[$i]->created_at}}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endfor
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- card Five -->
                                    <div class="tab-pane fade" id="nav-nav-Sport" role="tabpanel" aria-labelledby="nav-Sports">
                                        <div class="row">
                                            <!-- Left Details Caption -->
                                            @php($newArticle = \Illuminate\Support\Facades\DB::select("select * from articles where Categorie_id in (select Categorie_id from categories where Theme_id in (select Theme_id from themes where Theme_type = 'commune')) and  Article_archiver=1 order by created_at desc LIMIT 5"))
                                            @if(!empty($newArticle[0]))
                                                <div class="col-xl-6 col-lg-12">
                                                    <div class="whats-news-single mb-40 mb-40">
                                                        <div class="whates-img">
                                                            <a href="/Articles/{{$newArticle[0]->Article_id}}">
                                                                <img src="{{$newArticle[0]->Article_image}}" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="whates-caption">
                                                            <h4><a href="/Articles/{{$newArticle[0]->Article_id}}">{{$newArticle[0]->Article_titre}}</a></h4>
                                                            <span>posted   -   {{$newArticle[0]->created_at}}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                        @endif

                                        <!-- Right single caption -->

                                            <div class="col-xl-6 col-lg-12">
                                                <div class="row">
                                                    <!-- single -->
                                                    @for($i=1;$i <= 4;$i++)
                                                        @if(!empty($newArticle[$i]))
                                                            <div class="col-xl-12 col-lg-6 col-md-6 col-sm-10">
                                                                <div class="whats-right-single mb-20">
                                                                    <div class="whats-right-img">
                                                                        <a href="/Articles/{{$newArticle[0]->Article_id}}">
                                                                            <img class="imgHome" src="{{$newArticle[$i]->Article_image}}" alt="" style="height: 70px ; @if($i==1) width: 120px @else width: 80px @endif">
                                                                        </a>
                                                                    </div>
                                                                    <div class="whats-right-cap">
                                                                        <span class="colorb">commune</span>
                                                                        <h4><a href="/Articles/{{$newArticle[$i]->Article_id}}">{{$newArticle[$i]->Article_titre}}</a></h4>
                                                                        <p>{{$newArticle[$i]->created_at}}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endfor
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Nav Card -->
                            </div>
                        </div>
                    </div>

                    <div class="row pt-lg-2 pl-4" style="width: 100%">
                        <img  src="https://img.medi1tv.com/TRAM_RABAT_310516.jpg" style="object-fit: cover; width: inherit; border-radius: 12px;">
                    </div>
                </div>
                <div class="col-lg-4">
                    <!-- Flow Socail -->

                    <!-- Most Recent Area -->
                    <div class="most-recent-area"   style="border:1px solid #ccc!important;
                                                              border-bottom: 0;
                                                              box-shadow: 1px 1px 12px #b8b894;height: 100%">
                       @include('Scrap.post')
                    </div>
                </div>


        </div>
        </div>
    </section>
    <!-- Whats New End -->
    <!--   Weekly2-News start -->
    <div class="weekly2-news-area pt-50 pb-50 gray-bg">
        <div class="container">
            <div class="weekly2-wrapper">
                <div class="row">
                    <!-- Banner -->
                    <div class="col-lg-3">
                        <div class="home-banner2 d-none d-lg-block">
                            <img src="https://i.pinimg.com/originals/53/3e/6c/533e6caa7edf704e26e0e9f230af6d8b.jpg" alt="">
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="slider-wrapper">
                            <!-- section Tittle -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="small-tittle mb-30">
                                        <h4 class="grow titrePopular"> Articles Populaire :</h4>
                                    </div>
                                </div>
                            </div>
                            <!-- Slider -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="weekly2-news-active d-flex">
                                        <!-- Single -->
                                        @php($PopularArticles = App\Article::where('Article_archiver',1)->orderby('Article_vue','desc')->take(4)->get() )
                                        @if(count($PopularArticles)>0)
                                                @foreach($PopularArticles as $PopularArticle)
                                                        <div class="weekly2-single">
                                                            <div class="weekly2-img">
                                                                <a href="/Articles/{{$PopularArticle->Article_id}}"><img class="imgHome1" src="{{$PopularArticle->Article_image}}" alt=""></a>
                                                            </div>
                                                            <div class="weekly2-caption">

                                                                <h4><a href="/Articles/{{$PopularArticle->Article_id}}">@php($titre = substr($PopularArticle->Article_titre,0,17)){{$titre}}...</a></h4>
                                                                 <p><i class="fa fa-eye" aria-hidden="true"></i> {{$PopularArticle->Article_vue}}</p>

                                                            </div>
                                                        </div>
                                                    @endforeach
                                            @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Weekly-News -->

    <!-- End Start Video area-->
    <!--   Weekly3-News start -->
    <div class="weekly3-news-area pt-80 pb-130 fixed-bg-img1">
        <div class="container">
            <div class="weekly3-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="slider-wrapper">
                            <!-- Slider -->
                            <div class="row">
                                <div class="col-12 col-lg-4 pb-4 text-center" style="overflow: hidden">
                                        <div class="stat-cart DivChiffre">
                                            <div class="stat-number1">1,8M</div>
                                            <div class="text-center stat-text1 textColor">Habitants A Rabat</div>
                                        </div>


                                </div>
                                <div class="col-12 col-lg-8 d-lg-inline-block">
                                    <div class="row mb-4">
                                        <div class="col-md-3">
                                            <div class="stat-cart2 d-flex align-items-center justify-content-center DivChiffre ">

                                                <div class="row d-flex justify-content-start w-75 align-items-center">
                                                    <div class=" mb-2 ml-4 stat-number2 ">40%</div>
                                                    <div class=" heading text-center line-1 font-4 textColor">Mains d'oeuvre</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="stat-cart3 d-flex align-items-center justify-content-center DivChiffre DivChif" >
                                                <div class="d-flex justify-content-start w-75 align-items-center">
                                                 <div class="stat-number3">2.000.000</div>
                                                 <div class="heading2 text-left textColor">VOITURES EN CIRCULATION / JOUR</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row ">
                                        <div class="col-md-6">
                                            <div class="stat-cart3 d-flex align-items-center justify-content-center DivChiffre DivChif1">
                                                <div class="stat-number3 textColor1"  >117 </div>
                                                <div class="heading2 text-left stat-text2 textColor1">Superficie de la ville en km²</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                             <div class="col-md-6">
                                                 <div class=" stat-cart2 d-flex flex-column align-items-center justify-content-center px-3 DivChiffre">
                                                     <div class="row d-flex justify-content-start w-75 align-items-center ">
                                                    <div class="mr-4 mb-2 text-left stat-number2">22%</div>
                                                    <div class=" heading text-left line-1 font-3 textColor">Populations -10 ans</div>
                                                     </div>
                                                </div>
                                             </div>
                                            <div class="col-md-6 overflow-hidden">
                                                <div class="stat-cart2 d-flex flex-column align-items-center justify-content-center px-3  DivChiffre">
                                                    <div class="row d-flex justify-content-start w-75 align-items-center">
                                                      <div  class=" mr-4 mb-2 text-left stat-number2">17,2%</div>
                                                      <div class=" heading text-left line-1 font-4 textColor">PIB NATIONAL</div>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Weekly-News -->
    <!-- banner-last Start -->
    <div class="banner-area gray-bg pt-90 pb-90">
        @include('inc.carousel')
    </div>
    <!-- banner-last End -->
    <div id="contact">
        @include('Contact.index')
    </div>

</main>
    <script type="application/javascript">

    </script>
@endsection

@section('script')
<!-- JS here -->
<script type="application/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
<!-- Jquery, Popper, Bootstrap -->
<script type="application/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<!-- Jquery Mobile Menu -->
<script type="application/javascript" src="/assets/js/jquery.slicknav.min.js"></script>

<!-- Jquery Slick , Owl-Carousel Plugins -->
<script type="application/javascript" src="/assets/js/owl.carousel.min.js"></script>
<!-- Date Picker -->
<script type="application/javascript" src="/assets/js/gijgo.min.js"></script>
<!-- One Page, Animated-HeadLin -->
<script type="application/javascript" src="/assets/js/wow.min.js"></script>
<script type="application/javascript" src="/assets/js/animated.headline.js"></script>
<script type="application/javascript" src="/assets/js/jquery.magnific-popup.js"></script>

<!-- Scrollup, nice-select, sticky -->
<script type="application/javascript" src="/assets/js/jquery.scrollUp.min.js"></script>
<script type="application/javascript" src="/assets/js/jquery.nice-select.min.js"></script>
<script type="application/javascript" src="/assets/js/jquery.sticky.js"></script>

<!-- Jquery Plugins, main Jquery -->
<script type="application/javascript" src="/assets/js/plugins.js"></script>
<script type="application/javascript" src="/assets/js/main.js"></script>
<!-- rECAPTCHA -->
@endsection
