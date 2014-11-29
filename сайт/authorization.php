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
	
	<script type='text/javascript'>
	  $(document).ready(function() {
	      var marg_top = ($(window).height() - 296) / 2;
		  $('#auth').css('margin-top',marg_top);
		  
		  $(window).resize(function(){
			var marg_top = ($(window).height() - 296) / 2;
		    $('#auth').css('margin-top',marg_top);
		  });
		});
		
		function login(){
		  $("#ErrorAlert").remove();
		  
		  if(!$("#inputLogin").val() || !$("#inputPassword").val())
		  {
		    if(!$("#inputLogin").val())
			{
			  $("#inputLogin").attr('aria-describedby', 'LoginStatus');
			  $("#login-group").addClass("has-error has-feedback");
			  $("#in-login-group").append("<span id='LoginGlif' class='glyphicon glyphicon-remove form-control-feedback' aria-hidden='true'></span>");
			  $("#in-login-group").append("<span id='LoginStatus' class='sr-only'>(error)</span>");
			}
		    if(!$("#inputPassword").val())
			{
			  $("#inputPassword").attr('aria-describedby', 'PasswordStatus');
			  $("#pass-group").addClass("has-error has-feedback");
			  $("#in-pass-group").append("<span id='PasswordGlif' class='glyphicon glyphicon-remove form-control-feedback' aria-hidden='true'></span>");
			  $("#in-pass-group").append("<span id='PasswordStatus' class='sr-only'>(error)</span>");
			}
			
		    $("#LoadProgress").css("display", "none");
			  
			return false;
		  }
		  else
		  {
		    $("#OkButton").attr("disabled", "disabled");
		    $("#inputLogin").attr("disabled", "disabled");
		    $("#inputPassword").attr("disabled", "disabled");
			
		    $("#LoadProgress").css("display", "block");
			
			var LogIn = $("#inputLogin").val();
			var Password = $("#inputPassword").val();
			
			$.ajax({
			  type:"POST",
			  url:"login.php",
			  data: {"LogIn":LogIn, "Password":Password},
			  cache: false,
			  success: function(responce){ 
				if (responce == "true")
				{
				  location.reload();
				}
				else
				{
				  $('#ErrorMesege').html("<center><div id='ErrorAlert' class='alert alert-danger' role='alert'><h5>Неверная пара Логин/Пароль!</h5></div></center>");
				  $("#LoadProgress").css("display", "none");
				  $("#OkButton").removeAttr("disabled");
				  $("#inputLogin").removeAttr("disabled");
				  $("#inputPassword").removeAttr("disabled");
				  
				  $("#inputLogin").attr('aria-describedby', 'LoginStatus');
				  $("#login-group").addClass("has-error has-feedback");
				  $("#in-login-group").append("<span id='LoginGlif' class='glyphicon glyphicon-remove form-control-feedback' aria-hidden='true'></span>");
				  $("#in-login-group").append("<span id='LoginStatus' class='sr-only'>(error)</span>");
				  
				  $("#inputPassword").attr('aria-describedby', 'PasswordStatus');
				  $("#pass-group").addClass("has-error has-feedback");
				  $("#in-pass-group").append("<span id='PasswordGlif' class='glyphicon glyphicon-remove form-control-feedback' aria-hidden='true'></span>");
				  $("#in-pass-group").append("<span id='PasswordStatus' class='sr-only'>(error)</span>");
				}
			  }
			})
		  }
		}
		
		function chLogin()
		{
		  $("#login-group").removeClass("has-error");
		  $("#LoginGlif").remove();
		  $("#LoginStatus").remove();
		}
		function chPass()
		{
		  $("#pass-group").removeClass("has-error");
		  $("#PasswordGlif").remove();
		  $("#PasswordStatus").remove();
		}
	</script>
  </head>
  <body class="SUL">
    <div class="container" id="auth">
	  <div class="row">
		<div class="col-md-offset-4 col-md-4">
		  <center><h1>Авторизация</h1></center>
		  <hr />
		</div>
	  </div>
	  <div class="row">
		<div id="ErrorMesege" class="col-md-offset-4 col-md-4">
		</div>
	  </div>
	  <div class="row">
	    <div class="col-sm-offset-4 col-sm-4 col-md-4 col-md-offset-4">
		  <form class="form-horizontal" role="form">
			<div id="login-group" class="form-group">
			  <div id="in-login-group" class="col-sm-10 col-sm-offset-1">
				<input type="login" name="LOGIN" class="form-control" id="inputLogin" placeholder="Логин" onchange="chLogin()">
			  </div>
			</div>
			<div id="pass-group" class="form-group">
			  <div id="in-pass-group" class="col-sm-10 col-sm-offset-1">
				<input type="password" name="PASSWORD" class="form-control" id="inputPassword" placeholder="Пароль" onchange="chPass()">
			  </div>
			</div>
			<div class="form-group">
			  <div class="col-md-offset-4 col-md-4">
				<p class="text-center">
				  <button id="OkButton" type="button" class="btn btn-primary" onclick="login()">Войти</button>
				</p>
			  </div>
			</div>
		  </form>
		</div>
	  </div>
	</div>
	<div class="container">
	  <div class="row">
		<div class="col-md-offset-4 col-md-4">
		  <div id="LoadProgress" class="progress">
			<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 100%"><span class="sr-only">45% Complete</span></div>
		  </div>
		</div>
	  </div>
	</div>
  </body>
</html>