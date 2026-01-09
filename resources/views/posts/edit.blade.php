@extends('layouts.app')

@section('title', 'تعديل المقال')
@section('content')
    <div class="container">
        <h1>تعديل المقال : {{ $post->title }}</h1>
        <form action="{{ url('/posts/'.$post->slug) }}" method="POST" enctype="multipart/form-data" >
            @csrf
            @method('PUT')
            

            <label for="title">عنوان المقال:</label>
            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title',$post->title) }}">
            @error('title')
                <div class="alert alert-danger mt-1">
                    {{ $message }}
                </div>
            @enderror

            <label for="body">محتوى المقال:</label>
            <textarea name="body" id="body" rows="10" class="form-control">{{ old('body',$post->body) }}</textarea>

            <button type="submit" class="btn btn-primary"> حفظ المقال</button>
        </form>
    </div>

@endsection