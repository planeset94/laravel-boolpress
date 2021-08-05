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
            
                {{-- VUE JS  --}}
        <div class="container my-5">
            <article-component  
                v-for="article in articles"
                v-if="article.visibile"
                v-bind:key="article.id"
                v-bind:title="article.title"
                v-bind:text="article.text"
                v-bind:author="article.author">
            </article-component>
        </div>


   

  




@endsection

