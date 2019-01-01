$(function(){
	dateNotified.max = new Date().toISOString().split("T")[0];
	dateConfirmed.max = new Date().toISOString().split("T")[0];
	dateOnset.max = new Date().toISOString().split("T")[0];
	dateHospitalisation.max = new Date().toISOString().split("T")[0];
	dateDischarge.max = new Date().toISOString().split("T")[0];

	$today = new Date();
	$yesterday = new Date(($today.setDate($today.getDate()-1)));
	birthDate.max = $yesterday.toISOString().split("T")[0];
});