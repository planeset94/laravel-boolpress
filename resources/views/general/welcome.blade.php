@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/general/home.css') }}">
@endsection
@section('content')


    <div class="row p-5 align-items-center">
        <div class="col-12 text-center">

            <!-- Image -->
            <img class="news" src="https://media.vanityfair.it/static/img/channel-news.png" alt="..."
                class="img-fluid img-incline-left mb-3 mb-md-0">

        </div>
        {{-- <div class="col-12 col-md-6 order-md-1">

            <!-- / .row -->

            <!-- Heading -->
            <h1 class="mb-4 font-weight-bold">
                Welcome to my Fabulous Blog!
            </h1>
        </div> --}}
    </div>



    <div class="container section pb-0">
        <div class="row">
            <div class="col-12 col-md-3 col-lg-2 order-md-2 pl-md-4 border-left">

                <!-- Title -->
                <h6 class="title">
                    Categories
                </h6>

                <!-- Sidenav -->
                <nav class="sidenav d-flex flex-column mb-5 mb-md-0">
                    <a class="text-uppercase text-xs mb-2" href="#!">
                        About Me
                    </a>
                    <a class="text-uppercase text-xs mb-2" href="#!">
                        Contacts
                    </a>

                </nav>

            </div>
            <div class="col-12 col-md-9 col-lg-10 order-md-1">


                @foreach ($articles as $article)
                    <a class="row align-items-center text-nounderline" href="{{ route('article.show', $article->id) }}">
                        <div class="col-12 col-md-3">

                            <!-- Image -->
                            <img src="{{ $article->picture }}" alt="..." class="img-fluid mb-3 mb-md-0">

                        </div>
                        <div class="col-12 col-md-9">

                            <!-- Meta -->
                            <p class="mb-2 text-xs text-muted">
                                by <strong class="text-body">{{ $article->author }}</strong>
                                {{ $article->time }}
                                {{-- {{ (date('Y-m-d') - $article->time)->format('D') }} --}}

                            </p>

                            <!-- Heading -->
                            <h4>
                                {{ $article->title }}
                            </h4>

                            <!-- Text -->
                            <p class="mb-0 text-sm text-muted">
                                {{ $article->intro }}
                            </p>

                        </div>
                    </a>
                    <!-- / .row -->

                    <hr class="my-4">
                @endforeach



            </div>
        </div> <!-- / .row -->
    </div>


@endsection
