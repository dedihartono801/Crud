<style type="text/css">
table{
	border-collapse:collapse;
}
th,td{
	padding:5px;
}
</style>
<table border="1">
<tr>
<th>No</th>
<th>Nama</th>
<th>Jenis Kelamin</th>
<th>Alamat</th>
<th>Telepon</th>
<th>Opsi</th>
</tr>
<?php

include "koneksi.php";
try{
	$no=1;
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$tampil=$db->query("select * from tbl_anggota");
	while($data=$tampil->fetch()){
		
	?>
<tr>
<td><?php echo $no++; ?></td>
<td><?php echo $data[1];?></td>
<td><?php echo $data[2];?></td>
<td><?php echo $data[3];?></td>
<td><?php echo $data[4];?></td>
<td>
<button class="edit" id="<?php echo $data[0];?>">Edit</button>
<button class="hapus" id="<?php echo $data[0];?>">Hapus</button>
</td>
</tr>	
<?php
	}
}catch(Exception $e){
echo $e->getMessage();	
}

?>

</table>
