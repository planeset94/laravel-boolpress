@extends ('layouts.admin')


{{-- @include('partials.errors') Mi da errore --}}
@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif






    <div class="container">


       <nav class="d-flex  mb-5">
            <a class="text-muted text-xs mb-2" href="{{ route('admin.articles.index') }}">
                Back
            </a>

        </nav>

        <h3 class="text-muted pb-3">Edit Article</h3>

         <form action="{{ route('admin.articles.store') }}" method="post" enctype="multipart/form-data">

            @csrf
            <div class="form-group">
                {{-- <label for="title">Title</label> --}}
                <input type="text" class="form-control @error('title') is invalid @enderror" name="title" id="title"
                    aria-describedby="titleId" placeholder="Title" minlength="5" max="50" value="{{ old('title') }}"
                    required>
                <small id="titleId" class="form-text text-muted pl-2">Add a Title</small>
            </div>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror


            <div class="form-group">
                <textarea class="form-control @error('intro') is invalid @enderror" name="intro" id="introId" rows="1"
                    value="">{{ old('intro') }}</textarea>
                <small id="introId" class="form-text text-muted pl-2">Add an introduction</small>
            </div>
            @error('intro')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <textarea class="form-control @error('text') is invalid @enderror" name="text" id="textId" rows="3"
                    value="" required>{{ old('text') }}</textarea>
                <small id="textId" class="form-text text-muted pl-2">Write your article</small>
            </div>
              @error('text')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror


        {{-- Category--}}
            <div class="form-group">
                <label for="category_id">Categories</label>
                <select class="form-control" name="category_id" id="category_id">
                    <option selected disabled>Select a category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach

                </select>
            </div>
        {{-- /Category--}}

        {{-- Tag--}}
        <div class="form-group">
          <label for="tags">Tag</label>
          <select multiple class="form-control" name="tags[]" id="tags">
          <option value="" disabled>Select a tag</option>
           @if($tags)
           @foreach($tags as $tag)
            <option value="{{$tag->id}}">{{$tag->name}}</option>
            @endforeach
        @endif
          </select>
        </div> 
        {{-- /Tag--}}


            <div class="form-group">
                <input type="text" class="form-control @error('author') is invalid @enderror" name="author" id="author"
                    aria-describedby="authorId" placeholder="Author" max="30" value="{{ old('author') }}" required>
                <small id="authorId" class="form-text text-muted">Who's the author?</small>
            </div>
              @error('author')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

        {{--Immagini--}}
            <div class="form-group">
                <input type="file" class="form-control-file @error('picture') is invalid @enderror" name="picture"
                    id="picture" aria-describedby="pictureId"
                    value="{{ old('picture') }}">
                <small id="pictureId" class="form-text text-muted">Place an Url image</small>
            </div>
              @error('picture')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

        {{--/Immagini--}}

            <div class="form-group">
                <input type="date" class="form-control" name="time" id="time" aria-describedby="timeId"
                    value="{{ old('time') }}" required>
                <small id="timeId" class="form-text text-muted">Pubblication date</small>
            </div>
              @error('time')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <button type="submit" class="btn btn-primary">Submit</button>


        </form>

    </div>
@endsection
