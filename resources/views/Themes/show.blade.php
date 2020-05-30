@extends("layouts.app")

@section('css')
    <link  href="/css/styleTheme.css" rel="stylesheet">
    <link  href="/css/responsive/responsive.css" rel="stylesheet">
    <link href="/css/add.css" rel="stylesheet">
@endsection


@section("content")

    <!-- ****** Welcome Area Start ****** -->
    <section class="fplus-hero-area" style="background-image: url({{$theme->Theme_image}})" id="home">
        <div class="hero-content-area d-flex justify-content-end">
            <div class="hero-text">
                <a href="/Themes/{{$theme->Theme_type}}">{{$theme->Theme_type}}</a> / <a href="/themes/{{$theme->Theme_id}}">{{$theme->Theme_intitule}}</a> /
                <h2>{{$theme->Theme_intitule }}</h2>
                <h5>{{$theme->Theme_description}}</h5>
                @if(Session::get('role')=='admin' || Session::get('role')=='moderator')
                    <a href="/categories/createCategorie/{{$theme->Theme_id}}" class="view-portfolio-btn" id="scrollDown">
                        <i class="fa fa-plus" aria-hidden="true"></i>Creer une categorie</a>
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
                @if(count($categories)>0)
                    @foreach($categories as $categorie)
                        <div class="col-12 col-md-6 col-lg-3 mt-5">
                            <div class="fplus-single-blog-area wow fadeInUp" data-wow-delay="0.5s" onmouseover="ShowOnHover({{$categorie->Categorie_id}});" onmouseleave="Hide({{$categorie->Categorie_id}});">
                                <!-- Blog Thumbnail -->
                                <a href="/categories/{{$categorie->Categorie_id}}">
                                    <img  src="{{$categorie->Categorie_image}}"  class="grow" style="height: 200px;width:400px; "></a>
                                <!-- Blog Content -->

                                <div class="fplus-blog-content">

                                    <a href="/categories/{{$categorie->Categorie_id}}">
                                        <h4 class="text-center">{{$categorie->Categorie_intitule}}</h4></a>
                                    @php($categories = App\Categorie::where('Cat_id',$categorie->Categorie_id)->take(3)->get())
                                    @php($articles = App\Article::where('Categorie_id',$categorie->Categorie_id)->take(3)->get())
                                    <ul class="list-group list-group-flush">
                                        @for($i=0;$i<3;$i++)
                                            @if(isset($categories[$i]))
                                                <li class="list-group-item"><a href="/categories/{{$categories[$i]->Categorie_id}}" >
                                                        {{$categories[$i]->Categorie_intitule}}
                                                    </a></li>
                                            @elseif(isset($articles[$i]))
                                                <li class="list-group-item">
                                                    <a href="#" >
                                                          #{{$articles[$i]->Article_titre}}
                                                    </a></li>
                                            @else
                                                <li class="list-group-item"><a href="#">
                                                        ...
                                                    </a></li>
                                            @endif
                                        @endfor
                                        @if(Session::get('role')=='admin' || Session::get('role')=='moderator')
                                            <li class="btn-sm list-group-item d-none" id="manager_btn_{{$categorie->Categorie_id}}">
                                                {!! Form::open([ 'action'=>['CategoriesController@destroy',$categorie->Categorie_id],'method' => 'post' ,'class'=>'pull-right hidden','id'=>'form_'.$categorie->Categorie_id,'onsubmit' => 'return confirm("Est-ce que vous voulez supprimer?\r\nCela peut engendrer la supression d autre table");']) !!}
                                                {{ Form::hidden('_method','DELETE') }}
                                                <button type="button" class="btn btn-danger btn-sm"  onclick="if(confirm('Est-ce que vous voulez supprimer?\r\nCela peut engendrer la supression d autre table'))document.getElementById('form_{{$categorie->Categorie_id}}').submit();">
                                                    <i class="fa fa-trash-o fa-lg"></i> Delete</button>
                                                {!! Form::close() !!}
                                                <a class="btn btn-default btn-sm" id="Edit_btn" href="/categories/{{$categorie->Categorie_id}}/edit">
                                                    <i class="fa fa-cog"></i> Edit</a>
                                            </li>
                                        @endif
                                    </ul>

                                </div>

                            </div>
                        </div>
                    @endforeach
                @endif
                @if(Session::get('role')=='admin' || Session::get('role')=='moderator')

                    <div class="col-12 col-md-6 col-lg-4" style="padding-top: 4%;">
                        <a href="/categories/createCategorie/{{$theme->Theme_id}}">
                            <div class="fplus-single-blog-area wow fadeInUp add " data-wow-delay="0.5s" style=" border: 3px dashed" >
                                <img src="https://i.imgur.com/7yPHMCB.png" style="width: 120px; margin-top: 50%; margin-bottom: 50%; margin-left: 29%;">
                            </div>
                        </a>
                    </div>
                @endif
            </div>
        </div>
        <br>
    </section>
    <!-- ****** Blog Area End ****** -->





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
