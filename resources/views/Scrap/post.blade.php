<!--  -->
<!-- Section Tittle -->
<div class="small-tittle mb-20 grow">
    <h4 class="text-center"><a href="/Moreposts">Publications Recentes</a></h4>
</div>
<!-- Details -->
@php($post = App\Facebook::all())
    <div class="most-recent mb-40 grow">
        <div class="most-recent-img">
            <a href="https://www.facebook.com{{$post[1]->Facebook_url ?? ''}}">
                <img src="{{$post[1]->Facebook_image ?? ''}}" alt="">
            </a>
            <div class="most-recent-cap">
                <span class="bgbeg">Facebook</span>
                <h4 class="text-right pr-4"><a href="https://www.facebook.com{{$post[1]->Facebook_url ?? ''}}"
                                               data-toggle="tooltip" data-placement="top" title="{{$post[1]->Facebook_text}}"
                    >
                        @php($titre = substr($post[1]->Facebook_text,0,100))
                        @if(strlen($post[1]->Facebook_text)>100){{$titre}}...
                        @else{{$titre}} @endif
                        </a></h4>

                <p class="text-center">Publier - {{$post[1]->Facebook_time ?? ''}}</p>
            </div>
        </div>
    </div>

<!-- Single -->
@for($i=2;$i<5;$i++)
    <div class="rounded most-recent-single grow" style="border-top:1px solid #ccc!important;border-bottom:1px solid #ccc!important;
    box-shadow: 1px 1px 12px #b8b894;">
        <div class="most-recent-images">
            <a href="https://www.facebook.com{{$post[$i]->Facebook_url ?? ''}}">
                <img style="max-width: 6em;" src="{{$post[$i]->Facebook_image ?? ''}}" alt=""></a>
        </div>
        <div class="most-recent-capt">
            <h4 class="text-right pr-4" ><a href="https://www.facebook.com{{$post[$i]->Facebook_url ?? ''}}"
                                            data-toggle="tooltip" data-placement="top" title="{{$post[$i]->Facebook_text}}"
                >
                    @php($titre = substr($post[$i]->Facebook_text,0,100))
                    @if(strlen($post[$i]->Facebook_text)>100){{$titre}}...
                    @else{{$titre}} @endif
                    </a></h4>
            <hr>
            <p class="text-center" style="padding-bottom: 8px">Publier - {{$post[$i]->Facebook_time ?? ''}}</p>
        </div>
    </div>
@endfor
<div class="container-contact100-form-btn" style="margin-top: 0px ; margin-left: 30% !important;">
    <button class="contact100-form-btn" style="min-width: 78px;height: 31px !important;margin-top: 20%;"><a class="text-white" href="/Moreposts">Plus +</a></button>
</div>
