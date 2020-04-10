<?php
		$contraseñaActual=$_POST['passwordVieja'];
		$contraseñaNueva=$_POST['passwordNueva'];
		$dni=$_SESSION['dni'];
		$sql="SELECT password FROM login WHERE dni='$dni'";
		$result = mysqli_query($conn, $sql);
		$fila = mysqli_fetch_assoc($result);
		$passwordReal = $fila['password'];
		
		if($contraseñaActual==$passwordReal){
			
			$sql2="UPDATE login SET password='$contraseñaNueva' WHERE dni='$dni'";	
			$_SESSION['passwordFail']=false;
			mysqli_query($conn, $sql2);
			
		} else {
			$_SESSION['passwordFail']=true;
			header("location:../controllers/cambiarContraseña.php");
		}
		mysqli_close($conn);
?>