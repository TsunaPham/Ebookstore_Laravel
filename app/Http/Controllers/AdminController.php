<?php

namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Publisher;
use App\Models\BookField;

use DB;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function saveImportBooks(Request $request){
        DB::beginTransaction();
        try{
            $isExist = Publisher::where('PNAME', $request->publisher)->exists();
            if(!$isExist)
                Publisher::insert([
                    'PNAME' => $request->publisher
                ]);
            BookField::insert([
                'ISBN' =>  $request->isbn,
                'BFIELD' => $request->field
            ]);
            Book::insert([
                'ISBN' => $request->isbn,
                'TITLE' => $request->title,
                'PRICE' => $request->price,
                'PUBLISHER_NAME' => $request->publisher,
                'IMAGE' => $request->image,
            ]);
            DB::commit();
            return response()->json(['status' => 1]);
        }catch(\Exception$e){
            DB::rollBack();
            return response()->json(['status' => 0]);
        }
    }

    public function getAllIsbn(Request $request){
        return DB::select('call viewAllISBN(?)', [$request->dateneed]);}
    public function getSumOfISBN(Request $request){
        return DB::select('call viewSumOfISBN(?)', [$request->dateneed]);
    }
    public function getSumOfTradi(Request $request){
        return DB::select('call viewSumOfTradi(?)', [$request->dateneed]);
    }
    public function getSumOfEbookBuy(Request $request){
        return DB::select('call viewSumOfEbookBuy(?)', [$request->dateneed]);
    }
    public function getSumOfEbookBorrow(Request $request){
        return DB::select('call viewSumOfEbookBorrow(?)', [$request->dateneed]);
    }
    public function getAuListDate(Request $request){
        return DB::select('call viewAuListDate(?)', [$request->dateneed]);
    }
    public function getAuListMonth(Request $request){
        return DB::select('call viewAuListMonth(?,?)', [$request->monthneed, $request->yearneed]);
    }
    public function getBookListMonth(Request $request){
        return DB::select('call viewBookListMonth(?,?)', [$request->monthneed, $request->yearneed]);
    }
    public function getTransactionCreditDay(Request $request){
        return DB::select('call viewTransactionCreditDay(?)', [$request->dateneed]);
    }
    public function getErrorTransactionDay(Request $request){
        return DB::select('call viewErrorTransactionDay(?)', [$request->dateneed]);
    }
    public function getWHhaveISBNlessthanN(Request $request){
        return DB::select('call viewWHhaveISBNlessthanN(?)', [$request->N]);
    }
    public function getWHExportMost(Request $request){
        return DB::select('call WHExportMost(?,?)', [$request->from_time, $request->next_time]);
    }





}
