<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class checkbox extends Controller
{
    
    public function home() {
        return view('checkbox.checkbox');
    }
    
     
    public function saveData(Request $request) {
        
         $pieces=$request->hobby;
        
         $comma_separated = implode(",", $pieces);

           $data=array();
           $data['hobby'] = $comma_separated;
    
        DB::table('tbl_checkbox')->insert($data);
        session::put('checkbox','All information Save Successfully');
        return redirect::to('/checkbox/manage');
     
        
    }//saveData
    
    
    public function show() {
        
       $all_data=DB::table('tbl_checkbox')
               ->get();
        
        return view('checkbox.manageCheckBox')
                ->with('all_data',$all_data);
    }
    
    
     public function edit($id) {
        
       $hobby=DB::table('tbl_checkbox')
               ->where('checkbox_id',$id)
               ->first();
       
       $id=$hobby->checkbox_id;
       $all_data =  explode(",", $hobby->hobby);
       
        return view('checkbox.editCheckBox')
                 ->with('id',$id)
                ->with('all_data',$all_data);
    }
    
    
   
    
      public function updateData(Request $request) {
        
         $pieces=$request->hobby;
         $id=$request->number;
         
         $comma_separated = implode(",", $pieces);

           $data=array();
           $data['hobby'] = $comma_separated;
    
        
        DB::table('tbl_checkbox')
                ->where('checkbox_id',$id)
                 ->update($data);
         
        session::put('checkbox','All information Update Successfully');
        return redirect::to('/checkbox/manage');
     
        
    }//saveData
    
    
    public function deleteData($id) {
        
            DB::table('tbl_checkbox')
                ->where('checkbox_id',$id)
                 ->delete();
         
        session::put('checkbox','All information Delete Successfully');
        return redirect::to('/checkbox/manage');
     
    }
    
    
    
    
    
    
}//end of checkout 
