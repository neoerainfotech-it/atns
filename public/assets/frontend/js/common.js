
var base_url = $('#base').data('base');

// Enqiry
$('form#enquiry_form').submit(function(e){
    e.preventDefault();
    var form = $(this);
var missing = 0;
 $(this).find('.required').each(function(){
  if ($(this).val().length <1 || $(this).val()=='') {
    $(this).addClass('nofillout');
    missing++;
  
  }
  });

  $('.nofillout').each(function(){
    if ($(this).val().length >1) {
      $(this).removeClass('nofillout');
    }
  });

  if (missing >=1) {
     toastr.error('Please Fill All Required Field');
    return false;
  }

    $.ajax({
        url:base_url+'send_enquiry',
        type:"POST",
        data:form.serialize(),
        beforeSend:function(){
            $('#btn_enq').html('submitting..');
        },
        success:function(data){

        var obj = JSON.parse(data);
        if(obj.status==1){
            toastr.success(obj.msg);
            $('form#enquiry_form')[0].reset();
            $('#btn_enq').html('Sent');
        }else{
          $('#btn_enq').html('Submit');
            var set_v = '';
            if(obj.email){
                set_v = obj.email;
            }
             if(obj.name){
                set_v = obj.name;
            }
            if(obj.phone){
                set_v = obj.phone;
            }
             if(obj.msg){
                set_v = obj.msg;
            }
            
            toastr.error(set_v);
           }
           
        }
    });
})


//////////


// Career form

$('form#career_form').submit(function(e){
    e.preventDefault();
   var formData = new FormData(this);
var missing = 0;
 $(this).find('.required').each(function(){
  if ($(this).val().length <1 || $(this).val()=='') {
    $(this).addClass('nofillout');
    missing++;
  
  }
  });

  $('.nofillout').each(function(){
    if ($(this).val().length >1) {
      $(this).removeClass('nofillout');
    }
  });

  if (missing >=1) {
     toastr.error('Please Fill All Required Field');
    return false;
  }

    $.ajax({
        url:base_url+'save_career_enquiry',
        type:"POST",
         data:formData,
        cache:false,
        contentType: false,
        processData: false,
        beforeSend:function(){
            $('#btn_enq').html('submitting..');
        },
        success:function(data){

        var obj = JSON.parse(data);
        if(obj.status==1){
            toastr.success(obj.msg);
            $('form#career_form')[0].reset();
            $('#btn_enq').html('Sent');
    
            
        }else{
          $('#btn_enq').html('Submit');
            var set_v = '';
            if(obj.email){
                set_v = obj.email;
            }
             if(obj.firstName){
                set_v = obj.firstName;
            }
            if(obj.phone){
                set_v = obj.phone;
            }
              if(obj.resume){
                set_v = obj.resume;
            }
            
             if(obj.designation){
                set_v = obj.designation;
            }
             if(obj.msg){
                set_v = obj.msg;
            }
            
            toastr.error(set_v);
           }
           
        }
    });
})



// blog form
 $('form#blog_form').submit(function(e){
    e.preventDefault();

     var form = $(this);

$('#error_email').html('');

    var missing = 0;
    $(this).find('.required').each(function(){
      if ($(this).val().length <1 || $(this).val()=='') {
        $(this).addClass('nofillout');
        missing++;
      
      }
    });
    
   $('.nofillout').each(function(){
     if ($(this).val().length >1) {
      $(this).removeClass('nofillout');
      }
    });
    
   if (missing >=1) {
       toastr.error('Please Fill All Required Field');
      return false;
    } 


    $.ajax({
      url:base_url+'save_blog_enquiry',
      type:"POST",
      data:form.serialize(),
      beforeSend:function(){
        $('#btn_save').html('Processing...');
      },
      success:function(data){ 
        var obj = JSON.parse(data);
        if(obj.status==1){
          $('#btn_save').html('Sent');
           toastr.success(obj.msg);
          $('form#blog_form')[0].reset();   
      
        }else{
            
           $('#btn_save').html('Submit');
            var set_v = '';
         
            if(obj.name){
                set_v = obj.name;
            }
             if(obj.email){
                set_v = obj.email;
            }
            if(obj.phone){
                set_v = obj.phone;
            }
            
             if(obj.msg){
                set_v = obj.msg;
            }          
            toastr.error(set_v);
        }
      },
      
    });
  });

//////////////

// downlaod fom

 $('form#download_form').submit(function(e){
    e.preventDefault();

     var form = $(this);

$('#error_email').html('');

    var missing = 0;
    $(this).find('.required').each(function(){
      if ($(this).val().length <1 || $(this).val()=='') {
        $(this).addClass('nofillout');
        missing++;
      
      }
    });
    
   $('.nofillout').each(function(){
     if ($(this).val().length >1) {
      $(this).removeClass('nofillout');
      }
    });
    
   if (missing >=1) {
       toastr.error('Please Fill All Required Field');
      return false;
    } 

    if(!$('#terms').prop('checked') == true)
    {
       toastr.error('Please accept terms!');
      return false;
    }



    $.ajax({
      url:base_url+'save_downlaod_enquiry',
      type:"POST",
      data:form.serialize(),
      beforeSend:function(){
        $('#btn_save').html('Processing...');
      },
      success:function(data){ 
        var obj = JSON.parse(data);
        if(obj.status==1){
          $('#btn_save').html('Sent');
          $('#dlink').attr('href',obj.link,true);
          $('#dlink')[0].click();
          
           toastr.success(obj.msg);
          $('form#download_form')[0].reset();   
      
        }else{
            
           $('#btn_save').html('Submit');
            var set_v = '';
         
            if(obj.name){
                set_v = obj.name;
            }
             if(obj.email){
                set_v = obj.email;
            }
            if(obj.phone){
                set_v = obj.phone;
            }
            
             if(obj.msg){
                set_v = obj.msg;
            }          
            toastr.error(set_v);
        }
      },
      
    });
  });




////////////////////



// subscribe

$('form#subscribe').submit(function(e){
    var form = $(this);
    e.preventDefault();
    
     var missing = 0;
     $(this).find('.required').each(function(){
      if ($(this).val().length <1 || $(this).val()=='') {
        $(this).addClass('nofillout');
        missing++;
      
      }
      });
    
      $('.nofillout').each(function(){
        if ($(this).val().length >1) {
          $(this).removeClass('nofillout');
        }
      });
    
      if (missing >=1) {
         toastr.error('Please Fill All Required Field');
        return false;
      }
    
    
    
    $.ajax({
      url:base_url+'subscribe',
      type:"POST",
      data:form.serialize(),
      success:function(data){
        var obj = JSON.parse(data);
        if (obj.status==1) {
          $('form#subscribe')[0].reset();
          $('#newsletter-form').modal('hide');
          toastr.success(obj.msg);
        }else{
          toastr.error(obj.msg);
        }
      }
    });
  });
  
  
  



//////////////

// Search


   $('#keyword').on('keyup',function(){
        let keyword = $(this).val();
        $.ajax({
            url:base_url+'search_result',
            type:"POST",
            data:{keyword:keyword},
            success:function(res){
           
                let obj = JSON.parse(res)
                if(obj.status==1){
                    $('#searchResult').html(obj.data);
                }else{
                    $('#searchResult').html('');
                    
                }
            }
        })
    })


var swiper = new Swiper("#blogpage_slide", {
      slidesPerView: 1,
      spaceBetween: 40,
      autoplay: { 
        delay: 3500,
        disableOnInteraction: false,
      },
        pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
});


// general validation

$(".isnumber").on("keypress keyup blur",function (event) {    
$(this).val($(this).val().replace(/[^\d].+/, ""));
if ((event.which < 48 || event.which > 57)) {
    event.preventDefault();
    return false;
}
});  


$('.txtOnly').keypress(function (e) {
      var regex = new RegExp("^[a-zA-Z ]+$");
      var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
      if (regex.test(str)) {
        return true;
      }
      else
      {
      e.preventDefault();
      return false;
      }
    });
    
$('.address').keypress(function (e) {
      var regex = new RegExp("^[a-zA-Z0-9-/, ]+$");
      var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
      if (regex.test(str)) {
        return true;
      }
      else
      {
      e.preventDefault();
      return false;
      }
    });    
    
    
 $('.copypeste').on("cut copy paste",function(e) {
      e.preventDefault();
   });
   
//  end validation
