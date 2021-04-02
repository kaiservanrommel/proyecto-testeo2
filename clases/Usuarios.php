<?php

 class usuarios{
       public function registroUsuario($datos){
       	$c=new conectar();
       	$conexion=$c->conexion();
       	date_default_timezone_set('America/Mexico_City');
       	$fecha=date("Y-m-d H:i:s" );

       	$sqli="INSERT INTO usuarios (nombre,apellido,email,password,fechaCaptura) values ('$datos[0]','$datos[1]','$datos[2]','$datos[3]','$fecha')";
       	return mysqli_query($conexion,$sqli);
       }

public function loginUser($datos){
			$c=new conectar();
			$conexion=$c->conexion();

			$_SESSION['usuario']=$datos[0];
			$_SESSION['iduser']=self::traeID($datos);
			
			$sql="SELECT * 
					from usuarios 
				where email='$datos[0]'
				and password='$password[1]'";
			$result=mysqli_query($conexion,$sql);


			if(mysqli_num_rows($result) > 0){
				return 1;
			}else{
				return 0;
			}

			
		}

		public function traeID($datos){
			$c=new conectar();
			$conexion=$c->conexion();


			$sqli="SELECT id_usuario FROM usuarios WHERE email='$datos[0]'
				and password='$password[1]'";
			$result=mysqli_query($conexion,$sqli);
			
			return mysqli_fetch_row($result)[0];	


		}
 }

?>


