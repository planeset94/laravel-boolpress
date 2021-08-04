@extends ('layouts.app')



@section('content')
    <div id="root" class="container">
        <div class="form-group">
            <label for="category">Articles in: </label>
            <select name="category" id="category" v-model="search" v-on:change="filterData()">                 
                <option selected>All</option>                    
                @foreach ($categories as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>                    
                @endforeach


            </select>
        

        </div>
{{--      
        {{-- VUE JS  --}}

        <div class="articles" v-for="article in articles" >
       
                <div class="article-container" v-if="article.visibile" >
                        <div class="col-12">
                            <h4>@{{article['title']}}</h4>
                            <p>@{{article['text']}}</p>
                            <small>@{{article['author']}}</small>
                        </div>                        
                    <hr class="my-4">
                </div>

           
        </div> 

        <blog-post title="My journey with Vue"></blog-post>




@endsection

