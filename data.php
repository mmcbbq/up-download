<?php



//    header(header:'Location: data.php?wrong=true',response_code: 301);
//    die();

if ($_SERVER['REQUEST_METHOD']==="POST"){
if ($_POST['password']!== 'hds' or $_FILES['file']['name'] === '') {
    $_GET['wrong'] = true;
} else {
    $dir = 'data/';
    $file = $dir .basename($_FILES['file']['name']);
//$uploadOk = 1;
//$filetype = strtolower(pathinfo($file,PATHINFO_EXTENSION));
    move_uploaded_file($_FILES["file"]["tmp_name"], $file);
    $_GET['upload'] = true;
}


}
?>


<!doctype html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport'
          content='width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0'>
    <meta http-equiv='X-UA-Compatible' content='ie=edge'>
    <title>Document</title>
    <style>

        .element {
            max-width: fit-content;
            margin-left: auto;
            margin-right: auto;
            padding-left: 20px;
            padding-right: 20px;
            padding-top: 5px;
            padding-bottom: 5px;
        }

    </style>
</head>
<body style='background-color: #FB8F67'>
<div class='element' style='background-color: #FFC2B4;'>
    <h1>Files</h1>
    <?php
    $upload = $_GET['upload'] ?? false;
    $pw = $_GET['wrong'] ?? false;
    $dir = opendir('./data');
    $count = 0;
    echo '<div class="element">';

    while (false !== ($file = readdir($dir))) {
        if ($count % 2 == 0) {
            $color = '#46D0D8';
        } else {
            $color = '#00c49a';
        }
        $count++;
        if ($file != '.' and $file != '..') {
            echo "<div   style='background-color: $color; padding: 5px'>";
            echo "<a href='data/$file' download='$file' style='color: inherit; text-decoration: inherit' >$file</a>";
            echo "<button onclick='location.href=\"delete.php?filename=$file\"' type='button' style='margin: 10px 10px ' >delete</button>";
            echo "</div>";
        }
    }

    echo '</div> <br>';
    if (isset($_GET['delete'])){
        echo "<div style='color: red'>File deleted</div>";
    }
    ?>


</div>
<br>
<br>
<br>
<div class='element' style='background-color: #F8E16C'>
    <h1>Upload</h1>
<div>

    <form  method='POST' enctype='multipart/form-data'>
        <input type='file' name='file' id='file'><br><br>
        Passwort    <input type='password' name='password' id='password'><br><br>
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

?>

<br>

</div>
</body>
</html>
