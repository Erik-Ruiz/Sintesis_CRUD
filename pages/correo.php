<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/correo.css">
    <title>Correo</title>
</head>
<body>
    <div class = "box">
        <form action="../controller/email.php" method="POST" class="form">
            
            <h2>Crear Mail</h2>
            <div class="inputBox">
                <input type="text" required="required" name="titulo" />
                <span>Asunto</span>
                <i></i>
            </div>
            
            <div class="inputBox">
                <input type="text" required="required" name="info" />
                <span>Mensaje</span>
                <i></i>
            </div>
            
            <input type="hidden" name="correos" value="" id="correos"/>
            <button id ="send" type="submit" value = "Login" name="enviar" >Enviar</button>
        </form>
    </div>
    <script src="../js/veralumnos.js"></script>
    <script>
        document.getElementById("correos").value = localStorage.getItem('correos');
        resetStorage();
    </script>
</body>
</html>