
<div id="formContent" >
    <!-- Tabs Titles -->
    <div class="card-body  d-flex align-items-center justify-content-center text-center" >
        <div class="row d-flex align-items-center">
            <div class="col-12">
                <b id="result" style="font-size: 150%"><i class="fa fa-file-archive-o grow" aria-hidden="true"></i>  Archive :</b>
            </div>
            @if(Session::get('role')=='admin')
                <div class="container text-center" style="margin: 100px;margin-top: 10px!important;">
                    <div class="btn-group">
                        <button class="btn btn-outline-secondary" onclick="showdiv2('themes')" >Themes</button>
                        <button class="btn btn-outline-secondary" onclick="showdiv2('categories')">Categories</button>
                        <button class="btn btn-outline-secondary" onclick="showdiv2('articles')">Articles</button>
                    </div>
                    <br>
                        @include('Archive.ThemesArchives')

                       @include('Archive.CategoriesArchives')

                        @include('Archive.ArticlesArchives')

                </div>
            @endif
        </div>
    </div>


</div>
