<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function getAllBook(){
        $books = Book::select('*')->paginate(6);
        return view('index', ['books' => $books]);
    }
}
