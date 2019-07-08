var course_buy_uah=160100;
function recalc_amount() {
	var btc_input = document.getElementById("btc");
	var uah_input = document.getElementById("uah");
	if (btc_input == document.activeElement && btc_input.value != '')
		uah_input.value = (parseFloat(btc_input.value.replace(",","."))*course_buy_uah).toFixed(2);
	if (uah_input == document.activeElement && uah_input.value != '')
		btc_input.value = (parseFloat(uah_input.value.replace(",","."))/course_buy_uah).toFixed(5);
  
	var b = 0;
	var u = 0;
	if (isFloat(uah_input.value))
		u = uah_input.value;
	if (isFloat(btc_input.value))
		b = btc_input.value;
  
	var submit_input = document.getElementById("btnSubmit");
	submit_input.value = "Купить "+b+" BTC за "+u+" UAH";
}
function isFloat(val) {
    val = parseFloat(val);
	return !isNaN(val); 
}

function updateCourceOnPage() {
	document.getElementById("course").innerHTML=course_buy_uah+" UAH";
	recalc_amount();
}
setInterval(updateCourceOnPage, 1000);
