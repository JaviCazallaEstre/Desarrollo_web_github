<?php
if (isset($_GET["suma"])) {
    echo $_GET["mensaje"] . $_GET["suma"];
} else if (isset($_GET["resta"])) {
    echo $_GET["mensaje"] . $_GET["resta"];
} else if (isset($_GET["multiplicar"])) {
    echo $_GET["mensaje"] . $_GET["multiplicar"];
} else if (isset($_GET["division"])) {
    echo $_GET["mensaje"] . $_GET["division"];
}
