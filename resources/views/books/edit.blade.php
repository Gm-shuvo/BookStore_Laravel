

@extends('layout.layout')



@section('content')

<form method="POST" action="{{route('books.update', ['book'=> $book] )}}" accept-charset="UTF-8">
    @csrf       
    @method('PUT')
    <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input type="text" class="form-control" name=title id="title" aria-describedby="Title" value="{{$book->title ?  $book->title : old('title')}}">
      @error('title')
        <small class="text-small text-danger">{{ $message }}</small>
      @enderror

    </div>

    <div class="mb-3">
        <label for="author" class="form-label">Author</label>
        <input type="text" class="form-control" name=author id="author" aria-describedby="author" value="{{$book->author ?  $book->author : old('author')}}">
        @error('author')
        <small class="text-small text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="mb-3">
        <label for="isbn" class="form-label">Isbn</label>
        <input type="text" class="form-control" name=isbn id="isbn" aria-describedby="isbn" value="{{$book->isbn ?  $book->isbn : old('isbn')}}">
        @error('isbn')
        <small class="text-small text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="mb-3">
        <label for="publisher" class="form-label">Publisher</label>
        <input type="text" class="form-control" name=publisher id="publisher" aria-describedby="publisher" value="{{$book->publisher ?  $book->publisher : old('publisher')}}">
        @error('publisher')
        <small class="text-small text-danger">{{ $message }}</small>
        @enderror
      </div>
      <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="number" class="form-control" name=price id="title" aria-describedby="Price" value="{{$book->price ?  $book->price : old('price')}}">
        @error('price')
        <small class="text-small text-danger">{{ $message }}</small>
        @enderror
      </div>

    <button type="submit" class="btn btn-primary gap-3">Submit</button>
    <a href="{{ route('books.index') }}" class="btn btn-secondary">Back</a>
  </form>
@endsection



