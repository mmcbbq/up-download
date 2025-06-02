<!doctype html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport'
          content='width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <title>Document</title>
</head>
<body style='background-color: #FB8F67'>
<div style='background-color: #FFC2B4'>
    <h1>Files</h1>
    <?php
    $upload = $_GET['upload'] ?? false;
    $pw = $_GET['wrong'] ?? false;
    $dir = opendir('./data');
    $count = 0;
    echo '<div style="width: 50%; border: rosybrown; border-style: solid ">';

    while (false !== ($file = readdir($dir))) {
        if ($count % 2 == 0) {
            $color = '#46D0D8';
        } else {
            $color = '#00c49a';
        }
        $count++;
        if ($file != '.' and $file != '..') {
            echo "<div style='background-color: $color'>";
            echo "<a href='data/$file' download='$file' style='color: inherit; text-decoration: inherit' ><div>$file</div></a><br>";
            echo "</div>";
        }
    }

    echo '</div> <br>';

    ?>
</div>
<br>
<br>
<br>
<div style='background-color: #F8E16C'>
    <h1>Upload</h1>
<div>

    <form action='upload.php' method='post' enctype='multipart/form-data'>
        <input type='file' name='file' id='file'><br>
        Passwort    <input type='password' name='password' id='password'><br>
        <input type='submit' value='upload' name='submit'>
    </form>
</div>
<?php
if ($pw) {
    echo "<div style='color: #ff0019' >Falsches PW</div>";
}
if ($upload) {
    echo "<div style='color: red'> Upload OK</div>";
}
if ($_SERVER['REQUEST_METHOD'] === 'POST'){

    echo "post";
}
?>



<br>

</div>
</body>
</html>

