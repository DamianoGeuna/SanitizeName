<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SanitizeName</title>
    <style>
            .card-fail {
            border:1px solid ;
            padding: 0.5rem;
            margin-bottom: 1rem;
            color: hsl(0, 100%, 50%);
            background-color: hsl(0, 100%, 95%);
            width: 300px;

        }

        .card-pass {
            border:1px solid ;
            padding: 0.5rem;
            margin-bottom: 1rem;
            color: hsl(120, 100%, 25%);
            background-color: hsl(120, 100%, 95%);;
            width: 300px;
        }
    </style>
</head>
<body>
<?php
//comando php ... viene eseguito dalla root del progetto
//percorsi hanno sempre un punto di origine
require '.\sanitizeName.php';
//require './sanitizeName.php';
$dataset = [
    ['mario','Mario',__LINE__],
    ['mAriO','Mario',__LINE__],
    ['MARIO','Mario',__LINE__],
    ['De giovanni','De Giovanni',__LINE__],
    ['de giovanni','De Giovanni',__LINE__],
    ['de Giovanni','De Giovanni',__LINE__],
    ['de Giovanni      ','De Giovanni',__LINE__],
    ['de                     Giovanni      ','De Giovanni',__LINE__],
    ['de    Giovanni      ','De Giovanni',__LINE__],
    ['de 55 Giovanni','De Giovanni',__LINE__],
    ['Mario83','Mario',__LINE__],
    ['Mario@','Mario',__LINE__],
    ['Mario@     ','Mario',__LINE__],
    ['John Romita Sr.','John Romita Sr.',__LINE__],
    ['John Romita Jr.','John Romita Jr.',__LINE__],
    ['John Romita Jr.','John Romita Jr.',__LINE__],
    ['<h1>John123456789</h1>','John',__LINE__],
    ['<script>alert("ciccio")</script>','',__LINE__],
    ['    <h1>   John123456789   </h1>   ','John',__LINE__]

];

foreach ($dataset as $row) {
    $text =$row[0];
    $atteso =$row[1];
    $line = $row[2];

    $result = sanitizeName($text);

    if ($result == $atteso){
        echo "<div class = card-pass> Atteso: $atteso;<br> Risultato: $result;<br> PASS - tutto ok\n </div>";
    }else{
        echo "<div class = card-fail> Atteso: $atteso;<br> Risultato: $result;<br> FAIL - test fallito line: $line\n </div>";
    }
}