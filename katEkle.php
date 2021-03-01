<?php

include "database.php";

if (isset($pdo)){
    $urunSorgu = $pdo->query("SELECT * FROM urunler", PDO::FETCH_OBJ);
}


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
        <?php echo "Kategori Ekleme Sayfasına Hoşgeldiniz";?>
    </h3>
    <p>

        KAT_name: <input type="text" name="kategori_name" placeholder="kategori_name giriniz"><br>

        <select name="urun_id">
            <?php while($urun = $urunSorgu->fetch()):?>
                <option value="<?=$urun->urun_id?>"><?=$urun->urun_name?></option>
            <?php endwhile; ?>
        </select>

        <input type="submit" name="kategoriEkle" value="Kategoriyi Ekle">
    </p>
</form>

</body>
</html>