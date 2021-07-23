@extends('layouts.admin')



@section('content')

    <div class="container p-4">

        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
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

                        <td>{{ $article->id }}</td>
                        <td>
                            {{-- <img src="{{ $article->picture }}" width="200px" height="200px"> --}}

                            <img src="{{ asset('storage/article_images/' . $article->picture) }}" width="200px"
                                height="200px">
                            {{-- <img src="{{ asset('storage/' . $article->picture) }}" width="200px" height="200px"> --}}
                            {{-- @if ($article->picture)
                            @endif --}}
                        </td>
                        <td>{{ $article->title }}</td>
                        <td>{{ $article->intro }}</td>
                        <td>{{ $article->text }}</td>
                        <td>{{ $article->author }}</td>
                        <td>{{ $article->time }}</td>
                        <td>
                            {{-- <a href="{{ route('admin.articles.show', $article->id) }}">View</a>
                            <a href="{{ route('admin.articles.edit', $article->id) }}">Edit</a> --}}
                            <a class="btn btn-success btn-md mb-2 p-0 w70-btn"
                                href="{{ route('admin.articles.show', $article->id) }}" role="button"
                                width="66px;">View</a>
                            <a class="btn btn-warning btn-md mb-2 p-0 w70-btn"
                                href="{{ route('admin.articles.edit', $article->id) }}" role="button">Edit</a>





                            {{-- MODALE --}}

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger btn-md mb-2 p-0 w70-btn" data-toggle="modal"
                                data-target="#article--{{ $article->id }}">
                                Delete
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="article--{{ $article->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="article--{{ $article->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Attention</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            You are going to delete definitely this Article. Are you sure?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Go
                                                Back</button>
                                            {{-- Delete Command --}}
                                            <form action="{{ route('admin.articles.destroy', $article->id) }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"><i
                                                        class="fas fa-trash fa-xs fa-fw"></i>Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </td>

                    </tr>
                </tbody>
            @endforeach
        </table>


        {{ $articles->links() }}
    </div>

@endsection
