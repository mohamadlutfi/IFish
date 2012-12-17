<?php
global $language;

if ($language->language == 'id')
{
   drupal_set_title('Informasi Tangkapan Utama (Tidak Termasuk Ikan Besar)');
   $jud1='Bagian I. Informasi Umum';
   $a1='Lokasi Pendaratan'; $a2='Nama Perusahaan'; $a3='Enumerator 1'; $a4='Enumerator 2';
   $b1='Nama Kapal'; $b2='Nama Kapten'; $b3='Daerah Penangkapan'; $b4='Total Penangkapan (Kg)'; $b5='Estimasi Ikan Hilang (Kg)';
   $c1='Tgl. Sampling'; $c2='Jam Sampling'; $c3='Lama Trip (hari)'; $c4='Penggunaan BBM (Liter)';
   $d1='Kap. Kapal (GT)'; $d2='Pjg. Kapal (m)'; $d3='Kapasitas Mesin (PK)'; $d4='Alat Tangkap'; $d5='Penggunaan Es (Kg)'; 
   $jud4='Bagian 4 : Random Sampling panjang tangkapan utama (Tidak termasuk ikan ukuran besar)';
   $jud4_1='No. Keranjang'; $jud4_2='Kode'; $jud4_3='Berat (Kg)'; $jud4_4='No.'; $jud4_5='Spesies'; $jud4_6='Panjang (Cm)';
}
else
{
   drupal_set_title('Main Catch Information (Not Including Big Fish)');
   $jud1='Section I. General Information';
   $a1='Landing Site'; $a2='Company Name'; $a3='Enumerator 1'; $a4='Enumerator 2';
   $b1='Boat Name'; $b2='Captain Name'; $b3='Fishing Ground'; $b4='Total Catch (Kg)'; $b5='Estimated Fish Loss (Kg)';
   $c1='Sampling Date'; $c2='Sampling Time'; $c3='Long Trips (days)'; $c4='Fuel Uses (Litre)';
   $d1='Boat Capacity (GT)'; $d2='Boat Length (m)'; $d3='Machine Capacity (HP)'; $d4='Fishing Gear'; $d5='Ice Uses (Kg)'; 
   $jud4='Section 4 : Random Sampling Length of Main Catch (Not Including Big Tuna)';
   $jud4_1='Basket No.'; $jud4_2='Code'; $jud4_3='Weight (Kg)'; $jud4_4='No.'; $jud4_5='Species'; $jud4_6='Length (Cm)';
}

$mnamafile = $_GET['namafile'];
$mnomor = $_GET['nomor'];
$mkode = $_GET['kode'];
$mberat = $_GET['berat'];
$query = "SELECT * from tps_pendaratan p,tab_tpi t, tab_alattangkap a where namafile='".$mnamafile."' and t.k_tpi=p.k_tpi and a.k_alattangkap=p.k_alattangkap";
$result = db_query($query);
foreach ($result as $record) {
  $mtgl=$record->tgl_sampling;
  $mbulan=$record->bln_sampling;
  $mtahun=$record->thn_sampling;
  if ($mbulan<10) {
     $mbulan='0'.$mbulan;
  }
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
    
?>



<table border="0" cellpadding="0" cellspacing="0" style="border-collapse:
 collapse;width:950px">
	<colgroup>
		<col width="31" style="width: 23pt">
		<col width="105" span="6" style="width: 79pt">
		<col width="133" style="width: 100pt">
		<col width="129" style="width: 97pt">
	</colgroup>
	<tr height="30" style="height:15.75pt">
		<td colspan="9" height="21" style="height: 15.75pt; width: 948px; font-size: 12.0pt; font-weight: 700; text-align: center; vertical-align: middle; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; white-space: nowrap; border-left: .5pt solid windowtext; border-right: .5pt solid black; border-top: .5pt solid windowtext; border-bottom: .5pt solid windowtext; padding: 0px; background: #8DB4E2">
		<?php echo $jud1; ?></td>
	</tr>
	<tr height="30" style="height: 15.75pt">
		<td colspan="3" height="21" width="241" style="height: 15.75pt; width: 181pt; font-size: 12.0pt; text-align: center; white-space: normal; color: black; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; vertical-align: bottom; border: .5pt solid windowtext; padding: 0px; background: #D9D9D9">
		<?php echo $a1; ?></td>
		<td colspan="2" width="210" style="width: 158pt; font-size: 12.0pt; text-align: center; white-space: normal; color: black; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; vertical-align: bottom; border-left: medium none; border-right: .5pt solid windowtext; border-top: .5pt solid windowtext; border-bottom: .5pt solid windowtext; padding: 0px; background: #D9D9D9">
		<?php echo $a2; ?></td>
		<td colspan="2" style="font-size: 12.0pt; text-align: center; vertical-align: middle; color: black; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; white-space: nowrap; border-left: medium none; border-right: .5pt solid windowtext; border-top: .5pt solid windowtext; border-bottom: .5pt solid windowtext; padding: 0px; background: #D9D9D9">
		<?php echo $a3; ?></td>
		<td colspan="2" style="font-size: 12.0pt; text-align: center; vertical-align: middle; color: black; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; white-space: nowrap; border-left: medium none; border-right: .5pt solid windowtext; border-top: .5pt solid windowtext; border-bottom: .5pt solid windowtext; padding: 0px; background: #D9D9D9">
		<?php echo $a4; ?></td>
	</tr>
	<tr height="30" style="height: 15.0pt">
		<td colspan="3" style="height: 23px; font-size: 14.0pt; font-weight: 700; text-align: center; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; vertical-align: middle; white-space: nowrap; border: .5pt solid windowtext; padding: 0px">
		<?php echo $record->n_tpi; ?></td>
		<td colspan="2" style="font-size: 14.0pt; font-weight: 700; text-align: center; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; vertical-align: middle; white-space: nowrap; border-left: medium none; border-right: .5pt solid windowtext; border-top: .5pt solid windowtext; border-bottom: .5pt solid windowtext; padding: 0px" height="23">
		<?php echo $record->n_pengukuran; ?></td>
		<td colspan="2" style="font-size: 14.0pt; font-weight: 700; text-align: center; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; vertical-align: middle; white-space: nowrap; border-left: medium none; border-right: .5pt solid windowtext; border-top: .5pt solid windowtext; border-bottom: .5pt solid windowtext; padding: 0px" height="23">
		<?php echo $record->enumerator1; ?></td>
		<td colspan="2" style="font-size: 14.0pt; font-weight: 700; text-align: center; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; vertical-align: middle; white-space: nowrap; border-left: medium none; border-right: .5pt solid windowtext; border-top: .5pt solid windowtext; border-bottom: .5pt solid windowtext; padding: 0px" height="23">
		<?php echo $record->enumerator2; ?></td>
	</tr>
	<tr height="30" style="height: 30.75pt">
		<td colspan="3" style="height: 25px; font-size: 12.0pt; text-align: center; vertical-align: middle; color: black; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; white-space: nowrap; border-left: .5pt solid windowtext; border-right: .5pt solid black; border-top: .5pt solid windowtext; border-bottom: .5pt solid windowtext; padding: 0px; background: #D9D9D9">
		<?php echo $b1; ?></td>
		<td colspan="2" style="font-size: 12.0pt; text-align: center; vertical-align: middle; color: black; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; white-space: nowrap; border-left: medium none; border-right: .5pt solid windowtext; border-top: .5pt solid windowtext; border-bottom: .5pt solid windowtext; padding: 0px; background: #D9D9D9" height="25">
		<?php echo $b2; ?></td>
		<td colspan="2" style="font-size: 12.0pt; text-align: center; vertical-align: middle; color: black; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; white-space: nowrap; border-left: medium none; border-right: .5pt solid windowtext; border-top: .5pt solid windowtext; border-bottom: .5pt solid windowtext; padding: 0px; background: #D9D9D9" height="25">
		<?php echo $b3; ?></td>
		<td width="133" style="width: 100pt; font-size: 12.0pt; vertical-align: middle; white-space: normal; color: black; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; border-left: medium none; border-right: medium none; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px; background: #D9D9D9" height="24" align="center">
		<p align="center"><?php echo $b4; ?></td>
		<td style="width: 147px; font-size: 12.0pt; vertical-align: middle; white-space: normal; color: black; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; border-left: .5pt solid windowtext; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px; background: #D9D9D9" height="24" align="center">
		<p align="center"><?php echo $b5; ?></td>
	</tr>
	<tr height="30" style="height:18.75pt">
		<td colspan="3" style="height: 23px; font-size: 14.0pt; font-weight: 700; text-align: center; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; vertical-align: middle; white-space: nowrap; border-left: .5pt solid windowtext; border-right: .5pt solid black; border-top: .5pt solid windowtext; border-bottom: .5pt solid windowtext; padding: 0px">
		<?php echo $record->kapal; ?></td>
		<td colspan="2" style="font-size: 14.0pt; font-weight: 700; text-align: center; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; vertical-align: middle; white-space: nowrap; border-left: medium none; border-right: .5pt solid black; border-top: .5pt solid windowtext; border-bottom: .5pt solid windowtext; padding: 0px" height="23">
		<?php echo $record->kapten; ?></td>
		<td style="font-size: 14.0pt; font-weight: 700; text-align: center; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; vertical-align: middle; white-space: nowrap; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px" colspan="2" height="22">
		<?php echo $record->rumpon1."-".$record->rumpon2; ?></td>
		<td align="center" style="font-size: 14.0pt; font-weight: 700; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: middle; white-space: nowrap; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px; height:22px">
		<p align="center"><?php echo  number_format($record->total_penangkapan); ?></td>
		<td align="center" style="font-size: 14.0pt; font-weight: 700; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: middle; white-space: nowrap; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px" width="147" height="22">
		<p align="center"><?php echo  number_format($record->est_ikanhilang); ?></td>
	</tr>
	<tr height="30" style="height: 17.25pt">
		<td colspan="3" width="241" style="height: 27px; width: 181pt; font-size: 12.0pt; text-align: center; white-space: normal; color: black; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; vertical-align: middle; border: .5pt solid windowtext; padding: 0px; background: #D9D9D9">
		<?php echo $c1; ?></td>
		<td colspan="2" style="font-size: 12.0pt; text-align: center; color: black; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; vertical-align: middle; white-space: nowrap; border-left: medium none; border-right: .5pt solid windowtext; border-top: .5pt solid windowtext; border-bottom: .5pt solid windowtext; padding: 0px; background: #D9D9D9" height="27">
		<?php echo $c2; ?></td>
		<td colspan="2" style="font-size: 12.0pt; text-align: center; color: black; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; vertical-align: middle; white-space: nowrap; border-left: medium none; border-right: .5pt solid windowtext; border-top: .5pt solid windowtext; border-bottom: .5pt solid windowtext; padding: 0px; background: #D9D9D9" height="27">
		<?php echo $c3; ?></td>
		<td colspan="2" style="font-size: 12.0pt; text-align: center; color: black; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; vertical-align: middle; white-space: nowrap; border-left: medium none; border-right: .5pt solid windowtext; border-top: .5pt solid windowtext; border-bottom: .5pt solid windowtext; padding: 0px; background: #D9D9D9" height="27">
		<?php echo $c4; ?></td>
	</tr>
	<tr height="30" style="height:18.75pt">
		<td align="center" style="height: 21px; font-size: 14.0pt; font-weight: 700; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: middle; white-space: nowrap; border-left: .5pt solid windowtext; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px" colspan="3">
		<p align="center"><?php echo $xtahun; ?></td>
		<td colspan="2" style="font-size: 14.0pt; font-weight: 700; text-align: center; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; vertical-align: middle; white-space: nowrap; border-left: medium none; border-right: .5pt solid windowtext; border-top: .5pt solid windowtext; border-bottom: .5pt solid windowtext; padding: 0px" height="22">
		<?php echo $mwaktu; ?></td>
		<td colspan="2" style="font-size: 14.0pt; font-weight: 700; text-align: center; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; vertical-align: middle; white-space: nowrap; border-left: medium none; border-right: .5pt solid windowtext; border-top: .5pt solid windowtext; border-bottom: .5pt solid windowtext; padding: 0px" height="22">
		<?php echo  number_format($record->lama); ?></td>
		<td colspan="2" style="font-size: 14.0pt; font-weight: 700; text-align: center; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; vertical-align: middle; white-space: nowrap; border-left: medium none; border-right: .5pt solid windowtext; border-top: .5pt solid windowtext; border-bottom: .5pt solid windowtext; padding: 0px" height="22">
		<?php echo  number_format($record->bbm); ?></td>
	</tr>
	<tr height="30" style="height: 17.25pt">
		<td colspan="2" width="136" style="height: 25px; width: 102pt; font-size: 12.0pt; text-align: center; white-space: normal; color: black; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; vertical-align: middle; border: .5pt solid windowtext; padding: 0px; background: #D9D9D9">
		<?php echo $d1; ?></td>
		<td width="105" style="width: 79pt; font-size: 12.0pt; text-align: center; white-space: normal; color: black; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; vertical-align: middle; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px; background: #D9D9D9" height="24">
		<?php echo $d2; ?></td>
		<td colspan="2" width="210" style="width: 158pt; font-size: 12.0pt; text-align: center; white-space: normal; color: black; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; vertical-align: middle; border-left: medium none; border-right: .5pt solid windowtext; border-top: .5pt solid windowtext; border-bottom: .5pt solid windowtext; padding: 0px; background: #D9D9D9" height="25">
		<?php echo $d3; ?></td>
		<td colspan="2" width="210" style="width: 158pt; font-size: 12.0pt; text-align: center; white-space: normal; color: black; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; vertical-align: middle; border-left: medium none; border-right: .5pt solid windowtext; border-top: .5pt solid windowtext; border-bottom: .5pt solid windowtext; padding: 0px; background: #D9D9D9" height="25">
		<?php echo $d4; ?></td>
		<td colspan="2" style="font-size: 12.0pt; text-align: center; color: black; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; vertical-align: middle; white-space: nowrap; border-left: medium none; border-right: .5pt solid windowtext; border-top: .5pt solid windowtext; border-bottom: .5pt solid windowtext; padding: 0px; background: #D9D9D9" height="25">
		<?php echo $d5; ?></td>
	</tr>
	<tr height="30" style="height: 17.25pt">
		<td colspan="2" width="136" style="height: 24px; width: 102pt; font-size: 14.0pt; font-weight: 700; text-align: center; white-space: normal; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; vertical-align: middle; border: .5pt solid windowtext; padding: 0px">
		<?php echo  number_format($record->gt); ?></td>
		<td align="center" width="105" style="width: 79pt; font-size: 14.0pt; font-weight: 700; white-space: normal; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: middle; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px" height="23">
		<p align="center"><?php echo  number_format($record->panjang); ?></td>
		<td colspan="2" width="210" style="width: 158pt; font-size: 14.0pt; font-weight: 700; text-align: center; white-space: normal; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; vertical-align: middle; border-left: medium none; border-right: .5pt solid windowtext; border-top: .5pt solid windowtext; border-bottom: .5pt solid windowtext; padding: 0px" height="24">
		<?php echo  number_format($record->mesin); ?></td>
		<td colspan="2" style="font-size: 14.0pt; font-weight: 700; text-align: center; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; vertical-align: middle; white-space: nowrap; border-left: medium none; border-right: .5pt solid windowtext; border-top: .5pt solid windowtext; border-bottom: .5pt solid windowtext; padding: 0px" height="24">
		<?php echo  $record->english; ?></td>
		<td colspan="2" style="font-size: 14.0pt; font-weight: 700; text-align: center; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; vertical-align: middle; white-space: nowrap; border-left: medium none; border-right: .5pt solid windowtext; border-top: .5pt solid windowtext; border-bottom: .5pt solid windowtext; padding: 0px" height="24">
		<?php echo  number_format($record->es); ?></td>
	</tr>
</table>
<?php
}
?>


<table border="0" cellpadding="0" cellspacing="0" style="border-collapse:
 collapse;width:497px">
	<tr height="30" style="height:15.75pt">
		<td colspan="3" height="21" style="height: 15.75pt; width: 495px; font-size: 12.0pt; font-weight: 700; text-align: center; vertical-align: middle; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; white-space: nowrap; border-left: .5pt solid windowtext; border-right: .5pt solid black; border-top: .5pt solid windowtext; border-bottom: .5pt solid windowtext; padding: 0px; background: #8DB4E2">
		<?php echo $jud4; ?></td>
	</tr>
	<tr height="30" style="height: 15.75pt">
		<td style="border-left:1px solid windowtext; border-right:medium none windowtext; border-top:medium none windowtext; border-bottom:medium none windowtext; background-position: 0% 0%; height: 22px; width: 103px; font-size: 12.0pt; text-align: left; white-space: normal; color: black; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; vertical-align: bottom; padding: 0px; background-image:none; background-repeat:repeat; background-attachment:scroll">
		<?php echo $jud4_1; ?></td>
		<td colspan="2" style="background-position: 0% 0%; font-size: 12.0pt; text-align: left; white-space: normal; color: black; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; vertical-align: bottom; border-left: medium none; border-right: 1px solid windowtext; border-top: medium none windowtext; border-bottom: medium none windowtext; padding: 0px; background-image:none; background-repeat:repeat; background-attachment:scroll" height="22">
		: <?php echo number_format($mnomor); ?></td>
	</tr>
	<tr height="30" style="height: 15.75pt">
		<td style="border-left:1px solid windowtext; border-right:medium none windowtext; border-top:medium none windowtext; border-bottom:medium none windowtext; background-position: 0% 0%; height: 22px; width: 103px; font-size: 12.0pt; text-align: left; white-space: normal; color: black; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; vertical-align: bottom; padding: 0px; background-image:none; background-repeat:repeat; background-attachment:scroll">
		<?php echo $jud4_2; ?></td>
		<td colspan="2" style="background-position: 0% 0%; font-size: 12.0pt; text-align: left; white-space: normal; color: black; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; vertical-align: bottom; border-left: medium none; border-right: 1px solid windowtext; border-top: medium none windowtext; border-bottom: medium none windowtext; padding: 0px; background-image:none; background-repeat:repeat; background-attachment:scroll" height="22">
		: <?php echo $mkode; ?></td>
	</tr>
	<tr height="30" style="height: 15.75pt">
		<td style="border-left:1px solid windowtext; border-right:medium none windowtext; border-top:medium none windowtext; background-position: 0% 0%; height: 22px; width: 103px; font-size: 12.0pt; text-align: left; white-space: normal; color: black; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; vertical-align: bottom; padding: 0px; border-bottom-color:windowtext; background-image:none; background-repeat:repeat; background-attachment:scroll">
		<?php echo $jud4_3; ?></td>
		<td colspan="2" style="background-position: 0% 0%; font-size: 12.0pt; text-align: left; white-space: normal; color: black; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; vertical-align: bottom; border-left: medium none; border-right: 1px solid windowtext; border-top: medium none windowtext; border-bottom: medium none windowtext; padding: 0px; background-image:none; background-repeat:repeat; background-attachment:scroll" height="22">
		: <?php echo number_format($mberat); ?></td>
	</tr>
	<tr height="30" style="height: 15.75pt">
		<td style="border-left:1px solid windowtext; border-right:1px solid windowtext; border-top:1px solid windowtext; height: 22px; width: 103px; font-size: 12.0pt; text-align: center; white-space: normal; color: black; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; vertical-align: bottom; padding: 0px; background: #D9D9D9; border-bottom-color:windowtext">
		<b><?php echo $jud4_4; ?></b></td>
		<td style="width: 162px; font-size: 12.0pt; text-align: center; white-space: normal; color: black; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; vertical-align: bottom; border-left: 1px solid; border-right: 1px solid windowtext; border-top: 1px solid windowtext; padding: 0px; background: #D9D9D9; border-bottom-color:windowtext" height="22">
		<b><?php echo $jud4_5; ?></b></td>
		<td style="font-size: 12.0pt; text-align: center; vertical-align: middle; color: black; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; white-space: nowrap; border-left: 1px solid; border-right: 1px solid windowtext; border-top: 1px solid windowtext; padding: 0px; background: #D9D9D9; border-bottom-color:windowtext" height="22" width="228">
		<b><?php echo $jud4_6; ?></b></td>
	</tr>
	
<?php
$query="select * from tps_ikankecil where namafile='".$mnamafile."' and nomor=".$mnomor." order by namafile,nomor,no_ikan";
$res1 = db_query($query);
foreach ($res1 as $rec1) {
?>	
	<tr height="30" style="height: 15.0pt">
		<td style="height: 22px; font-size: 14.0pt; font-weight: 700; text-align: center; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; vertical-align: middle; white-space: nowrap; border: 1px solid windowtext; padding: 0px">
		<?php echo $rec1->no_ikan; ?></td>
		<td style="font-size: 14.0pt; font-weight: 700; text-align: center; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; vertical-align: middle; white-space: nowrap; border-left: 1px solid; border-right: 1px solid windowtext; border-top: 1px solid windowtext; border-bottom: 1px solid windowtext; padding: 0px" height="22">
		<?php echo $rec1->k_species; ?></td>
		<td style="font-size: 14.0pt; font-weight: 700; text-align: center; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; vertical-align: middle; white-space: nowrap; border-left: 1px solid; border-right: 1px solid windowtext; border-top: 1px solid windowtext; border-bottom: 1px solid windowtext; padding: 0px" height="22" width="228">
		<?php echo number_format($rec1->panjang); ?></td>
	</tr>
<?php
}
?>	
</table>
	