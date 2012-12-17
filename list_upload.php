<script>
function konfirm(namafile,komen,kode)
{
  var r=confirm(komen +  namafile + " ?");
  if (r==true)
    {
       document.formnya.b1.value=namafile;
       document.formnya.action=kode+'view_bln&bulan='+document.formnya.bulan.value+'&T1='+document.formnya.T1.value+'&b1='+document.formnya.b1.value;
       document.formnya.submit();
    }
}
</script>


<p>

<?php
global $user;
global $language;

if ($user->uid)
{
  $pengguna=$user->name;
}

    $mbulan = $_GET["bulan"];
    $mtahun = $_GET["T1"];
    $hapus = $_GET["b1"];

$path="http://".$_SERVER['SERVER_NAME'].'/imacs_databank/?q='.$language->language.'/';

if ($language->language == 'id')
{
   drupal_set_title('Daftar File Upload Port Sampling Tuna');
   $hapfile='Hapus File Upload ';
   $par1='Lihat';
   $par2='Hapus';
}
else
{
   drupal_set_title('List of Port Sampling Tuna Upload File');
   $hapfile='Remove upload file ';
   $par1='View';
   $par2='Remove';
}

if ($hapus!="xxxxx") {
  $query="delete from tps_pendaratan where namafile='".$hapus."'";
  $result = db_query($query);
}

if ($language->language == 'id')
    {

if ($mbulan=="01") { 
   $xtahun = "Januari " .$mtahun; 
} elseif ($mbulan=="02") { 
   $xtahun = "Februari " .$mtahun; 
} elseif ($mbulan=="03") { 
   $xtahun = "Maret " .$mtahun; 
} elseif ($mbulan=="04") { 
  $xtahun = "April " .$mtahun; 
} elseif ($mbulan=="05") { 
  $xtahun = "Mei " .$mtahun; 
} elseif ($mbulan=="06") { 
  $xtahun = "Juni " .$mtahun; 
} elseif ($mbulan=="07") { 
  $xtahun = "Juli " .$mtahun; 
} elseif ($mbulan=="08") { 
  $xtahun = "Agustus " .$mtahun; 
} elseif ($mbulan=="09") { 
   $xtahun = "September " .$mtahun; 
} elseif ($mbulan=="10") { 
   $xtahun = "Oktober " .$mtahun; 
} elseif ($mbulan=="11") { 
  $xtahun = "November " .$mtahun; 
} elseif ($mbulan=="12") { 
  $xtahun = "Desember " .$mtahun; 
} 
$xtahun = "Bulan : " .$xtahun; 
   }

else

  {
if ($mbulan=="01") { 
   $xtahun = "January " .$mtahun; 
} elseif ($mbulan=="02") { 
   $xtahun = "February " .$mtahun; 
} elseif ($mbulan=="03") { 
   $xtahun = "March " .$mtahun; 
} elseif ($mbulan=="04") { 
  $xtahun = "April " .$mtahun; 
} elseif ($mbulan=="05") { 
  $xtahun = "May " .$mtahun; 
} elseif ($mbulan=="06") { 
  $xtahun = "June " .$mtahun; 
} elseif ($mbulan=="07") { 
  $xtahun = "July " .$mtahun; 
} elseif ($mbulan=="08") { 
  $xtahun = "August " .$mtahun; 
} elseif ($mbulan=="09") { 
   $xtahun = "September " .$mtahun; 
} elseif ($mbulan=="10") { 
   $xtahun = "October " .$mtahun; 
} elseif ($mbulan=="11") { 
  $xtahun = "November " .$mtahun; 
} elseif ($mbulan=="12") { 
  $xtahun = "December " .$mtahun; 
} 
$xtahun = "Month : " .$xtahun; 
   }
echo $xtahun;
?>

<form method="POST" action="" name="formnya">
	<p><input type="hidden" name="b1"></p>
	<p><input type="hidden" name="bulan" value="<?php echo $mbulan;?>"></p>
	<p><input type="hidden" name="T1" value="<?php echo $mtahun;?>"></p>
</form>


</p>
<table border="1" width="100%" >
<?php 
if ($language->language == 'id')
{ ?>
	<tr>
		<td align="center" bgcolor="#9999FF"><b>No.</b></td>
		<td align="center" bgcolor="#9999FF"><b>Lokasi</b></td>
		<td align="center" bgcolor="#9999FF"><b>Tgl/Jam Pendaratan</b></td>
		<td align="center" bgcolor="#9999FF"><b>Nama Kapal</b></td>
		<td align="center" bgcolor="#9999FF"><b>Nama Kapten</b></td>
		<td align="center" bgcolor="#9999FF"><b>Nama File</b></td>
		<td align="center" bgcolor="#9999FF"><b>Operasi</b></td>
	</tr>
<?php
}
else
{
?>
	<tr>
		<td align="center" bgcolor="#9999FF"><b>No.</b></td>
		<td align="center" bgcolor="#9999FF"><b>Landing Site</b></td>
		<td align="center" bgcolor="#9999FF"><b>Landing Date</b></td>
		<td align="center" bgcolor="#9999FF"><b>Name of Boat</b></td>
		<td align="center" bgcolor="#9999FF"><b>Name of Captain</b></td>
		<td align="center" bgcolor="#9999FF"><b>Filename</b></td>
		<td align="center" bgcolor="#9999FF"><b>Operation</b></td>
	</tr>

<?php
}
$query = "SELECT * from tps_pendaratan p,tab_tpi t where t.k_tpi=p.k_tpi and thn_sampling=".$mtahun." and bln_sampling=".$mbulan." and pengguna='".$pengguna."' order by tgl_sampling,jam_sampling,mnt_sampling";
$result = db_query($query);
$i=0;
foreach ($result as $record) {
  $i++;
  if ($record->tgl_sampling<10) {
     $mtgl='0'.$record->tgl_sampling; 
  }
  else
  {
     $mtgl=$record->tgl_sampling; 
  }
  if ($record->jam_sampling<10) {
     $mwaktu="0".$record->jam_sampling;
  }
  else {
     $mwaktu=$record->jam_sampling;
  }
  if ($record->mnt_sampling<10) {
     $mwaktu=$mwaktu.":0".$record->mnt_sampling;
  }
  else {
     $mwaktu=$mwaktu.":".$record->mnt_sampling;
  }
  $link=$path."detil";
  $link=$link."&namafile=".$record->namafile;
  $linkhapus="javascript:konfirm('".$record->namafile."','".$hapfile."','".$path."');"
?>
	<tr>
		<td align="center" ><?php echo $i; ?></td>
		<td align="left" ><?php echo $record->n_tpi; ?></td>
		<td align="center" ><?php echo $mtgl."/".$mbulan."/".$mtahun." ".$mwaktu; ?></td>
		<td align="left"><?php echo $record->kapal; ?></td>
		<td align="left"><?php echo $record->kapten; ?></td>
		<td align="left"><?php echo $record->namafile; ?></td>
		<td align="center"><a href="<?php echo $link;  ?>"><?php echo $par1;  ?></a>, <a href="<?php echo $linkhapus;  ?>"><?php echo $par2;  ?></a></td>
	</tr>
<?php
}
?>

	</table>
