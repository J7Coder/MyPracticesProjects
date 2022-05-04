
    const loginForm=document.getElementById("formSession");
	const user=document.getElementById("users");
	const errorUser=document.querySelector(".errorUser");
	const errorMessage=document.querySelector(".errorMessage");
	const divs=document.getElementById("error");

	function vaciarErrores(){
		document.querySelector(".vaciar").textContent="";
		errorUser.textContent="";
		document.querySelector(".vaciar_uno").textContent="";
	}


	function mostrarErrores(array){
		vaciarErrores();
		array.forEach(item => {
			item.errorType.classList.remove("d-none");
			item.errorType.textContent=item.error;
		})
	}

	
	
    var Fn = {
	    // Valida el rut con su cadena completa "XXXXXXXX-X"
         validaRut : function (rutCompleto) {
                if (!/^[0-9]+[-|‐]{1}[0-9kK]{1}$/.test( rutCompleto ))
                    return false;
                var tmp 	= rutCompleto.split('-');
                var digv	= tmp[1]; 
                var rut 	= tmp[0];
                if ( digv == 'K' ) digv = 'k' ;
                return (Fn.dv(rut) == digv );
        },
        dv : function(T){
                var M=0,S=1;
                for(;T;T=Math.floor(T/10))
                    S=(S+T%10*(9-M++%6))%11;
                return S?S-1:'k';
        }
    }
			
	function validarSession(){
				
		const errores=[];
	
		 // Uso de la función
		 const rutValid = Fn.validaRut(user.value.trim());

		 if (!rutValid) {
			 errores.push({ errorType: errorUser, error: "El rut no es válido" });
			 user.classList.add("is-invalid");
		 } else {
			 errorUser.classList.add("d-none");
			 user.classList.remove("is-invalid");
		 }

		 //Validar campo usuario
		 if (!user.value.trim()) {
			errores.push({ errorType: errorUser, error: "Este campo es requerido" });
			user.classList.add("is-invalid");
		} else {
			errorUser.classList.add("d-none");
			user.classList.remove("is-invalid");
		}
		 if (errores.length !== 0) {
			mostrarErrores(errores)
			return false;
		} else {
			errorUser.classList.add("d-none");
			return true;
		}
		 

	}

	function desapear(){
		const btn=document.getElementById('close2');
		btn.style.display="none";
	}
