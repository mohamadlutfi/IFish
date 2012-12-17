<?php
  global $language;
  $jpg="http://".$_SERVER['SERVER_NAME'].'/imacs_databank/images/tuna1.jpg"';
  if ($language->language == 'id') 
  {    
    $xls="http://".$_SERVER['SERVER_NAME'].'/imacs_databank/templates-20121203-id.xls"';
    $apl='1. Aplikasi Protokol Sampling&nbsp; Hasil Tangkapan Pancing Tuna Artisanal';
  } 
  else
  {    
    $xls="http://".$_SERVER['SERVER_NAME'].'/imacs_databank/templates-20121203-en.xls"';
    $apl='1. Sampling Protocol for Tuna Artisanal Fishing Catch';
  } 
  $path="http://".$_SERVER['SERVER_NAME'].'/imacs_databank/?q='.$language->language.'/';
?>


</p>
<table border="0" cellpadding="1" cellspacing="1">
	<tbody>
		<tr>
			<td colspan="2" style="width: 25px;">
				<strong><?php echo $apl;?></strong></td>
				
		</tr>
		<tr>
			<td class="rtecenter" style="width: 25px;">
				<img alt="" src="<?php print $jpg; ?>" /></td>

<?php
  if ($language->language == 'id') 
  {
?>
			<td style="width: 461px;">
				<p>Aplikasi Protokol Sampling&nbsp; Hasil Tangkapan Pancing Tuna Artisanal di Indonesia digunakan untuk memasukkan pengambilan data sampling di pelabuhan Indonesia mengenai perikanan pancing tuna, yang dikerjakan oleh ANOVA Asia dan program IMACS dibawah naungan USAID.&nbsp;</p>
				<p>Silahkan klik pada menu berikut :</p>
				<p>1. <a href="<?php print $xls; ?>">Download Template File Protokol Sampling</a></p>
				<p>2. <a href="<?php print $path.'impor'; ?>">Upload Template File Protokol Sampling</a></p>
				<p>3. <a href="<?php print $path.'lihat'; ?>">Lihat Proses Upload File</a></p>
			</td>
<?php
  }
    else
  {
?>
			<td style="width: 461px;">
				<p>Sampling Protocol for Tuna Artisanal Fishing Catch in Indonesia is used to manage, process and generate information related to data sampling of Tuna fishing catch. Data sampling obtained from boat unloading at Landing Site (Port) in Indonesia. This activity is done by ANOVA Asia and IMACS program under USAID.&nbsp;</p>
				<p>Please click on the menu below:</p>
				<p>1. <a href="<?php print $xls; ?>">Download Template Sampling Protocol File</a></p>
				<p>2. <a href="<?php print $path.'impor'; ?>">Upload Template Sampling Protocol File</a></p>
				<p>3. <a href="<?php print $path.'lihat'; ?>">View Upload File Process </a></p>
			</td>

<?php
  }
?>



		</tr>
	</tbody>
</table>
<p>&nbsp;</p>
