<?php
 
   $usuario = trim($_POST['usuario']); 
   $senha = md5(trim($_POST['senha']));

/*    echo $usuario; 
   echo "<br/> <br/>";
   echo $senha;  */

   include 'conexao.php';
   $pdo = Conexao::conectar();
   $pdo->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $sql = "SELECT * FROM usuarios WHERE usuario LIKE ?;";
   $query = $pdo->prepare($sql);
   $query->execute(array($usuario));
   $user = $query->fetch(PDO::FETCH_ASSOC);
   Conexao::desconectar();

    if ($user['senha']==$senha){  // verificar autorização

        session_start();
        $_SESSION['usuario'] = $usuario; 
        $_SESSION['nome'] = $user['nome'];
        Header("location:menu.php");
   } 

?>






