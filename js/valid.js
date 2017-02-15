  function validasi1(){ 
    var alpha  = /^[a-zA-Z ]+$/;
   var numeric = /^[0-9]+$/; 
   var nama =document.getElementById("nama").value;
   var notelp=document.getElementById("hp").value; 
  var pass2=document.getElementById("pwd").value;
  var pass1=document.getElementById("konfirm").value;
  
if (!notelp.match(numeric))
  {
document.getElementById("hp").setCustomValidity("No hape tidak mengandung huruf");

      }  
    else 
   
   { 
    if (notelp.length >=14 || notelp.length<=8) {
     document.getElementById("hp").setCustomValidity("No Hp Tidak valid");
  }  else
    document.getElementById("hp").setCustomValidity('');

}
  if(pass1!=pass2)
 {  
  document.getElementById("konfirm").setCustomValidity("Passwords Tidak Sama, Coba Lagi");
 }
 else
  { 
   document.getElementById("konfirm").setCustomValidity('');
  }
  if(!nama.match(alpha))
    {
      document.getElementById("nama").setCustomValidity("nama tidak valid");    }
 
 else 
    {
     document.getElementById("nama").setCustomValidity('');
    }
 }
 function validasi2(){ 
    var alpha  = /^[a-zA-Z ]+$/;
   var numeric = /^[0-9]+$/; 
   var nama =document.getElementById("nama1").value;
   var notelp=document.getElementById("hp1").value; 
  var pass2=document.getElementById("pwd1").value;
  var pass1=document.getElementById("konfirm1").value;
  
if (!notelp.match(numeric))
  {
document.getElementById("hp1").setCustomValidity("No hape tidak mengandung huruf");

      }  
    else 
   
   { 
    if (notelp.length >=14 || notelp.length<=8) {
     document.getElementById("hp1").setCustomValidity("No Hp Tidak valid");
  }  else
    document.getElementById("hp1").setCustomValidity('');

}
  if(pass1!=pass2)
 {  
  document.getElementById("konfirm1").setCustomValidity("Passwords Tidak Sama, Coba Lagi");
 }
 else
  { 
   document.getElementById("konfirm1").setCustomValidity('');
  }
  if(!nama.match(alpha))
    {
      document.getElementById("nama1").setCustomValidity("nama tidak valid");    }
 
 else 
    {
     document.getElementById("nama1").setCustomValidity('');
    }
 }
 function validasi3(){ 
    var alpha  = /^[a-zA-Z ]+$/;
   var numeric = /^[0-9]+$/; 
   var nama =document.getElementById("namapemilik2").value;
   var notelp=document.getElementById("hp2").value; 
  var pass2=document.getElementById("pwd2").value;
  var pass1=document.getElementById("konfirm2").value;
  
if (!notelp.match(numeric))
  {
document.getElementById("hp2").setCustomValidity("No hape tidak mengandung huruf");

      }  
    else 
   
   { 
    if (notelp.length >=14 || notelp.length<=8) {
     document.getElementById("hp2").setCustomValidity("No Hp Tidak valid");
  }  else
    document.getElementById("hp2").setCustomValidity('');

}
  if(pass1!=pass2)
 {  
  document.getElementById("konfirm2").setCustomValidity("Passwords Tidak Sama, Coba Lagi");
 }
 else
  { 
   document.getElementById("konfirm2").setCustomValidity('');
  }
  if(!nama.match(alpha))
    {
      document.getElementById("namapemilik2").setCustomValidity("nama tidak valid");    }
 
 else 
    {
     document.getElementById("namapemilik2").setCustomValidity('');
    }
 }
 function validasi4(){ 
    var alpha  = /^[a-zA-Z ]+$/;
   var numeric = /^[0-9]+$/; 
   var nama =document.getElementById("namapemilik3").value;
   var notelp=document.getElementById("hp3").value; 
  var pass2=document.getElementById("pwd3").value;
  var pass1=document.getElementById("konfirm3").value;
  
if (!notelp.match(numeric))
  {
document.getElementById("hp3").setCustomValidity("No hape tidak mengandung huruf");

      }  
    else 
   
   { 
    if (notelp.length >=14 || notelp.length<=8) {
     document.getElementById("hp3").setCustomValidity("No Hp Tidak valid");
  }  else
    document.getElementById("hp3").setCustomValidity('');

}
  if(pass1!=pass2)
 {  
  document.getElementById("konfirm3").setCustomValidity("Passwords Tidak Sama, Coba Lagi");
 }
 else
  { 
   document.getElementById("konfirm3").setCustomValidity('');
  }
  if(!nama.match(alpha))
    {
      document.getElementById("namapemilik3").setCustomValidity("nama tidak valid");    }
 
 else 
    {
     document.getElementById("namapemilik3").setCustomValidity('');
    }
 }
 