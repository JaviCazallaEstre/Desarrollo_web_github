<body bgcolor="#bed7c0">
<div class="main">
<h1>Mostrando imagen almacenada en MySQL</h1>
  <div class="panel panel-primary">
    <div class="panel-body">
   <?php

    $Host = 'localhost';
    $Username = 'root';
    $Password = '';
    $dbName = 'tech';
    //Crear conexion mysql
    $db = new mysqli($Host, $Username, $Password, $dbName);
    //revisar conexion
    if($db->connect_error){
       die("Connection failed: " . $db->connect_error);
    }
    
    //Extraer imagen de la BD mediante GET
    $result = $db->query("SELECT imagenes FROM images_tabla WHERE id = 3");
    
    if($result->num_rows > 0){
        $imgDatos = $result->fetch_assoc();
        
        //Mostrar Imagen
   
        echo "<img src='data:image/jpeg;base64," .$imgDatos['imagenes']. " ' alt='Img blob desde MySQL' width='600' />"; 
      
    }else{
        echo 'Imagen no existe...';
    }
    ?>
  </div>
 </div>
</body>