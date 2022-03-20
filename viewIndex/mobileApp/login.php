

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {font-family: Arial, Helvetica, sans-serif;}
        form {border: 3px solid #f1f1f1;}

        input[type=text], input[type=password] {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #5b36fe;
        box-sizing: border-box;
        }

        button {
        background-color: #2e06dd;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        font-size:22px;
        border: none;
        border-radius: 12px;
        cursor: pointer;
        width: 100%;
        }

        button:hover {
        opacity: 0.8;
        }

        .imgcontainer {
        text-align: center;
        margin: 24px 0 12px 0;
        }

        img.avatar {
        width: 10%;
        border-radius: 50%;
        }

        .container {
        padding: 16px;
        }

        span.psw {
        float: right;
        padding-top: 16px;
        }

        /* Change styles for span and cancel button on extra small screens */
        @media screen and (max-width: 300px) {
        span.psw {
            display: block;
            float: none;
        }
        }
        .text{
            color: blue;
            top:14px;
            position: relative;
            text-decoration: none;
            margin-left:8px;
            font-size:14px;
            display: block;
            z-index: 1;
        }
        .text bold{
            color:#0c0238;
        }
        .text span{
            color: #02b1e8;
            padding-left:2px;
        }
        .title_text{
            margin-left:85px;
            font-size:28px;
            color:#2e06dd;
        }
        .labels label{
            font-size:18px;
        }





    .modal input[type=text], .modal input[type=password] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        display: inline-block;
        border: none;
        background: #f1f1f1;
        }

        /* Add a background color when the inputs get focus */
        .modal input[type=text]:focus, .modal input[type=password]:focus {
        background-color: #ddd;
        outline: none;
        }

        /* Set a style for all buttons */
        .modal button {
        background-color: #04AA6D;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        cursor: pointer;
        width:200px;
        opacity: 0.9;
        }

        .modal button:hover {
        opacity:1;
        }

        /* Extra styles for the cancel button */
        .modal .cancelbtn {
        padding: 14px 20px;
        margin-left:14px;
        background-color: #f44336;
        }

        /* Float cancel and signup buttons and add an equal width */
        .modal .cancelbtn, .modal .signupbtn {
        float: left;
        width: 40%;
        }
        .modal .signupbtn{
            margin-left:10px;
        }

        /* Add padding to container elements */
        .modal .container {
        padding: 16px;
        }
        .modal .container h1{
            
           
        }

        /* The Modal (background) */
        .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color:blue;
        padding-top: 50px;
        }

        /* Modal Content/Box */
        .modal .modal-content {
        background-color: #fefefe;
        margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
        border: 1px solid #888;
        width: 80%; /* Could be more or less, depending on screen size */
        }

        /* Style the horizontal ruler */
        .modal hr {
        border: 1px solid #f1f1f1;
        margin-bottom: 25px;
        }
        
        /* The Close Button (x) */
        .modal .close {
        position: absolute;
        right: 35px;
        top: 15px;
        font-size: 40px;
        font-weight: bold;
        color: #f1f1f1;
        }

        .modal .close:hover,
        .modal .close:focus {
        color: #f44336;
        cursor: pointer;
        }

        /* Clear floats */
        .modal .clearfix::after {
        content: "";
        clear: both;
        display: table;
        }

        /* Change styles for cancel button and signup button on extra small screens */
        @media screen and (max-width: 300px) {
        .modal .cancelbtn, .modal .signupbtn {
            width: 100%;
        }
        }

    </style>
</head>
<body>

<div class="container text-center">
    <h2 class="title_text">Inicio de sesión</h2>

    <form action="" method="post">
        <div class="imgcontainer">
            <img src="logo3.png" alt="Avatar" class="avatar">
            <a class="text"><bold>ABC</bold><span>PACK</span></a>
        </div>

        <div class="container labels">
            <label for="uname"><b>Rut</b></label>
            <input type="text" placeholder="ej: 27448017-1" name="uname" required>

            <label for="psw"><b>Contraseña</b></label>
            <input type="password" placeholder="Contraseña" name="psw" required>
                
            <button type="submit">Entrar</button>
            
        </div>

         <span class="psw">Configurar <a onclick="document.getElementById('id01').style.display='block'" href="#">cuenta?</a></span>
       
    </form>





    
<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
  <form class="modal-content" action="/action_page.php">
    <div class="container">
      <h1 class="text-center">Configurar cuenta</h1>
    
      <hr>
      <label for="rut"><b>Rut</b></label>
      <input type="text" placeholder="ej: 90214687-0" name="rut" required>

      <label for="psw"><b>Contraseña</b></label>
      <input type="password" placeholder="Ingresar contraseña" name="passW" required>

      <label for="psw-repeat"><b>Repetir contraseña</b></label>
      <input type="password" placeholder="Confirmar contraseña" name="psw-repeat" required>
      

      <div class="clearfix">
        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancelar</button>
        <button type="submit" class="signupbtn">Aceptar</button>
      </div>
    </div>
  </form>
</div>


</div>



</body>
</html>