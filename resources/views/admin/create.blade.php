@extends ('layouts.admin')


@section('content')
    {{-- @include('partials.errors') --}}
    <div class="container">
        <a href="{{ route('admin.index') }}" class="text-muted">Dashbord</a>
        <form action="{{ route('admin.store') }}" method="post">

            @csrf
            <div class="form-group">
                {{-- <label for="title">Title</label> --}}
                <input type="text" class="form-control @error('title') is invalid @enderror" name="title" id="title"
                    aria-describedby="titleId" placeholder="Title" minlength="5" max="50" value="{{ old('title') }}"
                    required>
                <small id="titleId" class="form-text text-muted pl-2">Add a Title</small>
            </div>


            <div class="form-group">
                <textarea class="form-control @error('title') is invalid @enderror" name="intro" id="introId" rows="1"
                    value="{{ old('intro') }}"></textarea>
                <small id="introId" class="form-text text-muted pl-2">Add an introduction</small>
            </div>

            <div class="form-group">
                <textarea class="form-control @error('title') is invalid @enderror" name="text" id="textId" rows="3"
                    value="{{ old('text') }}" required></textarea>
                <small id="textId" class="form-text text-muted pl-2">Write your article</small>
            </div>

            <div class="form-group">
                <input type="text" class="form-control @error('title') is invalid @enderror" name="author" id="author"
                    aria-describedby="authorId" placeholder="Author" max="30" value="{{ old('author') }}" required>
                <small id="authorId" class="form-text text-muted">Who's the author?</small>
            </div>

            <div class="form-group">
                <input type="text" class="form-control @error('title') is invalid @enderror" name="picture" id="picture"
                    aria-describedby="pictureId" placeholder="https://" max="300" value="{{ old('picture') }}">
                <small id="pictureId" class="form-text text-muted">Place an Url image</small>
            </div>

            <div class="form-group">
                <input type="date" class="form-control" name="time" id="time" aria-describedby="timeId"
                    value="{{ old('time') }}" required>
                <small id="timeId" class="form-text text-muted">Pubblication date</small>
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>


        </form>

    </div>
@endsection