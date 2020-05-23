@extends("layouts.app")

@section('css')
    <link  href="/css/styleTheme.css" rel="stylesheet">
    <link  href="/css/responsive/responsive.css" rel="stylesheet">
    @endsection

@section("content")

    <!-- ****** Welcome Area Start ****** -->
    <section class="fplus-hero-area" style="background-image: url(/img/bg-img/hero-1.jpg)" id="home">
        <div class="hero-content-area d-flex justify-content-end">
            <div class="hero-text">
                <h2>For More Agency</h2>
                <a href="#projects" class="view-portfolio-btn" id="scrollDown"><i class="fa fa-plus" aria-hidden="true"></i> View Portfolio</a>
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
                        <h4>Themes</h4>
                        <div class="section-heading-line"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Single Blog Post Area -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="fplus-single-blog-area wow fadeInUp" data-wow-delay="0.5s">
                        <!-- Blog Thumbnail -->
                        <img src="/img/bg-img/hero-1.jpg" alt="">
                        <!-- Blog Content -->
                        <div class="fplus-blog-content">

                            <h5>Featured</h5>

                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><a href="#" >Cras justo odio</a></li>
                                <li class="list-group-item"><a href="#" >Dapibus ac facilisis in</a></li>
                                <li class="list-group-item"><a href="#" >Vestibulum at eros</a></li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ****** Blog Area End ****** -->
@endsection

@section('script')

    <!-- Popper js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <!-- All Plugins js -->
    <script type="application/javascript" src="/js/others/plugins.js"></script>
    <!-- Active JS -->
    <script type="application/javascript" src="/js/active.js"></script>
    @endsection