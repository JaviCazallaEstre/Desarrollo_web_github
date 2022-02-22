<?php
class HolaServicio
{
   /**
     * @soap
     *
     * @param string $name
     * @return string
     */
    public function adios(string $name)
        {
                        return 'Adios, '.$name;
        }

/**
     * @soap
     *
     * @param string $name
     * @return string
     */
    public function saludo(string $name)
        {
                        return 'Hola, '.$name;
        }

        /**
     * @soap
     *
     * @param int $a
     * @param int $b
     * @return int
     */
    public function suma(int $a, int $b)
    {
                    return $a + $b;
    }

    /**
     * @soap
     * 
     * @param int $a
     * @return int
     */
    public function siguiente(int $a){
        return ++$a;
    }

    /**
     * @soap
     * 
     * @return array
     */
    public function sacaUsuariosBD(){
        $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET names utf8");
        $conexion = new PDO('mysql:host=localhost;dbname=examinador', 'root', '', $opciones);
        $sentencia = "SELECT * FROM usuarios";
        $registros = $conexion->query($sentencia);
        while ($resultado = $registros->fetch(PDO::FETCH_OBJ)) {
            $usuarios[] = $resultado;
        }
        return $usuarios;

    }
}