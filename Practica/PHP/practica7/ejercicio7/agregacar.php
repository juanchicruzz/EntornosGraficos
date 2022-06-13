<?php
session_start();
extract($_REQUEST);
$conn = mysqli_connect("localhost", "phputn", "1992","compras");

if(!isset($cantidad)){$cantidad=1;}
$qry=mysqli_query($conn,"select * from catalogo where id='".$id."'");
$row=mysqli_fetch_array($qry);

if(isset($_SESSION['carro']))
$carro=$_SESSION['carro'];

$carro[md5($id)]=array('identificador'=>md5($id),'cantidad'=>$cantidad,'producto'=>$row['producto'],'precio'=>$row['precio'],'id'=>$id);

$_SESSION['carro']=$carro;
header("Location:catalogo.php?".SID);
?>