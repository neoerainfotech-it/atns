<?php 
$this->extend('layouts/master');
$this->section('page');
$transparentHeader = true;
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

<style>
    /* ==========================================================================
       DESIGN TOKENS — Scoped strictly to prevent layout pollution
       ========================================================================== */
    .page-partners {
        --atna-primary:    #0d2c6c;
        --atna-secondary:  rgb(27, 71, 146);
        --atna-bg-light:   #f8f9fb;
        --atna-text-dark:  #1a1a1a;
        --atna-border:      rgba(13, 44, 108, 0.08);
        --atna-card-rad:   1rem;
        --section-py:      5rem;
        --section-py-sm:   3rem;

        font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
        color: var(--atna-text-dark);
        overflow-x: hidden;
    }

    .page-partners h1, .page-partners h2, .page-partners h3, .page-partners h4, .page-partners h5, .page-partners h6 { line-height: 1.25; }
    .page-partners img { display: block; max-width: 100%; height: auto; }

    /* ==========================================================================
       BACKGROUNDS & COMPOSITOR LAYOUTS
       ========================================================================== */
    .bg-enterprise-dark { background: linear-gradient(135deg,  #0083BF 0%, #0d2c6c 100%); }
    
    .network-glow-bg {
        position: relative;
        background-size: cover !important;
        background-position: center right !important;
        background-repeat: no-repeat !important;
        overflow: hidden;
        border-bottom: 1px solid rgba(255, 255, 255, 0.08);
        min-height: 90vh;
        padding-top: 3px !important; 
        display: flex;
        align-items: center;
    }
    .network-glow-bg::before {
        content: '';
        position: absolute; top: 0; left: 0; width: 100%; height: 100%;
        background-image: url("data:image/svg+xml,%3Csvg width='80' height='80' viewBox='0 0 80 80' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg stroke='%23ffffff' stroke-width='0.5' stroke-opacity='0.03'%3E%3Cpath d='M40 0v80M0 40h80'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        z-index: 1; pointer-events: none;
    }
    .hero-blur-orb {
        position: absolute; width: 500px; height: 500px;
        background: radial-gradient(circle, rgba(47, 124, 255, 0.12) 0%, rgba(6, 17, 38, 0) 70%);
        filter: blur(40px); pointer-events: none; z-index: 1;
    }
    .orb-top-right { top: -20%; right: -10%; }
    .orb-bottom-left { bottom: -30%; left: -10%; }

    /* ==========================================================================
       TYPOGRAPHY & BRAND COMPONENT DESIGN ELEMENTS
       ========================================================================== */
    .text-gradient-premium {
        color: #ffffff;
        font-weight: 800;
        letter-spacing: -0.02em;
        text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
    }
    .tracking-wider { letter-spacing: 0.08em; }
    .hero-badge-glow {
        background: rgba(13, 44, 108, 0.6); backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.2); padding: 6px 16px; border-radius: 50px;
        font-size: 0.8rem; font-weight: 600; color: #ffffff; display: inline-flex; align-items: center; gap: 8px;
    }
    .rounded-pill-custom { border-radius: 50px !important; }
    
    .btn-atna-primary {
        background-color: var(--atna-secondary); border: none; color: #fff;
        transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
    }
    .btn-atna-primary:hover {
        background-color: #1a62dc; transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(47, 124, 255, 0.3); color: #fff;
    }
    .btn-outline-custom {
        border: 1px solid rgba(255, 255, 255, 0.4); color: #fff;
        background: rgba(0, 0, 0, 0.25); backdrop-filter: blur(8px);
        transition: all 0.3s ease;
    }
    .btn-outline-custom:hover {
        background: rgba(255, 255, 255, 0.2); border-color: #fff; transform: translateY(-2px); color: #fff;
    }

    /* ==========================================================================
       PREMIUM CARD & UI INTERACTIONS
       ========================================================================== */
    .premium-card-hover {
        transition: transform 0.35s cubic-bezier(0.165, 0.84, 0.44, 1), box-shadow 0.35s ease;
    }
    .premium-card-hover:hover {
        transform: translateY(-6px) scale(1.01);
        box-shadow: 0 20px 40px rgba(13, 44, 108, 0.08) !important;
    }
    .icon-wrapper-circle {
        width: 52px; height: 52px; background: rgba(47, 124, 255, 0.08); color: var(--atna-secondary);
        display: inline-flex; align-items: center; justify-content: center; border-radius: 50%; font-size: 1.3rem;
        flex-shrink: 0;
    }

    /* ==========================================================================
       BRAND MARQUEE GRID LAYOUT STRIP STYLING
       ========================================================================== */
    .marquee-grid-wrapper {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        max-width: 1140px;
        margin: 0 auto;
        flex-wrap: wrap;
    }
    .brand-marquee-node {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 0 35px;
        height: 45px;
        border-right: 1px solid rgba(0, 0, 0, 0.12);
    }
    .brand-marquee-node:last-child {
        border-right: none !important;
    }
    .brand-marquee-node img {
        height: 100%;
        max-height: 42px;
        width: auto;
        object-fit: contain;
        filter: none !important;
        opacity: 1 !important;
        transition: transform 0.25s ease;
    }
    .brand-marquee-node img:hover {
        transform: scale(1.05);
    }

    /* ==========================================================================
       PARTNERSHIPS GRID LAYOUT STYLING
       ========================================================================== */
    .partner-logo-card {
        height: 90px; transition: all 0.4s cubic-bezier(0.25, 1, 0.5, 1);
        background: #ffffff; border: 1px solid rgba(13, 44, 108, 0.06); box-shadow: 0 4px 10px rgba(0,0,0,0.02);
        display: flex; align-items: center; justify-content: center; padding: 15px 25px; border-radius: 8px;
    }
    .partner-logo-card:hover { border-color: var(--atna-secondary); box-shadow: 0 10px 20px rgba(13, 44, 108, 0.06); transform: translateY(-3px); }
    
    .logo-greyscale {
        filter: none !important; opacity: 1 !important; transition: all 0.4s ease; max-height: 42px; max-width: 100%; object-fit: contain;
    }
    .partner-logo-card:hover .logo-greyscale { transform: scale(1.04); }

    /* ==========================================================================
       HIGH-TREND COLOR-CODED SECTORS DESIGN UTILITY TOKENS (SECTION 7)
       ========================================================================== */
    .vertical-app-card {
        background: #ffffff;
        border: 1px solid rgba(0,0,0,0.05);
        border-radius: 1.5rem;
        padding: 2.2rem 1.8rem;
        position: relative;
        overflow: hidden;
        transition: all 0.45s cubic-bezier(0.34, 1.56, 0.64, 1);
        box-shadow: 0 10px 30px rgba(0,0,0,0.02);
    }
    .vertical-app-card:hover {
        transform: translateY(-10px) rotate(1deg);
        box-shadow: 0 25px 50px rgba(13, 44, 108, 0.08) !important;
    }
    .vertical-app-card .card-accent-strip {
        position: absolute; top: 0; left: 0; width: 100%; height: 5px;
    }
    .vertical-app-card .icon-header-box {
        width: 54px; height: 54px; border-radius: 50%; display: flex; align-items: center; justify-content: center;
        font-size: 1.35rem; margin-bottom: 1.25rem; box-shadow: 0 8px 20px rgba(0,0,0,0.04); transition: transform 0.4s ease;
    }
    .vertical-app-card:hover .icon-header-box { transform: scale(1.1) rotate(-8deg); }
    
    .v-card-blue { --accent-clr: #0052cc; --accent-bg: rgba(0,82,204,0.08); }
    .v-card-green { --accent-clr: #2e7d32; --accent-bg: rgba(46,125,50,0.08); }
    .v-card-orange { --accent-clr: #e65100; --accent-bg: rgba(230,81,0,0.08); }
    .v-card-purple { --accent-clr: #6a1b9a; --accent-bg: rgba(106,27,154,0.08); }

    .vertical-app-card.v-card-blue { border-top: 5px solid #0052cc; }
    .vertical-app-card.v-card-green { border-top: 5px solid #2e7d32; }
    .vertical-app-card.v-card-orange { border-top: 5px solid #e65100; }
    .vertical-app-card.v-card-purple { border-top: 5px solid #6a1b9a; }

    .vertical-app-card .icon-header-box { background: var(--accent-bg); color: var(--accent-clr); }
    .vertical-app-card .node-bullet-check { color: var(--accent-clr); }

    .vertical-title-text {
        font-size: 1.25rem; font-weight: 800; color: #111827; margin-bottom: 1.2rem; letter-spacing: -0.01em;
    }
    .vertical-app-node-line {
        font-size: 0.92rem; font-weight: 500; color: #4b5563; transition: color 0.2s ease;
    }
    .vertical-app-card:hover .vertical-app-node-line { color: #1f2937; }

    /* ==========================================================================
       ADVANCED HIGH-TREND ASYMMETRIC PILLARS DESIGN
       ========================================================================== */
    .modern-asymmetric-section {
        background: radial-gradient(circle at 100% 0%, rgba(0, 131, 191, 0.05) 0%, transparent 40%), 
                    radial-gradient(circle at 0% 100%, rgba(13, 44, 108, 0.03) 0%, transparent 45%), #ffffff;
        position: relative;
    }
    .asymmetric-interactive-card {
        background: #ffffff; border: 1px solid rgba(13, 44, 108, 0.06); border-radius: 1.5rem;
        padding: 2.2rem 1.8rem; position: relative; overflow: hidden; z-index: 1;
        transition: all 0.5s cubic-bezier(0.25, 1, 0.33, 1); box-shadow: 0 12px 35px rgba(13, 44, 108, 0.03);
    }
    .asymmetric-interactive-card::before {
        content: ''; position: absolute; width: 160px; height: 160px;
        background: linear-gradient(135deg, rgba(0, 131, 191, 0.07) 0%, rgba(13, 44, 108, 0.03) 100%);
        border-radius: 50%; top: -60px; right: -60px; z-index: -1; transition: transform 0.6s cubic-bezier(0.25, 1, 0.33, 1);
    }
    .asymmetric-interactive-card:hover {
        transform: translateY(-8px) scale(1.02) rotate(0.5deg);
        border-color: rgba(0, 131, 191, 0.35); box-shadow: 0 25px 50px rgba(13, 44, 108, 0.09) !important;
    }
    .asymmetric-interactive-card:hover::before { transform: scale(1.4) translate(-10px, 10px); }
    .asymmetric-interactive-card .icon-shield-frame {
        width: 60px; height: 60px;
        background: linear-gradient(135deg, rgba(27, 71, 146, 0.06) 0%, rgba(0, 131, 191, 0.04) 100%);
        color: var(--atna-secondary); border: 1px solid rgba(27, 71, 146, 0.05);
        display: flex; align-items: center; justify-content: center;
        border-radius: 1rem; font-size: 1.5rem; margin-bottom: 1.5rem; transition: all 0.4s ease;
    }
    .asymmetric-interactive-card:hover .icon-shield-frame {
        background: linear-gradient(135deg, var(--atna-secondary) 0%, #0083BF 100%);
        color: #ffffff; transform: scale(1.08) rotate(-4deg); box-shadow: 0 8px 20px rgba(0, 131, 191, 0.25);
    }
    .asymmetric-card-title {
        font-size: 1.15rem; font-weight: 700; color: #111827; margin-bottom: 0.75rem; letter-spacing: -0.015em;
    }
    .asymmetric-card-desc { font-size: 0.88rem; color: #4b5563; line-height: 1.55; }

    .sec-vpad { padding-top: var(--section-py); padding-bottom: var(--section-py); }

    /* ==========================================================================
       RESPONSIVE SYSTEM BREAKPOINTS
       ========================================================================== */
    @media (max-width: 991.98px) {
        .network-glow-bg {
            background: linear-gradient(180deg, rgba(8, 24, 56, 0.92) 0%, rgba(8, 24, 56, 0.75) 100%), url('<?php echo !empty($banner_image_primary) ? base_url($banner_image_primary) : ''; ?>') !important;
            padding-top: 130px !important; padding-bottom: 60px !important;
        }
        .brand-marquee-node { padding: 0 20px; height: 35px; }
    }
    @media (max-width: 767.98px) {
        .page-partners { --section-py: 4rem; --section-py-sm: 2.5rem; }
        .marquee-grid-wrapper { gap: 25px; justify-content: center; }
        .brand-marquee-node { border-right: none !important; width: 40%; height: 35px; padding: 0 10px; }
    }
    @media (max-width: 480px) {
        .brand-marquee-node { width: 100%; height: 40px; }
    }
</style>

<div class="page-partners">

<!-- SECTION 2: DYNAMIC HERO BANNER WITH BACKGROUND IMAGE -->
<?php 
    $heroBgImg = !empty($banner_image_primary) ? base_url($banner_image_primary) : (!empty($banner_image_secondary) ? base_url($banner_image_secondary) : '');
    
    // Gradient overlay mask ensuring clear text readability on the left while fading to reveal background image on the right
    $heroBgStyle = "background: linear-gradient(90deg, rgba(8, 24, 56, 0.92) 0%, rgba(8, 24, 56, 0.75) 50%, rgba(8, 24, 56, 0.35) 100%), url('" . $heroBgImg . "');";
?>
<section class="inner_banner position-relative overflow-hidden network-glow-bg" style="<?php echo $heroBgStyle; ?>">
    <div class="hero-blur-orb orb-top-right"></div>
    <div class="hero-blur-orb orb-bottom-left"></div>
    
    <div class="container-xl position-relative" style="z-index: 2;">
        <div class="row align-items-center">
            <div class="col-lg-8 col-xl-7 text-center text-lg-start">
                
                <div class="d-flex flex-wrap gap-2 justify-content-center justify-content-lg-start mb-3">
                    <?php if(!empty($banner_badge_1)): ?><span class="hero-badge-glow"><i class="fab fa-microsoft text-info"></i> <?php echo htmlspecialchars($banner_badge_1); ?></span><?php endif; ?>
                    <?php if(!empty($banner_badge_2)): ?><span class="hero-badge-glow"><i class="bi bi-cpu-fill text-warning"></i> <?php echo htmlspecialchars($banner_badge_2); ?></span><?php endif; ?>
                </div>

                <h1 class="display-4 fw-bold mb-3 text-gradient-premium">
                    <?php echo !empty($banner_title) ? htmlspecialchars($banner_title) : 'Digital Transformation Through Strategic Alliances'; ?>
                </h1>

                <!-- Applied justification directly to the paragraph body -->
                <p class="lead mb-4 text-white fs-6 lh-base opacity-90" style="max-width: 735px; text-shadow: 0 1px 4px rgba(0,0,0,0.5); text-align: justify;">
                    <?php echo !empty($banner_description) ? htmlspecialchars($banner_description) : 'At ATNA Technologies, we collaborate with leading global technology providers...'; ?>
                </p>

                <div class="py-2 border-top border-bottom border-light border-opacity-20 mb-4" style="max-width: 735px;">
                    <span class="small text-uppercase tracking-wider text-white fw-semibold d-block mb-2" style="font-size:0.7rem; opacity:0.85;"><?php echo !empty($trusted_verticals_text) ? htmlspecialchars($trusted_verticals_text) : ''; ?></span>
                    <div class="d-flex flex-wrap justify-content-center justify-content-lg-start gap-3 text-white small" style="font-size:0.82rem;">
                        <?php 
                        $sectors = !empty($inline_sectors_list) ? explode('|', $inline_sectors_list) : ['Manufacturing', 'Retail & E-comm', 'BFSI'];
                        foreach($sectors as $idx => $sector):
                        ?>
                            <span class="d-flex align-items-center"><i class="fas fa-circle-check text-info me-2"></i><?php echo htmlspecialchars(trim($sector)); ?></span>
                            <?php if($idx < count($sectors) - 1): ?><span class="opacity-25 d-none d-sm-inline">|</span><?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="d-flex flex-wrap gap-3 justify-content-center justify-content-lg-start pt-1">
                    <a href="<?php echo !empty($cta_url_1) ? htmlspecialchars($cta_url_1) : '#contact'; ?>" class="btn btn-atna-primary rounded-pill-custom px-4 py-2.5 fw-bold shadow-sm text-uppercase tracking-wider small" style="font-size:0.75rem;"><?php echo !empty($cta_label_1) ? htmlspecialchars($cta_label_1) : 'Talk to Our Experts'; ?></a>
                    <a href="<?php echo !empty($cta_url_2) ? htmlspecialchars($cta_url_2) : '#ecosystem'; ?>" class="btn btn-outline-custom rounded-pill-custom px-4 py-2.5 fw-bold text-uppercase tracking-wider small" style="font-size:0.75rem;"><?php echo !empty($cta_label_2) ? htmlspecialchars($cta_label_2) : 'Explore Our Solutions'; ?></a>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- SECTION 4: ECOSYSTEM ALLIANCES OVERVIEW -->
<section id="ecosystem" class="sec-vpad bg-white border-bottom">
    <div class="container-xl">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-9 col-xl-8 text-center">
                <span class="text-uppercase fw-bold small tracking-wider mb-2 d-block" style="color: var(--atna-secondary);"><?php echo !empty($ecosystem_badge) ? htmlspecialchars($ecosystem_badge) : 'Our Partner Ecosystem'; ?></span>
                <h2 class="h2 fw-bold text-dark mb-3"><?php echo !empty($ecosystem_title) ? htmlspecialchars($ecosystem_title) : 'Global Alliances That Fuel Innovation'; ?></h2>
                <p class="fs-5 text-muted lh-base mb-0"><?php echo !empty($ecosystem_description) ? htmlspecialchars($ecosystem_description) : ''; ?></p>
            </div>
        </div>

        <div class="pt-4 border-top border-light-subtle">
            <div class="marquee-grid-wrapper">
                <?php 
                $logoCount = 0;
                if (!empty($gallery)): 
                    foreach ($gallery as $cat): 
                        if (!empty($cat['list'])): 
                            foreach ($cat['list'] as $partnerItem): 
                                if (!empty($partnerItem->image) && $logoCount < 5): 
                                    $logoCount++;
                ?>
                                    <div class="brand-marquee-node">
                                        <img src="<?php echo base_url($partnerItem->image); ?>" alt="<?php echo htmlspecialchars($partnerItem->name ?? 'Active Partner'); ?>">
                                    </div>
                <?php 
                                endif;
                            endforeach; 
                        endif; 
                    endforeach; 
                endif; 

                if ($logoCount === 0): 
                ?>
                    <div class="brand-marquee-node"><img src="https://upload.wikimedia.org/wikipedia/commons/9/96/Microsoft_logo_%282012%29.svg" alt="Microsoft"></div>
                    <div class="brand-marquee-node"><img src="https://upload.wikimedia.org/wikipedia/commons/f/fa/Apple_logo_black.svg" alt="Apple" style="max-height: 24px;"></div>
                    <div class="brand-marquee-node"><img src="https://upload.wikimedia.org/wikipedia/commons/a/a9/Amazon_logo.svg" alt="Amazon" style="max-height: 20px; margin-top:4px;"></div>
                    <div class="brand-marquee-node"><img src="https://upload.wikimedia.org/wikipedia/commons/2/2f/Google_2015_logo.svg" alt="Google"></div>
                    <div class="brand-marquee-node"><img src="https://upload.wikimedia.org/wikipedia/commons/0/08/Cisco_logo_blue_2014.svg" alt="Cisco" style="max-height: 32px;"></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- SECTION 5 & 6: VALUE GRID (CONVERTED TO GRID) & CARDS REPEATER ENGINE -->
<section class="sec-vpad bg-light border-bottom">
    <div class="container-xl">
        
        <div class="row justify-content-center mb-5">
            <div class="col-lg-9 text-center">
                <h3 class="h2 fw-bold text-dark mb-3"><?php echo !empty($tech_value_title) ? htmlspecialchars($tech_value_title) : 'Technology Partnerships That Deliver Business Value'; ?></h3>
                <p class="lead text-muted mx-auto fs-6" style="max-width: 650px; font-weight: 400;"><?php echo !empty($tech_value_description) ? htmlspecialchars($tech_value_description) : ''; ?></p>
            </div>
        </div>

        <!-- PARTNER LOGOS GRID -->
        <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-6 g-3 mb-5 justify-content-center align-items-center">
            <?php if (!empty($gallery)): foreach ($gallery as $key => $value): if (!empty($value['list'])): foreach ($value['list'] as $row): ?>
                <div class="col">
                    <div class="partner-logo-card">
                        <img src="<?php echo !empty($row->image) ? base_url($row->image) : base_url($config_logo); ?>" alt="<?php echo !empty($row->name) ? htmlspecialchars($row->name) : 'Partner Logo'; ?>" class="img-fluid logo-greyscale">
                    </div>
                </div>
            <?php endforeach; endif; endforeach; else: ?>
                <div class="col"><div class="partner-logo-card"><img src="https://cdn.worldvectorlogo.com/logos/power-bi.svg" alt="Power BI" class="img-fluid logo-greyscale"></div></div>
                <div class="col"><div class="partner-logo-card"><img src="https://upload.wikimedia.org/wikipedia/commons/1/1a/Microsoft_Dynamics_logo.svg" alt="Dynamics 365" class="img-fluid logo-greyscale"></div></div>
                <div class="col"><div class="partner-logo-card"><img src="https://upload.wikimedia.org/wikipedia/commons/9/91/Octicons-mark-github.svg" alt="GitHub" class="img-fluid logo-greyscale" style="max-height: 38px;"></div></div>
                <div class="col"><div class="partner-logo-card"><img src="https://upload.wikimedia.org/wikipedia/commons/9/96/Microsoft_logo_%282012%29.svg" alt="Microsoft" class="img-fluid logo-greyscale"></div></div>
            <?php endif; ?>
        </div>

        <!-- DYNAMIC CARD REPEATER BLOCK -->
        <div class="row g-4">
            <?php 
            $cards = !empty($section_6_cards) ? json_decode($section_6_cards, true) : [];
            foreach($cards as $card):
                $type = $card['type'] ?? 'pills_card';
            ?>
                <div class="col-lg-4 d-flex">
                    <div class="card h-100 border-0 shadow-sm rounded-4 p-4 premium-card-hover bg-white w-100 flex-column d-flex">
                        
                        <!-- STYLE 1 CANVAS -->
                        <?php if($type === 'pills_card'): ?>
                            <div class="d-flex align-items-center gap-3 mb-4 flex-shrink-0">
                                <div class="icon-wrapper-circle bg-primary bg-opacity-10 text-primary">
                                    <i class="fas fa-microchip"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold mb-0" style="font-size:1.05rem;"><?php echo htmlspecialchars($card['title'] ?? ''); ?></h5>
                                    <span class="text-muted small"><?php echo htmlspecialchars($card['subtitle'] ?? ''); ?></span>
                                </div>
                            </div>
                            <p class="text-muted mb-4 lh-base flex-grow-1" style="font-size: 0.95rem;"><?php echo htmlspecialchars($card['description'] ?? ''); ?></p>
                            <div class="d-flex flex-wrap gap-2 mt-auto pt-2 border-top border-light border-opacity-50">
                                <?php 
                                $pills = !empty($card['meta_items']) ? explode('|', $card['meta_items']) : [];
                                foreach($pills as $pill):
                                ?>
                                    <span class="badge bg-light text-dark border rounded-pill py-2 px-3 small fw-normal" style="font-size:0.75rem;"><?php echo htmlspecialchars(trim($pill)); ?></span>
                                <?php endforeach; ?>
                            </div>

                        <!-- STYLE 2 CANVAS -->
                        <?php elseif($type === 'list_card'): ?>
                            <div class="d-flex align-items-center justify-content-between mb-4 border-bottom pb-3 flex-shrink-0">
                                <h5 class="fw-bold mb-0" style="font-size:1.05rem;"><i class="fas fa-gears text-primary me-2"></i><?php echo htmlspecialchars($card['title'] ?? ''); ?></h5>
                                <?php if(!empty($card['card_badge'])): ?><span class="badge rounded-pill bg-primary bg-opacity-10 text-primary fw-semibold small px-2 py-1" style="font-size:0.7rem;"><?php echo htmlspecialchars($card['card_badge']); ?></span><?php endif; ?>
                            </div>
                            <div class="d-flex flex-column gap-3 flex-grow-1 justify-content-center">
                                <?php foreach(($card['points'] ?? []) as $point): ?>
                                    <div class="d-flex align-items-center gap-3 p-2 rounded-3 hover-bg-light transition-all">
                                        <div class="bg-light rounded-circle p-2 d-flex align-items-center justify-content-center text-primary flex-shrink-0" style="width: 38px; height: 38px;">
                                            <i class="fas fa-gear"></i>
                                        </div>
                                        <span class="fw-medium text-dark small" style="font-size:0.85rem;"><?php echo htmlspecialchars($point['title'] ?? ''); ?></span>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                        <!-- STYLE 3 CANVAS -->
                        <?php elseif($type === 'benefit_card'): ?>
                            <h5 class="fw-bold mb-4 pb-3 border-bottom flex-shrink-0" style="font-size:1.05rem;"><i class="fas fa-circle-check text-success me-2"></i><?php echo htmlspecialchars($card['title'] ?? ''); ?></h5>
                            <div class="d-flex flex-column gap-3 flex-grow-1 justify-content-center">
                                <?php foreach(($card['points'] ?? []) as $point): ?>
                                    <div class="benefit-item d-flex align-items-start gap-3">
                                        <div class="bg-success bg-opacity-10 text-success rounded-circle p-1 mt-1 flex-shrink-0 d-inline-flex align-items-center justify-content-center" style="width:24px; height:24px;">
                                            <i class="fas fa-check" style="font-size: 0.7rem;"></i>
                                        </div>
                                        <div>
                                            <h6 class="fw-bold mb-0 text-dark" style="font-size: 0.9rem;"><?php echo htmlspecialchars($point['title'] ?? ''); ?></h6>
                                            <span class="text-muted d-block mt-1" style="font-size:0.8rem; line-height:1.4;"><?php echo htmlspecialchars($point['desc'] ?? ''); ?></span>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- SECTION 7: COLORFUL ASYMMETRIC VERTICAL MODULE APPLICATIONS MATRIX -->
<section class="sec-vpad bg-white border-bottom">
    <div class="container-xl">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <span class="text-uppercase fw-bold small tracking-wider mb-2 d-block" style="color: var(--atna-secondary); font-size:0.75rem; font-weight:800;">Industry Solutions Framework</span>
                <h2 class="h2 fw-bold text-dark mb-2" style="font-weight:800; letter-spacing:-0.015em;">Targeted Vertical Applications</h2>
                <p class="text-muted mb-0 mx-auto" style="max-width:640px; font-size:0.95rem;">Our partner ecosystem enables us to deliver specialized enterprise architecture maps configured uniquely for core target sectors.</p>
            </div>
        </div>

        <div class="row g-4 justify-content-center">
            <?php 
            $sectorsMap = [
                ['title' => $vertical_title_1 ?? 'Manufacturing', 'icon' => 'bi-buildings', 'class' => 'v-card-blue', 'nodes' => $vertical_mfg_nodes ?? ''],
                ['title' => $vertical_title_2 ?? 'Retail & Distribution', 'icon' => 'bi-cart3', 'class' => 'v-card-green', 'nodes' => $vertical_retail_nodes ?? ''],
                ['title' => $vertical_title_3 ?? 'Textile & Apparel', 'icon' => 'bi-tags', 'class' => 'v-card-orange', 'nodes' => $vertical_textile_nodes ?? ''],
                ['title' => $vertical_title_4 ?? 'Food & Beverage', 'icon' => 'bi-cup-hot', 'class' => 'v-card-purple', 'nodes' => $vertical_fnb_nodes ?? '']
            ];

            foreach($sectorsMap as $sector):
                $lines = !empty($sector['nodes']) ? explode("\n", trim($sector['nodes'])) : [];
            ?>
                <div class="col-xl-3 col-md-6 d-flex">
                    <div class="vertical-app-card w-100 <?php echo $sector['class']; ?>">
                        <div class="icon-header-box">
                            <i class="<?php echo $sector['icon']; ?>"></i>
                        </div>
                        <h4 class="vertical-title-text"><?php echo htmlspecialchars($sector['title']); ?></h4>
                        
                        <ul class="list-unstyled d-flex flex-column gap-3 mb-0 justify-content-start">
                            <?php foreach($lines as $line): if(trim($line) == '') continue; ?>
                                <li class="d-flex align-items-start gap-2">
                                    <i class="fas fa-circle-check node-bullet-check mt-1" style="font-size:0.95rem; flex-shrink:0;"></i> 
                                    <span class="vertical-app-node-line"><?php echo htmlspecialchars(trim($line)); ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- DYNAMIC METRIC STRIP -->
<section class="py-4 bg-white">
    <div class="container-xl">
        <div class="card border-0 rounded-4 shadow-sm bg-enterprise-dark position-relative overflow-hidden text-white py-4 px-3">
            
            <div class="position-absolute top-0 start-0 w-100 h-100 opacity-25" style="background: radial-gradient(circle at 80% 20%, rgba(255,255,255,0.15) 0%, transparent 60%); pointer-events: none;"></div>
            
            <div class="row align-items-center justify-content-center text-center g-4 position-relative" style="z-index: 2;">
                
                <!-- METRIC 1: GLOBAL CLIENTS -->
                <div class="col-6 col-lg-3 position-relative">
                    <div class="d-flex flex-column flex-sm-row align-items-center justify-content-center gap-3">
                        <div class="fs-2 text-info"><i class="bi bi-people-fill"></i></div>
                        <div class="text-center text-sm-start">
                            <h3 class="display-6 fw-bold mb-0 text-white" style="font-size: 1.75rem; letter-spacing: -0.02em;"><?php echo !empty($stat_val_1) ? htmlspecialchars($stat_val_1) : '250+'; ?></h3>
                            <p class="small text-uppercase tracking-wider opacity-75 fw-semibold mb-0" style="font-size: 0.72rem; color: #a5c7fe;"><?php echo !empty($stat_lbl_1) ? htmlspecialchars($stat_lbl_1) : 'Global Clients'; ?></p>
                        </div>
                    </div>
                    <div class="d-none d-lg-block position-absolute end-0 top-50 translate-middle-y opacity-25" style="width: 1px; height: 35px; background-color: #fff;"></div>
                </div>

                <!-- METRIC 2: DEPLOYMENTS -->
                <div class="col-6 col-lg-3 position-relative">
                    <div class="d-flex flex-column flex-sm-row align-items-center justify-content-center gap-3">
                        <div class="fs-2 text-info"><i class="bi bi-rocket-takeoff-fill"></i></div>
                        <div class="text-center text-sm-start">
                            <h3 class="display-6 fw-bold mb-0 text-white" style="font-size: 1.75rem; letter-spacing: -0.02em;"><?php echo !empty($stat_val_2) ? htmlspecialchars($stat_val_2) : '100+'; ?></h3>
                            <p class="small text-uppercase tracking-wider opacity-75 fw-semibold mb-0" style="font-size: 0.72rem; color: #a5c7fe;"><?php echo !empty($stat_lbl_2) ? htmlspecialchars($stat_lbl_2) : 'Deployments'; ?></p>
                        </div>
                    </div>
                    <div class="d-none d-lg-block position-absolute end-0 top-50 translate-middle-y opacity-25" style="width: 1px; height: 35px; background-color: #fff;"></div>
                </div>

                <!-- METRIC 3: YEARS ACTIVE -->
                <div class="col-6 col-lg-3 position-relative">
                    <div class="d-flex flex-column flex-sm-row align-items-center justify-content-center gap-3">
                        <div class="fs-2 text-info"><i class="bi bi-globe-americas"></i></div>
                        <div class="text-center text-sm-start">
                            <h3 class="display-6 fw-bold mb-0 text-white" style="font-size: 1.75rem; letter-spacing: -0.02em;"><?php echo !empty($stat_val_3) ? htmlspecialchars($stat_val_3) : '20+'; ?></h3>
                            <p class="small text-uppercase tracking-wider opacity-75 fw-semibold mb-0" style="font-size: 0.72rem; color: #a5c7fe;"><?php echo !empty($stat_lbl_3) ? htmlspecialchars($stat_lbl_3) : 'Years Active'; ?></p>
                        </div>
                    </div>
                    <div class="d-none d-lg-block position-absolute end-0 top-50 translate-middle-y opacity-25" style="width: 1px; height: 35px; background-color: #fff;"></div>
                </div>

                <!-- METRIC 4: REGIONS SERVED -->
                <div class="col-6 col-lg-3">
                    <div class="d-flex flex-column flex-sm-row align-items-center justify-content-center gap-3">
                        <div class="fs-2 text-info"><i class="bi bi-award-fill"></i></div>
                        <div class="text-center text-sm-start">
                            <h3 class="display-6 fw-bold mb-0 text-white" style="font-size: 1.75rem; letter-spacing: -0.02em;"><?php echo !empty($stat_val_4) ? htmlspecialchars($stat_val_4) : '20+'; ?></h3>
                            <p class="small text-uppercase tracking-wider opacity-75 fw-semibold mb-0" style="font-size: 0.72rem; color: #a5c7fe;"><?php echo !empty($stat_lbl_4) ? htmlspecialchars($stat_lbl_4) : 'Regions Served'; ?></p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- SECTION 8: ADVANTAGE PILLARS LAYOUT -->
<section class="sec-vpad modern-asymmetric-section border-bottom">
    <div class="container-xl">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-9 col-xl-8 text-center">
                <span class="text-uppercase fw-bold small tracking-wider mb-2 d-block" style="color: var(--atna-secondary); font-size: 0.8rem; font-weight: 800;"><?php echo !empty($alliances_badge) ? htmlspecialchars($alliances_badge) : 'The ATNA Strategic Advantage'; ?></span>
                <h2 class="display-6 fw-extrabold text-dark mb-3" style="font-weight: 800; letter-spacing: -0.02em;"><?php echo !empty($alliances_title) ? htmlspecialchars($alliances_title) : 'Why Our Strategic Alliances Matter'; ?></h2>
                <p class="fs-6 text-muted lh-base mx-auto" style="max-width: 720px; font-weight: 400;"><?php echo !empty($alliances_description) ? htmlspecialchars($alliances_description) : ''; ?></p>
            </div>
        </div>

        <div class="row g-4 justify-content-center">
            <?php
            $pillars = [
                ['icon' => 'fa-solid fa-user-shield',    'title' => $pillar_label_1 ?? 'Certified Expertise',    'desc' => $pillar_desc_1 ?? 'Engineers carrying comprehensive technical certifications.'],
                ['icon' => 'fa-solid fa-gauge-high',       'title' => $pillar_label_2 ?? 'Faster Deployment',   'desc' => $pillar_desc_2 ?? 'Accelerators and blueprints designed to scale cycles safely.'],
                ['icon' => 'fa-solid fa-lightbulb',        'title' => $pillar_label_3 ?? 'Innovation Engines',   'desc' => $pillar_desc_3 ?? 'Continuous integration of emerging artificial intelligence layers.'],
                ['icon' => 'fa-solid fa-network-wired',    'title' => $pillar_label_4 ?? 'End-to-End Managed',     'desc' => $pillar_desc_4 ?? 'Complete ecosystem oversight including performance scaling audits.'],
                ['icon' => 'fa-solid fa-lock',             'title' => $pillar_label_5 ?? 'Secure Compliance',     'desc' => $pillar_desc_5 ?? 'Enterprise compliance structures built inside high-performance standards.'],
                ['icon' => 'fa-solid fa-globe-americas',   'title' => $pillar_label_6 ?? 'Global Distribution', 'desc' => $pillar_desc_6 ?? 'Multi-currency structures configured for complex cross-border trade layouts.']
            ];
            foreach ($pillars as $p): 
            ?>
                <div class="col-xl-4 col-md-6 d-flex">
                    <div class="asymmetric-interactive-card w-100">
                        <div class="icon-shield-frame">
                            <i class="<?php echo $p['icon']; ?>"></i>
                        </div>
                        <h4 class="asymmetric-card-title"><?php echo htmlspecialchars($p['title']); ?></h4>
                        <p class="asymmetric-card-desc mb-0"><?php echo htmlspecialchars($p['desc']); ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- SECTION 9: SOLUTIONS HUB METRIC BLOCK -->
<section class="sec-vpad bg-light">
    <div class="container-xl">
        <div class="card border-0 rounded-4 shadow-lg overflow-hidden bg-enterprise-dark text-white">
            <div class="p-4 p-xl-5">
                <div class="row align-items-center g-4 g-xl-5">

                    <div class="col-lg-7 text-center text-md-start">
                        <div class="d-flex align-items-center justify-content-center justify-content-md-start gap-3 mb-4 pb-3 border-bottom border-light border-opacity-10">
                            <i class="fab fa-microsoft fs-1 text-info flex-shrink-0"></i>
                            <h3 class="h2 fw-bold mb-0"><?php echo !empty($ms_center_title) ? htmlspecialchars($ms_center_title) : 'Microsoft Solutions Center'; ?></h3>
                        </div>
                        <p class="text-white mb-3 fs-5 fw-medium"><?php echo !empty($ms_center_subtitle) ? htmlspecialchars($ms_center_subtitle) : ''; ?></p>
                        <p class="opacity-75 text-white-50 mb-4 small"><?php echo !empty($ms_center_description) ? htmlspecialchars($ms_center_description) : ''; ?></p>

                        <div class="row g-4 text-start">
                            <div class="col-sm-6 d-flex align-items-start gap-3">
                                <i class="bi bi-window-sidebar text-info fs-4 flex-shrink-0"></i>
                                <div>
                                    <h6 class="fw-bold mb-1"><?php echo !empty($ms_bullet_t1) ? htmlspecialchars($ms_bullet_t1) : 'Business Frameworks'; ?></h6>
                                    <p class="small text-white-50 mb-0"><?php echo !empty($ms_bullet_d1) ? htmlspecialchars($ms_bullet_d1) : ''; ?></p>
                                </div>
                            </div>
                            <div class="col-sm-6 d-flex align-items-start gap-3">
                                <i class="bi bi-cloud-haze2 text-info fs-4 flex-shrink-0"></i>
                                <div>
                                    <h6 class="fw-bold mb-1"><?php echo !empty($ms_bullet_t2) ? htmlspecialchars($ms_bullet_t2) : 'Cloud Architecture'; ?></h6>
                                    <p class="small text-white-50 mb-0"><?php echo !empty($ms_bullet_d2) ? htmlspecialchars($ms_bullet_d2) : ''; ?></p>
                                </div>
                            </div>
                            <div class="col-sm-6 d-flex align-items-start gap-3">
                                <i class="bi bi-graph-up-arrow text-info fs-4 flex-shrink-0"></i>
                                <div>
                                    <h6 class="fw-bold mb-1"><?php echo !empty($ms_bullet_t3) ? htmlspecialchars($ms_bullet_t3) : 'Data &amp; Analytics Hubs'; ?></h6>
                                    <p class="small text-white-50 mb-0"><?php echo !empty($ms_bullet_d3) ? htmlspecialchars($ms_bullet_d3) : ''; ?></p>
                                </div>
                            </div>
                            <div class="col-sm-6 d-flex align-items-start gap-3">
                                <i class="bi bi-robot text-info fs-4 flex-shrink-0"></i>
                                <div>
                                    <h6 class="fw-bold mb-1"><?php echo !empty($ms_bullet_t4) ? htmlspecialchars($ms_bullet_t4) : 'AI Workflow Automation'; ?></h6>
                                    <p class="small text-white-50 mb-0"><?php echo !empty($ms_bullet_d4) ? htmlspecialchars($ms_bullet_d4) : ''; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5">
                        <div class="bg-white text-dark p-4 rounded-4 shadow-lg text-center">
                            <h4 class="h6 fw-bold mb-0 pb-3 border-bottom text-uppercase tracking-wider" style="color: var(--atna-primary);">Certified Ecosystem Footprint</h4>
                            <div class="row g-0 ms-stat-grid">
                                <div class="col-6 p-3 border-end border-bottom">
                                    <p class="fw-bold mb-1 text-primary h2"><?php echo !empty($stat_val_1) ? htmlspecialchars($stat_val_1) : '250+'; ?></p>
                                    <span class="small text-muted fw-semibold"><?php echo !empty($stat_lbl_1) ? htmlspecialchars($stat_lbl_1) : 'Global Clients'; ?></span>
                                </div>
                                <div class="col-6 p-3 border-bottom">
                                    <p class="fw-bold mb-1 text-primary h2"><?php echo !empty($stat_val_2) ? htmlspecialchars($stat_val_2) : '100+'; ?></p>
                                    <span class="small text-muted fw-semibold"><?php echo !empty($stat_lbl_2) ? htmlspecialchars($stat_lbl_2) : 'Deployments'; ?></span>
                                </div>
                                <div class="col-6 p-3 border-end">
                                    <p class="fw-bold mb-1 text-primary h2"><?php echo !empty($stat_val_3) ? htmlspecialchars($stat_val_3) : '20+'; ?></p>
                                    <span class="small text-muted fw-semibold"><?php echo !empty($stat_lbl_3) ? htmlspecialchars($stat_lbl_3) : 'Years Active'; ?></span>
                                </div>
                                <div class="col-6 p-3">
                                    <p class="fw-bold mb-1 text-primary h2"><?php echo !empty($stat_val_4) ? htmlspecialchars($stat_val_4) : '20+'; ?></p>
                                    <span class="small text-muted fw-semibold"><?php echo !empty($stat_lbl_4) ? htmlspecialchars($stat_lbl_4) : 'Regions Served'; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<!-- SECTION 10: ATNA SYSTEM ACCELERATORS -->
<section class="sec-vpad bg-white">
    <div class="container-xl">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-8 text-center">
                <span class="text-uppercase fw-bold small tracking-wider mb-2 d-block" style="color: var(--atna-secondary);"><?php echo !empty($accelerators_badge) ? htmlspecialchars($accelerators_badge) : 'Proprietary Business IP Modules'; ?></span>
                <h2 class="h2 fw-bold text-dark mb-2"><?php echo !empty($accelerators_title) ? htmlspecialchars($accelerators_title) : 'ATNA Accelerators &amp; Solutions'; ?></h2>
                <p class="text-muted mb-0"><?php echo !empty($accelerators_description) ? htmlspecialchars($accelerators_description) : ''; ?></p>
            </div>
        </div>

        <div class="row g-4">
            <?php 
            $solutions = [
                ['title' => $sol_title_1 ?? 'Financial Consolidation Engine', 'icon' => 'bi-journal-check',  'desc' => $sol_desc_1 ?? ''],
                ['title' => $sol_title_2 ?? 'Accounts Payable Automation',        'icon' => 'bi-file-earmark-spreadsheet', 'desc' => $sol_desc_2 ?? ''],
                ['title' => $sol_title_3 ?? 'Advance Shipping Notice Framework',       'icon' => 'bi-lightning-charge', 'desc' => $sol_desc_3 ?? ''],
                ['title' => $sol_title_4 ?? 'Predictive Inventory Optimizer',                                         'icon' => 'bi-diagram-3',       'desc' => $sol_desc_4 ?? '']
            ];
            foreach($solutions as $sol): ?>
            <div class="col-12 col-md-6 col-lg-3 d-flex">
                <div class="card h-100 border border-light-subtle p-4 w-100 shadow-sm premium-card-hover bg-white rounded-4 d-flex flex-column">
                    <div class="icon-wrapper-circle mb-4"><i class="bi <?php echo $sol['icon']; ?>"></i></div>
                    <h5 class="fw-bold text-dark mb-3 pb-2 border-bottom" style="font-size:0.95rem; min-height:44px;"><?php echo htmlspecialchars($sol['title']); ?></h5>
                    <p class="text-muted small mb-0 lh-base flex-grow-1"><?php echo htmlspecialchars($sol['desc']); ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- SECTION 11: PREMIUM SECURE ENQUIRY WORKSPACE -->
<section id="partner-enquiry-section" class="sec-vpad bg-light">
    <div class="container-xl">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-7">
                <div class="card border-0 shadow-lg rounded-4 overflow-hidden bg-white">
                    <div class="card-body p-4 p-md-5">
                        
                        <div class="text-center mb-4">
                            <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-2 small fw-bold mb-2">Connect Ecosystem</span>
                            <h3 class="fw-extrabold text-dark tracking-tight">Initiate Partnership Request</h3>
                            <p class="text-muted small">Submit your operational parameters to map an alliance architectural profile safely.</p>
                        </div>

                        <div id="enquiry-alert-msg" class="alert d-none" role="alert"></div>

                        <form id="form-secure-enquiry" autocomplete="off" novalidate>
                            <?= csrf_field() ?>
                            
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label small fw-bold text-secondary">Full Name <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-white text-muted"><i class="bi bi-person"></i></span>
                                        <input type="text" name="enq_name" class="form-control" placeholder="Abishek V" required />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label small fw-bold text-secondary">Company Name <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-white text-muted"><i class="bi bi-building"></i></span>
                                        <input type="text" name="enq_company" class="form-control" placeholder="Atna Technologies" required />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label small fw-bold text-secondary">Title / Designation <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-white text-muted"><i class="bi bi-briefcase"></i></span>
                                        <input type="text" name="enq_title" class="form-control" placeholder="e.g., Chief Financial Officer" required />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label small fw-bold text-secondary">Business Email Address <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-white text-muted"><i class="bi bi-envelope-at"></i></span>
                                        <input type="email" name="enq_email" class="form-control" placeholder="name@company.com" required />
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label class="form-label small fw-bold text-secondary">Phone Number <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-white text-muted"><i class="bi bi-telephone"></i></span>
                                        <input type="tel" name="enq_phone" class="form-control" placeholder="9876543210" required />
                                    </div>
                                </div>

                                <div class="col-12 d-flex justify-content-center mt-3">
                                    <!-- Site Key for Recaptcha -->
                                    <div class="g-recaptcha" data-sitekey="6LfTGlEtAAAAAEscEgL9-OZ0n_phaWbpSrNtDN46"></div>
                                </div>

                                <div class="col-12 text-center mt-4">
                                    <button type="submit" id="btn-submit-enquiry" class="btn btn-atna-primary w-100 rounded-pill-custom py-2.5 fw-bold text-uppercase tracking-wider small">
                                        <i class="fa-solid fa-paper-plane me-1"></i> Dispatch Security Request
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Google reCAPTCHA API -->
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<script>
(function () {
    'use strict';
    
    var isSubmitting = false; 

    document.getElementById('form-secure-enquiry').addEventListener('submit', function(e) {
        e.preventDefault();
        
        var formNode = this;
        var submitBtn = document.getElementById('btn-submit-enquiry');
        var alertBox = document.getElementById('enquiry-alert-msg');

        if (isSubmitting) return false;
        
        // 1. Safety Check: Verify recaptcha library loaded
        if (typeof grecaptcha === 'undefined') {
            alertBox.classList.remove('d-none');
            alertBox.className = "alert alert-danger small fw-bold";
            alertBox.innerHTML = "Security script not loaded. Please refresh the page.";
            return false;
        }

        // 2. Validate Captcha
        var captchaResponse = grecaptcha.getResponse();
        if (captchaResponse.length === 0) {
            alertBox.classList.remove('d-none');
            alertBox.className = "alert alert-danger small fw-bold";
            alertBox.innerHTML = "<i class='fa-solid fa-triangle-exclamation me-2'></i> Please complete the reCAPTCHA verification.";
            return false;
        }
        
        isSubmitting = true;
        submitBtn.disabled = true;
        submitBtn.innerHTML = "<i class='fa-solid fa-circle-notch fa-spin me-1'></i> Encrypting Data...";

        var formData = new FormData(formNode);
        formData.append('g-recaptcha-response', captchaResponse);

        fetch("<?= base_url('frontend/save_partner_enquiry') ?>", {
            method: "POST",
            body: formData,
            headers: { "X-Requested-With": "XMLHttpRequest" }
        })
        .then(response => response.json())
        .then(res => {
            alertBox.classList.remove('d-none');
            if (res.tokenHash) {
                var csrfInput = formNode.querySelector('input[type="hidden"][name^="csrf_"]');
                if (csrfInput) csrfInput.value = res.tokenHash;
            }

            if (res.status === 1) {
                alertBox.className = "alert alert-success small fw-bold";
                alertBox.innerHTML = "<i class='fa-solid fa-circle-check me-2'></i> " + res.msg;
                formNode.reset();
            } else {
                alertBox.className = "alert alert-danger small fw-bold";
                alertBox.innerHTML = "<i class='fa-solid fa-circle-xmark me-2'></i> " + res.msg;
            }
            
            grecaptcha.reset(); // Reset to allow fresh submission
            isSubmitting = false;
            submitBtn.disabled = false;
            submitBtn.innerHTML = "<i class='fa-solid fa-paper-plane me-1'></i> Dispatch Security Request";
        })
        .catch(err => {
            alertBox.className = "alert alert-danger small fw-bold";
            alertBox.innerHTML = "Connection error. Please try again.";
            alertBox.classList.remove('d-none');
            grecaptcha.reset();
            isSubmitting = false;
            submitBtn.disabled = false;
            submitBtn.innerHTML = "<i class='fa-solid fa-paper-plane me-1'></i> Dispatch Security Request";
        });
    });
})();
</script>

</div>

<?php echo $this->include('frontend/includes/bottom_section'); ?>
<?php $this->endSection(); ?>