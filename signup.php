<?php

    //conectarse a la base de datos
    $db = mysqli_connect('localhost', 'vluz_root', 'linuxlinux', 'vluz_todo');

    $user = $_POST['user'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    if(isset($_POST['submit'])){
        if($password==$password2){
            mysqli_query($db, "INSERT INTO users (usuario, password) VALUES ('$user', '$password')");            
            header("Location: index.php");
        }
    }

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Todo Task</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    
    <form class="" action="signup.php" method="post">
        <label>Usuario</label><br>
        <input type="text" name="user" placeholder="Usuario..."><br>
        
        <label>Contraseña</label><br>
        <input type="password" name="password" placeholder="Contraseña..."><br>
        <label>Repetir contraseña</label><br>
        <input type="password" name="password2" placeholder="Repetir contraseña..."><br>
        
        <button type="submit" name="submit">Registrar</button>
    </form>
    
</body>

</html>
