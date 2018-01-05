$.noConflict();

jQuery("#loader").hide();

function validateAssignment() {
	
  var name =document.forms['assignment-form']['name'].value;
  var email =document.forms['assignment-form']['email'].value;
  var desc =document.forms['assignment-form']['description'].value;

  if((name == null || name == "") || (email == null || email == "") || (desc == null || desc == "")){
    var txt ="<div class='second-sub-title text-center error'>Make sure you have filled all the boxes properly.</div>";
    jQuery('#assignment-append').html(txt);
    return false;
  }else{
    var data = {'name':name, 'email':email, 'desc':desc};
    jQuery.ajax({
      url : 'includes/ajax-form.php',
      data : data,
      method : 'post',
      success : function(data){
        jQuery('#assignment-append').html(data);
      },
      error :function(){
        alert("Something went wrong");
      }
    });
    return false;
  }
}

jQuery(document).ajaxStart(function(){
	//alert("start");
	jQuery("#loader").show();
 });
 
 jQuery(document).ajaxStop(function(){
	//alert("stop")
	jQuery("#loader").hide();
 });


  
  