<?php  //edtCompetidor.php
   //abrir a conexão 
   include 'conexao.php';  

   // recupar campos do formulário usando método post
   $id = trim($_POST['id']); 
   $nome = trim($_POST['txtNome']);
   $cidade = trim($_POST['txtCidade']);
   $estado = trim($_POST['txtEstado']);
   $idade = trim($_POST['txtIdade']);
   $nota = trim($_POST['txtNota']);

   if (!empty($nome) && !empty($nota)){
       $pdo = Conexao::conectar(); 
       $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       $sql = "UPDATE competidor SET nome=?, cidade=?, estado=?, idade=?, somanota=? WHERE id=?";
       $query = $pdo->prepare($sql);
       $query->execute(array($nome, $cidade, $estado, $idade, $nota, $id));
       Conexao::desconectar(); 
   }
   else echo "campo nome ou nota são vazios..."; 
   header("location: listarCompetidor.php")
?>