@extends ('layouts.app')



@section('content')
    <div id="root" class="container">
        <div class="form-group">
            <label for="category">Articles in: </label>
            <select id="valore" class="border-0 bg-light" name="category" id="category" >
                @foreach ($categories as $category_item)
                <option value="{{$category_item->id}}" {{$category_item->id === $category->id ? 'selected' : ''}}>{{$category_item->name}}</option>
            @endforeach
            </select>
        </div>
     
        {{-- VUE JS  --}}

        <div class="articles" v-for="article in articles">
            <h3>@{{article['title']}}</h3>
      
        </div>




    </div>

@endsection

