@extends('master')


@section('content')

{{-- 'book_title',
'book_description',
'book_author',
'book_image' --}}

<form method="post" action="/book/{{ $book->id }}" class="my-5" enctype="multipart/form-data">
    @csrf
    @method("PUT")
    <div class="mb-3">
      <label class="form-label">Title</label>
      <input type="text" class="form-control" name="title" value="{{ $book->book_title }}">
      @error('title')
      <div class="alert alert-danger my-2">
          <small>{{ $message }}</small>
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label class="form-label">Description</label>
      <textarea name="description"cols="30" rows="10" class="form-control">{{ $book->book_description }}</textarea>
      @error('description')
      <div class="alert alert-danger my-2">
          <small>{{ $message }}</small>
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label class="form-label">Author</label>
      <input type="text" class="form-control" name="author" value="{{ $book->book_author }}">
      @error('author')
      <div class="alert alert-danger my-2">
          <small>{{ $message }}</small>
      </div>
      @enderror
    </div>
    <div class="mb-3">
      <label class="form-label">Book Image</label>
      <input type="file" name="image" class="form-control">
      <img src="{{ asset('./images/'.$book->book_image) }}" alt="image" style="width: 150px;height:150px;margin-top:15px">
      @error('image')
      <div class="alert alert-danger my-2">
          <small>{{ $message }}</small>
      </div>
      @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="{{ url('/') }}" class="btn btn-success">Back to home</a>
  </form>




@endsection