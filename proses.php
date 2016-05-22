<?php
include "koneksi.php";

$nama=@$_POST["nama"];
$jk=@$_POST["jk"];
$alamat=@$_POST["alamat"];
$telp=@$_POST["telp"];
$id=@$_POST["id"];
if(@$_GET["page"]=="tambah"){
$insert=$db->prepare("insert into tbl_anggota(Nama,Jenis_Kelamin,Alamat,Telp)values(?,?,?,?)");
$insert->execute(array($nama,$jk,$alamat,$telp));
if($insert->rowCount() > 0){
	echo "sukses";
}
}else if (@$_GET["page"]=="edit"){
	$edit=$db->prepare("update tbl_anggota set Nama=?, Jenis_Kelamin=?, Alamat=?, Telp=? where No=?");
	$edit->execute(array($nama,$jk,$alamat,$telp,$id));
	if($edit->rowCount() > 0){
		echo "sukses";
	}
}else if (@$_GET["page"]=="hapus"){
	$hapus=$db->prepare("delete from tbl_anggota where No=:id");
	$hapus->bindParam(":id",$id);
	$hapus->execute();
	if($hapus->rowCount()>0){
		echo "sukses";
	}
}

?>