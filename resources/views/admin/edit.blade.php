@extends ('layouts.admin')



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


    <div class="container pb-0">
        <nav class="d-flex  mb-5">
            <a class="text-muted text-xs mb-2" href="{{ route('admin.articles.index') }}">
                Back
            </a>

        </nav>

        <h3 class="text-muted pb-3">Edit Article</h3>

        <form action="{{ route('admin.articles.update', $article->id) }}" method="post" enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <div class="form-group">
                {{-- <label for="title">Title</label> --}}
                <input type="text" class="form-control @error('title') is invalid @enderror" name="title" id="title"
                    aria-describedby="titleId" placeholder="Title" minlength="5" max="50" value="{{ $article->title }}"
                    required>
                <small id="titleId" class="form-text text-muted pl-2">Edit this Title</small>
            </div>


            <div class="form-group">
                <textarea class="form-control @error('title') is invalid @enderror" name="intro" id="introId" rows="1"
                    value="">{{ $article->intro }}</textarea>
                <small id="introId" class="form-text text-muted pl-2">Edit this introduction</small>
            </div>

            <div class="form-group">
                <textarea class="form-control @error('title') is invalid @enderror" name="text" id="textId" rows="3"
                    value="" required>{{ $article->text }}</textarea>
                <small id="textId" class="form-text text-muted pl-2">Edit this article</small>
            </div>

            {{-- Categoria --}}
            <div class="form-group">
                <label for="category_id">Categories</label>
                <select class="form-control" name="category_id" id="category_id">
                    <option value="" selected>Select a category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{-- Se, ad ogni iterazione, l'id della 
                            singola categoria combacia con la chiave esterna dell'articolo, allora seleziona la categoria corrispondente --}}
                            {{ $category->id === $article->category_id ? 'selected' : '' }}>{{ $category->name }}
                        </option>
                    @endforeach

                </select>
            </div>
            {{-- /Categoria --}}

            <div class="form-group">
                <input type="text" class="form-control @error('title') is invalid @enderror" name="author" id="author"
                    aria-describedby="authorId" placeholder="Author" max="30" value="{{ $article->author }}" required>
                <small id="authorId" class="form-text text-muted">Edit this author</small>
            </div>

            {{-- Immagine --}}
            <div class="form-group">
                <input type="file" class="form-control-file @error('title') is invalid @enderror" name="picture"
                    id="picture" aria-describedby="pictureId" placeholder="https://" max="300"
                    value="{{ $article->picture }}">
                <small id="pictureId" class="form-text text-muted">Edit this Url image</small>
            </div>
            <img src="{{ asset('storage/' . $article->picture) }}" width="200px" height="200px">
            {{-- /Immagine --}}

            <div class="form-group">
                <input type="date" class="form-control" name="time" id="time" aria-describedby="timeId"
                    value="{{ $article->time }}" required>
                <small id="timeId" class="form-text text-muted">Edit this pubblication date</small>
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>


        </form>

    </div>
@endsection
