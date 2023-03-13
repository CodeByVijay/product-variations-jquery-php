<?php
echo "<pre>";
// print_r($_POST);

$variationName =$_POST['variationName'];
$variation =$_POST['size_variation'];
$stock = $_POST['size_stock'];
$mrp = $_POST['size_price'];
$offer_price = $_POST['size_offer_price'];
$sku = $_POST['size_sku'];
$arrData = [];
for($i=0;$i<count($variationName);$i++){
    for($j=0;$j<count($variation);$j++){
        $arr = ["variationName"=>$variationName[$i],"variation"=>$variation[$j],"stock"=>$stock[$j],"mrp"=>$mrp[$j],"offer_price"=>$offer_price[$j],"SKU"=>$sku[$j]];
        array_push($arrData,$arr);
    }
}
// $arr = array_merge($_POST['size_variation'],$_POST['size_stock'],$_POST['size_price'],$_POST['size_offer_price'],$_POST['size_sku']);
print_r($arrData);
