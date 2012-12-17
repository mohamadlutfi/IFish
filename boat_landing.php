<?php
global $user;
$user_fields = user_load($user->uid);

if (isset($user_fields->field_perusahaan[LANGUAGE_NONE][0]['value'])){
   $perusahaan = $user_fields->field_perusahaan[LANGUAGE_NONE][0]['value'];
}
else
{
  $perusahaan ='';
}

$user_roles = array_keys($user->roles);
$roles='';
if (in_array(7, $user_roles)) {
  $roles='perusahaan' ; 
}


$path="http://".$_SERVER['SERVER_NAME'].'/imacs_databank/?q=';

$mk_tpi = $_GET["k_tpi"];
$mtahun = $_GET["tahun"];
$mbulan = $_GET["bulan"];
$mtgl   = $_GET['tgl'];

if ($mbulan=="01") { 
   $xtahun = $mtgl." Januari " .$mtahun; 
} elseif ($mbulan=="02") { 
   $xtahun = $mtgl." Februari " .$mtahun; 
} elseif ($mbulan=="03") { 
   $xtahun = $mtgl." Maret " .$mtahun; 
} elseif ($mbulan=="04") { 
  $xtahun = $mtgl." April " .$mtahun; 
} elseif ($mbulan=="05") { 
  $xtahun = $mtgl." Mei " .$mtahun; 
} elseif ($mbulan=="06") { 
  $xtahun = $mtgl." Juni " .$mtahun; 
} elseif ($mbulan=="07") { 
  $xtahun = $mtgl." Juli " .$mtahun; 
} elseif ($mbulan=="08") { 
  $xtahun = $mtgl." Agustus " .$mtahun; 
} elseif ($mbulan=="09") { 
   $xtahun = $mtgl." September " .$mtahun; 
} elseif ($mbulan=="10") { 
   $xtahun = $mtgl." Oktober " .$mtahun; 
} elseif ($mbulan=="11") { 
  $xtahun = $mtgl." November " .$mtahun; 
} elseif ($mbulan=="12") { 
  $xtahun = $mtgl." Desember " .$mtahun; 
} 

$query = "SELECT * from tab_tpi where k_tpi='".$mk_tpi."'";
$result = db_query($query);
foreach ($result as $record) {
?>

<table border="0" width="100%">
	<tr>
		<td width="152">Tempat Pendaratan Ikan</td>
		<td width="5">:</td>
		<td><?php echo $record->n_tpi; ?></td>
	</tr>
	<tr>
		<td width="152">Tanggal Pendaratan</td>
		<td width="5">:</td>
		<td><?php echo $xtahun; ?></td>
	</tr>
</table>
<?php
}
?>

<table border="1">
	<tr>
		<td colspan="2" bgcolor="#CCCCFF" rowspan="2" align="center">
		<p align="center"><b>Pendaratan Kapal</b></td>
		<td align="center" colspan="2" bgcolor="#CCCCFF" rowspan="2"><b>Berat 
		Tangkapan (Kg)</b></td>
		<td colspan="6" align="center" bgcolor="#CCCCFF" ><b>Ikan Kecil</b></td>
		<td colspan="6" align="center" bgcolor="#CCCCFF" ><b>Ikan Besar</b></td>
	</tr>
	<tr>
		<td colspan="2" align="center" bgcolor="#CCCCFF"><b>YFT</b></td>
		<td colspan="2" align="center" bgcolor="#CCCCFF"><b>BET</b></td>
		<td align="center" colspan="2" bgcolor="#CCCCFF"><b>SJK</b></td>
		<td colspan="3" bgcolor="#CCCCFF" align="center">
		<p align="center"><b>YFT</b></td>
		<td colspan="3" bgcolor="#CCCCFF" align="center">
		<p align="center"><b>BET</b></td>
	</tr>
	<tr>
		<td bgcolor="#CCCCFF" align="center"><b>Jam</b></td>
		<td bgcolor="#CCCCFF" align="center"><b>Nama Kapal</b></td>
		<td bgcolor="#CCCCFF" align="center" >
		<p align="center"><b>Total</b></td>
		<td bgcolor="#CCCCFF" align="center" >
		<p align="center"><b>Hilang</b></td>
		<td bgcolor="#CCCCFF" align="center"  ><b>Jml.</b></td>
		<td bgcolor="#CCCCFF" align="center"  ><b>Pjg.</b></td>
		<td bgcolor="#CCCCFF" align="center"  ><b>Jml.</b></td>
		<td bgcolor="#CCCCFF" align="center" ><b>Pjg.</b></td>
		<td bgcolor="#CCCCFF" align="center" ><b>Jml. </b></td>
		<td bgcolor="#CCCCFF" align="center"  ><b>Pjg.</b></td>
		<td bgcolor="#CCCCFF" align="center"  ><b>Jml.</b></td>
		<td bgcolor="#CCCCFF" align="center"  ><b>Pjg.</b></td>
		<td bgcolor="#CCCCFF" align="center"  ><b>Berat</b></td>
		<td bgcolor="#CCCCFF" align="center"  ><b>Jml.</b></td>
		<td bgcolor="#CCCCFF" align="center"  ><b>Pjg.</b></td>
		<td bgcolor="#CCCCFF" align="center"  ><b>Berat</b></td>
	</tr>

<?php
$query = "SELECT namafile,k_perusahaan,jam_sampling,mnt_sampling,kapal, total_penangkapan as tot1, est_ikanhilang as est from tps_pendaratan where k_tpi='".$mk_tpi."' and thn_sampling=".$mtahun." and bln_sampling=".$mbulan." and tgl_sampling=".$mtgl." order by jam_sampling,mnt_sampling";
$result = db_query($query);
$mt1=0; $mt3=0; $mt4=0;
$k1=0; $k2=0; $k3=0; $k4=0; $k5=0; $k6=0; $jk2=0; $jk4=0; $jk6=0;
$b1=0; $b2=0; $b3=0; $b4=0; $b5=0; $b6=0; $jb2=0; $jb5=0;

foreach ($result as $record) {

$lanj='Y';
if ($roles=='perusahaan')
{
   if($perusahaan!=$record->k_perusahaan) 
   {
       $lanj='T';
   }
}

$link=$path."detil";
$link=$link."&namafile=".$record->namafile;

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

$mt1=$mt1+1;
$mt3=$mt3+$record->tot1;
$mt4=$mt4+$record->est;
?>
	<tr>
<?php 
if ($lanj=='Y') {
?>
		<td><p align="center"><a href="<?php echo $link;  ?>"><?php echo $mwaktu;?></a>		
<?php 
}
else
{
?>
		<td><p align="center"><?php echo $mwaktu;?>		

<?php 
}
?>



		</td>
		<td>
		<p align="center"><?php echo $record->kapal;?></td>
		<td >
		<p align="center"><?php echo number_format($record->tot1);?></td>
		<td >
		<p align="center"><?php echo number_format($record->est);?></td>
<?php

$query = "select k_species,count(k_species) as jml, avg(i.panjang) as pjg from tps_pendaratan p,tps_keranjang k,tps_ikankecil i where p.namafile=k.namafile and i.namafile=k.namafile and i.nomor=k.nomor and 
k_tpi='".$mk_tpi."' and thn_sampling=".$mtahun." and bln_sampling=".$mbulan." and tgl_sampling=".$mtgl." and jam_sampling=".$record->jam_sampling." and mnt_sampling=".$record->mnt_sampling." group by k_species";

$res = db_query($query);
$yft1=0; $yft2=0;
$bet1=0; $bet2=0;
$sjk1=0; $sjk2=0;
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

$query = "select k_species,count(k_species) as jml, avg(i.panjang) as pjg, sum(berat) as berat from tps_pendaratan p,tps_ikanbesar i where p.namafile=i.namafile and k_tpi='".$mk_tpi."' and thn_sampling=".$mtahun." and bln_sampling=".$mbulan." and tgl_sampling=".$mtgl." and jam_sampling=".$record->jam_sampling." and mnt_sampling=".$record->mnt_sampling." group by k_species";

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
		<td bgcolor="#CCCCFF" align="center" colspan="2"><b><?php echo number_format($mt1); ?></b></td>
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
<p><font size="1">Catatan : [PJG] = Panjang Rata-Rata (Cm)</font></p>
