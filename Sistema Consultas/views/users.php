<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Usuarios</title>
</head>
<body>
<?php
    include "../db/usersRepository.php";
?>
    <div class="container p-4">
        <div class="row bg-light border">
        <h1>Usuarios</h1>   
            <div class="col-md-6 p-4">
                <a href="addUser.php" class="btn btn-success">Agregar Usuario</a>
                <!--<a href="addUser.php" class="btn btn-warning">Otro Boton</a>
                <a href="addUser.php" class="btn btn-danger">Aasdsd Usuario</a>
                !-->
            </div>
        </div>
       <table class="table">
           <thead class="thead-dark">
               <th scope="col">ID</th>
               <th scope="col">Email</th>
               <th scope="col">Legajo</th>
               <th scope="col">Rol</th>
               <th scope="col">Acciones</th>
           </thead>
           <tbody>
            <?php
                $UserRepo = new UserRepository();
                $result = $UserRepo->getAllUsers();
                while($row = $result->fetch_array()){
            ?>

                <tr>
                    <td><?=$row['id']?></td>
                    <td><?=$row['email']?></td>
                    <td><?=$row['legajo']?></td>
                    <td><?=$row['rolUsuario']?></td>
                    <td>
                        <a href="editUser.php?id=<?=$row['id']?>" class="btn btn-warning">
                            <i class="fas fa-pen"></i>
                        </a>
                        <a href="deleteUser.php?id=<?=$row['id']?>" class="btn btn-danger">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td>
                </tr>
            <?php
                }
            ?>
           </tbody>
       </table>
    </div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
    integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
    crossorigin="anonymous"></script>
</body>
</html>