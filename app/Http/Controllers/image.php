<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

use PDF;

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
        
       $all_data=DB::table('photo')
               ->where('photo_id',$id)
               ->first();
       
        return view('picture.editPicture')
                ->with('all_data',$all_data);
    }
    

      public function updateData(Request $request) {
         
            $id=$request->number;
            $image=$request->file();
            
            if($image == NULL){
                $image_url=$request->previousImage;      
            }else{
                $image=$request->file('photo');
                $name=$image->getClientOriginalName();
                
                $uploadPath='public/image/user/';
                $image->move($uploadPath, $name);
                
                $image_url=$uploadPath.$name;
            }
               
            
            $user_name=$request->Name;
           
           
           $data=array();
           $data['photo_name'] = $user_name;
           $data['photo_url'] = $image_url;
        
         DB::table('photo')
                ->where('photo_id',$id)
                 ->update($data);
         
        
       session::put('photo','All information Update Successfully');
        return redirect::to('/profile/picture/manage');
     
        
    }//saveData
    
    
     public function viewsPdf($id) {
            $data=DB::table('photo')
                ->where('photo_id',$id)
               ->first();
        
        return view('picture.viewPicture')
                ->with('data',$data);
         
         
       
    }
    
    public function downloadPdf($id) {
     
                $data=DB::table('photo')
                ->where('photo_id',$id)
               ->first();
        
        
        $pdf = PDF::loadView('picture.pdfPicture',['data' => $data])
                ->setPaper('a4', 'portrait');

        $photo_name = $data->photo_name;

        return $pdf->download($photo_name.'.pdf');
        
        
    }
    
    
    
    
    
    
    
    public function deleteData($id) {
        
            DB::table('photo')
                ->where('photo_id',$id)
                 ->delete();
         
        session::put('photo','All information Delete Successfully');
        return redirect::to('/profile/picture/manage');
     
    }
    
    
    
    
    
    
}//end of checkout 
