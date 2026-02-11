@extends('home.layout')

@section('title', 'Bashar | Contact')



@section('content')
<div>
    <h1>Contact</h1>
</div>
<!-- @if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif -->
<form action="/test-submit" method="post" enctype="multipart/form-data">
    @csrf
    <input type="text" name="name" placeholder="Enter your name" value="{{ old('name') }}">
    @error('name')
        <p>{{ $message }}</p>
    @enderror
    <br>
    <input type="text" name="email" placeholder="Enter your email" value="{{ old('email') }}">
    @error('email')
    <p>{{ $message }}</p>
    @enderror
    <br>
    <input type="submit" value="Submit">
</form>

@endsection
