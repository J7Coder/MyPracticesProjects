function validarDelete(){
    let responce=confirm("¿Estas seguro que deseas eliminar este grupo?");
    if(responce){
        return true;
    }
    return false;
}
function validarEliminar(){
    let responce=confirm("¿Realmente quieres eliminar todos los grupos?");
    if(responce){
        return true;
    }

    return false;
}

function validarForm(){
    let proceso=document.getElementById("proceso").value;
    let t1=document.getElementById("t1").value;
    let t2=document.getElementById("t2").value;
    let t3=document.getElementById("t3").value;
    let t4=document.getElementById("t4").value;
    let color=document.getElementById("color").value;
    let error=document.getElementById("error");
    let bodega=document.getElementById("bodega").value;
    let texto="Selecciona un trabajador";
    if(proceso=="Selecciona un proceso"){
        error.textContent="Debes seleccionar un proceso";
        return false;
    } if(t1==texto &&t2==texto && t3==texto && t4==texto){
        error.textContent="Debes seleccionar por lo menos un trabajador";
        return false;
    } if(color=="Elige un color"){
        error.textContent="Debes elegir un color";
        return false;
    }if(bodega==""){
        error.textContent="Debes ingresar una bodega";
        return false;
    }
    return true;
    
}

function validarEditar(){
    let proceso=document.getElementById("process").value;
    let t1=document.getElementById("tb1").value;
    let t2=document.getElementById("tb2").value;
    let t3=document.getElementById("tb3").value;
    let t4=document.getElementById("tb4").value;
    let error=document.getElementById("error2");
    let bodega=document.getElementById("bodega2").value;
    let texto="";

    if(proceso==texto){
        error.textContent="Debes Ingresar el Proceso a realizar";
        return false;
    } if(t1==texto &&t2==texto && t3==texto && t4==texto){
        error.textContent="Debes ingresar por lo menos un trabajador";
        return false;
    }
    if(bodega==texto){
        error.textContent="Debes ingresar la bodega";
        return false;
    }
    return true;
}

function validarCancelar(){
    let responce=confirm("¿Realmente quieres cancelar la operación?");
    if(responce){
        return true;
    }

    return false;
}

function validarProceso(){
    let errors=document.getElementById("errors");
    let proceso=document.getElementById("procesos").value;
    let meta=document.getElementById("metas").value;
    let precio=document.getElementById("precios").value;
    let url=document.getElementById("urls").value;
    if(proceso==""){
        errors.textContent="Debes ingresar el nombre del proceso";
         return false;
    }
    if(meta==""){
        errors.textContent="Debes ingresar la meta del proceso";
         return false;
    }
    if(precio==""){
        errors.textContent="Debes ingresar el precio del proceso";
         return false;
    }
    if(url==""){
        errors.textContent="Una imagen es requerida";
         return false;
    }
    return true;

}

function eliminarProceso(){
     if(confirm("Estás a punto de eliminar este proceso del sistema\n ¿Quieres realizar esta operación?")){
        return true;
     }
    return false;
}
 function validarBuscar(){
     let key=document.querySelector(".key-word").value;
      if(!key==""){
          return true;
      }else{
          alert("Debes escribir el nombre del proceso que quieres buscar");
          return false;
      }
 }

 function errorMessage(){
     let message=document.querySelector(".message").value;
     if(!message==""){
         alert(message);
     }
 }


 function validarBuscarDos(){
    let key=document.querySelector(".key-word2").value;
     if(!key==""){
         return true;
     }else{
         alert("Debes escribir el nombre del trabajador");
         return false;
     }
}

function editarProcesos(){
    let proceso=document.getElementById("eProceso").value;
    let meta=document.getElementById("eMeta").value;
    let precio=document.getElementById("ePrecio").value;
    let error=document.getElementById("errors2");
    
    let texto="";

    if(proceso==texto){
        error.textContent="Debes Ingresar el nombre del proceso";
        return false;
    } if(meta==texto){
        error.textContent="Debes ingresar la meta del proceso";
        return false;
    }
    if(precio==texto){
        error.textContent="Debes ingresar el precio del proceso";
        return false;
    }
    return true;
}

document.getElementById("formCrearGrupos").addEventListener("submit",e=>{
    e.preventDefault();
})

document.getElementById("formEditarGrupos").addEventListener("submit",e=>{
    e.preventDefault();
})

document.getElementById("formEditarProcesos").addEventListener("submit",e=>{
    e.preventDefault();
})

document.getElementById("formCrearProcesos").addEventListener("submit",e=>{
    e.preventDefault();
})

const loginForm=document.getElementById("formSession");
const user=document.getElementById("users");
const pass=document.getElementById("passwords");
const errorUser=document.querySelector(".errorUser");
const errorPass=document.querySelector(".errorPass");

function mostrarErrores(array){
    array.forEach(item => {
        item.errorType.classList.remove("d-none");
        item.errorType.textContent=item.error;
    })
}

function validarSession(){
    loginForm.addEventListener("submit",e=>{
        e.preventDefault();
        const errores=[];
        if(!user.value.trim()){
           errores.push({errorType:errorUser,error:"Este campo es requerido"})
        }
    
        if(!pass.value.trim()){
            errores.push({errorType:errorPass,error:"Este campo es requerido"})
        }
        if(!errores==""){
            mostrarErrores(errores)
            return false;
        }else{
            errorUser.classList.add("d-none");
            errorPass.classList.add("d-none");
            return true; 
        }
    })
}