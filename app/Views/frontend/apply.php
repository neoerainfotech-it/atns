<?php 
$this->extend('layouts/master');
$this->section('page');
$transparentHeader = true
?>


<section class="sec-p ">
    <div class="container">
        <div class="row g-5 ">
            <div class="col-lg-7">
                <div class="title-wrap job_desc" data-cues="slideInUp">
                    <h2 class="title "><?php echo $detail->title; ?></h2>
                    <ul class="d-flex">
                        <li><?php echo $detail->jobType?$detail->jobType:''; ?></li>
                        <li>Location : <?php echo $detail->location?$detail->location:''; ?></li>
                    </ul>
                    
                     <?php echo $detail->responsibility; ?>

                   <!--  <h5>Job Description</h5>
                    <p>We are looking for an organized sales and marketing manager to assist in the advertising and selling of our company's products and to create 
                    competitive advantages for our company in the market industry. The sales and marketing manager represents the company's brand and drives strategies 
                    to increase product awareness by observing the market, competitors, and industry trends.</p>
                    
                    <h5>Key Responsibilities</h5>
                    <ul>
                        <li>Promoting the company's existing brands and introducing new products to the market.</li>
                         <li>Analyzing budgets, preparing annual budget plans, scheduling expenditures, and ensuring that the sales team meets their quotas and goals.</li>
                    </ul>
                    <h5>Requirements</h5>
                    <ul>
                        <li>Qualification : Any Graduate</li>
                         <li>Industry : Any</li>
                        <li>Experience : 3-6</li>
                         <li>Category: Graphic Designer</li>
                        <li>Skills : Corel Draw, Photoshop</li>
                         <li>Remuneration : Negotiable</li>
                    </ul> -->
                </div>
            </div>
            <div class="col-lg-5">
                <div class="apply_form">
                    <p>Please use this form to apply for this position. Our HR will review your application and if shortlisted you will receive a call very soon.</p>
                  
                    <form id="career_form">
                      <input type="hidden" name="job_id" value="<?php echo $detail->id; ?>">
                          <div class="form-group">
                            <label for="Name">Full Name</label>
                            <input type="text" class="form-control txtOnly required" name="name" id="Name" >
                          </div>
                          <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control required"  name="email"  id="email" >
                          </div>
                          <div class="form-group">
                            <label for="Phone">Phone</label>
                            <input type="text" class="form-control required isnumber" maxlength="11"  name="phone"  id="Phone" >
                          </div>
                          <div class="form-group">
                            <label for="Position">Position</label>
                            <input type="text" class="form-control required"  name="position"  id="Position" >
                          </div >

                          <div class="file_field form-group ">
                            <label for="resume"><svg width="15" height="17" viewBox="0 0 15 17" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M12.5852 8.92382L7.55221 13.965C6.89239 14.5514 6.03347 14.8635 5.15113 14.8375C4.26879 14.8116 3.42972 14.4495 2.80554 13.8253C2.18136 13.2011 1.81925 12.362 1.79328 11.4797C1.7673 10.5973 2.07943 9.73838 2.66581 9.07856L9.18101 2.5633C9.56999 2.1938 10.086 1.98778 10.6225 1.98778C11.159 1.98778 11.675 2.1938 12.064 2.5633C12.443 2.94736 12.6555 3.46523 12.6555 4.0048C12.6555 4.54437 12.443 5.06223 12.064 5.4463L6.44462 11.0576C6.38901 11.1175 6.32215 11.1658 6.24785 11.1999C6.17355 11.2339 6.09327 11.253 6.0116 11.256C5.92992 11.259 5.84845 11.246 5.77184 11.2175C5.69522 11.189 5.62496 11.1458 5.56507 11.0901C5.50518 11.0345 5.45683 10.9677 5.42278 10.8934C5.38873 10.8191 5.36965 10.7388 5.36662 10.6571C5.3636 10.5754 5.37669 10.494 5.40515 10.4174C5.43361 10.3407 5.47688 10.2705 5.5325 10.2106L9.71037 6.04082C9.86372 5.88746 9.94988 5.67947 9.94988 5.46259C9.94988 5.24571 9.86372 5.03771 9.71037 4.88436C9.55701 4.731 9.34902 4.64485 9.13214 4.64485C8.91527 4.64485 8.70728 4.731 8.55392 4.88436L4.37605 9.07042C4.167 9.27785 4.00107 9.52461 3.88784 9.79648C3.77461 10.0683 3.71632 10.3599 3.71632 10.6544C3.71632 10.9489 3.77461 11.2405 3.88784 11.5124C4.00107 11.7843 4.167 12.031 4.37605 12.2385C4.8031 12.6452 5.37028 12.8721 5.96006 12.8721C6.54984 12.8721 7.11702 12.6452 7.54407 12.2385L13.1553 6.61905C13.8026 5.92432 14.1551 5.00544 14.1383 4.056C14.1215 3.10655 13.7369 2.20068 13.0655 1.52922C12.394 0.857755 11.4882 0.473133 10.5387 0.456382C9.58929 0.43963 8.67042 0.792056 7.9757 1.43941L1.4605 7.95468C0.581924 8.92776 0.11269 10.2023 0.150564 11.5128C0.188438 12.8233 0.730498 14.0686 1.6638 14.9893C2.59711 15.9101 3.84968 16.4352 5.16055 16.4552C6.47141 16.4753 7.73947 15.9888 8.70051 15.097L13.7416 10.064C13.8176 9.98806 13.8778 9.89791 13.9189 9.7987C13.96 9.69949 13.9812 9.59315 13.9812 9.48576C13.9812 9.37838 13.96 9.27204 13.9189 9.17283C13.8778 9.07361 13.8176 8.98347 13.7416 8.90753C13.6657 8.8316 13.5756 8.77137 13.4764 8.73027C13.3771 8.68917 13.2708 8.66802 13.1634 8.66802C13.056 8.66802 12.9497 8.68917 12.8505 8.73027C12.7513 8.77137 12.6611 8.8316 12.5852 8.90753V8.92382Z" fill="#525252"/>
</svg>
 Attach Resume/Cv</label>
                            <input type="file"  name="resume"  class="form-control " id="resume" ><br>
                            <p class="results mt-2 mb-0"> </p>
                          </div>
                          <button type="submit" class="btn btn-theme btn-icon mt-4">Submit <span class="icon"><svg width="16" height="12" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 5.25a.75.75 0 0 0 0 1.5zm14.53 1.28a.75.75 0 0 0 0-1.06L10.757.697a.75.75 0 0 0-1.06 1.06L13.939 6l-4.242 4.243a.75.75 0 0 0 1.06 1.06zM1 6.75h14v-1.5H1z" fill="#fff"></path></svg></span></button>
                    </form>
                </div>
            </div>
            
        </div>
    </div>

</section>



<?php $this->endSection(); ?>