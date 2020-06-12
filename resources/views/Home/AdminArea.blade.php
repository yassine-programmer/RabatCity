
<div id="formContent" style="text-align: left">
    <!-- Tabs Titles -->
    <div class="card-header  justify-content-start" >
        <div class="row d-flex align-items-center">
            <div class="col-8">
                <b id="result" style="font-size: 150%">Admin Area :</b>
            </div>
            @if(Session::get('role')=='admin')
                <div class="container text-center" style="margin: 100px;">
                    <button  class="btn btn-outline-secondary" onclick="showdiv('users')" style="width: 300px">Afficher les utilisateurs</button>
                    <br>
                        @include('Dashboard.ListAllUsers')
                    <br>
                    <button  class="btn btn-outline-secondary" onclick="showdiv('journals')" style="width: 300px">Afficher le journal</button>
                    <br>
                        @include('Dashboard.Journal')
                    <br>
                    <a href="/scraping" class="btn btn-outline-secondary" onclick="return confirm('Est-ce que vous voulez mettre a jour les posts facebook ?')" style="width: 300px;">Update Post Facebook</a>
                </div>
            @endif
        </div>
    </div>


</div>
