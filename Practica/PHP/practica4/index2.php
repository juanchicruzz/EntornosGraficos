<h1>a</h1>
</br>1</br>
<?php
$i = 1;
while ($i <= 10) {
 print $i++;
}
?>
</br>2</br>
<?php
$i = 1;
while ($i <= 10):
 print $i;
 $i++;
endwhile;
?>
</br>3</br>
<?php
$i = 0;
do {
 print ++$i;
} while ($i<10);
?>

<h4 style="color:green">LOS CODIGOS SON EQUIVALENTES</h4>

<h1>b</h1>

</br>1</br>

<?php
for ($i = 1; $i <= 10; $i++) {
 print $i;
}
?>

</br>2</br>

<?php
for ($i = 1; $i <= 10; print $i, $i++) ;
?>

</br>3</br>

<?php
for ($i = 1; ;$i++) {
 if ($i > 10) {
 break;
 }
 print $i;
}
?>

</br>4</br>

<?php
$i = 1;
for (;;) {
 if ($i > 10) {
 break;
 }
 print $i;
 $i++;
}
?>

<h4 style="color:green">LOS CODIGOS SON EQUIVALENTES</h4>

<h1>c</h1>

</br>1</br>

<?php

$i = 2;

if ($i == 0) {
 print "i equals 0";
} elseif ($i == 1) {
 print "i equals 1";
} elseif ($i == 2) {
 print "i equals 2";
}
?>

</br>2</br>

<?php

switch ($i) {
 case 0:
 print "i equals 0";
 break;
 case 1:
 print "i equals 1";
 break;
 case 2:
 print "i equals 2";
 break;
}
?>

<h4 style="color:green">LOS CODIGOS SON EQUIVALENTES</h4>