<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Levitas Online - 404</title>
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="stylesheet" type="text/css" href="themes/js/bootstrap/css/bootstrap.css">
    <!-- Demo page code -->

    <style type="text/css">
		/*Error Pages*/
		body {
		  background-image: url('<?php echo base_url()?>themes/images/shared/m404.png');
		  background-position: initial initial;
		  background-size: 100%;
		  margin: 0px;
		  padding: 0px;
		}
		body .http-error {
		  margin: 0px auto;
		  margin-top: 5em;
		  border-bottom: 1px solid #292929;
		  border-top: 1px solid #000;
		  text-align: center;
		  color: #444;
		  font-size: 1.5em;
		  line-height: 1.3em;
		}
		body .http-error .http-error-message {
		  border-top: 1px solid #292929;
		  border-bottom: 1px solid #000;
		  padding: 3em 0em;
		}
		body .http-error .error-caption {
		  background: #333;
		  color: #fff;
		  display: inline-block;
		  border: 1px solid black;
		  -webkit-box-shadow: 0px 0px 12px rgba(0, 0, 0, 0.9);
		  -moz-box-shadow: 0px 0px 12px rgba(0, 0, 0, 0.9);
		  box-shadow: 0px 0px 12px rgba(0, 0, 0, 0.9);
		  text-shadow: 1px 1px 1px #000;
		  border: 2px solid #ccc;
		  height: 7em;
		  padding: 0em 3em;
		}
		body .http-error .error-caption p {
		  position: relative;
		  top: 2.75em;
		}
		body .http-error .error-message {
		  height: 7em;
		  padding: 0em 3em;
		  background: #eee;
		  color: #333;
		  text-shadow: 1px 1px 1px #eee;
		  display: inline-block;
		  border: 2px solid #444;
		  -webkit-box-shadow: 0px 0px 12px rgba(0, 0, 0, 0.9);
		  -moz-box-shadow: 0px 0px 12px rgba(0, 0, 0, 0.9);
		  box-shadow: 0px 0px 12px rgba(0, 0, 0, 0.9);
		}
		body .http-error .error-message .return-home {
		  text-align: right;
		  font-size: .65em;
		  float: left;
		  position: relative;
		  top: 4em;
		}
		body .http-error .error-message p {
		  position: relative;
		  top: 2.75em;
		}
		body .http-error p {
		  margin: 0px;
		}
		
		.row-fluid .dialog,
		.row-fluid [class*="span"].dialog:first-child {
		  margin: 0px auto;
		  margin-top: 5em;
		  float: none;
		  width: 400px;
		}
		.dialog input[type="checkbox"],
		.row .dialog input[type="checkbox"],
		.row-fluid .dialog input[type="checkbox"],
		.row-fluid [class*="span"].dialog:first-child input[type="checkbox"] {
		  margin: 0px;
		}
		.dialog .alert,
		.row .dialog .alert,
		.row-fluid .dialog .alert,
		.row-fluid [class*="span"].dialog:first-child .alert {
		  margin-bottom: 1em;
		}
		.dialog form,
		.row .dialog form,
		.row-fluid .dialog form,
		.row-fluid [class*="span"].dialog:first-child form {
		  margin-bottom: 0px;
		}
		.dialog .remember-me,
		.row .dialog .remember-me,
		.row-fluid .dialog .remember-me,
		.row-fluid [class*="span"].dialog:first-child .remember-me {
		  padding: .5em 0em 0em 0em;
		}
    </style>

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
  </head>

  <!--[if lt IE 7 ]> <body class="ie ie6"> <![endif]-->
  <!--[if IE 7 ]> <body class="ie ie7 http-error"> <![endif]-->
  <!--[if IE 8 ]> <body class="ie ie8 http-error"> <![endif]-->
  <!--[if IE 9 ]> <body class="ie ie9 http-error"> <![endif]-->
  <!--[if (gt IE 9)|!(IE)]><!--> 
  <body class="http-error"> 
  <!--<![endif]-->
	<div class="row-fluid">
		<!--div class="http-error">
			<!--div class="http-error-message">
				<div class="error-caption">
					<p><?php echo $heading; ?></p>
				</div>
				<div class="error-message">
					<p><?php echo $message; ?><p>
				</div>
			</div-->
		<!--/div-->
	</div>
  </body>
</html>


