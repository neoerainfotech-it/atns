<?php
$this->extend('layouts/master');
$this->section('page');
$transparentHeader = true;
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;1,9..40,400&display=swap" rel="stylesheet">

<style>
/* ================================================================
   ATNA TECHNOLOGIES — GLOBAL STYLE CONFIGURATION
   ================================================================ */
:root {
  --ink:          #060f1e;
  --ink-mid:      #1a2a42;
  --ocean:        #0083BF;
  --ocean-deep:   #005d8e;
  --ocean-dim:    #003f64;
  --ocean-sat:    #0099d6;
  --flash:        #00d4ff;
  --flash-soft:   rgba(0,212,255,0.15);
  --foam:         #e8f6fc;
  --fog:          #f2f7fb;
  --mist:         #5a6a80;
  --rule:         #dde6ee;
  --white:        #ffffff;

  --para-clip:    polygon(14px 0%, 100% 0%, calc(100% - 14px) 100%, 0% 100%);
  --para-clip-r:  polygon(0% 0%, calc(100% - 14px) 0%, 100% 100%, 14px 100%);

  --ease-spring:  cubic-bezier(0.22, 1, 0.36, 1);
  --ease-out:     cubic-bezier(0.16, 1, 0.3, 1);
  --B:            #0083BF;
  --BD:           #005d8e;
  --BDD:          #002d45;
  --CY:           #00e0ff;
  --W:            #ffffff;
  --INK:          #040d18;
  --SL:           #0d1f35;
  --MID:          #1a3250;
  --GR:           #64748b;
  --LN:           #e2eaf2;
  --BG:           #f5f8fb;
  --radius:       20px;
  --ease:         cubic-bezier(.22,1,.36,1);
}

*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

html { scroll-behavior: auto !important; }

body {
  font-family: 'DM Sans', -apple-system, system-ui, sans-serif;
  background: var(--white);
  color: var(--ink);
  overflow-x: hidden;
  -webkit-font-smoothing: antialiased;
}

/* ---- Lenis Core Framework Overrides ---- */
html.lenis, html.lenis body { height: auto; }
.lenis-smooth { scroll-behavior: auto !important; }
.lenis-smooth [data-lenis-prevent] { scroll-behavior: contain; }

/* ---- Scroll Reveal System ---- */
[data-reveal] {
  opacity: 0;
  transform: translateY(28px);
  transition: opacity 0.7s var(--ease-spring), transform 0.7s var(--ease-spring);
}
[data-reveal].in { opacity: 1; transform: translateY(0); }
[data-reveal][data-delay="1"] { transition-delay: 0.08s; }
[data-reveal][data-delay="2"] { transition-delay: 0.16s; }
[data-reveal][data-delay="3"] { transition-delay: 0.24s; }
[data-reveal][data-delay="4"] { transition-delay: 0.32s; }
[data-reveal][data-delay="5"] { transition-delay: 0.40s; }
[data-reveal][data-delay="6"] { transition-delay: 0.48s; }

/* ================================================================
   HERO INTERFACE — UPGRADED PERSPECTIVE ENGINE (image_b3bf7a.jpg)
   ================================================================ */
.xhero {
  display: flex;
  align-items: center;
  min-height: 100vh;
  background: var(--BDD);
  position: relative;
  overflow: hidden;
  padding: 140px 0 100px 0;
}

/* Authentic digital node background backing grid matching reference image */
.xhero::before {
  content: ''; position: absolute; inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg stroke='%2300e0ff' stroke-width='1.2' stroke-opacity='0.025'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
  z-index: 1; pointer-events: none;
}

.xhero::after {
  content: ''; position: absolute; top: -20%; right: -10%; width: 700px; height: 700px;
  background: radial-gradient(circle, rgba(0, 224, 255, 0.08) 0%, transparent 70%);
  z-index: 1; pointer-events: none;
}

.xhero .container {
  position: relative;
  z-index: 2;
}

.xhero__left {
  display: flex;
  flex-direction: column;
  justify-content: center;
}

.xhero__tag {
  display: inline-flex; align-items: center; gap: 8px;
  background: rgba(0,224,255,.08); border: 1px solid rgba(0,224,255,.25);
  color: var(--CY); font-size: .7rem; font-weight: 600; letter-spacing: .18em;
  text-transform: uppercase; padding: 6px 16px; border-radius: 50px;
  margin-bottom: 28px; width: max-content;
}

.xhero__tag-dot {
  width: 5px; height: 5px; border-radius: 50%; background: var(--CY);
  animation: blink 2s ease-in-out infinite;
}
@keyframes blink { 0%, 100% { opacity: 1 } 50% { opacity: .2 } }

.xhero__title {
  font-family: 'Space Grotesk', sans-serif;
  font-size: clamp(2.2rem, 3.8vw, 3.6rem);
  font-weight: 700; line-height: 1.15;
  color: #fff; letter-spacing: -.02em;
  margin-bottom: 24px;
  text-transform: capitalize;
}
.xhero__title mark {
  background: none;
  -webkit-background-clip: text; background-clip: text;
  -webkit-text-fill-color: transparent;
  background-image: linear-gradient(90deg, var(--CY), #7dd3fc);
  display: inline;
}

.xhero__sub {
  font-size: 1.05rem; line-height: 1.7;
  color: rgba(255,255,255,.65);
  max-width: 520px; margin-bottom: 36px;
}

.xhero__btns { 
  display: flex; 
  flex-wrap: wrap; 
  gap: 16px; 
}

.xbtn-solid {
  display: inline-flex; align-items: center; gap: 9px;
  background: var(--ocean); color: #fff;
  font-weight: 700; font-size: .9rem; padding: 14px 28px;
  border-radius: 8px; text-decoration: none; border: none; cursor: pointer;
  transition: all .3s var(--ease);
}
.xbtn-solid:hover { background: var(--white); color: var(--BDD); transform: translateY(-3px); box-shadow: 0 12px 28px rgba(0, 131, 191, 0.35); text-decoration: none; }

.xbtn-line {
  display: inline-flex; align-items: center; gap: 9px;
  background: transparent; color: rgba(255,255,255,.8);
  font-weight: 600; font-size: .9rem; padding: 13px 27px;
  border-radius: 8px; text-decoration: none;
  border: 1px solid rgba(255,255,255,.2);
  transition: all .3s ease;
}
.xbtn-line:hover { background: rgba(255,255,255,.07); border-color: rgba(255,255,255,.5); color: #fff; transform: translateY(-3px); text-decoration: none; }

/* Asymmetric 3D Perspective Canvas Container (Right Column) */
.xhero__right-perspective-canvas {
  position: relative;
  width: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  perspective: 1200px;
}

.xhero__dashboard-mockup-frame {
  width: 100%;
  max-width: 620px; /* Reduced base boundary width for a more balanced grid */
  height: 330px;    /* Strict professional height threshold boundary */
  object-fit: cover; /* Prevents aspect ratio distortion and bad stretching */
  object-position: center;
  border-radius: 12px;
  border: 4px solid rgba(255, 255, 255, 0.08);
  box-shadow: -20px 30px 80px rgba(4, 13, 24, 0.6), 
              0 10px 30px rgba(0, 224, 255, 0.05);
  transform: rotateY(-14deg) rotateX(6deg) rotateZ(-1deg);
  transform-style: preserve-3d;
  transition: transform 0.6s var(--ease-spring);
}

.xhero__right-perspective-canvas:hover .xhero__dashboard-mockup-frame {
  transform: rotateY(-6deg) rotateX(3deg) rotateZ(0deg);
}

/* Interactive Floating Highlight Badge matching sidecards in image_b3bf7a.jpg */
.xhero__floating-feature-tag {
  position: absolute;
  bottom: -20px;
  left: -10px;
  background: rgba(255, 255, 255, 0.95);
  border: 1px solid var(--rule);
  border-radius: 14px;
  padding: 14px 20px;
  display: flex;
  align-items: center;
  gap: 12px;
  box-shadow: 0 20px 40px rgba(0,0,0,0.15);
  transform: translateZ(40px);
  animation: floatBadge 4s ease-in-out infinite;
}

@keyframes floatBadge {
  0%, 100% { transform: translateY(0) translateZ(40px); }
  50% { transform: translateY(-8px) translateZ(40px); }
}

.xhero__floating-badge-icon {
  width: 36px; height: 36px;
  background: linear-gradient(135deg, var(--ocean), var(--flash));
  border-radius: 8px;
  display: flex; align-items: center; justify-content: center;
  color: #fff; font-size: 0.85rem;
}

.xhero__floating-badge-text strong { display: block; font-size: 0.82rem; font-weight: 700; color: var(--ink); }
.xhero__floating-badge-text span { display: block; font-size: 0.72rem; color: var(--GR); }

.xhero__scroll {
  position: absolute; bottom: 65px; left: 12;
  z-index: 3; display: flex; align-items: center; gap: 10px;
  color: rgba(255,255,255,.35); font-size: .72rem; letter-spacing: .12em; text-transform: uppercase;
}
.xhero__scroll-line {
  width: 80px; height: 2px; background: rgba(255,255,255,.25);
  position: relative; overflow: hidden;
}
.xhero__scroll-line::after {
  content: ''; position: absolute; top: 0; left: -100%; width: 100%; height: 100%;
  background: var(--CY); animation: scrollLine 2s ease-in-out infinite;
}
@keyframes scrollLine { 0% { left: -100%; } 50%, 100% { left: 100%; } }

/* ================================================================
   TICKER STRIP
   ================================================================ */
.xticker { background: var(--B); padding: 16px 0; overflow: hidden; position: relative; z-index: 3; }
.xticker__track { display: flex; width: max-content; gap: 0; animation: tickerScroll 25s linear infinite; }
@keyframes tickerScroll { 0% { transform: translateX(0); } 100% { transform: translateX(-50%); } }
.xticker__item {
  display: inline-flex; align-items: center; gap: 10px;
  white-space: nowrap; padding: 0 40px;
  font-size: .8rem; font-weight: 600; letter-spacing: .06em;
  color: rgba(255,255,255,.9);
  border-right: 1px solid rgba(255,255,255,.15);
}
.xticker__item i { color: var(--CY); font-size: .75rem; }

/* ================================================================
   FINANCE TRUST STRIP — UNIFIED PREMIUM MATRIX (image_da3540.png Fixed)
   ================================================================ */
.finance-trust-strip {
  background: #ffffff;
  padding: 40px 0;
  border-bottom: 1px solid #dde6ee;
  position: relative;
  z-index: 5;
}

.finance-trust__wrapper {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 24px;
}

.finance-trust__title {
  font-family: 'Space Grotesk', sans-serif;
  font-size: 0.8rem;
  font-weight: 700;
  letter-spacing: 0.18em;
  color: #5a6a80;
  text-transform: uppercase;
  margin: 0;
  text-align: center;
}

.finance-trust__grid {
  display: flex;
  align-items: center;
  justify-content: center;
  flex-wrap: wrap;
  gap: 48px;
  width: 100%;
}

/* Premium Logo Layout Rule: Icon Left + Text Right */
.finance-trust__logo-badge {
  display: flex;
  align-items: center;
  gap: 12px;
  text-decoration: none !important;
  transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
}

.finance-trust__logo-badge:hover {
  transform: translateY(-2px);
}

/* Standardized Icon Boundaries */
.finance-trust__logo-badge svg,
.finance-trust__logo-badge i {
  width: 28px;
  height: 28px;
  font-size: 28px;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
}

/* Styled Icon Accents for ISO Vectors */
.finance-trust__icon-iso-blue {
  color: #0083BF;
}
.finance-trust__icon-iso-navy {
  color: #005d8e;
}

.finance-trust__logo-text {
  display: flex;
  flex-direction: column;
  line-height: 1.15;
}

.finance-trust__logo-text strong {
  font-family: 'Space Grotesk', sans-serif;
  font-size: 0.95rem;
  font-weight: 700;
  color: #060f1e;
}

.finance-trust__logo-text span {
  font-family: 'DM Sans', sans-serif;
  font-size: 0.72rem;
  color: #5a6a80;
  font-weight: 500;
  margin-top: 1px;
}

/* ================================================================
   RESPONSIVE LAYOUT MATRIX
   ================================================================ */
@media (max-width: 991px) {
  .finance-trust-strip { padding: 32px 0; }
  .finance-trust__grid { gap: 24px 36px; }
}

@media (max-width: 768px) {
  .finance-trust__grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 24px 16px;
  }
  .finance-trust__logo-badge { justify-content: center; }
}

@media (max-width: 480px) {
  .finance-trust__grid {
    grid-template-columns: 1fr;
    gap: 20px;
  }
  .finance-trust__logo-badge { justify-content: flex-start; max-width: 240px; margin: 0 auto; }
}

/* ================================================================
   WHY PLATFORM BENEFITS GRID — BENTO MATRIX (image_c32fdc.png)
   ================================================================ */
.why-benefits-banner {
  background: #f8faac; /* Matching your clean light tint canvas / --BG */
  background-color: var(--BG, #f5f8fb);
  padding: 60px 0;
  position: relative;
  z-index: 4;
}

.why-benefits__title {
  font-family: 'Space Grotesk', sans-serif;
  font-size: clamp(1.5rem, 2.5vw, 2rem);
  font-weight: 700;
  color: var(--ink);
  text-align: center;
  margin-bottom: 36px;
  letter-spacing: -0.02em;
}

.why-benefits__grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 20px;
  width: 100%;
}

.why-benefits__card {
  background: var(--white, #ffffff);
  border: 1px solid var(--rule, #dde6ee);
  border-radius: 16px;
  padding: 24px;
  display: flex;
  align-items: center;
  gap: 16px;
  box-shadow: 0 4px 20px rgba(4, 13, 24, 0.015);
  transition: all 0.4s var(--ease);
}

.why-benefits__card:hover {
  transform: translateY(-4px);
  box-shadow: 0 16px 36px rgba(4, 13, 24, 0.05);
  border-color: rgba(0, 131, 191, 0.25);
}

.why-benefits__icon-frame {
  width: 48px;
  height: 48px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  color: #ffffff;
  font-size: 1.1rem;
  flex-shrink: 0;
}

/* Color palettes extracted verbatim from image_c32fdc.png */
.why-benefits__icon-frame.blue-accent { background: #0066cc; }
.why-benefits__icon-frame.green-accent { background: #00a86b; }
.why-benefits__icon-frame.purple-accent { background: #7a3bf5; }
.why-benefits__icon-frame.teal-accent { background: #009999; }

.why-benefits__content {
  display: flex;
  flex-direction: column;
  gap: 4px;
}

.why-benefits__card-title {
  font-family: 'Space Grotesk', sans-serif;
  font-size: 0.98rem;
  font-weight: 700;
  color: var(--ink);
  margin: 0;
}

.why-benefits__card-desc {
  font-family: 'DM Sans', sans-serif;
  font-size: 0.82rem;
  line-height: 1.4;
  color: var(--GR, #64748b);
  margin: 0;
}

/* ================================================================
   RESPONSIVE BREAKPOINTS FOR THE BENEFITS GRID
   ================================================================ */
@media (max-width: 1199px) {
  .why-benefits__grid {
    grid-template-columns: repeat(2, 1fr);
    gap: 16px;
  }
}

@media (max-width: 768px) {
  .why-benefits-banner { padding: 44px 0; }
}

@media (max-width: 576px) {
  .why-benefits__grid {
    grid-template-columns: 1fr;
    gap: 14px;
  }
  .why-benefits__card { padding: 20px; }
}

/* ================================================================
   INTELLIGENT PRODUCT OVERVIEW SECTION (image_dd94c5.jpg)
   ================================================================ */
.product-overview-sec {
  padding: 100px 0;
  background: var(--white, #ffffff);
  border-bottom: 1px solid var(--rule, #dde6ee);
  position: relative;
  z-index: 4;
}

/* Force the column container to support full height distribution */
.overview-flex-align {
  display: flex;
  align-items: stretch; /* Enforces equal height on both columns */
}

/* Let the image frame fill 100% height of its parent flex column */
.overview-workspace__img-frame {
  width: 100%;
  height: 100%;
  min-height: 450px; /* Baseline minimum threshold */
  border-radius: 16px;
  background: white;
  padding: 0px;
  box-shadow: 0 20px 50px rgba(4, 13, 24, 0.08);
  border: 1px solid var(--rule, #dde6ee);
  display: flex;
}

/* Make the inner img fill the space beautifully using object-fit */
.overview-workspace__img-frame img {
  display: block;
  width: 100%;
  height: 100%;
  border-radius: 10px;
  object-fit: contain; /* Crops and centers perfectly to scale to matching height */
  object-position: center;
}

/* Content Frame Padding adjustment for symmetry */
.overview-content__wrapper {
  padding-left: 15px;
  display: flex;
  flex-direction: column;
  justify-content: center; /* Vertically centers the text alongside the image */
  height: 100%;
}

/* Typography elements */
.overview-content__eyebrow {
  font-family: 'Space Grotesk', sans-serif;
  font-size: 0.72rem;
  font-weight: 700;
  letter-spacing: 0.15em;
  text-transform: uppercase;
  color: var(--ocean, #0083BF);
  margin-bottom: 12px;
}

.overview-content__title {
  font-family: 'Space Grotesk', sans-serif;
  font-size: clamp(1.8rem, 3vw, 2.4rem);
  font-weight: 700;
  color: var(--ink, #060f1e);
  letter-spacing: -0.02em;
  margin-bottom: 20px;
}

.overview-content__desc {
  font-family: 'DM Sans', sans-serif;
  font-size: 0.98rem;
  line-height: 1.7;
  color: var(--mist, #5a6a80);
  margin-bottom: 36px;
}

/* Checklist Matrix Layout definitions */
.overview-checklist__grid {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  gap: 28px 24px;
}

.overview-checklist__item {
  display: flex;
  align-items: flex-start;
  gap: 12px;
}

.overview-checklist__icon {
  color: #0066cc;
  font-size: 1.1rem;
  margin-top: 3px;
  flex-shrink: 0;
}

.overview-checklist__body {
  display: flex;
  flex-direction: column;
  gap: 4px;
}

.overview-checklist__label {
  font-family: 'Space Grotesk', sans-serif;
  font-size: 0.95rem;
  font-weight: 700;
  color: var(--ink, #060f1e);
  margin: 0;
}

.overview-checklist__text {
  font-family: 'DM Sans', sans-serif;
  font-size: 0.85rem;
  line-height: 1.5;
  color: var(--GR, #64748b);
  margin: 0;
}

/* ================================================================
   DYNAMIC WORKFLOW SYSTEM — LINEAR PIPELINE (image_de8542.png)
   ================================================================ */
.workflow-sec {
  padding: 60px 0 80px 0;
  background: var(--white, #ffffff);
  border-bottom: 1px solid var(--rule, #dde6ee);
  position: relative;
  z-index: 4;
}

.workflow__title {
  font-family: 'Space Grotesk', sans-serif;
  font-size: clamp(1.35rem, 2.5vw, 1.85rem);
  font-weight: 700;
  color: var(--ink, #060f1e);
  text-align: center;
  margin-bottom: 50px;
  letter-spacing: -0.01em;
}

.workflow__pipeline {
  display: flex;
  align-items: center;
  justify-content: space-between;
  width: 100%;
  max-width: 1100px;
  margin: 0 auto;
  position: relative;
}

/* Base Node Step */
.workflow__node {
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
  position: relative;
  z-index: 2;
  width: 120px;
}

.workflow__bubble {
  width: 74px;
  height: 74px;
  border-radius: 50%;
  background: var(--white, #ffffff);
  border: 1px solid var(--rule, #dde6ee);
  box-shadow: 0 8px 24px rgba(4, 13, 24, 0.04);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.4rem;
  color: var(--ocean, #0083BF);
  transition: all 0.4s var(--ease);
  position: relative;
}

/* Subtle glowing pulse matching the primary theme accent color map */
.workflow__node:hover .workflow__bubble {
  transform: scale(1.1);
  border-color: var(--flash, #00d4ff);
  box-shadow: 0 12px 30px rgba(0, 212, 255, 0.2);
  color: var(--ocean-sat, #0099d6);
}

.workflow__label {
  font-family: 'Space Grotesk', sans-serif;
  font-size: 0.78rem;
  font-weight: 700;
  color: var(--ink, #060f1e);
  margin-top: 14px;
  line-height: 1.3;
  white-space: normal;
}

/* Directional Animated Connectors */
.workflow__connector {
  flex: 1;
  height: 2px;
  background: var(--rule, #dde6ee);
  position: relative;
  margin: 0 -10px;
  margin-bottom: 30px; /* Aligns visually with the center of bubbles */
  overflow: hidden;
  z-index: 1;
}

.workflow__connector::after {
  content: '';
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: linear-gradient(90deg, transparent, var(--ocean, #0083BF), transparent);
  animation: workflowFlow 3s cubic-bezier(0.4, 0, 0.2, 1) infinite;
}

@keyframes workflowFlow {
  0% { left: -100%; }
  100% { left: 100%; }
}

/* Stagger connector delays cleanly */
.workflow__connector:nth-child(2)::after { animation-delay: 0s; }
.workflow__connector:nth-child(4)::after { animation-delay: 0.4s; }
.workflow__connector:nth-child(6)::after { animation-delay: 0.8s; }
.workflow__connector:nth-child(8)::after { animation-delay: 1.2s; }
.workflow__connector:nth-child(10)::after { animation-delay: 1.6s; }
.workflow__connector:nth-child(12)::after { animation-delay: 2s; }

/* ================================================================
   RESPONSIVE LAYOUT TRACKS FOR PIPELINE
   ================================================================ */
@media (max-width: 991px) {
  .workflow__pipeline {
    gap: 10px;
  }
  .workflow__bubble { width: 64px; height: 64px; font-size: 1.2rem; }
  .workflow__label { font-size: 0.72rem; }
}

@media (max-width: 768px) {
  .workflow__pipeline {
    flex-direction: column;
    align-items: center;
    gap: 24px;
  }
  .workflow__node { width: 200px; flex-direction: row; text-align: left; gap: 16px; }
  .workflow__label { margin-top: 0; font-size: 0.85rem; }
  .workflow__connector {
    width: 2px;
    height: 30px;
    margin: -12px 0 -12px 31px; /* Align vertical timeline line tracking with bubble centers */
    flex: none;
  }
  .workflow__connector::after {
    background: linear-gradient(180deg, transparent, var(--ocean, #0083BF), transparent);
    animation: workflowFlowVert 2s linear infinite;
  }
}

@keyframes workflowFlowVert {
  0% { top: -100%; }
  100% { top: 100%; }
}


/* ================================================================
   FEATURES SECTIONS
   ================================================================ */
.features { padding: 120px 0; background: var(--fog); position: relative; overflow: hidden; }
.features__blob { position: absolute; pointer-events: none; border-radius: 50%; }
.features__blob--a { top: -120px; right: -80px; width: 460px; height: 460px; background: radial-gradient(circle, rgba(0,131,191,0.06) 0%, transparent 65%); }
.features__blob--b { bottom: -80px; left: -60px; width: 320px; height: 320px; background: radial-gradient(circle, rgba(0,212,255,0.05) 0%, transparent 65%); }

.feat-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; margin-top: 56px; }
.feat-card { background: var(--white); border: 1px solid var(--rule); padding: 36px 30px; position: relative; overflow: hidden; transition: all 0.4s var(--ease-spring); clip-path: polygon(0 0, 100% 0, 100% calc(100% - 16px), calc(100% - 16px) 100%, 0 100%); }
.feat-card::before { content: ''; position: absolute; top: 0; left: 0; right: 0; height: 2px; background: linear-gradient(90deg, transparent, var(--ocean), var(--flash), transparent); transform: scaleX(0); transform-origin: left; transition: transform 0.5s var(--ease-spring); }
.feat-card::after { content: ''; position: absolute; bottom: 0; right: 0; width: 80px; height: 80px; background: linear-gradient(225deg, rgba(0,131,191,0.05) 0%, transparent 65%); clip-path: polygon(100% 0, 0 100%, 100% 100%); transition: all 0.4s ease; }
.feat-card:hover { border-color: rgba(0,131,191,0.25); box-shadow: 0 24px 56px rgba(0,83,143,0.08); transform: translateY(-6px); }
.feat-card:hover::before { transform: scaleX(1); }
.feat-card:hover::after {
  background: linear-gradient(225deg, var(--flash) 0%, var(--ocean) 50%, transparent 100%);
  opacity: 0.25;
}

.feat-icon { width: 48px; height: 48px; background: var(--foam); border: 1px solid rgba(0,131,191,0.12); display: flex; align-items: center; justify-content: center; color: var(--ocean); font-size: 1.1rem; margin-bottom: 22px; clip-path: var(--para-clip); flex-shrink: 0; transition: all 0.35s var(--ease-spring); }
.feat-card:hover .feat-icon { background: linear-gradient(135deg, var(--ocean), var(--flash)); color: #fff; transform: rotate(-5deg) scale(1.05); }
.feat-title { font-family: 'Space Grotesk', sans-serif; font-size: 1.05rem; font-weight: 600; color: var(--ink); margin-bottom: 12px; }
.feat-body { font-size: 0.9rem; line-height: 1.7; color: var(--mist); }

/* ================================================================
   WHY SECTION — INTERACTIVE STICKY LATERAL ESCAPE ENGINE
================================================================ */
.why-pinned-wrapper {
  position: relative;
  height: 420vh;
  background: linear-gradient(180deg, var(--white) 0%, var(--fog) 100%);
}

.why-sticky-container {
  position: sticky;
  top: 0;
  height: 100vh;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  overflow: hidden;
  padding: 40px 0;
}

.why-sticky-container .container {
  width: 100%;
  max-width: 1200px;
  position: relative;
}

.why-stack-deck {
  position: relative;
  width: 100%;
  max-width: 820px;
  height: 380px;
  margin: 40px auto 0 auto;
}

.why-stack-card {
  position: absolute;
  inset: 0;
  background: var(--white);
  border: 1px solid var(--rule);
  border-radius: 24px;
  padding: 50px 60px;
  display: flex;
  align-items: center;
  gap: 40px;
  box-shadow: 0 30px 70px rgba(4, 13, 24, 0.04);
  will-change: transform, opacity;
  transform-origin: center center;
  background-color: var(--white) !important;
  backface-visibility: hidden;
  -webkit-backface-visibility: hidden;
}

.why-stack-card::before {
  content: '';
  position: absolute;
  inset: 0;
  border-radius: 24px;
  padding: 1.5px;
  background: linear-gradient(135deg, var(--ocean), var(--flash));
  -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
  mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
  -webkit-mask-composite: xor;
  mask-composite: exclude;
  opacity: 0.25;
}

.why-stack-card .card-left { flex-shrink: 0; }
.why-stack-card .card-right { flex: 1; text-align: left; }

.why-stack-icon {
  width: 76px; height: 76px;
  background: var(--foam);
  border: 1px solid rgba(0, 131, 191, 0.15);
  border-radius: 18px;
  display: flex; align-items: center; justify-content: center;
  color: var(--ocean); font-size: 1.6rem;
  clip-path: var(--para-clip);
  transition: all 0.4s var(--ease-spring);
}

.why-stack-card:hover {
  border-color: rgba(0, 131, 191, 0.25);
  box-shadow: 0 40px 80px rgba(0, 83, 143, 0.1);
}
.why-stack-card:hover .why-stack-icon {
  background: linear-gradient(135deg, var(--ocean), var(--flash));
  color: var(--white);
  transform: rotate(-6deg) scale(1.04);
}

.why-stack-title {
  font-family: 'Space Grotesk', sans-serif;
  font-size: 1.35rem; font-weight: 700;
  color: var(--ink); margin-bottom: 12px;
}
.why-stack-body { font-size: 1rem; line-height: 1.7; color: var(--mist); }

/* Dynamic Pagination */
.why-deck-pagination {
  position: absolute;
  top: 50%;
  right: 40px;
  transform: translateY(-50%);
  display: flex;
  flex-direction: column;
  gap: 16px;
  z-index: 10;
  padding: 10px 4px;
  border-left: 1px dashed rgba(0, 131, 191, 0.15);
}
.why-pagination-bullet { display: flex; align-items: center; justify-content: flex-end; gap: 12px; text-decoration: none; cursor: pointer; position: relative; }
.why-bullet-num { font-family: 'Space Grotesk', sans-serif; font-size: 0.75rem; font-weight: 700; color: var(--mist); opacity: 0.4; transition: all 0.4s ease; }
.why-bullet-dot { width: 6px; height: 6px; border-radius: 50%; background: var(--rule); transition: all 0.4s var(--ease-spring); position: relative; }
.why-pagination-bullet.active .why-bullet-num { color: var(--ocean); opacity: 1; transform: scale(1.1); }
.why-pagination-bullet.active .why-bullet-dot { background: var(--flash); transform: scale(1.5); box-shadow: 0 0 12px var(--flash); }

/* ================================================================
   USE CASES
   ================================================================ */
.use-cases { padding: 110px 0; background: var(--fog); position: relative; }
.use-cases::before { content: ''; position: absolute; top: 0; left: 0; right: 0; height: 80px; background: var(--white); clip-path: polygon(0 0, 100% 0, 100% 0, 0 100%); pointer-events: none; }
.uc-tabs { display: flex; flex-wrap: wrap; justify-content: center; gap: 10px; margin-bottom: 52px; }
.uc-tab { background: var(--white); border: 1px solid var(--rule); color: var(--mist); font-family: 'Space Grotesk', sans-serif; font-size: 0.88rem; font-weight: 600; padding: 12px 28px; cursor: pointer; transition: all 0.3s ease; clip-path: var(--para-clip); white-space: nowrap; }
.uc-tab:hover { border-color: var(--ocean); color: var(--ocean); }
.uc-tab.active { background: var(--ocean); color: #fff; border-color: var(--ocean); box-shadow: 0 6px 20px rgba(0,131,191,0.25); }
.uc-panel { display: none; }
.uc-panel.active { display: block; animation: fadeInUp 0.45s var(--ease-spring); }
@keyframes fadeInUp { from { opacity: 0; transform: translateY(18px); } to { opacity: 1; transform: translateY(0); } }
.uc-desc { font-size: 1.05rem; line-height: 1.85; color: var(--ink-mid); }

.video-frame { position: relative; }
.video-frame__accent { position: absolute; inset: 16px -16px -16px 16px; background: linear-gradient(135deg, var(--ocean), var(--flash)); clip-path: polygon(14px 0%, 100% 0%, calc(100% - 14px) 100%, 0% 100%); opacity: 0.18; z-index: 0; border-radius: 4px; }
.video-frame__clip { position: relative; z-index: 1; clip-path: polygon(14px 0%, 100% 0%, calc(100% - 14px) 100%, 0% 100%); overflow: hidden; border-radius: 4px; box-shadow: 0 24px 60px rgba(0,0,0,0.15); transition: transform 0.5s var(--ease-spring); }
.video-frame__clip:hover { transform: scale(1.015); }
.video-responsive { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; background: var(--ink); }
.video-responsive iframe, .video-responsive video { position: absolute; top: 0; left: 0; width: 100%; height: 100%; border: 0; }
.video-frame__play { position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 60px; height: 60px; border-radius: 50%; background: rgba(255,255,255,0.95); display: flex; align-items: center; justify-content: center; color: var(--ocean); font-size: 1.25rem; box-shadow: 0 8px 24px rgba(0,0,0,0.15); z-index: 2; pointer-events: none; animation: floatPlay 3s ease-in-out infinite; }

/* ================================================================
   BUSINESS BENEFITS METRICS BANNER (image_df533c.png)
   ================================================================ */
.biz-benefits-sec {
  padding: 80px 0;
  background: var(--white, #ffffff);
  border-bottom: 1px solid var(--rule, #dde6ee);
  position: relative;
  z-index: 4;
}

.biz-benefits__title {
  font-family: 'Space Grotesk', sans-serif;
  font-size: clamp(1.35rem, 2.5vw, 1.85rem);
  font-weight: 700;
  color: var(--ink, #060f1e);
  text-align: center;
  margin-bottom: 40px;
  letter-spacing: -0.01em;
}

.biz-benefits__grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 24px;
  width: 100%;
}

.biz-benefits__card {
  background: var(--white, #ffffff);
  border: 1px solid var(--rule, #dde6ee);
  border-radius: 16px;
  padding: 32px 24px;
  text-align: center;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  box-shadow: 0 4px 20px rgba(4, 13, 24, 0.01);
  transition: all 0.4s var(--ease);
}

.biz-benefits__card:hover {
  transform: translateY(-5px);
  box-shadow: 0 16px 36px rgba(4, 13, 24, 0.06);
}

/* Header context elements alignment inside cards */
.biz-benefits__card-hdr {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  font-family: 'Space Grotesk', sans-serif;
  font-size: 0.88rem;
  font-weight: 700;
  margin-bottom: 16px;
}

/* Individual accent color mappings matching image_df533c.png */
.biz-benefits__card.blue-theme .biz-benefits__card-hdr,
.biz-benefits__card.blue-theme .biz-benefits__stat { color: #0066cc; }

.biz-benefits__card.green-theme .biz-benefits__card-hdr,
.biz-benefits__card.green-theme .biz-benefits__stat { color: #107c41; }

.biz-benefits__card.purple-theme .biz-benefits__card-hdr,
.biz-benefits__card.purple-theme .biz-benefits__stat { color: #7a3bf5; }

.biz-benefits__card.orange-theme .biz-benefits__card-hdr,
.biz-benefits__card.orange-theme .biz-benefits__stat { color: #f26522; }

.biz-benefits__stat {
  font-family: 'Space Grotesk', sans-serif;
  font-size: clamp(2.2rem, 3.5vw, 3.2rem);
  font-weight: 700;
  line-height: 1;
  margin-bottom: 12px;
  letter-spacing: -0.02em;
}

.biz-benefits__desc {
  font-family: 'DM Sans', sans-serif;
  font-size: 0.85rem;
  font-weight: 500;
  color: var(--GR, #64748b);
  margin: 0;
  line-height: 1.4;
}

/* ================================================================
   RESPONSIVE LAYOUT TRACKS FOR METRICS GRID
   ================================================================ */
@media (max-width: 1199px) {
  .biz-benefits__grid {
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
  }
}

@media (max-width: 576px) {
  .biz-benefits-sec { padding: 60px 0; }
  .biz-benefits__grid {
    grid-template-columns: 1fr;
    gap: 16px;
  }
  .biz-benefits__card { padding: 28px 20px; }
}

/* ================================================================
   INDUSTRIES & BOTTOM SECTIONS
   ================================================================ */
.industries { padding: 120px 0; background: linear-gradient(155deg, var(--ink) 0%, var(--ocean-dim) 40%, var(--ocean) 80%, #00a8d4 100%); position: relative; overflow: hidden; }
.industries::before { content: ''; position: absolute; top: 0; left: 0; right: 0; height: 60px; background: var(--fog); clip-path: polygon(0 0, 100% 0, 100% 0%, 0 100%); pointer-events: none; z-index: 2; }
.industries::after { content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 60px; background: var(--white); clip-path: polygon(0 100%, 100% 0, 100% 100%, 0 100%); pointer-events: none; z-index: 2; }
.industries__hatch { position: absolute; inset: 0; pointer-events: none; background-image: repeating-linear-gradient(-55deg, rgba(255,255,255,0.015) 0px, rgba(255,255,255,0.015) 1px, transparent 1px, transparent 38px); }
.industries__inner { position: relative; z-index: 3; }

.ind-grid {
  display: grid; grid-template-columns: repeat(auto-fit, minmax(160px, 1fr)); gap: 16px; margin-top: 52px; width: 100%; max-width: 1140px; margin-left: auto; margin-right: auto; justify-content: center;
}
.ind-item { display: flex; flex-direction: column; align-items: center; gap: 14px; text-decoration: none; padding: 24px 16px; border: 1px solid rgba(255,255,255,0.08); background: rgba(255,255,255,0.04); backdrop-filter: blur(8px); -webkit-backdrop-filter: blur(8px); clip-path: polygon(14px 0%, calc(100% - 14px) 0%, 100% 14px, 100% 100%, calc(100% - 14px) 100%, 14px 100%, 0% calc(100% - 14px), 0% 14px); transition: all 0.38s var(--ease-spring); }
.ind-item:hover { background: rgba(255,255,255,0.1); border-color: rgba(0,212,255,0.4); transform: translateY(-6px); box-shadow: 0 20px 40px rgba(0,0,0,0.15); }
.ind-icon { width: 54px; height: 54px; background: rgba(255,255,255,0.08); border: 1px solid rgba(255,255,255,0.12); display: flex; align-items: center; justify-content: center; border-radius: 12px; overflow: hidden; transition: all 0.35s ease; }
.ind-icon img { width: 32px; height: 32px; object-fit: contain; filter: brightness(0) invert(1); opacity: 0.8; transition: all 0.35s ease; }
.ind-item:hover .ind-icon { background: rgba(0,212,255,0.2); border-color: rgba(0,212,255,0.4); }
.ind-item:hover .ind-icon img { opacity: 1; transform: scale(1.08); }
.ind-label { font-family: 'Space Grotesk', sans-serif; font-size: 0.82rem; font-weight: 600; color: rgba(255,255,255,0.85); text-align: center; line-height: 1.3; }

.bottom-section { padding: 120px 0; background: var(--white); position: relative; z-index: 4; }
.cta-block { background: var(--ink); padding: 60px 48px; height: 100%; display: flex; flex-direction: column; justify-content: center; position: relative; overflow: hidden; clip-path: polygon(0 0, 100% 0, calc(100% - 20px) 100%, 0 100%); border-radius: 4px; }
.cta-block__glow { position: absolute; top: -80px; right: -80px; width: 320px; height: 320px; border-radius: 50%; background: radial-gradient(circle, rgba(0,212,255,0.2) 0%, transparent 65%); pointer-events: none; }
.cta-block__glow2 { position: absolute; bottom: -100px; left: -60px; width: 250px; height: 250px; border-radius: 50%; background: radial-gradient(circle, rgba(0,131,191,0.14) 0%, transparent 65%); pointer-events: none; }
.cta-block__hatch { position: absolute; inset: 0; pointer-events: none; background: repeating-linear-gradient(-45deg, transparent 0px, transparent 26px, rgba(255,255,255,0.018) 26px, rgba(255,255,255,0.018) 28px); }
.cta-block__title { font-family: 'Space Grotesk', sans-serif; font-size: clamp(1.6rem, 2.5vw, 2.2rem); font-weight: 700; line-height: 1.2; color: #fff; margin-bottom: 16px; position: relative; z-index: 2; }
.cta-block__body { font-size: 0.98rem; line-height: 1.75; color: rgba(255,255,255,0.65); margin-bottom: 34px; position: relative; z-index: 2; }
.cta-block__actions { display: flex; flex-wrap: wrap; gap: 14px; position: relative; z-index: 2; }

/* Dynamic Theme Block Fallbacks Map */
.btn-primary, .btn-ghost { display: inline-flex; align-items: center; gap: 9px; font-weight: 700; font-size: 0.88rem; padding: 14px 28px; border-radius: 8px; text-decoration: none; transition: all 0.3s ease; }
.btn-primary { background: var(--ocean); color: #fff; border: 1px solid transparent; }
.btn-primary:hover { background: var(--ocean-deep); transform: translateY(-2px); color: #white; text-decoration: none;}
.btn-ghost { background: transparent; color: rgba(255,255,255,0.8); border: 1px solid rgba(255,255,255,0.2); }
.btn-ghost:hover { background: rgba(255,255,255,0.08); color: #fff; border-color: rgba(255,255,255,0.4); transform: translateY(-2px); text-decoration: none;}

/* ================================================================
   SCROLL-DRIVEN JOURNEY TRACK — PROGRESS ENGINE (image_dfe683.png)
   ================================================================ */
.journey-sec {
  padding: 100px 0;
  background: var(--white, #ffffff);
  border-bottom: 1px solid var(--rule, #dde6ee);
  position: relative;
  z-index: 4;
}

.journey__title {
  font-family: 'Space Grotesk', sans-serif;
  font-size: clamp(1.35rem, 2.5vw, 1.85rem);
  font-weight: 700;
  color: var(--ink, #060f1e);
  text-align: center;
  margin-bottom: 60px;
  letter-spacing: -0.01em;
}

.journey__container-relative {
  position: relative;
  width: 100%;
  max-width: 1140px;
  margin: 0 auto;
}

/* Continuous background timeline track */
.journey__master-line {
  position: absolute;
  top: 34px; /* Center point vertically matching bubble track */
  left: 5%;
  width: 90%;
  height: 3px;
  background: var(--rule, #dde6ee);
  z-index: 1;
}

/* The dynamic progress indicator bar filled by JavaScript scroll calculations */
.journey__master-fill {
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 0%; /* Initialized dead empty */
  background: linear-gradient(90deg, var(--ocean, #0083BF), var(--flash, #00d4ff));
  transition: width 0.1s linear; /* Smooth micro-interpolation */
}

.journey__track {
  display: flex;
  align-items: flex-start;
  justify-content: space-between;
  width: 100%;
  position: relative;
  z-index: 2;
}

.journey__step {
  display: flex;
  flex-direction: column;
  align-items: center;
  text-align: center;
  flex: 1;
}

.journey__bubble {
  width: 68px;
  height: 68px;
  border-radius: 50%;
  background: var(--white, #ffffff);
  border: 1px solid var(--rule, #dde6ee);
  box-shadow: 0 8px 20px rgba(4, 13, 24, 0.03);
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.25rem;
  color: var(--ocean, #0083BF);
  transition: all 0.4s var(--ease);
}

/* Add active styling hook when progress line passes over the step node */
.journey__step.node-passed .journey__bubble {
  border-color: var(--ocean, #0083BF);
  background: var(--foam, #e8f6fc);
  color: var(--ocean-deep, #005d8e);
  box-shadow: 0 0 15px rgba(0, 131, 191, 0.15);
}

.journey__info {
  margin-top: 16px;
  display: flex;
  flex-direction: column;
  gap: 6px;
}

.journey__label {
  font-family: 'Space Grotesk', sans-serif;
  font-size: 0.85rem;
  font-weight: 700;
  color: var(--ink, #060f1e);
  margin: 0;
}

.journey__desc {
  font-family: 'DM Sans', sans-serif;
  font-size: 0.76rem;
  line-height: 1.4;
  color: var(--mist, #5a6a80);
  margin: 0;
  max-width: 150px;
}

/* Vertical Timeline Restructuring on Portrait boundaries */
@media (max-width: 768px) {
  .journey__master-line {
    top: 0;
    left: 33px;
    width: 3px;
    height: 100%;
  }
  .journey__master-fill {
    width: 100%;
    height: 0%; /* Transforms width tracking coordinates to height metrics for Y layout */
    background: linear-gradient(180deg, var(--ocean, #0083BF), var(--flash, #00d4ff));
    transition: height 0.1s linear;
  }
  .journey__track {
    flex-direction: column;
    align-items: flex-start;
    gap: 40px;
    padding-left: 0;
  }
  .journey__step {
    flex-direction: row;
    text-align: left;
    gap: 20px;
  }
  .journey__info { margin-top: 0; }
  .journey__desc { max-width: 100%; }
}

.testi-block { background: var(--fog); border: 1px solid var(--rule); padding: 50px 44px; height: 100%; clip-path: polygon(20px 0%, 100% 0%, 100% 100%, 0% 100%); border-radius: 4px; }
.testi-block__label { font-family: 'Space Grotesk', sans-serif; font-size: 0.7rem; font-weight: 700; letter-spacing: 0.16em; text-transform: uppercase; color: var(--ocean); display: flex; align-items: center; gap: 10px; margin-bottom: 28px; }
.testi-block__label::after { content: ''; flex: 1; height: 1px; background: linear-gradient(to right, var(--rule), transparent); }
.testi-card { background: var(--white); border: 1px solid var(--rule); padding: 32px; position: relative; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,0.02); clip-path: polygon(0 0, 100% 0, 100% calc(100% - 14px), calc(100% - 14px) 100%, 0 100%); }
.testi-quote-mark { position: absolute; top: 10px; right: 20px; font-size: 4rem; line-height: 1; color: rgba(0,131,191,0.06); font-family: Georgia, serif; user-select: none; pointer-events: none; }
.testi-stars { color: #f59e0b; font-size: 0.8rem; letter-spacing: 2px; margin-bottom: 14px; }
.testi-text { font-size: 0.96rem; line-height: 1.8; color: #334155; font-style: italic; margin-bottom: 24px; }
.testi-footer { display: flex; align-items: center; gap: 14px; border-top: 1px solid var(--rule); padding-top: 20px; }
.testi-avatar { width: 46px; height: 46px; border-radius: 50%; object-fit: cover; flex-shrink: 0; border: 2px solid var(--foam); }
.testi-name { font-family: 'Space Grotesk', sans-serif; font-size: 0.88rem; font-weight: 700; color: var(--ink); margin-bottom: 2px; }
.testi-role { font-size: 0.76rem; color: var(--mist); }

.swiper-pagination-bullet-active { background: var(--ocean) !important; }
.swiper-pagination { text-align: left !important; }

/* ================================================================
   FAQ SECTION — INTERACTIVE ACCORDION MATRIX (image_d965d4.png)
   ================================================================ */
.faq-sec {
  padding: 100px 0;
  background: var(--white, #ffffff);
  position: relative;
}

.faq-list {
  max-width: 800px;
  margin: 40px auto 0;
}

.faq-item {
  background: #ffffff;
  border: 1px solid var(--rule, #dde6ee);
  border-radius: 12px;
  margin-bottom: 16px;
  overflow: hidden;
  transition: all 0.3s var(--ease);
}

.faq-item:hover {
  border-color: rgba(0, 131, 191, 0.3);
  box-shadow: 0 10px 25px rgba(4, 13, 24, 0.03);
}

.faq-q {
  padding: 24px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  cursor: pointer;
  font-family: 'Space Grotesk', sans-serif;
  font-size: 1rem;
  font-weight: 700;
  color: var(--ink, #060f1e);
  transition: 0.3s;
}

.faq-icon {
  width: 24px;
  height: 24px;
  color: var(--ocean, #0083BF);
  font-size: 1.2rem;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: transform 0.4s var(--ease);
}

/* State when expanded */
.faq-item.active .faq-icon { transform: rotate(45deg); }
.faq-item.active { border-color: var(--ocean); }

.faq-a {
  padding: 0 24px;
  max-height: 0;
  overflow: hidden;
  transition: all 0.4s var(--ease);
  color: var(--mist, #5a6a80);
  font-family: 'DM Sans', sans-serif;
  font-size: 0.95rem;
  line-height: 1.7;
}

.faq-item.active .faq-a {
  padding: 0 24px 24px;
  max-height: 200px; /* Adjust based on expected answer length */
}

/* ================================================================
   RESPONSIVE BREAKPOINTS MATRIX
================================================================ */
@media (max-width: 1200px) {
  .feat-grid { grid-template-columns: repeat(2, 1fr); gap: 20px; }
  .ind-grid { grid-template-columns: repeat(4, 1fr); }
  .why-stack-deck { max-width: 720px; height: 400px; }
}
@media (max-width: 1199px) {
  .xhero__dashboard-mockup-frame { max-width: 480px; }
}

@media (max-width: 991px) {
  .xhero { padding: 120px 0 80px 0; text-align: center; }
  .xhero__left { align-items: center; margin-bottom: 50px; }
  .xhero__sub { max-width: 100%; }
  .xhero__btns { justify-content: center; }
  .xhero__dashboard-mockup-frame { transform: none !important; max-width: 100%; height: 170px;}
  .xhero__floating-feature-tag { left: 20px; bottom: -10px; }
  .xhero__scroll { display: none; }
  .xhero__right { min-height: 450px; }
  .xhero__right::before { background: linear-gradient(to bottom, var(--BDD) 0%, rgba(2,13,24,0.2) 50%, transparent 100%); }

  .overview-flex-align { flex-direction: column; align-items: initial; }
  .overview-workspace__img-frame { min-height: 350px; height: 380px; margin-bottom: 30px; }
  .overview-content__wrapper { padding-left: 0; }

  .cta-block { clip-path: polygon(0 0, 100% 0, calc(100% - 14px) 100%, 0 100%); padding: 44px 36px; margin-bottom: 24px; }
  .testi-block { clip-path: polygon(14px 0%, 100% 0%, 100% 100%, 0% 100%); padding: 36px; }
  .use-cases .col-lg-5 { margin-top: 40px; }
  
  .why-stack-deck { max-width: 620px; height: 440px; }
  .why-stack-card { padding: 40px 36px; gap: 30px; }
}

@media (max-width: 768px) {
  .feat-grid { grid-template-columns: 1fr; }
  .ind-grid { grid-template-columns: repeat(3, 1fr); }
  .logo-card { min-width: 140px; height: 68px; padding: 12px 20px; }
  .logo-card img { max-width: 100px; }
  .para-badge { padding: 10px 16px; }
  
  .features, .use-cases, .industries, .bottom-section { padding: 80px 0; }

  .why-pinned-wrapper { height: auto; }
  .why-sticky-container { position: relative; height: auto; padding: 80px 0; overflow: visible; }
  .why-stack-deck { position: relative; display: flex; flex-direction: column; gap: 24px; height: auto; max-width: 100%; margin-top: 40px; }
  .why-stack-card { position: relative; flex-direction: column; text-align: center; padding: 44px 30px; gap: 24px; transform: none !important; opacity: 1 !important; clip-path: none; border-radius: 16px; }
  .why-stack-card .card-right { text-align: center; }
  .why-stack-icon { margin: 0 auto; }
  .why-deck-pagination { position: relative; top: auto; right: auto; transform: none; flex-direction: row; justify-content: center; border-left: none; border-top: 1px dashed rgba(0, 131, 191, 0.15); margin-top: 20px; padding-top: 16px; width: 100%; }
  .why-pagination-bullet { flex-direction: column; gap: 6px; }
}

@media (max-width: 576px) {
 .xhero__title { font-size: 2rem; }
  .xhero__btns { flex-direction: column; width: 100%; }
  .xbtn-solid, .xbtn-line { justify-content: center; width: 100%; }
  .xhero__floating-feature-tag { display: none; }
  
  .ind-grid { grid-template-columns: repeat(2, 1fr); gap: 12px; }
  
  ..overview-workspace__img-frame { height: 280px; min-height: auto; }
  .overview-checklist__grid { grid-template-columns: 1fr; gap: 20px; }

  .video-frame__accent { display: none; }
  .video-frame__clip { clip-path: none; border-radius: 8px; }

  .cta-block { clip-path: none; padding: 36px 24px; border-radius: 8px; }
  .testi-block { clip-path: none; padding: 24px; border-radius: 8px; }
  .testi-card { clip-path: none; padding: 24px; border-radius: 6px; }
  
  .uc-tab { font-size: 0.8rem; padding: 10px 20px; width: 100%; text-align: center; }
  .marquee-section { padding: 60px 0; }
}

@media (prefers-reduced-motion: reduce) {
  [data-reveal] { opacity: 1; transform: none; transition: none; }
  .marquee-track, .xticker__track, .para-badge, .video-frame__play { animation: none; }
  .uc-panel.active { animation: none; }
}
</style>

<!-- ================================================================
     HERO INTERFACE (UPGRADED STRUCTURAL MATRIX FROM image_b3bf7a.jpg)
     ================================================================ -->
<?php 
  // Determine if a custom hero banner image exists, otherwise fall back to empty string
  $heroBgStyle = "";
  if (!empty($detail->hero_banner)) {
      $heroBgStyle = 'style="background-image: linear-gradient(to right, rgba(4, 13, 24, 0.92) 30%, rgba(4, 13, 24, 0.4) 100%), url(' . base_url($detail->hero_banner) . '); background-size: cover; background-position: center;"';
  }
?>
<div class="xhero">
  <div class="container">
    <div class="row align-items-center">
      
      <!-- LEFT ENGINE COLUMN: Conversion Copy & Action Block -->
<div class="col-lg-6 col-12">
  <div class="xhero__left">
    
    <!-- DYNAMIC TOP PILL BADGE -->
    <span class="xhero__tag">
      <span class="xhero__tag-dot"></span>
      <?php echo !empty($detail->heroBadge) ? esc($detail->heroBadge) : 'Solutions Profile'; ?>
    </span>
    
    <!-- DYNAMIC HEADLINE & CYAN HIGHLIGHT -->
    <h1 class="xhero__title">
      <?php echo !empty($detail->name) ? esc($detail->name) : 'Enterprise Solution'; ?>
      <br>
      <mark><?php echo !empty($detail->heroTitleHighlight) ? esc($detail->heroTitleHighlight) : 'Built to Scale.'; ?></mark>
    </h1>
    
    <!-- DYNAMIC SUBTITLE / DESCRIPTION -->
    <p class="xhero__sub">
      <?php echo !empty($detail->shortDescription) ? esc($detail->shortDescription) : 'Modernize your operations, eliminate infrastructure gaps, and accelerate growth with precision-engineered technology built around your business.'; ?>
    </p>
    
    <!-- DYNAMIC CTA BUTTON -->
    <div class="xhero__btns">
      <?php 
  // Handle smooth section anchors (#contact) vs page routes (/contact-us or contact-us)
  $ctaLink = '#contact';
  if (!empty($detail->heroCtaLink)) {
      $rawLink = trim($detail->heroCtaLink);
      if (strpos($rawLink, '#') === 0 || strpos($rawLink, 'http') === 0) {
          $ctaLink = $rawLink; // Keep hash links or external URLs intact
      } else {
          $ctaLink = base_url(ltrim($rawLink, '/')); // Automatically prepends site base URL
      }
  }
?>
<a href="<?php echo $ctaLink; ?>" class="xbtn-solid">
  <i class="fas fa-comments"></i> 
  <?php echo !empty($detail->heroCtaText) ? esc($detail->heroCtaText) : 'Request Demo'; ?>
</a>
        
    </div>
    
    <div class="xhero__scroll">
      <div class="xhero__scroll-line"></div>
    </div>
  </div>
</div>

<!-- RIGHT ENGINE COLUMN: Perspective Frame & Floating Badge -->
<div class="col-lg-6 col-12">
  <div class="xhero__right-perspective-canvas">
    
    <?php if (!empty($detail->hero_banner)): ?>
      <img src="<?php echo base_url($detail->hero_banner); ?>" class="xhero__dashboard-mockup-frame" alt="<?php echo esc($detail->name); ?>">
    <?php elseif (!empty($detail->image)): ?>
      <img src="<?php echo base_url($detail->image); ?>" class="xhero__dashboard-mockup-frame" alt="<?php echo esc($detail->name); ?>">
    <?php else: ?>
      <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=800&q=80" class="xhero__dashboard-mockup-frame" alt="Fallback Dashboard Visualization">
    <?php endif; ?>

    <!-- DYNAMIC FLOATING BADGE -->
    <div class="xhero__floating-feature-tag">
      <div class="xhero__floating-badge-icon">
        <?php if (!empty($detail->thumbnail)): ?>
          <img src="<?php echo base_url($detail->thumbnail); ?>" style="width:16px;height:16px;object-fit:contain;filter:brightness(0) invert(1)" alt="">
        <?php else: ?>
          <i class="fas fa-chart-line"></i>
        <?php endif; ?>
      </div>
      <div class="xhero__floating-badge-text">
        <strong><?php echo !empty($detail->floatingBadgeTitle) ? esc($detail->floatingBadgeTitle) : (!empty($detail->name) ? esc($detail->name) : 'Platform Core'); ?></strong>
        <span><?php echo !empty($detail->floatingBadgeSubtitle) ? esc($detail->floatingBadgeSubtitle) : 'Active &amp; Optimized'; ?></span>
      </div>
    </div>

  </div>
</div>
      
    </div><!-- /row -->
  </div><!-- /container -->
</div>

<div class="xticker">
  <div class="xticker__track">
    <?php if (!empty($tickerItemsList)): ?>
      <!-- Repeat 4 times to fill widescreen desktop widths without gaps -->
      <?php for($i = 0; $i < 4; $i++): ?>
        <?php foreach($tickerItemsList as $tItem): ?>
          <span class="xticker__item">
            <i class="fas fa-check-circle"></i>
            <?php echo esc($tItem->title); ?>
          </span>
        <?php endforeach; ?>
      <?php endfor; ?>
    <?php else: ?>
      <!-- Default fallback items if admin hasn't added custom ones -->
      <?php $tick_items = ['Enterprise Ready','Scalable Architecture','24/7 Support','GDPR Compliant','Cloud-Native','Real-Time Analytics','Multi-Currency','Bank-Level Security','Rapid Deployment','ROI Focused'];
      for($t=0;$t<4;$t++): foreach($tick_items as $ti): ?>
        <span class="xticker__item"><i class="fas fa-check-circle"></i><?php echo $ti?></span>
      <?php endforeach; endfor; ?>
    <?php endif; ?>
  </div>
</div>

<!-- ================================================================
     NEW SECTION: TRUSTED BY FINANCE TEAMS (UNIFIED BRANDING ENGINE)
     ================================================================ -->
<!-- ================================================================
     HYBRID LOGIC: DYNAMIC / STATIC FALLBACK TRUST STRIP ENGINE
     ================================================================ -->
<div class="finance-trust-strip">
  <div class="container">
    <div class="finance-trust__wrapper">
      
      <!-- 1. Dynamic Section Header Title -->
      <h5 class="finance-trust__title" data-reveal>
        <?php echo !empty($detail->trust_strip_title) ? esc($detail->trust_strip_title) : 'Trusted By Finance Teams'; ?>
      </h5>
      
      <div class="finance-trust__grid">
        <?php if (!empty($trustBadgesList)): ?>
          
          <!-- A. IF ADMIN HAS ADDED DETAILS: Loop through custom inputs dynamically -->
          <?php foreach ($trustBadgesList as $badgeItem): ?>
            <div class="finance-trust__logo-badge" data-reveal>
              <img src="<?php echo base_url($badgeItem->image); ?>" alt="<?php echo esc($badgeItem->title); ?>" style="width: 28px; height: 28px; object-fit: contain; flex-shrink: 0;" />
              <div class="finance-trust__logo-text">
                <strong><?php echo esc($badgeItem->title); ?></strong>
                <span><?php echo esc($badgeItem->subtitle); ?></span>
              </div>
            </div>
          <?php endforeach; ?>

        <?php else: ?>

          <!-- B. FALLBACK: If admin left it blank, show your beautiful standard static details -->
          <!-- 1. Microsoft Partner Brand Badge -->
          <div class="finance-trust__logo-badge" data-reveal data-delay="1">
            <svg viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M0 0H11V11H0V0Z" fill="#F25022"/>
              <path d="M12 0H23V11H12V0Z" fill="#7FBA00"/>
              <path d="M0 12H11V23H0V12Z" fill="#00A4EF"/>
              <path d="M12 12H23V23H12V12Z" fill="#FFB900"/>
            </svg>
            <div class="finance-trust__logo-text">
              <strong>Microsoft</strong>
              <span>Partner</span>
            </div>
          </div>

          <!-- 2. Microsoft Power Platform Brand Badge -->
          <div class="finance-trust__logo-badge" data-reveal data-delay="2">
            <svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M16 6L7 11V21L16 26L25 21V11L16 6Z" fill="#742774"/>
              <path d="M16 9.5L10.5 12.5V19.5L16 22.5L21.5 19.5V12.5L16 9.5Z" fill="#E3008C"/>
            </svg>
            <div class="finance-trust__logo-text">
              <strong>Microsoft</strong>
              <span>Power Platform</span>
            </div>
          </div>

          <!-- 3. Power BI Analytics Badge -->
          <div class="finance-trust__logo-badge" data-reveal data-delay="3">
            <svg viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
              <rect x="5" y="18" width="5" height="9" rx="1" fill="#E6AD12"/>
              <rect x="13" y="10" width="5" height="17" rx="1" fill="#F8C100"/>
              <rect x="21" y="4" width="5" height="23" rx="1" fill="#FFD851"/>
            </svg>
            <div class="finance-trust__logo-text">
              <strong>Power BI</strong>
              <span>Analytics Engine</span>
            </div>
          </div>

          <!-- 4. ISO 27001 Security Badge -->
          <div class="finance-trust__logo-badge" data-reveal data-delay="4">
            <div class="finance-trust__icon-iso-blue">
              <i class="fa-solid fa-shield-halved"></i>
            </div>
            <div class="finance-trust__logo-text">
              <strong>ISO 27001:2013</strong>
              <span>Information Security Standard</span>
            </div>
          </div>

          <!-- 5. ISO 9001 Quality Framework Badge -->
          <div class="finance-trust__logo-badge" data-reveal data-delay="5">
            <div class="finance-trust__icon-iso-navy">
              <i class="fa-solid fa-square-poll-horizontal"></i>
            </div>
            <div class="finance-trust__logo-text">
              <strong>ISO 9001:2015</strong>
              <span>Quality Management Certified</span>
            </div>
          </div>

        <?php endif; ?>
      </div><!-- /finance-trust__grid -->

    </div>
  </div>
</div>

<!-- ================================================================
     NEW SECTION: CORE VALUE VALUE DRIVERS GRID (image_c32fdc.png)
     ================================================================ -->
<div class="why-benefits-banner">
  <div class="container">
    
    <!-- Dynamic Section Main Heading -->
    <h3 class="why-benefits__title" data-reveal>
      <?php echo !empty($detail->benefitsSectionTitle) ? esc($detail->benefitsSectionTitle) : 'Why ' . (!empty($detail->name) ? esc($detail->name) : 'Our Platform') . '?'; ?>
    </h3>
    
    <div class="why-benefits__grid">
      <?php if (!empty($whyChooseUsList)): ?>
        
        <?php $delayCount = 1; ?>
        <?php foreach ($whyChooseUsList as $whyCard): ?>
          <?php 
            // Map theme color classes cleanly
            $themeClass = !empty($whyCard->card_theme) ? esc($whyCard->card_theme) : 'blue-accent';
            // Normalize theme values (e.g. blue-theme -> blue-accent)
            $themeClass = str_replace('-theme', '-accent', $themeClass);
          ?>
          <div class="why-benefits__card" data-reveal data-delay="<?php echo min($delayCount, 6); ?>">
            <div class="why-benefits__icon-frame <?php echo $themeClass; ?>">
              <i class="<?php echo !empty($whyCard->icon_class) ? esc($whyCard->icon_class) : 'fas fa-bolt'; ?>"></i>
            </div>
            <div class="why-benefits__content">
              <h4 class="why-benefits__card-title"><?php echo esc($whyCard->title); ?></h4>
              <p class="why-benefits__card-desc"><?php echo esc($whyCard->subtitle); ?></p>
            </div>
          </div>
          <?php $delayCount++; ?>
        <?php endforeach; ?>

      <?php else: ?>

        <!-- Fallback static cards if no records exist in DB -->
        <div class="why-benefits__card" data-reveal data-delay="1">
          <div class="why-benefits__icon-frame blue-accent"><i class="fas fa-bolt"></i></div>
          <div class="why-benefits__content">
            <h4 class="why-benefits__card-title">Faster Financial Close</h4>
            <p class="why-benefits__card-desc">Reduce month-end closing timelines effortlessly.</p>
          </div>
        </div>
        <div class="why-benefits__card" data-reveal data-delay="2">
          <div class="why-benefits__icon-frame green-accent"><i class="fas fa-database"></i></div>
          <div class="why-benefits__content">
            <h4 class="why-benefits__card-title">Unified Consolidation</h4>
            <p class="why-benefits__card-desc">Combine disparate source data from ERP systems &amp; cloud pools.</p>
          </div>
        </div>
        <div class="why-benefits__card" data-reveal data-delay="3">
          <div class="why-benefits__icon-frame purple-accent"><i class="fas fa-chart-line"></i></div>
          <div class="why-benefits__content">
            <h4 class="why-benefits__card-title">Intelligent Reporting</h4>
            <p class="why-benefits__card-desc">Power BI analytics engine models live architectural insights.</p>
          </div>
        </div>
        <div class="why-benefits__card" data-reveal data-delay="4">
          <div class="why-benefits__icon-frame teal-accent"><i class="fas fa-shield-halved"></i></div>
          <div class="why-benefits__content">
            <h4 class="why-benefits__card-title">Compliance Ready</h4>
            <p class="why-benefits__card-desc">Engineered for GAAP, IFRS compliance, and strict log audit trails.</p>
          </div>
        </div>

      <?php endif; ?>
    </div><!-- /why-benefits__grid -->
    
  </div><!-- /container -->
</div>

<!-- ================================================================
     PRODUCT OVERVIEW ENGINE SECTION (EQUAL HEIGHT MATRIX FOR image_de09a0.jpg)
     ================================================================ -->
<section class="product-overview-sec" id="overview">
  <div class="container">
    <!-- Enforced full-height column alignment row layout -->
    <div class="row overview-flex-align g-4 g-lg-5">
      
      <!-- LEFT DESIGN COLUMN: Self-Stretching Visual Frame Panel (6-Cols) -->
      <div class="col-lg-6 col-12 d-flex">
        <div class="overview-workspace__img-frame" data-reveal>
          <?php if (!empty($detail->image)): ?>
            <img src="<?php echo base_url($detail->image); ?>" alt="<?php echo esc($detail->name); ?> Application Dashboard" loading="lazy">
          <?php else: ?>
            <!-- Fallback dashboard display asset -->
            <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=800&q=80" alt="Product Interface Dashboard Mockup">
          <?php endif; ?>
        </div>
      </div>
      
      <!-- RIGHT DESIGN COLUMN: Content & Core Feature Grid Layout Matrix (6-Cols) -->
      <div class="col-lg-6 col-12">
        <div class="overview-content__wrapper" data-reveal data-delay="2">
          <span class="overview-content__eyebrow">Understanding Platform Context</span>
          <h2 class="overview-content__title">Product Overview</h2>
          
          <div class="overview-content__desc">
            <?php echo !empty($detail->description) ? $detail->description : 'A comprehensive structural automation engine built to unify complex financial workflows, streamline operations, maximize transactional auditing transparency, and drive efficiency across multi-tier entities.'; ?>
          </div>
          
          <!-- Checklist Matrix Grid Layer -->
          <!-- Checklist Matrix Grid Layer -->
<div class="overview-checklist__grid">
  <?php if (!empty($overviewMatrixList)): ?>
    <?php foreach ($overviewMatrixList as $key => $matrixItem): ?>
      <div class="overview-checklist__item" data-reveal data-delay="<?php echo min(($key + 1), 6); ?>">
        <i class="fas fa-check-circle overview-checklist__icon"></i>
        <div class="overview-checklist__body">
          <h4 class="overview-checklist__label"><?php echo esc($matrixItem->label); ?></h4>
          <p class="overview-checklist__text"><?php echo esc($matrixItem->text); ?></p>
        </div>
      </div>
    <?php endforeach; ?>
  <?php else: ?>
    <!-- Production Fallback Templates if no custom cards are saved in Admin -->
    <div class="overview-checklist__item">
      <i class="fas fa-check-circle overview-checklist__icon"></i>
      <div class="overview-checklist__body">
        <h4 class="overview-checklist__label">Financial Consolidation</h4>
        <p class="overview-checklist__text">Consolidate core multi-tier corporate financials across structural hierarchies securely.</p>
      </div>
    </div>
    <div class="overview-checklist__item">
      <i class="fas fa-check-circle overview-checklist__icon"></i>
      <div class="overview-checklist__body">
        <h4 class="overview-checklist__label">Intelligent Reporting</h4>
        <p class="overview-checklist__text">Power BI integrated pipelines track drill-downs and real-time operational views.</p>
      </div>
    </div>
  <?php endif; ?>
</div><!-- /overview-checklist__grid -->
        </div>
      </div>

    </div><!-- /row -->
  </div><!-- /container -->
</section>

<section class="bottom-section" id="contact">
  <div class="container">
    <div class="row g-4 align-items-stretch">
      
      <div class="<?php echo !empty($testimonialsList) ? 'col-lg-5 col-12' : 'col-12'; ?>" data-reveal>
        <div class="cta-block" style="<?php echo !empty($testimonialsList) ? '' : 'clip-path: none; border-radius: 12px; padding: 80px 60px; text-align: center; align-items: center;'; ?>">
          <div class="cta-block__glow"></div>
          <div class="cta-block__glow2"></div>
          <div class="cta-block__hatch"></div>
          <h2 class="cta-block__title">Let's Build the Future Together</h2>
          <p class="cta-block__body" style="<?php echo !empty($testimonialsList) ? '' : 'max-width: 700px; margin-left: auto; margin-right: auto;'; ?>">
            Partner with us to unlock the full potential of your business software ecosystem. Our experts are ready to optimize your setup from day one.
          </p>
          <div class="cta-block__actions" style="<?php echo !empty($testimonialsList) ? '' : 'justify-content: center;'; ?>">
            <a href="#" class="btn-primary">
              <i class="fas fa-calendar-alt"></i> Request Consultation
            </a>
            <a href="#" class="btn-ghost">
              <i class="fas fa-envelope"></i> Contact Us
            </a>
          </div>
        </div>
      </div>

      <?php if (!empty($testimonialsList)): ?>
        <div class="col-lg-7 col-12" data-reveal data-delay="2">
          <div class="testi-block">
            <div class="testi-block__label">Client Testimonials</div>
            <div class="swiper testi-swiper">
              <div class="swiper-wrapper">
                <?php foreach ($testimonialsList as $row): ?>
                  <div class="swiper-slide">
                    <div class="testi-card">
                      <div class="testi-quote-mark">&ldquo;</div>
                      <div class="testi-stars">★★★★★</div>
                      <p class="testi-text">"<?php echo esc($row->description); ?>"</p>
                      <div class="testi-footer">
                        <img class="testi-avatar" 
                             src="<?php echo (!empty($row->image) && file_exists(FCPATH . $row->image)) ? base_url($row->image) : 'https://api.dicebear.com/7.x/initials/svg?seed=' . urlencode($row->name) . '&backgroundType=gradientLinear&backgroundColor=0083BF,005d8e'; ?>" 
                             alt="<?php echo esc($row->name); ?>" 
                             loading="lazy">
                        <div>
                          <div class="testi-name"><?php echo esc($row->name); ?></div>
                          <div class="testi-role"><?php echo esc($row->designation); ?></div>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
              <div class="swiper-pagination" style="margin-top:20px; position:static;"></div>
            </div>
          </div>
        </div>
      <?php endif; ?>

    </div></div></section>

<!-- ================================================================
     NEW SECTION: AZURE MARKETPLACE SOLUTIONS HUB MATRIX
     ================================================================ -->
<?php if (!empty($detail->marketplace_payload)): ?>
  <section class="marketplace-injected-wrapper py-4 clearfix">
    <div class="container">
      <div class="row">
        <div class="col-12" data-reveal>
          <!-- Renders the full CKEditor rich-text responsive container payload safely -->
          <?php echo $detail->marketplace_payload; ?>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>
<!-- ================================================================ --></div>

<!-- ================================================================
     WHY SECTION — INTERACTIVE STICKY LATERAL ESCAPE ENGINE (DYNAMIC)
================================================================ -->
<?php 
  // Dynamically calculate section height footprint based on card count
  $cardsCount = !empty($partnershipCardsList) ? count($partnershipCardsList) : 4;
  $computedHeight = max(200, $cardsCount * 100) . 'vh';
?>
<div class="why-pinned-wrapper" style="height: <?php echo $computedHeight; ?>;">
  <div class="why-sticky-container">
    <div class="container">
      
      <!-- Dynamic Section Headers -->
      <div class="section-header center" data-reveal>
        <div class="section-eyebrow">
          <?php echo !empty($partnershipSubheading) ? esc($partnershipSubheading) : 'Strategic Value'; ?>
        </div>
        <h2 class="section-title">
          <?php echo !empty($partnershipTitle) ? esc($partnershipTitle) : 'Why Our Partnerships <span>Matter</span>'; ?>
        </h2>
        <p class="section-body">
          <?php echo !empty($partnershipDescription) ? esc($partnershipDescription) : 'We combine global technology expertise with local execution precision to guarantee business continuity and exponential growth for every client.'; ?>
        </p>
      </div>

      <div style="position: relative; max-width: 900px; margin: 0 auto;">
        
        <!-- Dynamic Deck Pagination Track Mapping -->
        <div class="why-deck-pagination">
          <?php if (!empty($partnershipCardsList)): ?>
            <?php foreach ($partnershipCardsList as $index => $card): ?>
              <div class="why-pagination-bullet <?php echo $index === 0 ? 'active' : ''; ?>" data-target="<?php echo $index; ?>">
                <span class="why-bullet-num"><?php echo sprintf("%02d", $index + 1); ?></span>
                <span class="why-bullet-dot"></span>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <!-- Safe Production Mock Fallbacks if database contains no records -->
            <div class="why-pagination-bullet active" data-target="0"><span class="why-bullet-num">01</span><span class="why-bullet-dot"></span></div>
            <div class="why-pagination-bullet" data-target="1"><span class="why-bullet-num">02</span><span class="why-bullet-dot"></span></div>
            <div class="why-pagination-bullet" data-target="2"><span class="why-bullet-num">03</span><span class="why-bullet-dot"></span></div>
            <div class="why-pagination-bullet" data-target="3"><span class="why-bullet-num">04</span><span class="why-bullet-dot"></span></div>
          <?php endif; ?>
        </div>

        <!-- Dynamic Stack Canvas Deck -->
        <div class="why-stack-deck" style="margin: 0; max-width: 780px;">
          <?php if (!empty($partnershipCardsList)): ?>
            <?php foreach ($partnershipCardsList as $index => $card): ?>
              <div class="why-stack-card" data-index="<?php echo $index; ?>">
                <div class="card-left">
                  <div class="why-stack-icon">
                    <i class="<?php echo !empty($card->icon_class) ? esc($card->icon_class) : 'fas fa-handshake'; ?>"></i>
                  </div>
                </div>
                <div class="card-right">
                  <h4 class="why-stack-title"><?php echo esc($card->title); ?></h4>
                  <p class="why-stack-body"><?php echo esc($card->description); ?></p>
                </div>
              </div>
            <?php endforeach; ?>
          <?php else: ?>
            <!-- Core Visual Fallback Stack Layer Cards Template -->
            <div class="why-stack-card" data-index="0">
              <div class="card-left"><div class="why-stack-icon"><i class="fas fa-people-arrows"></i></div></div>
              <div class="card-right"><h4 class="why-stack-title">Collaborative Growth</h4><p class="why-stack-body">Co-engineering solutions with industry leaders for best-in-class framework safety and innovation velocity.</p></div>
            </div>
            <div class="why-stack-card" data-index="1">
              <div class="card-left"><div class="why-stack-icon"><i class="fas fa-rocket"></i></div></div>
              <div class="card-right"><h4 class="why-stack-title">Speed to Market</h4><p class="why-stack-body">Rapid prototyping using pre-validated deployment templates and battle-tested, production-ready components.</p></div>
            </div>
            <div class="why-stack-card" data-index="2">
              <div class="card-left"><div class="why-stack-icon"><i class="fas fa-shield-alt"></i></div></div>
              <div class="card-right"><h4 class="why-stack-title">Enterprise Grade</h4><p class="why-stack-body">Bank-level security, GDPR compliance frameworks, and proactive infrastructure monitoring around the clock.</p></div>
            </div>
            <div class="why-stack-card" data-index="3">
              <div class="card-left"><div class="why-stack-icon"><i class="fas fa-chart-line"></i></div></div>
              <div class="card-right"><h4 class="why-stack-title">ROI Focused</h4><p class="why-stack-body">Data-driven strategy engineered to reduce total cost of ownership while maximising measurable returns.</p></div>
            </div>
          <?php endif; ?>
        </div>

      </div>

    </div>
  </div>
</div>


<section class="features" id="explore">
  <div class="features__blob features__blob--a"></div>
  <div class="features__blob features__blob--b"></div>
  <div class="container">
    <div class="section-header" data-reveal>
      <div class="section-eyebrow">Core Architecture</div>
      <h2 class="section-title">
        <?php if (!empty($detail->keyTitle)): ?>
          <?php echo esc($detail->keyTitle); ?>
        <?php else: ?>
          Key Capabilities &amp; <span>Features</span>
        <?php endif; ?>
      </h2>
      <p class="section-body" style="max-width:600px;">
        <?php echo !empty($detail->keyDescription)
          ? esc($detail->keyDescription)
          : 'High-performance configurations engineered to modernize legacy architectures and unlock new operational efficiency.'; ?>
      </p>
    </div>

    <div class="feat-grid">
      <?php if (!empty($keyFeatureList)): ?>
        <?php $n = 1; foreach ($keyFeatureList as $v): ?>
          <div class="feat-card" data-reveal data-delay="<?php echo min($n, 6); ?>">
            <div class="feat-icon"><i class="fas fa-cubes"></i></div>
            <h3 class="feat-title"><?php echo esc($v->title); ?></h3>
            <p class="feat-body"><?php echo esc($v->description); ?></p>
          </div>
        <?php $n++; endforeach; ?>
      <?php else: ?>
        <div class="feat-card" data-reveal data-delay="1">
          <div class="feat-icon"><i class="fas fa-shield-alt"></i></div>
          <h3 class="feat-title">Advanced Invoicing Core</h3>
          <p class="feat-body">Streamlined trade transaction paths with multi-currency tracking and automated reconciliation workflows.</p>
        </div>
        <div class="feat-card" data-reveal data-delay="2">
          <div class="feat-icon"><i class="fas fa-chart-bar"></i></div>
          <h3 class="feat-title">Real-Time BI Engine</h3>
          <p class="feat-body">Deep system performance visibility with cross-stack dashboards and live operational metrics at a glance.</p>
        </div>
        <div class="feat-card" data-reveal data-delay="3">
          <div class="feat-icon"><i class="fas fa-network-wired"></i></div>
          <h3 class="feat-title">Automated Synchronization</h3>
          <p class="feat-body">Secure data integration connectors keeping distributed server assets fully aligned and optimized continuously.</p>
        </div>
        <div class="feat-card" data-reveal data-delay="4">
          <div class="feat-icon"><i class="fas fa-cloud"></i></div>
          <h3 class="feat-title">Cloud-Native Architecture</h3>
          <p class="feat-body">Scalable microservices infrastructure built for modern hybrid deployment and elastic compute demands.</p>
        </div>
        <div class="feat-card" data-reveal data-delay="5">
          <div class="feat-icon"><i class="fas fa-lock"></i></div>
          <h3 class="feat-title">Enterprise Security Layer</h3>
          <p class="feat-body">End-to-end encryption, role-based access control, and real-time threat monitoring across every endpoint.</p>
        </div>
        <div class="feat-card" data-reveal data-delay="6">
          <div class="feat-icon"><i class="fas fa-cogs"></i></div>
          <h3 class="feat-title">Workflow Automation</h3>
          <p class="feat-body">Configurable pipelines eliminating manual intervention across procurement, approval, and fulfilment stages.</p>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>


<?php if (!empty($usecasesList)): ?>
<section class="use-cases" id="use-cases">
  <div class="container">
    <div class="section-header center" data-reveal>
      <div class="section-eyebrow">Applications</div>
      <h2 class="section-title">
        <?php if (!empty($detail->caseTitle)): ?>
          <?php echo esc($detail->caseTitle); ?>
        <?php else: ?>
          Key Benefits &amp; <span>Use Cases</span>
        <?php endif; ?>
      </h2>
      <?php if (!empty($detail->casetDescription)): ?>
        <p class="section-body"><?php echo $detail->casetDescription; ?></p>
      <?php endif; ?>
    </div>

    <div class="uc-tabs" data-reveal>
      <?php foreach ($usecasesList as $k => $v): ?>
        <button class="uc-tab <?php echo $k == 0 ? 'active' : ''; ?>"
                data-target="uc-panel-<?php echo $k; ?>">
          <?php echo esc($v->title); ?>
        </button>
      <?php endforeach; ?>
    </div>

    <?php foreach ($usecasesList as $k => $v): ?>
      <div class="uc-panel <?php echo $k == 0 ? 'active' : ''; ?>" id="uc-panel-<?php echo $k; ?>">
        <div class="row align-items-center g-5">
          <div class="col-lg-7" data-reveal>
            <p class="uc-desc"><?php echo $v->description; ?></p>
          </div>
          <div class="col-lg-5" data-reveal data-delay="2">
            <div class="video-frame">
              <div class="video-frame__accent"></div>
              <?php if (!empty($v->youtube)): ?>
                <div class="video-frame__clip">
                  <div class="video-responsive">
                    <iframe src="https://www.youtube.com/embed/<?php echo esc($v->youtube); ?>?si=Yl9Eco9ejBvf03c8"
                            title="Use Case Video" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                  </div>
                </div>
              <?php else: ?>
                <div class="video-frame__clip" style="position:relative;">
                  <div class="video-responsive">
                    <video controls>
                      <source src="<?php echo !empty($v->image) ? base_url($v->image) : base_url($config_logo); ?>" type="video/mp4">
                    </video>
                  </div>
                  <div class="video-frame__play"><i class="fas fa-play"></i></div>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>
<?php endif; ?>

<!-- ================================================================
     HYBRID METRICS CORE ENGINE: DYNAMIC CARDS OVER THE FALLBACKS
     ================================================================ -->
<section class="biz-benefits-sec">
  <div class="container">
    
    <h3 class="biz-benefits__title" data-reveal>Business Benefits</h3>
    
    <div class="biz-benefits__grid">
      <?php if (!empty($businessBenefitsList)): ?>
        
        <!-- A. DYNAMIC ADMIN OVERRIDE ENGINE -->
        <?php foreach ($businessBenefitsList as $benefitItem): ?>
          <div class="biz-benefits__card <?php echo esc($benefitItem->card_theme); ?>" data-reveal>
            <div class="biz-benefits__card-hdr">
              <i class="<?php echo esc($benefitItem->icon_class); ?>"></i> <?php echo esc($benefitItem->title); ?>
            </div>
            <div class="biz-benefits__stat">
              <span class="run-counter" data-target-value="<?php echo (int)filter_var($benefitItem->stat_value, FILTER_SANITIZE_NUMBER_INT); ?>" data-suffix="<?php echo esc($benefitItem->stat_suffix); ?>">0</span><?php echo esc($benefitItem->stat_suffix); ?>
            </div>
            <p class="biz-benefits__desc"><?php echo esc($benefitItem->subtitle); ?></p>
          </div>
        <?php endforeach; ?>

      <?php else: ?>

        <!-- B. DEFAULT FACTORY FALLBACK MOCK CARDS TEMPLATE -->
        <div class="biz-benefits__card blue-theme" data-reveal data-delay="1">
          <div class="biz-benefits__card-hdr"><i class="fa-regular fa-clock"></i> Reduce Closing Time</div>
          <div class="biz-benefits__stat"><span class="run-counter" data-target-value="40" data-suffix="%">0</span>%</div>
          <p class="biz-benefits__desc">Faster month-end close</p>
        </div>
        <div class="biz-benefits__card green-theme" data-reveal data-delay="2">
          <div class="biz-benefits__card-hdr"><i class="fa-regular fa-circle-check"></i> Improve Accuracy</div>
          <div class="biz-benefits__stat"><span class="run-counter" data-target-value="99" data-suffix="%">0</span>%</div>
          <p class="biz-benefits__desc">Accurate &amp; reliable data</p>
        </div>
        <div class="biz-benefits__card purple-theme" data-reveal data-delay="3">
          <div class="biz-benefits__card-hdr"><i class="fa-regular fa-file-lines"></i> Automated Reporting</div>
          <div class="biz-benefits__stat"><span class="run-counter" data-target-value="100" data-suffix="%">0</span>%</div>
          <p class="biz-benefits__desc">Eliminate manual efforts</p>
        </div>
        <div class="biz-benefits__card orange-theme" data-reveal data-delay="4">
          <div class="biz-benefits__card-hdr"><i class="fa-regular fa-eye"></i> Real-time Visibility</div>
          <div class="biz-benefits__stat"><span class="run-counter" data-target-value="24" data-suffix="x7">0</span>x7</div>
          <p class="biz-benefits__desc">Eliminate anything anywhere</p>
        </div>

      <?php endif; ?>
    </div><!-- /biz-benefits__grid -->
    
  </div><!-- /container -->
</section>

<?php if (!empty($industryList)): ?>
<section class="industries" id="industries">
  <div class="industries__hatch"></div>
  <div class="industries__inner container">
    <div class="section-header center" data-reveal>
      <div class="section-eyebrow" style="color:rgba(0,212,255,0.9);">Verticals</div>
      <h2 class="section-title" style="color:#fff;">
        <?php if (!empty($detail->industryTitle)): ?>
          <?php echo esc($detail->industryTitle); ?>
        <?php else: ?>
          Industries <span style="color:var(--flash);">Applicable</span>
        <?php endif; ?>
      </h2>
      <p class="section-body" style="color:rgba(255,255,255,0.62);">
        <?php echo !empty($detail->industryDescription)
          ? esc($detail->industryDescription)
          : 'Elevate core operating parameters across tailored verticals with solutions built for each sector.'; ?>
      </p>
    </div>

    <div class="ind-grid">
      <?php foreach ($industryList as $k => $v): ?>
        <a href="<?php echo base_url('industry/' . $v->slug); ?>"
           class="ind-item"
           data-reveal data-delay="<?php echo min(($k % 6) + 1, 6); ?>">
          <div class="ind-icon">
            <img src="<?php echo !empty($v->thumbnail) ? base_url($v->thumbnail) : base_url($config_logo); ?>"
                 loading="lazy" alt="<?php echo esc($v->name); ?>">
          </div>
          <span class="ind-label"><?php echo esc($v->name); ?></span>
        </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- ================================================================
     NEW SECTION: SCROLL-LINKED IMPLEMENTATION JOURNEY (image_dfe683.png)
     ================================================================ -->
<section class="journey-sec" id="journey-scroll-trigger">
  <div class="container">
    
    <h3 class="journey__title" data-reveal>Our Implementation Journey</h3>
    
    <div class="journey__container-relative">
      
      <!-- Continuous Processing Fill Track Layer -->
      <div class="journey__master-line">
        <div class="journey__master-fill" id="journey-progress-bar"></div>
      </div>
      
      <div class="journey__track">
        
        <!-- Step 1 -->
        <div class="journey__step" data-percentage="15">
          <div class="journey__bubble"><i class="fa-solid fa-magnifying-glass-chart"></i></div>
          <div class="journey__info">
            <h4 class="journey__label">Discovery</h4>
            <p class="journey__desc">Understand your detailed business needs.</p>
          </div>
        </div>
        
        <!-- Step 2 -->
        <div class="journey__step" data-percentage="35">
          <div class="journey__bubble"><i class="fa-solid fa-sliders"></i></div>
          <div class="journey__info">
            <h4 class="journey__label">Implementation</h4>
            <p class="journey__desc">Configure &amp; customize as per requirements.</p>
          </div>
        </div>
        
        <!-- Step 3 -->
        <div class="journey__step" data-percentage="55">
          <div class="journey__bubble"><i class="fa-solid fa-database"></i></div>
          <div class="journey__info">
            <h4 class="journey__label">Migration</h4>
            <p class="journey__desc">Migrate system data securely to platform structures.</p>
          </div>
        </div>
        
        <!-- Step 4 -->
        <div class="journey__step" data-percentage="70">
          <div class="journey__bubble"><i class="fa-solid fa-chalkboard-user"></i></div>
          <div class="journey__info">
            <h4 class="journey__label">Training</h4>
            <p class="journey__desc">User training track for maximum adoption.</p>
          </div>
        </div>
        
        <!-- Step 5 -->
        <div class="journey__step" data-percentage="85">
          <div class="journey__bubble"><i class="fa-solid fa-rocket"></i></div>
          <div class="journey__info">
            <h4 class="journey__label">Go Live</h4>
            <p class="journey__desc">Smooth go-live shift with complete support loops.</p>
          </div>
        </div>
        
        <!-- Step 6 -->
        <div class="journey__step" data-percentage="100">
          <div class="journey__bubble"><i class="fa-solid fa-headset"></i></div>
          <div class="journey__info">
            <h4 class="journey__label">Support</h4>
            <p class="journey__desc">Ongoing framework support &amp; continuous improvement.</p>
          </div>
        </div>
        
      </div><!-- /journey__track -->
    </div><!-- /journey__container-relative -->
    
  </div><!-- /container -->
</section>





<?php echo $this->include('frontend/includes/bottom_section'); ?>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://unpkg.com/@studio-freight/lenis@1.0.34/dist/lenis.min.js"></script>

<script>
(function () {
  'use strict';

  /* ---- Lenis Smooth Scroll Engine Initialization ---- */
  var lenis = new Lenis({
    duration: 1.2,
    easing: function (t) { return t === 1 ? 1 : 1 - Math.pow(2, -10 * t); },
    direction: 'vertical',
    gestureDirection: 'vertical',
    smoothWaveform: true,
    syncTouch: false,
    touchMultiplier: 2,
  });

  function raf(time) {
    lenis.raf(time);
    requestAnimationFrame(raf);
  }
  requestAnimationFrame(raf);

  lenis.on('scroll', function (e) {
    updateCardDeck();
  });

  /* ---- Swiper — Testimonials ---- */
  new Swiper('.testi-swiper', {
    slidesPerView: 1,
    spaceBetween: 24,
    speed: 700,
    loop: true,
    autoplay: { delay: 5000, disableOnInteraction: false },
    pagination: {
      el: '.testi-block .swiper-pagination',
      clickable: true
    }
  });

  /* ---- Scroll Reveal ---- */
  var reveals = document.querySelectorAll('[data-reveal]');
  var revealObs = new IntersectionObserver(function (entries) {
    entries.forEach(function (entry) {
      if (entry.isIntersecting) {
        entry.target.classList.add('in');
        revealObs.unobserve(entry.target);
      }
    });
  }, { threshold: 0.05, rootMargin: '0px 0px -20px 0px' });
  reveals.forEach(function (el) { revealObs.observe(el); });

  /* ---- Use-case Tabs ---- */
  var tabs = document.querySelectorAll('.uc-tab');
  tabs.forEach(function (tab) {
    tab.addEventListener('click', function () {
      tabs.forEach(function (t) { t.classList.remove('active'); });
      document.querySelectorAll('.uc-panel').forEach(function (p) {
        p.classList.remove('active');
      });
      tab.classList.add('active');
      var target = document.getElementById(tab.getAttribute('data-target'));
      if (target) target.classList.add('active');
      
      lenis.scrollTo('#use-cases', { offset: -40 });
    });
  });

  /* ---- Why Section Card Deck Stacking Logic ---- */
  var deckWrapper = document.querySelector('.why-pinned-wrapper');
  var stackCards = document.querySelectorAll('.why-stack-card');
  var deckBullets = document.querySelectorAll('.why-pagination-bullet');

  function updateCardDeck() {
    if (!deckWrapper || stackCards.length === 0) return;

    if (window.innerWidth <= 768) {
      deckBullets.forEach(function (b) { b.classList.remove('active'); });
      // Reset styles for mobile grid flow layout
      stackCards.forEach(function (card) {
        card.style.transform = 'none';
        card.style.opacity = '1';
      });
      return;
    }

    var rect = deckWrapper.getBoundingClientRect();
    var totalHeight = rect.height - window.innerHeight;
    var progress = Math.max(0, Math.min(1, -rect.top / totalHeight));

    // Dynamic scale limit mapping
    var totalCards = stackCards.length;
    var activeSegment = progress * (totalCards - 1);
    var currentActiveIndex = Math.round(activeSegment);

    deckBullets.forEach(function (bullet, bIndex) {
      if (bIndex === currentActiveIndex) {
        bullet.classList.add('active');
      } else {
        bullet.classList.remove('active');
      }
    });

    stackCards.forEach(function (card, index) {
      var diff = index - activeSegment;

      if (diff < 0) {
        // Card has been scrolled past (swipes out to left/rotates)
        var translateX = diff * window.innerWidth * 0.8; 
        var rotateDeg = diff * 15; 
        card.style.transform = 'translate3d(' + translateX + 'px, 0, 0) rotate(' + rotateDeg + 'deg)';
        card.style.opacity = Math.max(0, 1 + diff * 2);
        card.style.zIndex = totalCards + index;
      } else {
        // Cards remaining in the stack deck container matrix
        var scaleDown = 1 - (diff * 0.04);
        var translateUp = diff * -12; 
        card.style.transform = 'translate3d(0, ' + translateUp + 'px, 0) scale(' + scaleDown + ')';
        card.style.opacity = Math.max(0, 1 - (diff * 0.25));
        card.style.zIndex = totalCards - index;
      }
    });
  }

  window.addEventListener('resize', updateCardDeck);
  updateCardDeck();

  /* ---- Make Side Pagination Bullets Clickable ---- */
  deckBullets.forEach(function (bullet) {
    bullet.addEventListener('click', function () {
      if (!deckWrapper || stackCards.length <= 1 || window.innerWidth <= 768) return;

      // Extract target index from the bullet attribute
      var targetIndex = parseInt(bullet.getAttribute('data-target'), 10);
      var totalCards = stackCards.length;

      // Get precise position data of the pinned scrolling section track
      var rect = deckWrapper.getBoundingClientRect();
      var totalHeight = rect.height - window.innerHeight;
      
      // Calculate exactly how far down the page the container needs to sit 
      // to make the targeted index card active: (index / (totalCards - 1))
      var targetProgress = targetIndex / (totalCards - 1);
      
      // Compute absolute absolute Y pixel scroll boundary coordinates
      var targetScrollY = window.pageYOffset + rect.top + (targetProgress * totalHeight);

      // Instruct Lenis to smoothly glide directly to the calculated focal window offset
      lenis.scrollTo(targetScrollY, {
        duration: 1.0,
        force: true
      });
    });
  });

  /* ---- High-Performance Core Numeric Counter Engine ---- */
  function initDynamicCounters() {
    var counterNodes = document.querySelectorAll('.run-counter');
    
    var counterObserver = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          var targetNode = entry.target;
          var finalValue = parseInt(targetNode.getAttribute('data-target-value'), 10);
          var suffixStr = targetNode.getAttribute('data-suffix') || '';
          var startValue = 0;
          var totalDuration = 1500; // Animation running duration window in milliseconds (1.5 seconds)
          var framesPerSecond = 60;
          var totalSteps = Math.round(totalDuration / (1000 / framesPerSecond));
          var incrementAmount = finalValue / totalSteps;
          var currentStep = 0;

          var counterInterval = setInterval(function () {
            currentStep++;
            startValue += incrementAmount;
            
            // Set the content dynamically during execution frame loop steps
            targetNode.textContent = Math.floor(startValue);

            if (currentStep >= totalSteps) {
              clearInterval(counterInterval);
              targetNode.textContent = finalValue; // Forces raw absolute exact stop alignment mapping
            }
          }, 1000 / framesPerSecond);

          // Cease observation layout hooks once counting execution cycle triggers safely
          counterObserver.unobserve(targetNode);
        }
      });
    }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });

    counterNodes.forEach(function (el) { counterObserver.observe(el); });
  }

  // Fire counter tracking systems cleanly upon document completion frameworks
  document.addEventListener('DOMContentLoaded', function() {
    initDynamicCounters();
  });

  /* ---- Scroll-Linked Journey Flow Controller ---- */
  var journeySec = document.getElementById('journey-scroll-trigger');
  var progressBar = document.getElementById('journey-progress-bar');
  var journeySteps = document.querySelectorAll('.journey__step');

  function calculateJourneyFlow() {
    if (!journeySec || !progressBar) return;

    var rect = journeySec.getBoundingClientRect();
    var viewportHeight = window.innerHeight;

    // Calculate progress from when the section enters the bottom of the viewport
    // to when it passes completely off the top boundary window field.
    var totalScrollableDistance = rect.height + viewportHeight;
    var currentScrolledDistance = viewportHeight - rect.top;

    var progressPct = (currentScrolledDistance / totalScrollableDistance) * 100;
    // Bound constraints safely between 0% and 100%
    var finalBoundedProgress = Math.max(0, Math.min(100, progressPct));

    // Map metrics according to display matrix dimension structures
    if (window.innerWidth <= 768) {
      progressBar.style.height = finalBoundedProgress + '%';
      progressBar.style.width = '100%';
    } else {
      progressBar.style.width = finalBoundedProgress + '%';
      progressBar.style.height = '100%';
    }

    // Activate/deactivate node highlights based on fill position thresholds
    journeySteps.forEach(function (step) {
      var stepActivationValue = parseInt(step.getAttribute('data-percentage'), 10);
      if (finalBoundedProgress >= stepActivationValue) {
        step.classList.add('node-passed');
      } else {
        step.classList.remove('node-passed');
      }
    });
  }

  // Bind calculation handler loops directly to viewport active interaction windows
  window.addEventListener('scroll', calculateJourneyFlow);
  window.addEventListener('resize', calculateJourneyFlow);
  
  // Fire execution cycle step upon setup completion
  calculateJourneyFlow();

  /* ---- Professional FAQ Accordion Logic ---- */
  var faqItems = document.querySelectorAll('.faq-item');
  
  faqItems.forEach(function(item) {
    item.querySelector('.faq-q').addEventListener('click', function() {
      // Toggle logic
      var isActive = item.classList.contains('active');
      
      // Optional: Close others (remove next 2 lines if you want multiple open)
      // faqItems.forEach(function(i) { i.classList.remove('active'); });
      
      if (!isActive) {
        item.classList.add('active');
      } else {
        item.classList.remove('active');
      }
    });
  });

})();
</script>

<?php $this->endSection(); ?>
