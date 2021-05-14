<?php //listarCompetidor.php
    include 'conexao.php'; 
     $pdo = Conexao::conectar(); 
     $pdo->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $sql = "Select * from competidor"; 
     $listaCompetidores = $pdo->query($sql); 
?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
   
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <title>Lista Competidor</title>
</head>
<body>
   <div class="container">
   <div class="row">
        <div class="col s12">
        <h3 class="orange lighten-2 white-text text-dark-3" class="text-orange">
          Listar Competidores 
          <a class="btn-floating btn-large waves-effect waves-light green"
               onclick="JavaScript:location.href='frmInsCompetidor.php'"><i class="material-icons">add</i></a>
        </h3>
             
        <table class="striped highlight  blue lighten-3 responsive-table">
            <tr class="light-blue darken-4  grey-text text-lighten-3">    
                <th>ID</th>
                <th>NOME</th>
                <th>CIDADE</th>
                <th>ESTADO</th>
                <th>IDADE</th>
                <th>SOMA NOTA</th>
                <th colspan="2">Função</th>
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
                    <td> <a class="btn-floating btn-small waves-effect waves-light orange"
                          onclick="JavaScript:location.href='frmEdtCompetidor.php?id=' +
                          <?php echo $competidor['id'];?>" >
                           <i class="material-icons">edit</i>
                    </td>

                </tr>
            <?php
                }
            ?>
        </table>
      
      </div>
     </div>
    </div>
</body>
</html>