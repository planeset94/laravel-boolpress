@extends('layouts.admin')



@section('content')
    @if(session('message'))

    <div class="alert alert-success" role="alert">
        <strong>{{session('message')}}</strong>
    </div>

    @endif



    <div class="container p-4">
           <a class="btn btn-primary btn-md mb-2 float-right font-weight-bold" href="{{ route('admin.articles.create') }}" role="button">Create new article</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Category</th>
                    <th>Tag</th>
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
                        <td>{{ $article->category ? $article->category->name : 'Uncategorized' }}</td>
                        <td>
                            <div class="tags pl-3">
                                @forelse($article->tags as $tag)
                                    <small>{{$tag->name}}</small>
                                @empty
                                    <small>No tags yet</small>
                                @endforelse
                            </div>           
                        <td>
                        <!-- Image -->
                            @if ($article->picture)
                                <img src="{{ asset('storage/' . $article->picture) }}" class="img-fluid mb-3 mb-md-0"
                                    width="200px" height="200px">
                            @endif
                        <!-- /Image -->
                    </td>

                        
                        <td>{{ $article->title }}</td>
                        <td>{{ $article->intro }}</td>
                        <td>{{ $article->text }}</td>
                        <td>{{ $article->author }}</td>
                        <td>{{ $article->time }}</td>
                        <td>
                            {{-- <a href="{{ route('admin.articles.show', $article->id) }}">View</a>
                            <a href="{{ route('admin.articles.edit', $article->id) }}">Edit</a> --}}
                            <a class=" btn btn-success btn-md mb-2 p-0 w70-btn"
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
