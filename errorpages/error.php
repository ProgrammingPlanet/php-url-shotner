<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Whoops! That's an Error.</title>
	<style>
		body{
			margin: 0;
			padding: 0;
			width: 100vw;
			height: 100vh;
			display: flex;
            justify-content: center;
			align-items: center;
            text-align: center;
		}
		#main{
			font-size: 300%;
            font-weight: bold;
            color: red;
		}
	</style>
	<script src="../removebanner.js"></script>
</head>

<body>
    
	<div id="main">
		<?php echo isset($error) ? $error : "OOPS!, Something Went Wrong." ?><br>
        <p style="font-size: 40%;color:black;"> for broken links or any other issue, contact us on <strong style="color:green;">info@zlink.ml</strong> </p>
	</div>
    <br>
    
</body>
</html>
