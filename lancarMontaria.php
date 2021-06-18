<?php
    include 'conexao.php';

    $data = $_POST['txtData']; 
    $competidorID = trim($_POST['slcCompetidor']);
    $animalID = trim($_POST['slcAnimal']);
    $ntCompetidor = $_POST['txtNtComp']; 
    $ntAnimal = $_POST['txtNtAnm'];
    $nota = $ntCompetidor + $ntAnimal;  

    if (!empty($competidorID) && !empty($animalID) && ($nota!=0)){
        $pdo = Conexao::conectar(); 
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
       //lancamento de montaria na tabela montaria
        $sql = "INSERT INTO montaria (data, animal, competidor, notacompetidor, notaanimal) VALUES (?, ?, ?, ?, ?);"; 
        $query = $pdo->prepare($sql); 
        $query->execute(array($data, $animalID, $competidorID, $ntAnimal, $ntCompetidor)); 

        //atualização da somanota da tabela do competidor
        //primeiro recuperar os dados do competidor 
        $sql = "SELECT * FROM competidor WHERE id=?;"; 
        $query = $pdo->prepare($sql);
        $query->execute(array($competidorID));
        $competidor = $query->fetch(PDO::FETCH_ASSOC); //recupera os dados do competidor para

        //calcular nova somanota
        $novaNota = $competidor['somanota'] + $nota; 

        //atualizar a nota do competidor no banco de dados 
        $sql = "UPDATE competidor SET somanota=? WHERE id=?";
        $query = $pdo->prepare($sql);
        $query->execute(array($novaNota, $competidorID));

      /* simulando uma atualização de estoque do tipo venda, usando a montaria
       if ($nota <= $competidor['somanota']){

         $novaNota = $competidor['somanota'] - $nota; 

         $sql = "UPDATE competidor SET somanota=? WHERE id=?"; 
         $query = $pdo->prepare($sql); 
         $query->execute (array($novaNota, $competidorID)); 
  
       } */ 


        Conexao::desconectar();
    }
    header("location: frmLancarMontaria.php"); 
?>