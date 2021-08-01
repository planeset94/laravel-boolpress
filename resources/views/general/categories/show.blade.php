@extends ('layouts.app')

@section('js')
<script src="{{asset('js/app.js')}}" defer></script>    
@endsection
@section('content')
<div id="root">
    <div class="container">
        <div class="form-group">
            <label for="category">Articles in:</label>
            <select class="border-0 bg-light" name="category" id="category" >
                <option value="{{$category->id}}" selected>{{$category->name}}</option>
                @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
            </select>
        </div>
    </div>
</div>



@endsection

