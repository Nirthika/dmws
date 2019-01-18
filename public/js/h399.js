$(function(){
	weekEndDate.max = new Date().toISOString().split("T")[0];
});
function setMin(id){
    if (id.value == '') {
        id.value = 0;
    }
}