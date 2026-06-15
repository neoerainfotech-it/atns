<?php 
$this->extend('layouts/master');
$this->section('page');
$transparentHeader = true;
?>

<style>
/* ============================================================
   BLOG DETAIL PAGE — ENTERPRISE PREMIUM REDESIGN
   ============================================================ */

:root {
  --clr-navy:      #0D1B2A;
  --clr-gold:      #C9A84C;
  --clr-gold-lt:   #EDD690;
  --clr-white:     #FFFFFF;
  --clr-surface:   #F7F8FA;
  --clr-border:    #E2E6EA;
  --clr-text:      #2C3E50;
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

/* ----  Hero banner ---- */
.blog-detail-hero {
  position: relative;
  min-height: 520px;
  display: flex;
  align-items: flex-end;
  overflow: hidden;
  background: var(--clr-navy);
}
.blog-detail-hero__bg {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: center;
  display: block;
  opacity: .45;
}
.blog-detail-hero__overlay {
  position: absolute;
  inset: 0;
  background: linear-gradient(
    to top,
    rgba(13,27,42,.92) 0%,
    rgba(13,27,42,.55) 55%,
    rgba(13,27,42,.25) 100%
  );
}
.blog-detail-hero__content {
  position: relative;
  z-index: 2;
  padding: 80px 0 64px;
  width: 100%;
}
.blog-detail-hero__tag {
  display: inline-block;
  font-size: 11px;
  font-weight: 700;
  letter-spacing: .1em;
  text-transform: uppercase;
  background: var(--clr-gold);
  color: var(--clr-navy);
  border-radius: 100px;
  padding: 4px 14px;
  margin-bottom: 20px;
}
.blog-detail-hero__title {
  font-size: clamp(1.8rem, 4.5vw, 3.2rem);
  font-weight: 800;
  color: var(--clr-white);
  line-height: 1.15;
  letter-spacing: -.03em;
  margin: 0 0 24px;
  max-width: 800px;
}
.blog-detail-hero__meta {
  display: flex;
  align-items: center;
  gap: 24px;
  flex-wrap: wrap;
}
.blog-detail-hero__meta-item {
  display: inline-flex;
  align-items: center;
  gap: 7px;
  font-size: 13px;
  color: rgba(255,255,255,.75);
  font-weight: 500;
}
.blog-detail-hero__meta-item svg {
  opacity: .7;
}

/* ---- Article body container ---- */
.blog-detail-wrap {
  background: var(--clr-surface);
  padding: 0 0 80px;
}

/* ---- Article layout ---- */
.blog-detail-layout {
  display: grid;
  grid-template-columns: 1fr 300px;
  gap: 40px;
  align-items: start;
  padding-top: 56px;
}

/* ---- Main content ---- */
.blog-detail-article {
  background: var(--clr-white);
  border-radius: var(--radius-card);
  border: 1px solid var(--clr-border);
  box-shadow: var(--shadow-card);
  padding: 48px 52px;
}
.blog-detail-article .article-body {
  font-size: 1.05rem;
  line-height: 1.85;
  color: var(--clr-text);
}
.blog-detail-article .article-body h2,
.blog-detail-article .article-body h3 {
  color: var(--clr-navy);
  font-weight: 700;
  margin-top: 2em;
  margin-bottom: .75em;
  letter-spacing: -.02em;
}
.blog-detail-article .article-body p {
  margin-bottom: 1.4em;
}
.blog-detail-article .article-body a {
  color: var(--clr-gold);
  text-decoration: underline;
  text-underline-offset: 3px;
}
.blog-detail-article .article-body img {
  width: 100%;
  height: auto;
  border-radius: 10px;
  margin: 1.5em 0;
  display: block;
}
.blog-detail-article .article-body blockquote {
  border-left: 3px solid var(--clr-gold);
  padding: 16px 24px;
  margin: 1.5em 0;
  background: var(--clr-surface);
  border-radius: 0 8px 8px 0;
  font-style: italic;
  color: var(--clr-navy);
}

/* ---- Share strip inside article ---- */
.blog-detail-share-strip {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 16px;
  padding: 20px 0 0;
  margin-top: 32px;
  border-top: 1.5px solid var(--clr-border);
  flex-wrap: wrap;
}
.blog-detail-share-strip .share-label {
  font-size: 12px;
  font-weight: 700;
  letter-spacing: .08em;
  text-transform: uppercase;
  color: var(--clr-muted);
}

/* ---- Sidebar ---- */
.blog-detail-sidebar {
  display: flex;
  flex-direction: column;
  gap: 24px;
  position: sticky;
  top: 100px;
}
.blog-sidebar-card {
  background: var(--clr-white);
  border: 1px solid var(--clr-border);
  border-radius: var(--radius-card);
  box-shadow: var(--shadow-card);
  padding: 28px;
}
.blog-sidebar-card__label {
  font-size: 11px;
  font-weight: 700;
  letter-spacing: .12em;
  text-transform: uppercase;
  color: var(--clr-gold);
  display: flex;
  align-items: center;
  gap: 8px;
  margin-bottom: 20px;
}
.blog-sidebar-card__label::before {
  content: '';
  display: block;
  width: 20px;
  height: 2px;
  background: var(--clr-gold);
  border-radius: 2px;
}
/* Published meta in sidebar */
.sidebar-published {
  font-size: 14px;
  color: var(--clr-text);
  font-weight: 600;
}
.sidebar-published small {
  display: block;
  font-size: 12px;
  font-weight: 400;
  color: var(--clr-muted);
  margin-bottom: 4px;
}

/* ---- Back to blog link ---- */
.blog-back-link {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  font-size: 13px;
  font-weight: 600;
  color: var(--clr-navy);
  text-decoration: none;
  border: 1.5px solid var(--clr-border);
  border-radius: 100px;
  padding: 9px 20px;
  transition: background var(--trans), border-color var(--trans), color var(--trans);
  margin-bottom: 24px;
  display: inline-flex;
}
.blog-back-link:hover {
  background: var(--clr-navy);
  border-color: var(--clr-navy);
  color: var(--clr-white);
}

/* ---- Related posts section ---- */
.blog-related-section {
  padding: 72px 0 0;
  border-top: 1.5px solid var(--clr-border);
  margin-top: 72px;
}

/* ---- Section header (reused from blog.php) ---- */
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
  font-size: clamp(1.5rem, 2.5vw, 2rem);
  font-weight: 800;
  color: var(--clr-navy);
  margin: 0;
  line-height: 1.15;
  letter-spacing: -.02em;
}

/* ---- Card (shared) ---- */
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
  height: 200px;
  object-fit: cover;
  object-position: center;
  display: block;
  transition: transform 0.5s cubic-bezier(.4,0,.2,1), opacity 0.3s;
}
.blog-card:hover .blog-card__img-wrap img {
  transform: scale(1.04);
  opacity: .92;
}
.blog-card__body {
  padding: 20px 22px 24px;
  display: flex;
  flex-direction: column;
  flex: 1;
}
.blog-card__meta {
  display: flex;
  align-items: center;
  gap: 12px;
  margin-bottom: 12px;
}
.blog-card__date {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  font-size: 12px;
  font-weight: 500;
  color: var(--clr-muted);
}
.blog-card__title {
  font-size: 1rem;
  font-weight: 700;
  color: var(--clr-navy);
  line-height: 1.4;
  margin: 0 0 14px;
  letter-spacing: -.01em;
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

/* ---- Responsive ---- */
@media (max-width: 1099px) {
  .blog-detail-layout {
    grid-template-columns: 1fr;
  }
  .blog-detail-sidebar {
    position: static;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
  }
}
@media (max-width: 767px) {
  .blog-detail-hero { min-height: 380px; }
  .blog-detail-hero__content { padding: 60px 0 48px; }
  .blog-detail-article { padding: 28px 20px 32px; }
  .blog-detail-sidebar { grid-template-columns: 1fr; }
  .blog-detail-layout { padding-top: 36px; gap: 24px; }
  .blog-related-section { padding: 48px 0 0; margin-top: 48px; }
  .blog-section-header { flex-direction: column; align-items: flex-start; }
}
</style>

<!-- ========= HERO BANNER ========= -->
<section class="blog-detail-hero">
  <img
    src="<?php echo $detail->image ? base_url($detail->image) : base_url($config_logo); ?>"
    alt="<?php echo htmlspecialchars($detail->title); ?>"
    class="blog-detail-hero__bg"
    loading="eager"
  />
  <div class="blog-detail-hero__overlay"></div>

  <div class="blog-detail-hero__content">
    <div class="container">
      <div class="row">
        <div class="col-lg-9 col-xl-8">
          <span class="blog-detail-hero__tag">Article</span>
          <h1 class="blog-detail-hero__title"><?php echo $detail->title; ?></h1>
          <div class="blog-detail-hero__meta">
            <span class="blog-detail-hero__meta-item">
              <svg width="14" height="14" viewBox="0 0 16 16" fill="none"><rect x="1" y="3" width="14" height="12" rx="2" stroke="rgba(255,255,255,.75)" stroke-width="1.4"/><path d="M5 1v3M11 1v3M1 7h14" stroke="rgba(255,255,255,.75)" stroke-width="1.4" stroke-linecap="round"/></svg>
              Published: <?php echo $detail->publish ? date('d M Y', strtotime($detail->publish)) : ''; ?>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ========= ARTICLE BODY ========= -->
<div class="blog-detail-wrap">
  <div class="container">

    <div class="blog-detail-layout">

      <!-- Main article -->
      <main>
        <a href="<?php echo base_url('blog'); ?>" class="blog-back-link">
          <svg width="14" height="12" viewBox="0 0 16 12" fill="none"><path d="M15 5.25a.75.75 0 0 1 0 1.5zm-14.53 1.28a.75.75 0 0 1 0-1.06L5.243.697a.75.75 0 0 1 1.06 1.06L2.061 6l4.242 4.243a.75.75 0 0 1-1.06 1.06zM15 6.75H1v-1.5h14z" fill="currentColor"/></svg>
          Back to Blog
        </a>

        <article class="blog-detail-article">
          <div class="article-body">
            <?php echo $detail->description; ?>
          </div>

          <!-- Share strip at bottom of article -->
          <div class="blog-detail-share-strip">
            <span class="share-label">Share this article</span>
            <?php echo $this->include('frontend/includes/share'); ?>
          </div>
        </article>
      </main>

      <!-- Sidebar -->
      <aside class="blog-detail-sidebar">

        <!-- Published date card -->
        <div class="blog-sidebar-card">
          <div class="blog-sidebar-card__label">Published</div>
          <div class="sidebar-published">
            <small>Date</small>
            <?php echo $detail->publish ? date('d M Y', strtotime($detail->publish)) : 'N/A'; ?>
          </div>
        </div>

        <!-- Optional: you can add more sidebar widgets here -->

      </aside>

    </div>

    <!-- ========= RELATED POSTS ========= -->
    <?php if (!empty($relatedPost)) { ?>
    <section class="blog-related-section">
      <div class="blog-section-header" data-cue="slideInUp">
        <div>
          <div class="eyebrow">Continue Reading</div>
          <h2 class="section-title">Related Articles</h2>
        </div>
      </div>

      <div class="row g-4" data-cues="slideInUp">
        <?php foreach ($relatedPost as $key => $value) { ?>
        <div class="col-lg-4 col-md-6 d-flex">
          <div class="blog-card w-100">
            <div class="blog-card__img-wrap">
              <img
                src="<?php echo $value->thumbnail ? base_url($value->thumbnail) : base_url($config_logo); ?>"
                alt="<?php echo htmlspecialchars($value->title); ?>"
                loading="lazy"
              />
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
        <?php } ?>
      </div>
    </section>
    <?php } ?>

  </div>
</div>

<?php $this->endSection(); ?>