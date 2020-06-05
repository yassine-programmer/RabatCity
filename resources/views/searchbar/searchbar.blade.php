
       
        {!! Form::open(['action' => 'SearchController@store', 'method' => 'post','id'=>'Textsearch']) !!}

        <div class="Searchcontainer">
            <input name="mySearch" type="text" placeholder="Search..." required>
            <div class="search"></div>
        </div>


        {!! Form::close() !!}
