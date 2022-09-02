
var spinnerSMALL="<div class='spinner-border spinner-border-sm text-dark' role='status'><span class='sr-only'></span></div>";

//submit forms
function submitForm(event,formID,optValue,respElemId){
  event.preventDefault();


  var form = $('#'+formID)[0];

  if(!form.checkValidity()){
    form.reportValidity();
    return false;
  }
 
  var data = new FormData(form);


  // If you want to add an extra field for the FormData
  data.append("opt",optValue);
  
  $.ajax({
  type: "POST",
  enctype: 'multipart/form-data',
  url: "/admin_main",
  data: data,
  processData: false,
  contentType: false,
  cache: false,
  beforeSend: function(){
    $("#"+respElemId).html(spinnerSMALL);
  },
  success: function (data) {
    
    $("#"+respElemId).html('');
    $("#"+respElemId).hide();
    $("#"+respElemId).html(data);
    feather.replace();
    $("#"+respElemId).fadeIn(1000);
   // console.log("SUCCESS : ", data);


  },
  error: function(XMLHttpRequest,textStatus,errorThrown){
    $("#"+respElemId).fadeOut(0);
    //XMLHttpRequest.responseText+" "+textStatus+
    $("#"+respElemId).html("<span class='text-warning'>internet connection interrupted...</span><a class='text-primary' href='./main_page'>reload page</a>");
    $("#"+respElemId).fadeIn(5000);
    }
  });
  
}
