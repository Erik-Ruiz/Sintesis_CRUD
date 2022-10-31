<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Correo</title>
</head>
<body>
    <div>
        <form action="../controller/email.php" method="POST">
            <input type="text" name="titulo" />
            <input type="text" name="info" />
            <input type="hidden" name="correos" value="" id="correos"/>
            <button type="submit" name="enviar" >Enviar</button>
        </form>
    </div>
    <script>
        document.getElementById("correos").value = localStorage.getItem('correos')
    </script>
</body>
</html>