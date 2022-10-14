@extends('master')


@section('content')
@if (session()->has("success"))
<div class="row mt-3">
  <div x-data="{show:true}" 
  x-init="setTimeout(() => show = false,2000)"
  x-show="show" class="alert alert-success float-end">{{ session()->get("success") }}</div>
</div>
@endif
<a href="/book/create" class="btn btn-primary my-3">Add New</a>
<div class="row">
@foreach ($books as $book)
    <div class="col-md-4 my-3">
        <div class="card" style="width: 18rem;">
            <img src="{{ asset('./images/'.$book->book_image) }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">{{ $book["book_title"] }}</h5>
              <p class="card-text">{{ $book["book_description"] }}</p>
              <a href="/book/{{ $book->id }}/edit" class="btn btn-primary">Edit</a>
              <form action="/book/{{ $book->id }}" method="post" style="display: inline-block">
              @csrf
              @method("DELETE")
              <button type="submit" class="btn btn-danger" onclick="confirm('Are you sure to delete')">Delete</button>
              </form>
            </div>
            <div class="card-footer">
                Book id : <strong>{{ $book["id"] }}</strong> author : <strong>{{ $book["book_author"] }}</strong>
            </div>
          </div>


    </div>    
    
    @endforeach
</div>
    
@endsection