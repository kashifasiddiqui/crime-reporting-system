<?php
include 'php/includes/header.php';
?>


<?php
//require 'php/init.php';

$title = basename($_SERVER['SCRIPT_NAME']);
$title = str_ireplace('.php', '', $title);

ucfirst($title);

if ($title == 'index')
	$title = 'Home';
?>
<html>

<head>

	<title><?php echo $title; ?></title>

	<meta name="viewport" content="width=device-width; initial-scale=1.0">
	<link href="libraries/bootstrap/css/font-awesome.css" rel="stylesheet" media="screen">
	<link href="libraries/bootstrap/css/my_style.css" rel="stylesheet" media="screen">
	<link href="libraries/bootstrap/css/print.css" rel="stylesheet" media="print">
	<link type="text/css" href="libraries/css/bootstrap.css" rel="stylesheet" />
	<link type="text/css" href="libraries/css/bootswatch.css" rel="stylesheet" />
	<!-- <link href="css/screen.css" rel="stylesheet" media="screen"> -->


	<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
	<script type="text/javascript" src="libraries/bootstrap/js/bootstrap.js"></script>
	<script type="text/javascript" src="js/validator.js"></script>

	<script type="text/javascript">
		$(function() {
			// highlight
			var elements = $("input[type!='submit'], textarea, select");
			elements.focus(function() {
				$(this).parents('li').addClass('highlight');
			});
			elements.blur(function() {
				$(this).parents('li').removeClass('highlight');
			});

			$("#forgotpassword").click(function() {
				$("#password").removeClass("required");
				$("#loginform").submit();
				$("#password").addClass("required");
				return false;
			});

			$("#loginform").validate();

			$('#loginform').submit(function(e) {
				e.preventDefault();


				var isValid = $('#loginform').valid();

				if (isValid) {
					var data = $('#loginform').serialize();

					$.post('php/dataHandler.php', data, function(data2) {

						var feedBack = JSON.parse(data2);

						var success = String(feedBack.success);

						if (success == 'pass') {
							$('#loginform').each(function() {
								this.reset();
							});

							var email = String(feedBack.email);

							if (email == 'Admin') {
								location.replace('redirect.php');
							} else {
								location.replace('index.php');
							}
						} else if (success == 'fail') {
							$('#error_message').html('<div style="background-color:#FFE0FF; padding:5px 10px;border-radius:5px;font-family:Verdana; border:2px solid #FFC2FF;">Wrong email and password combination.Try again</div>');
							$('#password').val("");
						}

					});


				}

				return false;
			});
		});
	</script>
	<style type="text/css">
.right-side .form-control {
    width: 100%;
    padding: 10px;
    border-radius: 15px;
    font-size: 14px;
}


.right-side .form-group {
    margin-bottom: 15px;
}

.right-side input[type="text"], 
.right-side input[type="password"] {
    width: 70%; /* Adjust the width to make the text boxes smaller */
	height: 35px;
    margin: 0 auto; /* Center the text boxes */
    border-radius: 15px; /* Add border radius */
    padding: 10px;
}

.right-side .btn-deep-purple {
    background-color: #200202;
    color: white;
	float: right;
    width: 20%;
    padding: 7px;
    border-radius: 15px; /* Add border radius to the button as well */
    font-size: 16px;
    cursor: pointer;
}

.right-side .btn-deep-purple:hover {
	background: #C70039;
    transform: scale(1.05);
}

#forgotpassword {
    color: #200202;
    display: block;
    text-align: center;
    margin-top: 10px;
}

@media (max-width: 768px) {
    .right-side {
        padding: 20px;
    }

    .right-side input[type="text"], 
    .right-side input[type="password"] {
        width: 100%; /* Make the text boxes full width on smaller screens */
    }
}


		.error {
			color: red;
			padding: 5px 0px;
		}
		
#main {
    padding-bottom: 45px; /* Adds space between the main content and the footer */
}

footer {
    padding-top: 20px; /* Optional: Adds space at the top of the footer */
}

	</style>
</head>

<body>
<div class="container" id="wrapper">
    <div id="header">
        <div class="mainLogo">
            <div class="logo"><img src="assets/images/lgnew.png" width="170px" height="70px" /> </div>
        </div>
        <div style="clear:both;"></div>
		<div id="nav">
			<?php include 'php/includes/navigation.php' ?>
		</div>
		<div id="main">
			<div class="row">

				<div class="container">

					<div class="col-md-10 col-md-offset-1">
						<div class="col-md-3">
						</div>
						<!--col-sm-6-->

						<div class="col-md-6 right-side">
							<h3 style="padding-left:145px;"><img src="assets/images/lockscreen.png"> &nbsp; <span style="margin-bottom:20px;"><b>Login</b> </span></h3>
							<div class="clearfix" style="padding-top: 20px;"></div>

							<!--Form with header-->
							<div class="row">
								<form class="form" method="post" id="loginform">
									<ul type="none" style="padding-left: 0px;">
										<li id="error_message"></li>
									</ul>

										<div class="form-group">
										<label for="email" style="padding-left:69px;">Your e-mail</label>
										<input id="email" name="email" type="text"  class="form-control input-md text required email">
										<label for="email" class="error" style="display:none;">This must be a valid email address</label>
									</div>

									<div class="form-group">
										<label for="password" style="padding-left:69px;">Your password</label>
										<input name="password" type="password" id="password" class="form-control input-md text required" minlength="4" maxlength="20">

									</div>
									<div class="form-group" style="padding-top: 20px; padding-bottom:50px">

										<div class="text-xs-center">
											<button class="btn btn-deep-purple">Login</button>
										</div>

										<label class="centered info"><a id="forgotpassword" href="#" style="margin-top:10px;font-family: trebuchet ms;font-size: 13px;font-weight:normal; padding-left:30px;">Forgot password</a>
										</label>
									</div>
								</form>
							</div>
							<!--/Form with header-->

						</div>
						<!--col-sm-6-->


					</div>
					<!--col-sm-8-->

				</div>
				<!--container-->

			</div>


		</div>

		<?php include 'php/includes/footer.php'; ?>