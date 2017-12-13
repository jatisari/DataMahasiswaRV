<?php
$id = $_POST['id'];

$link = mysql_connect('localhost', 'root', '') or die('Cannot connect to the DB');
mysql_select_db('dbmahasiswa', $link) or die('Cannot select the DB');

/* grab the posts from the db */
$query = "delete from tbl_mahasiswa where id=$id";
$result = mysql_query($query, $link) or die('Error query:  '.$query);
if ($result == 1){
    echo "Hapus Data Success";
}else{ 
    echo "Hapus Data Gagal";
}

?>