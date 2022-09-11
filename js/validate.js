function validate(){
    var usernamee= document.getElementById('user').value;
    var email= document.getElementById('mail').value;
    var pass= document.getElementById('pwrd').value;
    var cpass= document.getElementById('cpwrd').value;
    var Qualify= document.getElementById('qual').value;

   var usercheck =/^[A-Za-z. ]{3,30}$/;

   var emailcheck =/^([a-z A-Z 0-9 \. _]+)@([a-z A-Z]+).([a-z A-Z]{2,6})(.[a-z]{2,6})?$/;
   var passcheck =/^[a-zA-Z0-9!@#$%^&*]{6,16}$/;
   var cpasscheck =/^(?=.*[0-9])(?=.*[!@#$%^&])[A-Za-z!@#$%^&*]{8,16}$/;
   var qualicheck =/^[A-Za-z. ]{3,30}$/;


   if(usernamee.trim()==""){
     document.getElementById('username').innerHTML="Reqired";
     return false; }
   else if(usercheck.test('usernameerror')){
   
     document.getElementById('usernameerror').innerHTML=" ";
   }else {
    document.getElementById('usernameerror').innerHTML="invalid input use characters";
   
   return false;
}

if( email == ""){
 document.getElementById('emailAdder').innerHTML="Reqired";
 return false; }
else if(emailcheck.test(email)){
    document.getElementById('emailAdder').innerHTML=" ";
   }
else {
    document.getElementById('emailAdder').innerHTML="invalid Email";
   return false;
}


if(pass.trim()==""){
 document.getElementById('passworder').innerHTML="Reqired";
 return false; }
else if(passcheck.test(pass)){
   
   document.getElementById('passworder').innerHTML=" ";
 }else {
  document.getElementById('passworder').innerHTML="invalid input use characters";
 
 return false;
}

if(cpass.trim()==""){
 document.getElementById('confirm passworder').innerHTML="Reqired";
 return false;
 }
else if(cpass.match(pass)){
  document.getElementById('confirm passworder').innerHTML=" ";
 }
 else {
  document.getElementById('confirm passworder').innerHTML="invalid input use characters";
 return false;
}

if(Qualify.trim()==""){
 document.getElementById('Qualificationer').innerHTML="Reqired";
 return false;
 }
else if( qualicheck .test(Qualify)){
   
   document.getElementById('Qualificationer').innerHTML=" ";
 }else {
  document.getElementById('Qualificationer').innerHTML="invalid input use characters";
 
 return false;
}

//   if(emailcheck.test(email)){
//       document.getElementById('emailAdder').innerHTML=" ";
//      }
//      else {
//       document.getElementById('emailAdder').innerHTML="invalid input use characters";
//      return false;
//   }
} 