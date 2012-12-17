<script>
function MyFunction(kode)
{
  document.formnya.bulan.value=kode;
  document.formnya.action=document.formnya.path.value+"tpi_bln"+'&tpi='+document.formnya.tpi.value+'&T1='+document.formnya.T1.value+'&bulan='+kode;
  document.formnya.submit();
}
</script>

<?php
global $language;
$path="http://".$_SERVER['SERVER_NAME'].'/imacs_databank/?q='.$language->language.'/';
$mk_tpi = $_GET["tpi"];
$mtahun = $_GET["T2"];
if ($language->language == 'id') 
{    
     drupal_set_title('Ringkasan Data');
     $a1="Tahun Pendaratan Kapal";
     $a2='Tempat Pendaratan';
     $b1='Pendaratan Kapal';
     $b2='Total Berat (Kg)';
     $b3='Ikan Kecil';
     $b4='Ikan Besar';
     $c1='Bulan';
     $c2='Jml';
     $c3='Total';
     $c4='Hilang';
     $c5='Pjg';
     $c6='Berat';
     $cat='Catatan : [Pjg] = Panjang Rata-Rata (Cm), [Berat] = Total Berat';
}
else
{
     drupal_set_title('Data Summary');
     $a1="Boat Landing Year";
     $a2='Landing Site';
     $b1='Boat Landing';
     $b2='Total Weight (Kg)';
     $b3='Small Fish';
     $b4='Big Fish';
     $c1='Month';
     $c2='No';
     $c3='Total';
     $c4='Loss';
     $c5='Length';
     $c6='Weight';
     $cat='Note : [Length] = Average of Fish Length (Cm), [Weight] = Total Weight';
}

$query = "SELECT * from tab_tpi where k_tpi='".$mk_tpi."'";
$result = db_query($query);
foreach ($result as $record) {
?>


<form name="formnya" action="" method="post">
	<input name="tpi"   type="hidden" value="<?php echo $mk_tpi; ?>" />
	<input name="path"  type="hidden" value="<?php echo $path; ?>" />
	<input name="T1"    type="hidden" value="<?php echo $mtahun; ?>" />
	<input name="bulan" type="hidden" value="" />
</form>


<table border="0" width="100%">
	<tr>
		<td width="152"><?php echo $a2; ?></td>
		<td width="5">:</td>
		<td><?php echo $record->n_tpi; ?></td>
	</tr>
	<tr>
		<td width="152"><?php echo $a1; ?></td>
		<td width="5">:</td>
		<td><?php echo $mtahun; ?></td>
	</tr>
</table>
<?php
}
?>



<table border="1">
	<tr>
		<td colspan="2" bgcolor="#CCCCFF" rowspan="2" align="center">
		<p align="center"><b><?php echo $b1; ?></b></td>
		<td align="center" colspan="2" bgcolor="#CCCCFF" rowspan="2"><b><?php echo $b2; ?></b></td>
		<td colspan="6" align="center" bgcolor="#CCCCFF" ><b><?php echo $b3; ?></b></td>
		<td colspan="6" align="center" bgcolor="#CCCCFF" ><b><?php echo $b4; ?></b></td>
	</tr>
	<tr>
		<td colspan="2" align="center" bgcolor="#CCCCFF"><b>YFT</b></td>
		<td colspan="2" align="center" bgcolor="#CCCCFF"><b>BET</b></td>
		<td align="center" colspan="2" bgcolor="#CCCCFF"><b>SKJ</b></td>
		<td colspan="3" bgcolor="#CCCCFF" align="center">
		<p align="center"><b>YFT</b></td>
		<td colspan="3" bgcolor="#CCCCFF" align="center">
		<p align="center"><b>BET</b></td>
	</tr>
	<tr>
		<td bgcolor="#CCCCFF" align="center"><b><?php echo $c1; ?></b></td>
		<td bgcolor="#CCCCFF" align="center"><b><?php echo $c2; ?></b></td>
		<td bgcolor="#CCCCFF" align="center"><b><?php echo $c3; ?></b></td>
		<td bgcolor="#CCCCFF" align="center"><b><?php echo $c4; ?></b></td>
		<td bgcolor="#CCCCFF" align="center"><b><?php echo $c2; ?></b></td>
		<td bgcolor="#CCCCFF" align="center"><b><?php echo $c5; ?></b></td>
		<td bgcolor="#CCCCFF" align="center"><b><?php echo $c2; ?></b></td>
		<td bgcolor="#CCCCFF" align="center"><b><?php echo $c5; ?></b></td>
		<td bgcolor="#CCCCFF" align="center"><b><?php echo $c2; ?></b></td>
		<td bgcolor="#CCCCFF" align="center"><b><?php echo $c5; ?></b></td>
		<td bgcolor="#CCCCFF" align="center"><b><?php echo $c2; ?></b></td>
		<td bgcolor="#CCCCFF" align="center"><b><?php echo $c5; ?></b></td>
		<td bgcolor="#CCCCFF" align="center"><b><?php echo $c6; ?></b></td>
		<td bgcolor="#CCCCFF" align="center"><b><?php echo $c2; ?></b></td>
		<td bgcolor="#CCCCFF" align="center"><b><?php echo $c5; ?></b></td>
		<td bgcolor="#CCCCFF" align="center"><b><?php echo $c6; ?></b></td>
	</tr>
<?php
$query = "SELECT bln_sampling,count(bln_sampling) as jml, sum(total_penangkapan) as tot1, sum(est_ikanhilang) as est from tps_pendaratan where k_tpi='".$mk_tpi."' and thn_sampling=".$mtahun." group by bln_sampling order by bln_sampling";
$result = db_query($query);
$mt1=0; $mt2=0; $mt3=0; $mt4=0;
$k1=0; $k2=0; $k3=0; $k4=0; $k5=0; $k6=0; $jk2=0; $jk4=0; $jk6=0;
$b1=0; $b2=0; $b3=0; $b4=0; $b5=0; $b6=0; $jb2=0; $jb5=0;
foreach ($result as $record) {

$mt1=$mt1+1;
$mt2=$mt2+$record->jml;
$mt3=$mt3+$record->tot1;
$mt4=$mt4+$record->est;

$link=$path."tpi_bln";

if ($language->language == 'id') 
{    

if ($record->bln_sampling==1) { 
   $xtahun = "Januari"; 
} elseif ($record->bln_sampling==2) { 
   $xtahun = "Februari"; 
} elseif ($record->bln_sampling==3) { 
   $xtahun = "Maret"; 
} elseif ($record->bln_sampling==4) { 
  $xtahun = "April"; 
} elseif ($record->bln_sampling==5) { 
  $xtahun = "Mei"; 
} elseif ($record->bln_sampling==6) { 
  $xtahun = "Juni"; 
} elseif ($record->bln_sampling==7) { 
  $xtahun = "Juli"; 
} elseif ($record->bln_sampling==8) { 
  $xtahun = "Agustus"; 
} elseif ($record->bln_sampling==9) { 
   $xtahun = "September"; 
} elseif ($record->bln_sampling==10) { 
   $xtahun = "Oktober"; 
} elseif ($record->bln_sampling==11) { 
  $xtahun = "November"; 
} elseif ($record->bln_sampling==12) { 
  $xtahun = "Desember"; 
} 

}
else
{

if ($record->bln_sampling==1) { 
   $xtahun = "January"; 
} elseif ($record->bln_sampling==2) { 
   $xtahun = "February"; 
} elseif ($record->bln_sampling==3) { 
   $xtahun = "March"; 
} elseif ($record->bln_sampling==4) { 
  $xtahun = "April"; 
} elseif ($record->bln_sampling==5) { 
  $xtahun = "May"; 
} elseif ($record->bln_sampling==6) { 
  $xtahun = "June"; 
} elseif ($record->bln_sampling==7) { 
  $xtahun = "July"; 
} elseif ($record->bln_sampling==8) { 
  $xtahun = "August"; 
} elseif ($record->bln_sampling==9) { 
   $xtahun = "September"; 
} elseif ($record->bln_sampling==10) { 
   $xtahun = "October"; 
} elseif ($record->bln_sampling==11) { 
  $xtahun = "November"; 
} elseif ($record->bln_sampling==12) { 
  $xtahun = "December"; 
} 

}


?>
	<tr>
		<td><p align="center"><a href="javascript:MyFunction('<?php echo  $record->bln_sampling; ?>');"><?php echo $xtahun;?></a></td>
		<td><p align="center"><?php echo number_format($record->jml);?></td>
		<td><p align="center"><?php echo number_format($record->tot1);?></td>
		<td><p align="center"><?php echo number_format($record->est);?></td>
<?php

$query="select k_species,count(k_species) as jml, avg(i.panjang) as pjg from tps_pendaratan p,tps_keranjang k,tps_ikankecil i";
$query=$query." where p.namafile=k.namafile and i.namafile=k.namafile and i.nomor=k.nomor";
$query=$query." and k_tpi='".$mk_tpi."'";
$query=$query." and thn_sampling=".$mtahun." and bln_sampling=".$record->bln_sampling." group by k_species";
$res = db_query($query);
$yft1=0; $yft2=0; $bet1=0; $bet2=0; $sjk1=0; $sjk2=0;
foreach ($res as $rec) {
   if ($rec->k_species=='YFT') {
      $yft1=$rec->jml;
      $yft2=$rec->pjg; }
   elseif ($rec->k_species=='BET') {
      $bet1=$rec->jml;
      $bet2=$rec->pjg; }
   else {
      $sjk1=$rec->jml;
      $sjk2=$rec->pjg; }
}
$k1=$k1+$yft1;
if ($yft1!=0)
{
  $k2=$k2+$yft2;
  $jk2=$jk2+1;
}
$k3=$k3+$bet1;
if ($bet1!=0)
{
  $k4=$k4+$bet2;
  $jk4=$jk4+1;
}  
$k5=$k5+$sjk1;
if ($sjk1!=0)
{
  $k6=$k6+$sjk2;
  $jk6=$jk6+1;
}  
?>
		<td align="center"  ><?php echo number_format($yft1); ?></td>
		<td align="center"  ><?php echo number_format($yft2); ?></td>
		<td align="center"  ><?php echo number_format($bet1); ?></td>
		<td align="center"  ><?php echo number_format($bet2); ?></td>
		<td align="center"  ><?php echo number_format($sjk1); ?></td>
		<td align="center"  ><?php echo number_format($sjk2); ?></td>
<?php
$query = "select k_species,count(k_species) as jml, avg(i.panjang) as pjg,sum(berat) as berat from tps_pendaratan p,tps_ikanbesar i";
$query = $query." where i.namafile=p.namafile and k_tpi='".$mk_tpi."' and thn_sampling=".$mtahun." and bln_sampling=".$record->bln_sampling." group by k_species";
$res = db_query($query);
$yft1=0; $yft2=0; $yft3=0;
$bet1=0; $bet2=0; $bet3=0;
foreach ($res as $rec) {
   if ($rec->k_species=='YFT') {
      $yft1=$rec->jml;
      $yft2=$rec->pjg; 
      $yft3=$rec->berat; }
   elseif ($rec->k_species=='BET') {
      $bet1=$rec->jml;
      $bet2=$rec->pjg; 
      $bet3=$rec->berat; }
?>
<?php
}
$b1=$b1+$yft1;
if ($yft1!=0)
{
  $b2=$b2+$yft2;
  $jb2=$jb2+1;
}  
$b3=$b3+$yft3;
$b4=$b4+$bet1;
if ($bet1!=0)
{
  $b5=$b5+$bet2;
  $jb5=$jb5+1;
}  
$b6=$b6+$bet3;
?>
		<td align="center"  ><?php echo number_format($yft1); ?></td>
		<td align="center"  ><?php echo number_format($yft2); ?></td>
		<td align="center"  ><?php echo number_format($yft3); ?></td>
		<td align="center"  ><?php echo number_format($bet1); ?></td>
		<td align="center"  ><?php echo number_format($bet2); ?></td>
		<td align="center"  ><?php echo number_format($bet3); ?></td>
	</tr>
<?php
}
$t1=0; $t2=0; $t3=0; $t4=0; $t5=0; 
if ($jk2!=0)
{
   $t1=$k2/$jk2;
} 
if ($jk4!=0)
{
   $t2=$k4/$jk4;
} 
if ($jk6!=0)
{
   $t3=$k6/$jk6;
} 
if ($jb2!=0)
{
   $t4=$b2/$jb2;
} 
if ($jb5!=0)
{
   $t5=$b5/$jb5;
} 
?>

	<tr>
		<td bgcolor="#CCCCFF" align="center"><b><?php echo number_format($mt1); ?></b></td>
		<td bgcolor="#CCCCFF" align="center"><b><?php echo number_format($mt2); ?></b></td>
		<td bgcolor="#CCCCFF" align="center" >
		<p align="center"><b><?php echo number_format($mt3); ?></b></td>
		<td bgcolor="#CCCCFF" align="center" >
		<p align="center"><b><?php echo number_format($mt4); ?></b></td>
		<td bgcolor="#CCCCFF" align="center"  ><b><?php echo number_format($k1); ?></b></td>
		<td bgcolor="#CCCCFF" align="center"  ><b><?php echo number_format($t1); ?></b></td>
		<td bgcolor="#CCCCFF" align="center"  ><b><?php echo number_format($k3); ?></b></td>
		<td bgcolor="#CCCCFF" align="center" ><b><?php echo number_format($t2); ?></b></td>
		<td bgcolor="#CCCCFF" align="center" ><b><?php echo number_format($k5); ?></b></td>
		<td bgcolor="#CCCCFF" align="center"  ><b><?php echo number_format($t3); ?></b></td>
		<td bgcolor="#CCCCFF" align="center"  ><b><?php echo number_format($b1); ?></b></td>
		<td bgcolor="#CCCCFF" align="center"  ><b><?php echo number_format($t4); ?></b></td>
		<td bgcolor="#CCCCFF" align="center"  ><b><?php echo number_format($b3); ?></b></td>
		<td bgcolor="#CCCCFF" align="center"  ><b><?php echo number_format($b4); ?></b></td>
		<td bgcolor="#CCCCFF" align="center"  ><b><?php echo number_format($t5); ?></b></td>
		<td bgcolor="#CCCCFF" align="center"  ><b><?php echo number_format($b6); ?></b></td>
	</tr>

</table>

<p><font size="1"><?php echo $cat; ?></font></p>
