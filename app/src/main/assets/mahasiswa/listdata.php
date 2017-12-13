<?php

$link = mysql_connect('localhost', 'root', '') or die('Cannot connect to the DB');
mysql_select_db('dbmahasiswa', $link) or die('Cannot select the DB');

$result["errorcode"]="0";
/* grab the posts from the db */
$query = "SELECT id, nim, nama, jurusan FROM tbl_mahasiswa";

$rs= mysql_query($query) or die('Errorquery:  '.$query);
$countrow=  mysql_affected_rows();
$items = array();  
while($row = mysql_fetch_object($rs)){  
    array_push($items, $row);  
}  
if($countrow >0){
    $result["errorcode"] = "1";  
    $result["data"] = $items;  
}else{
     $result["errormsg"] = "Tidak ada data";  
}  
  
echo json_encode($result);  

?>