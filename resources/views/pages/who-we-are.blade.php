@extends('layouts.app')

@section('title', 'Who we are · WAPNIK')
@section('meta_description', 'WAPNIK is a network of West African founders, professionals, diplomats, and families who chose Kigali. Built for belonging, careful about who we admit.')

@section('content')

{{-- MASTHEAD (dark, so the fixed nav reads) — opener: oversized type, no dash --}}
<header class="bg-emerald-deep pt-36 pb-24 text-cream md:pt-40">
  <div class="mx-auto max-w-[1240px] px-6 md:px-10">
    <span class="text-[0.7rem] font-medium uppercase tracking-[0.32em] text-gold">Who we are</span>
    <h1 class="mt-6 max-w-[16ch] font-display text-[clamp(2.6rem,7vw,5.5rem)] font-light leading-[0.98] tracking-[-0.03em]">
      A network, not a group chat.
    </h1>
    <p class="mt-7 max-w-[52ch] font-light text-cream/70">West Africans who chose Kigali. Founders, doctors, diplomats, engineers, and the families beside them.</p>
  </div>
</header>

{{-- WHO — copy beside a real portrait, with an overlapping stat plate --}}
<section class="bg-cream py-[13vh]">
  <div class="mx-auto grid max-w-[1240px] items-center gap-16 px-6 md:px-10 lg:grid-cols-[1.05fr_1fr] lg:gap-20">
    <div class="max-w-[48ch]">
      <h2 class="font-display text-[clamp(2rem,4vw,2.8rem)] font-light leading-[1.08] tracking-[-0.02em]">We weren't short on contacts.</h2>
      <p class="mt-6 font-display text-xl font-light italic leading-snug text-emerald">We were short on a room where someone wants you to win.</p>
      <p class="mt-6 font-light text-ink-soft">So we built one. A circle of West African professionals putting down roots in Kigali, where the introductions are warm and the table is generous.</p>
      <p class="mt-4 font-light text-ink-soft">And we're careful who we let in.</p>
      <div class="mt-9">
        <div class="font-display text-2xl font-light italic text-emerald">The Founders</div>
        <div class="mt-1 text-[0.74rem] uppercase tracking-[0.12em] text-faint">WAPNIK</div>
      </div>
    </div>

    <div data-reveal class="relative">
      {{-- INTENDED PHOTO: portrait of the founders / a member, Kigali. --}}
      @include('partials.photo', ['src' => 'who/founders.svg', 'alt' => 'The founders of WAPNIK in Kigali', 'ratio' => 'aspect-[4/5]', 'class' => 'rounded-sm shadow-[0_50px_90px_-40px_rgba(12,42,31,.5)]'])
      <div class="absolute -bottom-7 -left-5 rounded-sm border-t-2 border-gold bg-emerald px-8 py-6 text-cream shadow-[0_30px_60px_-24px_rgba(0,0,0,.5)] md:-left-8">
        <div class="font-display text-4xl font-light leading-none text-gold-light">15+</div>
        <div class="mt-1.5 text-[0.7rem] uppercase tracking-[0.14em] text-cream/70">West African nations,<br>one table</div>
      </div>
    </div>
  </div>
</section>

{{-- BELONGING — two contrasting panels (not a uniform grid) --}}
<section class="bg-cream-2 py-[13vh]">
  <div class="mx-auto max-w-[1240px] px-6 md:px-10">
    <div class="max-w-[640px]">
      <span class="text-[0.7rem] font-medium uppercase tracking-[0.28em] text-gold">Who belongs here</span>
      <h2 class="mt-5 font-display text-[clamp(2rem,4.5vw,3.2rem)] font-light leading-[1.04] tracking-[-0.02em]">Built for professionals.</h2>
      <p class="mt-5 font-light text-ink-soft">Find yourself on this list and you'll feel at home in the room.</p>
    </div>

    <div class="mt-14 grid gap-7 lg:grid-cols-[1.4fr_1fr] lg:items-start">
      <div class="rounded-sm border border-line bg-paper p-10 md:p-12">
        <h3 class="font-display text-2xl font-light text-emerald">This is your room if you're a…</h3>
        <ul class="mt-7 flex flex-col gap-4">
          @php $belongs = [
            'Corporate professional or senior manager',
            'Founder, entrepreneur, or business owner',
            'Executive or established consultant',
            'Development sector, NGO, or international-org professional',
            'Diplomat or foreign-mission staff',
            'Remote worker or digital professional',
            'Couple or family putting down roots in Kigali',
          ]; @endphp
          @foreach ($belongs as $b)
            <li class="flex items-start gap-3.5 text-[0.98rem] font-light">
              <span class="mt-0.5 grid flex-none place-items-center rounded-full bg-emerald text-[0.6rem] text-gold-light" style="height:1.375rem;width:1.375rem;">&#10003;</span>
              {{ $b }}
            </li>
          @endforeach
        </ul>
      </div>

      <div class="rounded-sm border border-gold/20 bg-emerald p-10 text-cream md:p-12">
        <h3 class="font-display text-2xl font-light text-gold-light">It's honestly not for…</h3>
        <ul class="mt-7 flex flex-col gap-4">
          @php $notFor = [
            "Students (we'll cheer you on elsewhere)",
            'Anyone seeking financial assistance',
            'Pure transactional networking',
            'Mass advertising or unsolicited selling',
          ]; @endphp
          @foreach ($notFor as $n)
            <li class="flex items-start gap-3.5 text-[0.98rem] font-light text-cream/85">
              <span class="mt-0.5 grid flex-none place-items-center rounded-full text-[0.6rem]" style="height:1.375rem;width:1.375rem;background:rgba(180,69,47,.25);color:#ec9a85;">&#10007;</span>
              {{ $n }}
            </li>
          @endforeach
        </ul>
        <p class="mt-7 text-[0.92rem] font-light text-cream/70">We say no often. That's why a yes means something.</p>
      </div>
    </div>
  </div>
</section>

{{-- MEMBERSHIP PRIVILEGES — four photo-led pillars (replaces SVG blobs).
     Treatment differs from belonging: emerald ground, image-topped cards. --}}
<section class="bg-emerald py-[13vh] text-cream">
  <div class="mx-auto max-w-[1240px] px-6 md:px-10">
    <div class="max-w-[640px]">
      <span class="text-[0.7rem] font-medium uppercase tracking-[0.28em] text-gold-light">What membership means</span>
      <h2 class="mt-5 font-display text-[clamp(2rem,4.5vw,3.2rem)] font-light leading-[1.04] tracking-[-0.02em] text-cream">Four things every member walks away with.</h2>
      <p class="mt-5 font-light text-cream/70">Not a group to join. People in your corner.</p>
    </div>

    <div class="mt-14 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
      @php $pillars = [
        ['n' => 'I',   'img' => 'pillars/friendships.svg', 'alt' => 'Members sharing a meal and laughing together', 't' => 'Real friendships', 'd' => "A circle that gets where you come from, and where you're headed."],
        ['n' => 'II',  'img' => 'pillars/growth.svg',      'alt' => 'A mentoring conversation between two professionals', 't' => 'Professional growth', 'd' => 'Warm introductions, mentorship, and opportunities off the job board.'],
        ['n' => 'III', 'img' => 'pillars/landing.svg',     'alt' => 'A family settling into life in Kigali', 't' => 'A softer landing', 'd' => 'Trusted advice on housing, schools, and life in Kigali.'],
        ['n' => 'IV',  'img' => 'pillars/home-away.svg',   'alt' => 'A West African cultural celebration in Kigali', 't' => 'Home, away', 'd' => 'The food, the language, the celebrations. West Africa, kept alive.'],
      ]; @endphp
      @foreach ($pillars as $p)
        <article class="group overflow-hidden rounded-sm border border-gold/20 bg-cream/[0.03] transition-colors duration-500 hover:border-gold/50">
          <div class="overflow-hidden">
            @include('partials.photo', ['src' => $p['img'], 'alt' => $p['alt'], 'ratio' => 'aspect-[16/10]', 'class' => 'transition-transform duration-[1.4s] ease-[cubic-bezier(.16,1,.3,1)] group-hover:scale-[1.06]'])
          </div>
          <div class="p-7">
            <div class="font-display text-sm tracking-[0.1em] text-gold">{{ $p['n'] }}</div>
            <h3 class="mt-3 font-display text-xl font-light text-cream">{{ $p['t'] }}</h3>
            <p class="mt-2.5 text-[0.92rem] font-light text-cream/65">{{ $p['d'] }}</p>
          </div>
        </article>
      @endforeach
    </div>
  </div>
</section>

{{-- VALUES — top-ruled columns, a distinct treatment from every card above --}}
<section class="bg-cream py-[13vh]">
  <div class="mx-auto max-w-[1240px] px-6 md:px-10">
    <h2 class="max-w-[18ch] font-display text-[clamp(2rem,4.5vw,3.2rem)] font-light leading-[1.04] tracking-[-0.02em]">Five values every member signs up to.</h2>
    <div class="mt-14 grid gap-x-8 gap-y-12 sm:grid-cols-2 lg:grid-cols-5">
      @php $values = [
        ['Community', 'A place to belong, where everyone is genuinely known.'],
        ['Excellence', 'High standards in character and conduct, always.'],
        ['Integrity', 'Trust built on honesty, respect, and accountability.'],
        ['Culture', 'The richness and diversity of West Africa, celebrated.'],
        ['Collaboration', 'Together we go further. We mean it.'],
      ]; @endphp
      @foreach ($values as $v)
        <div class="group border-t-2 border-gold pt-6 transition-colors duration-500 hover:border-emerald">
          <h3 class="font-display text-lg font-normal text-emerald">{{ $v[0] }}</h3>
          <p class="mt-2.5 text-[0.88rem] font-light text-ink-soft">{{ $v[1] }}</p>
        </div>
      @endforeach
    </div>
  </div>
</section>

{{-- quiet CTA strip to apply --}}
<section class="bg-emerald-deep py-20 text-cream">
  <div class="mx-auto flex max-w-[1240px] flex-col items-start justify-between gap-6 px-6 md:flex-row md:items-center md:px-10">
    <p class="font-display text-2xl font-light italic text-gold-light">Think this is your room?</p>
    <a href="{{ route('apply') }}" class="group inline-flex items-center gap-4 rounded-sm bg-gold px-8 py-4 text-[0.78rem] font-semibold uppercase tracking-[0.18em] text-emerald-deep transition-[transform,background-color] duration-300 hover:-translate-y-0.5 hover:bg-gold-light">
      Request an invitation
      <span class="h-px w-8 bg-current transition-[width] duration-300 group-hover:w-12"></span>
    </a>
  </div>
</section>

@endsection
