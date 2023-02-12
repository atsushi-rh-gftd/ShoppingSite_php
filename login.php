<?php

if(empty($_POST['login_id'] && $_POST['login_passwd']))
   header("Location: index.php");
   else {
       /* POST variables into variables */
       $login = $_POST['login_id'];
       $passwd = $_POST['login_passwd'];
       /*var_dump($_POST); */
	}
include_once 'common.php';
$result;
try {
    /* DB query get name, password ....*/
    
    
   
    $pdo = new PDO($dsn,$db_user,$db_passwd);
    $stmt =$pdo->prepare("SELECT password FROM test_mysql01 where name = ? and password =?;");
    $stmt->bindParam(1, $login, PDO::PARAM_STR);
    $stmt->bindParam(2, $passwd, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetchAll();
    /*var_dump($result); */
    
}catch (PDOException $error)
{
    echo $error->getMessage();
}
?>
<?php
    if($result[0]['password'] == $passwd)
    {
	    session_start();
	    $_SESSION['login'] = true;
	    header('Location: item_list.php');

    }
    else
	    header('Location: index.php');
	  
    
?>
    
