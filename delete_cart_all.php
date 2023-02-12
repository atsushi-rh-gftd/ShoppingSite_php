<?php
//session_save_path('/tmp/test01/session');
session_start();
session_regenerate_id(true);

unset($_SESSION['cart']);

echo "カートから全商品を取り消しました。";
echo "<br>";

echo "<form method=\"GET\" action=\"item_list.php\">";
echo "<input type=\"submit\" value=\"商品リストへ\">";
echo "</form>";



?>
