<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class pagination extends Controller
{
    
    public function index() {
               
           $all_data=DB::table('tbl_title')
             //  ->get();
        ->paginate(10);
        return view('pagi.manageTitlePagi', compact('all_data'));
    }
    
    
    public function fatch_data() {
             
        if($request->ajax()){
      
              $all_data=DB::table('tbl_title')
                     ->paginate(10);
                       
          return view('pagi.titlePagiData')
          ->with('$all_data',$all_data)->render();
         }
          
    }
    
      
    
    
    
    
}//end of checkout 
