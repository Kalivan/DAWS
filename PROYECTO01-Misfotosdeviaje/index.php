 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Mis Fotos de Viajes</title>

    <!--Creamos estilo para las celdas-->
    <style type="text/css">
      th, td {
        border: thin solid black;
      }
    </style>

    <?php
      //Creamos variables para guardar los valores de la tabla a crear
      $filas = 2;
      $columnas = 2;
      //Variable para guardar el id de la foto
      $idfoto = 1;

    ?>

  </head>  

  <body>
      
   <?php
        echo "<h1><div align='center'>Mis fotos de Viajes</div></h1><br>"; 
      ?>

    <!--Creamos la tabla -->
    <table align="center">

       <?php
       //Iniciamos el bucle for para la creacion de las filas
        for($t=0;$t<$filas;$t++){
        echo "<tr>";

          //Iniciamos el bucle for para la creacion de las columnas
          for($y=0;$y<$columnas;$y++){

            //Variable para almacenar la foto .jpg que usaremos para para el link como para la foto a abrir
            $foto="foto_0".$idfoto.".jpg";

            //Rellenamos la columna con la fotografia y el nombre con el link a la foto a tamaño original
            echo "<td><img src=$foto width=200 height=200><br><a href=$foto>"."foto_0".$idfoto."</a></td>";
            $idfoto++;
         
          }
          //Cerramos fila
          echo "</tr>";
        }
      ?>
    <!-- Cerramos tabla -->
    </table>
   </body>                                                                 
 </html>