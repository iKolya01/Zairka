<?
  include_once("connect.php");

  $LogIn = $_POST["LogIn"];
  $Password = $_POST["Password"];
  
  $query = "SELECT `pass` FROM  `users` WHERE `login` = '".$LogIn."' AND `pass` = '".$Password."'";
  $sql = mysql_query($query, $dbconnect) or die(mysql_error());
  if (mysql_num_rows($sql) == 1)
  {
	setcookie("login", $LogIn/*, time()+900*/);
	setcookie("password", $Password/*, time()+900*/);
	
	echo "true";
  }
  else
  {
	echo "false";
  }
?>