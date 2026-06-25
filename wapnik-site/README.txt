WAPNIK — West African Professionals Network in Kigali
=====================================================

WHAT'S HERE
  index.html   The complete website. Open it in any browser.
  images/      Drop your photos here (see below).

ADD A REAL HERO PHOTO
  1. Put a wide Kigali photo (landscape, ~2000px+) in the images/ folder,
     e.g. images/kigali-night.jpg
  2. In index.html, find this line near the top of the hero:
        <div class="hero-photo" style="--hero-image:none"></div>
  3. Change it to:
        <div class="hero-photo" style="--hero-image:url('images/kigali-night.jpg')"></div>
  The illustrated scene shows until you add a photo, so nothing looks broken.

BEFORE GOING LIVE
  - Wire the application form to a backend (Formspree, Google Forms, or
    Airtable). Right now it shows a confirmation but doesn't send anywhere.
  - Replace hello@wapnik.com and the social handles in the footer.

No build step, no dependencies. Just HTML, CSS, and a little JavaScript.
