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
        document.getElementById('yearOfBirth').required = true;
        document.getElementById('dateOfBirth').style.display = false;
    }
    else {  
        document.getElementById('dateOfBirth').style.display = '';
        document.getElementById('yearOfBirth').style.display = 'none';
        document.getElementById("birthYear").value="";
        document.getElementById("age").value=0;
        document.getElementById('dateOfBirth').style.display = true;
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
		case 'Nadankulam':createOption(id2, 'J/61', 'J/61');break;
		case 'Colompuththurai East':createOption(id2, 'J/62', 'J/62');break;
		case 'Colompuththurai West':createOption(id2, 'J/63', 'J/63');break;
		case 'Passaiyoor East':createOption(id2, 'J/64', 'J/64');break;
		case 'Passaiyoor West':createOption(id2, 'J/65', 'J/65');break;
		case 'Eachchamodai':createOption(id2, 'J/66', 'J/66');break;
		case 'Thirunagar':createOption(id2, 'J/67', 'J/67');break;
		case 'Reclamation East':createOption(id2, 'J/68', 'J/68');break;
		case 'Reclamation West':createOption(id2, 'J/69', 'J/69');break;
		case 'Gurunagar East':createOption(id2, 'J/70', 'J/70');break;
		case 'Gurunagar West':createOption(id2, 'J/71', 'J/71');break;
		case 'Small bazaar':createOption(id2, 'J/72', 'J/72');break;
		case 'Jaffna town West':createOption(id2, 'J/73', 'J/73');break;
		case 'Jaffna town East':createOption(id2, 'J/74', 'J/74');break;
		case 'Chundukuli South':createOption(id2, 'J/75', 'J/75');break;
		case 'Chundukuli North':createOption(id2, 'J/76', 'J/76');break;
		case 'Maruthady':createOption(id2, 'J/77', 'J/77');break;
		case 'Athiyady':createOption(id2, 'J/78', 'J/78');break;
		case 'Sirampaiyady':createOption(id2, 'J/79', 'J/79');break;
		case 'Grand Bazaar':createOption(id2, 'J/80', 'J/80');break;
		case 'Fort':createOption(id2, 'J/81', 'J/81');break;
		case 'Vannarpannai':createOption(id2, 'J/82', 'J/82');break;
		case 'Kodday':createOption(id2, 'J/83', 'J/83');break;
		case 'Navanthurai South':createOption(id2, 'J/84', 'J/84');break;
		case 'Navanthurai North':createOption(id2, 'J/85', 'J/85');break;
		case 'Moor Street South':createOption(id2, 'J/86', 'J/86');break;
		case 'Moor Street North':createOption(id2, 'J/87', 'J/87');break;
		case 'New Moor Street':createOption(id2, 'J/88', 'J/88');break;
		case 'Ariyalai North West':createOption(id2, 'J/91', 'J/91');break;
		case 'Ariyalai Center West':createOption(id2, 'J/92', 'J/92');break;
		case 'Ariyalai South West':createOption(id2, 'J/93', 'J/93');break;
		case 'Ariyalai Center North':createOption(id2, 'J/94', 'J/94');break;
		case 'Ariyalai Center':createOption(id2, 'J/95', 'J/95');break;
		case 'Ariyalai Center South':createOption(id2, 'J/96', 'J/96');break;
		case 'Iyanar kovilady':createOption(id2, 'J/97', 'J/97');break;
		case 'Vannarpannai North':createOption(id2, 'J/98', 'J/98');break;
		case 'Vannarpannai N.W':createOption(id2, 'J/99', 'J/99');break;
		case 'Vannarpannai N.E':createOption(id2, 'J/100', 'J/100');break;
		case 'Neeraviyady':createOption(id2, 'J/101', 'J/101');break;
		case 'Kandarmadam N.W':createOption(id2, 'J/102', 'J/102');break;
		case 'Kandarmadam N.E':createOption(id2, 'J/103', 'J/103');break;
		case 'Kandarmadam S.W':createOption(id2, 'J/104', 'J/104');break;
		case 'Kandarmadam S.E':createOption(id2, 'J/105', 'J/105');break;
		case 'Nallur North':createOption(id2, 'J/106', 'J/106');break;
		case 'Nallur Rajathany':createOption(id2, 'J/107', 'J/107');break;
		case 'Nallur South':createOption(id2, 'J/108', 'J/108');break;
		case 'Sangiliyan thoppu':createOption(id2, 'J/109', 'J/109');break;
		case 'Vellankulam':createOption(id2, 'MN/1', 'MN/1');break;
		case 'Thevanpiddy':createOption(id2, 'MN/2', 'MN/2');break;
		case 'Paliaru':createOption(id2, 'MN/3', 'MN/3');break;
		case 'Illupaikadavai':createOption(id2, 'MN/4', 'MN/4');break;
		case 'Anthoniyarpuram':createOption(id2, 'MN/5', 'MN/5');break;
		case 'Madhu':createOption(id2, 'MN/37', 'MN/37');break;
		case 'Periyapandivirichchan West':createOption(id2, 'MN/38', 'MN/38');break;
		case 'Periyapandivirichchan East':createOption(id2, 'MN/39', 'MN/39');break;
		case 'Palampiddy':createOption(id2, 'MN/40', 'MN/40');break;
		case 'Keerisuddan':createOption(id2, 'MN/41', 'MN/41');break;
		default:createOption(id2, 'Select a GS Div', '');break;
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
function configure2(id1,id2,id3,id4,id5,id6) {
	switch (id1.value) {
		case 'J/61':createOption(id2, 'Nadankulam', 'Nadankulam');break;
		case 'J/62':createOption(id2, 'Colompuththurai East', 'Colompuththurai East');break;
		case 'J/63':createOption(id2, 'Colompuththurai West', 'Colompuththurai West');break;
		case 'J/64':createOption(id2, 'Passaiyoor East', 'Passaiyoor East');break;
		case 'J/65':createOption(id2, 'Passaiyoor West', 'Passaiyoor West');break;
		case 'J/66':createOption(id2, 'Eachchamodai', 'Eachchamodai');break;
		case 'J/67':createOption(id2, 'Thirunagar', 'Thirunagar');break;
		case 'J/68':createOption(id2, 'Reclamation East', 'Reclamation East');break;
		case 'J/69':createOption(id2, 'Reclamation West', 'Reclamation West');break;
		case 'J/70':createOption(id2, 'Gurunagar East', 'Gurunagar East');break;
		case 'J/71':createOption(id2, 'Gurunagar West', 'Gurunagar West');break;
		case 'J/72':createOption(id2, 'Small bazaar', 'Small bazaar');break;
		case 'J/73':createOption(id2, 'Jaffna town West', 'Jaffna town West');break;
		case 'J/74':createOption(id2, 'Jaffna town East', 'Jaffna town East');break;
		case 'J/75':createOption(id2, 'Chundukuli South', 'Chundukuli South');break;
		case 'J/76':createOption(id2, 'Chundukuli North', 'Chundukuli North');break;
		case 'J/77':createOption(id2, 'Maruthady', 'Maruthady');break;
		case 'J/78':createOption(id2, 'Athiyady', 'Athiyady');break;
		case 'J/79':createOption(id2, 'Sirampaiyady', 'Sirampaiyady');break;
		case 'J/80':createOption(id2, 'Grand Bazaar', 'Grand Bazaar');break;
		case 'J/81':createOption(id2, 'Fort', 'Fort');break;
		case 'J/82':createOption(id2, 'Vannarpannai', 'Vannarpannai');break;
		case 'J/83':createOption(id2, 'Kodday', 'Kodday');break;
		case 'J/84':createOption(id2, 'Navanthurai South', 'Navanthurai South');break;
		case 'J/85':createOption(id2, 'Navanthurai North', 'Navanthurai North');break;
		case 'J/86':createOption(id2, 'Moor Street South', 'Moor Street South');break;
		case 'J/87':createOption(id2, 'Moor Street North', 'Moor Street North');break;
		case 'J/88':createOption(id2, 'New Moor Street', 'New Moor Street');break;
		case 'J/91':createOption(id2, 'Ariyalai North West', 'Ariyalai North West');break;
		case 'J/92':createOption(id2, 'Ariyalai Center West', 'Ariyalai Center West');break;
		case 'J/93':createOption(id2, 'Ariyalai South West', 'Ariyalai South West');break;
		case 'J/94':createOption(id2, 'Ariyalai Center North', 'Ariyalai Center North');break;
		case 'J/95':createOption(id2, 'Ariyalai Center', 'Ariyalai Center');break;
		case 'J/96':createOption(id2, 'Ariyalai Center South', 'Ariyalai Center South');break;
		case 'J/97':createOption(id2, 'Iyanar kovilady', 'Iyanar kovilady');break;
		case 'J/98':createOption(id2, 'Vannarpannai North', 'Vannarpannai North');break;
		case 'J/99':createOption(id2, 'Vannarpannai N.W', 'Vannarpannai N.W');break;
		case 'J/100':createOption(id2, 'Vannarpannai N.E', 'Vannarpannai N.E');break;
		case 'J/101':createOption(id2, 'Neeraviyady', 'Neeraviyady');break;
		case 'J/102':createOption(id2, 'Kandarmadam N.W', 'Kandarmadam N.W');break;
		case 'J/103':createOption(id2, 'Kandarmadam N.E', 'Kandarmadam N.E');break;
		case 'J/104':createOption(id2, 'Kandarmadam S.W', 'Kandarmadam S.W');break;
		case 'J/105':createOption(id2, 'Kandarmadam S.E', 'Kandarmadam S.E');break;
		case 'J/106':createOption(id2, 'Nallur North', 'Nallur North');break;
		case 'J/107':createOption(id2, 'Nallur Rajathany', 'Nallur Rajathany');break;
		case 'J/108':createOption(id2, 'Nallur South', 'Nallur South');break;
		case 'J/109':createOption(id2, 'Sangiliyan thoppu', 'Sangiliyan thoppu');break;
		case 'MN/1':createOption(id2, 'Vellankulam', 'Vellankulam');break;
		case 'MN/2':createOption(id2, 'Thevanpiddy', 'Thevanpiddy');break;
		case 'MN/3':createOption(id2, 'Paliaru', 'Paliaru');break;
		case 'MN/4':createOption(id2, 'Illupaikadavai', 'Illupaikadavai');break;
		case 'MN/5':createOption(id2, 'Anthoniyarpuram', 'Anthoniyarpuram');break;
		case 'MN/37':createOption(id2, 'Madhu', 'Madhu');break;
		case 'MN/38':createOption(id2, 'Periyapandivirichchan West', 'Periyapandivirichchan West');break;
		case 'MN/39':createOption(id2, 'Periyapandivirichchan East', 'Periyapandivirichchan East');break;
		case 'MN/40':createOption(id2, 'Palampiddy', 'Palampiddy');break;
		case 'MN/41':createOption(id2, 'Keerisuddan', 'Keerisuddan');break;
		default:createOption(id2, 'Select a GS Div Name', '');break;
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

	    createOption(curGSDivName, resGSDivName.value, resGSDivName.value);
	    createOption(curGSDiv, resGSDiv.value, resGSDiv.value);
	    createOption(curMOHArea, resMOHArea.value, resMOHArea.value);
	    createOption(curPHIRange, resPHIRange.value, resPHIRange.value);

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

	    createOption(curGSDivName, 'Select a GS Div Name', '');
	    createOption(curGSDiv, 'Select a GS Div', '');
	    createOption(curMOHArea, 'Select a MOH Area', '');
	    curMOHArea.options.length = 1;
	    createOption(curPHIRange, 'Select a PHI Range', '');
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

	    createOption(curGSDivName, resGSDivName.value, resGSDivName.value);
	    createOption(curGSDiv, resGSDiv.value, resGSDiv.value);
	    createOption(curMOHArea, resMOHArea.value, resMOHArea.value);
	    createOption(curPHIRange, resPHIRange.value, resPHIRange.value);
	}
}
function createOption(id1, text, value) {
	var opt = document.createElement('option');
	opt.value = value;
	opt.text = text;
	id1.options.add(opt);
	id1.value=value;
}
function createOptionMohPhi(id1, text, value) {
	var opt = document.createElement('option');
	opt.value = value;
	opt.text = text;
	id1.options.add(opt);
}
