$(function(){
	notificationDate.max = new Date().toISOString().split("T")[0];
	confirmationDate.max = new Date().toISOString().split("T")[0];
	$today = new Date();
	$yesterday = new Date(($today.setDate($today.getDate()-1)));
	birthDate.max = $yesterday.toISOString().split("T")[0];
});
function checkDOB(){
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
	else {
		if (birthDate == "" || birthDate == 0) age = 0;
		else age = year - birthDate.getFullYear();
	}
	document.getElementById("age").value=age;
}
function setMinConfirmationDate() {
	var dateNotify = new Date(document.getElementById('notificationDate').value);
	document.getElementById('confirmationDate').value = "";
	confirmationDate.min = dateNotify.toISOString().split("T")[0];
}
function specifyOtherSource() {
	if (document.getElementById('otherSource').checked) {
		document.getElementById('specifySource').style.display = '';
        document.getElementById('specify').required = true;
	} else {
        document.getElementById('specify').required = false;
		document.getElementById('specifySource').style.display = 'none';
	}
}