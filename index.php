<?php
require "database.php";

if (isset($pdo)) {
    $sorgular= $pdo->query("SELECT urunler.*, kategori.kategori_name FROM urunler, kategori 
    WHERE urunler.urun_id = kategori.urun_id", PDO::FETCH_OBJ);

    $count = $sorgular->rowCount();
}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Adem KOYAN</title>
    <h2>Ödev5</h2>
    <ul>
        <li>
            <a href="urunEkle.php">Yeni Ürün Ekle</a>
        </li>
        <li>
            <a href="katEkle.php">Yeni Kategori Ekle</a>
        </li>
        <li>
            <a href="aktar.php">İçe Aktar</a>
        </li>
        <?php if($count>0): ?>
        <li>
            <a href="dısAktar.php">Dışa Aktar</a>
        </li>
        <?php endif ?>

    </ul>
</head>
<body>
<h1>Ürün Listesi</h1>
    <?php if($count>0): ?>
        <table border="2">

            <tr>
            <th>urun_id</th>
            <th>urun_name</th>
            <th>urun_price</th>
            <th>urun_des</th>
            <th>urun_con</th>
            <th>kat_name</th>
            <th>Ürün İşlem</th>
            </tr>

            <?php while($sorgu = $sorgular->fetch()): ?>
            <tr>
                <th><?= $sorgu->urun_id; ?></th>
                <td><?= $sorgu->urun_name; ?></td>
                <td><?= $sorgu->urun_price; ?></td>
                <td><?= $sorgu->urun_des; ?></td>
                <td><?= $sorgu->urun_con; ?></td>
                <td><?= $sorgu->kategori_name; ?></td>
                <td>
                    <a href="delete.php?uniq=<?= $sorgu->urun_uniq; ?>" class="btn btn-button btn-danger">Sil</a>
                    <a href="update.php?uniq=<?=$sorgu->urun_uniq; ?>" class="btn btn-button btn-warning">Güncelle</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>"Hiç Kayıt Bulunmamaktadır"</p>
    <?php endif;?>
</body>
</html>