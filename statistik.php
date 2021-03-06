<p>
<?php
   global $language;
    $path="http://".$_SERVER['SERVER_NAME'].'/imacs_databank/?q='.$language->language.'/';
    $jpg="http://".$_SERVER['SERVER_NAME'].'/imacs_databank/images/statistic.jpg"';
if ($language->language == 'id')
{
   drupal_set_title('Statistik');
   $apl='1. Aplikasi Protokol Sampling&nbsp; Hasil Tangkapan Pancing Tuna Artisanal';
}
else
{
   drupal_set_title('Statistic');
   $apl='1. Sampling Protocol for Tuna Artisanal Fishing Catch';
}

?>
</p>

<table border="0" cellpadding="1" cellspacing="1">
	<tbody>
		<tr>
			<td colspan="2" style="width: 25px;">
				<strong><?php echo $apl; ?></strong></td>
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
				<p>1.&nbsp; <a href="<?php print $path.'ps_query'; ?>">Pendaratan Kapal</a></p>
				<p>2.&nbsp; <a href="<?php print $path.'chart'; ?>">Grafik</a></p>
			</td>
<?php 
}
else
{
?>
			<td style="width: 461px;">
				<p>Sampling Protocol for Tuna Artisanal Fishing Catch in Indonesia is used to manage, process and generate information related to data sampling of Tuna fishing catch. Data sampling obtained from boat unloading at Landing Site (Port) in Indonesia. This activity is done by ANOVA Asia and IMACS program under USAID.&nbsp;</p>
				<p>Please click on the menu below:</p>
				<p>1.&nbsp; <a href="<?php print $path.'ps_query'; ?>">Boat Landing</a></p>
				<p>2.&nbsp; <a href="<?php print $path.'chart'; ?>">Graphic</a></p>
			</td>
<?php
}
?>




		</tr>
	</tbody>
</table>
<p>&nbsp;</p>