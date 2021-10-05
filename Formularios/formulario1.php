<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Formulario</title>

</head>

<body>
  <form method="POST" action="formulario1hecho.php">
    <label for="numero1"> Primer n&uacute;mero</label>
    <input type="text" name="numero1" id="numero1" />
    <br />
    <label for="numero2">Segundo n&uacute;mero</label>
    <input type="text" name="numero2" id="numero2" />
    <br />
    <button type="submit" name="sumar" id="sumar">Sumar</button>
    <button type="submit" name="restar" id="restar">Restar</button>
    <button type="submit" name="multiplicar" id="multiplicar">Multiplicar</button>
    <button type="submit" name="dividir" id="dividir">Dividir</button>
  </form>
  <p>
    <?php
    require_once '../lib/Errores.php';
    ?>
  </p>
</body>

</html>