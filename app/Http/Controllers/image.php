<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class image extends Controller
{
    
    public function home() {
        return view('picture.picture');
    }
    
     
    public function saveData(Request $request) {
        
     //  return $request->all();
       $userPhoto= $request->file('photo');
       $name=$userPhoto->getClientOriginalName();
       $uploadPath='public/image/user/';
       $userPhoto->move($uploadPath,$name);
       $userPhotoUrl=$uploadPath.$name;
   
     
 
           $data=array();
           $data['photo_name'] = $request->Name;
           $data['photo_url'] = $userPhotoUrl;
           
    
        DB::table('photo')->insert($data);
        session::put('photo','All information Save Successfully');
        return redirect::to('/profile/picture/manage');
     
        
    }//saveData
    
    
    public function show() {
        
       $all_data=DB::table('photo')
               ->get();
        
        return view('picture.managePicture')
                ->with('all_data',$all_data);
    }
    
    
     public function edit($id) {
        
       $hobby=DB::table('tbl_checghkbox')
               ->where('checkbox_id',$id)
               ->first();
       
       $id=$hobby->checkbox_id;
       $all_data =  explode(",", $hobby->hobby);
       
        return view('checkbhox.editCheckBox')
                 ->with('id',$id)
                ->with('all_data',$all_data);
    }
    
    
   
    
      public function updateData(Request $request) {
        
         $pieces=$request->hobby;
         $id=$request->number;
         
         $comma_separated = implode(",", $pieces);

           $data=array();
           $data['hobby'] = $comma_separated;
    
        
        DB::table('tbl_chehckbox')
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
