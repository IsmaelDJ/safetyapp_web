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

function rulesPerPage(){
    return 4;
}

function categoriesPerPage(){
    return 8;
}

function contractorsPerPage(){
    return 10;
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


