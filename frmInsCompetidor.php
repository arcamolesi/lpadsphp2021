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

    <title>Inserir Competidor</title>
</head>
<body>
    <div class="container grey lighten-4 col s12">
        <div class="brown lighten-4 col s12">
            <h3>Adicionar Novo Competidor</h3>
        </div>
     <div class="row">
        <form action="insCompetidor.php" method="POST" id="frmInsCompetidor" class="col s12">
            <div class="input-field col s8">
                <label for="lblNome">Informe o Nome do Competidor</label>
                <input type="text" class="form-control" id="txtNome" name="txtNome">
            </div>
            <div class="input-field col s5">
                <label for="lblCidade">Informe a Cidade: </label>
                <input type="text" class="form-control" id="txtCidade" name="txtCidade">
            </div>
            <div class="input-field col s5">
                <label for="lblEstado">Informe a Estado: </label>
                <input type="text" class="form-control" id="txtEstado" name="txtEstado">
            </div>      
            <div class="input-field col s5">
                <label for="lblIdade">Informe a Idade: </label>
                <input type="number"  class="form-control" id="txtIdade" name="txtIdade">
            </div>
            <div class="input-field col s5">
                <label for="lblCidade">Informe a Nota: </label>
                <input type="number" class="form-control" id="txtNota" name="txtNota">
            </div>

            <br>
            <div class="input-field col s8">
               <button class="btn waves-effect waves-light green" type="submit" name="btnGravar">
               Gravar <i class="material-icons">send</i> 
               </button>

               <button class="btn waves-effect waves-light orange" type="reset" name="btnLimpar">
               Limpar <i class="material-icons">brush</i> 
               </button>

               <button class="btn waves-effect waves-light indigo" type="button" name="btnVoltar"
                onclick="JavaScript:location.href='listarCompetidor.php'">
               Voltar <i class="material-icons">arrow_back</i> 
               </button>
            </div>

        </form>   
     </div>
    </div>
</body>
</html>