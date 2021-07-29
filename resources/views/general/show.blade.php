@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/general/home.css') }}">
@endsection
@section('content')

    <div class="container section pb-0">

        <!-- nav -->
        <nav class="d-flex  mb-5 pb-md-0">
            <a class="text-muted text-xs mb-2" href="{{ route('article.index') }}">
                Home
            </a>

        </nav> 
        


        <div class="row">

            <div class="col-3 d-flex">

                <!-- Image -->
                    @if ($article->picture)
                        <img src="{{ asset('storage/' . 'article_images/'.$article->picture) }}" class="img-fluid mb-3 mb-md-0"
                            width="250px" height="250px" style="object-fit:contain">
                    @endif
                <!-- /Image -->

            </div>



            <div class="col-8">
            
                <!-- Category & Tags -->
                    <div class="cat-tag d-flex align-items-center">
            
                    <small class=""> Category: {{ $article->category ? $article->category->name : 'Uncategorized' }}</small>

                    <div class="tags pl-3">
                        <small style="text-decoration:bold">Tags:</small>
                            @forelse($article->tags as $tag)
                                <small>{{$tag->name}}</small>
                            @empty
                                <small>No tags yet</small>
                            @endforelse
                    </div>
                </div>
                <!-- /Category & Tags -->
            

                <!-- Heading -->
                <h4 class="pb-2">
                    {{ $article->title }}
                </h4>


                <!-- Text -->
                <p class="col-12 mb-0 text-sm text-muted">
                    {{ $article->text }}
                </p>

                <!-- Meta -->
                <p class="author text-xs text-muted">
                    by <strong class="text-body">{{ $article->author }}</strong> {{ $article->time }} days
                    ago
                </p>

            </div>



            <!-- / .row -->

            <hr class="my-4">


        </div> <!-- / .row -->
    </div>


@endsection
