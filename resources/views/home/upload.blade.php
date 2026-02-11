@extends('home.layout')

@section('title', 'Upload | Bashar')



@section('content')
<div>
    <h1>Upload</h1>
</div>

@if(session('success'))
<p>{{ session('success') }}</p>
<img src="{{ session('success') }}" alt="">
@endif


<form action="{{ route('upload.submit') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file" >
    @error('file')
    <p class="text-red">{{ $message }}</p>
    @enderror
    <div>
        <button type="submit">Upload</button>
    </div>
</form>

@endsection
