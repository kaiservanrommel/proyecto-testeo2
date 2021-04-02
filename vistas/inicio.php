<?php 

session_start();

if(isset($_SESSION['usuario'])){




?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	

</body>
</html>

<?php 

}else {
	header("../index.php");
}
?>