<footer class="bg-emerald-deep text-cream">
  <div class="mx-auto max-w-[1240px] px-6 pt-20 md:px-10">
    <div class="grid gap-12 pb-14 md:grid-cols-[1.6fr_1fr_1fr]">

      <div>
        <div class="font-display text-2xl tracking-[0.4em] pl-[0.4em]">WAPNIK</div>
        <p class="mt-4 font-display text-lg font-light italic text-gold-light">Friendship. Community. Opportunity.</p>
        <p class="mt-4 max-w-[330px] text-sm font-light text-cream/65">West African professionals building lives and careers in Kigali.</p>
      </div>

      <div>
        <h2 class="mb-5 text-xs font-semibold uppercase tracking-[0.2em] text-gold">Explore</h2>
        <a href="{{ route('home') }}" class="block mb-3 text-sm font-light text-cream/70 transition-colors hover:text-gold-light">Home</a>
        <a href="{{ route('who-we-are') }}" class="block mb-3 text-sm font-light text-cream/70 transition-colors hover:text-gold-light">Who we are</a>
        <a href="{{ route('events') }}" class="block mb-3 text-sm font-light text-cream/70 transition-colors hover:text-gold-light">Events</a>
        <a href="{{ route('apply') }}" class="block mb-3 text-sm font-light text-cream/70 transition-colors hover:text-gold-light">How to join</a>
      </div>

      <div>
        <h2 class="mb-5 text-xs font-semibold uppercase tracking-[0.2em] text-gold">Connect</h2>
        <a href="{{ route('apply') }}" class="block mb-3 text-sm font-light text-cream/70 transition-colors hover:text-gold-light">Request an invitation</a>
        <a href="mailto:hello@wapnik.com" class="block mb-3 text-sm font-light text-cream/70 transition-colors hover:text-gold-light">hello@wapnik.com</a>
        <p class="mb-3 text-sm font-light text-cream/70">Kigali, Rwanda</p>
        <a href="#" class="block text-sm font-light text-cream/70 transition-colors hover:text-gold-light">@wapnik</a>
      </div>
    </div>

    <div class="border-t border-gold/15 py-7 text-center">
      <p class="font-display text-base font-light italic tracking-[0.06em] text-gold">One community. Many possibilities. Endless connections.</p>
      <p class="mt-2 text-[0.7rem] uppercase tracking-[0.14em] text-cream/40">© {{ date('Y') }} WAPNIK · West African Professionals Network in Kigali</p>
    </div>
  </div>
</footer>
