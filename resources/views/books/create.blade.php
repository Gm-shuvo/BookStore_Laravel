

@extends('layout.layout')



@section('content')

<form method="POST" action="{{route('books.store')}}" accept-charset="UTF-8">
    @csrf       
    <div class="mb-3">
      <label for="title" class="form-label">Title</label>
      <input type="text" class="form-control" name=title id="title" aria-describedby="Title">
      @error('title')
        <small class="text-small text-danger">{{ $message }}</small>
      @enderror

    </div>


    <div class="mb-3">
        <label for="author" class="form-label">Author</label>
        <input type="text" class="form-control" name=author id="author" aria-describedby="Title">
        @error('author')
        <small class="text-small text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="mb-3">
        <label for="isbn" class="form-label">Isbn</label>
        <input type="text" class="form-control" name=isbn id="isbn" aria-describedby="isbn">
        @error('isbn')
        <small class="text-small text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="mb-3">
        <label for="publisher" class="form-label">Publisher</label>
        <input type="text" class="form-control" name=publisher id="publisher" aria-describedby="publisher">
        @error('publisher')
        <small class="text-small text-danger">{{ $message }}</small>
        @enderror
      </div>
      <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="number" class="form-control" name=price id="title" aria-describedby="Price">
        @error('price')
        <small class="text-small text-danger">{{ $message }}</small>
        @enderror
      </div>

    <button type="submit" class="btn btn-primary gap-3">Submit</button>
    <a href="{{ route('books.index') }}" class="btn btn-secondary">Back</a>
  </form>
@endsection



