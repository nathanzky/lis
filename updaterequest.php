<?php
$con="true";
include "connect.php";
$priv = $privy[updaterequest];
include "log.php";
setcookie("save", "not", 0, "/"); 

if($_GET[c]=="yes" && $_GET[si] != "" && $_COOKIE[legit]=="yes") 
	{
		//dele all records from test and sales table
		$links->query("Delete from test where salesid='$_GET[si]'") or die($links->error);
		$links->query("Delete from sales where id='$_GET[si]'") or die($links->error);
		setcookie("legit", "NO", time() + (86400), "/"); 
		echo "<script>
		alert('Record is successfully deleted....');
		document.location.href = 'pending.php';
		</script>";
		exit;
	}
	
$patientid = $_REQUEST[pi];
$test = $_REQUEST[test];
$pn = $_REQUEST[pn];
$si=$_REQUEST[si];
$dname=$_REQUEST[disc];
$dp=$_REQUEST[dp];
$gross=$_REQUEST[gross];
$topay=$_REQUEST[tp];
$paid=$_REQUEST[pd];
//Get all test to conduct...
setcookie("pi", "", time() + (10), "/"); 
setcookie("ct", "", time() + (10), "/"); 
//tignan kung pwedeng dito i direct ang delete...

$sq = "SELECT * FROM test FORCE INDEX(salesid) where salesid='$si'";
$re = $links->query($sq) or die($links->error);
$i=0;
while($row=$re->fetch_assoc()) 
	{
		$list[$row[labtestid]] = $row[labtestid];
		if($i==0) 
			{
				$rt = $row[requestingphysician];
				$mt = $row[medtech];
				$pt = $row[pathologist];
				$dr = $row[datereceived];
				$dod = $row[dateordered];
			}
		 $i++;
	}

	
/*$mgatest = explode(",",$test);
foreach ($mgatest as $tst) 
	{
		$tsl .= "'$tst',";
	}
	$tsl = rtrim($tsl,",");
*/

$sql = "select * from labtest order by test,typeoftest,subtype";
$rec = $links->query($sql) or die($link->error);
$testname="";
$subtest = "";

while ($datas=$rec->fetch_assoc())
	{
		if($testname != $datas[test])
		{
			$maintest .= "<li><a href=\"javascript:void(0)\" class=\"tablinks\" onclick=\"openCity(event, '$datas[test]')\" id=\"defaultOpen\">$datas[test]</a></li>" ;
			$testname=$datas[test];
		}

	if($subtest != $datas[test] && $subtest != "")
	{
 
 $subtabs .= "<div id=\"$subtest\" class=\"tabcontent\"><h3>$subtest</h3><table style=\"border-collapse: collapse;width:90%;\">
  $listoftest
  </table>
  </div>";	
  $listoftest="";
	}
	
	$sti = array_search($datas[labid],$list);
	if($sti==$datas[labid])
	{
	$listoftest.= "<tr>
		  <td>
		  <input type='checkbox' checked name = 'testid[]' value='$datas[labid]-$datas[test]-$datas[typeoftest]-$datas[subtype]-$datas[price]-$datas[test]' onClick = \"totalIt();\">
		  </td>
		  <td>$datas[typeoftest]";
		$sub=trim(strip_tags($datas[subtype]));
	}	
	else {
		$listoftest.= "<tr>
		  <td>
		  <input type='checkbox' name = 'testid[]' value='$datas[labid]-$datas[test]-$datas[typeoftest]-$datas[subtype]-$datas[price]-$datas[test]' onClick = \"totalIt();\">
		  </td>
		  <td>$datas[typeoftest]";
		$sub=trim(strip_tags($datas[subtype]));
	}
		 if($sub != "N/A" && $sub != "NA" && $sub != "") $listoftest .= " - $datas[subtype]";
		 
		 $listoftest .= "</td><td>" .number_format("$datas[price]",2,".",",") ."</td></tr>";
	$subtest = $datas[test];
	  
	}
   
	$subtabs .= "<div id=\"$subtest\" class=\"tabcontent\">
  <h3>$subtest</h3><table style=\"border-collapse: collapse;width:90%;\">
  $listoftest
  </table>
  </div>";	
  

	
	
	//$topay -= $_GET[d];
	//$paid = $topay - $_GET[bal];
	include "header.php";
	?>

<style>
table, td 
	{
		border: 1px solid black;
		padding:5px;
	}
ul.tab {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    border: 2px solid #ccc;
    background-color: #f1f1f1;
}

/* Float the list items side by side */
ul.tab li {float: left;}

/* Style the links inside the list items */
ul.tab li a {
    display: inline-block;
    color: black;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    transition: 0.3s;
    font-size: 17px;
}

/* Change background color of links on hover */
ul.tab li a:hover {
    background-color: #ddd;
}

/* Create an active/current tablink class */
ul.tab li a:focus, .active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
	height:100%;
	overflow: scroll;
}

.topright {
 float: right;
 cursor: pointer;
 font-size: 20px;
}

.topright:hover {color: red;}
</style>

<script>
function edup(arr) {
  var i,
      len=arr.length,
      out=[],
      obj={};

  for (i=0;i<len;i++) {
    obj[arr[i]]=0;
  }
  for (i in obj) {
    out.push(i);
  }
  return out;
}
	

function totalIt() {
  var input = document.getElementsByName("testid[]");
  var total = 0;
 var indx = 0;
 var labtest = new Array();
  for (var i = 0; i < input.length; i++) {
    if (input[i].checked) {
	  var str = input[i].value;
      var res = str.split("-");
      total += parseFloat(res[4]);
	  labtest[indx] = res[5];
	  indx++;
    }
	
  }
  var newarr = edup(labtest);
 
  document.getElementById("gross").value = total.toFixed(2);
  document.getElementById("ltest").value = newarr.toString();
  thedis =  document.getElementById("disa").value + parseFloat(document.getElementById("od").value);
  //document.getElementById("disa").value=thedis.toFixed(2);
  
//document.getElementById("total").value =  total.toFixed(2) - (parseFloat(document.getElementById("dis").value) * total.toFixed(2));
  document.getElementById("topay").value =  total.toFixed(2); - thedis.toFixed(2);
  //document.getElementById("paid").value =  total.toFixed(2) - thedis;
  document.getElementById("balance").value =  document.getElementById("gross").value - document.getElementById("paid").value;
}


<!-- start hide content from old browsers
function Fsubmit(form)
   {
   form.removeAttribute('target');
   }
function Preview(page, form)
   {   
   form.setAttribute("target", "popup");
   OpenWin = this.open(page,"popup");
  // OpenWin = this.open(page,"popup","scrollbars=1,top=50,left=100,width=560,height=450");
   }
// end hide content from old browsers -->


</script>

<?php
	$medtec = explode("~",$config[5]);
	
	foreach($medtec as $n)
		{
			if($mt==$n){ 
				$mtec .= "<option value='$n' selected>$n</option>";
			}else{
		  $mtec .= "<option value='$n'>$n</option>";
			}
		}
	?>	
		
	<h2>Update Patient Lab Test Request</h2>
	<p>
	Please select all applied <b>lab test</b> for this patient. All fields with * are required...
	</p>
	<br />
	<form method='post' action='viewupdaterequest.php'>
	<b>Patient Id :</b> <?=$patientid?><br />
	<b>Patient Name :</b> <?=$pn?><br />
     <b>Test For : </b> <?=$test?>	<br /> </br>
	<input type='hidden' name='patientid' value='<?=$patientid?>'>
	<input type='hidden' name='test' value='<?=$test?>'>
	<input type ='hidden' name='si' value='<?=$si?>'>
	<input type='hidden' name='pn' value='<?=$pn?>'>
	<p>Requesting Physician</br>
	<input type="text" name='rp' placeholder='Requesting Physician' value = "<?=$rt?>" required size='30'> * </p>
	Request Date
	<br />
	<p><input type="date" name="dor" min="2016-01-12" value = '<?=$dod?>' placeholder="Date Requested" required> *</p>
		Date Received
	<br />
	<p><input type="date" name="dr" min="2016-01-12" value=<?=$dr?> placeholder="Date Received" required> *</p>
	Chief Complaint
	<br />
	<p><input type="text" name="cc" placeholder="Chief Complaint" > </input></p>
	
	
	<h3>Select Laboratory Test</h3>
	
		<ul class="tab">
  <?=$maintest?>
    </ul>
<?=$subtabs?>

	<?php 
	/*
	<p>
	Discount
	<br />
	<input type="text" name="dis" id ='dis' value='<?=$_GET[d]?>' placeholder="Discount" onChange = "totalIt();"> </p>
	
	
	<p>
	*/
	?>
<!-- Add Discount dropdown -->
</br>
	<p>
	<input type='hidden' name='discpercent' id='discpercent' value='<?=$dp?>' readonly>
	<input type='hidden' name='discountname' id='discountname' value='<?=$dname?>' readonly onchange='change_attrib()'>

	
	<p>
<script>
$('#dis').change(function () {
var value=$(this).find('option:selected').attr('value');
var someOtherValue=$(this).find('option:selected').attr('data-name');
$('#discountname').val(someOtherValue);
$('#discpercent').val(value);
});
</script>
	</p>
	<p>
	<b>Total Amount</b><br />
	<input type='text' name='gross' id='gross' value='<?=number_format($gross,2)?>' min="1" readonly onChange="totalIt();">
	<p>
	<input type='hidden' name='od' id='od' value='<?=$_GET[od]?>'  onChange="totalIt();">
	<input type='hidden' name='discount' id='disa' value='<?=$_GET[d]?>' readonly onChange="totalIt();">
	<input type='hidden' name='topay' id='topay' value='<?=$topay?>' readonly onChange="totalIt();">
	<br />
	</p>
<!--	Amount Paid<br /> -->
	<input type='hidden' name='paid' id='paid' value='<?=$paid?>' onChange = "totalIt();">
<!--	Balance<br /> -->
	<input type='hidden' name='balance' id='balance' value='<?=$_GET[bal]?>'  readonly="readonly">
	<input type='text' name='ltest' id='ltest' size='100' value='<?=$test?>'>
	
	<br><br>
	<input type='submit' name='submit' value='Preview'onclick="Preview('', this.form);">
	<input type='submit' name='submit' value='Save!' onclick="Fsubmit(this.form);">
	<input type='submit' name='submit' value='Delete Record!' onclick="Fsubmit(this.form);">
	</form>
	<p>
	<form action="pending.php">
	<input type='submit' name='submit' value='Cancel'>
	</form>
	</p>
	
		<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
<?php
include "footer.php";
?>