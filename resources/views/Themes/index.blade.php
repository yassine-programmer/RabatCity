@extends("layouts.app")

@section('css')
    <link  href="/css/styleTheme.css" rel="stylesheet">
    <link  href="/css/responsive/responsive.css" rel="stylesheet">
    <style>
        .add {
            opacity: 0.2;
            filter: alpha(opacity=40);
        }

        .add:hover {
            opacity: 1.0;
            filter: alpha(opacity=100);
        }
    </style>
    @endsection

@section("content")

    <!-- ****** Welcome Area Start ****** -->
    <section class="fplus-hero-area" style="background-image: url(/img/bg-img/hero-1.jpg)" id="home">
        <div class="hero-content-area d-flex justify-content-end">
            <div class="hero-text">
                <h2>{{$themes[0]->Theme_type}}</h2>
                @if(Session::get('role')=='admin' || Session::get('role')=='moderator')
                    <a href="/themes/create/{{$themes[0]->Theme_type}}" class="view-portfolio-btn" id="scrollDown">
                        <i class="fa fa-plus" aria-hidden="true"></i>Creer un theme</a>
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
                    <div class="section-heading text-center mt-3">
                        <h4>Themes</h4>
                        <div class="section-heading-line"></div>
                    </div>
                </div>
            </div>

            <div class="row top-buffer" >
                <!-- Single Blog Post Area -->
                @if(count($themes)>0)
                    @foreach($themes as $theme)
                        <div class="col-12 col-md-6 col-lg-4 mt-5">
                            <div class="fplus-single-blog-area wow fadeInUp" data-wow-delay="0.5s" onmouseover="ShowOnHover({{$theme->Theme_id}});" onmouseleave="Hide({{$theme->Theme_id}});">
                                <!-- Blog Thumbnail -->
                                <a href="/themes/{{$theme->Theme_id}}">
                                    <img  src="{{$theme->Theme_image}}"  alt="" style="height: 200px;width:400px; "></a>
                                <!-- Blog Content -->

                                <div class="fplus-blog-content">

                                    <a class="text-center" href="/themes/{{$theme->Theme_id}}"><h4>{{$theme->Theme_intitule}}</h4></a>
                                    <h6><?php
                                        echo substr($theme->Theme_description, 0, 28);
                                        ?>...</h6>
                                    @php($categories = App\Categorie::where([['Theme_id',$theme->Theme_id],['Cat_id',null]])->take(3)->get())

                                        <ul class="list-group list-group-flush">
                                            @for($i=0;$i<3;$i++)
                                            @if(isset($categories[$i]))
                                            <li class="list-group-item"><a href="/categories/{{$categories[$i]->Categorie_id}}" >
                                                        {{$categories[$i]->Categorie_intitule}}
                                                </a></li>
                                            @else
                                                    <li class="list-group-item"><a href="#">
                                                            ...
                                                        </a></li>
                                             @endif
                                            @endfor
                                                @if(Session::get('role')=='admin' || Session::get('role')=='moderator')
                                                    <li class="list-group-item d-none" id="manager_btn_{{$theme->Theme_id}}">
                                                        {!! Form::open([ 'action'=>['ThemesController@destroy',$theme->Theme_id],'method' => 'post' ,'class'=>'pull-right hidden','id'=>'form_'.$theme->Theme_id]) !!}
                                                        {{ Form::hidden('_method','DELETE') }}
                                                        <button class="btn btn-danger"  onclick="document.getElementById('form_{{$theme->Theme_id}}').submit();">
                                                            <i class="fa fa-trash-o fa-lg"></i> Delete</button>
                                                        {!! Form::close() !!}
                                                        <a class="btn btn-default btn-sm" id="Edit_btn" href="/themes/{{$theme->Theme_id}}/edit">
                                                            <i class="fa fa-cog"></i> Edit</a>
                                                    </li>
                                                @endif
                                        </ul>

                                </div>

                            </div>
                        </div>
                    @endforeach
                        <div class="col-12 col-md-6 col-lg-4" style="padding-top: 4%;">
                            <a href="/themes/create/{{$themes[0]->Theme_type}}">
                            <div class="fplus-single-blog-area wow fadeInUp add" data-wow-delay="0.5s" style=" border: 3px dashed" >




                                    <img src="https://i.imgur.com/7yPHMCB.png" style="width: 120px; margin-top: 50%; margin-bottom: 50%; margin-left: 29%;">



                        </table>
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
