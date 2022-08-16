<?php
session_save_path('/tmp/test01/session');
session_start();
session_regenerate_id(true);

foreach($_POST['check'] as $i => $value)
{
    if(isset($_POST['check'][$i]) && $_POST['check'][$i])
    {
        unset($_SESSION['cart'][$i]);
        unset($_SESSION['cart'][$i-1]);
        unset($_SESSION['cart'][$i-2]);
              
    }
}

array_values($_SESSION['cart']);


echo "<form method=\"POST\" action=\"item_list.php\">";
echo "<input type=\"submit\" value=\"商品リストへ戻る\">";

echo "</form>";


?>
