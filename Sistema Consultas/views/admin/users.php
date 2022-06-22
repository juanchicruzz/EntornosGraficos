<?php 
require_once($_SERVER['DOCUMENT_ROOT'] . "/sistema-consultas/directories.php");
require_once(DIR_SECURITY);

// Solo pueden ingresar los profesores a esta vista, si es alumno se redirige a login o index
Security::verifyUser('2');
// 
include(DIR_HEADER)

?>

<?php
    include(DIR_REPOSITORIES . "/usersRepository.php");
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
        <br>
        <?php
            if(isset($_SESSION['message'])){
        ?>
            <div class="alert alert-<?=$_SESSION['message_type']?>
                alert-dismissible fade show" role="alert">
                <?= $_SESSION['message'] ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>    
        <?php
            unset($_SESSION['message']);
            unset($_SESSION['message_type']);
            }
        ?>
        <br>
       <table class="table table-bordered">
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
                    <td><?=$row['idUsuario']?></td>
                    <td><?=$row['email']?></td>
                    <td><?=$row['legajo']?></td>
                    <td><?=strtoupper($row['descripcionRol'])?></td>
                    <td>
                        <a href="editUser.php?id=<?=$row['idUsuario']?>" class="btn btn-warning">
                            <i class="fas fa-pen"></i>
                        </a>
                        <a href="<?=REDIR_CONTROLLERS?>/users/deleteUser.php?id=<?=$row['idUsuario']?>" class="btn btn-danger">
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

<?php include(DIR_FOOTER);?>