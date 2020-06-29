
<div id="formContent" >
    <!-- Tabs Titles -->
    <div class="card-body  d-flex align-items-center justify-content-center text-center" >
        <div class="row d-flex align-items-center">
            <div class="col-12">
                <b id="result" style="font-size: 150%"><i class="fa fa-user-secret grow" aria-hidden="true"></i> Admin Area :</b>
            </div>
            @if(Session::get('role')=='admin')
                <div class="container text-center" style="margin: 100px;margin-top: 10px!important;">
                    <div class="btn-group">
                        <button class="btn btn-outline-secondary" onclick="showdiv('users')" >Afficher les utilisateurs</button>
                        <button class="btn btn-outline-secondary" onclick="showdiv('journals')">Afficher le journal</button>
                        <button class="btn btn-outline-secondary" onclick="showdiv('FB')">Update Post Facebook</button>
                        <button class="btn btn-outline-secondary" onclick="showdiv('Notification')">Notifications</button>
                    </div>

                    @include('Dashboard.ListAllUsers')
                    @include('Dashboard.Journal')
                    @include('Dashboard.Facebook')
                    @include('Dashboard.Notification')
                </div>
            @endif
        </div>
    </div>


</div>
