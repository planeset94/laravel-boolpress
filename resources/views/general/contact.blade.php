@extends('layouts.app')

@section('content')
    <div class="container p-4">
    <h3 class="text-muted">Keep in touch</h3>
        <form action="{{ route('contacts.send') }}" method="post">
            @csrf
            {{-- nome --}}
            <div class="form-group">
                <input type="text" class="form-control" name="name" id="name" aria-describedby="nameId" placeholder="Name">
                <small id="nameId" class="form-text text-muted pl-2">Write your name</small>
            </div>
            {{-- Email --}}
            <div class="form-group">
                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailId"
                    placeholder="Email">
                <small id="emailId" class="form-text text-muted pl-2">Write your email</small>
            </div>
            {{-- Body --}}
            <div class="form-group">
                <textarea class="form-control" name="body" id="bodyId" rows="3" value=""
                    required>{{ old('text') }}</textarea>
                <small id="bodyId" class="form-text text-muted pl-2">Leave your message</small>
            </div>
            {{-- submit --}}

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
