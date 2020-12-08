// fafname , falname , famail , fanp , facp

function validate(){

 	var first = document.getElementById('fn').value;
 	var last = document.getElementById('ln').value;
 	var mail = document.getElementById('ma').value;
 	var np = document.getElementById('fp').value;
 	var cp = document.getElementById('sp').value;

 	

 	var patt = /[0-9]/;
 	var tst1 = patt.test(first);
 	var tst2 = patt.test(last);

 	if(tst1==true){
 		document.getElementById('e1').textContent = 'Numeric Values Not Allowed';
 		event.preventDefault();
	}

	if(tst2==true){
		document.getElementById('e2').textContent = 'Numeric Values Not Allowed';
 		event.preventDefault();	
	}

	 var l = mail.length;
	var ch1 = mail.charAt(l-4);
	var ch2 = mail.charAt(0);

	if(ch1 != '.' || ch2 == '@'){

		document.getElementById('e3').textContent = 'Invalid Email Entered';
 		event.preventDefault();	

	}

	if(np != cp ){

		document.getElementById('e4').textContent = 'Passwords Not Matched';
 		event.preventDefault();	
	}



 	}

 document.getElementById('faform').addEventListener('submit' , validate , false);
