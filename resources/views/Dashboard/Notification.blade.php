<div id="Notification" class="d-none">

        <div class="container align-items-center ">

            <div>
                <h4><b>Activer ou desactiver les notifications</b></h4>
            </div>
            <br>
             <div class="mt-5">
                 @if(!$user->Admin_notify ?? '')
                <div class=" container alert alert-info">
                    <div class="text-left">Activer les notifications par Mail
                        <a href="/notify"><button style="margin-top: -7px" class="btn btn-info float-right">Activer</button></a>
                    </div>
                </div>
                 @else
                <div class=" container alert alert-danger">
                    <div class="text-left">Desactiver les notifications par Mail
                        <a href="/notify"><button style="margin-top: -7px" class="btn btn-danger float-right">Desactiver</button></a>
                    </div>
                </div>
                @endif
            </div>
        </div>

</div>
