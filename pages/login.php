<?php

    require_once '../components/cabecera.html'

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    
    <title>Grupo2_Login</title>

</head>
<body>


    <div class = "body">

        <div class="logo_y_login">

            <div class="img_login">
                <img src="../img/LOGO_LOGIN.png"/>
            </div> 
        
            <form action="../controller/comp_user.php" id="login" method="POST" onsubmit="validador(event);">
                <h1 class="title">Login</h1>
                <label class='flex-icon'>
                    <i id ="iconU" class="fa-solid fa-user"></i>
                    <input placeholder="E-mail" type="text" id="correo" name="mail">
                </label>
                <label class='flex-icon'>
                    <i id ="iconP" class="fa-solid fa-lock"></i>
                    <input placeholder="password" type="password" id="passw" name="pass">
                </label >

                    <button id="button">Login</button>
            </form>
        </div>
    </div>


    <input type="hidden" id="session" name="log" value="<?php echo $_GET["log"]; ?>" />
    <script src="../js/valid-form.js"></script>
    <script src="../js/valid-session.js"></script>


</body>
</html>