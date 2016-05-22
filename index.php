<!DOCTYPE html>
<html>
<head>
<title>Crud dengan ajax</title>
<style type="text/css">
body{
	font-family:arial;
}
</style>
</head>
<body>
<div style="margin-bottom:10px;">
<button id="tambahdata">Tambah</button>
</div>
<div id="tampildata" style="margin-bottom:10px;">
<?php require "tampil.php";?>
</div>
<div id="cruddata"></div>
<script src="js/jquery-2.2.2.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){

});
$("#tambahdata").click(function(){
	$("#cruddata").hide().load("tambah.php").fadeIn(1000);
});
$("#cruddata").on("click","#simpantambah", function(){
	var nama =$("#nama").val();
	var jk =$("#jk").val();
	var alamat =$("#alamat").val();
	var telp =$("#telp").val();
	if(nama=='' || jk=='' || alamat=='' || telp==''){
		alert("Data tidak boleh ada yang kosong!");
	}else{
		$.ajax({
			url:"proses.php?page=tambah",
			type:"post",
			data:'nama='+nama+'&jk='+jk+'&alamat='+alamat+'&telp='+telp,
			success:function(msg){
				if(msg=='sukses'){
					$("#tampildata").load("tampil.php");
					$("#nama").val("");
					$("#jk").val("");
					$("#alamat").val("");
					$("#telp").val("");
				}else{
					alert("Gagal menambahkan Data!");
				}
			}
			
		});
	}
});

$("#tampildata").on("click",".edit",function(){
	var id=$(this).attr("id");
	$.ajax({
		url:"edit.php",
		type:"post",
		data:"id="+id,
		success:function(msg){
			$("#cruddata").hide().fadeIn(1000).html(msg);
				
		}
	});
	
});

$("#cruddata").on("click","#simpanedit", function(){
	var nama =$("#nama").val();
	var jk =$("#jk").val();
	var alamat =$("#alamat").val();
	var telp =$("#telp").val();
	var id =$("#id_anggota").val();
	if(nama=='' || jk=='' || alamat=='' || telp==''){
		alert("Data tidak boleh ada yang kosong!");
	}else{
		$.ajax({
			url:"proses.php?page=edit",
			type:"post",
			data:'nama='+nama+'&jk='+jk+'&alamat='+alamat+'&telp='+telp+'&id='+id,
			success:function(msg){
				if(msg=='sukses'){
					$("#tampildata").load("tampil.php");
					$("#cruddata").hide("slow");
				}else{
					alert("Gagal menambahkan Data!");
				}
			}
			
		});
	}
});

$("#tampildata").on("click",".hapus",function(){
	var id=$(this).attr("id");
	var confir=confirm("Apakah anda yakin akan menghapus record ini?");
	if(confir==true){
	$.ajax({
		url:"proses.php?page=hapus",
		type:"post",
		data:"id="+id,
		success:function(msg){
			if(msg=="sukses"){
				$("#tampildata").load("tampil.php");
				
			}else{
				alert("Gagal menghapus data!");
			}
		}
	});
	}
});
</script>
</body>
</html>