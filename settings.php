<?php
$con="true";
include "connect.php";
$priv = $privy[settings];
include "log.php";


$mt= str_replace(PHP_EOL,'~',$_POST[cons_mt]);
$pt= str_replace(PHP_EOL,'~',$_POST[cons_pt]);
$rd= str_replace(PHP_EOL,'~',$_POST[cons_rd]);
$sn= str_replace(PHP_EOL,'~',$_POST[cons_sn]);
if($_POST[submit]=="Save Config!")
	{
//isave ang bagong data
$datas = "$_POST[cons_lab]\n$_POST[cons_add]\n$_POST[cons_phone]\n$_POST[cons_logo]\n$_POST[cons_lic]\n$mt\n$pt\n$rd\n$sn\n";
		file_put_contents("config.php",$datas);
	   
	   	echo "<p style='font-size:16px;color:red;'>New Configuration is successfully saved...</p>";
	}
		$config = file_get_contents("config.php");
       	$config = explode("\n",$config);
include "header.php";
?>
<div style="display:inline-block;">
<form method="post" action = "#";>
<p>
Laboratory Name <br>
<input type='text' name='cons_lab' size="35" value = '<?=$config[0]?>' placeholder="Laboratory Name"> </p>
<p>
Address <br>
<input type='text' name='cons_add' size="35" value = '<?=$config[1]?>' placeholder="Address"> </p>
<p>
Phone Number <br>
<input type='text' name='cons_phone' value = '<?=$config[2]?>' placeholder="Phone Number"> </p>
<p>
Logo File Name And Location <br>
<input type='text' name='cons_logo' value = '<?=$config[3]?>' placeholder="e.g. logo.png or folder/logo.jpg" required> </p>
<p>
License No.<br>
<input type='text' name='cons_lic' value = '<?=$config[4]?>' placeholder="License Number" required> </p>
<p>
Med Tech <br>
<textarea rows='5' cols='20' name='cons_mt' placeholder="Med Tech" wrap="hard" required><?=str_replace("~","\n",$config[5])?></textarea> 
</p>
<p>
Pathologist <br>
<textarea rows='5' cols='20'  name='cons_pt' placeholder="Pathologist" required><?=str_replace("~","\n",$config[6])?></textarea></p>
<p>

<p>
Radiologist <br>
<textarea rows='5' cols='20'  name='cons_rd' placeholder="Radiologist" required><?=str_replace("~","\n",$config[7])?></textarea></p>
<p>

<p>
Sonologist <br>
<textarea rows='5' cols='20'  name='cons_sn' placeholder="Sonologist" required><?=str_replace("~","\n",$config[8])?></textarea></p>
<p>

<input type="submit" name="submit" value="Save Config!">
</p>
</form>
</div>
<div style="display:inline-block;margin-right:10px;">
	<form method='post' action="index.php">
	<input type='submit' name='submit' value='Back'>
	</form>
</div>
<?php
include "footer.php";
?>