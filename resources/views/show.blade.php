@extends('master')


@section('content')
<div class="row">
    <div class="col-md-4 my-3">
        <div class="card" style="width: 18rem;">
            <img src="{{ $book["book_image"] }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">{{ $book["book_title"] }}</h5>
              <p class="card-text">{{ $book["book_description"] }}</p>
              <a href="#" class="btn btn-primary">Edit</a>
              <a href="#" class="btn btn-danger">Delete</a>
            </div>
            <div class="card-footer">
                Book id : {{ $book["id"] }} author : {{ $book["book_author"] }}
            </div>
          </div>


    </div>    
    </div>
    
@endsection