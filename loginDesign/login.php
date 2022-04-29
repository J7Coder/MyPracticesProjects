<?php
	session_start();
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
		<form  method="Get" id="formSession" onsubmit="return validarSession()">
			<div class="text-center">Iniciar Sesión</div>
			<input type="text" placeholder="Usuario" name="user" id="users"  class="form-control ml-3 mb-3">
			<p class="errorUser text-center d-none text-danger"></p> 
			<input type="password" placeholder="Contraseña" name="password" id="passwords"  class="form-control ml-3 mt-3">
			<p class="errorPass d-none text-center text-danger"></p>
			<p class=" errorMessage text-center text-danger"></p>
			<button name="btnIntrar" type="submit">Ingresar</button>
		</form>
	</div>


	<script>

	const loginForm=document.getElementById("formSession");
	const user=document.getElementById("users");
	const pass=document.getElementById("passwords");
	const errorUser=document.querySelector(".errorUser");
	const errorPass=document.querySelector(".errorPass");
	const errorMessage=document.querySelector(".errorMessage");
	const form=document.getElementById("formSession");

	function mostrarErrores(array){
		array.forEach(item => {
			item.errorType.classList.remove("d-none");
			item.errorType.textContent=item.error;
		})
	}
			let datas={};
				fetch("http://localhost/Grupos/viewIndex/user.php")
				.then(res=>res.json())
				.then(data=>datas=data[0]); 

			function validarSession(){
				
				const errores=[];
			

				if(!user.value.trim()){
					errores.push({errorType:errorUser,error:"Este campo es requerido"});
					user.classList.add("is-invalid");
				}else{
					errorUser.classList.add("d-none");
					user.classList.remove("is-invalid");
				}
			
				if(!pass.value.trim()){
					errores.push({errorType:errorPass,error:"Este campo es requerido"});
					pass.classList.add("is-invalid");
				
				}else{
					errorPass.classList.add("d-none");
					pass.classList.remove("is-invalid");
				}

			if(pass.value!=="" && user.value!==""){
				if(pass.value.trim()!==datas.Password || user.value.trim()!==datas.Usuario){
						errores.push({errorType:errorMessage,error:"Usuario/Contraseña es incorrecta"});
				}
			}
				
				if(errores.length!==0){
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