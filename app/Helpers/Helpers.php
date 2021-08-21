<?php

use App\Models\Category;

function UplaodFile($folder, $photo, $id)
{
    $photo->store('/' . $id, $folder);
    $fileName = $photo->hashName();
    return $fileName;
}

function GetCategory()
{
    return Category::all();
}