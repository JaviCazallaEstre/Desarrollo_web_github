<?php
//print_r(S_FILES);
if(isset($_POST["submit"])){
    $revisar = getimagesize($_FILES["image"]["tmp_name"]);
    if($revisar !== false){
        // Si hay fichero y tiene tamaño
        $image = $_FILES['image']['tmp_name'];
        $imgContenido = file_get_contents($image);
        $imgContenido=base64_encode($imgContenido);

        //Credenciales Mysql
        $Host = 'localhost';
        $Username = 'root';
        $Password = '';

        $dbName = 'tech';
        //Crear conexion con la abse de datos
        $db = new mysqli($Host, $Username, $Password, $dbName);
        // Cerciorar la conexion
        if($db->connect_error){
            die("Connection failed: " . $db->connect_error);

        }  
        //Insertar imagen en la base de datos

        $insertar = $db->query("INSERT into images_tabla (imagenes, creado)
        VALUES ('$imgContenido', now())");

        // COndicional para verificar la subida del fichero

        if($insertar){
            echo "Archivo Subido Correctamente.";
        }else{
            echo "Ha fallado la subida, reintente nuevamente.";
        } 
        // Sie el usuario no selecciona ninguna imagen
    }else{
        echo "Por favor seleccione imagen a subir.";
    }
}
?>