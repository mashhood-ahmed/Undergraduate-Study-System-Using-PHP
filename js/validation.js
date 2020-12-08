function upvalid(){

	var fname = document.getElementById('first').value;
	var lname = document.getElementById('last').value;
	var newpass = document.getElementById('np').value;
	var conpass = document.getElementById('cp').value;
	var email = document.getElementById('mail').value;
		

		
	if(newpass != conpass){

		document.getElementById('error').innerHTML = 'Account Registration Is Failed';
		event.preventDefault();
		return false;
	}

	if(email.indexOf('@')<=0) {
			
			document.getElementById('error').innerHTML = 'Account Registration Is Failed';
			event.preventDefault();
			return false;
		} else {

			if((email.charAt(email.length-4) != '.') && (email.charAt(email.length-3) )) {
			
			document.getElementById('error').innerHTML = 'Account Registration Is Failed';
			event.preventDefault();
			return false;
		}
			
		}	
		

}

var form = document.getElementById('signup');
form.addEventListener('submit',upvalid,false);