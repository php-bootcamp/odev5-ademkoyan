<?php
include("database.php");
$output = [];

if (isset($pdo)) {
    $urunler = $pdo->prepare("SELECT * FROM urunler");

    $urunler->execute();
    $urunDon = $urunler->fetchAll(PDO::FETCH_OBJ);

    foreach ($urunDon as $urun) {

        $katSorgu = $pdo->prepare("SELECT kategori_uniq, kategori_name FROM kategori WHERE urun_id =" . $urun->urun_id);
        $katSorgu->execute();
        $kat = $katSorgu->fetchAll(PDO::FETCH_OBJ);

        $output[] = [
            "uniqid" => $urun->urun_uniq,
            "name" => $urun->urun_name,
            "price" => $urun->urun_price,
            "description" => $urun->urun_des,
            "content" => $urun->urun_con,
            "category" => $kat
        ];
    }
    header("Content-disposition:attachment; filename=products.json");
    header("Content-type:application/json");
    echo json_encode($output, JSON_PRETTY_PRINT);
}