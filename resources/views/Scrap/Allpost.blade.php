@extends("layouts.app")
@section("css")
    <style>
        a.My_post_link{
            display: block;
            width: 100%;
            height: 100%;
        }
        .My_post{
            border: 1px solid #ccc!important;
            margin-top: 5%;
            box-shadow: 1px 1px 12px #0b4e96;
        }
        .My_post2{
            margin-top: 20px;
        }
        .My_post_title{
            color: #071f32;
        }
        .My_post_title:hover{
            color: #3f51b5;
        }
        .My_post_text{
            margin-top: 3%;
            font-family: cursive;
            font-weight: 100 ;
            color: #0D3059;
        }
        .My_post_text:hover{
            color: #3f51b5;
            font-size: 15px;
        }
        .My_post_time{
            color: darkgray;
        }
        .My_post_time:hover{
            text-decoration: underline;
        }
    </style>
@endsection

@section("content")

    <link rel="stylesheet" href="/assets/css/style.css">
    <section class="fplus-about-us-area bg-gray section-padding-120" id="about">
        <div class="container justify-content-center">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-heading text-center mt-3">
                            <h4>Publications</h4>
                            <div class="section-heading-line"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center" >
                <div class="col col-8" >
                    @php($posts = App\Facebook::all())
                    @if(count($posts)>0)
                        @foreach($posts as $post)
                                <div class="container rounded  bg-white My_post">
                                    <a class="My_post_link" href="https://www.facebook.com{{$post->Facebook_url}}">
                                    <div class="most-recent-img My_post2">
                                        <h4 class="text-center My_post_title">
                                                Arrondissement Agdal Ryad - مجلس مقاطعة أكدال الرياض
                                        </h4>
                                        <hr>
                                        <div class="text-center">
                                                <img  src="{{$post->Facebook_image}}" alt="">
                                        </div>
                                        <div class="container">
                                            <div class="text-center most-recent-cap My_post_text">
                                                @if($post->Facebook_text <> 'Arrondissement Agdal Ryad - مجلس مقاطعة أكدال الرياض')
                                                    {{$post->Facebook_text}}
                                                @endif
                                                <hr>
                                                <p class="text-left My_post_time">Publier - {{$post->Facebook_time}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    </a>
                                </div>

                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')


@endsection
