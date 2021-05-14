<?php 
   //abrir a conexão 
   include 'conexao.php';  

   // recupar campos do formulário usando método post
   $nome = trim($_POST['txtNome']);
   $cidade = trim($_POST['txtCidade']);
   $estado = trim($_POST['txtEstado']);
   $idade = trim($_POST['txtIdade']);
   $nota = trim($_POST['txtNota']);

   if (!empty($nome) && !empty($nota)){
       $pdo = Conexao::conectar(); 
       $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       $sql = "INSERT INTO competidor (nome, cidade, estado, idade, somanota) VALUES (?, ?, ?, ?, ?);";
       $query = $pdo->prepare($sql);
       $query->execute(array($nome, $cidade, $estado, $idade, $nota));
       Conexao::desconectar(); 
   }
   else echo "campo nome ou nota são vazios..."; 
   header("location: listarCompetidor.php")
?>