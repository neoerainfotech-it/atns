<?php 
$this->extend('layouts/master');
$this->section('page');
?>

<?php echo $this->include('frontend/includes/banner') ?>

<style>
/* ============================================================
   BLOG LISTING PAGE — LIGHT BLUE / WHITE PROFESSIONAL THEME
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

  --radius-card:       14px;
  --radius-pill:       999px;
  --shadow-sm:         0 4px 16px rgba(22, 50, 79, 0.05);
  --shadow-md:         0 16px 40px rgba(22, 50, 79, 0.12);
  --ease:              cubic-bezier(.25, .8, .25, 1);
}

.blog-page-wrap {
  background:
    radial-gradient(circle at 1px 1px, rgba(45, 125, 210, 0.06) 1px, transparent 0) 0 0/22px 22px,
    var(--clr-white);
  padding: 0 0 110px;
  font-family: var(--font-body);
  color: var(--clr-text);
}

/* ---- Filter bar ---- */
.blog-filter-container {
  max-width: 480px;
  margin: -30px auto 56px;
  position: relative;
  z-index: 10;
  padding: 0 15px;
}
.blog-filter-wrapper {
  background: var(--clr-white);
  padding: 6px;
  border: 1px solid var(--clr-border);
  border-radius: var(--radius-pill);
  box-shadow: var(--shadow-md);
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 4px;
}
.filter-btn {
  flex: 1;
  border: none;
  background: transparent;
  color: var(--clr-muted);
  font-family: var(--font-body);
  font-size: 14px;
  font-weight: 600;
  text-align: center;
  padding: 11px 18px;
  border-radius: var(--radius-pill);
  white-space: nowrap;
  cursor: pointer;
  transition: background var(--ease), color var(--ease), box-shadow var(--ease);
}
.filter-btn:hover {
  color: var(--clr-navy);
  background: var(--clr-sky);
}
.filter-btn:focus-visible {
  outline: 2px solid var(--clr-blue);
  outline-offset: 2px;
}
.filter-btn.active {
  background: var(--clr-blue);
  color: var(--clr-white);
  box-shadow: 0 6px 18px rgba(45, 125, 210, 0.32);
}
.filter-btn.active:hover {
  background: var(--clr-blue-deep);
  color: var(--clr-white);
}

/* ---- Section header ---- */
.blog-section-header {
  display: flex;
  align-items: flex-end;
  justify-content: space-between;
  gap: 16px;
  margin-bottom: 32px;
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
.blog-section-header h2.section-title {
  font-family: var(--font-display);
  font-size: clamp(1.5rem, 3vw, 2.1rem);
  font-weight: 800;
  color: var(--clr-navy);
  margin: 0;
  line-height: 1.2;
  letter-spacing: -.01em;
}

/* ---- Structural cards ---- */
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
  aspect-ratio: 16 / 10;
}
.blog-card__img-wrap::before,
.blog-card__img-wrap::after {
  content: "";
  position: absolute;
  width: 22px;
  height: 22px;
  border: 2px solid var(--clr-white);
  opacity: 0;
  transition: opacity var(--ease), transform var(--ease);
  z-index: 2;
  pointer-events: none;
}
.blog-card__img-wrap::before {
  top: 10px;
  left: 10px;
  border-right: none;
  border-bottom: none;
  transform: translate(-4px, -4px);
}
.blog-card__img-wrap::after {
  bottom: 10px;
  right: 10px;
  border-left: none;
  border-top: none;
  transform: translate(4px, 4px);
}
.blog-card:hover .blog-card__img-wrap::before,
.blog-card:hover .blog-card__img-wrap::after {
  opacity: 1;
  transform: translate(0, 0);
}
.blog-card__img-wrap img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
  transition: transform 0.6s var(--ease);
}
.blog-card:hover .blog-card__img-wrap img {
  transform: scale(1.05);
}
.blog-card__body {
  padding: 24px;
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
  font-size: 13px;
  color: var(--clr-muted);
}
.blog-card__tag {
  display: inline-block;
  font-size: 11px;
  font-weight: 700;
  letter-spacing: .06em;
  text-transform: uppercase;
  background: var(--clr-sky);
  color: var(--clr-blue-deep);
  border-radius: var(--radius-pill);
  padding: 3px 11px;
}
.blog-card__title {
  font-family: var(--font-display);
  font-size: 1.15rem;
  font-weight: 700;
  color: var(--clr-navy);
  line-height: 1.45;
  margin: 0 0 10px;
  letter-spacing: -.005em;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
  min-height: 3.3rem;
}
.blog-card__excerpt {
  font-size: 14px;
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
  gap: 6px;
  font-size: 13px;
  font-weight: 600;
  color: var(--clr-navy);
  text-decoration: none;
  margin-top: auto;
  padding-top: 14px;
  border-top: 1px solid var(--clr-border);
  transition: color var(--ease), gap var(--ease);
}
.blog-card__read-more:hover {
  color: var(--clr-blue);
  gap: 10px;
}
.blog-card__read-more:focus-visible {
  outline: 2px solid var(--clr-blue);
  outline-offset: 3px;
  border-radius: 4px;
}

/* ---- Empty state ---- */
.blog-empty-state {
  width: 100%;
  text-align: center;
  padding: 48px 24px;
  background: var(--clr-sky);
  border: 1px dashed var(--clr-border);
  border-radius: var(--radius-card);
  color: var(--clr-muted);
  font-size: 14px;
}

/* ---- Filtering states ---- */
.blog-section-wrapper {
  transition: opacity 0.3s ease;
}
.blog-section-wrapper.hidden-block {
  display: none !important;
}

@media (prefers-reduced-motion: reduce) {
  .blog-card, .blog-card__img-wrap img, .filter-btn, .blog-card__read-more {
    transition: none !important;
  }
}

@media (max-width: 991px) {
  .blog-section-header { flex-wrap: wrap; }
  /* Smooth proportional configuration context for tablet layouts */
  .blog-card__body { padding: 22px; }
  .blog-card__title { font-size: 1.08rem; min-height: 3.1rem; }
}

@media (max-width: 767px) {
  .blog-filter-container { margin: -20px auto 36px; }
  .filter-btn { padding: 9px 12px; font-size: 13px; }
  .blog-card__title { min-height: auto; }
  .blog-card__body { padding: 20px; }
}

@media (max-width: 420px) {
  .blog-filter-wrapper { flex-wrap: nowrap; }
  .filter-btn { padding: 9px 8px; font-size: 12.5px; }
}
</style>

<div class="blog-page-wrap">

  <div class="blog-filter-container">
    <div class="blog-filter-wrapper" data-cue="fadeIn" role="group" aria-label="Filter articles">
      <button type="button" class="filter-btn active" aria-pressed="true" onclick="filterBlogType('all', this)">All Articles</button>
      <button type="button" class="filter-btn" aria-pressed="false" onclick="filterBlogType('featured', this)">Featured</button>
      <button type="button" class="filter-btn" aria-pressed="false" onclick="filterBlogType('latest', this)">Latest</button>
    </div>
  </div>

  <div id="section-featured" class="blog-section-wrapper">
    <section class="blog-section">
      <div class="container">
        <div class="blog-section-header" data-cue="slideInUp">
          <div>
            <div class="eyebrow">Editor's Selection</div>
            <h2 class="section-title"><?php echo isset($meta->title1) ? esc($meta->title1) : 'Featured Articles'; ?></h2>
          </div>
        </div>

        <div class="row g-4" data-cues="slideInUp">
          <?php if (!empty($featureList)) { foreach ($featureList as $key => $value) { 
            // Dynamic generation of content excerpts directly from the structural description string
            $featuredExcerpt = isset($value->description) ? mb_strimwidth(strip_tags($value->description), 0, 120, '...') : 'Explore our collection of comprehensive enterprise updates, system methodologies, and industry highlights...';
          ?>
          <div class="col-lg-6 col-md-6 d-flex">
            <div class="blog-card w-100">
              <div class="blog-card__img-wrap">
                <img
                  src="<?php echo $value->thumbnail ? base_url($value->thumbnail) : base_url($config_logo); ?>"
                  alt="<?php echo htmlspecialchars($value->title); ?>"
                  loading="<?php echo $key === 0 ? 'eager' : 'lazy'; ?>"
                />
              </div>
              <div class="blog-card__body">
                <div class="blog-card__meta">
                  <span class="blog-card__tag">Featured</span>
                  <span class="blog-card__date">
                    <svg width="13" height="13" viewBox="0 0 16 16" fill="none" aria-hidden="true" class="me-1"><rect x="1" y="3" width="14" height="12" rx="2" stroke="#65809B" stroke-width="1.4"/><path d="M5 1v3M11 1v3M1 7h14" stroke="#65809B" stroke-width="1.4" stroke-linecap="round"/></svg>
                    <?php echo $value->publish ? date('d M Y', strtotime($value->publish)) : date('d M Y'); ?>
                  </span>
                </div>
                <h4 class="blog-card__title"><?php echo esc($value->title); ?></h4>
                
                <p class="blog-card__excerpt"><?php echo $featuredExcerpt; ?></p>

                <a href="<?php echo base_url('blog/' . $value->slug); ?>" class="blog-card__read-more">
                  Read Article
                  <svg width="16" height="12" viewBox="0 0 16 12" fill="none" aria-hidden="true"><path d="M1 5.25a.75.75 0 0 0 0 1.5zm14.53 1.28a.75.75 0 0 0 0-1.06L10.757.697a.75.75 0 0 0-1.06 1.06L13.939 6l-4.242 4.243a.75.75 0 0 0 1.06 1.06zM1 6.75h14v-1.5H1z" fill="currentColor"/></svg>
                </a>
              </div>
            </div>
          </div>
          <?php } } else { ?>
            <div class="col-12">
              <p class="blog-empty-state">No featured articles have been published yet.</p>
            </div>
          <?php } ?>
        </div>
      </div>
    </section>

    <div id="section-divider" class="container"><hr style="border: 0; border-top: 1px solid var(--clr-border); margin-top: 64px;"></div>
  </div>

  <div id="section-latest" class="blog-section-wrapper">
    <section class="blog-section">
      <div class="container">
        <div class="blog-section-header" data-cue="slideInUp">
          <div>
            <div class="eyebrow">Just In</div>
            <h2 class="section-title"><?php echo isset($meta->title2) ? esc($meta->title2) : 'Latest Articles'; ?></h2>
          </div>
        </div>

        <div class="row g-4" data-cues="slideInUp">
          <?php if (!empty($blogList)) { foreach ($blogList as $key => $value) { 
            // Dynamic generation of content excerpts directly from the structural description string
            $latestExcerpt = isset($value->description) ? mb_strimwidth(strip_tags($value->description), 0, 110, '...') : 'Read through our latest workflow architecture publications, technology reviews, and innovation breakdowns...';
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
                  <span class="blog-card__tag">Latest</span>
                  <span class="blog-card__date">
                    <svg width="13" height="13" viewBox="0 0 16 16" fill="none" aria-hidden="true" class="me-1"><rect x="1" y="3" width="14" height="12" rx="2" stroke="#65809B" stroke-width="1.4"/><path d="M5 1v3M11 1v3M1 7h14" stroke="#65809B" stroke-width="1.4" stroke-linecap="round"/></svg>
                    <?php echo $value->publish ? date('d M Y', strtotime($value->publish)) : date('d M Y'); ?>
                  </span>
                </div>
                <h4 class="blog-card__title"><?php echo esc($value->title); ?></h4>
                
                <p class="blog-card__excerpt"><?php echo $latestExcerpt; ?></p>

                <a href="<?php echo base_url('blog/' . $value->slug); ?>" class="blog-card__read-more">
                  Read Article
                  <svg width="16" height="12" viewBox="0 0 16 12" fill="none" aria-hidden="true"><path d="M1 5.25a.75.75 0 0 0 0 1.5zm14.53 1.28a.75.75 0 0 0 0-1.06L10.757.697a.75.75 0 0 0-1.06 1.06L13.939 6l-4.242 4.243a.75.75 0 0 0 1.06 1.06zM1 6.75h14v-1.5H1z" fill="currentColor"/></svg>
                </a>
              </div>
            </div>
          </div>
          <?php } } else { ?>
            <div class="col-12">
              <p class="blog-empty-state">No articles have been published yet.</p>
            </div>
          <?php } ?>
        </div>
      </div>
    </section>
  </div>

</div>

<script>
function filterBlogType(type, buttonElement) {
  document.querySelectorAll('.filter-btn').forEach(function (btn) {
    btn.classList.remove('active');
    btn.setAttribute('aria-pressed', 'false');
  });
  buttonElement.classList.add('active');
  buttonElement.setAttribute('aria-pressed', 'true');

  var featuredBlock = document.getElementById('section-featured');
  var latestBlock = document.getElementById('section-latest');
  var dividerBlock = document.getElementById('section-divider');

  var showFeatured = (type === 'all' || type === 'featured');
  var showLatest = (type === 'all' || type === 'latest');

  featuredBlock.classList.toggle('hidden-block', !showFeatured);
  latestBlock.classList.toggle('hidden-block', !showLatest);
  if (dividerBlock) {
    dividerBlock.classList.toggle('hidden-block', !(showFeatured && showLatest));
  }
}
</script>

<?php $this->endSection(); ?>