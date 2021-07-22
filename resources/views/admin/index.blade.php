@extends('layouts.admin')



@section('content')

    <div class="container">

        <table class="table">
            <thead>
                <tr>
                    <th>Picture</th>
                    <th>Title</th>
                    <th>Intro</th>
                    <th>Article</th>
                    <th>Author</th>
                    <th>Date</th>
                    <th>Operations</th>
                </tr>
            </thead>

            @foreach ($articles as $article)
                <tbody>
                    <tr>

                        <td><img src="{{ $article->picture }}" width="200px" height="200px">
                        </td>
                        <td>{{ $article->title }}</td>
                        <td>{{ $article->intro }}</td>
                        <td>{{ $article->text }}</td>
                        <td>{{ $article->author }}</td>
                        <td>{{ $article->time }}</td>
                        <td>
                            <a href="{{ route('admin.show', $article->id) }}">View</a>
                            <a href="">Edit</a>
                            <a href="">Delete</a>
                        </td>

                    </tr>
                </tbody>
            @endforeach
        </table>



    </div>

@endsection
