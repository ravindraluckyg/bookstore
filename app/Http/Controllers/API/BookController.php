<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\BookResource;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit = 10;
        if ($request->limit) {
            $limit = $request->limit;
        }
        $books = Book::query();
        if ($request->keyword) {
            $books = $books->where('title', 'like', '%'.$request->keyword.'%');
            $books = $books->orWhere('author', 'like', '%'.$request->keyword.'%');
        }
        $books = $books->paginate($limit);
        // $books = Book::paginate($limit);
        // $books = Book::All();

        return BookResource::collection($books);
    }
}
