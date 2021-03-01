<?php

include "database.php";

if (isset($pdo)){
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
        <?php echo "Ürün Ekleme Sayfasına Hoşgeldiniz";?>
    </h3>
    <p>
        URUN_id: <input type="text" name="urun_id" placeholder="ürün_id giriniz" ><br>
        URUN_name: <input type="text" name="urun_name" placeholder="ürün_name giriniz"><br>
        URUN_price: <input type="text" name="urun_price" placeholder="ürün_price giriniz"><br>
        URUN_des: <input type="text" name="urun_des" placeholder="ürün_des giriniz"><br>
        URUN_con: <input type="text" name="urun_con" placeholder="ürün_con giriniz"><br>

        <select name="urun_kat">
            <?php while($kat = $kategori->fetch()):?>
                <option value="<?=$kat->kategori_name?>"><?=$kat->kategori_name?></option>
            <?php endwhile; ?>
        </select>

        <input type="submit" name="urunEkle" value="Ürünü Ekle">
    </p>
</form>

</body>
</html>