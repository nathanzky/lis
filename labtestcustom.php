<b style="color: #f00">Please type NA or 0 under Results and type the result of the tests on the fields below.</br>
Leave the field blank if not included or applicable.</b></br></br>
<?php if($tot =="Semen Analysis") {
?>
<div style="display:inline-block; width: 45%">
<p>
<span class="label">Time Collected: </span><input type='time' placeholder='Time Collected' name='result[]'  value='<?=$specimen_array[0]?>'></input></br></br>
<span class="label">Time Received: </span><input type='time' placeholder='Time Received' name='result[]' value='<?=$specimen_array[1]?>'> </input></br></br>
<span class="label">Time Examined: </span><input type='time' placeholder='Time Examined' name='result[]' value='<?=$specimen_array[2]?>'> </input></br></br>
<span class="label">Volume: </span><input type='text' placeholder= 'Volume' name='result[]' value='<?=$specimen_array[3]?>'> </input></br></br>
<span class="label">Viscousity: </span><input type='text' placeholder= 'Viscousity' name='result[]' value='<?=$specimen_array[4]?>'> </input></br></br>
<span class="label">PH: </span><input type='text' placeholder= 'PH' name='result[]' value='<?=$specimen_array[5]?>'> </input></br></br>
<span class="label">Liquefaction Time: </span><input type='text' placeholder= 'Liquefaction Time' name='result[]' value='<?=$specimen_array[6]?>'> </input></p></br>
<span class="label">Sperm Count: </span><input type='text' placeholder= 'Sperm Count' name='result[]' value='<?=$specimen_array[7]?>'> </input></p></br>
</div>
<div style="display:inline-block; margin-left: 50px;">
<p>
<span class="label2">Motile: </span><input type='text' placeholder='Motile' name='result[]'  value='<?=$specimen_array[8]?>'> </input></br></br>
<span class="label2">Less Motile: </span><input type='text' placeholder='Less Motile' name='result[]' value='<?=$specimen_array[9]?>'> </input></br></br>
<span class="label2">Non Motile: </span><input type='text' placeholder='Non Motile' name='result[]' value='<?=$specimen_array[10]?>'> </input></br></br>
<span class="label2">Normal: </span><input type='text' placeholder= 'Normal' name='result[]' value='<?=$specimen_array[11]?>'> </input></br></br>
<span class="label2">Abnormal: </span><input type='text' placeholder= 'Abnormal' name='result[]' value='<?=$specimen_array[12]?>'> </input></br></br>
<span class="label2">Pus Cells: </span><input type='text' placeholder= 'Pus Cells' name='result[]' value='<?=$specimen_array[13]?>'> </input></br></br>
<span class="label2">RBC: </span><input type='text' placeholder= 'RBC' name='result[]' value='<?=$specimen_array[14]?>'></input></p></br>
</div>
<?php
} ?>
<!-- end of Semen Analysis-->

<?php if($tot =="Dengue Duo") {
?>
<div style="display:inline-block;">
<p>
<span class="label2">NS1 Ag: </span><input type='text' placeholder='NS1 Ag' name='result[]' value='<?=$specimen_array[0]?>'> </input></br></br>
<span class="label2">IgG: </span><input type='text' placeholder='IgG' name='result[]'  value='<?=$specimen_array[1]?>'> </input></br></br>
<span class="label2">IgM: </span><input type='text' placeholder='IgM' name='result[]' value='<?=$specimen_array[2]?>'> </input></br></br>

<p>
<span class="label2">Specimen: </span> <input type='text' name='result[]' placeholder="Optional" value='<?=$specimen_array[3]?>'></input><br/><br/></p>
</div>
<?php
} ?>
<!-- end of Dengue-->

<?php if($tot =="Salmonella Typhi IgG and IgM") {
?>
<div style="display:inline-block;">
<p>
<span class="label2">IgG Antibody: </span><input type='text' placeholder='IgG' name='result[]'  value='<?=$specimen_array[0]?>'> </input></br></br>
<span class="label2">IgM Antibody: </span><input type='text' placeholder='IgM' name='result[]' value='<?=$specimen_array[1]?>'> </input></br></br>
<p>
<span class="label2">Specimen: </span> <input type='text' name='result[]' placeholder="Optional" value='<?=$specimen_array[2]?>'></input><br/><br/></p>
</div>
<?php
} ?>
<!-- end of Salmonella-->
<?php if($tot =="T3, T4 and TSH") {
?>

<div style="display:inline-block;">
<p>
<span class="label2">T3: </span><input type='text' placeholder='T3' name='result[]' <?=$readonly?> value='<?=$specimen_array[0]?>'> </input></br></br>
<span class="label2">T4: </span><input type='text' placeholder='T4' name='result[]' value='<?=$specimen_array[1]?>'> </input></br></br>
<span class="label2">TSH: </span><input type='text' placeholder='TSH' name='result[]' value='<?=$specimen_array[2]?>'> </input></br></br>
<p>
<span class="label2">Specimen: </span> <input type='text' name='result[]' placeholder="Optional" value='<?=$specimen_array[3]?>'></input><br/><br/></p>
</div>
<?php
} ?>
<!-- end of T3, T4, TSH-->

<?php if($tot =="FT3 and FT4") {
?>

<div style="display:inline-block;">
<p>
<span class="label2">FT3: </span><input type='text' placeholder='FT3' name='result[]' <?=$readonly?> value='<?=$specimen_array[0]?>'> </input>
<span class="label2">pmol/L</span>
<span class="label2">Ref. Range:</span>
<span class="label2">3.5 - 6.5</span>
</br></br>
<span class="label2">FT4: </span><input type='text' placeholder='FT4' name='result[]' value='<?=$specimen_array[1]?>'> </input>
<span class="label2">pmol/mL</span>
<span class="label2">Ref. Range:</span>
<span class="label2">9 - 25</span>
</br></br>
<span class="label2">THS: </span><input type='text' placeholder='TSH' name='result[]' value='<?=$specimen_array[2]?>'> </input>
<span class="label2">uIU/mL</span>
<span class="label2">Ref. Range:</span>
<span class="label2">0.25 - 5.0</span>
</br></br>
<p>
<span class="label2">Specimen: </span> <input type='text' name='result[]' placeholder="Optional" value='<?=$specimen_array[3]?>'></input><br/><br/></p>
</div>
<?php
} ?>
<!-- end of T3, T4, TSH-->


<?php if(($tot =="OGTT") && ($typeoftest=="Oral Glucose Tolerance Test (100g)")) {
?>
<div style="display:inline-block; vertical align: top;">
<p>
<span class="label2"></span><span class="label2" style="font-weight:bold;">Result</span><span class="label2" style="font-weight:bold; margin-left:100px;">Target Value</span></br></br>
<span class="label2">Fasting: </span><input type='text' placeholder='fasting' name='result[]' value='<?=$specimen_array[0]?>'> </input><span class="label2" style="margin-left:30px;">5.3 mmol/L</span></br></br>
<span class="label2">1 hr after: </span><input type='text' placeholder='1 hr after glucose load' name='result[]'  value='<?=$specimen_array[1]?>'> </input><span class="label2" style="margin-left:30px;">10.0 mmol/L</span></br></br>
<span class="label2">2 hrs after: </span><input type='text' placeholder='2 hrs after glucose load' name='result[]' value='<?=$specimen_array[2]?>'> </input><span class="label2" style="margin-left:30px;">8.6 mmol/L</span></br></br>
<span class="label2">3 hrs after: </span><input type='text' placeholder='3 hrs after glucose load' name='result[]' value='<?=$specimen_array[3]?>'> </input><span class="label2" style="margin-left:30px;">7.8 mmol/L</span></br></br>
</div>
<p>
<span class="label2">Specimen: </span><input type='text' name='result[]' placeholder="Optional" value='<?=$specimen_array[4]?>'></input><br/><br/></p>
</div>
<?php
} ?>

<?php if(($tot =="OGTT") && ($typeoftest=="Oral Glucose Tolerance Test (75g)")) {
?>
<div style="display:inline-block; vertical-align: top;">
<p>
<span class="label2"></span><span class="label2" style="font-weight:bold;">Result</span><span class="label2" style="font-weight:bold; margin-left:100px;">Target Value</span></br></br>
<span class="label2">Fasting: </span><input type='text' placeholder='fasting' name='result[]' value='<?=$specimen_array[0]?>'></input><span class="label2" style="margin-left:30px;">5.1 mmol/L</span></br></br>
<span class="label2">1 hr after: </span><input type='text' placeholder='1 hr after glucose load' name='result[]'  value='<?=$specimen_array[1]?>'></input><span class="label2" style="margin-left:30px;">10.0 mmol/L</span></br></br>
<span class="label2">2 hrs after: </span><input type='text' placeholder='2 hrs after glucose load' name='result[]' value='<?=$specimen_array[2]?>'></input><span class="label2" style="margin-left:30px;">8.5 mmol/L </span></br></br>
</div>
<p>
<span class="label2">Specimen: </span><input type='text' name='result[]' placeholder="Optional" value='<?=$specimen_array[3]?>'></input><br/><br/></p>
</p>
</div>
<?php
} ?>
<?php if(($tot =="OGTT") && ($typeoftest=="50 g")) {
?>
<div style="display:inline-block; vertical align: top;">
<p>
<span class="label2" style="font-weight:bold;">Result</span></br></br>
<input type='text' placeholder='' name='result[]' value='<?=$specimen_array[0]?>'> </input><span class="label2" style="margin-left:30px;">1.15-7.17 mmol/L</span></br></br>
</div>
<p>
<span class="label2">Specimen: </span><input type='text' name='result[]' placeholder="Optional" value='<?=$specimen_array[1]?>'></input><br/><br/></p>
</p>
</div>
<?php
} ?>
<!-- end of OGTT -->

<?php if($tot =="Fecalysis") {
?>
<div style="display:inline-block; width: 45%; height: 580px;">
<span class="label3" style="font-weight:bold;">PHYSICAL PROPERTIES</span></br></br>
<span class="label2">Color: </span><input id='fecalcolor' type='text' placeholder='Color' name='result[]'  value='<?=$specimen_array[0]?>'> <select id='fecalcolorselect' onchange="changefecalcolor()">
        <option value=''>Select Color</option>
        <option value='brown'>brown</option>
        <option value='light brown'>light brown</option>
        <option value='dark brown'>dark brown</option>
        <option value='chocolate brown'>chocolate brown</option>
        <option value='yellow'>yellow</option>
        <option value='dark yellow'>dark yellow</option>
        <option value='yellowish green'>yellowish green</option>
        <option value='yellowish brown'>yellowish brown</option>
        <option value='gray'>gray</option>
        <option value='black'>black</option>
        <option value='tarry black'>tarry black</option>
        <option value='bloody'>bloody</option>
        </select></br></br>
<span class="label2">Consistency: </span><input id='consistency' type='text' placeholder='Consistency' name='result[]' value='<?=$specimen_array[1]?>'> <select id='conselect' onchange="changeconsistency()">
                <option value=''>Select Color</option>
                <option value='soft'>soft</option>
                <option value='very soft'>very soft</option>
                <option value='formed'>formed</option>
                <option value='well formed'>well formed</option>
                <option value='mushy'>mushy</option>
                <option value='loose'>loose</option>
                <option value='mucoid'>mucoid</option>
                <option value='watery'>watery</option>
                </select></br></br>
<span class="label3" style="font-weight:bold;">CHEMICAL TEST</span></br></br>
<span class="label2">Occult Blood: </span><input id='occult' type='text' placeholder='Occult Blood' name='result[]' value='<?=$specimen_array[2]?>'> <select id='occultselect' onchange="changeoccult()">
				<option value=''>Select Option</option>
                <option value='NEGATIVE'>NEGATIVE</option>
                <option value='POSITIVE'>POSITIVE</option>
                </select>
</br></br><input type='checkbox' class='nonebox2' value='none'> set all values to none</br></br>
<span class="label3" style="font-weight:bold;">MICROSCOPIC FINDINGS</span></br></br>
<span class="label2">Pus Cells: </span><input class='fecalnone' type='text' placeholder= 'Pus Cells' name='result[]' value='<?=$specimen_array[3]?>'> </input></br></br>
<span class="label2">RBC: </span><input class='fecalnone' type='text' placeholder= 'RBC' name='result[]' value='<?=$specimen_array[4]?>'> </input></br></br>
<span class="label2">Fat Globules: </span><input class='fecalnone' type='text' placeholder= 'Fat Globules' name='result[]' value='<?=$specimen_array[5]?>'> </input></br></br>
<span class="label2">Yeast Cells: </span><input class='fecalnone' type='text' placeholder= 'Yeast Cells' name='result[]' value='<?=$specimen_array[6]?>'> </input></br></br>
<span class="label2">Others: </span><input type='text' placeholder= 'Others' name='result[]' value='<?=$specimen_array[7]?>'> </input></br></br>
</div>

<div style="display:inline-block; margin-left: 30px; width: 45%; height: 580px; vertical-align: top;">
<span class="label3" style="font-weight:bold;">PARASITES</span></br></br>
<span class="label">Ascaris Lumbricoides: </span><input class='fecalnone' type='text' placeholder='Ascaris Lumbricoides' name='result[]'  value='<?=$specimen_array[8]?>'> </input></br></br>
<span class="label">T. Trichura: </span><input class='fecalnone' type='text' placeholder='T. Trichura' name='result[]' value='<?=$specimen_array[9]?>'></input></br></br>
<span class="label">Hookworm: </span><input class='fecalnone' type='text' placeholder='Hookworm' name='result[]' value='<?=$specimen_array[10]?>'> </input></br></br>
<span class="label">Others: </span><input class='fecalnone' type='text' placeholder= 'Others' name='result[]' value='<?=$specimen_array[11]?>'> </input></br></br>
<span class="label2" style="font-weight:bold;">AMOEBA</span></br></br>
<span class="label">E. Hystolitica Cyst: </span><input class='fecalnone' type='text' placeholder= 'E. Hystolitica Cyst' name='result[]' value='<?=$specimen_array[12]?>'> </input></br></br>
<span class="label">Trophozoite: </span><input class='fecalnone' type='text' placeholder= 'Trophozoite' name='result[]' value='<?=$specimen_array[13]?>'> </input></br></br>
<span class="label">E. Coli Cyst: </span><input class='fecalnone' type='text' placeholder= 'E. coli Cyst' name='result[]' value='<?=$specimen_array[14]?>'> </input></br></br>
<span class="label">Trophozoite: </span><input class='fecalnone' type='text' placeholder= 'Trophozoite' name='result[]' value='<?=$specimen_array[15]?>'> </input></br></br></br>
<span class="label">Blastocystis hominis: </span><input class='fecalnone' type='text' placeholder= 'Blastocystis hominis' name='result[]' value='<?=$specimen_array[16]?>'> </input></br></br></br>
<input type='text' placeholder= 'Others' name='result[]' value='<?=$specimen_array[17]?>'> </input>
<input type='text' placeholder= 'Result' name='result[]' value='<?=$specimen_array[18]?>'> </input>
</div></br></br></br></br>
<div style="display:inline-block; margin-top: 20px; margin-left: 10px; margin-bottom: 50px; width: 85%; height: 300px; vertical-align:top;">
<span class="label">Specimen Collected at the center: </span><input id='specimencolect' type='text' placeholder='Collected at' name='result[]'  value='<?=$specimen_array[19]?>'>  <select id='specimencolected' onchange="specimenchange()">
<option value=''>Select Option</option>
<option value='YES'>YES</option>
<option value='NO'>NO</option></br>
</div>
<?php
} ?>
<!-- end of Fecalysis-->

<?php if($tot =="Differential Count") {
?>
<div style="display:inline-block; width: 60%; height: 550px;">
<span class="label">Neutrophil: </span><input type='text' placeholder= 'Neutrophil' name='result[]' value='<?=$specimen_array[0]?>'> </input></br></br>
<span class="label">Segmenters: </span><input type='text' placeholder='Segmenters' name='result[]'  value='<?=$specimen_array[1]?>'> </input></br></br>
<span class="label">Stab: </span><input type='text' placeholder='Stab' name='result[]' value='<?=$specimen_array[2]?>'> </input></br></br>
<span class="label">Atypical Lymphocytes: </span><input type='text' placeholder='Atypical Lymphocytes' name='result[]' value='<?=$specimen_array[3]?>'> </input></br></br>
<span class="label">Atypical Monocytes: </span><input type='text' placeholder= 'Atypical Monocytes' name='result[]' value='<?=$specimen_array[4]?>'> </input></br></br>
<span class="label">Juvenile: </span><input type='text' placeholder= 'Juvenile' name='result[]' value='<?=$specimen_array[5]?>'> </input></br></br>
<span class="label">Lymphocytes: </span><input type='text' placeholder= 'Lymphocytes' name='result[]' value='<?=$specimen_array[6]?>'> </input></br></br>
<span class="label">Monocyte: </span><input type='text' placeholder= 'Monocyte' name='result[]' value='<?=$specimen_array[7]?>'> </input></br></br>
<span class="label">Myeloblast: </span><input type='text' placeholder= 'Myeloblast' name='result[]' value='<?=$specimen_array[8]?>'> </input></br></br>
<span class="label">Myelocyte: </span><input type='text' placeholder= 'Myelocyte' name='result[]' value='<?=$specimen_array[9]?>'> </input></br></br>
<p>
<span class="label" style="margin-left:20px;">Specimen: </span><input type='text' name='result[]' placeholder="Optional" value='<?=$specimen_array[10]?>'></input><br/><br/></p>
</div>
<?php
} ?>
<!-- end of Diff Count-->

<?php if($tot =="PROTIME") {
?>
<div style="display:inline-block; width: 60%; height: 300px;">
<span class="label2">Patient: </span><input type='text' placeholder='Patient' name='result[]'  value='<?=$specimen_array[0]?>'> </input></br></br>
<span class="label2">Control: </span><input type='text' placeholder='Control' name='result[]' value='<?=$specimen_array[1]?>'> </input></br></br>
<span class="label2">% Activity: </span><input type='text' placeholder='% Activity' name='result[]' value='<?=$specimen_array[2]?>'> </input></br></br>
<span class="label2">INR: </span><input type='text' placeholder= 'INR' name='result[]' value='<?=$specimen_array[3]?>'> </input></br></br>
<p>
<span class="label2" style="margin-left:20px;">Specimen: </span><input type='text' name='result[]' placeholder="Optional" value='<?=$specimen_array[4]?>'></input><br/><br/></p>
</div>
<?php
} ?>
<!-- end of PROTIME -->
<?php if($tot =="APTT") {
?>
<div style="display:inline-block; width: 60%; height: 300px;">
<span class="label2">Result: </span><input type='text' placeholder='Result' name='result[]'  value='<?=$specimen_array[0]?>'> </input></br></br>
<span class="label2">Control: </span><input type='text' placeholder='Control' name='result[]' value='<?=$specimen_array[1]?>'> </input></br></br>
<p>
<span class="label2" style="margin-left:20px;">Specimen: </span><input type='text' name='result[]' placeholder="Optional" value='<?=$specimen_array[2]?>'></input><br/><br/></p>
</div>
<?php
} ?>
<!-- end of APTT -->


<?php if($tot =="Urinalysis") {
?><div class="urinalysis-results" style="display:block; clear:both">
<div style="display:inline-block; width: 45%; height: 850px; vertical-align: top;">
<span class="label3" style="font-weight:bold;">PHYSICAL PROPERTIES</span></br></br>
<span class="label">Color: </span><input id='urinecolor' type='text' placeholder='Color' name='result[]'  value='<?=$specimen_array[0]?>'>  <select id='selectcolor' onchange="changecolor()">
<option value=''>Select Color</option>
<option value='colorless'>colorless</option>
<option value='yellow'>yellow</option>
<option value='light yellow'>light yellow</option>
<option value='dark yellow'>dark yellow</option>
<option value='bloody'>bloody</option>
<option value='straw'>straw</option>
<option value='dark straw'>dark straw</option>
<option value='light straw'>light straw</option>
<option value='pale straw'>pale straw</option>
<option value='orange'>orange</option>
<option value='dark orange'>dark orange</option>
<option value='amber'>amber</option>
<option value='smokey red'>smokey red</option>
<option value='yellow green'>yellow green</option>
<option value='green'>green</option>
<option value='red'>red</option>
<option value='brown'>brown</option>
<option value='black'>black</option>
</select></br></br>
<span class="label">Transparency: </span><input id='transparency' type='text' placeholder='Transparency' name='result[]' value='<?=$specimen_array[1]?>'> <select id='transpoptions' onchange="transpselect()">
        <option value=''>Select</option>
        <option value='clear'>clear</option>
        <option value='hazy'>hazy</option>
		<option value='bloody'>bloody</option>
        <option value='slightly hazy'>slightly hazy</option>
        <option value='turbid'>turbid</option>
        <option value='cloudy'>cloudy</option>
        <option value='milky'>milky</option>
        </select></br></br>
</br></br>
<span class="label3" style="font-weight:bold;">CHEMICAL TEST</span></br></br>
<span class="label">PH: </span><input id='pH' type='text' placeholder='PH' name='result[]' value='<?=$specimen_array[2]?>'> <select id='pHselect' onchange="pHchange()">
        <option value=''>Select</option>
        <option value='5.0'>5.0</option>
        <option value='5.5'>5.5</option>
        <option value='6.0'>6.0</option>
        <option value='6.5'>6.5</option>
        <option value='7.0'>7.0</option>
        <option value='7.5'>7.5</option>
        <option value='8.0'>8.0</option>
        <option value='8.5'>8.5</option>
        </select></br></br>
<span class="label">Specific Gravity: </span><input id='specificgravity' type='text' placeholder='Specific Gravity' name='result[]' value='<?=$specimen_array[3]?>'> <select id='specgravopts' onchange="specgravchange()">
        <option value=''>Select</option>
        <option value='1.000'>1.000</option>
        <option value='1.005'>1.005</option>
        <option value='1.010'>1.010</option>
        <option value='1.015'>1.015</option>
		<option value='1.020'>1.020</option>
        <option value='1.025'>1.025</option>
        <option value='1.030'>1.030</option>
        </select>
		</br></br>

<span class="label">Protein: </span><input id='prtnid' type='text' placeholder='Protein' name='result[]' value='<?=$specimen_array[4]?>'> <select id='prtnopts' onchange="prtnchange()">
        <option value=''>Select</option>
        <option value='NEGATIVE'>NEGATIVE</option>
        <option value='TRACE'>TRACE</option>
        <option value='POSITIVE (+)'>POSITIVE (+)</option>
        <option value='POSITIVE (2+)'>POSITIVE (2+)</option>
		<option value='POSITIVE (3+)'>POSITIVE (3+)</option>
        <option value='POSITIVE (4+)'>POSITIVE (4+)</option>
        </select>
		</br></br>
<span class="label">Glucose: </span><input id='glcid' type='text' placeholder='Glucose' name='result[]' value='<?=$specimen_array[5]?>'> <select id='glcopts' onchange="glcchange()">
        <option value=''>Select</option>
        <option value='NEGATIVE'>NEGATIVE</option>
        <option value='TRACE'>TRACE</option>
        <option value='POSITIVE (+)'>POSITIVE (+)</option>
        <option value='POSITIVE (2+)'>POSITIVE (2+)</option>
		<option value='POSITIVE (3+)'>POSITIVE (3+)</option>
        <option value='POSITIVE (4+)'>POSITIVE (4+)</option>
        </select>
		</br></br>
<span class="label3" style="font-weight:bold;">MICROSCOPIC FINDINGS</span></br></br>
<span class="label">WBC: </span><input id='wbcid' type='text' placeholder= 'WBC' name='result[]' value='<?=$specimen_array[6]?>'> <select id='wbcopts' onchange="wbcchange()">
        <option value=''>Select</option>
        <option value='0 - 2'>0 - 2</option>
        <option value='2 - 5'>2 - 5</option>
        <option value='5 - 10'>5 - 10</option>
        <option value='10 - 25'>10 - 25</option>
		<option value='25 - 50'>25 - 50</option>
        <option value='50 - 100'>50 - 100</option>
        <option value='> 100'>> 100</option>
        </select>
		</br></br>
<span class="label">RBC: </span><input id='rbcid' type='text' placeholder= 'RBC' name='result[]' value='<?=$specimen_array[7]?>'> <select id='rbcopts' onchange="rbcchange()">
        <option value=''>Select</option>
        <option value='0 - 2'>0 - 2</option>
        <option value='2 - 5'>2 - 5</option>
        <option value='5 - 10'>5 - 10</option>
        <option value='10 - 25'>10 - 25</option>
		<option value='25 - 50'>25 - 50</option>
        <option value='50 - 100'>50 - 100</option>
        <option value='> 100'>> 100</option>
        </select>
		</br></br>
<span class="label3" style="font-weight:bold; margin-left:10px"> RBC Morphology</span></br></br>
<span class="label">Intact: </span><input type='text' placeholder= 'Intact' name='result[]' value='<?=$specimen_array[8]?>'> </input></br></br>
<span class="label">Crenated: </span><input type='text' placeholder= 'Crenated' name='result[]' value='<?=$specimen_array[9]?>'> </input></br></br>
<span class="label">Dysmorphic: </span><input type='text' placeholder= 'Dysmorphic' name='result[]' value='<?=$specimen_array[10]?>'> </input></br></br>
<!--span class="label">Shadow: </span><input type='text' placeholder= 'Shadow' name='result[]' value='<!--?=$specimen_array[11]?>'> </input></br></br-->
<!--span class="label">Swollen: </span><input type='text' placeholder= 'Swollen' name='result[]' value='<!--?=$specimen_array[12]?>'> <!--/input></br></br>
</span-->
</div>
<div style="display:inline-block; margin-left: 30px; width: 45%; height: 850px; vertical-align: top;">
<span class="label" style="font-weight:bold;">CASTS</span><input type='checkbox' class='nonebox' value='none'> set all values to none</br></br>
<span class="label">WBC: </span><input class='cast' type='text' placeholder='WBC' name='result[]'  value='<?=$specimen_array[11]?>'> </input></br></br>
<span class="label">RBC: </span><input class='cast' type='text' placeholder='RBC' name='result[]' value='<?=$specimen_array[12]?>'> </input></br></br>
<span class="label">Waxy: </span><input class='cast' type='text' placeholder='Waxy' name='result[]' value='<?=$specimen_array[13]?>'> </input></br></br>
<!--span class="label">Hyaline: </span><input class='cast' type='text' placeholder= 'Hyaline' name='result[]' value='<!--?=$specimen_array[16]?>'> </input></br></br-->
<span class="label">Coarse: </span><input class='cast' type='text' placeholder= 'Coarse' name='result[]' value='<?=$specimen_array[14]?>'> </input></br></br>
<span class="label">Fine: </span><input class='cast' type='text' placeholder= 'Fine' name='result[]' value='<?=$specimen_array[15]?>'> </input></br></br></br></br>
<span class="label">Squamous Epithelial: </span><input class='cast' type='text' placeholder= 'Squamous Epithelial Cells' name='result[]' value='<?=$specimen_array[16]?>'> </input></br></br>
<span class="label">Transitional Epithelial: </span><input class='cast' type='text' placeholder= 'Transitional Epithelial Cells' name='result[]' value='<?=$specimen_array[17]?>'> </input></br></br>
<span class="label">Renal Epithelial: </span><input class='cast' type='text' placeholder= 'Renal Epithelial Cells' name='result[]' value='<?=$specimen_array[18]?>'> </input></br></br>
<span class="label">Amorphous Deposits: </span><input class='cast' type='text' placeholder= 'Amorphous Deposits' name='result[]' value='<?=$specimen_array[19]?>'> </input></br></br>
<span class="label">Bacteria: </span><input class='cast' type='text' placeholder= 'Bacteria' name='result[]' value='<?=$specimen_array[20]?>'> </input></br></br>
<span class="label">Mucus Threads: </span><input class='cast' type='text' placeholder= 'Mucus Threads' name='result[]' value='<?=$specimen_array[21]?>'> </input></br></br>
<span class="label">Yeast Cells: </span><input class='cast' type='text' placeholder= 'Yeast Cells' name='result[]' value='<?=$specimen_array[22]?>'>  </input></br></br>
<input type='text' placeholder= 'Others: Name' name='result[]' value='<?=$specimen_array[23]?>'>  </input><input type='text' placeholder= 'Result' name='result[]' value='<?=$specimen_array[24]?>'>  </input></br></br>
</div>
<div style="display:inline-block; margin-top: 20px; margin-left: 10px; margin-bottom: 50px; width: 85%; height: 300px; vertical-align:top;">
<span class="label">Specimen Collected at the center: </span><input id='specimencolect' type='text' placeholder='Collected at' name='result[]'  value='<?=$specimen_array[25]?>'>  <select id='specimencolected' onchange="specimenchange()">
<option value=''>Select Option</option>
<option value='YES'>YES</option>
<option value='NO'>NO</option></br>
</div>
</div>
<p>
<?php
} ?>
<!-- end of Urinalysis -->


<?php if($tot =="Hematology") {
?>
<div style="display:inline-block; width: 45%; height: 200px;  vertical-align:top;">
<span class="label">Hemoglobin: </span><input type='text' placeholder='Hemoglobin' name='result[]'  value='<?=$specimen_array[0]?>'> </input></br></br>
<span class="label">Hematocrit: </span><input type='text' placeholder='Hematocrit' name='result[]' value='<?=$specimen_array[1]?>'> </input></br></br>
<span class="label">RBC Count: </span><input type='text' placeholder='Red Blood Cell Count' name='result[]' value='<?=$specimen_array[2]?>'> </input></br></br>
<span class="label">WBC Count: </span><input type='text' placeholder= 'White Blood Cell Count' name='result[]' value='<?=$specimen_array[3]?>'> </input></br></br>
</div>
<div style="display:inline-block; margin-left: 30px; width: 45%; height: 200px; vertical-align:top;">
<span class="label">Platelet Count: </span><input type='text' placeholder= 'Platelet Count' name='result[]' value='<?=$specimen_array[4]?>'> </input></br></br>
<span class="label">Bleeding Time: </span><input type='text' placeholder= 'Bleeding Time' name='result[]' value='<?=$specimen_array[5]?>'> </input></br></br>
<span class="label">Clotting Time: </span><input type='text' placeholder= 'Clotting Time' name='result[]' value='<?=$specimen_array[6]?>'> </input></br></br>
<span class="label">ESR (Westergreen): </span><input type='text' placeholder= 'ESR (Westergreen)' name='result[]' value='<?=$specimen_array[7]?>'></input></br></br>
</div>
<div style="display:inline-block; width: 45%; height: 200px; vertical-align:top; margin-top:20px;">
<span class="label3" style="font-weight:bold;">DIFFERENTIAL COUNT</span></br></br>
<span class="label">Neutrophil: </span></br></br>
<span class="label">Segmenters: </span><input type='text' placeholder= 'Segmenters' name='result[]' value='<?=$specimen_array[8]?>'> </input></br></br>
<span class="label">Stab: </span><input type='text' placeholder= 'Stab' name='result[]' value='<?=$specimen_array[9]?>'> </input></br></br>
</div>
<div style="display:inline-block; margin-top: 45px; margin-left: 30px; width: 45%; height: 200px; vertical-align:top;">
<span class="label">Lymphocytes: </span><input type='text' placeholder= 'Lymphocytes' name='result[]' value='<?=$specimen_array[10]?>'> </input></br></br>
<span class="label">Eosinophils: </span><input type='text' placeholder='Eosinophils' name='result[]'  value='<?=$specimen_array[11]?>'> </input></br></br>
<span class="label">Basophils: </span><input type='text' placeholder='Basophils' name='result[]' value='<?=$specimen_array[12]?>'> </input></br></br>
<span class="label">Monocyte: </span><input type='text' placeholder='Monocyte' name='result[]' value='<?=$specimen_array[13]?>'> </input></br></br>
</div>
<div style="display:inline-block; vertical-align:top;">
<span class="label2" style="font-weight:bold;">OTHERS</span></br></br>
<input type='text' placeholder='Name' name='result[]' value='<?=$specimen_array[14]?>'> </input>
<input type='text' placeholder='Result' name='result[]' value='<?=$specimen_array[15]?>'></input>
<input type='text' placeholder='Units' name='result[]' value='<?=$specimen_array[16]?>'></input>
<input type='text' placeholder='Normal Value' name='result[]' size="30" value='<?=$specimen_array[17]?>'></input></br>
<div style="display:inline-block; margin-top: 20px; margin-left: 10px; margin-bottom: 50px; width: 85%; height: 300px; vertical-align:top;">
<span class="label">Specimen Collected at the center: </span><input id='specimencolect' type='text' placeholder='Collected at' name='result[]'  value='<?=$specimen_array[18]?>'>  <select id='specimencolected' onchange="specimenchange()">
<option value=''>Select Option</option>
<option value='YES'>YES</option>
<option value='NO'>NO</option></br>
</div>
</div>
<?php
} ?>
<!-- end of Hematology-->


<?php if($tot =="Blood Chemistry") {
?>
<div style="display:inline-block; width: 45%; height: 600px;  vertical-align:top;">
<span class="label3" style="font-weight:bold;"></span></br></br>
<span class="label">Glucose (FBS): </span><input type='text' placeholder='Glucose (FBS)' name='result[]'  value='<?=$specimen_array[0]?>'> </input></br></br>
<span class="label">BUN: </span><input type='text' placeholder='BUN' name='result[]' value='<?=$specimen_array[1]?>'> </input></br></br>
<span class="label">Creatinine: </span><input type='text' placeholder='Creatinine' name='result[]' value='<?=$specimen_array[2]?>'></input></br></br>
<span class="label">Uric Acid: </span><input type='text' placeholder= 'Uric Acid' name='result[]' value='<?=$specimen_array[3]?>'> </input></br></br>
<span class="label">Cholesterol: </span><input type='text' placeholder= 'Cholesterol' name='result[]' value='<?=$specimen_array[4]?>'> </input></br></br>
<span class="label">Triglycerides: </span><input type='text' placeholder= 'Triglycerides' name='result[]' value='<?=$specimen_array[5]?>'> </input></br></br>
<span class="label">HDL - C: </span><input type='text' placeholder= 'HDL - C' name='result[]' value='<?=$specimen_array[6]?>'> </input></br></br>
<span class="label">LDL - C: </span><input type='text' placeholder= 'LDL - C' name='result[]' value='<?=$specimen_array[7]?>'> </input></br></br>
</div>

<div style="display:inline-block; margin-left: 30px; width: 45%; height: 560px; vertical-align:top;">
<span class="label3" style="font-weight:bold;"></span></br></br>
<span class="label">SGOT: </span><input type='text' placeholder= 'SGOT' name='result[]' value='<?=$specimen_array[8]?>'> </input></br></br>
<span class="label">SGPT: </span><input type='text' placeholder= 'SGPT' name='result[]' value='<?=$specimen_array[9]?>'> </input></br></br>
<span class="label">Sodium: </span><input type='text' placeholder= 'Sodium' name='result[]' value='<?=$specimen_array[10]?>'> </input></br></br>
<span class="label">Potassium: </span><input type='text' placeholder= 'Potassium' name='result[]' value='<?=$specimen_array[11]?>'> </input></br></br>
<span class="label">Calcium: </span><input type='text' placeholder= 'Calcium' name='result[]' value='<?=$specimen_array[12]?>'> </input></br></br>
<span class="label">Chloride: </span><input type='text' placeholder= 'Chloride' name='result[]' value='<?=$specimen_array[13]?>'> </input></br></br>
<span class="label">2HPPBS: </span><input type='text' placeholder= '2HPPBS' name='result[]' value='<?=$specimen_array[14]?>'> </input></br></br>
</div>
<div style="display:inline-block; vertical-align:left; margin-top:0.001px;">
<span class="label2" style="font-weight:bold;">OTHERS</span></br></br>
<input type='text' placeholder='Test Name' name='result[]' value='<?=$specimen_array[15]?>'> </input>
<input type='text' placeholder='Result' name='result[]' value='<?=$specimen_array[16]?>'></input>
<input type='text' placeholder='Units' name='result[]' value='<?=$specimen_array[17]?>'></input>
<input type='text' placeholder='Normal Value' name='result[]' size="30" value='<?=$specimen_array[18]?>'></input></br></br>
<div style="display:inline-block; margin-top: 20px; margin-left: 10px; margin-bottom: 50px; width: 85%; height: 300px; vertical-align:top;">
<span class="label">Specimen Collected at the center: </span><input id='specimencolect' type='text' placeholder='Collected at' name='result[]'  value='<?=$specimen_array[19]?>'>  <select id='specimencolected' onchange="specimenchange()">
<option value=''>Select Option</option>
<option value='YES'>YES</option>
<option value='NO'>NO</option></br>
</div>
</div>

<?php
} ?>
<!-- end of Blood Chem-->

<?php if($tot =="Electrolytes") {
?>
<div style="display:inline-block; width: 60%; height: 300px;">
<span class="label2">Sodium: </span><input type='text' placeholder='Sodium' name='result[]'  value='<?=$specimen_array[0]?>'> </input></br></br>
<span class="label2">Potassium: </span><input type='text' placeholder='Potassium' name='result[]' value='<?=$specimen_array[1]?>'> </input></br></br>
<span class="label2">Chloride: </span><input type='text' placeholder='Chloride' name='result[]' value='<?=$specimen_array[2]?>'> </input></br></br>
<span class="label2">ICalcium: </span><input type='text' placeholder= 'ICalcium' name='result[]' value='<?=$specimen_array[3]?>'> </input></br></br>
<span class="label2">Total Calcium: </span><input type='text' placeholder= 'Total Calcium' name='result[]' value='<?=$specimen_array[4]?>'> </input></br></br>
<p>
<span class="label2" style="margin-left:20px;">Specimen: </span><input type='text' name='result[]' placeholder="Optional" value='<?=$specimen_array[5]?>'></input><br/><br/></p>
</div>
<?php
} ?>
<!-- end of Electrolytes -->
<script>
function specimenchange() {
    var x = document.getElementById("specimencolected").value;
    document.getElementById("specimencolect").value = x;
}

function changecolor() {
    var x = document.getElementById("selectcolor").value;
    document.getElementById("urinecolor").value = x;
}

function transpselect() {
    var x = document.getElementById("transpoptions").value;
    document.getElementById("transparency").value = x;
}


function specgravchange() {
    var x = document.getElementById("specgravopts").value;
    document.getElementById("specificgravity").value = x;
}
function prtnchange() {
    var x = document.getElementById("prtnopts").value;
    document.getElementById("prtnid").value = x;
}
function glcchange() {
    var x = document.getElementById("glcopts").value;
    document.getElementById("glcid").value = x;
}
function rbcchange() {
    var x = document.getElementById("rbcopts").value;
    document.getElementById("rbcid").value = x;
}
function wbcchange() {
    var x = document.getElementById("wbcopts").value;
    document.getElementById("wbcid").value = x;
}
function pHchange() {
        var x = document.getElementById("pHselect").value;
        document.getElementById("pH").value = x;
    }

function changefecalcolor() {
    var x = document.getElementById("fecalcolorselect").value;
    document.getElementById("fecalcolor").value = x;
}
function changeconsistency() {
    var x = document.getElementById("conselect").value;
    document.getElementById("consistency").value = x;
}
function changeoccult() {
    var x = document.getElementById("occultselect").value;
    document.getElementById("occult").value = x;
}
$('input.nonebox').on('change', function(){
    if ( $(this).is(':checked') ) {
      $("input.cast").val($(this).val());
    }
    else{ $("input.cast").val(""); }
 });

 $('input.nonebox2').on('change', function(){
    if ( $(this).is(':checked') ) {
      $("input.fecalnone").val($(this).val());
    }
    else{ $("input.fecalnone").val(""); }
 });

</script>
