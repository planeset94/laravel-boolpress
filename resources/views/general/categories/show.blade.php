@extends ('layouts.app')

@section('js')
<script src="{{asset('js/app.js')}}" defer></script>    
@endsection
@section('content')
    <div id="root" class="container">
        <div class="form-group">
            <label for="category">Articles in:</label>
            <select class="border-0 bg-light" name="category" id="category" v-model="selected" >
                @foreach ($categories as $category_item)
                <option value="{{$category_item->id}}" {{$category_item->id === $category->id ? 'selected' : ''}}>{{$category_item->name}}</option>
            @endforeach
            </select>
        </div>
     
        {{-- VUE JS  --}}

        <div class="articles" v-for="article in articles">
            <h3 v-text="article.title"></h3>
      
        </div>




    </div>

@endsection

