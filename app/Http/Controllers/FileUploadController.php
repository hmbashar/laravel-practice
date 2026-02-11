<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileUploadController extends Controller
{
    public function index() {
        $url = Storage::disk('public')->url('ic/1694453228.jpg');
        return view('home.upload');
    }

    public function store(Request $request) {

       //1. validate the file: size, type, etc

       $request->validate([
        'file' => 'required|file|max:2048|mimes:jpg,png,pdf,docx'
       ]);


       //2. Store the file in the storage folder

       //$request->file('file')->store('ic', 'public');
       Storage::disk('public')->putFileAs('ic', $request->file('file'), $request->file('file')->getClientOriginalName());


       $fileUrl = Storage::disk('public')->url('ic/'.$request->file('file')->getClientOriginalName());

       //3. return success message
        return back()->with('success', $fileUrl);

      // dd($fileUrl);

       

    }
}
