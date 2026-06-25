const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

/* ------------------------------------------------------------------ *
 * NAVBAR — solid emerald on scroll + accessible mobile toggle.
 * Runs on every page (the nav exists everywhere).
 * ------------------------------------------------------------------ */
(() => {
  const nav = document.querySelector('[data-nav]');
  if (!nav) return;

  const onScroll = () => {
    nav.classList.toggle('bg-emerald-deep/95', window.scrollY > 40);
    nav.classList.toggle('backdrop-blur-md', window.scrollY > 40);
    nav.classList.toggle('shadow-[0_1px_0_rgba(154,163,156,0.16)]', window.scrollY > 40);
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
    };
    toggle.addEventListener('click', () => setOpen(panel.classList.contains('hidden')));
    panel.querySelectorAll('a').forEach((a) => a.addEventListener('click', () => setOpen(false)));
    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && !panel.classList.contains('hidden')) { setOpen(false); toggle.focus(); }
    });
  }
})();

/* ------------------------------------------------------------------ *
 * SCROLL REVEALS — restrained, one-shot, only on [data-reveal].
 * Skipped entirely under reduced motion (CSS keeps content visible).
 * ------------------------------------------------------------------ */
(() => {
  const items = document.querySelectorAll('[data-reveal]');
  if (!items.length || reduceMotion || !('IntersectionObserver' in window)) {
    items.forEach((el) => el.classList.add('is-in'));
    return;
  }
  const io = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) { entry.target.classList.add('is-in'); io.unobserve(entry.target); }
    });
  }, { threshold: 0.16, rootMargin: '0px 0px -6% 0px' });
  items.forEach((el) => io.observe(el));

  // Failsafe: never let content stay hidden. If a renderer runs JS but
  // never scrolls (headless, social-card/SEO screenshotters), reveal
  // everything after a short grace period so nothing ships blank.
  window.setTimeout(() => {
    items.forEach((el) => { el.classList.add('is-in'); io.unobserve(el); });
  }, 1600);
})();

/* ------------------------------------------------------------------ *
 * EVENTS FILTER — toggles visibility of pre-rendered cards.
 * Only runs on the events page (where [data-ev-filter] exists).
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
    let shown = 0;
    cards.forEach((card) => {
      const match = f === 'all' || card.dataset.cat === f;
      card.classList.toggle('hidden', !match);
      if (match) shown++;
    });
    if (empty) empty.hidden = shown !== 0;
  });
})();

/* ------------------------------------------------------------------ *
 * MULTI-STEP APPLY FORM — front-end only (no submission).
 * Only runs on the apply page (where [data-apply-form] exists).
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
    // only scroll on user navigation, never on initial load (would skip the hero)
    if (scroll) form.scrollIntoView({ behavior: reduceMotion ? 'auto' : 'smooth', block: 'start' });
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
    if (done) done.classList.add('is-shown');
    (done || form).scrollIntoView({ behavior: reduceMotion ? 'auto' : 'smooth', block: 'start' });
  });

  paint();
})();
