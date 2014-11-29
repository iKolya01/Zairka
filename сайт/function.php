<?
  include_once("connect.php");
  
  function test($Login, $Password)
  {
    $query = "SELECT `pass` FROM  `users` WHERE `login` = '".$Login."' AND `pass` = '".$Password."'";
	
	$sql = mysql_query($query, $dbconnect);
	
	if (mysql_num_rows($sql) == 1)
	{
	  echo "false";
	  return true;
	}
	else
	{
	  echo "false";
	  return false;
	}
  }
?>