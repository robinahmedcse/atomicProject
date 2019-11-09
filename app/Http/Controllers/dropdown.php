<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class dropdown extends Controller
{
    
    public function home() {
               $all_data=DB::table('tbl_district')->get();
               
        return view('dropdown.dropdown')->with('all_data',$all_data);
    }
    
    
    
    public function getUp(Request $request) {
            $district_id=$request->district;   
       
         $allUpzila = DB::table('tbl_upozela')
                 ->where('district_id',$district_id)
                ->get();
         
//                    echo '<pre>';
//                    print_r($allUpzila);
//                    exit();



        foreach ($allUpzila as $key => $upzila) {
            echo '<option value="'.$upzila->upozela_id .'">' . $upzila->upozela_name .'</option>';
        }
        
       }
        
 
   
      
    
    
    
    
}//end of checkout 
