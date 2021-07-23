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
                <img src="{{ $article->picture }}" alt="..." class="img-fluid image mb-3 mb-md-0">

            </div>



            <div class="col-8">

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
