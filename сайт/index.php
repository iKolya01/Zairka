<?
  include_once("connect.php");
  
  //session_start();
  //unset($_SESSION['LogIn']);
  //echo $_SESSION['LogIn']." = ".$_SESSION['Password'];
  
  //print_r($_COOKIE);
  
  if(!empty($_COOKIE['login']) && !empty($_COOKIE['password']) && test($_COOKIE['login'], $_COOKIE['password']))
  { 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Классный журнал</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	
    <!-- Personal style -->
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	
	<script>
	  $(document).ready(function() {
		$("#btnLogOut").click(function(){
		  $.ajax({
			  type:"POST",
			  url:"logout.php",
			  data: {},
			  cache: false,
			  success: function(responce){
			    location.reload();
			  }
			})
		})
	  });
	</script>
	
  </head>
  <body class="SUL">
    <div class="container">
	  <h1>Вы вошли как <?echo $_COOKIE['login'];?>.</h1>
	  <button id="btnLogOut" type="button" class="btn btn-danger">Выход</button>
	</div>
  </body>
</html>

<?
  }
  else
  {
    include_once("authorization.php");
  }
?>