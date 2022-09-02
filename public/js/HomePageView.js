var loaderImg="<div class='spinner-grow bg-primary' style='margin-left:41%; margin-top:13%; width:200px; height:200px;' role='status'><span class='sr-only'></span></div>";

var spinner="<div class='spinner-border spinner-border-sm text-dark' role='status'><span class='sr-only'></span></div>";

var spinnerSMALL="<div class='spinner-border spinner-border-sm text-dark' role='status'><span class='sr-only'></span></div>";

      $(document).ready(function(){
        
        loadnum=defaultNum;
        startload=0;
        // panelSelect('view_atps','');
       
        feather.replace();
      })


$('#ultabs li a').click(function(){
    var clicked=$(this).attr('id');
      $('#ultabs li a').each(function(){

        if($(this).attr('id')==clicked){
          $(this).attr('class','nav-link text-primary active');
        }else{
          $(this).attr('class','nav-link text-dark');
        }
          
      })
      
  })


  $('#ultabs li').click(function(){
    var tabID=$(this).attr('id');
     var orderdata=JSON.stringify(orderItemsData);
    $.ajax({
		url:'/user_main',
		type:'post',
		data:{opt:tabID,opt2:orderdata,opt4:loadnum,opt5:startload},
		beforeSend: function(){
      $('#loadercontent').html(spinner);
		},
		success: function(respData){
			$('#loadercontent').html('');
      
      $('#content').html(respData);

      feather.replace();

      //check checkboxes
  check();

  //increment orderlist
  getOrders();

		},
        error: function(XMLHttpRequest,textStatus,errorThrown){
            
            $('#loadercontent').fadeOut(0);
            //XMLHttpRequest.responseText+" "+textStatus+
            $('#loadercontent').html("<span class='text-warning'>internet connection interrupted...</span><a class='text-primary' href='/'>reload page</a>");
            $('#loadercontent').fadeIn(5000);

            }
	})


  })


  
  function panelSelect(tabID,dataValue=''){
    //toggle menu highlight color
    // opt2:dataValue,
    menuSelectOpt=tabID;
   
$.ajax({
    url:'/user_main',
    type:'post',
    data:{opt:tabID,opt4:loadnum,opt5:startload},
    beforeSend: function(){
  $('#loadercontent').html(spinner);
    },
    success: function(respData){
        $('#loadercontent').html('');
  
  $('#content').html(respData);

  feather.replace();

  //check checkboxes
  check();

  //increment orderlist
  getOrders();


    },
    error: function(XMLHttpRequest,textStatus,errorThrown){
        
        $('#loadercontent').fadeOut(0);
        //XMLHttpRequest.responseText+" "+textStatus+
        $('#loadercontent').html("<span class='text-warning'>internet connection interrupted...</span><a class='text-primary' href='/'>reload page</a>");
        $('#loadercontent').fadeIn(5000);

        }
})


}

function check(){
    for(i in ids_selected){
        $("#"+ids_selected[i]).prop('checked',true);
        var thenum = ids_selected[i].replace( /^\D+/g, ''); 
        $("#num_items"+thenum).val(orderItemsData[ids_selected[i]]);
    } 

}

function getOrders(itemsNum){
        
        $("input[type='checkbox']").each(function(){
            var chkbx_id=$(this).attr('id');
            var checked=$(this).prop('checked');

            if(checked==true){
               
            if(!ids_selected.includes(chkbx_id)){
                ids_selected.push(chkbx_id);
                orderItemsData[chkbx_id]=itemsNum;
            }
               
            }else{

                if(ids_selected.includes(chkbx_id)){
                    deleteValue(ids_selected,chkbx_id);
                  
                    delete orderItemsData[chkbx_id];
                  
                }
               
            }
              
    
        });
        ordernum=ids_selected.length;
        $('.num_orders').html(ordernum);
    
}



function deleteValue(refArray,item){
    var index = refArray.indexOf(item);
if (index !== -1) {
    refArray.splice(index, 1);
}
}




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
  url: "/user_main",
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