@extends('master')
@section('content')



<a href="/book/create" class="btn btn-primary my-3">Add New</a>
<a href="/" class="btn btn-success my-3">Back to Home</a>


<h1>Autor Name : {{ $author->name }}</h1>
<h2>Nationality : {{ $author->nationality }}</h2>
<h3>Email : {{ $author->email }}</h3>
<div class="row">
@foreach ($books as $book)
    <div class="col-md-4 my-3">
        <div class="card" style="width: 18rem;">
            <img src="{{ asset('./images/'.$book->book_image) }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">{{ $book->book_title }}</h5>
              <p class="card-text">{{ $book->book_description }}</p>
              <a href="/book/{{ $book->id }}/edit" class="btn btn-primary">Edit</a>
              <form action="/book/{{ $book->id }}" method="post" style="display: inline-block">
              @csrf
              @method("DELETE")
              <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete')">Delete</button>
              </form>
            </div>
            <div class="card-footer">
                Book id : <strong>{{ $book->id }}</strong> author : <strong><a href="/author/{{ $book->author->id }}">{{ $book->author->name }}</a></strong>
            </div>
          </div>


    </div>    
    
    @endforeach
</div>
    
@endsection