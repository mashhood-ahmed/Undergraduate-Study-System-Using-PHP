function validate(){

	var title = document.getElementById('title').value;

	var patt = /[0-9]/;
	var res = patt.test(title);

	if(res==true){

		document.getElementById('e1').textContent = 'Numeric Values Not Allowed';
		event.preventDefault();
	}

}

document.getElementById('g').addEventListener('submit',validate,false);