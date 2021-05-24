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
            $file_path = $request->file('file')->storeAs('uploads/animals', $file_name, 'public');

            $fileUpload->name = time().'_'.$request->file->getClientOriginalName();
            $fileUpload->path = '/storage/' . $file_path;
            $fileUpload->save();

            return $fileUpload->path;
        }

   }
   public function storeUserPhoto(Request $request){
        
    $request->validate([
        'file' => 'required|mimes:jpg,jpeg,png,csv,txt,xlx,xls,pdf|max:2048'
     ]);

     $fileUpload = new FileUpload;
     if($request->file()) {
        $file_name = time().'_'.$request->file->getClientOriginalName();
        $file_path = $request->file('file')->storeAs('uploads/users', $file_name, 'public');

        $fileUpload->name = time().'_'.$request->file->getClientOriginalName();
        $fileUpload->path = '/storage/' . $file_path;
        $fileUpload->save();

        return $fileUpload->path;
        }
    }
}
