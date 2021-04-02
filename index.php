<?php

require_once "clases/Conexion.php";
$obj=new conectar();
$conexion=$obj->conexion();

$sql="SELECT * FROM usuarios WHERE email ='admin'";
$result=mysqli_query($conexion,$sql);
$validar=0;
if(mysqli_num_rows($result)>0){
	$validar=1;
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>login de usuario</title>
	<link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
	<script src="librerias/jquery-3.2.1.min.js"></script>
	<script src="js/funciones.js"></script>
</head>
<body>

	<br><br><br>
	<div class="container">
		<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
				<div class="panel panel-primary">
					<div class="panel panel-heading">sistema de vantas y almacen</div>
					<div class="panel panel-body">
						<p>
							<img src="img/linkedin_banner_image_1.png" height="160px">
						</p>	

						<form id="frmLogin">
						    <label>usuario</label>
						    <input type="text" class="form-control input-sm" name="usuario" id="usuario">	
						    <label>password</label>
						    <input type="password" class="form-control input-sm" name="password" id="password">
						    <p></p>
						    <span class="btn btn-primary btn-sm" id="entrarSistema">ingresar</span>
						    <?php if(!$validar): ?> 
						    <a href="registro.php" class="btn btn-danger btn-sm">registrate</a>
                            <?php endif; ?> 
						</form>
					</div>
			    </div>
			</div>
			<div class="col-sm-4"></div>
		</div>
	</div>

</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#entrarSistema').click(function(){

		vacios=validarFormVacio('frmLogin');

			if(vacios > 0){
				alert("Debes llenar todos los campos!!");
				return false;
			}

		datos=$('#frmLogin').serialize();
		$.ajax({
			type:"POST",
			data:datos,
			url:"procesos/regLogin/login.php",
			success:function(r){


				alert(r);

				if(r==1){
					window.location="vistas/inicio.php";
				}else{
					alert("No se pudo acceder :(");
				}
			}
		});
	});
	});
</script>