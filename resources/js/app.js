import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import anime from 'animejs';

gsap.registerPlugin(ScrollTrigger);

const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
const EASE = 'power3.out';

/* ------------------------------------------------------------------ *
 * NAVBAR — solid emerald on scroll + accessible mobile toggle.
 * ------------------------------------------------------------------ */
(() => {
  const nav = document.querySelector('[data-nav]');
  if (!nav) return;

  const onScroll = () => {
    const on = window.scrollY > 40;
    nav.classList.toggle('bg-emerald-deep/95', on);
    nav.classList.toggle('backdrop-blur-md', on);
    nav.classList.toggle('shadow-[0_1px_0_rgba(154,163,156,0.16)]', on);
  };
  onScroll();
  window.addEventListener('scroll', onScroll, { passive: true });

  const toggle = nav.querySelector('[data-nav-toggle]');
  const panel = nav.querySelector('[data-nav-panel]');
  if (toggle && panel) {
    const setOpen = (open) => {
      panel.classList.toggle('hidden', !open);
      toggle.setAttribute('aria-expanded', String(open));
      toggle.querySelector('.sr-only').textContent = open ? 'Close menu' : 'Open menu';
      if (open && !reduceMotion) {
        anime({ targets: panel.querySelectorAll('a'), opacity: [0, 1], translateX: [-12, 0], delay: anime.stagger(50), duration: 420, easing: 'easeOutQuad' });
      }
    };
    toggle.addEventListener('click', () => setOpen(panel.classList.contains('hidden')));
    panel.querySelectorAll('a').forEach((a) => a.addEventListener('click', () => setOpen(false)));
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && !panel.classList.contains('hidden')) { setOpen(false); toggle.focus(); }
    });
  }
})();

/* ------------------------------------------------------------------ *
 * HERO ENTRANCE (Anime.js) — letter-mask stagger + staged content rise.
 * Runs only on the home hero. No-JS / reduced-motion keep it static.
 * ------------------------------------------------------------------ */
(() => {
  const hero = document.querySelector('.hero');
  if (!hero) return;

  const word = hero.querySelector('[data-hero-letters]');
  if (word) {
    const text = word.textContent.trim();
    hero.querySelector('.hero-word')?.setAttribute('aria-label', text);
    word.textContent = '';
    word.style.opacity = '1';
    word.setAttribute('aria-hidden', 'true');
    [...text].forEach((ch) => {
      const cell = document.createElement('span');
      cell.className = 'hero-ltr';
      const inner = document.createElement('span');
      inner.textContent = ch;
      if (!reduceMotion) inner.style.transform = 'translateY(110%)';
      cell.appendChild(inner);
      word.appendChild(cell);
    });
  }

  if (reduceMotion) return;

  anime.timeline({ easing: 'easeOutExpo' })
    .add({ targets: hero.querySelectorAll('.hero-ltr > span'), translateY: ['110%', '0%'], duration: 1150, delay: anime.stagger(55) })
    .add({ targets: hero.querySelectorAll('[data-hero-el]'), translateY: [28, 0], opacity: [0, 1], duration: 900, delay: anime.stagger(120) }, '-=780');
})();

/* ------------------------------------------------------------------ *
 * SCROLL REVEALS (GSAP ScrollTrigger.batch) — items entering together
 * stagger in. CSS keeps everything visible under no-JS / reduced motion.
 * ------------------------------------------------------------------ */
(() => {
  const els = gsap.utils.toArray('[data-reveal]');
  if (!els.length || reduceMotion) return;

  ScrollTrigger.batch('[data-reveal]', {
    start: 'top 88%',
    once: true,
    onEnter: (batch) => gsap.to(batch, { opacity: 1, y: 0, duration: 0.9, ease: EASE, stagger: 0.09, overwrite: true }),
  });

  // keep trigger positions correct as fonts/images settle
  window.addEventListener('load', () => ScrollTrigger.refresh());
})();

/* ------------------------------------------------------------------ *
 * PARALLAX (GSAP scrub) — gentle depth on tagged images. The images are
 * over-scanned (scale) so the vertical drift never reveals an edge.
 * ------------------------------------------------------------------ */
(() => {
  if (reduceMotion) return;

  // hero photograph: a touch more travel + zoom for presence
  const heroImg = document.querySelector('.hero img');
  if (heroImg) {
    gsap.fromTo(heroImg, { scale: 1.16, yPercent: -7 }, {
      yPercent: 8, ease: 'none',
      scrollTrigger: { trigger: '.hero', start: 'top top', end: 'bottom top', scrub: true },
    });
  }

  gsap.utils.toArray('[data-parallax]').forEach((el) => {
    const img = el.querySelector('img') || el;
    gsap.fromTo(img, { yPercent: -8, scale: 1.14 }, {
      yPercent: 8, ease: 'none',
      scrollTrigger: { trigger: el, start: 'top bottom', end: 'bottom top', scrub: true },
    });
  });
})();

/* ------------------------------------------------------------------ *
 * COUNT-UP (Anime.js) — numbers tick up when scrolled into view.
 * ------------------------------------------------------------------ */
(() => {
  gsap.utils.toArray('[data-count]').forEach((el) => {
    const end = parseFloat(el.dataset.count);
    const suffix = el.dataset.suffix || '';
    if (reduceMotion) { el.textContent = end + suffix; return; }
    el.textContent = '0' + suffix;
    const obj = { v: 0 };
    ScrollTrigger.create({
      trigger: el, start: 'top 90%', once: true,
      onEnter: () => anime({ targets: obj, v: end, round: 1, duration: 1700, easing: 'easeOutExpo', update: () => { el.textContent = obj.v + suffix; } }),
    });
  });
})();

/* ------------------------------------------------------------------ *
 * EVENTS FILTER — toggle pre-rendered cards, then re-stagger the
 * surviving cards in (Anime.js) so filtering feels alive.
 * ------------------------------------------------------------------ */
(() => {
  const filter = document.querySelector('[data-ev-filter]');
  const grid = document.querySelector('[data-ev-grid]');
  if (!filter || !grid) return;

  const cards = Array.from(grid.querySelectorAll('[data-cat]'));
  const empty = document.querySelector('[data-ev-empty]');
  const buttons = Array.from(filter.querySelectorAll('button'));

  const setActive = (btn) => {
    buttons.forEach((b) => {
      const on = b === btn;
      b.setAttribute('aria-pressed', String(on));
      b.classList.toggle('border-emerald', on);
      b.classList.toggle('bg-emerald', on);
      b.classList.toggle('font-semibold', on);
      b.classList.toggle('text-gold-light', on);
      b.classList.toggle('border-line', !on);
      b.classList.toggle('text-ink-soft', !on);
    });
  };

  filter.addEventListener('click', (e) => {
    const btn = e.target.closest('button');
    if (!btn) return;
    const f = btn.dataset.f;
    setActive(btn);
    const visible = [];
    cards.forEach((card) => {
      const match = f === 'all' || card.dataset.cat === f;
      card.classList.toggle('hidden', !match);
      if (match) visible.push(card);
    });
    if (empty) empty.hidden = visible.length !== 0;
    if (!reduceMotion && visible.length) {
      anime({ targets: visible, opacity: [0, 1], translateY: [18, 0], scale: [0.985, 1], delay: anime.stagger(45), duration: 520, easing: 'easeOutQuad' });
    }
  });
})();

/* ------------------------------------------------------------------ *
 * MULTI-STEP APPLY FORM — front-end only; fields stagger in per step.
 * ------------------------------------------------------------------ */
(() => {
  const form = document.querySelector('[data-apply-form]');
  if (!form) return;

  const steps = Array.from(form.querySelectorAll('.fstep'));
  const dots = Array.from(document.querySelectorAll('[data-rail-dot]'));
  const back = form.querySelector('[data-back]');
  const fwd = form.querySelector('[data-fwd]');
  const send = form.querySelector('[data-send]');
  const done = document.querySelector('[data-done]');
  const rail = document.querySelector('[data-rail]');
  const cvInput = form.querySelector('#cv');
  const cvName = form.querySelector('[data-cv-name]');
  let cur = 0;

  const animateFields = () => {
    if (reduceMotion) return;
    const targets = steps[cur].querySelectorAll(':scope > *');
    anime({ targets, opacity: [0, 1], translateY: [16, 0], delay: anime.stagger(70), duration: 600, easing: 'easeOutQuad' });
  };

  const paint = ({ scroll = false } = {}) => {
    steps.forEach((s, i) => s.classList.toggle('is-active', i === cur));
    dots.forEach((d, i) => {
      const line = d.querySelector('[data-rail-line]');
      d.classList.toggle('text-cream', i === cur);
      d.classList.toggle('text-faint', i !== cur);
      d.classList.toggle('text-cream/45', i < cur);
      if (line) {
        line.classList.toggle('bg-gold', i === cur);
        line.classList.toggle('bg-cream/20', i > cur);
        line.classList.toggle('bg-cream/40', i < cur);
      }
    });
    back.style.visibility = cur === 0 ? 'hidden' : 'visible';
    const last = cur === steps.length - 1;
    fwd.style.display = last ? 'none' : 'inline-flex';
    send.style.display = last ? 'inline-flex' : 'none';
    if (scroll) form.scrollIntoView({ behavior: reduceMotion ? 'auto' : 'smooth', block: 'start' });
    animateFields();
  };

  const validStep = () => {
    const fields = steps[cur].querySelectorAll('input, select, textarea');
    for (const f of fields) {
      if (!f.checkValidity()) { f.reportValidity(); return false; }
    }
    return true;
  };

  fwd.addEventListener('click', () => { if (validStep()) { cur++; paint({ scroll: true }); } });
  back.addEventListener('click', () => { cur--; paint({ scroll: true }); });

  if (cvInput && cvName) {
    cvInput.addEventListener('change', (e) => {
      const name = e.target.files[0] && e.target.files[0].name;
      if (name) cvName.textContent = name;
    });
  }

  form.addEventListener('submit', (e) => {
    e.preventDefault();
    if (!validStep()) return;
    form.style.display = 'none';
    if (rail) rail.style.display = 'none';
    if (done) {
      done.classList.add('is-shown');
      if (!reduceMotion) {
        anime.timeline({ easing: 'easeOutExpo' })
          .add({ targets: done.querySelector('.mark'), scale: [0.4, 1], opacity: [0, 1], duration: 700 })
          .add({ targets: done.querySelectorAll('h2, p, .fine'), translateY: [20, 0], opacity: [0, 1], delay: anime.stagger(90), duration: 700 }, '-=350');
      }
    }
    (done || form).scrollIntoView({ behavior: reduceMotion ? 'auto' : 'smooth', block: 'start' });
  });

  paint();
})();
