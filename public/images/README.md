# Image slots

These are **labeled placeholders**, not final art. Each is a real `<img>`
target referenced via `asset('images/…')` in the Blade views. To go live,
drop a real photograph at the same path and aspect ratio (you can keep the
`.svg` name or switch to `.jpg`/`.webp` and update the `src` in the view).

Every image is wrapped by `resources/views/partials/photo.blade.php`, which
lays a single unified **emerald color-grade** over whatever photo is present —
so the whole site stays art-directed even as real photos are swapped in.

Intended subjects (all: West African professionals + Kigali):

| Path | Subject | Used on |
|------|---------|---------|
| `hero/kigali-dusk.svg` | Kigali skyline / convention centre at dusk, professionals in foreground (≥2000px wide) | home hero |
| `home/gathering.svg` | Members around a long table | (spare) |
| `who/founders.svg` | Portrait of the founders / a member | who-we-are |
| `who/belonging.svg` | Candid group in conversation | home teaser |
| `pillars/friendships.svg` | Members sharing a meal | who-we-are pillars |
| `pillars/growth.svg` | A mentoring conversation | who-we-are pillars |
| `pillars/landing.svg` | A family settling into Kigali | who-we-are pillars |
| `pillars/home-away.svg` | A West African cultural celebration | who-we-are pillars |
| `events/*.svg` | Each event type (dinner, coffee, roundtable, development, picnic, cultural, gala, intros) | events grid + home |
| `apply/ambient.svg` | Quiet Kigali evening (ambient, low opacity) | apply + home CTA |
