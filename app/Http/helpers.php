<?php

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

function uploadFile(Request $request, $name, $sousfix =''){
    $ext = $request->file($name)->extension();
    $folder = "uploads/";
    $fileName = date('YmdHis').'_'. $sousfix .'.'.$ext;

    $request->file($name)->move(public_path($folder),$fileName);

    $path = $folder.$fileName;
    return $path;
}

function rulesPerPage(){
    return 4;
}

function categoriesPerPage(){
    return 5;
}

function contractorsPerPage(){
    return 8;
}


function employeesPerPage(){
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

function employeeQuizResponsesPerPage(){
    return 8;
}

function employeeQuizResponsesShowPerPage(){
    return 4;
}

function m_paginate($items, $perPage = 8, $page = null, $options = [])
{
    $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
    $items = $items instanceof Collection ? $items : Collection::make($items);

    return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
}

