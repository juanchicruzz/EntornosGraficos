<html>
<head><title>Documento 1</title></head>
<body>
<h1>a</h1>
<?php
 echo "<table width = 90% border = '1' >";
 $row = 5;
 $col = 2;
 for ($r = 1; $r <= $row; $r++) {
 echo "<tr>";
 for ($c = 1; $c <= $col;$c++) {
 echo "<td>", (isset($_POST['age']))?$_POST['age']:"&nbsp;", "</td>\n";
 } echo "</tr>\n";
 }
 echo "</table>\n";
?>
</body></html>

<p>este codigo genera una tabla en html que tiene 5 filas y 2 columnas</p>

<h1>b</h1>


<?php
if (!isset($_POST['submit'])) {
?>

 <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
 Edad: <input name="age" size="2">
 <input type="submit" name="submit" value="Ir">
 </form>
<?php
 }
else {
 $age = $_POST['age'];
 if ($age >= 21) {
 echo 'Mayor de edad';
 }
 else {
 echo 'Menor de edad';
 }
}

?>
<p>este codigo crea un formulario con referecia al mismo archivo donde tiene un input para ingresar la edad y si se envia el formulario printea "mayor o menor" de edad dependiendo el numero ingresado</p>
