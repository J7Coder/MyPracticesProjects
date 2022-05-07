<?php
	session_start();
	require '../viewIndex/user.php';

	$errors ='';
	if(isset($_POST['btnIntrar'])){
  		// validate entries
  		$validation = new Session($_POST);
  		$session = $validation->sessionValidate();
  		if($session==0){
			  $errors="Usuario no se encontrado!";
		}
		if($session==-1){
			$errors="Usuario o contraseña icorrecto!";
		}
  		if($session==1){
			$_SESSION["user"] = $_POST['user'];
 			$_SESSION["pass"] = $user['password'];
			header('Location:../menuPrincipal/index.php');
		  }
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link rel="stylesheet" href="css/style.css">

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

		<!-- Latest compiled and minified CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

	<!-- Latest compiled JavaScript -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>


</head>
<body>
	<div class="form-holder">
		<img src="img/logo3.png">
		<form action="<?php echo $_SERVER['PHP_SELF'] ?>"  method="POST" id="formSession" onSubmit="return validarSession()">
			<div class="text-center">Iniciar Sesión</div>
			<input type="text" placeholder="Usuario" name="user" id="users"  class="form-control ml-3 mb-3" onfocus="vaciarMessage()" value="<?php if(isset($_POST["user"])){echo htmlspecialchars($_POST['user']);}?>">
			<p class="errorUser text-center d-none text-danger"></p> 
			<input type="password" placeholder="Contraseña" name="password" id="passwords"  class="form-control ml-3 mt-3" onfocus="vaciarMessage()" value="<?php if(isset($_POST["user"])){echo htmlspecialchars($_POST['password']);}?>">
			<p class="errorPass d-none text-center text-danger"></p>
			<p class=" errorMessage text-center text-danger"><?php echo $errors; ?></p>
			<button name="btnIntrar" type="submit">Ingresar</button>
		</form>
	</div>


	<script>
		function vaciarMessage(){
			let div=document.querySelector('.errorMessage');
			div.style.display="none";
		}
		function mostrarErrores(array){
	   		array.forEach(item => {
	       		item.errorType.classList.remove("d-none");
	       		item.errorType.textContent=item.error;
	   		})
		}
		const loginForm=document.getElementById("formSession");
		const user=document.getElementById("users");
		const pass=document.getElementById("passwords");
		const errorUser=document.querySelector(".errorUser");
		const errorPass=document.querySelector(".errorPass");
		function validarSession(){


	 		const errores=[];
	 		if(!user.value.trim()){
	 			errores.push({errorType:errorUser,error:"Este campo es requerido"})
	 		}

	 		if(!pass.value.trim()){
	 			errores.push({errorType:errorPass,error:"Este campo es requerido"})
	 		}
	 		if(errores.length !== 0){
	 			mostrarErrores(errores)
	 			return false;
	 		}else{
	 			errorUser.classList.add("d-none");
	 			errorPass.classList.add("d-none");
	 			return true; 
	 		}
			
		}
	</script>
</body>
</html>