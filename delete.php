<?php
var_dump($_GET);
$file = $_GET['filename'];

//$file = 'Hallo.txt';
if(file_exists("data/$file")){
    unlink("data/$file");
    header(header:'Location: data.php?delete=true',response_code: 301);
}else{
    echo 'Error';
}