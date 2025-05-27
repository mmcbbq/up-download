<!doctype html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport'
          content='width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <title>Document</title>
</head>
<body>
<div>
<?php
$upload = $_GET['upload'] ?? false;
$pw = $_GET['wrong'] ?? false;
$dir = opendir('./data');
while (false !== ($file = readdir($dir))){
    if ($file != '.' and $file != '..'){
    echo "<a href='data/$file' download='$file'>$file</a><br>";
    }
}
if ($pw){
    echo "<div style='color: red' >Falsches PW</div>";
}
if ($upload){
    echo "<div style='color: red'> Upload OK</div>";
}
?>
</div>

<div>

<form action='upload.php' method='post' enctype='multipart/form-data'>
    <input type='file' name='file' id='file'><br>
    <input type='password' name='password' id='password'><br>
    <input type='submit' value='upload' name='submit'>
</form>
</div>

</body>
</html>

