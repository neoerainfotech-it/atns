<?php 
$this->extend('layouts/master');
$this->section('page');
$transparentHeader = true;

// Estimate reading time from the article body
$readingWordCount = isset($detail->description) ? str_word_count(strip_tags($detail->description)) : 0;
$readingMinutes    = max(1, (int) ceil($readingWordCount / 200));

// Process crisp fallback descriptive summaries from structural backend strings
$cleanHeroDesc = isset($detail->description) ? mb_strimwidth(strip_tags($detail->description), 0, 180, '...') : '';
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

  --font-display:     'Sora', system-ui, -apple-system, sans-serif;
  --font-body:        'Inter', system-ui, -apple-system, sans-serif;

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
  box-shadow: var(--shadow-sm);
  padding: 48px;
}
.blog-detail-article .article-body {
  font-size: 1.05rem;
  line-height: 1.85;
  color: var(--clr-text);
  word-wrap: break-word;
}
.blog-detail-article .article-body h2,
.blog-detail-article .article-body h3 {
  font-family: var(--font-display);
  color: var(--clr-navy);
  font-weight: 700;
  margin-top: 1.8em;
  margin-bottom: .8em;
  letter-spacing: -.01em;
}
.blog-detail-article .article-body p { margin-bottom: 1.3em; }
.blog-detail-article .article-body img {
  width: 100%;
  height: auto;
  border-radius: 12px;
  margin: 2.2em 0;
  display: block;
}
.blog-detail-article .article-body blockquote {
  border-left: 4px solid var(--clr-blue);
  padding: 18px 24px;
  margin: 2em 0;
  background: var(--clr-sky);
  border-radius: 0 12px 12px 0;
  font-style: italic;
  color: var(--clr-navy);
}

/* ---- Share Strip Component ---- */
.blog-detail-share-strip {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 16px;
  padding-top: 24px;
  margin-top: 40px;
  border-top: 1px solid var(--clr-border);
  flex-wrap: wrap;
}
.blog-detail-share-strip .share-label {
  font-size: 13px;
  font-weight: 700;
  letter-spacing: .08em;
  text-transform: uppercase;
  color: var(--clr-muted);
}

/* ---- Sticky Sticky Sidebar System ---- */
.blog-detail-sidebar {
  display: flex;
  flex-direction: column;
  gap: 24px;
  position: sticky;
  top: 110px;
}
.blog-sidebar-card {
  background: var(--clr-white);
  border: 1px solid var(--clr-border);
  border-radius: var(--radius-card);
  box-shadow: var(--shadow-sm);
  padding: 28px;
}
.blog-sidebar-card__label {
  font-size: 12px;
  font-weight: 700;
  letter-spacing: .1em;
  text-transform: uppercase;
  color: var(--clr-blue);
  margin-bottom: 18px;
}
.sidebar-fact {
  display: flex;
  align-items: flex-start;
  gap: 12px;
  margin-bottom: 16px;
}
.sidebar-fact:last-child { margin-bottom: 0; }
.sidebar-fact__icon {
  width: 32px;
  height: 32px;
  flex-shrink: 0;
  border-radius: 8px;
  background: var(--clr-sky);
  display: flex;
  align-items: center;
  justify-content: center;
}
.sidebar-fact__text small {
  display: block;
  font-size: 11.5px;
  font-weight: 500;
  color: var(--clr-muted);
  margin-bottom: 2px;
}
.sidebar-fact__text strong {
  font-size: 14.5px;
  color: var(--clr-navy);
  font-weight: 700;
}
.blog-sidebar-cta {
  background: var(--clr-navy);
  border: none;
}
.blog-sidebar-cta p {
  color: rgba(255,255,255,.78);
  font-size: 13.5px;
  line-height: 1.6;
  margin: 0 0 18px;
}
.blog-sidebar-cta .sidebar-cta-link {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  width: 100%;
  background: var(--clr-blue);
  color: var(--clr-white);
  font-size: 14px;
  font-weight: 700;
  text-decoration: none;
  padding: 12px 18px;
  border-radius: 100px;
  transition: background var(--ease);
}
.blog-sidebar-cta .sidebar-cta-link:hover { background: var(--clr-blue-deep); }

/* ---- Action Buttons ---- */
.blog-back-link {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  font-size: 13px;
  font-weight: 600;
  color: var(--clr-navy);
  text-decoration: none;
  border: 1px solid var(--clr-border);
  background: var(--clr-white);
  border-radius: 100px;
  padding: 10px 24px;
  transition: all var(--ease);
  margin-bottom: 24px;
  box-shadow: var(--shadow-sm);
}
.blog-back-link:hover {
  background: var(--clr-blue);
  border-color: var(--clr-blue);
  color: var(--clr-white);
}

/* ---- Related Section Header Layout ---- */
.blog-related-section {
  padding: 80px 0 0;
  border-top: 1px solid var(--clr-border);
  margin-top: 80px;
}
.blog-section-header {
  display: flex;
  align-items: flex-end;
  justify-content: space-between;
  gap: 16px;
  margin-bottom: 36px;
  padding-bottom: 18px;
  border-bottom: 1px solid var(--clr-border);
}
.blog-section-header .eyebrow {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  font-size: 11px;
  font-weight: 700;
  letter-spacing: .14em;
  text-transform: uppercase;
  color: var(--clr-blue);
  margin-bottom: 8px;
}
.blog-section-header .eyebrow::before {
  content: "";
  width: 14px;
  height: 2px;
  background: var(--clr-blue);
  display: inline-block;
}
.blog-section-header .section-title {
  font-family: var(--font-display);
  font-size: 1.75rem;
  font-weight: 800;
  color: var(--clr-navy);
  margin: 0;
}

/* ---- Premium Proportional Card Grid Architecture ---- */
.blog-card {
  background: var(--clr-white);
  border-radius: var(--radius-card);
  overflow: hidden;
  display: flex;
  flex-direction: column;
  box-shadow: var(--shadow-sm);
  border: 1px solid var(--clr-border);
  height: 100%;
  position: relative;
  transition: box-shadow var(--ease), transform var(--ease), border-color var(--ease);
}
.blog-card:hover {
  box-shadow: var(--shadow-md);
  transform: translateY(-5px);
  border-color: var(--clr-blue);
}
.blog-card__img-wrap {
  position: relative;
  overflow: hidden;
  background: var(--clr-sky);
  width: 100%;
  aspect-ratio: 16 / 10; /* Strictly locks proportional scaling context across rows */
}
.blog-card__img-wrap img {
  width: 100%;
  height: 100%;
  object-fit: cover !important;
  display: block;
  transition: transform 0.6s var(--ease);
}
.blog-card:hover .blog-card__img-wrap img { transform: scale(1.05); }
.blog-card__body {
  padding: 24px;
  display: flex;
  flex-direction: column;
  flex: 1;
}
.blog-card__meta { display: flex; align-items: center; gap: 12px; margin-bottom: 12px; }
.blog-card__date {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  font-size: 13px;
  color: var(--clr-muted);
}
.blog-card__title {
  font-family: var(--font-display);
  font-size: 1.1rem;
  font-weight: 700;
  color: var(--clr-navy);
  line-height: 1.45;
  margin: 0 0 10px;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
  min-height: 3.2rem;
}
.blog-card__excerpt {
  font-size: 13.5px;
  line-height: 1.6;
  color: var(--clr-muted);
  margin-bottom: 20px;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
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
  padding-top: 14px;
  border-top: 1px solid var(--clr-border);
  transition: color var(--ease), gap var(--ease);
}
.blog-card__read-more:hover { color: var(--clr-blue); gap: 12px; }

/* ---- Structural Responsive Layout Hooks ---- */
@media (max-width: 1099px) {
  .blog-detail-layout { grid-template-columns: 1fr; }
  .blog-detail-sidebar { position: static; display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
}

@media (max-width: 991px) and (min-width: 768px) {
  /* Enforces highly balanced proportional layouts explicitly for Medium Device Columns */
  .blog-card__title { font-size: 1.05rem; min-height: 3.1rem; }
  .blog-card__body { padding: 20px; }
}

@media (max-width: 767px) {
  .blog-detail-hero { min-height: 420px; }
  .blog-detail-hero__content { padding: 90px 0 40px; }
  .blog-detail-article { padding: 28px 20px; }
  .blog-detail-sidebar { grid-template-columns: 1fr; }
  .blog-detail-layout { padding-top: 32px; gap: 24px; }
  .blog-card__title { min-height: auto; }
}
</style>

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
        <div class="col-lg-10">
          <span class="blog-detail-hero__tag">Article Publication</span>
          <h1 class="blog-detail-hero__title"><?php echo $detail->title; ?></h1>
          
          <?php if (!empty($cleanHeroDesc)) { ?>
            <p class="blog-detail-hero__lead"><?php echo $cleanHeroDesc; ?></p>
          <?php } ?>

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
    <section class="blog-related-section">
      <div class="blog-section-header">
        <div>
          <div class="eyebrow">Recommended</div>
          <h2 class="section-title">Related Articles</h2>
        </div>
      </div>

      <div class="row g-4">
        <?php foreach ($relatedPost as $key => $value) { 
          // Build string text summaries dynamically from relational data
          $cleanCardExcerpt = isset($value->description) ? mb_strimwidth(strip_tags($value->description), 0, 110, '...') : 'Explore deeper insights and strategy metrics from our latest structural updates...';
        ?>
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
                  <svg width="13" height="13" viewBox="0 0 16 16" fill="none" aria-hidden="true"><rect x="1" y="3" width="14" height="12" rx="2" stroke="#65809B" stroke-width="1.4"/><path d="M5 1v3M11 1v3M1 7h14" stroke="#65809B" stroke-width="1.4" stroke-linecap="round"/></svg>
                  <?php echo $value->publish ? date('d M Y', strtotime($value->publish)) : ''; ?>
                </span>
              </div>
              <h4 class="blog-card__title"><?php echo esc($value->title); ?></h4>
              
              <p class="blog-card__excerpt"><?php echo $cleanCardExcerpt; ?></p>

              <a href="<?php echo base_url('blog/' . $value->slug); ?>" class="blog-card__read-more">
                Read Article
                <svg width="16" height="12" viewBox="0 0 16 12" fill="none" aria-hidden="true"><path d="M1 5.25a.75.75 0 0 0 0 1.5zm14.53 1.28a.75.75 0 0 0 0-1.06L10.757.697a.75.75 0 0 0-1.06 1.06L13.939 6l-4.242 4.243a.75.75 0 0 0 1.06 1.06zM1 6.75h14v-1.5H1z" fill="currentColor"/></svg>
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