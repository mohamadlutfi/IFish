<?php
global $language;
$path="http://".$_SERVER['SERVER_NAME'].'/imacs_databank/?q='.$language->language.'/';
if ($language->language == 'id')
{
   drupal_set_title('Informasi Pendaratan Kapal');
   $jud1='Bagian I. Informasi Umum'; $jud2='Bagian 2 : Jenis hasil tangkapan lain (Perkiraan total hasil tangkap)';
   $jud3='Bagian 3 : Ringkasan  Per Kategori  Tangkapan utama (Tidak termasuk ikan ukuran besar)';
   $jud3_1='Kode'; $jud3_2='Deskripsi'; $jud3_3='Total Berat (Kg.)';
   $jud4='Bagian 4 : Random Sampling panjang tangkapan utama (Tidak termasuk ikan ukuran besar)';
   $jud4_1='Keranjang'; $jud4_2='No.'; $jud4_3='Kode'; $jud4_4='Berat (Kg)'; $jud4_5='Jumlah'; $jud4_6='Panjang Rata-Rata (Cm)';
   $jud5='Bagian 5 : Ringkasan  Per Kategori  Tangkapan utama (Tuna ukuran besar )';
   $jud5_1='Kode'; $jud5_2='Deskripsi'; 
   $jud6='Bagian 6 : Tuna Ukuran Besar';
   $jud6_1='No.'; $jud6_2='Spesies'; $jud6_3='Kode'; $jud6_4='Berat (Kg)'; $jud6_5='Panjang (Cm)';
   $a1='Lokasi Pendaratan'; $a2='Nama Perusahaan'; $a3='Enumerator 1'; $a4='Enumerator 2';
   $b1='Nama Kapal'; $b2='Nama Kapten'; $b3='Daerah Penangkapan'; $b4='Total Penangkapan (Kg)'; $b5='Estimasi Ikan Hilang (Kg)';
   $c1='Tgl. Sampling'; $c2='Jam Sampling'; $c3='Lama Trip (hari)'; $c4='Penggunaan BBM (Liter)';
   $d1='Kap. Kapal (GT)'; $d2='Pjg. Kapal (m)'; $d3='Kapasitas Mesin (PK)'; $d4='Alat Tangkap'; $d5='Penggunaan Es (Kg)'; 
}
else
{
   drupal_set_title('Boat Landing Information');
   $jud1='Section I. General Information'; $jud2='Other Catch (Estimated Total Catch)';
   $jud3='Section 3 : Summary of Main Catch Per Category (Not Including Big Tuna)';
   $jud3_1='Code'; $jud3_2='Description'; $jud3_3='Total Weight (Kg.)';
   $jud4='Section 4 : Random Sampling Length of Main Catch (Not Including Big Tuna)';
   $jud4_1='Basket';$jud4_2='No.'; $jud4_3='Code'; $jud4_4='Weight (Kg)'; $jud4_5='Total'; $jud4_6='Average Length (Cm)';
   $jud5='Section 5. Summary of Big Tuna Per Category';
   $jud5_1='Code'; $jud5_2='Description'; 
   $jud6='Section 6 : Big Tuna';
   $jud6_1='No.'; $jud6_2='Species'; $jud6_3='Code'; $jud6_4='Weight (Kg)'; $jud6_5='Length (Cm)';

   $a1='Landing Site'; $a2='Company Name'; $a3='Enumerator 1'; $a4='Enumerator 2';
   $b1='Boat Name'; $b2='Captain Name'; $b3='Fishing Ground'; $b4='Total Catch (Kg)'; $b5='Estimated Fish Loss (Kg)';
   $c1='Sampling Date'; $c2='Sampling Time'; $c3='Long Trips (days)'; $c4='Fuel Uses (Litre)';
   $d1='Boat Capacity (GT)'; $d2='Boat Length (m)'; $d3='Machine Capacity (HP)'; $d4='Fishing Gear'; $d5='Ice Uses (Kg)'; 

}
$mnamafile = $_GET['namafile'];
$query = "SELECT * from tps_pendaratan p,tab_tpi t, tab_alattangkap a where namafile='".$mnamafile."' and t.k_tpi=p.k_tpi and a.k_alattangkap=p.k_alattangkap";
$result = db_query($query);
foreach ($result as $record) {
  $mtgl=$record->tgl_sampling;
  $mbulan=$record->bln_sampling;
  $mtahun=$record->thn_sampling;
  if ($mbulan<10) {
     $mbulan='0'.$mbulan;
  }

if ($language->language == 'id')
{
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
}
else
{
  if ($mbulan=="01") { 
     $xtahun = $mtgl." January " .$mtahun; 
  } elseif ($mbulan=="02") { 
    $xtahun = $mtgl." February " .$mtahun; 
  } elseif ($mbulan=="03") { 
    $xtahun = $mtgl." March " .$mtahun; 
  } elseif ($mbulan=="04") { 
    $xtahun = $mtgl." April " .$mtahun; 
  } elseif ($mbulan=="05") { 
    $xtahun = $mtgl." May " .$mtahun; 
  } elseif ($mbulan=="06") { 
    $xtahun = $mtgl." June " .$mtahun; 
  } elseif ($mbulan=="07") { 
    $xtahun = $mtgl." July " .$mtahun; 
  } elseif ($mbulan=="08") { 
    $xtahun = $mtgl." August " .$mtahun; 
  } elseif ($mbulan=="09") { 
    $xtahun = $mtgl." September " .$mtahun; 
  } elseif ($mbulan=="10") { 
    $xtahun = $mtgl." October " .$mtahun; 
  } elseif ($mbulan=="11") { 
    $xtahun = $mtgl." November " .$mtahun; 
  } elseif ($mbulan=="12") { 
    $xtahun = $mtgl." December " .$mtahun; 
  } 
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
  
$ml1=''; $ml2=''; $ml3=''; $ml4=''; $ml5=''; $ml6=''; $ml7=''; 
if ($language->language == 'id')
{
   if ($record->ll_1=="Y") 
   {
      $ml1='Ya';
   }
   elseif ($record->ll_1=="T") 
   {
      $ml1='Tidak';
   }
   if ($record->ll_2=="Y") 
   {
      $ml2='Ya';
   }
   elseif ($record->ll_2=="T") 
   {
      $ml2='Tidak';
   }
   if ($record->ll_3=="Y") 
   {
      $ml3='Ya';
   }
   elseif ($record->ll_3=="T") 
   {
      $ml3='Tidak';
   }
   if ($record->ll_4=="Y") 
   {
      $ml4='Ya';
   }
   elseif ($record->ll_4=="T") 
   {
      $ml4='Tidak';
   }
   if ($record->ll_5=="Y") 
   {
      $ml5='Ya';
   }
   elseif ($record->ll_5=="T") 
   {
      $ml5='Tidak';
   }
   if ($record->ll_6=="Y") 
   {
      $ml6='Ya';
   }
   elseif ($record->ll_6=="T") 
   {
      $ml6='Tidak';
   }
   if ($record->ll_7=="Y") 
   {
      $ml7='Ya';
   }
   elseif ($record->ll_7=="T") 
   {
      $ml7='Tidak';
   }
}
else
{

   if ($record->ll_1=="Y") 
   {
      $ml1='Yes';
   }
   elseif ($record->ll_1=="T") 
   {
      $ml1='No';
   }
   if ($record->ll_2=="Y") 
   {
      $ml2='Ye';
   }
   elseif ($record->ll_2=="T") 
   {
      $ml2='No';
   }
   if ($record->ll_3=="Y") 
   {
      $ml3='Yes';
   }
   elseif ($record->ll_3=="T") 
   {
      $ml3='No';
   }
   if ($record->ll_4=="Y") 
   {
      $ml4='Yes';
   }
   elseif ($record->ll_4=="T") 
   {
      $ml4='No';
   }
   if ($record->ll_5=="Y") 
   {
      $ml5='Yes';
   }
   elseif ($record->ll_5=="T") 
   {
      $ml5='No';
   }
   if ($record->ll_6=="Y") 
   {
      $ml6='Yes';
   }
   elseif ($record->ll_6=="T") 
   {
      $ml6='No';
   }
   if ($record->ll_7=="Y") 
   {
      $ml7='Yes';
   }
   elseif ($record->ll_7=="T") 
   {
      $ml7='No';
   }

  
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
		<?php echo $jud1; ?> </td>
	</tr>
	<tr height="30" style="height: 15.75pt">
		<td colspan="3" height="21" width="241" style="height: 15.75pt; width: 181pt; font-size: 12.0pt; text-align: center; white-space: normal; color: black; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; vertical-align: bottom; border: .5pt solid windowtext; padding: 0px; background: #D9D9D9">
		<?php echo $a1; ?>&nbsp;</td>
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
</table><br>
<table border="0" cellpadding="0" cellspacing="0" style="border-collapse:
 collapse;width:950px">
	<colgroup>
		<col width="31" style="width: 23pt">
		<col width="105" span="6" style="width: 79pt">
		<col width="133" style="width: 100pt">
		<col width="129" style="width: 97pt">
	</colgroup>

	<tr height="30" style="height: 15.75pt">
		<td colspan="9" style="height: 37px; font-size: 12.0pt; font-weight: 700; text-align: center; vertical-align: middle; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; white-space: nowrap; border: .5pt solid windowtext; padding: 0px; background: #8DB4E2">
		<?php echo $jud2; ?></td>
	</tr>
	<tr height="30" style="height: 31.5pt">
		<td height="42" style="height: 31.5pt; color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: bottom; white-space: nowrap; border-left: .5pt solid windowtext; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px; background: #D9D9D9">
		&nbsp;</td>
		<td width="105" style="width: 79pt; font-size: 12.0pt; text-align: center; vertical-align: middle; white-space: normal; color: black; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px; background: #D9D9D9">
		Rainbow Runner/ Salam</td>
		<td width="105" style="width: 79pt; font-size: 12.0pt; text-align: center; vertical-align: middle; white-space: normal; color: black; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px; background: #D9D9D9">
		Sword fish</td>
		<td style="font-size: 12.0pt; text-align: center; vertical-align: middle; color: black; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; white-space: nowrap; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px; background: #D9D9D9">
		Marlin</td>
		<td width="105" style="width: 79pt; font-size: 12.0pt; text-align: center; vertical-align: middle; white-space: normal; color: black; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px; background: #D9D9D9">
		Dolphin fish/ Mahi-mahi</td>
		<td width="105" style="width: 79pt; font-size: 12.0pt; text-align: center; vertical-align: middle; white-space: normal; color: black; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px; background: #D9D9D9">
		Tongkol Komo/ Kawa Kawa</td>
		<td width="105" style="width: 79pt; font-size: 12.0pt; text-align: center; vertical-align: middle; white-space: normal; color: black; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px; background: #D9D9D9">
		Tongkol Bullet/ Bullet tuna</td>
		<td colspan="2" style="width: 281px; font-size: 12.0pt; text-align: center; vertical-align: middle; white-space: normal; color: black; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; border-left: medium none; border-right: .5pt solid windowtext; border-top: .5pt solid windowtext; border-bottom: .5pt solid windowtext; padding: 0px; background: #D9D9D9">
		Lain-Lain / Other</td>
	</tr>
	<tr height="30" style="height: 18.0pt">
		<td height="24" style="height: 18.0pt; text-align: center; vertical-align: middle; color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; white-space: nowrap; border-left: .5pt solid windowtext; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px; background: #D9D9D9">
		No.</td>
		<td width="105" style="width: 79pt; font-size: 14.0pt; font-weight: 700; text-align: center; vertical-align: middle; white-space: normal; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px">
		<?php echo  number_format($record->no_1); ?></td>
		<td width="105" style="width: 79pt; font-size: 14.0pt; font-weight: 700; text-align: center; vertical-align: middle; white-space: normal; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px">
		<?php echo  number_format($record->no_2); ?></td>
		<td style="font-size: 14.0pt; font-weight: 700; text-align: center; vertical-align: middle; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; white-space: nowrap; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px">
		<?php echo  number_format($record->no_3); ?></td>
		<td width="105" style="width: 79pt; font-size: 14.0pt; font-weight: 700; text-align: center; vertical-align: middle; white-space: normal; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px">
		<?php echo  number_format($record->no_4); ?></td>
		<td width="105" style="width: 79pt; font-size: 14.0pt; font-weight: 700; text-align: center; vertical-align: middle; white-space: normal; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px">
		<?php echo  number_format($record->no_5); ?></td>
		<td width="105" style="width: 79pt; font-size: 14.0pt; font-weight: 700; text-align: center; vertical-align: middle; white-space: normal; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px">
		<?php echo  number_format($record->no_6); ?></td>
		<td colspan="2" style="width: 281px; font-size: 14.0pt; font-weight: 700; text-align: center; vertical-align: middle; white-space: normal; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; border-left: medium none; border-right: .5pt solid black; border-top: .5pt solid windowtext; border-bottom: .5pt solid windowtext; padding: 0px">
		<?php echo  number_format($record->no_7); ?></td>
	</tr>
	<tr height="30" style="height: 18.0pt">
		<td height="24" style="height: 18.0pt; text-align: center; vertical-align: middle; color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; white-space: nowrap; border-left: .5pt solid windowtext; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px; background: #D9D9D9">
		Kg.</td>
		<td width="105" style="width: 79pt; font-size: 14.0pt; font-weight: 700; text-align: center; vertical-align: middle; white-space: normal; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px">
		<?php echo  number_format($record->kg_1); ?></td>
		<td width="105" style="width: 79pt; font-size: 14.0pt; font-weight: 700; text-align: center; vertical-align: middle; white-space: normal; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px">
		<?php echo  number_format($record->kg_2); ?></td>
		<td style="font-size: 14.0pt; font-weight: 700; text-align: center; vertical-align: middle; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; white-space: nowrap; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px">
		<?php echo  number_format($record->kg_3); ?></td>
		<td width="105" style="width: 79pt; font-size: 14.0pt; font-weight: 700; text-align: center; vertical-align: middle; white-space: normal; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px">
		<?php echo  number_format($record->kg_4); ?></td>
		<td width="105" style="width: 79pt; font-size: 14.0pt; font-weight: 700; text-align: center; vertical-align: middle; white-space: normal; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px">
		<?php echo  number_format($record->kg_5); ?></td>
		<td width="105" style="width: 79pt; font-size: 14.0pt; font-weight: 700; text-align: center; vertical-align: middle; white-space: normal; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px">
		<?php echo  number_format($record->kg_6); ?></td>
		<td colspan="2" style="width: 281px; font-size: 14.0pt; font-weight: 700; text-align: center; vertical-align: middle; white-space: normal; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; border-left: medium none; border-right: .5pt solid black; border-top: .5pt solid windowtext; border-bottom: .5pt solid windowtext; padding: 0px">
		<?php echo  number_format($record->kg_7); ?></td>
	</tr>
	<tr height="24" style="height: 18.0pt">
		<td height="24" style="height: 18.0pt; text-align: center; vertical-align: middle; color: black; font-size: 11.0pt; font-weight: 400; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; white-space: nowrap; border-left: .5pt solid windowtext; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px; background: #D9D9D9">
		Est?</td>
		<td style="font-size: 14.0pt; font-weight: 700; text-align: center; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; vertical-align: bottom; white-space: nowrap; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px">
		<?php echo  $ml1; ?></td>
		<td style="font-size: 14.0pt; font-weight: 700; text-align: center; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; vertical-align: bottom; white-space: nowrap; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px">
		<?php echo  $ml2; ?></td>
		<td style="font-size: 14.0pt; font-weight: 700; text-align: center; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; vertical-align: bottom; white-space: nowrap; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px">
		<?php echo  $ml3; ?></td>
		<td style="font-size: 14.0pt; font-weight: 700; text-align: center; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; vertical-align: bottom; white-space: nowrap; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px">
		<?php echo  $ml4; ?></td>
		<td style="font-size: 14.0pt; font-weight: 700; text-align: center; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; vertical-align: bottom; white-space: nowrap; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px">
		<?php echo  $ml5; ?></td>
		<td style="font-size: 14.0pt; font-weight: 700; text-align: center; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; vertical-align: bottom; white-space: nowrap; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px">
		<?php echo  $ml6; ?></td>
		<td colspan="2" style="font-size: 14.0pt; font-weight: 700; text-align: center; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; vertical-align: bottom; white-space: nowrap; border-left: medium none; border-right: .5pt solid black; border-top: .5pt solid windowtext; border-bottom: .5pt solid windowtext; padding: 0px">
		<?php echo  $ml7; ?></td>
	</tr>
</table><br>
<?php
}
?>

<table border="0" cellpadding="0" cellspacing="0" style="border-collapse:
 collapse;width:950px">
	<colgroup>
		<col width="31" style="width: 23pt">
		<col width="105" span="2" style="width: 79pt">
	</colgroup>

	<tr height="24" style="height: 18.0pt">
		<td colspan="3" height="24" style="height: 18.0pt; font-size: 12.0pt; font-weight: 700; text-align: center; vertical-align: middle; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; white-space: nowrap; border: 1px solid windowtext; padding: 0px; background: #8DB4E2">
		<?php echo  $jud3; ?></td>
	</tr>
	<tr height="24" style="height: 18.0pt">
		<td height="24" width="136" style="border:1px solid windowtext; height: 18.0pt; width: 102pt; font-size: 12.0pt; font-weight: 700; text-align: center; vertical-align: middle; white-space: normal; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; padding: 0px; background: #D9D9D9; ">
		<?php echo  $jud3_1; ?></td>
		<td width="315" style="border-bottom:1px solid windowtext; width: 237pt; font-size: 12.0pt; font-weight: 700; text-align: center; vertical-align: middle; white-space: normal; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; border-left: 1px solid; border-right: 1px solid black; padding: 0px; background: #D9D9D9; border-top-color:inherit">
		<?php echo  $jud3_2; ?></td>
		<td width="210" style="border-bottom:1px solid windowtext; width: 158pt; font-size: 12.0pt; font-weight: 700; text-align: center; vertical-align: middle; white-space: normal; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; border-left: 1px solid; border-right: 1px solid black; padding: 0px; background: #D9D9D9; border-top-color:inherit">
		<?php echo  $jud3_3; ?></td>
	</tr>
<?php
$query="select * from tps_ringkasan_ikankecil where namafile='".$mnamafile."' order by namafile,kode";
$res1 = db_query($query);
foreach ($res1 as $rec1) {
?>
	  <tr height='24' style='height: 18.0pt'>
	  <td style="border-top:1px solid windowtext; height: 25px; font-size: 14.0pt; font-weight: 700; text-align: center; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; vertical-align: middle; white-space: nowrap; border-left: 1px solid; border-right: 1px solid black; border-bottom: 1px solid windowtext; padding: 0px; ">
	  <?php echo $rec1->kode; ?></td>
	  <td style="border-top:1px solid windowtext; font-size: 14.0pt; font-weight: 700; text-align: center; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; vertical-align: middle; white-space: nowrap; border-left: 1px solid; border-right: 1px solid black; border-bottom: 1px solid windowtext; padding: 0px; " height="25">
	  <?php echo $rec1->deskripsi; ?></td>
	  <td style="border-top:1px solid windowtext; font-size: 14.0pt; font-weight: 700; text-align: center; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; vertical-align: middle; white-space: nowrap; border-left: 1px solid; border-right: 1px solid black; border-bottom: 1px solid windowtext; padding: 0px; " height="25">
	  <?php echo number_format($rec1->berat); ?></td>
  	  </tr>
<?php 
}
?>	
</table><br>


<table border="0" cellpadding="0" cellspacing="0" style="border-collapse:
 collapse;width:947px">
	<colgroup>
		<col width="31" style="width: 23pt">
		<col width="105" span="5" style="width: 79pt">
		<col width="133" style="width: 100pt">
		<col width="133" style="width: 100pt">
		<col width="129" style="width: 97pt">
	</colgroup>

	<tr height="23" style="height: 17.25pt">
		<td colspan="9" height="23" style="height: 17.25pt; font-size: 12.0pt; font-weight: 700; text-align: center; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; vertical-align: bottom; white-space: nowrap; border: .5pt solid windowtext; padding: 0px; background: #8DB4E2">
		<?php echo $jud4; ?></td>
	</tr>
	<tr height="26" style="height: 19.5pt">
		<td colspan="3" height="26" style="height: 19.5pt; font-size: 12.0pt; font-weight: 700; text-align: center; vertical-align: middle; white-space: normal; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; border: .5pt solid windowtext; padding: 0px; background: #D9D9D9">
		<?php echo $jud4_1; ?></td>
		<td style="font-size: 12.0pt; font-weight: 700; text-align: center; vertical-align: middle; white-space: normal; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px; background: #D9D9D9" colspan="2">
		YFT</td>
		<td style="font-size: 12.0pt; font-weight: 700; text-align: center; vertical-align: middle; white-space: normal; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px; background: #D9D9D9" colspan="2">
		BET</td>
		<td style="font-size: 12.0pt; font-weight: 700; vertical-align: middle; white-space: normal; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px; background: #D9D9D9" colspan="2">
		<p align="center">SKJ</td>
	</tr>
	<tr height="26" style="height: 19.5pt">
		<td height="26" style="height: 19.5pt; width: 75px; font-size: 12.0pt; font-weight: 700; text-align: center; vertical-align: middle; white-space: normal; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; border: .5pt solid windowtext; padding: 0px; background: #D9D9D9">
		<?php echo $jud4_2; ?></td>
		<td style="width: 96px; font-size: 12.0pt; font-weight: 700; text-align: center; vertical-align: middle; white-space: normal; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px; background: #D9D9D9">
		<?php echo $jud4_3; ?></td>
		<td style="width: 98px; font-size: 12.0pt; font-weight: 700; text-align: center; vertical-align: middle; white-space: normal; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px; background: #D9D9D9">
		<?php echo $jud4_4; ?></td>
		<td style="width: 77px; font-size: 12.0pt; font-weight: 700; text-align: center; vertical-align: middle; white-space: normal; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px; background: #D9D9D9">
		<?php echo $jud4_5; ?></td>
		<td style="width: 161px; font-size: 12.0pt; font-weight: 700; text-align: center; vertical-align: middle; white-space: normal; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px; background: #D9D9D9">
		<?php echo $jud4_6; ?></td>
		<td style="width: 71px; font-size: 12.0pt; font-weight: 700; text-align: center; vertical-align: middle; white-space: normal; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px; background: #D9D9D9">
		<?php echo $jud4_5; ?></td>
		<td style="width: 147px; font-size: 12.0pt; font-weight: 700; text-align: center; vertical-align: middle; white-space: normal; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px; background: #D9D9D9">
		<?php echo $jud4_6; ?></td>
		<td style="width: 69px; font-size: 12.0pt; font-weight: 700; text-align: center; vertical-align: middle; white-space: normal; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px; background: #D9D9D9">
		<?php echo $jud4_5; ?></td>
		<td style="width: 143px; font-size: 12.0pt; font-weight: 700; text-align: center; vertical-align: middle; white-space: normal; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px; background: #D9D9D9">
		<?php echo $jud4_6; ?></td>
	</tr>

<?php
$query="select i.nomor,kode,berat,k_species,count(k_species) as jml,avg(panjang) as pjg from tps_keranjang k,tps_ikankecil i where k.namafile='".$mnamafile."' and i.namafile=k.namafile and i.nomor=k.nomor";
$query=$query." group by i.nomor,kode,berat,k_species order by i.nomor";
$res1 = db_query($query);
$sw=0; 
foreach ($res1 as $rec1) {
  if ($sw==0) {
    $sw=1;
    $temp=$rec1->nomor;
    $mkode=$rec1->kode;
    $mberat=$rec1->berat;
    $yft1=0; $yft2=0; $bet1=0; $bet2=0; $sjk1=0; $sjk2=0; 
  }
  elseif ($temp!=$rec1->nomor) {
    $link=$path."keranjang";
    $link=$link."&namafile=".$mnamafile;
    $link=$link."&nomor=".$temp;
    $link=$link."&kode=".$mkode;
    $link=$link."&berat=".$mberat;
?>
	<tr height="31" style="height: 23.25pt">
		<td height="31" style="height: 23.25pt; font-size: 14.0pt; font-weight: 700; text-align: center; vertical-align: middle; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; white-space: nowrap; border: .5pt solid windowtext; padding: 0px" width="75">

		<font size="4"><a href="<?php echo $link;  ?>"><?php echo number_format($temp); ?></a></font></td>
		<td style="font-size: 14.0pt; font-weight: 700; text-align: center; vertical-align: middle; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; white-space: nowrap; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px" width="96">
		<font size="4"><?php echo $mkode; ?></font></td>
		<td style="font-size: 14.0pt; font-weight: 700; text-align: center; vertical-align: middle; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; white-space: nowrap; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px" width="98">
		<font size="4"><?php echo number_format($mberat); ?></font></td>
		<td align="center" style="font-size: 14.0pt; font-weight: 700; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: middle; white-space: nowrap; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px" width="77">
		<font size="4"><?php echo number_format($yft1); ?></font></td>
		<td style="font-size: 14.0pt; font-weight: 700; text-align: center; vertical-align: middle; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; white-space: nowrap; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px" width="161">
		<font size="4"><?php echo number_format($yft2); ?></font></td>
		<td style="font-size: 14.0pt; font-weight: 700; text-align: center; vertical-align: middle; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; white-space: nowrap; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px" width="71">
		<font size="4"><?php echo number_format($bet1); ?></font></td>
		<td style="background-position: 0% 0%; width: 147px; font-size: 12.0pt; font-weight: 700; vertical-align: middle; white-space: normal; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px; background-image:none; background-repeat:repeat; background-attachment:scroll" align="center">
		<font size="4"><?php echo number_format($bet2); ?></font></td>
		<td style="background-position: 0% 0%; width: 69px; font-size: 12.0pt; font-weight: 700; vertical-align: middle; white-space: normal; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px; background-image:none; background-repeat:repeat; background-attachment:scroll" align="center">
		<font size="4"><?php echo number_format($sjk1); ?></font></td>
		<td style="background-position: 0% 0%; width: 143px; font-size: 12.0pt; font-weight: 700; vertical-align: middle; white-space: normal; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px; background-image:none; background-repeat:repeat; background-attachment:scroll" align="center">
		<font size="4"><?php echo number_format($sjk2); ?></font></td>
	</tr>
<?php  
    $temp=$rec1->nomor;
    $mkode=$rec1->kode;
    $mberat=$rec1->berat;
    $yft1=0; $yft2=0; $bet1=0; $bet2=0; $sjk1=0; $sjk2=0; 
  }    
  if ($rec1->k_species == "YFT") {
    $yft1=$rec1->jml;
    $yft2=$rec1->pjg;
  }
  else if ($rec1->k_species == "BET") {
    $bet1=$rec1->jml;
    $bet2=$rec1->pjg;
  }
  else {
    $sjk1=$rec1->jml;
    $sjk2=$rec1->pjg;
  }
}
if ($sw!=0) {
    $link=$path."keranjang";
    $link=$link."&namafile=".$mnamafile;
    $link=$link."&nomor=".$temp;
    $link=$link."&kode=".$mkode;
    $link=$link."&berat=".$mberat;
?>
	<tr height="31" style="height: 23.25pt">
		<td height="31" style="height: 23.25pt; font-size: 14.0pt; font-weight: 700; text-align: center; vertical-align: middle; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; white-space: nowrap; border: .5pt solid windowtext; padding: 0px" width="75">
		<font size="4"><a href="<?php echo $link;  ?>"><?php echo number_format($temp); ?></a></font></td>
		<td style="font-size: 14.0pt; font-weight: 700; text-align: center; vertical-align: middle; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; white-space: nowrap; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px" width="96">
		<font size="4"><?php echo $mkode; ?></font></td>
		<td style="font-size: 14.0pt; font-weight: 700; text-align: center; vertical-align: middle; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; white-space: nowrap; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px" width="98">
		<font size="4"><?php echo number_format($mberat); ?></font></td>
		<td align="center" style="font-size: 14.0pt; font-weight: 700; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; vertical-align: middle; white-space: nowrap; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px" width="77">
		<font size="4"><?php echo number_format($yft1); ?></font></td>
		<td style="font-size: 14.0pt; font-weight: 700; text-align: center; vertical-align: middle; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; white-space: nowrap; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px" width="161">
		<font size="4"><?php echo number_format($yft2); ?></font></td>
		<td style="font-size: 14.0pt; font-weight: 700; text-align: center; vertical-align: middle; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; white-space: nowrap; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px" width="71">
		<font size="4"><?php echo number_format($bet1); ?></font></td>
		<td style="background-position: 0% 0%; width: 147px; font-size: 12.0pt; font-weight: 700; vertical-align: middle; white-space: normal; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px; background-image:none; background-repeat:repeat; background-attachment:scroll" align="center">
		<font size="4"><?php echo number_format($bet2); ?></font></td>
		<td style="background-position: 0% 0%; width: 69px; font-size: 12.0pt; font-weight: 700; vertical-align: middle; white-space: normal; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px; background-image:none; background-repeat:repeat; background-attachment:scroll" align="center">
		<font size="4"><?php echo number_format($sjk1); ?></font></td>
		<td style="background-position: 0% 0%; width: 143px; font-size: 12.0pt; font-weight: 700; vertical-align: middle; white-space: normal; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; text-align: general; border-left: medium none; border-right: .5pt solid windowtext; border-top: medium none; border-bottom: .5pt solid windowtext; padding: 0px; background-image:none; background-repeat:repeat; background-attachment:scroll" align="center">
		<font size="4"><?php echo number_format($sjk2); ?></font></td>
	</tr>
<?php 
}
?>
</table><br>

<table border="0" cellpadding="0" cellspacing="0" style="border-collapse:
 collapse;width:950px">
	<colgroup>
		<col width="31" style="width: 23pt">
		<col width="105" span="2" style="width: 79pt">
	</colgroup>
	

	<tr height="24" style="height: 18.0pt">
		<td colspan="2" height="24" style="height: 18.0pt; font-size: 12.0pt; font-weight: 700; text-align: center; vertical-align: middle; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; white-space: nowrap; border: 1px solid windowtext; padding: 0px; background: #8DB4E2">
		<?php echo $jud5; ?></td>
	</tr>


	<tr height="24" style="height: 18.0pt">
		<td height="24" width="136" style="border:1px solid windowtext; height: 18.0pt; width: 102pt; font-size: 12.0pt; font-weight: 700; text-align: center; vertical-align: middle; white-space: normal; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; padding: 0px; background: #D9D9D9; ">
		<?php echo $jud5_1; ?></td>
		<td width="315" style="border-bottom:1px solid windowtext; width: 237pt; font-size: 12.0pt; font-weight: 700; text-align: center; vertical-align: middle; white-space: normal; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; border-left: 1px solid; border-right: 1px solid black; padding: 0px; background: #D9D9D9; border-top-color:inherit">
		<?php echo $jud5_2; ?></td>
	</tr>



<?php
$query="select * from tps_ringkasan_ikanbesar where namafile='".$mnamafile."' order by namafile,kode";
$res1 = db_query($query);
foreach ($res1 as $rec1) {
?>
	  <tr height='24' style='height: 18.0pt'>
	  <td style="border-top:1px solid windowtext; height: 25px; font-size: 14.0pt; font-weight: 700; text-align: center; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; vertical-align: middle; white-space: nowrap; border-left: 1px solid; border-right: 1px solid black; border-bottom: 1px solid windowtext; padding: 0px; ">
	  <?php echo $rec1->kode; ?></td>
	  <td style="border-top:1px solid windowtext; font-size: 14.0pt; font-weight: 700; text-align: center; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; vertical-align: middle; white-space: nowrap; border-left: 1px solid; border-right: 1px solid black; border-bottom: 1px solid windowtext; padding: 0px; " height="25">
	  <?php echo $rec1->deskripsi; ?></td>
  	  </tr>
<?php 
}
?>	
</table><br>

<table border="0" cellpadding="0" cellspacing="0" style="border-collapse:
 collapse;width:950px">
	<colgroup>
		<col width="31" style="width: 23pt">
		<col width="105" span="2" style="width: 79pt">
	</colgroup>

	<tr height="24" style="height: 18.0pt">
		<td colspan="5" height="24" style="height: 18.0pt; font-size: 12.0pt; font-weight: 700; text-align: center; vertical-align: middle; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; white-space: nowrap; border: 1px solid windowtext; padding: 0px; background: #8DB4E2">
		<?php echo $jud6; ?></td>
	</tr>
	<tr height="24" style="height: 18.0pt">
		<td style="border:1px solid windowtext; height: 18.0pt; width: 102pt; font-size: 12.0pt; font-weight: 700; text-align: center; vertical-align: middle; white-space: normal; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; padding: 0px; background: #D9D9D9; ">
		<?php echo $jud6_1; ?></td>
		<td style="border-bottom:1px solid windowtext; width: 237pt; font-size: 12.0pt; font-weight: 700; text-align: center; vertical-align: middle; white-space: normal; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; border-left: 1px solid; border-right: 1px solid black; padding: 0px; background: #D9D9D9; border-top-color:inherit">
		<?php echo $jud6_2; ?></td>
		<td style="border-bottom:1px solid windowtext; width: 237pt; font-size: 12.0pt; font-weight: 700; text-align: center; vertical-align: middle; white-space: normal; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; border-left: 1px solid; border-right: 1px solid black; padding: 0px; background: #D9D9D9; border-top-color:inherit">
		<?php echo $jud6_3; ?></td>
		<td style="border-bottom:1px solid windowtext; width: 237pt; font-size: 12.0pt; font-weight: 700; text-align: center; vertical-align: middle; white-space: normal; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; border-left: 1px solid; border-right: 1px solid black; padding: 0px; background: #D9D9D9; border-top-color:inherit">
		<?php echo $jud6_4; ?></td>
		<td style="border-bottom:1px solid windowtext; width: 158pt; font-size: 12.0pt; font-weight: 700; text-align: center; vertical-align: middle; white-space: normal; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; border-left: 1px solid; border-right: 1px solid black; padding: 0px; background: #D9D9D9; border-top-color:inherit">
		<?php echo $jud6_5; ?></td>
	</tr>
<?php
$query="select * from tps_ikanbesar where namafile='".$mnamafile."' order by namafile,no_ikan";
$res1 = db_query($query);
foreach ($res1 as $rec1) {
?>
	  <tr height='24' style='height: 18.0pt'>
	  <td style="border-top:1px solid windowtext; height: 25px; font-size: 14.0pt; font-weight: 700; text-align: center; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; vertical-align: middle; white-space: nowrap; border-left: 1px solid; border-right: 1px solid black; border-bottom: 1px solid windowtext; padding: 0px; ">
	  <?php echo number_format($rec1->no_ikan); ?></td>
	  <td style="border-top:1px solid windowtext; font-size: 14.0pt; font-weight: 700; text-align: center; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; vertical-align: middle; white-space: nowrap; border-left: 1px solid; border-right: 1px solid black; border-bottom: 1px solid windowtext; padding: 0px; " height="25">
	  <?php echo $rec1->k_species; ?></td>
	  <td style="border-top:1px solid windowtext; font-size: 14.0pt; font-weight: 700; text-align: center; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; vertical-align: middle; white-space: nowrap; border-left: 1px solid; border-right: 1px solid black; border-bottom: 1px solid windowtext; padding: 0px; " height="25">
	  <?php echo $rec1->kode; ?></td>
	  <td style="border-top:1px solid windowtext; font-size: 14.0pt; font-weight: 700; text-align: center; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; vertical-align: middle; white-space: nowrap; border-left: 1px solid; border-right: 1px solid black; border-bottom: 1px solid windowtext; padding: 0px; " height="25">
	  <?php echo number_format($rec1->berat); ?></td>
	  <td style="border-top:1px solid windowtext; font-size: 14.0pt; font-weight: 700; text-align: center; color: black; font-style: normal; text-decoration: none; font-family: Calibri, sans-serif; vertical-align: middle; white-space: nowrap; border-left: 1px solid; border-right: 1px solid black; border-bottom: 1px solid windowtext; padding: 0px; " height="25">
	  <?php echo number_format($rec1->panjang); ?></td>
  	  </tr>
<?php 
}
?>	
</table><br>
