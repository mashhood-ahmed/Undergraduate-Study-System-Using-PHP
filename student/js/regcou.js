function validate(){

	var title = document.getElementById('title').value;
	var patt = /[0-9]/;
	var tst = patt.test(title);

	if(tst==true){

		document.getElementById('e1').textContent = 'Numeric Values Not Allowed';
		event.preventDefault();
	}

}

document.getElementById('h').addEventListener('submit',validate,false);
