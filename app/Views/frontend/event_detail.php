<?php 

$this->extend('layouts/master');

$this->section('page');

$transparentHeader = true;

?>



<style>

/* ==========================================================================

       ATNA PREMIUM ADAPTIVE SYSTEM ENGINE (PURE DYNAMIC DATA PIPELINE)

       ========================================================================== */

    .atna-viewport-wrapper {

        width: 100%;

        background-color: #f8fafc;

        padding-bottom: 80px;

        font-family: 'Segoe UI', Arial, sans-serif;

        box-sizing: border-box;

    }



    /* GLOBAL HEADER */

    .webinar-header-block {

        text-align: center;

        padding: 50px 15px 35px 15px;

    }



    .webinar-main-title {

        font-size: 2.5rem;

        font-weight: 800;

        color: #0f172a;

        line-height: 1.3;

        max-width: 1100px;

        margin: 0 auto 15px auto;

        letter-spacing: -0.02em;

    }



    .webinar-date-badge {

        display: inline-block;

        color: #1e293b;

        font-weight: 600;

        font-size: 0.9rem;

        background-color: #ffffff;

        padding: 8px 24px;

        border-radius: 50px;

        border-left: 4px solid #2b6df6;

        box-shadow: 0 4px 12px rgba(0,0,0,0.03);

    }



    /* MASTER 2-COLUMN RESPONSIVE GRID */

    .webinar-main-grid-system {

        display: grid;

        grid-template-columns: 1.35fr 1fr;

        gap: 32px;

        max-width: 1240px;

        margin: 0 auto;

        padding: 0 20px 50px 20px;

        align-items: start;

        box-sizing: border-box;

    }



    /* LEFT VIEWSTREAM WRAPPER */

    .left-stream-stack {

        display: flex;

        flex-direction: column;

        gap: 30px;

        min-width: 0; /* Prevents layout blowout on tiny screens */

    }



    /* Premium Content Cards Styling */

    .premium-dynamic-content-card {

        background: #ffffff;

        border: 1px solid #e2e8f0;

        border-radius: 18px;

        padding: 40px 32px;

        box-shadow: 0 10px 30px rgba(0,0,0,0.01);

    }



    /* CKEditor Content Reset Styles for Perfect Responsive Flow */

    .db-rendered-html-node {

        word-wrap: break-word;

        word-break: break-word;

    }

    .db-rendered-html-node p {

        font-size: 0.98rem;

        color: #475569;

        line-height: 1.75;

        margin-bottom: 16px;

    }

    .db-rendered-html-node ul, .db-rendered-html-node ol {

        padding-left: 20px;

        margin-bottom: 16px;

        color: #475569;

    }

    .db-rendered-html-node li {

        margin-bottom: 8px;

        line-height: 1.6;

        font-size: 0.95rem;

    }



    /* BOTTOM DYNAMIC SUBGRID */

    .highlights-fluid-subgrid {

        display: grid;

        grid-template-columns: 1fr 1fr;

        gap: 24px;

    }



    /* Card 1: Dynamic Challenges (Gradient) */

    .dynamic-challenges-gradient-card {

        background: linear-gradient(135deg, #2b6df6, #4f7dff);

        border-radius: 18px;

        box-shadow: 0 12px 30px rgba(43, 109, 246, 0.15);

        color: #ffffff;

        padding: 30px 24px;

    }



    .dynamic-challenges-gradient-card h2 {

        font-size: 1.4rem;

        font-weight: 700;

        margin-bottom: 18px;

        color: #ffffff;

    }



    /* Card 2: Reserve Spot Interactive Framework */

    .reserve-spot-white-card {

        background: #ffffff;

        border: 1px solid #e2e8f0;

        border-radius: 18px;

        box-shadow: 0 10px 30px rgba(0,0,0,0.02);

        padding: 30px 24px;

        text-align: center;

        display: flex;

        flex-direction: column;

        justify-content: center;

        align-items: center;

    }



    .reserve-spot-white-card h2 {

        font-size: 1.4rem;

        font-weight: 700;

        color: #0f172a;

        margin-bottom: 12px;

    }



    .reserve-spot-white-card p {

        font-size: 0.9rem;

        color: #64748b;

        line-height: 1.6;

        margin-bottom: 20px;

    }



    .scroll-action-orange-btn {

        display: inline-block;

        background: linear-gradient(135deg, #ff6b2c, #ff8a50);

        color: #ffffff !important;

        padding: 12px 26px;

        border-radius: 10px;

        font-size: 0.92rem;

        font-weight: 700;

        text-decoration: none !important;

        box-shadow: 0 6px 18px rgba(255, 107, 44, 0.25);

        border: none;

        cursor: pointer;

        transition: transform 0.2s;

    }

    .scroll-action-orange-btn:hover { transform: translateY(-1px); }



    /* RIGHT SIDEBAR: UNIFIED REGISTRATION MODULE */

    .sidebar-form-card-container {

        background: #ffffff;

        border: 1px solid #e2e8f0;

        border-radius: 18px;

        padding: 32px 26px;

        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.05);

        position: sticky;

        top: 30px;

        box-sizing: border-box;

    }



    .sidebar-form-card-container::before {

        content: '';

        position: absolute; top: 0; left: 0; width: 100%; height: 5px;

        background: linear-gradient(90deg, #2b6df6, #4f7dff);

        border-top-left-radius: 18px; border-top-right-radius: 18px;

    }



    .sidebar-form-card-container h3 { color: #0f172a; font-weight: 700; font-size: 1.4rem; margin-bottom: 6px; }

    .sidebar-form-card-container p { color: #64748b; font-size: 0.88rem; margin-bottom: 24px; line-height: 1.45; }



    .form-group-custom { margin-bottom: 16px; text-align: left; }

    .label-custom { display: block; font-weight: 700; color: #475569; font-size: 0.72rem; margin-bottom: 6px; text-transform: uppercase; letter-spacing: 0.04em; }

    .input-custom { width: 100%; padding: 11px 14px; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 0.92rem; color: #0f172a; background-color: #ffffff; box-sizing: border-box; }

    .input-custom:focus { border-color: #2b6df6; box-shadow: 0 0 0 4px rgba(43, 109, 246, 0.12); outline: none; }



    .btn-submit-premium {

        background: linear-gradient(135deg, #0083BF, #00628f);

        color: #ffffff !important;

        font-weight: 700; font-size: 1rem; width: 100%; padding: 13px; border: none; border-radius: 8px;

        box-shadow: 0 6px 15px rgba(0, 131, 191, 0.22); cursor: pointer; margin-top: 5px;

    }



    /* CORE SECTIONS LOWER SYSTEM (SOLUTION & BENEFITS FIELDS) */

    .lower-matrix-wrapper-section {

        background-color: #ffffff;

        border-top: 1px solid #edf2f7;

        padding: 65px 0;

    }



    .lower-matrix-dual-grid {

        display: grid;

        grid-template-columns: 1fr 1fr;

        gap: 35px;

        max-width: 1240px;

        margin: 0 auto;

        padding: 0 20px;

    }



    .lower-matrix-header-title {

        font-size: 1.75rem;

        font-weight: 800;

        color: #0f172a;

        margin-bottom: 20px;

        border-bottom: 3px solid #edf2f7;

        padding-bottom: 10px;

    }



    /* ==========================================================================

       DYNAMIC RESPONSIVE MEDIA BREAKPOINTS (ALL SMARTPHONE & TABLET LAYOUTS)

       ========================================================================== */

    @media (max-width: 1200px) {

        .webinar-main-grid-system { gap: 24px; padding: 0 15px 40px 15px; }

        .lower-matrix-dual-grid { gap: 25px; padding: 0 15px; }

    }



@media (max-width: 991px) {

        /* 1. MAIN PAGE LAYOUT: Stack the content card and form vertically */

        .webinar-main-grid-system { 

            grid-template-columns: 1fr !important; 

            display: grid !important;

            gap: 35px; 

        }



        .sidebar-form-card-container { 

            order: -1; /* Keeps the form at the top on mobile */

            position: static; 

            width: 100%;

        }



        /* =========================================================

           2. THE FIX: FORCE INNER CONTENT INTO HORIZONTAL CAROUSEL

           ========================================================= */

        

        /* Target the wrapper of the columns (fixes tables, ckeditor grids, and inline flex) */

        .db-rendered-html-node > div,

        .db-rendered-html-node [style*="display: flex"],

        .db-rendered-html-node [style*="display: grid"],

        .db-rendered-html-node .ck-columns,

        .db-rendered-html-node table,  

        .db-rendered-html-node tbody, 

        .db-rendered-html-node tr {



            overflow-x: auto !important;

            -webkit-overflow-scrolling: touch;

            width: 100% !important;

            gap: 20px !important;

            padding-bottom: 15px !important;

        }



        /* Target the actual columns (the white area and blue area) */

        .db-rendered-html-node > div > div,

        .db-rendered-html-node [style*="display: flex"] > *,

        .db-rendered-html-node [style*="display: grid"] > *,

        .db-rendered-html-node .ck-column,

        .db-rendered-html-node td, 

        .db-rendered-html-node th {

            flex: 0 0 88% !important; /* Make each column take 88% of mobile screen */

            min-width: 280px !important; /* THE MAGIC FIX: Stops text from squishing */

            max-width: none !important;

            width: auto !important;

            display: block !important; /* Overrides table-cell behavior */

            border: none !important;

        }



        /* Hide the ugly scrollbar for a clean app-like swipe feel */

        .db-rendered-html-node > div::-webkit-scrollbar,

        .db-rendered-html-node table::-webkit-scrollbar,

        .db-rendered-html-node [style*="display: flex"]::-webkit-scrollbar {

            display: none;

        }

        

        .lower-matrix-dual-grid { 

            grid-template-columns: 1fr !important; 

            gap: 40px;

        }

    }

    @media (max-width: 680px) {

        .highlights-fluid-subgrid { 

            grid-template-columns: 1fr !important; 

            gap: 20px;

        }

        .premium-dynamic-content-card { padding: 30px 20px; }

        .webinar-main-title { font-size: 1.95rem; }

    }



    @media (max-width: 768px) {

        .your-column-container-class {

            display: grid;

            grid-template-columns: 1fr; 

            width: 100%;

        }

    }

</style>



<div class="atna-viewport-wrapper">



    <div class="webinar-header-block">

        <h1 class="webinar-main-title"><?= esc($detail->title); ?></h1>

        <div class="webinar-date-badge">

            <strong>Schedule:</strong> <?= esc($detail->upcomingDate ?? 'Live Webinar Session'); ?>

        </div>

        <div style="margin-top: 15px;">

            <?php echo $this->include('frontend/includes/share'); ?>

        </div>

    </div>



    <?php if(isset($detail->type) && $detail->type == 'EVENT'): ?>

        

        <div class="webinar-main-grid-system">

            

            <div class="left-stream-stack">

                

                <div class="premium-dynamic-content-card">

                    <div style="color: #2b6df6; font-size: 1.1rem; font-weight: 700; text-transform: uppercase; margin-bottom: 20px; letter-spacing: 0.02em;">

                        Event Overview & Objectives

                    </div>

                    <div class="db-rendered-html-node">

                        <?= $detail->description; ?>

                    </div>

                </div>



                



            </div>



            <div class="sidebar-form-card-container" id="registration-card-form-node">

                <h3>Register Now</h3>

                <p>Fill out the details below to secure your private corporate access credentials.</p>



                <form action="<?= base_url('webinar-registration'); ?>" method="POST">

                    <?= csrf_field() ?>

                    

                    <input type="hidden" name="service" value="<?= esc($detail->service ?? ''); ?>">

                    <input type="hidden" name="product" value="<?= esc($detail->product ?? ''); ?>">

                    <input type="hidden" name="country" value="India">

                    <input type="hidden" name="message" value="Automated Data Pipeline Sync Submission for ID: <?= esc($detail->id); ?>">



                    <div class="form-group-custom">

                        <label class="label-custom">Name *</label>

                        <input type="text" name="name" class="input-custom" placeholder="First and last name" required>

                    </div>



                    <div class="form-group-custom">

                        <label class="label-custom">Company Name *</label>

                        <input type="text" name="company" class="input-custom" placeholder="Your organization name" required>

                    </div>



                    <div class="form-group-custom">

                        <label class="label-custom">Title *</label>

                        <input type="text" name="title" class="input-custom" placeholder="e.g., Strategic Department Lead" required>

                    </div>



                    <div class="form-group-custom">

                        <label class="label-custom">Business Email Address *</label>

                        <input type="email" name="email" class="input-custom" placeholder="name@company.com" 

                               pattern="^[a-zA-Z0-9._%+-]+@(?!gmail\.com)(?!yahoo\.com)(?!outlook\.com)(?!hotmail\.com)(?!live\.com)[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$"

                               title="Corporate registration requirements strictly prohibit utilizing shared public address arrays." required>

                    </div>



                    <div class="form-group-custom">

                        <label class="label-custom">Phone Number *</label>

                        <input type="tel" name="phone" class="input-custom" placeholder="Enter your mobile number" 

                               pattern="[0-9]{10,12}" title="Please enter a valid numeric sequence containing 10 to 12 digits only." required>

                    </div>



                    <div class="form-group-custom">

                        <label class="label-custom">What are you expecting from this webinar? *</label>

                        <textarea name="expectation" class="input-custom" rows="2" placeholder="Describe core operational goals..." required></textarea>

                    </div>



                    <div class="form-group-custom">

                        <label class="label-custom">Which transaction system is your organization using? *</label>

                        <select name="erp_system" class="input-custom" style="appearance: auto !important;" required>

                            <option value="" disabled selected>Choose your current infrastructure</option>

                            <option value="Microsoft Dynamics 365">Microsoft Dynamics 365</option>

                            <option value="SAP">SAP</option>

                            <option value="Oracle">Oracle</option>

                            <option value="Tally">Tally</option>

                            <option value="QuickBooks">QuickBooks</option>

                            <option value="Excel / Manual Spreadsheets">Excel / Manual Spreadsheets</option>

                            <option value="Other System Infrastructure">Other System Infrastructure</option>

                        </select>

                    </div>



                    <button type="submit" class="btn-submit-premium">Register For Webinar</button>



                    <?php if (session()->getFlashdata('webinar_success')): ?>

                        <div style="color: #0083BF; font-weight: 700; text-align: center; margin-top: 15px; font-size: 0.92rem; padding: 10px; background-color: rgba(0, 131, 191, 0.08); border-radius: 6px;">

                            <i class="fas fa-check-circle"></i> <?= session()->getFlashdata('webinar_success'); ?>

                        </div>

                    <?php endif; ?>



                    <?php if (session()->getFlashdata('webinar_error')): ?>

                        <div style="color: #ea4335; font-weight: 600; text-align: center; margin-top: 15px; font-size: 0.88rem; padding: 10px; background-color: rgba(234, 67, 53, 0.08); border-radius: 6px;">

                            <i class="fas fa-exclamation-circle"></i> <?= session()->getFlashdata('webinar_error'); ?>

                        </div>

                    <?php endif; ?>

                </form>

            </div>



        </div>





    <?php else: ?>

        <div class="container" style="max-width: 860px; margin: 0 auto; padding: 0 15px;">

            <div class="premium-dynamic-content-card db-rendered-html-node">

                <?= $detail->description; ?>

            </div>

        </div>

    <?php endif; ?>



</div>



<script>

    document.addEventListener("DOMContentLoaded", function() {

        const formTargetContainer = document.getElementById('registration-card-form-node');

        const triggerScrollBtn = document.getElementById('trigger-mobile-scroll-anchor');



        if(triggerScrollBtn && formTargetContainer) {

            triggerScrollBtn.addEventListener("click", function(e) {

                e.preventDefault();

                formTargetContainer.scrollIntoView({ behavior: "smooth", block: "center" });

                const firstInputFieldNode = document.getElementsByName("name")[0];

                if(firstInputFieldNode) firstInputFieldNode.focus();

            });

        }

    });

</script>



<?php echo $this->include('frontend/includes/bottom_section'); ?>

<?php $this->endSection(); ?>