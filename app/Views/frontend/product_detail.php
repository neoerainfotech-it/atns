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
   HERO INTERFACE
   ================================================================ */
.xhero {
  display: grid;
  grid-template-columns: 1fr 1fr;
  min-height: 100vh;
  overflow: hidden;
  position: relative;
}

.xhero__left {
  background: var(--BDD);
  display: flex;
  flex-direction: column;
  justify-content: center;
  padding: 140px 8% 80px 8%;
  position: relative;
  overflow: hidden;
  z-index: 2;
}

.xhero__left::before {
  content: ''; position: absolute; inset: 0;
  background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='300' height='300'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.65' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='300' height='300' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
  opacity: .4; z-index: 0; pointer-events: none;
}

.xhero__left::after {
  content: ''; position: absolute; top: 0; left: 0; width: 3px; height: 100%;
  background: linear-gradient(to bottom, transparent, var(--CY), transparent);
  z-index: 1;
}

.xhero__left-inner { position: relative; z-index: 2; }

.xhero__tag {
  display: inline-flex; align-items: center; gap: 8px;
  background: rgba(0,224,255,.08); border: 1px solid rgba(0,224,255,.25);
  color: var(--CY); font-size: .7rem; font-weight: 600; letter-spacing: .18em;
  text-transform: uppercase; padding: 6px 16px; border-radius: 50px;
  margin-bottom: 32px;
}
.xhero__tag-dot {
  width: 5px; height: 5px; border-radius: 50%; background: var(--CY);
  animation: blink 2s ease-in-out infinite;
}
@keyframes blink { 0%, 100% { opacity: 1 } 50% { opacity: .2 } }

.xhero__title {
  font-family: 'Space Grotesk', sans-serif;
  font-size: clamp(2rem, 3.8vw, 3.8rem);
  font-weight: 700; line-height: 1.1;
  color: #fff; letter-spacing: -.025em;
  margin-bottom: 24px;
}
.xhero__title mark {
  background: none;
  -webkit-background-clip: text; background-clip: text;
  -webkit-text-fill-color: transparent;
  background-image: linear-gradient(90deg, var(--CY), #7dd3fc);
  display: inline;
}

.xhero__sub {
  font-size: 1rem; line-height: 1.75;
  color: rgba(255,255,255,.6);
  max-width: 480px; margin-bottom: 40px;
}

.xhero__btns { 
  display: flex; 
  flex-wrap: wrap; 
  gap: 14px; 
  position: relative; 
  z-index: 5;
}

/* Fixed Hero Banner Buttons Styles mapping */
.xbtn-solid {
  display: inline-flex; align-items: center; gap: 9px;
  background: var(--CY); color: var(--BDD);
  font-weight: 700; font-size: .9rem; padding: 14px 30px;
  border-radius: 10px; text-decoration: none; border: none; cursor: pointer;
  transition: all .3s var(--ease);
}
.xbtn-solid:hover { background: #fff; transform: translateY(-3px); box-shadow: 0 14px 32px rgba(0,224,255,.3); color: var(--BDD); text-decoration: none; }

.xbtn-line {
  display: inline-flex; align-items: center; gap: 9px;
  background: transparent; color: rgba(255,255,255,.8);
  font-weight: 600; font-size: .9rem; padding: 13px 29px;
  border-radius: 10px; text-decoration: none;
  border: 1px solid rgba(255,255,255,.2);
  transition: all .3s ease;
}
.xbtn-line:hover { background: rgba(255,255,255,.07); border-color: rgba(255,255,255,.5); color: #fff; transform: translateY(-3px); text-decoration: none; }

.xhero__stats {
  display: flex; gap: 0; margin-top: 52px;
  border-top: 1px solid rgba(255,255,255,.08);
  padding-top: 32px;
}
.xhero__stat {
  flex: 1; padding-right: 20px;
  border-right: 1px solid rgba(255,255,255,.08);
}
.xhero__stat:last-child { border-right: none; padding-right: 0; padding-left: 20px; }
.xhero__stat:not(:first-child):not(:last-child) { padding-left: 20px; }
.xhero__stat-n {
  font-family: 'Space Grotesk', sans-serif;
  font-size: clamp(1.8rem, 2.5vw, 2.4rem); font-weight: 700;
  color: #fff; line-height: 1; margin-bottom: 6px;
}
.xhero__stat-n em { font-style: normal; color: var(--CY); }
.xhero__stat-l {
  font-size: .68rem; font-weight: 600; letter-spacing: .1em;
  text-transform: uppercase; color: rgba(255,255,255,.4);
}

.xhero__right { position: relative; overflow: hidden; background: var(--MID); min-height: 380px; }
.xhero__right-img {
  position: absolute; inset: 0;
  background-size: cover; background-position: center;
}
.xhero__right::before {
  content: ''; position: absolute; inset: 0; z-index: 1;
  background: linear-gradient(to right, var(--BDD) 0%, rgba(2,13,24,.3) 40%, transparent 100%);
}

.xhero__right-watermark {
  position: absolute; bottom: 36px; right: 36px; z-index: 2;
  background: rgba(0,0,0,.6); backdrop-filter: blur(12px);
  -webkit-backdrop-filter: blur(12px);
  border: 1px solid rgba(255,255,255,0.15);
  border-radius: 14px; padding: 16px 20px;
  display: flex; align-items: center; gap: 14px;
}
.xhero__right-watermark-icon {
  width: 40px; height: 40px; border-radius: 10px;
  background: linear-gradient(135deg, var(--B), var(--CY));
  display: flex; align-items: center; justify-content: center;
  color: #fff; font-size: 1rem; flex-shrink: 0;
}
.xhero__right-watermark-text strong { display: block; font-size: .85rem; font-weight: 700; color: #fff; }
.xhero__right-watermark-text span { font-size: .72rem; color: rgba(255,255,255,.5); }

.xhero__scroll {
  position: absolute; bottom: 36px; left: 8%;
  z-index: 3; display: flex; align-items: center; gap: 10px;
  color: rgba(255,255,255,.35); font-size: .72rem; letter-spacing: .12em; text-transform: uppercase;
}
.xhero__scroll-line {
  width: 40px; height: 1px; background: rgba(255,255,255,.25);
  position: relative; overflow: hidden;
}
.xhero__scroll-line::after {
  content: ''; position: absolute; top: 0; left: -100%; width: 100%; height: 100%;
  background: var(--CY); animation: scrollLine 2s ease-in-out infinite;
}

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
   OVERVIEW & SECTIONS GENERAL
   ================================================================ */
.overview { padding: 120px 0; background: var(--white); position: relative; z-index: 4; }
.section-header { margin-bottom: 56px; }
.section-header.center { text-align: center; }
.section-header.center .section-eyebrow { display: inline-flex; }
.section-header.center .section-body { max-width: 580px; margin: 0 auto; }

.section-eyebrow {
  display: inline-flex; align-items: center; gap: 9px;
  font-family: 'Space Grotesk', sans-serif;
  font-size: 0.72rem; font-weight: 700; letter-spacing: 0.15em; text-transform: uppercase;
  color: var(--ocean); margin-bottom: 18px;
}
.section-eyebrow::before {
  content: ''; display: inline-block; width: 24px; height: 2px;
  background: linear-gradient(to right, var(--ocean), var(--flash));
}

.section-title {
  font-family: 'Space Grotesk', sans-serif;
  font-size: clamp(1.85rem, 3.2vw, 2.6rem);
  font-weight: 700; line-height: 1.15; color: var(--ink);
  letter-spacing: -0.02em; margin-bottom: 18px;
}
.section-title span { color: var(--ocean); }

.para-frame { position: relative; padding-bottom: 24px; padding-right: 24px; }
.para-frame::before {
  content: ''; position: absolute; inset: 0; top: 24px; left: 24px; right: 0; bottom: 0;
  background: linear-gradient(135deg, var(--ocean), var(--flash));
  clip-path: polygon(14px 0%, 100% 0%, calc(100% - 14px) 100%, 0% 100%);
  opacity: 0.15; border-radius: 2px; z-index: 0;
}
.para-frame__img {
  position: relative; z-index: 1;
  clip-path: polygon(14px 0%, 100% 0%, calc(100% - 14px) 100%, 0% 100%);
  overflow: hidden; box-shadow: 0 32px 64px rgba(0, 83, 143, 0.12);
  transition: transform 0.6s var(--ease-spring);
}
.para-frame__img:hover { transform: scale(1.015); }
.para-frame__img img { display: block; width: 100%; aspect-ratio: 16/10; object-fit: cover; transition: transform 0.7s var(--ease-spring); }
.para-frame__img:hover img { transform: scale(1.04); }

.para-badge {
  position: absolute; bottom: 0; right: 0;
  background: var(--white); border: 1px solid var(--rule);
  box-shadow: 0 12px 36px rgba(0,83,143,0.12);
  padding: 14px 20px; display: flex; align-items: center; gap: 14px; z-index: 4;
  clip-path: var(--para-clip); animation: floatBadge 5s ease-in-out infinite;
}
.para-badge__icon {
  width: 38px; height: 38px; background: linear-gradient(135deg, var(--ocean), var(--flash));
  display: flex; align-items: center; justify-content: center; color: #fff; font-size: 0.9rem;
  flex-shrink: 0; clip-path: var(--para-clip);
}
.para-badge__text strong { display: block; font-family: 'Space Grotesk', sans-serif; font-size: 0.82rem; font-weight: 700; color: var(--ink); white-space: nowrap; }
.para-badge__text span { display: block; font-size: 0.72rem; color: var(--mist); }

/* ================================================================
   PARTNER MARQUEE 
   ================================================================ */
.marquee-section { padding: 90px 0; background: linear-gradient(140deg, var(--ocean-dim) 0%, var(--ocean) 55%, #00a8db 100%); position: relative; overflow: hidden; }
.marquee-section::before, .marquee-section::after { content: ''; position: absolute; left: 0; right: 0; height: 52px; background: var(--white); z-index: 2; pointer-events: none; }
.marquee-section::before { top: 0; clip-path: polygon(0 0, 100% 0, 100% 100%, 0 0); }
.marquee-section::after  { bottom: 0; clip-path: polygon(0 100%, 100% 0, 100% 100%, 0 100%); }
.marquee-section__glow { position: absolute; inset: 0; background: radial-gradient(ellipse 55% 80% at 15% 50%, rgba(0,212,255,0.2) 0%, transparent 65%); pointer-events: none; }
.marquee-label { text-align: center; font-family: 'Space Grotesk', sans-serif; font-size: 0.7rem; font-weight: 700; letter-spacing: 0.22em; text-transform: uppercase; color: rgba(0,212,255,0.9); margin-bottom: 34px; position: relative; z-index: 3; }
.marquee-wrap { overflow: hidden; position: relative; z-index: 3; mask-image: linear-gradient(to right, transparent 0%, #000 8%, #000 92%, transparent 100%); -webkit-mask-image: linear-gradient(to right, transparent 0%, #000 8%, #000 92%, transparent 100%); }
.marquee-track { display: flex; width: max-content; gap: 20px; align-items: center; padding-right: 20px; animation: marqueeRun 35s linear infinite; }
.marquee-track:hover { animation-play-state: paused; }
@keyframes marqueeRun {
  0% { transform: translate3d(0, 0, 0); }
  100% { transform: translate3d(-50%, 0, 0); }
}
.logo-card { background: rgba(255,255,255,0.92); border: 1px solid rgba(255,255,255,0.2); backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px); padding: 18px 32px; clip-path: var(--para-clip); display: flex; align-items: center; justify-content: center; min-width: 180px; height: 74px; flex-shrink: 0; transition: all 0.4s var(--ease-spring); }
.logo-card img { max-width: 120px; max-height: 36px; object-fit: contain; filter: grayscale(20%) opacity(0.8); transition: filter 0.35s ease; }
.logo-card:hover { background: #fff; transform: translateY(-4px); box-shadow: 0 18px 40px rgba(0,0,0,0.15); border-color: var(--flash); }
.logo-card:hover img { filter: none; }

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
   RESPONSIVE BREAKPOINTS MATRIX
================================================================ */
@media (max-width: 1200px) {
  .feat-grid { grid-template-columns: repeat(2, 1fr); gap: 20px; }
  .ind-grid { grid-template-columns: repeat(4, 1fr); }
  .why-stack-deck { max-width: 720px; height: 400px; }
}

@media (max-width: 991px) {
  .xhero { grid-template-columns: 1fr; min-height: auto; }
  .xhero__left { padding: 120px 6% 60px 6%; }
  .xhero__scroll { left: 6%; }
  .xhero__right { min-height: 450px; }
  .xhero__right::before { background: linear-gradient(to bottom, var(--BDD) 0%, rgba(2,13,24,0.2) 50%, transparent 100%); }

  .overview { padding: 80px 0; }
  .overview .col-lg-5 { order: 2; margin-top: 40px; }
  .overview .col-lg-7 { order: 1; }
  .overview .section-title, .overview .section-eyebrow, .overview .section-body { text-align: center; }
  .overview .section-eyebrow { justify-content: center; }

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
  .xhero__title { font-size: 1.85rem; }
  .xhero__sub { font-size: 0.95rem; }
  .xhero__stats { flex-wrap: wrap; gap: 20px 0; }
  .xhero__stat { flex: 1 1 50%; padding-right: 10px; }
  .xhero__stat:last-child { padding-left: 0; border-left: none; }
  .xhero__stat:nth-child(2) { border-right: none; padding-right: 0; padding-left: 14px; }
  .xhero__stat:nth-child(3) { padding-left: 0; }
  
  .ind-grid { grid-template-columns: repeat(2, 1fr); gap: 12px; }
  
  .para-badge { display: none; }
  .para-frame { padding-right: 0; padding-bottom: 0; }
  .para-frame::before { display: none; }
  .para-frame__img { clip-path: none; border-radius: 8px; }
  .para-frame__img img { aspect-ratio: 4/3; }

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

<div class="xhero">
  <div class="xhero__left">
    <div class="xhero__left-inner">
      <span class="xhero__tag">
        <span class="xhero__tag-dot"></span>
        Solutions Profile
      </span>
      <h1 class="xhero__title">
        <?php echo !empty($detail->name) ? esc($detail->name) : 'Enterprise Solution'; ?>
        <br><mark>Built to Scale.</mark>
      </h1>
      <p class="xhero__sub">
        Modernize your operations, eliminate infrastructure gaps, and accelerate growth with precision-engineered technology built around your business.
      </p>
      <div class="xhero__btns">
        <a href="#contact" class="xbtn-solid"><i class="fas fa-comments"></i> Talk to an Expert</a>
        <a href="#explore" class="xbtn-line"><i class="fas fa-compass"></i> Explore</a>
      </div>
      <div class="xhero__stats">
        <div class="xhero__stat">
          <div class="xhero__stat-n"><?php echo !empty($detail->id) ? rand(100,999) : '250'; ?><em>+</em></div>
          <div class="xhero__stat-l">Active Clients</div>
        </div>
        <div class="xhero__stat">
          <div class="xhero__stat-n"><?php echo !empty($detail->id) ? rand(10,50) : '20'; ?><em>+</em></div>
          <div class="xhero__stat-l">Years Experience</div>
        </div>
        <div class="xhero__stat">
          <div class="xhero__stat-n"><?php echo !empty($industryList) ? count($industryList) : '15'; ?><em>+</em></div>
          <div class="xhero__stat-l">Industries Served</div>
        </div>
      </div>
    </div>
    <div class="xhero__scroll">
      <div class="xhero__scroll-line"></div>
      Scroll
    </div>
  </div>

  <div class="xhero__right">
    <div class="xhero__right-img"
      style="<?php echo !empty($detail->image) ? "background-image:url('".base_url($detail->image)."');" : (!empty($detail->hero_banner) ? "background-image:url('".base_url($detail->hero_banner)."');" : "background:var(--MID);"); ?>">
    </div>
    <div class="xhero__right-watermark">
      <div class="xhero__right-watermark-icon">
        <?php if (!empty($detail->thumbnail)): ?>
          <img src="<?php echo base_url($detail->thumbnail); ?>" style="width:20px;height:20px;object-fit:contain;filter:brightness(0) invert(1)" alt="">
        <?php else: ?>
          <i class="fas fa-microchip"></i>
        <?php endif; ?>
      </div>
      <div class="xhero__right-watermark-text">
        <strong><?php echo !empty($detail->name) ? esc($detail->name) : 'Enterprise Platform'; ?></strong>
        <span>Active &amp; Optimized</span>
      </div>
    </div>
  </div>
</div>

<div class="xticker">
  <div class="xticker__track">
    <?php $tick_items = ['Enterprise Ready','Scalable Architecture','24/7 Support','GDPR Compliant','Cloud-Native','Real-Time Analytics','Multi-Currency','Bank-Level Security','Rapid Deployment','ROI Focused'];
    for($t=0;$t<4;$t++): foreach($tick_items as $ti): ?>
      <span class="xticker__item"><i class="fas fa-check-circle"></i><?php echo $ti?></span>
    <?php endforeach; endfor; ?>
  </div>
</div>

<section class="overview" id="overview">
  <div class="container">
    <div class="row align-items-center g-5">
      <div class="col-lg-5" data-reveal>
        <div class="section-eyebrow">Solution Overview</div>
        <h2 class="section-title">
          Understanding <span><?php echo !empty($detail->name) ? esc($detail->name) : 'What We Build'; ?></span>
        </h2>
        <div class="section-body">
          <?php echo $detail->description; ?>
        </div>
      </div>
      <div class="col-lg-7" data-reveal data-delay="2">
        <?php if (!empty($detail->image)): ?>
          <div class="para-frame">
            <div class="para-frame__img">
              <img src="<?php echo base_url($detail->image); ?>" alt="<?php echo esc($detail->name); ?>" loading="lazy">
            </div>
            <div class="para-badge">
              <div class="para-badge__icon">
                <i class="fas fa-bolt"></i>
              </div>
              <div class="para-badge__text">
                <strong>System Active</strong>
                <span>Optimized &amp; Running</span>
              </div>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

<section class="marquee-section">
  <div class="marquee-section__glow"></div>
  <div class="marquee-label" data-reveal>Trusted Partner Ecosystem</div>
  <div class="marquee-wrap">
    <div class="marquee-track">
      <?php for ($i = 0; $i < 4; $i++): ?>
        <?php if (!empty($accreditationsList)): ?>
          <?php foreach ($accreditationsList as $row): ?>
            <div class="logo-card">
              <img src="<?php echo base_url($row->image); ?>" alt="<?php echo esc($row->name); ?>" loading="lazy">
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <div class="logo-card"><img src="https://upload.wikimedia.org/wikipedia/commons/9/96/Microsoft_logo_%282012%29.svg" alt="Microsoft"></div>
          <div class="logo-card"><img src="https://upload.wikimedia.org/wikipedia/commons/9/93/Amazon_Web_Services_Logo.svg" alt="AWS"></div>
          <div class="logo-card"><img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Google_Cloud_logo.svg" alt="Google Cloud"></div>
          <div class="logo-card"><img src="https://upload.wikimedia.org/wikipedia/commons/0/08/Cisco_logo_blue_2016.svg" alt="Cisco"></div>
          <div class="logo-card"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5e/Veritas_Technologies_logo.svg/512px-Veritas_Technologies_logo.svg.png" alt="Veritas"></div>
        <?php endif; ?>
      <?php endfor; ?>
    </div>
  </div>
</section>

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

<div class="why-pinned-wrapper">
  <div class="why-sticky-container">
    <div class="container">
      
      <div class="section-header center">
        <div class="section-eyebrow">Strategic Value</div>
        <h2 class="section-title">Why Our Partnerships <span>Matter</span></h2>
        <p class="section-body">
          We combine global technology expertise with local execution precision to guarantee business continuity and exponential growth for every client.
        </p>
      </div>

      <div style="position: relative; max-width: 900px; margin: 0 auto;">
        <div class="why-deck-pagination">
          <div class="why-pagination-bullet active" data-target="0">
            <span class="why-bullet-num">01</span>
            <span class="why-bullet-dot"></span>
          </div>
          <div class="why-pagination-bullet" data-target="1">
            <span class="why-bullet-num">02</span>
            <span class="why-bullet-dot"></span>
          </div>
          <div class="why-pagination-bullet" data-target="2">
            <span class="why-bullet-num">03</span>
            <span class="why-bullet-dot"></span>
          </div>
          <div class="why-pagination-bullet" data-target="3">
            <span class="why-bullet-num">04</span>
            <span class="why-bullet-dot"></span>
          </div>
        </div>

        <div class="why-stack-deck" style="margin: 0; max-width: 780px;">
          <div class="why-stack-card" data-index="0">
            <div class="card-left">
              <div class="why-stack-icon"><i class="fas fa-people-arrows"></i></div>
            </div>
            <div class="card-right">
              <h4 class="why-stack-title">Collaborative Growth</h4>
              <p class="why-stack-body">Co-engineering solutions with industry leaders for best-in-class framework safety and innovation velocity.</p>
            </div>
          </div>

          <div class="why-stack-card" data-index="1">
            <div class="card-left">
              <div class="why-stack-icon"><i class="fas fa-rocket"></i></div>
            </div>
            <div class="card-right">
              <h4 class="why-stack-title">Speed to Market</h4>
              <p class="why-stack-body">Rapid prototyping using pre-validated deployment templates and battle-tested, production-ready components.</p>
            </div>
          </div>

          <div class="why-stack-card" data-index="2">
            <div class="card-left">
              <div class="why-stack-icon"><i class="fas fa-shield-alt"></i></div>
            </div>
            <div class="card-right">
              <h4 class="why-stack-title">Enterprise Grade</h4>
              <p class="why-stack-body">Bank-level security, GDPR compliance frameworks, and proactive infrastructure monitoring around the clock.</p>
            </div>
          </div>

          <div class="why-stack-card" data-index="3">
            <div class="card-left">
              <div class="why-stack-icon"><i class="fas fa-chart-line"></i></div>
            </div>
            <div class="card-right">
              <h4 class="why-stack-title">ROI Focused</h4>
              <p class="why-stack-body">Data-driven strategy engineered to reduce total cost of ownership while maximising measurable returns.</p>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

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

<section class="bottom-section" id="contact">
  <div class="container">
    <div class="row g-4 align-items-stretch">
      <div class="col-lg-5" data-reveal>
        <div class="cta-block">
          <div class="cta-block__glow"></div>
          <div class="cta-block__glow2"></div>
          <div class="cta-block__hatch"></div>
          <h2 class="cta-block__title">Let's Build the Future Together</h2>
          <p class="cta-block__body">
            Partner with us to unlock the full potential of your business software ecosystem. Our experts are ready to optimize your setup from day one.
          </p>
          <div class="cta-block__actions">
            <a href="#" class="btn-primary">
              <i class="fas fa-calendar-alt"></i> Request Consultation
            </a>
            <a href="#" class="btn-ghost">
              <i class="fas fa-envelope"></i> Contact Us
            </a>
          </div>
        </div>
      </div>

      <div class="col-lg-7" data-reveal data-delay="2">
        <div class="testi-block">
          <div class="testi-block__label">Client Testimonials</div>
          <div class="swiper testi-swiper">
            <div class="swiper-wrapper">
              <?php if (!empty($testimonialsList)): ?>
                <?php foreach ($testimonialsList as $row): ?>
                  <div class="swiper-slide">
                    <div class="testi-card">
                      <div class="testi-quote-mark">&ldquo;</div>
                      <div class="testi-stars">★★★★★</div>
                      <p class="testi-text">"<?php echo esc($row->description); ?>"</p>
                      <div class="testi-footer">
                        <img class="testi-avatar"
                             src="<?php echo !empty($row->image) ? base_url($row->image) : 'https://images.unsplash.com/photo-1535713875002-d1d0cf377fde?auto=format&fit=crop&w=100&q=80'; ?>"
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
              <?php else: ?>
                <div class="swiper-slide">
                  <div class="testi-card">
                    <div class="testi-quote-mark">&ldquo;</div>
                    <div class="testi-stars">★★★★★</div>
                    <p class="testi-text">"The implementation completely transformed our supply chain. Bottlenecks vanished within weeks and cross-team visibility improved dramatically across the board."</p>
                    <div class="testi-footer">
                      <img class="testi-avatar" src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?auto=format&fit=crop&w=100&q=80" alt="Kirthivasan A." loading="lazy">
                      <div>
                        <div class="testi-name">Kirthivasan A.</div>
                        <div class="testi-role">Operations Director</div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="swiper-slide">
                  <div class="testi-card">
                    <div class="testi-quote-mark">&ldquo;</div>
                    <div class="testi-stars">★★★★★</div>
                    <p class="testi-text">"Migrating to the cloud architecture eliminated our multi-currency tracking gaps entirely. The rollout was smooth and ROI was evident in the very first quarter."</p>
                    <div class="testi-footer">
                      <img class="testi-avatar" src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?auto=format&fit=crop&w=100&q=80" alt="Praveen Rajan" loading="lazy">
                      <div>
                        <div class="testi-name">Praveen Rajan</div>
                        <div class="testi-role">Global Trade Architecture Head</div>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endif; ?>
            </div>
            <div class="swiper-pagination" style="margin-top:20px; position:static;"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

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
      return;
    }

    var rect = deckWrapper.getBoundingClientRect();
    var totalHeight = rect.height - window.innerHeight;
    var progress = Math.max(0, Math.min(1, -rect.top / totalHeight));

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
        var translateX = diff * window.innerWidth * 0.8; 
        var rotateDeg = diff * 15; 
        card.style.transform = 'translate3d(' + translateX + 'px, 0, 0) rotate(' + rotateDeg + 'deg)';
        card.style.opacity = Math.max(0, 1 + diff * 2);
        card.style.zIndex = totalCards + index;
      } else {
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

})();
</script>

<?php $this->endSection(); ?>
