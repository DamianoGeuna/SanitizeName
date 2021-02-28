<?php

function sanitizeName($name){
    
    //$noScript = preg_replace('/<script\b[^>]*>(.*?)<\/script>/m', "", $name);

    $noSpaceEndName = preg_replace('/(\s)+$/',"",$name);
    $noSpaceStartName = preg_replace('/(^\s*)+/',"",$noSpaceEndName);

    //elimina tag
    $noTagName = strip_tags($noSpaceStartName);

    //$strippedName = filter_var($noSpaceName, FILTER_SANITIZE_STRING);

    //elimina simboli e numeri
    $skinnyName = preg_replace('/[^a-zA-Z .]+/',"",$noTagName);
    $cleanName = preg_replace('/[ ]{2,}/'," ",$skinnyName);

    //rende stringa in array
    $explodeName = explode(" ",$cleanName);
    //corregge maiuscole e minuscole
    $correctNames = array_map('correctCase',$explodeName);
    //ricompatta array creato con explode e esce con stringa singola
    $finalName = implode(" ",$correctNames);
    $noSpaceEndNameLast = preg_replace('/(\s)+$/',"",$finalName);

    return preg_replace('/(^\s*)+/',"",$noSpaceEndNameLast);

    
}

function correctCase($name/*VARIABILE LOCALE*/)
{
    // AAA - - > aaa tutto minuscolo
    $nameLowercase = strtolower($name);

    // aaa - - > Aaaa solo la prima maisucola
    $uppercaseName = ucfirst($nameLowercase);

    // return $res;
    return$uppercaseName;
}