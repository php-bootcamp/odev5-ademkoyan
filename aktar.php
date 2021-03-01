<?php

include("database.php");
?>
<br /><br />

    <form method="post">
            <input type="file" name="jsonFile"><br />
            <input type="submit" name="submit" value="Import" name="Dosyayı Aktar">
    </form>
<?php
if(isset($_POST['submit'])) {

    copy($_FILES['jsonFile']['tmp_name'], 'jsonFiles/' . $_FILES['jsonFile']['name']);

    $dataSet = file_get_contents('jsonFiles/' . $_FILES['jsonFile']['name']);

    $products = json_decode($dataSet, true);

    foreach ($products as $product) {

        $stmt = $pdo->prepare("INSERT INTO urunler(urunler_uniq,urunler_name,urunler_price,urunler_des,urunler_con) 
                                VALUES(:products_uniqid, :products_name, :price,:description,:content)");
        $stmt->bindValue(':products_uniqid', $product['urunler_uniq'], PDO::PARAM_STR);
        $stmt->bindValue(':products_name', $product['urunler_name'], PDO::PARAM_STR);
        $stmt->bindValue(':price', $product['urunler_price'], PDO::PARAM_STR);
        $stmt->bindValue(':description', $product['urunler_des'], PDO::PARAM_STR);
        $stmt->bindValue(':content', $product['urunler_con'], PDO::PARAM_STR);
        /* $stmt->bindValue(':category_uniqid',$product['kategori_uniq'], PDO::PARAM_STR);
         $stmt->bindValue(':category_name',$product['_name'], PDO::PARAM_STR);
        */

        $stmt->execute();
    }
    header('Location:index.php?status=success');
}
