<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use DB;

class BookController extends Controller
{
    public function getAllBook(){
        $books = Book::select('*')->paginate(6);
        return view('index', ['books' => $books]);
    }
    // ii4
    public function getAllByCategory(Request $request){
        return DB::select('call DSSach_Theloai(?)', [$request->bfield]);
    }

    public function getAllByAuthor(Request $request){
        return DB::select('call DSSach_tacgia(?)', [$request->aname]);
    }

    public function getAllByPublishYear(Request $request){
        return DB::select('call DSSach_NamXuatBan(?)', [$request->pyear]);
    }

    public function getAllAuthorByCate(Request $request){
        return DB::select('call DSSach_TacGiaCungTheLoai(?)', [$request->bfield]);
    }

    public function getAllByKey(Request $request){
        return DB::select('call DSSach_tukhoa(?)', [$request->keyword]);
    }


}
