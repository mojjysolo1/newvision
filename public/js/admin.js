
var loaderImg="<div class='spinner-grow bg-primary' style='margin-left:41%; margin-top:13%; width:200px; height:200px;' role='status'><span class='sr-only'></span></div>";

var spinner="<div class='spinner-border spinner-border-sm text-dark' role='status'><span class='sr-only'></span></div>";

var spinnerSMALL="<div class='spinner-border spinner-border-sm text-dark' role='status'><span class='sr-only'></span></div>";

      $(document).ready(function(){
        $('.container').css('width',window.innerWidth+'px');
        
        loadnum=defaultNum;
        startload=0;
        // panelSelect('view_atps','');
       
        feather.replace();
      })



      function panelSelect(tabID,dataValue=''){
        
        //save which datasheet is currently being viewed
        menuSelectOpt=tabID;
       
	$.ajax({
		url:'/admin_main',
		type:'post',
		data:{opt:tabID,opt2:dataValue,opt4:loadnum,opt5:startload},
		beforeSend: function(){
      $('#main #loaderContent').html(spinner);
		},
		success: function(respData){
			$('#main  #loaderContent').html('');
      
      $('#main #content').html(respData);

      feather.replace();

		},
        error: function(XMLHttpRequest,textStatus,errorThrown){
            
            $('#main #loaderContent').fadeOut(0);
            //XMLHttpRequest.responseText+" "+textStatus+
            $('#main #loaderContent').html("<span class='text-warning'>internet connection interrupted...</span><a class='text-primary' href='./main_page'>reload page</a>");
            $('#main #loaderContent').fadeIn(5000);

            }
	})

  
}



function panelSelectLike(field1,value1){
  //value1=field1==''?'':value1;
 // value2=field2==''?'':value2;
 
	$.ajax({
		url:'./datasheets',
		type:'post',
		data:{opt:menuSelectOpt+'_like',opt5:loadnum,opt6:startload,field1:field1,value1:value1},
		beforeSend: function(){
      $('.container #loaderContent').html(spinner);
		},
		success: function(sentdata){
			$('.container #loaderContent').html('');
			$('.container #content').html(sentdata);
      
		}
	})
	
//	menuListColorBehaviours(menuAssPeriodSelected);
}
