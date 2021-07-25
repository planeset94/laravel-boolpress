@extends('layouts.app')

@section('content')
    <div class="container p-4">
        <form action="" method="post">
            {{-- nome --}}
            <div class="form-group">
                <input type="text" class="form-control" name="name" id="name" aria-describedby="nameId" placeholder="Name">
                <small id="nameId" class="form-text text-muted pl-2">Write your name</small>
            </div>
            {{-- Lname --}}
            <div class="form-group">
                <input type="text" class="form-control" name="lname" id="lname" aria-describedby="lnameId"
                    placeholder="Last name">
                <small id="lnameId" class="form-text text-muted pl-2">Write your last name</small>
            </div>
            {{-- Message --}}
            <div class="form-group">
                <textarea class="form-control @error('title') is invalid @enderror" name="message" id="messageId" rows="3"
                    value="" required>{{ old('text') }}</textarea>
                <small id="messageId" class="form-text text-muted pl-2">Leave your message</small>
            </div>
            {{-- Email --}}
            <div class="form-group">
                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailId"
                    placeholder="Email">
                <small id="emailId" class="form-text text-muted pl-2">Write your email</small>
            </div>
            {{-- submit --}}

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
