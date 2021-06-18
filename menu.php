<?php 
  session_start();
  if (!isset($_SESSION['usuario']))
      Header("location:index.php"); 
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
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>

    <title>Sistema de Rodeios FEMA 2021 - ADS</title>
</head>

<body>
   <!-- menu suspenso -->
  <nav class="grey darken-2">
    <div class="nav-wrapper">
      <a href="#" class="brand-logo right"><img src="imagens/logo3.png" width="60"></a>
      <ul id="nav-mobile" class="left hide-on-med-and-down">
        <li><a href="listarCompetidor.php">Competidor</a></li>
        <li><a href="frmLancarMontaria.php">Lançar Montaria</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
      <h7 right>Usuário: <?php echo $_SESSION['usuario'];?><h7>
    </div>
  </nav>

  <!-- menu lateral -->
  <ul id="slide-out" class="sidenav">
    <!-- <div class="teal lighten-5"> -->
    <li><div class="user-view">
      <div class="background">
        <img src="imagens/empresa2.jpeg">
      </div>
      <a href="#user"><img class="circle" src="imagens/perfil.jpg"></a>
      <a href="#name"><span class="yellow-text name">Almir Camolesi</span></a>
      <a href="#email"><span class="yellow-text email">camolesi@fema.edu.br</span></a>
    </div></li>
    <li><a href="listarCompetidor.php"><i class="material-icons">person</i>Competidores</a></li>
    <li><a href="#!">Second Link</a></li>
    <li><div class="divider"></div></li>
    <li><a class="subheader">Subheader</a></li>
    <li><a class="waves-effect" href="#!">Third Link With Waves</a></li>
    <!-- </div> -->
  </ul>
  <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        
</body>
</html>

<script type="text/javascript"> 

document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.sidenav');
    var instances = M.Sidenav.init(elems, options);
  });

  // Initialize collapsible (uncomment the lines below if you use the dropdown variation)
  // var collapsibleElem = document.querySelector('.collapsible');
  // var collapsibleInstance = M.Collapsible.init(collapsibleElem, options);

  // Or with jQuery

  $(document).ready(function(){
    $('.sidenav').sidenav();
  });

</script>