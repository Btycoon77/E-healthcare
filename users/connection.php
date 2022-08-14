<!DOCTYPE html>
<html> 
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>connection</title>
</head>

<body>
<?php 

$con = mysqli_connect('localhost','root','','e-healthcare');
if (!$con){ 
       echo "connection failed";
}
error_reporting(0);
?>
</body>
</html>