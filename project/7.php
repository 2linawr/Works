<?php
include 'setting.php';
mysqli_set_charset($link,'utf8_decode');
$result = mysqli_query($link,' SELECT * FROM students ')or die( mysqli_error($link) );
$row = mysqli_fetch_assoc($result)or die( mysqli_error($link) );
mysqli_close($link)or die( mysqli_error($link) );
while($row = mysqli_fetch_assoc($result)){ // оформим каждую строку результата
                                      // как ассоциативный массив
    $data[] = $row['N']; // допишем строку из выборки как новый элемент результирующего массива
	
	}
echo json_encode($data);
?>