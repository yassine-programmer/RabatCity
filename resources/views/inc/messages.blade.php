@if(count($errors) > 0)
    @foreach($errors->all() as $error)
        <script>
            alert('{{$error}}');
        </script>
        @endforeach
    @endif

