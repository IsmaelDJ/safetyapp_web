<?php

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

function me(){
    return Auth::user();
}

function uploadFile(Request $request, $name, $sousfix =''){
    $ext = $request->file($name)->extension();
    $folder = "uploads/";
    $fileName = date('YmdHis').'_'. $sousfix .'.'.$ext;

    $request->file($name)->move(public_path($folder),$fileName);

    $path = $folder.$fileName;

    compress_image($path);

    return $path;
}

function compress_image($path){
    $supported_image = array(
        'webp',
        'jpg',
        'jpeg',
        'png'
    ); 

    $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION));
    
    if (in_array($ext, $supported_image)) {
        try {
            \Tinify\setKey(env("TINIFY_API_KEY"));
            $source = \Tinify\fromFile($path);
            $source->toFile($path);
        } catch(\Tinify\AccountException $e) {
            print("The error message is: " . $e->getMessage());
            // Verify your API key and account limit.
        } catch(\Tinify\ClientException $e) {
            print("The error message is: " . $e->getMessage());
            // Check your source image and request options.
        } catch(\Tinify\ServerException $e) {
            print("The error message is: " . $e->getMessage());
            // Temporary issue with the Tinify API.
        } catch(\Tinify\ConnectionException $e) {
            print("The error message is: " . $e->getMessage());
            // A network connection error occurred.
        } catch(Exception $e) {
            print("The error message is: " . $e->getMessage());
            // Something else went wrong, unrelated to the Tinify API.
        }
    }
}

function rulesPerPage(){
    return 15;
}

function categoriesPerPage(){
    return 15;
}

function carriersPerPage(){
    return 8;
}


function driversPerPage(){
    return 8;
}
function quizzesPerPage(){
    return 4;
}
function quizQuestionsPerPage(){
    return 4;
}

function quizQuestionsShowPerPage(){
    return 4;
}

function driverQuizResponsesPerPage(){
    return 8;
}

function driverQuizResponsesShowPerPage(){
    return 4;
}

function m_paginate($items, $perPage = 8, $page = null, $options = [])
{
    $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
    $items = $items instanceof Collection ? $items : Collection::make($items);

    return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
}

