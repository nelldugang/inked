<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UploadFileController extends Controller
{
    public function index(){
    	return view('uploadfile');
    }

    public function showUploadFile(Request $request){
    	$file = $request->file('image');
    	



    	echo 'File Name: '.$file->getClientOriginalName();
    	echo '<br>';

    	echo 'File Extension: '.$file->getClientOriginalExtension();
    	echo '<br>';

    	echo 'File Real Path: '.$file->getRealPath();
    	echo '<br>';

    	echo 'File Size: '.$file->getSize();
    	echo '<br>';

    	echo 'File Mime Type: '.$file->getMimeType();

    	$destinationPath = 'uploads';
    	$file->move($destinationPath,$file->getClientOriginalName());


    }
}
