<?php 
$this->extend('layouts/master');
$this->section('page');
?>

<?php echo $this->include('frontend/includes/banner') ?>

<style>
/* ============================================================
   BLOG PAGE — ENTERPRISE PREMIUM REDESIGN
   ============================================================ */

/* ---- Tokens ---- */
:root {
  --clr-navy:      #0D1B2A;
  --clr-gold:      #C9A84C;
  --clr-gold-lt:   #EDD690;
  --clr-white:     #FFFFFF;
  --clr-surface:   #F7F8FA;
  --clr-border:    #E2E6EA;
  --clr-text:      #1A2635;
  --clr-muted:     #6B7A8D;
  --clr-tag-bg:    #EAF0F8;
  --clr-tag-text:  #2056A3;

  --ff-display: 'Inter', system-ui, -apple-system, sans-serif;
  --ff-body:    'Inter', system-ui, -apple-system, sans-serif;

  --radius-card: 14px;
  --shadow-card: 0 2px 18px rgba(13,27,42,.07);
  --shadow-hover: 0 8px 36px rgba(13,27,42,.14);
  --trans: 0.28s cubic-bezier(.4,0,.2,1);
}

/* ---- Layout wrapper ---- */
.blog-page-wrap {
  background: var(--clr-surface);
  padding: 0 0 80px;
}

/* ---- Section header ---- */
.blog-section-header {
  display: flex;
  align-items: flex-end;
  justify-content: space-between;
  gap: 16px;
  margin-bottom: 40px;
  padding-bottom: 20px;
  border-bottom: 1.5px solid var(--clr-border);
}
.blog-section-header .eyebrow {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  font-size: 11px;
  font-weight: 700;
  letter-spacing: .12em;
  text-transform: uppercase;
  color: var(--clr-gold);
  margin-bottom: 8px;
}
.blog-section-header .eyebrow::before {
  content: '';
  display: block;
  width: 28px;
  height: 2px;
  background: var(--clr-gold);
  border-radius: 2px;
}
.blog-section-header h2.section-title {
  font-size: clamp(1.6rem, 3vw, 2.2rem);
  font-weight: 800;
  color: var(--clr-navy);
  margin: 0;
  line-height: 1.15;
  letter-spacing: -.02em;
}
.blog-section-header .view-all {
  flex-shrink: 0;
  display: inline-flex;
  align-items: center;
  gap: 8px;
  font-size: 13px;
  font-weight: 600;
  color: var(--clr-navy);
  text-decoration: none;
  border: 1.5px solid var(--clr-border);
  border-radius: 100px;
  padding: 8px 20px;
  transition: background var(--trans), border-color var(--trans), color var(--trans);
}
.blog-section-header .view-all:hover {
  background: var(--clr-navy);
  border-color: var(--clr-navy);
  color: var(--clr-white);
}
.blog-section-header .view-all svg {
  transition: transform var(--trans);
}
.blog-section-header .view-all:hover svg {
  transform: translateX(4px);
}

/* ---- Featured cards (col-6) ---- */
.blog-card {
  background: var(--clr-white);
  border-radius: var(--radius-card);
  overflow: hidden;
  display: flex;
  flex-direction: column;
  box-shadow: var(--shadow-card);
  border: 1px solid var(--clr-border);
  height: 100%;
  position: relative;
  transition: box-shadow var(--trans), transform var(--trans);
}
.blog-card::before {
  content: '';
  position: absolute;
  top: 0; left: 0; right: 0;
  height: 3px;
  background: var(--clr-gold);
  transform: scaleX(0);
  transform-origin: left;
  transition: transform var(--trans);
  z-index: 2;
}
.blog-card:hover {
  box-shadow: var(--shadow-hover);
  transform: translateY(-4px);
}
.blog-card:hover::before {
  transform: scaleX(1);
}

.blog-card__img-wrap {
  position: relative;
  overflow: hidden;
  background: var(--clr-navy);
}
.blog-card__img-wrap img {
  width: 100%;
  height: 240px;
  object-fit: cover;
  object-position: center;
  display: block;
  transition: transform 0.5s cubic-bezier(.4,0,.2,1), opacity 0.3s;
}
.blog-card:hover .blog-card__img-wrap img {
  transform: scale(1.04);
  opacity: .92;
}

/* Featured card gets taller image */
.blog-card--featured .blog-card__img-wrap img {
  height: 300px;
}

.blog-card__img-overlay {
  position: absolute;
  inset: 0;
  background: linear-gradient(to top, rgba(13,27,42,.18) 0%, transparent 60%);
  pointer-events: none;
}

.blog-card__body {
  padding: 24px 28px 28px;
  display: flex;
  flex-direction: column;
  flex: 1;
}

.blog-card__meta {
  display: flex;
  align-items: center;
  gap: 16px;
  margin-bottom: 14px;
}
.blog-card__date {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  font-size: 12px;
  font-weight: 500;
  color: var(--clr-muted);
  letter-spacing: .01em;
}
.blog-card__date svg {
  opacity: .6;
}
.blog-card__tag {
  display: inline-block;
  font-size: 11px;
  font-weight: 700;
  letter-spacing: .08em;
  text-transform: uppercase;
  background: var(--clr-tag-bg);
  color: var(--clr-tag-text);
  border-radius: 100px;
  padding: 3px 12px;
}

.blog-card__title {
  font-size: 1.12rem;
  font-weight: 700;
  color: var(--clr-navy);
  line-height: 1.4;
  margin: 0 0 16px;
  letter-spacing: -.01em;
}
.blog-card--featured .blog-card__title {
  font-size: 1.28rem;
}

.blog-card__read-more {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  font-size: 13px;
  font-weight: 600;
  color: var(--clr-navy);
  text-decoration: none;
  margin-top: auto;
  padding-top: 12px;
  border-top: 1px solid var(--clr-border);
  transition: color var(--trans), gap var(--trans);
}
.blog-card__read-more:hover {
  color: var(--clr-gold);
  gap: 14px;
}
.blog-card__read-more svg path {
  fill: currentColor;
}

/* ---- Latest cards (col-4) ---- */
.blog-card--compact .blog-card__img-wrap img {
  height: 200px;
}
.blog-card--compact .blog-card__body {
  padding: 20px 22px 24px;
}
.blog-card--compact .blog-card__title {
  font-size: 1rem;
}

/* ---- Section spacing ---- */
.blog-section {
  padding: 72px 0 0;
}

/* ---- Divider row ---- */
.blog-divider {
  border: none;
  border-top: 1.5px solid var(--clr-border);
  margin: 0;
}

/* ---- Responsive ---- */
@media (max-width: 991px) {
  .blog-section-header {
    flex-direction: column;
    align-items: flex-start;
    gap: 12px;
  }
  .blog-card--featured .blog-card__img-wrap img {
    height: 240px;
  }
}

@media (max-width: 767px) {
  .blog-section { padding: 48px 0 0; }
  .blog-card__img-wrap img,
  .blog-card--featured .blog-card__img-wrap img,
  .blog-card--compact .blog-card__img-wrap img {
    height: 200px;
  }
  .blog-card__body { padding: 18px 18px 22px; }
  .blog-page-wrap { padding-bottom: 48px; }
  .blog-section-header h2.section-title { font-size: 1.4rem; }
}
</style>

<div class="blog-page-wrap">

  <!-- ========= FEATURED POSTS ========= -->
  <section class="blog-section">
    <div class="container">

      <div class="blog-section-header" data-cue="slideInUp">
        <div>
          <div class="eyebrow">Editorial Pick</div>
          <h2 class="section-title"><?php echo $meta->title1; ?></h2>
        </div>
      </div>

      <div class="row g-4" data-cues="slideInUp">
        <?php if (!empty($featureList)) { foreach ($featureList as $key => $value) { ?>

        <div class="col-lg-6 col-md-6 d-flex">
          <div class="blog-card blog-card--featured w-100">
            <div class="blog-card__img-wrap">
              <img
                src="<?php echo $value->thumbnail ? base_url($value->thumbnail) : base_url($config_logo); ?>"
                alt="<?php echo htmlspecialchars($value->title); ?>"
                loading="<?php echo $key === 0 ? 'eager' : 'lazy'; ?>"
              />
              <div class="blog-card__img-overlay"></div>
            </div>
            <div class="blog-card__body">
              <div class="blog-card__meta">
                <span class="blog-card__tag">Featured</span>
                <span class="blog-card__date">
                  <svg width="13" height="13" viewBox="0 0 16 16" fill="none"><rect x="1" y="3" width="14" height="12" rx="2" stroke="#6B7A8D" stroke-width="1.4"/><path d="M5 1v3M11 1v3M1 7h14" stroke="#6B7A8D" stroke-width="1.4" stroke-linecap="round"/></svg>
                  <?php echo $value->publish ? date('d M Y', strtotime($value->publish)) : ''; ?>
                </span>
              </div>
              <h4 class="blog-card__title"><?php echo $value->title; ?></h4>
              <a href="<?php echo base_url('blog/' . $value->slug); ?>" class="blog-card__read-more">
                Read Article
                <svg width="16" height="12" viewBox="0 0 16 12" fill="none"><path d="M1 5.25a.75.75 0 0 0 0 1.5zm14.53 1.28a.75.75 0 0 0 0-1.06L10.757.697a.75.75 0 0 0-1.06 1.06L13.939 6l-4.242 4.243a.75.75 0 0 0 1.06 1.06zM1 6.75h14v-1.5H1z" fill="currentColor"/></svg>
              </a>
            </div>
          </div>
        </div>

        <?php } } ?>
      </div>
    </div>
  </section>

  <hr class="blog-divider" style="margin-top: 72px;">

  <!-- ========= LATEST POSTS ========= -->
  <section class="blog-section">
    <div class="container">

      <div class="blog-section-header" data-cue="slideInUp">
        <div>
          <div class="eyebrow">All Articles</div>
          <h2 class="section-title"><?php echo $meta->title2; ?></h2>
        </div>
      </div>

      <div class="row g-4" data-cues="slideInUp">
        <?php if (!empty($blogList)) { foreach ($blogList as $key => $value) { ?>

        <div class="col-lg-4 col-md-6 d-flex">
          <div class="blog-card blog-card--compact w-100">
            <div class="blog-card__img-wrap">
              <img
                src="<?php echo $value->thumbnail ? base_url($value->thumbnail) : base_url($config_logo); ?>"
                alt="<?php echo htmlspecialchars($value->title); ?>"
                loading="lazy"
              />
              <div class="blog-card__img-overlay"></div>
            </div>
            <div class="blog-card__body">
              <div class="blog-card__meta">
                <span class="blog-card__date">
                  <svg width="13" height="13" viewBox="0 0 16 16" fill="none"><rect x="1" y="3" width="14" height="12" rx="2" stroke="#6B7A8D" stroke-width="1.4"/><path d="M5 1v3M11 1v3M1 7h14" stroke="#6B7A8D" stroke-width="1.4" stroke-linecap="round"/></svg>
                  <?php echo $value->publish ? date('d M Y', strtotime($value->publish)) : ''; ?>
                </span>
              </div>
              <h4 class="blog-card__title"><?php echo $value->title; ?></h4>
              <a href="<?php echo base_url('blog/' . $value->slug); ?>" class="blog-card__read-more">
                Read Article
                <svg width="16" height="12" viewBox="0 0 16 12" fill="none"><path d="M1 5.25a.75.75 0 0 0 0 1.5zm14.53 1.28a.75.75 0 0 0 0-1.06L10.757.697a.75.75 0 0 0-1.06 1.06L13.939 6l-4.242 4.243a.75.75 0 0 0 1.06 1.06zM1 6.75h14v-1.5H1z" fill="currentColor"/></svg>
              </a>
            </div>
          </div>
        </div>

        <?php } } ?>
      </div>

    </div>
  </section>

</div><!-- /.blog-page-wrap -->

<?php $this->endSection(); ?>