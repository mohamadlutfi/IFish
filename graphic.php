<script>
function proses(kode,blnthn)
{
  if (document.formnya.tpi.value=="")
  {
     alert("Pilih lokasi TPI atau semua TPI");
     return false;
  }
  else
  {
    if (document.formnya.tpi.value=="All") 
    {
      if (blnthn=="B") 
      {
        document.formnya.action=kode+"g_sem_bln";
      }
      else
      {
        document.formnya.action=kode+"g_sem_thn";
      }
    }
    else
    {
      if (blnthn=="B") 
      {
        document.formnya.action=kode+"g_tpi_bln";
      }
      else
      {
        document.formnya.action=kode+"g_tpi_thn";
      }
    }
    document.formnya.submit();
   
  }; 
}
</script>

<p><?php
    $path="http://".$_SERVER['SERVER_NAME'].'/imacs_databank/?q=';
?>

<form name="formnya" method="POST">
	<fieldset style="padding: 2">
	<legend>&nbsp; 1. Komposisi Frekuensi Panjang Ikan&nbsp;&nbsp;&nbsp; </legend>
	<table border="1" width="383" >
		<tr>
			<td bgcolor="#CCCCFF" width="151" >
			<p align="left">Tempat Pendaratan Ikan </td>
			<td bgcolor="#CCCCFF" colspan="2" ><select size="1" name="tpi">
	<option value="All" selected>Semua TPI</option>
	<option value="">========================</option>
			
<?php
$result = db_query("SELECT * from tab_tpi");
foreach ($result as $row) {
   echo "<option value='".$row->k_tpi."'>".$row->n_tpi."</option>"; 
}
?>
</select></td>
		</tr>
		<tr>
			<td bgcolor="#CCCCFF" width="151" >Tahun</td>
			<td bgcolor="#CCCCFF" width="142" >
			<input type="text" name="T2" size="4" value="2012"></td>
			<td bgcolor="#CCCCFF" width="70" >
			<p align="center">
			<button name="B2" onclick="proses('<?php echo $path; ?>','T')">
			Proses</button></td>
		</tr>
		<tr>
			<td bgcolor="#CCCCFF" width="151" >Bulan</td>
			<td bgcolor="#CCCCFF" width="142" ><select size="1" name="bulan">

	<option value="01" selected>Januari</option>
	<option value="02">Februari</option>
	<option value="03">Maret</option>
	<option value="04">April</option>
	<option value="05">Mei</option>
	<option value="06">Juni</option>
	<option value="07">Juli</option>
	<option value="08">Agustus</option>
	<option value="09">September</option>
	<option value="10">Oktober</option>
	<option value="11">November</option>
	<option value="12">Desember</option>


</select>&nbsp; &nbsp;<input type="text" name="T1" size="4" value="2012"></td>
			<td bgcolor="#CCCCFF" width="70" >
			<p align="center">&nbsp;
			<button name="B1" onclick="proses('<?php echo $path; ?>','B')">
			Proses</button></td>
		</tr>
		</table>
	</fieldset>
</form>
