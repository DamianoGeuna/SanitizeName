<?php

function sanitizeName($name){
    
    $finalspace= preg_replace('/[^a-zA-Z]+$/','',$name);
    $tinyName = preg_replace('/[^a-zA-Z ]+/','',$finalspace);
    $onespace = preg_replace('/[ ]+/',' ',$tinyName);
    $notags = trim($onespace,"<h1>");

    $explodeName = explode(" ",$notags);
    $correctNames = array_map('correctCase', $explodeName);
    
    return implode(" ", $correctNames); // si potrebbe mettere direttamente il return eseguito dalla variabile. $implodeName;
    
    //return$uppercaseName;

    
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