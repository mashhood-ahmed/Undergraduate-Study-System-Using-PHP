function validate(){

	var email = document.getElementById('email').value;
	var len = email.length;

	var ch1 = email.charAt(len-4);
	var ch2 = email.charAt(0);

	if(ch1 != '.' || ch2 == '@'){

		document.getElementById('e1').textContent = 'Invalid Email Address';
		event.preventDefault();
	}

}

document.getElementById('f').addEventListener('submit',validate,false);