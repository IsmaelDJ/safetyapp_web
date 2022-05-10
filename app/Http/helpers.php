<?php

use Illuminate\Http\Request;

function uploadFile(Request $request, $name){
    $ext = $request->file($name)->extension();
    $folder = "uploads/";
    $fileName = date('YmdHis') .'.'.$ext;

    $request->file($name)->move(public_path($folder),$fileName);

    $path = $folder.$fileName;
    return $path;
}
