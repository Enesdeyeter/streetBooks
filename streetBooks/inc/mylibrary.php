<?php

function vtguncelle($tablo,$alan,$alanDeger,$alan0,$alanDeger0){
	$con = mysqli_connect("localhost","root","", "streetbooks") or die ('veri tabanına bağlanırken hata oldu reis');
	mysqli_query($con,"UPDATE $tablo SET $alan='$alanDeger' WHERE $alan0='$alanDeger0'");
}

function vtekle($tablo, $alan1, $alan2, $alan3, $alan4, $alan5, $alan6, $alan7, $deger1, $deger2, $deger3, $deger4, $deger5, $deger6, $deger7){
	$con = mysqli_connect("localhost","root","", "streetbooks") or die ('veri tabanına bağlanırken hata oldu reis');
	mysqli_query($con,"INSERT INTO $tablo ($alan1,$alan2,$alan3,$alan4,$alan5,$alan6,$alan7) VALUES ('$deger1', '$deger2', '$deger3', '$deger4', '$deger5', '$deger6', $deger7)") or die (mysqli_connect_error());
}

function git($sure,$nereye)
{
	header("Refresh:$sure; url=$nereye");
}

function yazdir($yazilacak){
	echo $yazilacak;
}

function dahilEt($nerede){
	include("$nerede");
}


function vtCekYaz($tablo,$nereden,$neresi){
	$con = mysqli_connect("localhost","root","", "streetbooks") or die ('veri tabanına bağlanırken hata oldu reis');
	$deger = mysqli_query($con,"Select * from $tablo where id='".$nereden."'") or die (mysqli_connect_error()) ;
	while($deger3=mysqli_fetch_array($deger))
	{
		yazdir($deger3[$neresi]);
	}
}

function vtCekYaz2($tablo,$nereden,$neresi){
	$deger=mysqli_query($con, "Select * from $tablo where kategoriID=".$nereden."");
	while($deger3=mysqli_fetch_array($deger))
	{
		yazdir($deger3[$neresi]);
	}
}

function sayiVer($min,$max)
{
	return rand($min,$max);
}

?>