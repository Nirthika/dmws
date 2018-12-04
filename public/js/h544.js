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
        document.getElementById('birthDate').required = false;
        document.getElementById('yearOfBirth').required = true;
    }
    else {  
        document.getElementById('dateOfBirth').style.display = '';
        document.getElementById('yearOfBirth').style.display = 'none';
        document.getElementById("birthYear").value="";
        document.getElementById("age").value=0;
        document.getElementById('birthDate').required = true;
        document.getElementById('yearOfBirth').required = false;
    }   
}
function getAge() {
    var birthDate = new Date(document.getElementById("birthDate").value);
    var birthYear1 = birthDate.getFullYear();
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
		if (birthDate == "" || birthDate == 0 || birthYear1>year || birthYear1<=0) {
			document.getElementById("birthDate").value='';
			age = 0;
		}
		else age = year - birthYear1;
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
		document.getElementById('igmNegative').required = true;
    }
    else if(radioid == 2){  
        document.getElementById('labTest').style.display = 'none';
        document.getElementById("ns1Positive").checked = false;
        document.getElementById("ns1Negative").checked = false;
        document.getElementById("igmPositive").checked = false;
        document.getElementById("igmNegative").checked = false;
        document.getElementById("iggPositive").checked = false;
        document.getElementById("iggNegative").checked = false;
        document.getElementById('igmNegative').required = false;
    }   
}
function testRequired() {
	if(document.getElementById("ns1Positive").checked || document.getElementById("ns1Negative").checked ||
		document.getElementById("igmPositive").checked || document.getElementById("igmNegative").checked ||
		document.getElementById("iggPositive").checked || document.getElementById("iggNegative").checked){
    	document.getElementById('igmNegative').required = false;
    }else{
    	document.getElementById('igmNegative').required = true;
    }
}
function configure1(id1,id2,id3,id4,id5,id6,id7) {	
	switch (id1.value) {
		case 'Nadankulam':id2.value = 'J/61';break;
		case 'Colompuththurai East':id2.value = 'J/62';break;
		case 'Colompuththurai West':id2.value = 'J/63';break;
		case 'Passaiyoor East':id2.value = 'J/64';break;
		case 'Passaiyoor West':id2.value = 'J/65';break;
		case 'Eachchamodai':id2.value = 'J/66';break;
		case 'Thirunagar':id2.value = 'J/67';break;
		case 'Reclamation East':id2.value = 'J/68';break;
		case 'Reclamation West':id2.value = 'J/69';break;
		case 'Gurunagar East':id2.value = 'J/70';break;
		case 'Gurunagar West':id2.value = 'J/71';break;
		case 'Small bazaar':id2.value = 'J/72';break;
		case 'Jaffna town West':id2.value = 'J/73';break;
		case 'Jaffna town East':id2.value = 'J/74';break;
		case 'Chundukuli South':id2.value = 'J/75';break;
		case 'Chundukuli North':id2.value = 'J/76';break;
		case 'Maruthady':id2.value = 'J/77';break;
		case 'Athiyady':id2.value = 'J/78';break;
		case 'Sirampaiyady':id2.value = 'J/79';break;
		case 'Grand Bazaar':id2.value = 'J/80';break;
		case 'Fort':id2.value = 'J/81';break;
		case 'Vannarpannai':id2.value = 'J/82';break;
		case 'Kodday':id2.value = 'J/83';break;
		case 'Navanthurai South':id2.value = 'J/84';break;
		case 'Navanthurai North':id2.value = 'J/85';break;
		case 'Moor Street South':id2.value = 'J/86';break;
		case 'Moor Street North':id2.value = 'J/87';break;
		case 'New Moor Street':id2.value = 'J/88';break;
		case 'Ariyalai North West':id2.value = 'J/91';break;
		case 'Ariyalai Center West':id2.value = 'J/92';break;
		case 'Ariyalai South West':id2.value = 'J/93';break;
		case 'Ariyalai Center North':id2.value = 'J/94';break;
		case 'Ariyalai Center':id2.value = 'J/95';break;
		case 'Ariyalai Center South':id2.value = 'J/96';break;
		case 'Iyanar kovilady':id2.value = 'J/97';break;
		case 'Vannarpannai North':id2.value = 'J/98';break;
		case 'Vannarpannai N.W':id2.value = 'J/99';break;
		case 'Vannarpannai N.E':id2.value = 'J/100';break;
		case 'Neeraviyady':id2.value = 'J/101';break;
		case 'Kandarmadam N.W':id2.value = 'J/102';break;
		case 'Kandarmadam N.E':id2.value = 'J/103';break;
		case 'Kandarmadam S.W':id2.value = 'J/104';break;
		case 'Kandarmadam S.E':id2.value = 'J/105';break;
		case 'Nallur North':id2.value = 'J/106';break;
		case 'Nallur Rajathany':id2.value = 'J/107';break;
		case 'Nallur South':id2.value = 'J/108';break;
		case 'Sangiliyan thoppu':id2.value = 'J/109';break;
		case 'Vellankulam':id2.value = 'MN/1';break;
		case 'Thevanpiddy':id2.value = 'MN/2';break;
		case 'Paliaru':id2.value = 'MN/3';break;
		case 'Illupaikadavai':id2.value = 'MN/4';break;
		case 'Anthoniyarpuram':id2.value = 'MN/5';break;
		case 'Madhu':id2.value = 'MN/37';break;
		case 'Periyapandivirichchan West':id2.value = 'MN/38';break;
		case 'Periyapandivirichchan East':id2.value = 'MN/39';break;
		case 'Palampiddy':id2.value = 'MN/40';break;
		case 'Keerisuddan':id2.value = 'MN/41';break;
		default:id2.value = '';break;
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
	id7.options.length = 0;
	document.getElementById('resMOHArea').options[0].disabled = true;
	document.getElementById('curMOHArea').options[0].disabled = true;	
}
function configure2(id1,id2,id3,id4,id5,id6,id7) {
	switch (id1.value) {
		case 'J/61':id2.value = 'Nadankulam';break;
		case 'J/62':id2.value = 'Colompuththurai East';break;
		case 'J/63':id2.value = 'Colompuththurai West';break;
		case 'J/64':id2.value = 'Passaiyoor East';break;
		case 'J/65':id2.value = 'Passaiyoor West';break;
		case 'J/66':id2.value = 'Eachchamodai';break;
		case 'J/67':id2.value = 'Thirunagar';break;
		case 'J/68':id2.value = 'Reclamation East';break;
		case 'J/69':id2.value = 'Reclamation West';break;
		case 'J/70':id2.value = 'Gurunagar East';break;
		case 'J/71':id2.value = 'Gurunagar West';break;
		case 'J/72':id2.value = 'Small bazaar';break;
		case 'J/73':id2.value = 'Jaffna town West';break;
		case 'J/74':id2.value = 'Jaffna town East';break;
		case 'J/75':id2.value = 'Chundukuli South';break;
		case 'J/76':id2.value = 'Chundukuli North';break;
		case 'J/77':id2.value = 'Maruthady';break;
		case 'J/78':id2.value = 'Athiyady';break;
		case 'J/79':id2.value = 'Sirampaiyady';break;
		case 'J/80':id2.value = 'Grand Bazaar';break;
		case 'J/81':id2.value = 'Fort';break;
		case 'J/82':id2.value = 'Vannarpannai';break;
		case 'J/83':id2.value = 'Kodday';break;
		case 'J/84':id2.value = 'Navanthurai South';break;
		case 'J/85':id2.value = 'Navanthurai North';break;
		case 'J/86':id2.value = 'Moor Street South';break;
		case 'J/87':id2.value = 'Moor Street North';break;
		case 'J/88':id2.value = 'New Moor Street';break;
		case 'J/91':id2.value = 'Ariyalai North West';break;
		case 'J/92':id2.value = 'Ariyalai Center West';break;
		case 'J/93':id2.value = 'Ariyalai South West';break;
		case 'J/94':id2.value = 'Ariyalai Center North';break;
		case 'J/95':id2.value = 'Ariyalai Center';break;
		case 'J/96':id2.value = 'Ariyalai Center South';break;
		case 'J/97':id2.value = 'Iyanar kovilady';break;
		case 'J/98':id2.value = 'Vannarpannai North';break;
		case 'J/99':id2.value = 'Vannarpannai N.W';break;
		case 'J/100':id2.value = 'Vannarpannai N.E';break;
		case 'J/101':id2.value = 'Neeraviyady';break;
		case 'J/102':id2.value = 'Kandarmadam N.W';break;
		case 'J/103':id2.value = 'Kandarmadam N.E';break;
		case 'J/104':id2.value = 'Kandarmadam S.W';break;
		case 'J/105':id2.value = 'Kandarmadam S.E';break;
		case 'J/106':id2.value = 'Nallur North';break;
		case 'J/107':id2.value = 'Nallur Rajathany';break;
		case 'J/108':id2.value = 'Nallur South';break;
		case 'J/109':id2.value = 'Sangiliyan thoppu';break;
		case 'MN/1':id2.value = 'Vellankulam';break;
		case 'MN/2':id2.value = 'Thevanpiddy';break;
		case 'MN/3':id2.value = 'Paliaru';break;
		case 'MN/4':id2.value = 'Illupaikadavai';break;
		case 'MN/5':id2.value = 'Anthoniyarpuram';break;
		case 'MN/37':id2.value = 'Madhu';break;
		case 'MN/38':id2.value = 'Periyapandivirichchan West';break;
		case 'MN/39':id2.value = 'Periyapandivirichchan East';break;
		case 'MN/40':id2.value = 'Palampiddy';break;
		case 'MN/41':id2.value = 'Keerisuddan';break;
		default:id2.value = '';break;
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
	id7.options.length = 0;
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

	    curGSDivName.value=resGSDivName.value;
	    curGSDiv.value=resGSDiv.value;
	    createOptionMohPhi(curMOHArea, resMOHArea.value, resMOHArea.value);
	    curMOHArea.value = resMOHArea.value;
	    createOptionMohPhi(curPHIRange, resPHIRange.value, resPHIRange.value);
	    curPHIRange.value = resPHIRange.value;

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

	    curGSDivName.value = '';
	    curGSDiv.value = '';
	    curMOHArea.value = '';
	    curMOHArea.options.length = 1;
	    curPHIRange.value = '';
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

	    curGSDivName.value=resGSDivName.value;
	    curGSDiv.value=resGSDiv.value;
	    createOptionMohPhi(curMOHArea, resMOHArea.value, resMOHArea.value);
	    curMOHArea.value = resMOHArea.value;
	    createOptionMohPhi(curPHIRange, resPHIRange.value, resPHIRange.value);
	    curPHIRange.value = resPHIRange.value;
	}
}
function createOptionMohPhi(id1, text, value) {
	var opt = document.createElement('option');
	opt.value = value;
	opt.text = text;
	id1.options.add(opt);
}
