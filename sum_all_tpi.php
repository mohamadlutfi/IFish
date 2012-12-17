<script>
function proses(kode,blnthn,pesan)
{
  if (document.formnya.tpi.value=="")
  {
     alert(pesan);
     return false;
  }
  else
  {
    if (document.formnya.tpi.value=="All") 
    {
      if (blnthn=="B") 
      {
        document.formnya.action=kode+"sem_bln"+'&bulan='+document.formnya.bulan.value+'&T1='+document.formnya.T1.value;
      }
      else
      {
        document.formnya.action=kode+"sem_thn"+'&T2='+document.formnya.T2.value;
      }
    }
    else
    {
      if (blnthn=="B") 
      {
        document.formnya.action=kode+"tpi_bln"+'&tpi='+document.formnya.tpi.value+'&bulan='+document.formnya.bulan.value+'&T1='+document.formnya.T1.value;
      }
      else
      {
        document.formnya.action=kode+"tpi_thn"+'&tpi='+document.formnya.tpi.value+'&T2='+document.formnya.T2.value;
      }
    }
    document.formnya.submit();
   
  }; 
}
</script>

<?php
global $language;
$path="http://".$_SERVER['SERVER_NAME'].'/imacs_databank/?q='.$language->language.'/';
if ($language->language == 'id') 
{    
     drupal_set_title('Pendaratan Kapal');
     $apl="Kriteria";
     $a1="Tempat Pendaratan";
     $a2="Semua Lokasi";
     $tahun='Tahun';
     $bulan='Bulan';
     $proses='Proses';
     $b1='Januari';
     $b2='Februari';
     $b3='Maret';
     $b4='April';
     $b5='Mei';
     $b6='Juni';
     $b7='Juli';
     $b8='Agustus';
     $b9='September';
     $b10='Oktober';
     $b11='November';
     $b12='Desember';
     $pesan="Pilih Lokasi Pendaratan atau Semua Lokasi";
}
else
{
     drupal_set_title('Boat Landing');
     $apl="Criteria";
     $a1="Landing Site";
     $a2="All Landing Sites";
     $tahun='Year';
     $bulan='Month';
     $proses='Go';
     $b1='January';
     $b2='February';
     $b3='March';
     $b4='April';
     $b5='May';
     $b6='June';
     $b7='July';
     $b8='August';
     $b9='September';
     $b10='October';
     $b11='November';
     $b12='December';
     $pesan="Select landing site or All landing sites";
}
?>
<form name="formnya" method="POST">
	<fieldset style="padding: 2">
	<legend>&nbsp;<?php echo $apl; ?> &nbsp; </legend>
	<table border="1" width="383" >
		<tr>
			<td bgcolor="#CCCCFF" width="151" >
			<p align="left"><?php echo $a1; ?></td>
			<td bgcolor="#CCCCFF" colspan="2" ><select size="1" name="tpi">
	<option value="All" selected><?php echo $a2; ?></option>
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
			<td bgcolor="#CCCCFF" width="151" ><?php echo $tahun;?></td>
			<td bgcolor="#CCCCFF" width="142" >
			<input type="text" name="T2" size="4" value="2012"></td>
			<td bgcolor="#CCCCFF" width="70" >
			<p align="center">
			<button name="B2" onclick="proses('<?php echo $path; ?>','T','<?php echo $pesan; ?>')">
			<?php echo $proses; ?></button></td>
		</tr>
		<tr>
			<td bgcolor="#CCCCFF" width="151" ><?php echo $bulan; ?></td>
			<td bgcolor="#CCCCFF" width="142" ><select size="1" name="bulan">

	<option value="01" selected><?php echo $b1;?></option>
	<option value="02">         <?php echo $b2;?></option>
	<option value="03"><?php echo $b3;?></option>
	<option value="04"><?php echo $b4;?></option>
	<option value="05"><?php echo $b5;?></option>
	<option value="06"><?php echo $b6;?></option>
	<option value="07"><?php echo $b7;?></option>
	<option value="08"><?php echo $b8;?></option>
	<option value="09"><?php echo $b9;?></option>
	<option value="10"><?php echo $b10;?></option>
	<option value="11"><?php echo $b11;?></option>
	<option value="12"><?php echo $b12;?></option>
</select>&nbsp; &nbsp;<input type="text" name="T1" size="4" value="2012"></td>
			<td bgcolor="#CCCCFF" width="70" >
			<p align="center">&nbsp;
			<button name="B1" onclick="proses('<?php echo $path; ?>','B','<?php echo $pesan; ?>')">
			<?php echo $proses;?></button></td>
		</tr>
		</table>
	</fieldset>
</form>
