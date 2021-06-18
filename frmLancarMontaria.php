<?php
   include 'menu.php'; 
   include 'conexao.php'; 

   $pdo = Conexao::conectar(); 
     
   $sql = "Select * from competidor order by nome "; 
   $listaCompetidores = $pdo->query($sql); 

   $sql = "Select * from animal order by nome "; 
   $listaAnimais = $pdo->query($sql); 

   Conexao::desconectar(); 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
   
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <title>Lançar Montaria</title>
</head>
<body>
    <div class="container grey lighten-4 col s12">
        <div class="brown lighten-4 col s12">
            <h3>Lançar Montaria</h3>
        </div>
     <div class="row">
        <form action="lancarMontaria.php" method="POST" id="frmLancarMontaria" class="col s12">
            <div class="input-field col s8">
                <input type="date" class="form-control" id="txtData" name="txtData">
                <label for="lblData">Informe a Data: </label> 
            </div>

            <div class="input-field col s8">
                <select id="slcCompetidor" name="slcCompetidor">
                <option value="" disabled selected>Escolha o Competidor</option>
                <?php 
                    foreach($listaCompetidores as $competidor) { ?>
                        <option value=<?php echo $competidor['id']?>><?php echo $competidor['nome'] ?></option>
                    <?php } ?>

                </select>
                <label for="lblCompetidor" >Escolha o Competidor</label>
            </div>

            <div class="input-field col s8">
                <select id="slcAnimal" name="slcAnimal">
                <option value="" disabled selected>Escolha o Animal</option>
                <?php 
                    foreach($listaAnimais as $animal) { ?>
                        <option value=<?php echo $animal['id']?>><?php echo $animal['nome'] ?></option>
                    <?php } ?>

                </select>
                <label for="lblAnimal" >Escolha o Animal</label>
            </div>
  
            <div class="input-field col s8">
                <label for="LblNtComp">Informe a Nota do Competidor: </label>
                <input type="number"  class="form-control" id="txtNtComp" name="txtNtComp" onblur="calcular()">
            </div>
            <div class="input-field col s8">
                <label for="lblNtAnm">Informe a Nota do Animal: </label>
                <input type="number" class="form-control" id="txtNtAnm" name="txtNtAnm"  onblur="calcular()">
            </div>

            <div class="input-field col s12">
                 <label for="LblNtTotal"><b>Nota Total: </b>
                    <label id="total"></label>
                 </label> 
            </div>

            <br/> <br/> 
            <div class="input-field col s8">
               <button class="btn waves-effect waves-light green" type="submit" name="btnGravar">
               Gravar <i class="material-icons">send</i> 
               </button>

               <button class="btn waves-effect waves-light orange" type="reset" name="btnLimpar">
               Limpar <i class="material-icons">brush</i> 
               </button>

            </div>

        </form>   
     </div>
    </div>
</body>
</html>

<script type="text/javascript">
function calcular() {
    var notaCompetidor = parseInt(document.getElementById('txtNtComp').value, 10);
    var notaAnimal = parseInt(document.getElementById('txtNtAnm').value, 10);
    var nota = notaCompetidor + notaAnimal;  
    if (isNaN(nota)) 
        nota = 0;

    document.getElementById("total").innerHTML = nota.toFixed(2); 

    //document.getElementById('total').value = nota;
}
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $('select').formSelect();
  });

</script>