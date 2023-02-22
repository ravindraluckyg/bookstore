@extends('layout.admin.app')
@section('content')
    <title>Create</title>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="float-start">
                    <h2>Edit Book</h2>
                </div>
                <div class="float-end">
                    <a class="btn btn-primary" href="{{ route('books.index') }}" enctype="multipart/form-data">
                        Back</a>
                </div>
            </div>
        </div>
        @if (session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
        @endif
        <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Title:</strong>
                        <input type="text" name="title" value="{{ $book->title }}" class="form-control"
                            placeholder="Title">
                    </div>
                    <div class="form-group">
                        <strong>Author:</strong>
                        <input type="text" name="author" value="{{ $book->author }}" class="form-control" placeholder="Author">
                    </div>
                    <div class="form-group">
                        <strong>Genre:</strong>
                        <input type="text" name="genre" value="{{ $book->genre }}" class="form-control" placeholder="Genre">
                    </div>
                    <div class="form-group">
                        <strong>Description:</strong>
                        <input type="text" name="description" value="{{ $book->description }}" class="form-control" placeholder="Description">
                    </div>
                    <div class="form-group">
                        <strong>ISBN:</strong>
                        <input type="text" name="isbn" value="{{ $book->isbn }}" class="form-control" placeholder="ISBN">
                    </div>
                    <div class="form-group">
                        <strong>Image:</strong>
                        <input type="url" name="image" value="{{ $book->image }}" class="form-control" placeholder="Image">
                    </div>
                    <div class="form-group">
                        <strong>Published:</strong>
                        <input type="date" name="published" value="{{ $book->published }}" class="form-control" placeholder="Published">
                    </div>
                    <div class="form-group">
                        <strong>Publisher:</strong>
                        <input type="text" name="publisher" value="{{ $book->publisher }}" class="form-control" placeholder="Publisher">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
        </form>
    </div>
@endsection
