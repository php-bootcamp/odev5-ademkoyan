<?php

include "database.php";

$uniq = $_GET["uniq"];

if (isset($pdo)) {
    $sorgu = $pdo->prepare("SELECT * FROM urunler WHERE urun_uniq=:uniq");
    $sorgu->execute([':uniq' => $uniq]);
    $urun = $sorgu->fetch();
    $kategori = $pdo->query("SELECT * FROM kategori", PDO::FETCH_OBJ);
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
        <?php echo "urun_uniq = ".$uniq. " olan ürünü güncelleme sayfasına hoşgeldin";?>
    </h3>
    <p>
        URUN_id: <input type="text" name="urun_id" value= "<?= $urun["urun_id"] ?>" ><br>
        URUN_name: <input type="text" name="urun_name" value= "<?= $urun["urun_name"] ?>"><br>
        URUN_price: <input type="text" name="urun_price" value= "<?= $urun["urun_price"] ?>"><br>
        URUN_des: <input type="text" name="urun_des" value= "<?= $urun["urun_des"] ?>"><br>
        URUN_con: <input type="text" name="urun_con" value= "<?= $urun["urun_con"] ?>"><br>

        <select name="urun_kat">
        <?php while($kat = $kategori->fetch()):?>
            <option value="<?=$kat->kategori_name?>"><?=$kat->kategori_name?></option>
        <?php endwhile; ?>
        </select>

        <input type="submit" name="güncelle" value="Güncelle">
    </p>
</form>

</body>
</html>