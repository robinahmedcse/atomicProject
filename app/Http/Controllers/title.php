<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
 
//use Excel;
use Maatwebsite\Excel\Facades\Excel;


class title extends Controller
{
    
    public function home() {
        return view('title.title');
    }
    
     
    public function saveData(Request $request) {
        
         $title=$request->title;
         $name=$request->name;

           $data=array();
           $data['title'] = $title;
           $data['name'] = $name;
    
        DB::table('tbl_title')->insert($data);
        session::put('title','All information Save Successfully');
        return redirect::to('/book/title/manage');
     
        
    }//saveData
    
    
    public function show() {
        
       $all_data=DB::table('tbl_title')
               ->get();
        
        return view('title.manageTitle')
                ->with('all_data',$all_data);
    }
    
    
        public function inputExcel(Request $request) {
         
            if($request->hasFile('file')){
               $path= $request->file('file')->getRealPath();
               $data = Excel::load($path)->get();//defult worksheet upload ....(first sheet)
              
           //    $data = Excel::selectSheetsByIndex(0)->load($path)->get();// worksheet upload only first sheet
                
             //  $data = Excel::selectSheetsByIndex(0)->load($path)
               //    ->select(['title'])->get();// select title from excel file
               
            //   return $data;
               
                 foreach ($data as $row) {
                $insert_data[] = array(
                    'title' => $row['title'],
                    'name' => $row['name'] 
                );
            }//end of foreach
        }//end of if 
            
        if (!empty($insert_data)) {
            DB::table('tbl_title')->insert($insert_data);
             return back()->with('success', count($data) .'Excel Data Imported successfully.');
        }else{
            return back()->with('success', 'Excel DataNot Imported.');
        }






        exit();
          
    /*
        DB::table('tbl_title')->insert($data);
        session::put('title','All information Save Successfully');
        return redirect::to('/book/title/manage');
     */
        
    }//saveData
    
    
    
    
    
    
    
    
    
    
    
    
    
     public function edit($id) {
        
       $all_data=DB::table('tbl_title')
               ->where('title_id',$id)
               ->first();

        return view('title.editTitle')
                ->with('all_data',$all_data);
    }
    
    
   
    
      public function updateData(Request $request) {

        //  return $request->all();
          
         $title=$request->title;
         $name=$request->name;
         $id=$request->number;

           $data=array();
           $data['title'] = $title;
           $data['name'] = $name;

        
        DB::table('tbl_title')
                ->where('title_id',$id)
                 ->update($data);
         
        session::put('title','All information Update Successfully');
        return redirect::to('/book/title/manage');
     
        
    }//saveData
    
    
    public function deleteData($id) {
        
            DB::table('tbl_title')
                ->where('title_id',$id)
                 ->delete();
         
        session::put('title','All information Delete Successfully');
          return redirect::to('/book/title/manage');
     
    }
    
    
    
    
    
    
}//end of checkout 
