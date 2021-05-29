<?php

namespace App\Http\Controllers;

use App\Models\FileUpload;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function storeAnimalPhoto(Request $request){
        
        $request->validate([
            'file' => 'required|mimes:jpg,jpeg,png,csv,txt,xlx,xls,pdf|max:2048'
         ]);

         $fileUpload = new FileUpload;
         if($request->file()) {
            $file_name = time().'_'.$request->file->getClientOriginalName();
            $file_path = $request->file('file')->move(public_path('Images/animaux'), $file_name);

            $fileUpload->name = time().'_'.$request->file->getClientOriginalName();
            $fileUpload->path = $file_path;
            $fileUpload->save();

            return $fileUpload->name;
        }

   }
   public function storeUserPhoto(Request $request){
        
    $request->validate([
        'file' => 'required|mimes:jpg,jpeg,png,csv,txt,xlx,xls,pdf|max:2048'
     ]);

     $fileUpload = new FileUpload;
     if($request->file()) {
        $file_name = time().'_'.$request->file->getClientOriginalName();
        $file_path = $request->file('file')->move(public_path('Images/users'), $file_name);

        $fileUpload->name = time().'_'.$request->file->getClientOriginalName();
        $fileUpload->path =  $file_path;
        $fileUpload->save();

        return $fileUpload->name;
        }
    }
    public function storeCagePhoto(Request $request){
        
        $request->validate([
            'file' => 'required|mimes:jpg,jpeg,png,csv,txt,xlx,xls,pdf|max:2048'
         ]);
    
         $fileUpload = new FileUpload;
         if($request->file()) {
            $file_name = time().'_'.$request->file->getClientOriginalName();
            $file_path = $request->file('file')->move(public_path('Images/cages'), $file_name);
    
            $fileUpload->name = time().'_'.$request->file->getClientOriginalName();
            $fileUpload->path =  $file_path;
            $fileUpload->save();
    
            return $fileUpload->name;
            }
        }
}
