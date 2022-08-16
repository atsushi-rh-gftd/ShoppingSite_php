<?php
session_save_path('/tmp/test01/session');
session_start();
session_regenerate_id(true);
$item =array();
$temp= array();
$arrayMerge = array();
if(empty($_SESSION['cart']))
{
    $_SESSION['cart'] = array();

foreach($_POST['check'] as $i => $value)
{
    if(isset($_POST['check'][$i]) && $_POST['check'][$i] == 'on')
    {
        $item = array($_POST['product_id'][$i], $_POST['product'][$i], $_POST['price'][$i]);
        $temp = array_merge($temp, $item);
    }
    $_SESSION['cart'] = array_values($temp);   
}
}else {
    $arrayMerge = $_SESSION['cart'];
    foreach($_POST['check'] as $i => $value)
    {
     if(isset($_POST['check'][$i]) && $_POST['check'][$i] == 'on')
    {
        $item = array($_POST['product_id'][$i], $_POST['product'][$i], $_POST['price'][$i]);
        $temp = array_merge($arrayMerge, $item);
        $arrayMerge = array_values($temp);
    }
    }
    $_SESSION['cart'] = $arrayMerge;
}


foreach($_SESSION['cart'] as $i => $value)
{
    echo $value;
    if($i %3 ==2)
        echo "<br>";
}

?>
