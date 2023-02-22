@extends('layout.admin.app')
@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="float-start">
                    <h2>Book Store</h2>
                </div>
                <div class="float-end mb-2">
                    <a class="btn btn-success" href="{{ route('books.create') }}"> Create Book</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Genre</th>
                    <th>Description</th>
                    <th>ISBN</th>
                    <th>Image</th>
                    <th>Published</th>
                    <th>Publisher</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <td>{{ $book->id }}</td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->genre }}</td>
                        <td>{{ $book->description }}</td>
                        <td>{{ $book->isbn }}</td>
                        <td><img src="{{ $book->image }}" alt="{{ $book->title }}" style="height:auto;width: 100%;"></td>
                        <td>{{ $book->published }}</td>
                        <td>{{ $book->publisher }}</td>
                        <td>
                            <form action="{{ route('books.destroy', $book->id) }}" method="Post">
                                <a class="btn btn-primary" href="{{ route('books.edit', $book->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $books->links() !!}
    </div>
@endsection
