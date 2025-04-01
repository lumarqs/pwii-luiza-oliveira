<?php
    $x = "Hello World!";
    $y = "Hello World!";

    var_dump($x);
    echo "<br>";
    var_dump($y);
    echo "<br>";

    $x = 12.4;

    var_dump($x);
    echo "<br><br>";

    $y = ['João', 'Ricardo', 2];

    var_dump($y);
    echo "<br>";
    echo $y[1];

    $meuObj = new stdClass();
    $meuObj->nome = "Davi";
    $meuObj->idade = 42;
    $meuJson = json_encode($meuObj);
    echo $meuJson;
    echo "<br>";
    var_dump($meuJson);
    ?>