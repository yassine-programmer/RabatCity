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
                    <div class="col-12 col-md-6 col-lg-4 mt-5">
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
                                            {!! Form::open([ 'action'=>['ArticlesController@destroy',$article->Article_id],'method' => 'post' ,'class'=>'pull-right hidden','id'=>'form_'.$article->Article_id]) !!}
                                            {{ Form::hidden('_method','DELETE') }}
                                            <button type="button" class="btn btn-danger"  onclick="if(confirm('Est-ce que vous voulez supprimer?\r\nCela peut engendrer la supression d autre table'))document.getElementById('form_{{$article->Article_id}}').submit();">
                                                <i class="fa fa-trash-o fa-lg"></i> Delete</button>
                                            {!! Form::close() !!}
                                            <a class="btn btn-default btn-sm" id="Edit_btn" href="/articles/{{$article->Article_id}}/edit">
                                                <i class="fa fa-cog"></i> Edit</a>
                                        </li>
                                    @endif
                                </ul>

                            </div>

                        </div>
                    </div>
                @endforeach
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
            </div>
        </div>
        <br>
    </section>
    <!-- ****** Blog Area End ****** -->


@endsection


