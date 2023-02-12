<?php
//session_save_path('/tmp/test01/session');
session_start();
session_regenerate_id(true);
$item =array();
$temp= array();
$arrayMerge = array();
if(empty($_SESSION['cart']))
{
    $_SESSION['cart'] = array();
if(isset($_POST['check']))
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
    if(isset($_POST['check'] ))	
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

echo "<form method=\"POST\" action=\"delete_cart.php\">";
echo "<table border=\"1\">";

foreach($_SESSION['cart'] as $i => $value)
{
    if($i %3 == 0)
        echo "<tr>";
    if($i %3 == 0)
        echo "<td>" . "<input type=\"hidden\" name=\"product[$i]\" value=\"$value\">" .$value . "</td>";
    if($i %3 == 1)
        echo "<td>" .  "<input type=\"hidden\" name=\"product_id[$i]\" value=\"$value\">" .$value . "</td>";
    if($i %3 == 2)
        echo "<td>" .  "<input type=\"hidden\" name=\"price[$i]\" value=\"$value\">" .$value . "</td>";
    if($i %3 == 2)
        echo "<td>" .  "<input type=\"checkbox\" name=\"check[$i]\">" . "削除" . "</td>";
    if($i %3 == 2)
        echo "</tr>";
    
}
echo "</table>";
echo "<input type=\"submit\" value=\"お支払い\" formaction=\"payment.php\">";
echo "<input type=\"submit\" value=\"カートから商品を消す\">";
echo  "<input type=\"submit\" value=\"カートから全商品消す\" formaction=\"delete_cart_all.php\">";
echo "<input type=\"submit\" value=\"商品リストへ\" formaction=\"item_list.php\">";
echo "</form>";

?>
