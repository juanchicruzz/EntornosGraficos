<?php
$fun = getdate();
echo "Has entrado en esta pagina a las $fun[hours] horas, con $fun[minutes] minutos y $fun[seconds]
segundos, del $fun[mday]/$fun[mon]/$fun[year]";
//SALIDAS 
//Has entrado en esta pagina a las 0 horas, con 7 minutos y 44 segundos, del 10/5/2022
?>
</br>

<?php
function sumar($sumando1,$sumando2){
 $suma=$sumando1+$sumando2;
 echo $sumando1."+".$sumando2."=".$suma;
}
sumar(5,6);
//SALIDA 
//5+6=11
?>

