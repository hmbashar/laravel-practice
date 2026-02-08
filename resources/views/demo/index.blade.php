@extends('home.layout')


@section('content')

    @if($contactButton)
    <h1 class="main-heading">Hello World</h1>
    @endif

    <ul>
        <h5>Stack:</h5>
        @foreach($stack as $item)
            <li>{{ $item }}</li>
        @endforeach
    </ul>


    <form action="" method="post">
        @csrf
        <input type="text" name="name" placeholder="Enter your name">
        <br>
        <input type="text" name="email" placeholder="Enter your email">
        <br>
        <input type="submit" value="Submit">
    </form>

@endsection
