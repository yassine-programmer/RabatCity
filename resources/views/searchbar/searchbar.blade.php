<div>
    <div class="search">
        {!! Form::open(['action' => 'SearchController@index', 'method' => 'post','id'=>'search']) !!}
        </div>
        <input type="text" name="haha" class="searchTerm" placeholder="What are you looking for?">
        <button type="submit" class="searchButton" onclick="document.getElementById('search').submit()">
            <i class="fa fa-search"></i>
        </button>
    {{Form::submit('Ajouter',['class' =>'btn btn-primary'])}}
        {!! Form::close() !!}
    </div>
</div>
