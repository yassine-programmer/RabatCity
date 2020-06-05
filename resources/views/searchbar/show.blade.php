@extends("layouts.app")

@section('css')
    <link  href="/css/styleTheme.css" rel="stylesheet">
    <link  href="/css/responsive/responsive.css" rel="stylesheet">
    <link href="/css/add.css" rel="stylesheet">
@endsection


@section("content")

    <!-- ****** Welcome Area Start ****** -->
    <section class="fplus-hero-area accordion-image" id="home">
        <div class="hero-content-area d-flex justify-content-end">
            <div class="hero-text">
                <h5>Recherche...</h5>
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

                @foreach($articles as $article)
                    <div class="col-12  mt-5 grow">
                        <div class="row" style="border: 1px solid #ccc!important;
                                                box-shadow: 1px 1px 12px #b8b894;
                                                margin-top: -30px;">
                            <div class="col-3 " >
                                <a href="/Articles/{{$article->Article_id}}">
                                    <img  src="{{$article->Article_image}}"  alt="" style="height: 100px;width:200px;
                                            border-right:1px solid #ccc!important;
                                            border-left:1px solid #ccc!important;
                                          box-shadow: 1px 1px 5px #b8b894;" ></a>
                            </div>
                            <div class="col-9 d-flex align-items-center justify-content-start" >
                                <a class="text-left" href="/Articles/{{$article->Article_id}}"><h4>{{$article->Article_titre}}</h4></a>
                            </div>

                        </div>
                    </div>
                @endforeach


            </div>
                <div class="col-12 col-md-6 col-lg-4 mt-5 text-center">
                     {{$articles->links()}}

                </div>

            <!-- ****** new article ****** -->
                <div class="section-heading text-center" style="margin-top: 70px">
                    <h4>Articles Recent</h4>
                    <div class="section-heading-line"></div>
                    <div class="container">
                        <div class="row">
                            <!-- Single Feature -->
                            @php($newArticles = \Illuminate\Support\Facades\DB::select("select * from articles  order by created_at desc LIMIT 3"))
                            @foreach($newArticles as $newArticle)
                                <div class="col-12 col-md-6 col-lg-4 grow">
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

        </div>
        <br>
    </section>
    <!-- ****** Blog Area End ****** -->


@endsection


