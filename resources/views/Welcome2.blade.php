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
<!-- Preloader Start -->

<main>
    <!-- Trending Area Start -->
    <div class="trending-area fix pt-25 gray-bg">
        <div class="container">
            <div class="trending-main">
                <div class="row">
                    <div class="col-lg-8">
                        <!-- Trending Top -->
                        <div class="slider-active">
                            <!-- Single -->
                            @php($newArticle = \Illuminate\Support\Facades\DB::select("select * from articles where Categorie_id in (select Categorie_id from categories where Theme_id in (select Theme_id from themes where Theme_type = 'actualites'))order by created_at desc LIMIT 1"))
                            <div class="single-slider">
                                <div class="trending-top mb-30">
                                    <div class="trend-top-img">
                                        <img src="{{$newArticle[0]->Article_image}}" alt="" style="height: 500px">
                                        <div class="trend-top-cap">
                                            <span class="bgr" data-animation="fadeInUp" data-delay=".2s" data-duration="1000ms">News</span>
                                            <h2><a href="latest_news.html" data-animation="fadeInUp" data-delay=".4s" data-duration="1000ms">{{$newArticle[0]->Article_titre}}</a></h2>
                                            <p data-animation="fadeInUp" data-delay=".6s" data-duration="1000ms">Posted - {{$newArticle[0]->created_at}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- Right content -->
                    <div class="col-lg-4">
                        <!-- Trending Top -->
                        <div class="row">
                            <div class="col-lg-12 col-md-6 col-sm-6">
                                <div class="trending-top mb-30">
                                    <div class="trend-top-img">
                                        <img src="/storage/photos/shares/Rabat_theme.jpg" alt="">
                                        <div class="trend-top-cap trend-top-cap2">
                                            <span class="bgb">Rabat</span>
                                            <h2><a href="/Themes/rabat">Decouvrir la capitale du Maroc , Rabat</a></h2>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-6 col-sm-6">
                                <div class="trending-top mb-30">
                                    <div class="trend-top-img">
                                        <img src="assets/img/trending/trending_top4.jpg" alt="">
                                        <div class="trend-top-cap trend-top-cap2">
                                            <span class="bgg">TECH </span>
                                            <h2><a href="latest_news.html">Secretart for Economic Air plane that looks like</a></h2>
                                            <p>by Alice cloe   -   Jun 19, 2020</p>
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
    <!-- Trending Area End -->
    <!-- Whats New Start -->
    <section class="whats-news-area pt-50 pb-20 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="whats-news-wrapper">
                        <!-- Heading & Nav Button -->
                        <div class="row justify-content-between align-items-end mb-15">
                            <div class="col-xl-4">
                                <div class="section-tittle mb-30">
                                    <h3>Actualités</h3>
                                </div>
                            </div>
                            <div class="col-xl-8 col-md-9">
                                <div class="properties__button">
                                    <!--Nav Button  -->
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Actualités</a>
                                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Service</a>
                                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Activités</a>
                                            <a class="nav-item nav-link" id="nav-last-tab" data-toggle="tab" href="#nav-last" role="tab" aria-controls="nav-contact" aria-selected="false">Événement</a>
                                            <a class="nav-item nav-link" id="nav-Sports" data-toggle="tab" href="#nav-nav-Sport" role="tab" aria-controls="nav-contact" aria-selected="false">Commune</a>
                                        </div>
                                    </nav>
                                    <!--End Nav Button  -->
                                </div>
                            </div>
                        </div>
                        <!-- Tab content -->
                        <div class="row">
                            <div class="col-12">
                                <!-- Nav Card -->
                                <div class="tab-content" id="nav-tabContent">
                                    <!-- card one -->
                                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                        <div class="row">
                                            <!-- Left Details Caption -->
                                            @php($newArticle = \Illuminate\Support\Facades\DB::select("select * from articles where Categorie_id in (select Categorie_id from categories where Theme_id in (select Theme_id from themes where Theme_type = 'actualites'))order by created_at desc LIMIT 5"))
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
                                                                        <img src="{{$newArticle[$i]->Article_image}}" alt="" style="height: 70px ; @if($i==1) width: 120px @else width: 80px @endif">
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
                                            @php($newArticle = \Illuminate\Support\Facades\DB::select("select * from articles where Categorie_id in (select Categorie_id from categories where Theme_id in (select Theme_id from themes where Theme_type = 'services'))order by created_at desc LIMIT 5"))
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
                                                                        <img src="{{$newArticle[$i]->Article_image}}" alt="" style="height: 70px ; @if($i==1) width: 120px @else width: 80px @endif">
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
                                            @php($newArticle = \Illuminate\Support\Facades\DB::select("select * from articles where Categorie_id in (select Categorie_id from categories where Theme_id in (select Theme_id from themes where Theme_type = 'activites'))order by created_at desc LIMIT 5"))
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
                                                                            <img src="{{$newArticle[$i]->Article_image}}" alt="" style="height: 70px ; @if($i==1) width: 120px @else width: 80px @endif">
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
                                            @php($newArticle = \Illuminate\Support\Facades\DB::select("select * from articles where Categorie_id in (select Categorie_id from categories where Theme_id in (select Theme_id from themes where Theme_type = 'evenement'))order by created_at desc LIMIT 5"))
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
                                                                            <img src="{{$newArticle[$i]->Article_image}}" alt="" style="height: 70px ; @if($i==1) width: 120px @else width: 80px @endif">
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
                                            @php($newArticle = \Illuminate\Support\Facades\DB::select("select * from articles where Categorie_id in (select Categorie_id from categories where Theme_id in (select Theme_id from themes where Theme_type = 'commune'))order by created_at desc LIMIT 5"))
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
                                                                            <img src="{{$newArticle[$i]->Article_image}}" alt="" style="height: 70px ; @if($i==1) width: 120px @else width: 80px @endif">
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
                    <!-- Banner -->
                    <div class="banner-one mt-20 mb-30">
                        <img src="assets/img/gallery/body_card1.png" alt="">
                    </div>
                </div>
                <div class="col-lg-4">
                    <!-- Flow Socail -->
                    <div class="single-follow mb-45">
                        <div class="single-box">
                            <div class="follow-us d-flex align-items-center">
                                <div class="follow-social">
                                    <a href="https://www.facebook.com/Conseil.Arrondissement.Agdal.Ryad/"><img src="assets/img/news/icon-fb.png" alt=""></a>
                                </div>
                                <div class="follow-count">
                                    <span>8,045</span>
                                    <p>Fans</p>
                                </div>
                            </div>
                            <div class="follow-us d-flex align-items-center">
                                <div class="follow-social">
                                    <a href="#"><img src="assets/img/news/icon-tw.png" alt=""></a>
                                </div>
                                <div class="follow-count">
                                    <span>8,045</span>
                                    <p>Fans</p>
                                </div>
                            </div>
                            <div class="follow-us d-flex align-items-center">
                                <div class="follow-social">
                                    <a href="#"><img src="assets/img/news/icon-ins.png" alt=""></a>
                                </div>
                                <div class="follow-count">
                                    <span>8,045</span>
                                    <p>Fans</p>
                                </div>
                            </div>
                            <div class="follow-us d-flex align-items-center">
                                <div class="follow-social">
                                    <a href="#"><img src="assets/img/news/icon-yo.png" alt=""></a>
                                </div>
                                <div class="follow-count">
                                    <span>8,045</span>
                                    <p>Fans</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Most Recent Area -->
                    <div class="most-recent-area">
                        <!-- Section Tittle -->
                        <div class="small-tittle mb-20">
                            <h4>Most Recent</h4>
                        </div>
                        <!-- Details -->
                        <div class="most-recent mb-40">
                            <div class="most-recent-img">
                                <img src="assets/img/gallery/most_recent.png" alt="">
                                <div class="most-recent-cap">
                                    <span class="bgbeg">Vogue</span>
                                    <h4><a href="latest_news.html">What to Wear: 9+ Cute Work <br>
                                            Outfits to Wear This.</a></h4>
                                    <p>Jhon  |  2 hours ago</p>
                                </div>
                            </div>
                        </div>
                        <!-- Single -->
                        <div class="most-recent-single">
                            <div class="most-recent-images">
                                <img src="assets/img/gallery/most_recent1.png" alt="">
                            </div>
                            <div class="most-recent-capt">
                                <h4><a href="latest_news.html">Scarlett’s disappointment at latest accolade</a></h4>
                                <p>Jhon  |  2 hours ago</p>
                            </div>
                        </div>
                        <!-- Single -->
                        <div class="most-recent-single">
                            <div class="most-recent-images">
                                <img src="assets/img/gallery/most_recent2.png" alt="">
                            </div>
                            <div class="most-recent-capt">
                                <h4><a href="latest_news.html">Most Beautiful Things to Do in Sidney with Your BF</a></h4>
                                <p>Jhon  |  3 hours ago</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Whats New End -->
    <!--   Weekly2-News start -->
    <div class="weekly2-news-area pt-50 pb-30 gray-bg">
        <div class="container">
            <div class="weekly2-wrapper">
                <div class="row">
                    <!-- Banner -->
                    <div class="col-lg-3">
                        <div class="home-banner2 d-none d-lg-block">
                            <img src="assets/img/gallery/body_card2.png" alt="">
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="slider-wrapper">
                            <!-- section Tittle -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="small-tittle mb-30">
                                        <h4>Most Popular</h4>
                                    </div>
                                </div>
                            </div>
                            <!-- Slider -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="weekly2-news-active d-flex">
                                        <!-- Single -->
                                        <div class="weekly2-single">
                                            <div class="weekly2-img">
                                                <img src="assets/img/gallery/weeklyNews1.png" alt="">
                                            </div>
                                            <div class="weekly2-caption">
                                                <h4><a href="#">Scarlett’s disappointment at latest accolade</a></h4>
                                                <p>Jhon  |  2 hours ago</p>
                                            </div>
                                        </div>
                                        <!-- Single -->
                                        <div class="weekly2-single">
                                            <div class="weekly2-img">
                                                <img src="assets/img/gallery/weeklyNews2.png" alt="">
                                            </div>
                                            <div class="weekly2-caption">
                                                <h4><a href="#">Scarlett’s disappointment at latest accolade</a></h4>
                                                <p>Jhon  |  2 hours ago</p>
                                            </div>
                                        </div>
                                        <!-- Single -->
                                        <div class="weekly2-single">
                                            <div class="weekly2-img">
                                                <img src="assets/img/gallery/weeklyNews3.png" alt="">
                                            </div>
                                            <div class="weekly2-caption">
                                                <h4><a href="#">Scarlett’s disappointment at latest accolade</a></h4>
                                                <p>Jhon  |  2 hours ago</p>
                                            </div>
                                        </div>
                                        <!-- Single -->
                                        <div class="weekly2-single">
                                            <div class="weekly2-img">
                                                <img src="assets/img/gallery/weeklyNews2.png" alt="">
                                            </div>
                                            <div class="weekly2-caption">
                                                <h4><a href="#">Scarlett’s disappointment at latest accolade</a></h4>
                                                <p>Jhon  |  2 hours ago</p>
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
    <!--  Recent Articles start -->
    <div class="recent-articles pt-80 pb-80">
        <div class="container">
            <div class="recent-wrapper">
                <!-- section Tittle -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-tittle mb-30">
                            <h3>Trending  News</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="recent-active dot-style d-flex dot-style">
                            <!-- Single -->
                            <div class="single-recent">
                                <div class="what-img">
                                    <img src="assets/img/gallery/tranding1.png" alt="">
                                </div>
                                <div class="what-cap">
                                    <h4><a href="#" > <h4><a href="latest_news.html">What to Expect From the 2020 Oscar Nomin ations</a></h4></a></h4>
                                    <P>Jun 19, 2020</P>
                                    <a class="popup-video btn-icon" href="https://www.youtube.com/watch?v=1aP-TXUpNoU"><span class="flaticon-play-button"></span></a>

                                </div>
                            </div>
                            <!-- Single -->
                            <div class="single-recent">
                                <div class="what-img">
                                    <img src="assets/img/gallery/tranding2.png" alt="">
                                </div>
                                <div class="what-cap">
                                    <h4><a href="latest_news.html">What to Expect From the 2020 Oscar Nomin ations</a></h4>
                                    <P>Jun 19, 2020</P>
                                    <a class="popup-video" href="https://www.youtube.com/watch?v=1aP-TXUpNoU"><span class="flaticon-play-button"></span></a>
                                </div>
                            </div>
                            <!-- Single -->
                            <div class="single-recent">
                                <div class="what-img">
                                    <img src="assets/img/gallery/tranding1.png" alt="">
                                </div>
                                <div class="what-cap">
                                    <h4><a href="latest_news.html"> <h4><a href="latest_news.html">What to Expect From the 2020 Oscar Nomin ations</a></h4></a></h4>
                                    <P>Jun 19, 2020</P>
                                    <a class="popup-video" href="https://www.youtube.com/watch?v=1aP-TXUpNoU"><span class="flaticon-play-button"></span></a>
                                </div>
                            </div>
                            <!-- Single -->
                            <div class="single-recent">
                                <div class="what-img">
                                    <img src="assets/img/gallery/tranding2.png" alt="">
                                </div>
                                <div class="what-cap">
                                    <h4><a href="latest_news.html">What to Expect From the 2020 Oscar Nomin ations</a></h4>
                                    <P>Jun 19, 2020</P>
                                    <a class="popup-video" href="https://www.youtube.com/watch?v=1aP-TXUpNoU"><span class="flaticon-play-button"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Recent Articles End -->

    <!-- End Start Video area-->
    <!--   Weekly3-News start -->
    <div class="weekly3-news-area pt-80 pb-130">
        <div class="container">
            <div class="weekly3-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="slider-wrapper">
                            <!-- Slider -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="weekly3-news-active dot-style d-flex">
                                        <div class="weekly3-single">
                                            <div class="weekly3-img">
                                                <img src="assets/img/gallery/weekly2News1.png" alt="">
                                            </div>
                                            <div class="weekly3-caption">
                                                <h4><a href="latest_news.html">What to Expect From the 2020 Oscar Nomin ations</a></h4>
                                                <p>19 Jan 2020</p>
                                            </div>
                                        </div>
                                        <div class="weekly3-single">
                                            <div class="weekly3-img">
                                                <img src="assets/img/gallery/weekly2News2.png" alt="">
                                            </div>
                                            <div class="weekly3-caption">
                                                <h4><a href="latest_news.html">What to Expect From the 2020 Oscar Nomin ations</a></h4>
                                                <p>19 Jan 2020</p>
                                            </div>
                                        </div>
                                        <div class="weekly3-single">
                                            <div class="weekly3-img">
                                                <img src="assets/img/gallery/weekly2News3.png" alt="">
                                            </div>
                                            <div class="weekly3-caption">
                                                <h4><a href="latest_news.html">What to Expect From the 2020 Oscar Nomin ations</a></h4>
                                                <p>19 Jan 2020</p>
                                            </div>
                                        </div>
                                        <div class="weekly3-single">
                                            <div class="weekly3-img">
                                                <img src="assets/img/gallery/weekly2News4.png" alt="">
                                            </div>
                                            <div class="weekly3-caption">
                                                <h4><a href="latest_news.html">What to Expect From the 2020 Oscar Nomin ations</a></h4>
                                                <p>19 Jan 2020</p>
                                            </div>
                                        </div>
                                        <div class="weekly3-single">
                                            <div class="weekly3-img">
                                                <img src="assets/img/gallery/weekly2News2.png" alt="">
                                            </div>
                                            <div class="weekly3-caption">
                                                <h4><a href="latest_news.html">What to Expect From the 2020 Oscar Nomin ations</a></h4>
                                                <p>19 Jan 2020</p>
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
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-md-10">
                    <div class="banner-one">
                        <img src="assets/img/gallery/body_card3.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- banner-last End -->
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
@endsection