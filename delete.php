<?php
//$file = $_GET['filename'];

$file = 'Hallo.txt';
if(file_exists("data/$file")){
    unlink("data/$file");
    header();
}else{
    echo 'ist nicht da';
}