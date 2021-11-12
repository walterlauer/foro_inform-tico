<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="conexion.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/d0922b288b.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <div class="fondo"> 
    <div  class="formu">
    <form action="index.php" method="post">
       
    <div  class="FORMULARIO">
       <fieldset><h1 class="titulo">FORO INFORMATICO <i class="fas fa-comments"></i></h1></fieldset>
        <p class="text">
            NOMBRE Y APELLIDO:<input type="text" name="NOMBRE">
        </p>
        <textarea name="caja" id="" cols="100" rows="10"></textarea><br>
            <button type="submit" class="btn btn-outline-dark">Enviar información...</button>
      
    </div>
       
          </form>
    <?php
$var = $_POST["NOMBRE"];
$caj = $_POST["caja"];
        $DateAndTime = date('m-d-Y h:i:s a', time());  

       try{

            $conexion = new PDO('mysql:host=localhost;dbname=tp7','root','');
           
            $conexion->query("INSERT INTO `usuarios` (`id`, `nombres`, `comentarios`) VALUES (NULL,'$var','$caj')");

            $resultado=$conexion->query('SELECT * FROM usuarios');

            foreach($resultado as $fila){
                echo "<br>";
                echo '<div class="cuadro">';
                echo '<span class="nom"><i class="fas fa-user"></i>'.$fila['nombres'].'</span><br>';
                echo '<span class="com">'.$fila['comentarios'].'</span><br>';
                echo '<span class="date">Fecha y hora: '.$DateAndTime.'</span>';
                echo '</div>';
            }

           
            

        }
        catch(PDOException $e){
           echo "<h1>error: </h1>". $e->getMessage();
        }
    ?>
    
    </div>
    </div>
</body>
</html>
