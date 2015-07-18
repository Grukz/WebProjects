<html>
<head>
<title>My Form</title>
<link rel="stylesheet" type="text/css "href="style.css">
<style>
body{
	background-image: url('application/view/a.jpg');
}
</style>
</head>

<body>

<?php echo validation_errors(); ?>

<?php echo form_open('form'); ?>
 
<div class ="mid">
<h5>Username</h5>
<input type="text" name="username" value="" size="50" />

<h5>Password</h5>
<input type="text" name="password" value="" size="50" />


<div><input type="submit" value="Submit" /></div>
</form>
</div>

</body>
</html>