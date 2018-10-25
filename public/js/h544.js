window.onload = myAlert;
function myAlert(){
	var inp = document.getElementsByTagName('input');
	for (var i = inp.length-1; i>=0; i--) {
		if ('radio'===inp[i].type || 'checkbox'===inp[i].type) inp[i].checked = false;
	}
	selectOption(govHospital, '');
	selectOption(pvtHospital, '');
	selectOption(diseaseGroupA, '');
	selectOption(diseaseGroupB, '');
	selectOption(resGSDivName, '');
    selectOption(resGSDiv, '');
    selectOption(resMOHArea, '');
    resMOHArea.options.length = 1;
    selectOption(resPHIRange, '');
    resPHIRange.options.length = 1;
    selectOption(curGSDivName, '');
    selectOption(curGSDiv, '');
    selectOption(curMOHArea, '');
    curMOHArea.options.length = 1;
    selectOption(curPHIRange, '');
    curPHIRange.options.length = 1;

    document.getElementById("birthYear").value='';
    document.getElementById("age").value=0;
}
$(function(){
	onsetDate.max = new Date().toISOString().split("T")[0];
	admissionDate.max = new Date().toISOString().split("T")[0];
	$today = new Date();
	$yesterday = new Date(($today.setDate($today.getDate()-1)));
	birthDate.max = $yesterday.toISOString().split("T")[0];
});
function checkInstitute(radioid){
    if(radioid == 1){    
        document.getElementById('govHospitalDiv').style.display = '';        
        document.getElementById('pvtHospitalDiv').style.display = 'none';
        document.getElementById('govHospital').required = true;
        document.getElementById('pvtHospital').required = false;
    }
    else if(radioid == 2){  
        document.getElementById('pvtHospitalDiv').style.display = '';
        document.getElementById('govHospitalDiv').style.display = 'none';
        document.getElementById('pvtHospital').required = true;
        document.getElementById('govHospital').required = false;
    }   
}
function checkDisease(radioid){
    if(radioid == 1){    
        document.getElementById('diseaseGroupADiv').style.display = '';
        document.getElementById('diseaseGroupBDiv').style.display = 'none';
        document.getElementById('diseaseGroupA').required = true;
        document.getElementById('diseaseGroupB').required = false;
    }
    else if(radioid == 2){  
        document.getElementById('diseaseGroupBDiv').style.display = '';
        document.getElementById('diseaseGroupADiv').style.display = 'none';
        document.getElementById('diseaseGroupB').required = true;
        document.getElementById('diseaseGroupA').required = false;
    }   
}
function setMinAdmissionDate() {
	var dateOnset = new Date(document.getElementById('onsetDate').value);
	document.getElementById('admissionDate').value = "";
	admissionDate.min = dateOnset.toISOString().split("T")[0];
}
function checkDOB(){
	document.getElementById('nextOfKin').style.display = 'none';
	document.getElementById('childGuardian').style.display = 'none';
	document.getElementById('childGuardianName').style.display = 'none';
    if(document.getElementById("yearOnly").checked){    
        document.getElementById('yearOfBirth').style.display = '';
        document.getElementById('dateOfBirth').style.display = 'none';
        document.getElementById("birthDate").value="";
        document.getElementById("age").value=0;
        document.getElementById('dateOfBirth').style.display = false;
        document.getElementById('birthDate').required = false;
        document.getElementById('yearOfBirth').required = true;
    }
    else {  
        document.getElementById('dateOfBirth').style.display = '';
        document.getElementById('yearOfBirth').style.display = 'none';
        document.getElementById("birthYear").value="";
        document.getElementById("age").value=0;
        document.getElementById('dateOfBirth').style.display = true;
        document.getElementById('birthDate').required = true;
        document.getElementById('yearOfBirth').required = false;
    }   
}
function getAge() {
    var birthDate = new Date(document.getElementById("birthDate").value);
    var birthYear2 = document.getElementById("birthYear").value;
    var year = (new Date()).getFullYear();
	var age = 0;

	if (document.getElementById("yearOnly").checked){
		if(birthYear2>year || birthYear2<=0 || birthYear2 == "") {
	        document.getElementById("birthYear").value='';
	        age = 0;
	    } else age = year - birthYear2;		
	}
	else{
		if (birthDate == "" || birthDate == 0) age = 0;
		else age = year - birthDate.getFullYear();
	}
	document.getElementById("age").value=age;
	if (age<18){		
		document.getElementById('childGuardian').style.display = '';
		document.getElementById('childGuardianName').style.display = '';
		document.getElementById('nextOfKin').style.display = 'none';
		document.getElementById('mother').required = true;
		document.getElementById('father').required = true;
		document.getElementById('guardian').required = true;
		document.getElementById('childGuardianFirstName').required = true;
		document.getElementById('childGuardianLastName').required = true;
		document.getElementById('nextOfKinFirstName').required = false;
		document.getElementById('nextOfKinLastName').required = false;
    }
    else{
		document.getElementById('nextOfKin').style.display = '';
		document.getElementById('childGuardian').style.display = 'none';
		document.getElementById('childGuardianName').style.display = 'none';
		document.getElementById('nextOfKinFirstName').required = true;
		document.getElementById('nextOfKinLastName').required = true;
		document.getElementById('mother').required = false;
		document.getElementById('father').required = false;
		document.getElementById('guardian').required = false;
		document.getElementById('childGuardianFirstName').required = false;
		document.getElementById('childGuardianLastName').required = false;
	}
}
function checkTest(radioid){
	if(radioid == 1){    
		document.getElementById('labTest').style.display = '';
		document.getElementById('ns1').required = true;
    }
    else if(radioid == 2){  
        document.getElementById('labTest').style.display = 'none';
        document.getElementById("ns1").checked = false;
        document.getElementById("igm").checked = false;
        document.getElementById("igg").checked = false;
        document.getElementById('ns1').required = false;
    }   
}
function testRequired() {
	if(document.getElementById("ns1").checked || document.getElementById("igm").checked || document.getElementById("igg").checked){
    	document.getElementById('ns1').required = false;
    }else{
    	document.getElementById('ns1').required = true;
    }
}
function configure1(id1,id2,id3,id4,id5,id6) {
	switch (id1.value) {
		case 'Nadankulam':selectOption(id2, 'J/61');break;
		case 'Colompuththurai East':selectOption(id2, 'J/62');break;
		case 'Colompuththurai West':selectOption(id2, 'J/63');break;
		case 'Passaiyoor East':selectOption(id2, 'J/64');break;
		case 'Passaiyoor West':selectOption(id2, 'J/65');break;
		case 'Eachchamodai':selectOption(id2, 'J/66');break;
		case 'Thirunagar':selectOption(id2, 'J/67');break;
		case 'Reclamation East':selectOption(id2, 'J/68');break;
		case 'Reclamation West':selectOption(id2, 'J/69');break;
		case 'Gurunagar East':selectOption(id2, 'J/70');break;
		case 'Gurunagar West':selectOption(id2, 'J/71');break;
		case 'Small bazaar':selectOption(id2, 'J/72');break;
		case 'Jaffna town West':selectOption(id2, 'J/73');break;
		case 'Jaffna town East':selectOption(id2, 'J/74');break;
		case 'Chundukuli South':selectOption(id2, 'J/75');break;
		case 'Chundukuli North':selectOption(id2, 'J/76');break;
		case 'Maruthady':selectOption(id2, 'J/77');break;
		case 'Athiyady':selectOption(id2, 'J/78');break;
		case 'Sirampaiyady':selectOption(id2, 'J/79');break;
		case 'Grand Bazaar':selectOption(id2, 'J/80');break;
		case 'Fort':selectOption(id2, 'J/81');break;
		case 'Vannarpannai':selectOption(id2, 'J/82');break;
		case 'Kodday':selectOption(id2, 'J/83');break;
		case 'Navanthurai South':selectOption(id2, 'J/84');break;
		case 'Navanthurai North':selectOption(id2, 'J/85');break;
		case 'Moor Street South':selectOption(id2, 'J/86');break;
		case 'Moor Street North':selectOption(id2, 'J/87');break;
		case 'New Moor Street':selectOption(id2, 'J/88');break;
		case 'Ariyalai North West':selectOption(id2, 'J/91');break;
		case 'Ariyalai Center West':selectOption(id2, 'J/92');break;
		case 'Ariyalai South West':selectOption(id2, 'J/93');break;
		case 'Ariyalai Center North':selectOption(id2, 'J/94');break;
		case 'Ariyalai Center':selectOption(id2, 'J/95');break;
		case 'Ariyalai Center South':selectOption(id2, 'J/96');break;
		case 'Iyanar kovilady':selectOption(id2, 'J/97');break;
		case 'Vannarpannai North':selectOption(id2, 'J/98');break;
		case 'Vannarpannai N.W':selectOption(id2, 'J/99');break;
		case 'Vannarpannai N.E':selectOption(id2, 'J/100');break;
		case 'Neeraviyady':selectOption(id2, 'J/101');break;
		case 'Kandarmadam N.W':selectOption(id2, 'J/102');break;
		case 'Kandarmadam N.E':selectOption(id2, 'J/103');break;
		case 'Kandarmadam S.W':selectOption(id2, 'J/104');break;
		case 'Kandarmadam S.E':selectOption(id2, 'J/105');break;
		case 'Nallur North':selectOption(id2, 'J/106');break;
		case 'Nallur Rajathany':selectOption(id2, 'J/107');break;
		case 'Nallur South':selectOption(id2, 'J/108');break;
		case 'Sangiliyan thoppu':selectOption(id2, 'J/109');break;
		case 'Vellankulam':selectOption(id2, 'MN/1');break;
		case 'Thevanpiddy':selectOption(id2, 'MN/2');break;
		case 'Paliaru':selectOption(id2, 'MN/3');break;
		case 'Illupaikadavai':selectOption(id2, 'MN/4');break;
		case 'Anthoniyarpuram':selectOption(id2, 'MN/5');break;
		case 'Madhu':selectOption(id2, 'MN/37');break;
		case 'Periyapandivirichchan West':selectOption(id2, 'MN/38');break;
		case 'Periyapandivirichchan East':selectOption(id2, 'MN/39');break;
		case 'Palampiddy':selectOption(id2, 'MN/40');break;
		case 'Keerisuddan':selectOption(id2, 'MN/41');break;
		default:selectOption(id2, '');break;
	} 		
	switch (id1.value) {
		case 'Nadankulam':case 'Colompuththurai East':case 'Colompuththurai West':case 'Passaiyoor East':case 'Passaiyoor West':case 'Eachchamodai':case 'Thirunagar':case 'Reclamation East':case 'Reclamation West':case 'Gurunagar East':case 'Gurunagar West':case 'Small bazaar':case 'Jaffna town West':case 'Jaffna town East':case 'Chundukuli South':case 'Chundukuli North':case 'Maruthady':case 'Athiyady':case 'Sirampaiyady':case 'Grand Bazaar':case 'Fort':case 'Vannarpannai':case 'Kodday':case 'Navanthurai South':case 'Navanthurai North':case 'Moor Street South':case 'Moor Street North':case 'New Moor Street':
		id3.value='Jaffna'; break;
		case 'Ariyalai North West':case 'Ariyalai Center West':case 'Ariyalai South West':case 'Ariyalai Center North':case 'Ariyalai Center':case 'Ariyalai Center South':case 'Iyanar kovilady':case 'Vannarpannai North':case 'Vannarpannai N.W':case 'Vannarpannai N.E':case 'Neeraviyady':case 'Kandarmadam N.W':case 'Kandarmadam N.E':case 'Kandarmadam S.W':case 'Kandarmadam S.E':case 'Nallur North':case 'Nallur Rajathany':case 'Nallur South':case 'Sangiliyan thoppu':
		id3.value='Nallur'; break;
		case 'Vellankulam':case 'Thevanpiddy':case 'Paliaru':case 'Illupaikadavai':case 'Anthoniyarpuram':
		id3.value='Manthai West'; break;
		case 'Madhu':case 'Periyapandivirichchan West':case 'Periyapandivirichchan East':case 'Palampiddy':case 'Keerisuddan':
		id3.value='Madhu'; break;
		default: id3.value=''; break;
	}
	switch (id3.value) {
		case 'Jaffna':case 'Nallur': id4.value='Jaffna'; break;
		case 'Manthai West':case 'Madhu': id4.value='Mannar'; break;
		default: id4.value=''; break;
	}
	switch (id4.value) {
		case 'Jaffna':case 'Kilinochchi':case 'Mannar':case 'Mullaitivu':case 'Vavuniya': id5.value='Northern'; break;
		default: id5.value=''; break;
	}
	var JaffnaMOH = ['Select a MOH Area','Chankanai','Chavakachcheri','Jaffna','Karaveddy','Kayts','Kopay','Nallur','Point Pedro','Sandilipay','Tellippalai','Uduvil'];
	var MannarMOH = ['Select a MOH Area','Mannar','Murunkan','Musali','Adampan','Madhu'];
	switch (id4.value) {
		case 'Jaffna':
			id6.options.length = 0;
			for (i = 0; i < JaffnaMOH.length; i++) {
				createOptionMohPhi(id6, JaffnaMOH[i], JaffnaMOH[i]);
			}
			break;
		case 'Mannar':
			id6.options.length = 0;
			for (i = 0; i < MannarMOH.length; i++) {
				createOptionMohPhi(id6, MannarMOH[i], MannarMOH[i]);
			}
			break;
		default: 
			id6.options.length = 0; 
			break;
	}
	document.getElementById('resMOHArea').options[0].disabled = true;
	document.getElementById('curMOHArea').options[0].disabled = true;
}
function configure2(id1,id2,id3,id4,id5,id6) {
	switch (id1.value) {
		case 'J/61':selectOption(id2, 'Nadankulam');break;
		case 'J/62':selectOption(id2, 'Colompuththurai East');break;
		case 'J/63':selectOption(id2, 'Colompuththurai West');break;
		case 'J/64':selectOption(id2, 'Passaiyoor East');break;
		case 'J/65':selectOption(id2, 'Passaiyoor West');break;
		case 'J/66':selectOption(id2, 'Eachchamodai');break;
		case 'J/67':selectOption(id2, 'Thirunagar');break;
		case 'J/68':selectOption(id2, 'Reclamation East');break;
		case 'J/69':selectOption(id2, 'Reclamation West');break;
		case 'J/70':selectOption(id2, 'Gurunagar East');break;
		case 'J/71':selectOption(id2, 'Gurunagar West');break;
		case 'J/72':selectOption(id2, 'Small bazaar');break;
		case 'J/73':selectOption(id2, 'Jaffna town West');break;
		case 'J/74':selectOption(id2, 'Jaffna town East');break;
		case 'J/75':selectOption(id2, 'Chundukuli South');break;
		case 'J/76':selectOption(id2, 'Chundukuli North');break;
		case 'J/77':selectOption(id2, 'Maruthady');break;
		case 'J/78':selectOption(id2, 'Athiyady');break;
		case 'J/79':selectOption(id2, 'Sirampaiyady');break;
		case 'J/80':selectOption(id2, 'Grand Bazaar');break;
		case 'J/81':selectOption(id2, 'Fort');break;
		case 'J/82':selectOption(id2, 'Vannarpannai');break;
		case 'J/83':selectOption(id2, 'Kodday');break;
		case 'J/84':selectOption(id2, 'Navanthurai South');break;
		case 'J/85':selectOption(id2, 'Navanthurai North');break;
		case 'J/86':selectOption(id2, 'Moor Street South');break;
		case 'J/87':selectOption(id2, 'Moor Street North');break;
		case 'J/88':selectOption(id2, 'New Moor Street');break;
		case 'J/91':selectOption(id2, 'Ariyalai North West');break;
		case 'J/92':selectOption(id2, 'Ariyalai Center West');break;
		case 'J/93':selectOption(id2, 'Ariyalai South West');break;
		case 'J/94':selectOption(id2, 'Ariyalai Center North');break;
		case 'J/95':selectOption(id2, 'Ariyalai Center');break;
		case 'J/96':selectOption(id2, 'Ariyalai Center South');break;
		case 'J/97':selectOption(id2, 'Iyanar kovilady');break;
		case 'J/98':selectOption(id2, 'Vannarpannai North');break;
		case 'J/99':selectOption(id2, 'Vannarpannai N.W');break;
		case 'J/100':selectOption(id2, 'Vannarpannai N.E');break;
		case 'J/101':selectOption(id2, 'Neeraviyady');break;
		case 'J/102':selectOption(id2, 'Kandarmadam N.W');break;
		case 'J/103':selectOption(id2, 'Kandarmadam N.E');break;
		case 'J/104':selectOption(id2, 'Kandarmadam S.W');break;
		case 'J/105':selectOption(id2, 'Kandarmadam S.E');break;
		case 'J/106':selectOption(id2, 'Nallur North');break;
		case 'J/107':selectOption(id2, 'Nallur Rajathany');break;
		case 'J/108':selectOption(id2, 'Nallur South');break;
		case 'J/109':selectOption(id2, 'Sangiliyan thoppu');break;
		case 'MN/1':selectOption(id2, 'Vellankulam');break;
		case 'MN/2':selectOption(id2, 'Thevanpiddy');break;
		case 'MN/3':selectOption(id2, 'Paliaru');break;
		case 'MN/4':selectOption(id2, 'Illupaikadavai');break;
		case 'MN/5':selectOption(id2, 'Anthoniyarpuram');break;
		case 'MN/37':selectOption(id2, 'Madhu');break;
		case 'MN/38':selectOption(id2, 'Periyapandivirichchan West');break;
		case 'MN/39':selectOption(id2, 'Periyapandivirichchan East');break;
		case 'MN/40':selectOption(id2, 'Palampiddy');break;
		case 'MN/41':selectOption(id2, 'Keerisuddan');break;
		default:selectOption(id2, '');break;
	}
	switch (id2.value) {
		case 'Nadankulam':case 'Colompuththurai East':case 'Colompuththurai West':case 'Passaiyoor East':case 'Passaiyoor West':case 'Eachchamodai':case 'Thirunagar':case 'Reclamation East':case 'Reclamation West':case 'Gurunagar East':case 'Gurunagar West':case 'Small bazaar':case 'Jaffna town West':case 'Jaffna town East':case 'Chundukuli South':case 'Chundukuli North':case 'Maruthady':case 'Athiyady':case 'Sirampaiyady':case 'Grand Bazaar':case 'Fort':case 'Vannarpannai':case 'Kodday':case 'Navanthurai South':case 'Navanthurai North':case 'Moor Street South':case 'Moor Street North':case 'New Moor Street':
		id3.value='Jaffna'; break;
		case 'Ariyalai North West':case 'Ariyalai Center West':case 'Ariyalai South West':case 'Ariyalai Center North':case 'Ariyalai Center':case 'Ariyalai Center South':case 'Iyanar kovilady':case 'Vannarpannai North':case 'Vannarpannai N.W':case 'Vannarpannai N.E':case 'Neeraviyady':case 'Kandarmadam N.W':case 'Kandarmadam N.E':case 'Kandarmadam S.W':case 'Kandarmadam S.E':case 'Nallur North':case 'Nallur Rajathany':case 'Nallur South':case 'Sangiliyan thoppu':
		id3.value='Nallur'; break;
		case 'Vellankulam':case 'Thevanpiddy':case 'Paliaru':case 'Illupaikadavai':case 'Anthoniyarpuram':
		id3.value='Manthai West'; break;
		case 'Madhu':case 'Periyapandivirichchan West':case 'Periyapandivirichchan East':case 'Palampiddy':case 'Keerisuddan':
		id3.value='Madhu'; break;
		default: id3.value=''; break;
	}
	switch (id3.value) {
		case 'Jaffna':case 'Nallur': id4.value='Jaffna'; break;
		case 'Manthai West':case 'Madhu': id4.value='Mannar'; break;
		default: id4.value=''; break;
	}
	switch (id4.value) {
		case 'Jaffna':case 'Mannar': id5.value='Northern'; break;
		default: id5.value=''; break;
	}
	var JaffnaMOH = ['Select a MOH Area','Chankanai','Chavakachcheri','Jaffna','Karaveddy','Kayts','Kopay','Nallur','Point Pedro','Sandilipay','Tellippalai','Uduvil'];
	var MannarMOH = ['Select a MOH Area','Mannar','Murunkan','Musali','Adampan','Madhu'];
	switch (id4.value) {
		case 'Jaffna':
			id6.options.length = 0;
			for (i = 0; i < JaffnaMOH.length; i++) {
				createOptionMohPhi(id6, JaffnaMOH[i], JaffnaMOH[i]);
			}
			break;
		case 'Mannar':
			id6.options.length = 0;
			for (i = 0; i < MannarMOH.length; i++) {
				createOptionMohPhi(id6, MannarMOH[i], MannarMOH[i]);
			}
			break;
		default: 
			id6.options.length = 0; 
			break;
	}
	document.getElementById('resMOHArea').options[0].disabled = true;
	document.getElementById('curMOHArea').options[0].disabled = true;
}
function configurePHI(id1,id2) {
	var Chankanai = ['Select a PHI Range','Arali', 'Chankanai', 'Chulipuram', 'Moolai', 'Sithankeny', 'Vaddukoddai'];
	var Chavakachcheri = ['Select a PHI Range','Eluthumadduval', 'Kaithady', 'Kodikamam', 'Madduvil', 'Manthuvil', 'Meesalai', 'Navatkuli', 'Sarasalai', 'UCI', 'UCII', 'Varani'];
	var Jaffna = ['Select a PHI Range','Jaffna', 'Bazaar I', 'Bazaar II', 'Columbuthurai', 'Gurunagar I', 'Gurunagar II', 'Nallur', 'Vannar Pannai'];
	var Karaveddy = ['Select a PHI Range','Alvai II', 'Karanavai', 'Nelliyady', 'Thunnalai', 'Udupiddy'];
	var Kayts = ['Select a PHI Range','Allaipiddy', 'Delft', 'Karainagar', 'Kayts', 'Nainathivu', 'Punguduthivu', 'Velanai'];
	var Kopay = ['Select a PHI Range','Atchuvely I', 'Atchuvely II', 'Irupalai', 'Kopay', 'Neervely', 'Puttur', 'Siruppiddy', 'Urumpirai'];
	var Nallur = ['Select a PHI Range','Kokuvil I', 'Kokuvil II', 'Kondavil', 'Nallur'];
	var PointPedro = ['Select a PHI Range','Alvai II', 'Ampan', 'Chempiyanpattu', 'Point Pedro I', 'Point Pedro II', 'Puloly', 'Thondaimanaru', 'Uduthurai', 'Valvettithurai'];
	var Sandilipay = ['Select a PHI Range','Anaikkodai', 'Ilvalai', 'Manipay', 'Navaly', 'Pandertharrippu', 'Sandilipay', 'Suthumalai'];
	var Tellippalai = ['Select a PHI Range','Alaveddy', 'Mallakam', 'Tellippalai'];
	var Uduvil = ['Select a PHI Range','Chunakam I', 'Chunakam II', 'Erlalai', 'Inuvil', 'Punnalaikadduvan', 'Uduvil'];

	switch (id1.value) {
		case 'Chankanai':
			id2.options.length = 0;
			for (i = 0; i < Chankanai.length; i++) {
				createOptionMohPhi(id2, Chankanai[i], Chankanai[i]);
			}
			break;
		case 'Chavakachcheri':
			id2.options.length = 0; 
			for (i = 0; i < Chavakachcheri.length; i++) {
				createOptionMohPhi(id2, Chavakachcheri[i], Chavakachcheri[i]);
			}
			break;
		case 'Jaffna':
			id2.options.length = 0;
			for (i = 0; i < Jaffna.length; i++) {
				createOptionMohPhi(id2, Jaffna[i], Jaffna[i]);
			}
			break;
		case 'Karaveddy':
			id2.options.length = 0;
			for (i = 0; i < Karaveddy.length; i++) {
				createOptionMohPhi(id2, Karaveddy[i], Karaveddy[i]);
			}
			break;
		case 'Kayts':
			id2.options.length = 0; 
			for (i = 0; i < Kayts.length; i++) {
				createOptionMohPhi(id2, Kayts[i], Kayts[i]);
			}
			break;
		case 'Kopay':
			id2.options.length = 0;
			for (i = 0; i < Kopay.length; i++) {
				createOptionMohPhi(id2, Kopay[i], Kopay[i]);
			}
			break;
		case 'Nallur':
			id2.options.length = 0;
			for (i = 0; i < Nallur.length; i++) {
				createOptionMohPhi(id2, Nallur[i], Nallur[i]);
			}
			break;
		case 'Point Pedro':
			id2.options.length = 0; 
			for (i = 0; i < PointPedro.length; i++) {
				createOptionMohPhi(id2, PointPedro[i], PointPedro[i]);
			}
			break;
		case 'Sandilipay':
			id2.options.length = 0;
			for (i = 0; i < Sandilipay.length; i++) {
				createOptionMohPhi(id2, Sandilipay[i], Sandilipay[i]);
			}
			break;
		case 'Tellippalai':
			id2.options.length = 0;
			for (i = 0; i < Tellippalai.length; i++) {
				createOptionMohPhi(id2, Tellippalai[i], Tellippalai[i]);
			}
			break;
		case 'Uduvil':
			id2.options.length = 0;
			for (i = 0; i < Uduvil.length; i++) {
				createOptionMohPhi(id2, Uduvil[i], Uduvil[i]);
			}
			break;
		default:
			id2.options.length = 0;
			break;
	}
	document.getElementById('resPHIRange').options[0].disabled = true;
	document.getElementById('curPHIRange').options[0].disabled = true;
}
function fillCurAdd(curGSDivName,resGSDivName,curGSDiv,resGSDiv,curMOHArea,resMOHArea,curPHIRange,resPHIRange){
	if(document.getElementById('sameAddress').checked) {
	    document.getElementById('curAddLine1').value = document.getElementById('resAddLine1').value;
	    document.getElementById('curAddLine2').value = document.getElementById('resAddLine2').value;
	    document.getElementById('curDSDiv').value = document.getElementById('resDSDiv').value;
	    document.getElementById('curDistrict').value = document.getElementById('resDistrict').value;
	    document.getElementById('curProvince').value = document.getElementById('resProvince').value;
	    document.getElementById('curLandmark').value = document.getElementById('resLandmark').value;

	    selectOption(curGSDivName, resGSDivName.value, resGSDivName.value);
	    selectOption(curGSDiv, resGSDiv.value, resGSDiv.value);
	    selectOption(curMOHArea, resMOHArea.value, resMOHArea.value);
	    selectOption(curPHIRange, resPHIRange.value, resPHIRange.value);

	    document.getElementById('curAddLine1').disabled = true;
	    document.getElementById('curAddLine2').disabled = true;
	    document.getElementById('curGSDivName').disabled = true;
	    document.getElementById('curGSDiv').disabled = true;
	    document.getElementById('curMOHArea').disabled = true;
	    document.getElementById('curPHIRange').disabled = true;
	    document.getElementById('curLandmark').disabled = true;
	} else {
	    document.getElementById('curAddLine1').value = '';
	    document.getElementById('curAddLine2').value = '';
	    document.getElementById('curDSDiv').value = '';
	    document.getElementById('curDistrict').value = '';
	    document.getElementById('curProvince').value = '';
	    document.getElementById('curLandmark').value = '';

	    selectOption(curGSDivName, '');
	    selectOption(curGSDiv, '');
	    selectOption(curMOHArea, '');
	    curMOHArea.options.length = 1;
	    selectOption(curPHIRange, '');
	    curPHIRange.options.length = 1;

	    document.getElementById('curAddLine1').disabled = false;
	    document.getElementById('curAddLine2').disabled = false;
	    document.getElementById('curGSDivName').disabled = false;
	    document.getElementById('curGSDiv').disabled = false;
	    document.getElementById('curMOHArea').disabled = false;
	    document.getElementById('curPHIRange').disabled = false;
	    document.getElementById('curLandmark').disabled = false;
	}
}
function fillSame(curGSDivName,resGSDivName,curGSDiv,resGSDiv,curMOHArea,resMOHArea,curPHIRange,resPHIRange){
	if(document.getElementById('sameAddress').checked) {
	    document.getElementById('curAddLine1').value = document.getElementById('resAddLine1').value;
	    document.getElementById('curAddLine2').value = document.getElementById('resAddLine2').value;
	    document.getElementById('curDSDiv').value = document.getElementById('resDSDiv').value;
	    document.getElementById('curDistrict').value = document.getElementById('resDistrict').value;
	    document.getElementById('curProvince').value = document.getElementById('resProvince').value;
	    document.getElementById('curLandmark').value = document.getElementById('resLandmark').value;

	    selectOption(curGSDivName, resGSDivName.value);
	    selectOption(curGSDiv, resGSDiv.value);
	    selectOption(curMOHArea, resMOHArea.value);
	    selectOption(curPHIRange, resPHIRange.value);
	}
}
function selectOption(id1, value) {
	id1.value=value;
}
function createOptionMohPhi(id1, text, value) {
	var opt = document.createElement('option');
	opt.value = value;
	opt.text = text;
	id1.options.add(opt);
}
