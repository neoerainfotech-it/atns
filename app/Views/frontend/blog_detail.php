<?php 
$this->extend('layouts/master');
$this->section('page');
$transparentHeader = true;

// Estimate reading time from the article body
$readingWordCount = isset($detail->description) ? str_word_count(strip_tags($detail->description)) : 0;
$readingMinutes    = max(1, (int) ceil($readingWordCount / 200));

// Process crisp fallback descriptive summaries from structural backend strings
$cleanHeroDesc = isset($detail->description) ? mb_strimwidth(strip_tags($detail->description), 0, 180, '...') : '';

// Resolve dynamic author name variables cleanly
$displayAuthor = !empty($detail->author_name) ? esc($detail->author_name) : 'Editorial Team';
$authorInitial = mb_substr($displayAuthor, 0, 1);
?>

<style>
/* ============================================================
    BLOG DETAIL PAGE — LUXURY BLUE ENTERPRISE THEME
   ============================================================ */

@import url('https://fonts.googleapis.com/css2?family=Sora:wght@600;700;800&family=Inter:wght@400;500;600;700&display=swap');

:root {
  --clr-navy:        #16324F;
  --clr-blue:         #2D7DD2;
  --clr-blue-deep:    #1F5FA8;
  --clr-sky:          #EEF6FC;
  --clr-white:        #FFFFFF;
  --clr-border:       #D9E8F5;
  --clr-text:         #28415A;
  --clr-muted:        #65809B;

  --font-display:      'Sora', system-ui, -apple-system, sans-serif;
  --font-body:         'Inter', system-ui, -apple-system, sans-serif;

  --radius-card:       16px;
  --shadow-sm:         0 4px 16px rgba(22, 50, 79, 0.05);
  --shadow-md:         0 16px 40px rgba(22, 50, 79, 0.1);
  --ease:              cubic-bezier(.25, .8, .25, 1);
}

/* ---- Hero Banner ---- */
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
  opacity: .25;
}
.blog-detail-hero__overlay {
  position: absolute;
  inset: 0;
  background:
    radial-gradient(circle at 1px 1px, rgba(255, 255, 255, 0.05) 1px, transparent 0) 0 0/24px 24px,
    linear-gradient(to top, rgba(11, 21, 33, 0.98) 0%, rgba(22, 50, 79, 0.75) 60%, rgba(22, 50, 79, 0.4) 100__);
}
.blog-detail-hero__content {
  position: relative;
  z-index: 2;
  padding: 120px 0 64px;
  width: 100%;
}
.blog-detail-hero__tag {
  display: inline-block;
  font-size: 11px;
  font-weight: 700;
  letter-spacing: .1em;
  text-transform: uppercase;
  background: var(--clr-blue);
  color: var(--clr-white);
  border-radius: 100px;
  padding: 4px 14px;
  margin-bottom: 20px;
}
.blog-detail-hero__title {
  font-family: var(--font-display);
  font-size: clamp(1.8rem, 4.5vw, 3rem);
  font-weight: 800;
  color: var(--clr-white);
  line-height: 1.2;
  letter-spacing: -.02em;
  margin: 0 0 16px;
  max-width: 900px;
}
.blog-detail-hero__lead {
  font-size: clamp(1rem, 1.5vw, 1.15rem);
  line-height: 1.6;
  color: rgba(238, 246, 252, 0.85);
  max-width: 760px;
  margin-bottom: 28px;
  font-family: var(--font-body);
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
  font-size: 14px;
  color: rgba(255,255,255,.85);
  font-weight: 500;
}

/* ---- Page Container Setup ---- */
.blog-detail-wrap {
  background: var(--clr-white);
  padding: 0 0 110px;
  font-family: var(--font-body);
  color: var(--clr-text);
}

/* ---- Component Grid Layout Matrix ---- */
.blog-detail-layout {
  display: grid;
  grid-template-columns: 1fr 320px;
  gap: 40px;
  align-items: start;
  padding-top: 56px;
}

/* ---- Article Body Core styles ---- */
.blog-detail-article {
  background: var(--clr-white);
  border-radius: var(--radius-card);
  border: 1px solid var(--clr-border);
  height: 100%;
  position: relative;
  transition: box-shadow var(--ease), transform var(--ease), border-color var(--ease);
}
.blog-detail-article {
  background: var(--clr-white);
  border-radius: var(--radius-card);
  padding: 40px;
  box-shadow: 0 4px 16px rgba(22, 50, 79, 0.03);
}
.article-body {
  font-size: 16px;
  line-height: 1.8;
  color: var(--clr-text);
}

.blog-author-box {
  display: flex;
  align-items: center;
  gap: 20px;
  background: var(--clr-sky);
  padding: 24px;
  border-radius: 12px;
  margin: 40px 0;
}
.blog-author-avatar {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 50px;
  height: 50px;
  background: var(--clr-blue);
  color: #fff;
  font-family: var(--font-display);
  font-weight: 700;
  font-size: 20px;
  border-radius: 50%;
  text-transform: uppercase;
}
.blog-author-details {
  flex: 1;
}
.blog-author-name {
  font-family: var(--font-display);
  color: var(--clr-navy);
  font-weight: 700;
  margin-bottom: 4px;
}
.blog-author-bio {
  font-size: 14px;
  color: var(--clr-muted);
  margin: 0;
}

.blog-detail-share-strip {
  display: flex;
  align-items: center;
  justify-content: space-between;
  border-top: 1px solid var(--clr-border);
  padding-top: 24px;
  margin-top: 24px;
}
.share-label {
  font-weight: 700;
  color: var(--clr-navy);
  font-size: 14px;
  text-transform: uppercase;
  letter-spacing: 0.05em;
}

.blog-back-link {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  color: var(--clr-blue);
  font-weight: 700;
  text-decoration: none;
  margin-bottom: 24px;
  transition: color 0.2s;
}
.blog-back-link:hover {
  color: var(--clr-blue-deep);
}

.blog-sidebar-card {
  background: #fff;
  border: 1px solid rgba(45, 125, 210, 0.3); /* ✅ HIGHLIGHTED SIDEBAR BORDER */
  padding: 24px;
  border-radius: 12px;
  margin-bottom: 24px;
  box-shadow: 0 4px 16px rgba(22, 50, 79, 0.06);
  transition: border-color 0.3s ease, box-shadow 0.3s ease;
}
.blog-sidebar-card:hover {
  border-color: rgba(45, 125, 210, 0.6); /* Highlights slightly when users interact with the sidebar */
  box-shadow: 0 8px 24px rgba(22, 50, 79, 0.1);
}
.blog-sidebar-card__label {
  font-family: var(--font-display);
  font-size: 12px;
  font-weight: 800;
  text-transform: uppercase;
  letter-spacing: 0.1em;
  color: var(--clr-blue-deep);
  margin-bottom: 20px;
}
.sidebar-fact {
  display: flex;
  align-items: center;
  gap: 16px;
  margin-bottom: 16px;
}
.sidebar-fact:last-child {
  margin-bottom: 0;
}
.sidebar-fact__icon {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 36px;
  height: 36px;
  background: var(--clr-sky);
  border-radius: 8px;
  color: var(--clr-blue);
}
.sidebar-fact__text {
  display: flex;
  flex-direction: column;
}
.sidebar-fact__text small {
  font-size: 11px;
  color: var(--clr-muted);
  text-transform: uppercase;
  letter-spacing: 0.05em;
}
.sidebar-fact__text strong {
  font-size: 14px;
  color: var(--clr-navy);
}

.blog-sidebar-cta {
  background: var(--clr-navy);
  color: #fff;
  border: none;
}
.blog-sidebar-cta p {
  font-size: 14px;
  color: rgba(255,255,255,0.75);
  line-height: 1.6;
  margin-bottom: 20px;
}
.sidebar-cta-link {
  display: block;
  text-align: center;
  background: var(--clr-blue);
  color: #fff;
  font-weight: 700;
  text-decoration: none;
  padding: 12px;
  border-radius: 8px;
  transition: background 0.2s;
}
.sidebar-cta-link:hover {
  background: var(--clr-blue-deep);
}

.blog-related-section {
  border-top: 1px solid var(--clr-border);
  padding-top: 56px;
  margin-top: 56px;
}
.eyebrow {
  font-size: 11px;
  font-weight: 800;
  text-transform: uppercase;
  letter-spacing: 0.1em;
  color: var(--clr-blue);
  margin-bottom: 8px;
}

@media (max-width: 1045px) {
  .blog-detail-layout {
    grid-template-columns: 1fr;
  }
}
@media (max-width: 767px) {
  .blog-detail-article {
    padding: 24px;
  }
}
</style>

<section class="blog-detail-hero">
  <div class="blog-detail-hero__bg" style="background-image: url('<?php echo base_url($detail->image); ?>');"></div>
  <div class="blog-detail-hero__content">
    <div class="container">
      <div class="row">
        <div class="col-xl-4 col-lg-6 col-md-6 d-flex">
          <div style="z-index:2; position:relative;">
            <div class="blog-detail-hero__tag">Article Details</div>
            <h1 class="blog-detail-hero__title" style="color: #fff; font-family: var(--font-display);"><?php echo esc($detail->title); ?></h1>
            <div class="blog-detail-hero__meta">
              <span class="blog-detail-hero__meta-item">
                <svg width="14" height="14" viewBox="0 0 16 16" fill="none" aria-hidden="true"><rect x="1" y="3" width="14" height="12" rx="2" stroke="rgba(255,255,255,.8)" stroke-width="1.4"/><path d="M5 1v3M11 1v3M1 7h14" stroke="rgba(255,255,255,.8)" stroke-width="1.4" stroke-linecap="round"/></svg>
                Published <?php echo $detail->publish ? date('d M Y', strtotime($detail->publish)) : date('d M Y'); ?>
              </span>
              <span class="blog-detail-hero__meta-item">
                <svg width="14" height="14" viewBox="0 0 16 16" fill="none" aria-hidden="true"><circle cx="8" cy="8" r="6.3" stroke="rgba(255,255,255,.8)" stroke-width="1.4"/><path d="M8 4.5V8l2.6 1.5" stroke="rgba(255,255,255,.8)" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
                <?php echo $readingMinutes; ?> min read
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<div class="blog-detail-wrap">
  <div class="container">
    <div class="blog-detail-layout">

      <main>
        <a href="<?php echo base_url('blog'); ?>" class="blog-back-link">
          <svg width="14" height="12" viewBox="0 0 16 12" fill="none" aria-hidden="true"><path d="M15 5.25a.75.75 0 0 1 0 1.5zm-14.53 1.28a.75.75 0 0 1 0-1.06L5.243.697a.75.75 0 0 1 1.06 1.06L2.061 6l4.242 4.243a.75.75 0 0 1-1.06 1.06zM15 6.75H1v-1.5h14z" fill="currentColor"/></svg>
          Back to Articles
        </a>

        <article class="blog-detail-article">
          <div class="article-body">
            <?php echo $detail->description; ?>
          </div>

          <div class="blog-author-box">
            <div class="blog-author-avatar"><?php echo $authorInitial; ?></div>
            <div class="blog-author-details">
              <h5 class="blog-author-name"><?php echo $displayAuthor; ?></h5>
              <p class="blog-author-bio">Expert insights, market analysis, and technology strategies curated by our industry research specialists.</p>
            </div>
          </div>

          <div class="blog-detail-share-strip">
            <span class="share-label">Share this article</span>
            <?php echo $this->include('frontend/includes/share'); ?>
          </div>
        </article>
      </main>

      <aside class="blog-detail-sidebar">
        <div class="blog-sidebar-card">
          <div class="blog-sidebar-card__label">Article Details</div>

          <div class="sidebar-fact">
            <span class="sidebar-fact__icon">
              <svg width="15" height="15" viewBox="0 0 16 16" fill="none" aria-hidden="true"><rect x="1" y="3" width="14" height="12" rx="2" stroke="#2D7DD2" stroke-width="1.4"/><path d="M5 1v3M11 1v3M1 7h14" stroke="#2D7DD2" stroke-width="1.4" stroke-linecap="round"/></svg>
            </span>
            <span class="sidebar-fact__text">
              <small>Published</small>
              <strong><?php echo $detail->publish ? date('d M Y', strtotime($detail->publish)) : 'N/A'; ?></strong>
            </span>
          </div>

          <div class="sidebar-fact">
            <span class="sidebar-fact__icon">
              <svg width="15" height="15" viewBox="0 0 16 16" fill="none" aria-hidden="true"><circle cx="8" cy="8" r="6.3" stroke="#2D7DD2" stroke-width="1.4"/><path d="M8 4.5V8l2.6 1.5" stroke="#2D7DD2" stroke-width="1.4" stroke-linecap="round" stroke-linejoin="round"/></svg>
            </span>
            <span class="sidebar-fact__text">
              <small>Reading time</small>
              <strong><?php echo $readingMinutes; ?> minutes</strong>
            </span>
          </div>
        </div>

        <div class="blog-sidebar-card blog-sidebar-cta">
          <div class="blog-sidebar-card__label" style="color: rgba(255,255,255,.65);">Keep Exploring</div>
          <p>Browse the rest of our articles for more updates and insights.</p>
          <a href="<?php echo base_url('blog'); ?>" class="sidebar-cta-link">All Articles</a>
        </div>
      </aside>

    </div>

    <?php if (!empty($relatedPost)) { ?>
    
    <?php } ?>

  </div>
</div>

<?php $this->endSection(); ?>