<?php
session_save_path('/tmp/test01/session');
session_start();
session_regenerate_id(true);


echo "<table border=\"1\">";
$price_all =0;
$stock =0;
foreach($_SESSION['cart'] as $i => $value)
{
    if($i %3 == 0)
        echo "<tr>";
    if($i %3 == 0)
        echo "<td>" . $value . "</td>";
    if($i %3 == 1)
        echo "<td>" . $value . "</td>";
    if($i %3 == 2)
    {
        echo "<td>" . $value . "</td>";
        $price_all += $value;
    }
    if($i %3 == 2)
    {
        echo "</tr>";
        $stock++;
    }   
    
}
echo "</table>";

echo "お買い上げありがとうございました。お支払いが" . $price_all*1.10 . "円(税込み)になります。";
echo "<br>";
echo "お買い上げ個数は"  . $stock . "なりました。";
echo "<br>";
echo "次回のお買い上げを期待しております。またお越しになってください。";
echo "<br>";
unset($_SESSION['cart']);

echo "<a href=\"item_list.php\">" . "商品リストへ戻ります。" . "</a>";


?>
