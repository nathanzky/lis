<?php
ini_set('display_errors', 'On');
$con="true";
include "connect.php";
$priv = $privy[bill];
include "log.php";
?>
        <?php
        $sql = "SELECT * FROM discount";
	    $rec = $links->query($sql) or die($links->error);
	    while ($datas = $rec->fetch_assoc()) 
		{
			$list .=  "<tr><td>$datas[discname]</td><td>$datas[discpercent]</td><td>$datas[enabled]</td><td><a href='editdiscount.php?id=$datas[id]'>Update/Delete</a></td></tr>";
		}
        ?>
    <?php
        
	$sqd = "select * from discount where enabled=1";
	$rec = $links->query($sqd) or die($links->error);


	
    echo "<select name='discounts'>";
	while ($datas=$rec->fetch_assoc()) {
			echo "<option value='" . $datas['discpercent'] ."'>" . $datas['discname'] ."</option>";
		}
	echo "</select>"; 

    ?>
<p>
	<b>Discount</b> <br />
	<select name='dis' id='dis'  onChange="totalIt();">
	<option value='0'>Regular</option>
	<option value='.2'>Senior Citizen</option>
	<option value='.15'>Coop</option>
	<option value='.10'>Gov`t</option>
	</select>
	</p>
	<p>
    <style>
table {border-collapse: collapse;padding:15px;border: 1px solid black;border-spacing: 10px}
th,td    {padding: 6px;border: 1px solid black;text-align:center;}
</style>
<h2>List of Discount</h2>
<table>
<tr><th>Discount Name</th><th>Discount Percentage</th><th>Enabled</th><th>Action</th>
</tr>
<?=$list?>
</table>