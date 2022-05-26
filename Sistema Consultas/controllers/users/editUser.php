<?php
    include("../../db/usersRepository.php");

    if(isset($_POST['edit_user'])){
        $UserRepository = new UserRepository();
        $email = $_POST['email'];
        $legajo = $_POST['legajo'];
        $idUsuario = $_POST['idUsuario'];
        $result_query = $UserRepository->updateUser($email, $legajo, $idUsuario); 
        if(!$result_query){
            die("Update query failed");
        }
        $_SESSION['message'] = "Usuario actualizado exitosamente";
        $_SESSION['message_type'] = "warning";
        header("Location: ../../views/users.php");
    }

?>