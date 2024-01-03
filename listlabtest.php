<?php
include "connect.php";
$priv = $privy[listlabtest];
include "log.php";
$sql = "SELECT * FROM labtest order by test ,typeoftest, subtype";
$rec = $links->query($sql) or die($links->error);

$dis = "


";
$bg = "#eee";
while ($datas = $rec->fetch_assoc())
	{
		
		$dis .= "<tr style='background-color:$bg;'>
			<td>$datas[labid]</td>
			<td>$datas[test]</td>
			<td>$datas[typeoftest]</td>
			<td>$datas[subtype]</td>
			<td>" . number_format($datas[price],2) . "</td>
			<td><a href='viewtest.php?id=$datas[labid]'>View</a> | <A href='deltest.php?id=$datas[labid]'>Delete</a></td>
		</tr>";
		if($bg=="#eee")
		{
			$bg='#fff';
		}else{
			$bg="#eee";
		}
	} 
	
	include "header.php";
?>
	<style>
	 #toptbl {padding-left:5px;
	 		padding-top: 5px;
	 		padding-bottom: 5px;   
			background-color: #4CAF50;     
			color: white;
			border: 1px solid grey;}
	 td {padding:5px;border: .5px solid grey;}

	 table {width:100%;
	 		font-size: 16px;
    		font-family: 'Trebuchet MS', Arial, Helvetica, sans-serif;
    		border-collapse: collapse; }
	 th {}
	</style>
	</div>
	<div>
	
	<h2>List of laboratory test</h2>
	<table style=''>
<tr>
<th id='toptbl' style="width: 8%">Test ID</th>
<th id='toptbl' style="width: 15%">Lab Test</th>
<th id='toptbl' style="width: 25%">Type of Test</th>
<th id='toptbl' style="width: 30%">Sub Test</th>
<th id='toptbl' style="width: 10%">Price</th>
<th id='toptbl' style="width: 15%">Action</th>
</tr>
<?=$dis?>
	</table>
	</div>
	<?php
	include "footer.php";
?>

