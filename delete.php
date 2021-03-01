<?php

$uniq = $_GET["uniq"];

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<form action="database.php" method="post">

    <h3>
        <?php echo "urun_uniq = ".$uniq. " olan ürünü silmek istiyor musun?" ?>
    </h3>

    <input type="text" name="urun_uniq" value= <?= $uniq;?> >
    <input type="submit" name="sil" value="Sil">

</form>

</body>
</html>