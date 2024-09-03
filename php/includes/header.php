<!Doctype html>
<?php
	require 'php/init.php';
	
	$title = basename($_SERVER['SCRIPT_NAME']);
	$title = str_ireplace('.php', '', $title);
	
	ucfirst($title);
	
	if($title == 'index')
		$title = 'Home';
?>
<html>
	<head>
		<title><?php echo $title ?></title>
		 
	 	<link href="assets/css/font-awesome.css" rel="stylesheet" media="screen">
     	<link href="assets/css/my_style.css" rel="stylesheet" media="screen">
	 	<link href="assets/css/print.css" rel="stylesheet" media="print">
	 	<link type="text/css" href="assets/css/bootstrap.css" rel="stylesheet"/>
	 	<link type="text/css" href="assets/css/bootswatch.css" rel="stylesheet"/>
		<link type="text/css" href="assets/css/stylesheet.css" rel="stylesheet"/>
		
		<script type="text/javascript" src="assets/js/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="assets/js/bootstrap.js"></script>
		<script type="text/javascript" src="assets/js/jquery.validate.js"></script>
		<script type="text/javascript" src="assets/js/script.js"></script>
		<script type="text/javascript" src="assets/js/validator.js"></script>
		<script>
		$(function(){
		// highlight
			var elements = $("input[type!='submit'], textarea, select");
			
			elements.focus(function(){
				$(this).parents('li').addClass('highlight');
			});
			
			elements.blur(function(){
				$(this).parents('li').removeClass('highlight');
			});

			
			$("#password").removeClass("required");
			$("#login_form").submit();
			$("#password").addClass("required");
			return false;
			});

			$("#login_form").validate();
		});

		
	</script>
	</head>
	<body>
	<head>
    <style>
        /* Position the Google Translate widget */
        #google_translate_element {
            position: fixed;
            top: 10px;
            right: 10px;
            z-index: 9999;
            transform: scale(1.25);
            transform-origin: top right;
        }

        /* Hide the "Powered by Google" */
        .skiptranslate > iframe.skiptranslate {
            display: none;
        }

        body {
            top: 0px !important;
        }

        /* Set the size and style for the dropdown list */
        .goog-te-menu-frame.skiptranslate {
            width: 150px !important;
            height: auto !important;
            overflow-y: auto !important;
        }

        .goog-te-menu2 {
            max-height: 400px !important;
            overflow-y: auto !important;
        }

        .goog-te-menu2 table {
            width: 100% !important;
        }

        .goog-te-menu2 td {
            text-align: left;
            font-size: 14px;
        }

        .goog-te-menu2 .goog-te-menu2-item div {
            padding: 4px 6px;
        }

        .goog-te-menu2-item div span.text {
            display: block;
            font-family: Arial, sans-serif;
        }
    </style>
</head>
<body>
    <!-- Google Translate widget -->
    <div id="google_translate_element"></div>
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en',
                layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
                autoDisplay: false,
                includedLanguages: 'as,bn,gu,hi,kn,ml,mr,pa,ta,en,bho' // Add the Indian languages here
            }, 'google_translate_element');
        }
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>