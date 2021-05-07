<?php //listarCompetidor.php
    include 'conexao.php'; 
     $pdo = Conexao::conectar(); 
     $sql = "Select * from competidor"; 
     $listaCompetidores = $pdo->query($sql); 
?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Competidor</title>
</head>
<body>
        <h3>Listar Competidores</h3>
        <table>
            <tr>    
                <th>ID</th>
                <th>NOME</th>
                <th>CIDADE</th>
                <th>ESTADO</th>
                <th>IDADE</th>
                <th>SOMA NOTA</th>
            </tr>
            <?php 
                foreach ($listaCompetidores as $competidor){
            ?>
                <tr>
                    <td><?php echo $competidor['id'];?></td>
                    <td><?php echo $competidor['nome'];?></td>
                    <td><?php echo $competidor['cidade'];?></td>
                    <td><?php echo $competidor['estado'];?></td>
                    <td><?php echo $competidor['idade'];?></td>
                    <td><?php echo $competidor['somanota'];?></td>
                </tr>
            <?php
                }
            ?>
        </table>
</body>
</html>