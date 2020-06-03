<!--  -->
<!-- Section Tittle -->
<div class="small-tittle mb-20">
    <h4>Most Recent</h4>
</div>
<!-- Details -->
@php($post = App\Facebook::all())
    <div class="most-recent mb-40">
        <div class="most-recent-img">
            <img src="{{$post[1]->Facebook_image ?? ''}}" alt="">
            <div class="most-recent-cap">
                <span class="bgbeg">Facebook</span>
                <h4><a href="https://www.facebook.com{{$post[1]->Facebook_url ?? ''}}"><?php
                        echo substr($post[1]->Facebook_text ?? '', 0, 100);
                        ?>...</a></h4>
                <p>Publier - {{$post[1]->Facebook_time ?? ''}}</p>
            </div>
        </div>
    </div>
<!-- Single -->
@for($i=2;$i<5;$i++)
    <div class="most-recent-single">
        <div class="most-recent-images">
            <a href="https://www.facebook.com{{$post[$i]->Facebook_url ?? ''}}">
                <img style="max-width: 6em;" src="{{$post[$i]->Facebook_image ?? ''}}" alt=""></a>
        </div>
        <div class="most-recent-capt">
            <h4><a href="https://www.facebook.com{{$post[$i]->Facebook_url ?? ''}}">

                        <?php
                        echo substr($post[$i]->Facebook_text ?? '', 0, 100).'...';
                        ?>
                    </a></h4>
            <br>
            <p>Publier - {{$post[$i]->Facebook_time ?? ''}}</p>
        </div>
    </div>
@endfor
<div class="container-contact100-form-btn" style="margin-top: 0px ; margin-left: 30% !important;">
    <button class="contact100-form-btn" style="min-width: 78px;height: 31px !important;"><a class="text-white" href="/Moreposts">Plus +</a></button>
</div>
