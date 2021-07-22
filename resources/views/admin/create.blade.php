@extends ('layouts.admin')


@section('content')

    <div class="container">
        <form action="" method="post">

            <div class="form-group">
                {{-- <label for="title">Title</label> --}}
                <input type="text" class="form-control" name="title" id="title" aria-describedby="titleId"
                    placeholder="Title">
                <small id="titleId" class="form-text text-muted pl-2">Add a Title</small>
            </div>


            <div class="form-group">
                <textarea class="form-control" name="intro" id="introId" rows="2"></textarea>
                <small id="introId" class="form-text text-muted pl-2">Add an introduction</small>
            </div>

            <div class="form-group">
                <textarea class="form-control" name="text" id="textId" rows="8"></textarea>
                <small id="textId" class="form-text text-muted pl-2">Write your article</small>
            </div>









        </form>

    </div>
@endsection
