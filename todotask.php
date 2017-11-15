<?php

    $errors = "";

    //conectarse a la base de datos
    $db = mysqli_connect('localhost', 'vluz_root', 'linuxlinux', 'vluz_todo');

    if(isset($_POST['submit'])){
        $task = $_POST['task'];
        if(empty($task)){
            $errors = "Tienes que escribir una tarea";
        }else{
            mysqli_query($db, "INSERT INTO tasks (task) VALUES ('$task')");
            header('location: todotask.php');
        }
    }

    //borrar tarea
    if(isset($_GET['del_task'])){
        $id = $_GET['del_task'];
        mysqli_query($db, "DELETE FROM tasks WHERE id=$id");
        header('location: todotask.php');
    }

   //completar tarea
   if(isset($_GET['complete_task'])){
	$id = $_GET['complete_task'];
	if(mysqli_query($db,"SELECT estado FROM tasks WHERE id=$id")=='No completado'){
	   mysqli_query($db,"UPDATE tasks SET estado='Completado' WHERE id=$id");
	}else{
	   mysqli_query($db,"UPDATE tasks SET estado='No completado' WHERE id=$id");
	}
	header('location: todotask.php');
    }

    $tasks = mysqli_query($db, "SELECT * FROM tasks");

?>

<!DOCTYPE html>
<html>
<head>
<title>Todo Task</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

    <div class="heading">
        <h2>Todo Task</h2>
    </div>

    <form method="POST" action="todotask.php">

        <?php if(isset($errors)) { ?>
            <p><?php echo $errors; ?></p>
        <?php }?>

        <input type="text" name="task" class="task_input">
        <button type="submit" class="add_btn" name="submit">Añadir Tarea</button>
    </form>

    <table>
        <thead>
            <tr>
                <th>Nº</th>
                <th>Tarea</th>
                <th>Acción</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; while($row = mysqli_fetch_array($tasks)){ ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td class="task"><?php echo $row['task']; ?></td>
                    <td class="delete">
			<a href="todotask.php?complete_task=<?php echo $row['id']; ?>">C</a>
                        <a href="todotask.php?del_task=<?php echo $row['id']; ?>">X</a>
                    </td>
                </tr>
            <?php $i++;} ?>

        </tbody>
    </table>

</body>
</html>
