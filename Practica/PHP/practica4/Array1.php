<?php
    echo "1"."<br>\n";
    echo "<br>\n";
    $a = array( 'color' => 'rojo',
    'sabor' => 'dulce',
    'forma' => 'redonda',
    'nombre' => 'manzana',
    4
    );
 
    foreach ($a as $nombre) {
        echo $nombre."<br>\n";
    }
    echo "<br>\n";
    echo "2"."<br>\n";
    echo "<br>\n";

    $b['color'] = 'rojo';
    $b['sabor'] = 'dulce';
    $b['forma'] = 'redonda';
    $b['nombre'] = 'manzana';
    $b[] = 4;
    
    foreach ($b as $nombre) {
        echo $nombre."<br>\n";
    }
    echo "<br>\n";
    
    echo "Los codigos son equivalentes"



?> 