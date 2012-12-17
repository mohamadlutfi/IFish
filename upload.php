<script>
function validateForm(form, err)
{
   var filename=form.filenya.value;
   var ext = filename.split('.').pop();
   ext = ext.toUpperCase();
   if (ext=="XLS") { 
      return true;
   }
  else {
      alert(err);
      return false;
   }   
}
</script>
<p>
<?php
   global $language;

  if ($language->language == 'id') 
  {    
    $pesan="Masukkan file yang akan diupload.";
    $kirim="Kirim File";
    $err='File harus dalam format xls !!!';
  } 
  else
  {    
    $pesan="Please select the file.";
    $kirim="Send File";
    $err='File has to xls format !!!';
  } 
    $path="http://".$_SERVER['SERVER_NAME'].'/imacs_databank';
    $nama=$path.'/?q=proses';
?></p>
<form action="<?php echo $nama?>" enctype="multipart/form-data" method="post" onsubmit="return validateForm(this,'<?php echo $err; ?>')">
	<?php echo $pesan; ?><br />
	&nbsp;<input name="filenya" size="80" type="file" /><br />
	<input type="submit" value="<?php echo $kirim; ?>" />&nbsp;</form>
<p>