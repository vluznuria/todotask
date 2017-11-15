<?php
    //conectarse a la base de datos
    $db = mysqli_connect('localhost', 'vluz_root', 'linuxlinux', 'vluz_todo');

    $user = $_POST['user'];
    $password = $_POST['password'];

    if(isset($_POST['submit'])){
        
        $sqluser = mysqli_query($db, "SELECT usuario FROM users WHERE usuario='$user'");
        $sqlpassword = mysqli_query($db, "SELECT password FROM users WHERE usuario='$user'");
        
        if($user == $sqluser && $password == $sqlpassword){
            header('location: todotask.php');            
        }else{
            echo 'Contraseña Incorrecta';
            header('location: todotask.php'); 
        }
        
        
    }

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Todo Task</title>
  </head>
  <body>
      <form class="" action="signin.php" method="post">
          Usuario<br>
          <input type="text" name="user" placeholder="Usuario..."><br>
          Contraseña<br>
          <input type="password" name="password" placeholder="Contraseña..."><br>
          <button type="submit" name="submit">Iniciar Sesión</button>
      </form>
  </body>
</html>
