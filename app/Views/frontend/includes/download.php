<?php $home = service('uri')->getSegment(1); $pageName=  $home==''?'Case Study':'White Paper';;  ?>


<!-- Modal -->
<div class="modal fade downLoad_modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      
      <form id="download_form" ><div class="title-wrap text-center mb-4">
                    <h2 class="title">Get The <?php echo $pageName; ?>.</h2>
                    <a href="" download id="dlink"></a>

                </div>
                
        <input type="hidden" name="blog" id="blog_id" value="">        
                
        <div class="form-floating">
        <input type="text" name="name" class="form-control required txtOnly" id="floatingInput" placeholder="Name">
        <label for="floatingInput">Name *</label>
        </div>
        <div class="form-floating">
        <input type="email" name="email" class="form-control required" id="floatingemail" placeholder="Email">
        <label for="floatingemail"> Email *</label>
        </div>
        <div class="form-floating">
        <input type="text" name="designation" class="form-control required" id="floatingdesignation" placeholder="Designation ">
        <label for="floatingemail"> Designation *</label>
        </div>
        <div class="form-floating">
        <input type="text" name="company" class="form-control required" id="floatingcompany" placeholder="Company Name">
        <label for="floatingemail"> Company Name *</label>
        </div>  
        <div class="form-floating">
        <input type="text" name="phone" class="form-control required isnumber" id="floatingmobile" maxlength="11" placeholder="Mobile">
        <label for="floatingmobile">Mobile *</label>
        </div>
        
        <div class="d-flex gap-2 mb-0 my-3">
        <input type="checkbox" value="1" name="terms" id="terms">
            <label for="floatingmobile"><p>By ticking this box, I agree to the <a href="https://atnatechnologies.com/term-and-condition">Terms of Use</a> &amp; <a href="https://atnatechnologies.com/privacy-policy">Privacy Policy</a> mentioned by Atna Technologies.</p>
        </label>
        </div> 
        <button id="btn_save" class="btn btn-theme border-0 w-100">Download <?php echo $pageName; ?> <svg width="18" height="12" viewBox="0 0 25 12" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M24.581 6.827a.75.75 0 0 0 0-1.06L19.808.994a.75.75 0 0 0-1.06 1.06l4.242 4.243-4.242 4.243a.75.75 0 0 0 1.06 1.06zM.21 7.047h23.841v-1.5H.21z" fill="#fff"></path></svg></button>
        <div style="display:none"><label>Fill This Field</label><input type="text" name="honeypot" value=""></div></form>
        

      </div>
    </div>
  </div>
</div>

<script>
    $('.subscribe').on('click',function(){
    let blog = $(this).data('blogid');
    $('#blog_id').val(blog);
    });
   
</script>