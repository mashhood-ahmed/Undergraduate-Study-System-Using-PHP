// fname lname reg mail np cp

function validate(){

	var first = document.getElementById('fname').value;
	var last = document.getElementById('lname').value;
	var reg = document.getElementById('reg').value;
	var mail = document.getElementById('mail').value;
	var np = document.getElementById('np').value;
	var cp = document.getElementById('cp').value;

	//	console.log(first + ' ' + last + ' ' + reg + '  ' + mail + '  ' + np + '  ' + cp );

	var patt = /[0-9]/;
	var f = patt.test(first);
	var l = patt.test(last);

	if(f==true){

		document.getElementById('e1').textContent = 'Numeric Values Is Not Allowed';
		event.preventDefault();
	}

	if(l==true){

		document.getElementById('e2').textContent = 'Numeric Values Is Not Allowed';
		event.preventDefault();
	}

	var l = mail.length;
	var ch1 = mail.charAt(l-4);
	var ch2 = mail.charAt(0);

	if(ch1!='.' || ch2=='@'){

		document.getElementById('e4').textContent = 'Invalid Email Address Entered';
		event.preventDefault();
	}

	if(np != cp){

		document.getElementById('e5').textContent = 'Passwords Not Matched';
		event.preventDefault();
	}

}

document.getElementById('signup').addEventListener('submit' , validate , false);