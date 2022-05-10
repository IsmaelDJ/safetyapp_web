<?php

use Illuminate\Http\Request;

function uploadFile(Request $request, $name, $sousfix =''){
    $ext = $request->file($name)->extension();
    $folder = "uploads/";
    $fileName = date('YmdHis').'_'. $sousfix .'.'.$ext;

    $request->file($name)->move(public_path($folder),$fileName);

    $path = $folder.$fileName;
    return $path;
}
