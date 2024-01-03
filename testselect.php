<?php
$con="true";
include "connect.php";
$bcap = "Save";
$priv = $privy[testselect];
include "log.php";
$patientid = $_GET[id];
$name = $_GET[f];
setcookie("saved", "not", 0, "/"); 


$sql = "select * from labtest order by test, typeoftest, subtype";
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
	
	$listoftest.= "<tr>
		  <td>
		  <input type='checkbox' name = 'testid[]' value='$datas[labid]-$datas[test]-$datas[typeoftest]-$datas[subtype]-$datas[price]-$datas[test]' onClick = \"totalIt();\">
		  </td>
		  <td>$datas[typeoftest]";
		$sub=trim(strip_tags($datas[subtype]));
		
		 if($sub != "N/A" && $sub != "NA" && $sub != "") $listoftest .= " - $datas[subtype]";
		 
		 $listoftest .= "</td><td>" .number_format("$datas[price]",2,".",",") ."</td></tr>";
	$subtest = $datas[test];
	  
	}
   
	$subtabs .= "<div id=\"$subtest\" class=\"tabcontent\">
  <h3>$subtest</h3><table style=\"border-collapse: collapse;width:90%;\">
  $listoftest
  </table>
  </div>";	
  
  //$fullname = utf8_decode($name);
	
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
	height:600px;
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
  document.getElementById("ltest").value = newarr.toString();
  //thedis =  document.getElementById("dis").value * total.toFixed(2) + parseFloat(document.getElementById("od").value);
  //document.getElementById("disa").value=thedis.toFixed(2) ;
  
//document.getElementById("total").value =  total.toFixed(2) - (parseFloat(document.getElementById("dis").value) * total.toFixed(2));
	//document.getElementById("total").value =  total.toFixed(2) - thedis;
	document.getElementById("total").value =  total;
 
}
<!-- start hide content from old browsers
   function Fsubmit(form)
   {
   }
function Preview(page, form)
   {   
   form.setAttribute("target", "popup");
   OpenWin = this.open(page,"popup");
  // OpenWin = this.open(page,"popup","scrollbars=1,top=50,left=100,width=560,height=450");
   }
// end hide content from old browsers -->

</script>

	<h2>Test to conduct for this patient</h2>
	Please select all applied <b>lab test</b> for this patient. All fields with * are required...<br /><br />
	<b>Patient No. : <u><?=$patientid?></u></b> <br />
	<b>Patient Name : <u><?=$name?></u></b>
	<br />
	<br />
	<form method='post' id='form' action='previewrequest.php' target="popup">
	<input type='hidden' name='patientid' value='<?=$patientid?>'>
	<?php
	
	/* note para sa programmer kailangan mag create ng config file kung para sa mga static variables like medtech at pathologist at iba pang mahalagang values na fix na for specific establishment.
	
	*/

	$medtec = explode("~",$config[5]);
	
	foreach($medtec as $n)
		{
		  $mtec .= "<option value='$n'>$n</option>";
		}

	?>
	Requesting Physician:
	<p><input type="text" name='rp' placeholder='Requesting Physician' required size='30'> *</p>
	Date Requested:
	<p><input type="date" name="dor" min="2016-01-12" placeholder="mm/dd/yyyy" required> </input>*</p>
	Date Received:
	<br />
	<p><input type="date" name="dr" min="2016-01-12" placeholder="mm/dd/yyyy" required> </input>*</p>
	Chief Complaint
	<br />
	<p><input type="text" name="cc" placeholder="Chief Complaint" > </input></p>
	<br />
	<p>
	<b>Patient is : </b> 
	<input type='radio' name='inout' value="Confined"> Confined  or <input type='radio' name='inout' value="Out Patient" checked="checked"> Out Patient
	<br />
	</p>
	
	
	<ul class="tab">
  <?=$maintest?>
    </ul>
<?=$subtabs?>
</br>
<input type='hidden' name='test' value='<?=$test?>'>

	
	<!-- <input type="text" name="discount" id='dis' placeholder="Total Discount" value="0" onChange="totalIt();"> 
	 <input type='radio' name='t' value = 'exact' checked="checked"> Exact Ammount <b>OR</b> 
	<input type='radio' name='t' value='percent'> Percent -->
	
	<br>
	</p>
	<p>
	<b>Total Amount</b><br />
	<input type='text' name='total' id='total' value='0' >
	<br />
	</p>
	<input type='text' name='ltest' id='ltest' size='80' value='<?=$test?>'>
		<p>
<!--	Amount Paid<br />
	<input type='text' name='paid' id='paid' value='0'>
-->	
	<br />
	</p>
	
	
	
	<br><br>
	<input type='submit' name='submit' value='Preview' onclick="Preview(this.form);">
	<input type='submit' name='submit' value='Save' onclick="Fsubmit(this.form);">
	</form>
<p>
<form action="searchpatient.php">
<input type='submit' name='submit' value='Back'>
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