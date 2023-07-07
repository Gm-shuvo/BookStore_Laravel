@extends('layout.layout')

@section('content')

<a href="{{ route('books.create') }}" class="btn btn-primary mb-3 float-left" style="margin-bottom: 6px">Add Book</a>
<a href="{{ route('get-pdf') }}" class="btn btn-primary mb-3 float-right">Download PDF</a>

<input type="text" class="form-control mb-3" id="search" name="search" placeholder="Search Book" style="width: 200px; float: right; margin-right: 6px; margin-bottom: 6px">

<script type="text/javascript">
  $(document).ready(function() {
    $("#search").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#myTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
      });
    });
  });
</script>

<table class="table table-hover mt-6">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Author</th>
      <th scope="col">ISBN</th>
      <th scope="col">Publisher</th>
      <th scope="col">Price</th>
    </tr>
  </thead>
  <tbody id="myTable">
    @foreach($books as $book)
    <tr>
      <th scope="row">{{ $book->id }}</th>
      <td>{{ $book->title }}</td>
      <td>{{ $book->author }}</td>
      <td>{{ $book->isbn }}</td>
      <td>{{ $book->publisher }}</td>
      <td>{{ $book->price }}</td>
      <td>
        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-primary">Edit</a>
        <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display: inline-block">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
{{ $books->links() }}
@endsection
