<?php  
  /*$dbhost = "localhost"; // Имя хоста БД
  $dbusername = "root"; // Пользователь БД
  $dbpass = ""; // Пароль к БД
  */
  $dbhost = "mysql.hostinger.ru"; // Имя хоста БД
  $dbusername = "u804901515_test"; // Пользователь БД
  $dbpass = "12345678"; // Пароль к БД
  
  $dbconnect = @mysql_connect ($dbhost, $dbusername, $dbpass) or die(mysql_error());;
  /*
  $dbname = "jurnal"; //Имя БД
  */
  $dbname = "u804901515_test"; //Имя БД
  
  mysql_select_db($dbname ,$dbconnect) or die(mysql_error());;
  
  function test($Login, $Password)
  {
    $query = "SELECT `pass` FROM  `users` WHERE `login` = '".$Login."' AND `pass` = '".$Password."'";
	
	//echo  $query;
	
	$sql = mysql_query($query) or die(mysql_error());;
	
	//echo $sql;
	
	if (mysql_num_rows($sql) == 1)
	{
	  //echo "false";
	  return true;
	}
	else
	{
	  //echo "false";
	  return false;
	}
  }
?>