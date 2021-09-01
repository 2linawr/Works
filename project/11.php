<?php
include 'setting.php';
mysqli_set_charset($link,'utf8_decode');
$res = mysqli_query($link,'SELECT * FROM vopros_clint')or die( mysqli_error($link) );
$Try = mysqli_fetch_assoc($res)or die( mysqli_error($link) );
mysqli_close($link)or die( mysqli_error($link) );
while($Try = mysqli_fetch_assoc($res))
	{ // оформим каждую строку результата
                                      // как ассоциативный массив
    $da[] = $Try['vopros_client']; // допишем строку из выборки как новый элемент результирующего массива
	
	}
echo json_encode($da);
?>