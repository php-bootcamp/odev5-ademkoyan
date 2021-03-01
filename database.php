<?php

$host = "localhost";
$user = "root";
$pass = "";
$dbName = "odev5";

try {
    $pdo = new PDO("mysql:host=".$host.";dbname=".$dbName, $user, $pass);
    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Bağlantı Hatası!";
    exit;
}

if(isset($_POST['sil'])){
    $urun_uniq = $_POST['urun_uniq'];

    $delete = $pdo->exec("DELETE FROM urunler WHERE urun_uniq = '$urun_uniq'");

    if($delete){
        echo $delete." kayıt silindi";
        header("Location: index.php");
    }
}


if(isset($_POST['güncelle'])){

    $urun_id = $_POST['urun_id'];
    $urun_name = $_POST['urun_name'];
    $urun_price = $_POST['urun_price'];
    $urun_des = $_POST['urun_des'];
    $urun_con = $_POST['urun_con'];
    $urun_kat = $_POST['urun_kat'];


    $update = $pdo->exec("UPDATE urunler SET urun_id ='$urun_id', urun_name = '$urun_name', 
                            urun_price = '$urun_price', urun_des = '$urun_des', urun_con = '$urun_con' WHERE urun_id = '$urun_id'");

    if($update){
        echo $update." kayıt güncellendi";
        header("Location: index.php");
    }
}

if(isset($_POST['urunEkle'])){

    $urun_uniq = uniqid();
    $urun_id = $_POST['urun_id'];
    $urun_name = $_POST['urun_name'];
    $urun_price = $_POST['urun_price'];
    $urun_des = $_POST['urun_des'];
    $urun_con = $_POST['urun_con'];
    $urun_kat = $_POST['urun_kat'];
    $kategori_uniq = uniqid();


    $addUrun = $pdo->exec("INSERT INTO urunler (urun_uniq,urun_id,urun_name,urun_price,urun_des,urun_con)
                            VALUES ('$urun_uniq','$urun_id','$urun_name','$urun_price','$urun_des','$urun_con')");

    $katUpdate = $pdo->exec("INSERT INTO kategori (kategori_uniq, kategori_name, urun_id)
                            VALUES ('$kategori_uniq','$urun_kat','$urun_id') ");
    if($addUrun){
        echo $addUrun." kayıt eklendi";
        header("Location: index.php");
    }
}

if(isset($_POST['kategoriEkle'])) {

    $kategori_uniq = uniqid();
    $kategori_name = $_POST['kategori_name'];
    $urun_id = $_POST['urun_id'];

    $addKategori = $pdo->exec("INSERT INTO kategori (kategori_uniq, kategori_name, urun_id)
                            VALUES ('$kategori_uniq','$kategori_name','$urun_id') ");
    if ($addKategori) {
        echo $addKategori . " Kategori eklendi";
        header("Location: index.php");
    }

}
