@extends("layouts.app")
@section("content")
    <div>
        <div  class="container text-center">
            <h1>{{$themes[0]->Theme_type}}</h1>
            <br>

            @if(Session::get('role')=='admin' || Session::get('role')=='moderator') <a href="/themes/create/{{$themes[0]->Theme_type}}">Ajouter</a> @endif
            @if(count($themes)>0)
                @foreach($themes as $theme)

                    <b>Le type du theme: {{$theme->Theme_type}}</b>

<<<<<<< HEAD
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
                    <div class="section-heading text-center">
                        <h4>Themes</h4>
                        <div class="section-heading-line"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Single Blog Post Area -->
                @if(count($themes)>0)
                    @foreach($themes as $theme)
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="fplus-single-blog-area wow fadeInUp" data-wow-delay="0.5s">
                                <!-- Blog Thumbnail -->
                                <img  src="{{$theme->Theme_image}}"  alt="" style="height: 200px;width:400px; ">
                                <!-- Blog Content -->
                                {!! Form::open([ 'action'=>['ThemesController@destroy',$theme->Theme_id],'method' => 'post' ,'class'=>'pull-right']) !!}
                                <div class="fplus-blog-content">

                                    <h3>{{$theme->Theme_intitule}}</h3>
                                    <h5>{{$theme->Theme_description}}</h5>
                                    @php($categories = App\Categorie::where([['Theme_id',$theme->Theme_id],['Cat_id',null]])->take(3)->get())
                                    @if(count($categories)== 1)
                                        <ul class="list-group list-group-flush">
                                            @foreach($categories as $categorie)
                                            <li class="list-group-item"><a href="/categories/{{$categorie->Categorie_id}}" >
                                                        {{$categorie->Categorie_intitule}}
                                                </a></li>
                                            @endforeach
                                            <li class="list-group-item"><a href="#" >
                                                        ...
                                                </a></li>
                                            <li class="list-group-item"><a href="#" >
                                                        ...
                                                 </a></li>
                                                @if(Session::get('role')=='admin' || Session::get('role')=='moderator')
                                                    <li class="list-group-item">
                                                        <a class="btn btn-danger" href="#">
                                                            <i class="fa fa-trash-o fa-lg"></i> Delete</a>
                                                        <a class="btn btn-default btn-sm" href="#">
                                                            <i class="fa fa-cog"></i> Settings</a>
                                                    </li>
                                                @endif
                                        </ul>
                                    @elseif(count($categories)== 2)
                                        <ul class="list-group list-group-flush">
                                             @foreach($categories as $categorie)
                                             <li class="list-group-item"><a href="/categories/{{$categorie->Categorie_id}}" >
                                                          {{$categorie->Categorie_intitule}}
                                                  </a></li>
                                            @endforeach
                                             <li class="list-group-item"><a href="#" >
                                                     ...
                                                 </a></li>
                                                 @if(Session::get('role')=='admin' || Session::get('role')=='moderator')
                                                     <li class="list-group-item">
                                                         <a class="btn btn-danger" href="#">
                                                             <i class="fa fa-trash-o fa-lg"></i> Delete</a>
                                                         <a class="btn btn-default btn-sm" href="#">
                                                             <i class="fa fa-cog"></i> Settings</a>
                                                     </li>
                                                 @endif
                                        </ul>
                                    @elseif(count($categories)== 3)
                                         <ul class="list-group list-group-flush">
                                             @foreach($categories as $categorie)
                                                 <li class="list-group-item"><a href="/categories/{{$categorie->Categorie_id}}" >
                                                         {{$categorie->Categorie_intitule}}
                                                     </a></li>
                                             @endforeach
                                                 @if(Session::get('role')=='admin' || Session::get('role')=='moderator')
                                                     <li class="list-group-item">
                                                         <a class="btn btn-danger" href="#">
                                                             <i class="fa fa-trash-o fa-lg"></i> Delete</a>
                                                         <a class="btn btn-default btn-sm" href="#">
                                                             <i class="fa fa-cog"></i> Settings</a>
                                                     </li>
                                                 @endif
                                         </ul>
                                    @else
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item"><a href="#" >...</a></li>
                                            <li class="list-group-item"><a href="#" >...</a></li>
                                            <li class="list-group-item"><a href="#" >...</a></li>
                                            @if(Session::get('role')=='admin' || Session::get('role')=='moderator')
                                                <li class="list-group-item">
                                                    <a class="btn btn-danger" href="#">
                                                        <i class="fa fa-trash-o fa-lg"></i> Delete</a>
                                                    <a class="btn btn-default btn-sm" href="#">
                                                        <i class="fa fa-cog"></i> Settings</a>
                                                </li>
                                            @endif
                                        </ul>
                                    @endif
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <!-- ****** Blog Area End ****** -->
@endsection
=======
                    <br>
                    <b>Theme intitule : {{$theme->Theme_intitule}}</b>
                    <br>
                    <b>image : {{$theme->Theme_image}}</b><br>
                    <a href="/themes/{{$theme->Theme_id}}">Afficher</a>
                    {!! Form::open([ 'action'=>['ThemesController@destroy',$theme->Theme_id],'method' => 'post' ,'class'=>'pull-right']) !!}
                    @if(Session::get('role')=='admin' || Session::get('role')=='moderator')

                        <a href="/themes/{{$theme->Theme_id}}/edit">Edit</a>
                        {{ Form::hidden('_method','DELETE') }}
                        {{ Form::submit('Delete',['class'=>'btm btn-danger']) }}

                    @endif

                    {!! Form::close() !!}

>>>>>>> origin/master

                @endforeach
            @endif
        </div>

    </div>
@endsection
