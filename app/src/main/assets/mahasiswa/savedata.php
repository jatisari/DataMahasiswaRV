<?php
$nama = $_POST['nama'];
$nim = $_POST['nim'];
$jurusan = $_POST['jurusan'];
$result = array();
$id = $_POST['id'];


$link = mysql_connect('localhost', 'root', '') or die('Cannot connect to the DB');
mysql_select_db('dbmahasiswa', $link) or die('Cannot select the DB');

/* grab the posts from the db */
$query = "insert into tbl_mahasiswa (nim, nama,jurusan) values('".$nim."','".$nama."','".$jurusan."')";
if ($id != "0"){
$query = "update tbl_mahasiswa set nama='".$nama."',jurusan='".$jurusan."',nim='".$nim."' where id=".$id;
}
$response = mysql_query($query, $link) or die('Error query:  '.$query);
$lid = mysql_insert_id();
$result["errormsg"]="Success";
$result["lid"]="$lid";
if ($response == 1){
	echo json_encode($result);
}
else{ 
	//echo "Save Data Fail";
	$result["errormsg"]="Fail";
	echo json_encode($result);
}

?>