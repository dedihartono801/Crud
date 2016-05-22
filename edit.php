<fieldset style="width:330px;">
<legend><b>Edit Data</b></legend>
<?php
include "koneksi.php";
$id=@$_POST["id"];
$query=$db->query("select * from tbl_anggota where No=$id");
$data=$query->fetch(PDO::FETCH_OBJ);

?>
<table>
<tr>
<td>Nama</td>
<td>:</td>
<td>
<input type="hidden" id="id_anggota" value="<?php echo $data->No; ?>">
<input type="text" id="nama" value="<?php echo $data->Nama; ?>">
</td>
</tr>
<tr>
<td>Jenis Kelamin</td>
<td>:</td>
<td>
<select id="jk">
<option value="Laki-laki"> Laki-laki </option>
<option value="Perempuan" <?php if ($data->Jenis_Kelamin=="Perempuan"){ echo "selected";}?>> Perempuan </option>
</select>
</td>
</tr>
<tr>
<td>Alamat</td>
<td>:</td>
<td>
<textarea type="text" id="alamat"><?php echo $data->Alamat; ?></textarea>
</td>
</tr>
<tr>
<td>Telepon</td>
<td>:</td>
<td>
<input type="text" id="telp" value="<?php echo $data->Telp; ?>">
</td>
</tr>
<tr>
<td></td>
<td></td>
<td>
<button id="simpanedit">Simpan</button>
</td>
</tr>
</table>
</fieldset>