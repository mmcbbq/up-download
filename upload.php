<?php
var_dump($_FILES);
if ($_POST['password']!== 'hds' or $_FILES['file']['name'] === ''){
    header(header:'Location: data.php?wrong=true',response_code: 301);
    die();
}
$dir = 'data/';
$file = $dir .basename($_FILES['file']['name']);
//$uploadOk = 1;
//$filetype = strtolower(pathinfo($file,PATHINFO_EXTENSION));
move_uploaded_file($_FILES["file"]["tmp_name"], $file);

header(header:'Location: data.php?upload=true',response_code: 301);
die();