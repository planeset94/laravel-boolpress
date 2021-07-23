@extends('layouts.admin')



@section('content')

    <div class="container p-4">

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
                            <a href="{{ route('admin.edit', $article->id) }}">Edit</a>


                            {{-- Delete Command --}}
                            <form action="{{ route('admin.delete', $article->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><i
                                        class="fas fa-trash fa-xs fa-fw"></i>Delete</button>
                            </form>


                        </td>

                    </tr>
                </tbody>
            @endforeach
        </table>



    </div>

@endsection
