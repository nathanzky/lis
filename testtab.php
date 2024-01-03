<?php
include "connect.php";

$sql = "select * from labtest order by test";
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
		
		$listoftest.= "<tr><td><input type='checkbox' name = 'testid[]' value='$datas[id]-$datas[test]-$datas[typeoftest]-$datas[subtype]-$datas[price]-$datas[test]' onClick = \"totalIt();\"></td><td>$datas[typeoftest]";
		$sub=trim(strip_tags($datas[subtype]));
		
		 if($sub != "N/A" && $sub != "NA" && $sub != "") $listoftest .= " - $datas[subtype]";
		 $listoftest .= "</td><td>" .number_format("$datas[price]",2,",",".") ."</td></tr>";
		 
	
	if($subtest != $datas[test] && $subtest != "")
	{
 $subtabs .= "<div id=\"$subtest\" class=\"tabcontent\"><table style=\"border-collapse: collapse;width:90%;\">
  <h3>$subtest</h3>
  $listoftest
  </table>
  </div>";	
  $listoftest="";
	}
	//$lastest = $subtest;
	$subtest = $datas[test];
	}
   
	$subtabs .= "<div id=\"$subtest\" class=\"tabcontent\">
  <h3>$subtest</h3>
  $listoftest
  </div>";	
	

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
	height:300px;
	overflow: scroll;
}

.topright {
 float: right;
 cursor: pointer;
 font-size: 20px;
}

.topright:hover {color: red;}
</style>
<p>You can select multiple test here...</p>

<ul class="tab">
  <?=$maintest?>
</ul>
<?=$subtabs?>


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