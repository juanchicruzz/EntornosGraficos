<?php
    echo "1"."<br>\n";
    echo "<br>\n";
    
    $matriz = array("x" => "bar", 12 => true);
    echo $matriz["x"];
    echo $matriz[12];

    echo "<br>\n";
    echo "<br>\n";
    echo "2"."<br>\n";
    echo "<br>\n";

    $matriz = array("unamatriz" => array(6 => 5, 13 => 9, "a" => 42));
    echo $matriz["unamatriz"][6];
    echo $matriz["unamatriz"][13];
    echo $matriz["unamatriz"]["a"];
    
    echo "<br>\n";
    echo "<br>\n";
    echo "3"."<br>\n";
    echo "<br>\n";
    
    

    $matriz = array(5 => 1, 12 => 2);
    $matriz[] = 56;
    echo $matriz[5];
    echo $matriz[12];
    
    $matriz["x"] = 42; unset($matriz[5]); unset($matriz);

    echo $matriz["x"];
    echo $matriz[5];



?> 