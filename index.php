<?php
	echo nl2br("Welcome to My Shopping Site!!\n");
	echo "<form method=\"POST\" action=\"login.php\">";
    echo "<input type=\"email\" name=\"login_id\">" . "ログインIDを入力してください。" ;
	echo "<br>";
	echo "<input type=\"password\" name=\"login_passwd\">" . "パスワードを入力してください。";
    echo "<br>";
    echo "<input type=\"submit\" value=\"ログイン\">" ;
    echo "</form>";


?>
