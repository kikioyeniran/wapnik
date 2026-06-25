@extends('layouts.app')

@section('title', 'WAPNIK · West African Professionals Network in Kigali')
@section('meta_description', 'A private network of West African professionals, founders, and families in Kigali. Membership by application and invitation.')

@section('content')

{{-- ============================================================= --}}
{{-- HERO — bespoke layered composite (signature moment). The only  --}}
{{-- eyebrow-with-dash on the whole site lives here.                --}}
{{-- ============================================================= --}}
<section class="hero relative flex min-h-[100dvh] items-end overflow-hidden bg-emerald-deep pb-[8vh] text-cream">
  {{-- INTENDED PHOTO: wide Kigali skyline / convention-centre at dusk,
       warm city light, West African professionals in the foreground.
       Swap public/images/hero/kigali-dusk.svg for a real 2000px+ photo. --}}
  <img src="{{ asset('images/hero/kigali-dusk.svg') }}"
       alt="Kigali skyline at dusk, the home of the WAPNIK network"
       fetchpriority="high"
       class="absolute inset-0 h-full w-full object-cover object-[center_30%]">
  <div class="hero-grade absolute inset-0"></div>
  <div class="hero-grain absolute inset-0 opacity-40"></div>
  <div class="hero-guide absolute left-1/2 top-0 w-px"></div>

  <div class="relative mx-auto w-full max-w-[1240px] px-6 md:px-10">
    <h1 class="hero-word mb-8 font-display text-[clamp(3.4rem,12vw,10rem)] font-light leading-[0.9] tracking-[-0.03em]">
      <span class="row"><span>WAPNIK</span></span>
    </h1>

    <div class="flex flex-wrap items-end justify-between gap-10">
      <div class="max-w-[440px]">
        <span class="mb-4 inline-flex items-center gap-3.5 text-[0.7rem] font-medium uppercase tracking-[0.32em] text-gold-light
                     before:h-px before:w-8 before:bg-gradient-to-r before:from-transparent before:to-gold-light">
          West African Professionals · Kigali
        </span>
        <p class="text-lg font-light leading-snug text-cream/80">
          For West Africans who chose Kigali. A private network for building, leading, and <em class="italic text-gold-light">belonging</em>.
        </p>
      </div>

      <div class="flex flex-col items-start gap-4">
        <a href="{{ route('apply') }}"
           class="group inline-flex items-center gap-4 rounded-sm bg-gold px-8 py-4 text-[0.78rem] font-semibold uppercase tracking-[0.18em] text-emerald-deep shadow-[0_16px_40px_-14px_rgba(154,163,156,.6)] transition-[transform,background-color] duration-300 ease-[cubic-bezier(.16,1,.3,1)] hover:-translate-y-0.5 hover:bg-gold-light">
          Request an invitation
          <span class="h-px w-8 bg-current transition-[width] duration-300 group-hover:w-12"></span>
        </a>
        <span class="text-[0.7rem] uppercase tracking-[0.2em] text-cream/50">By application &amp; invitation only</span>
      </div>
    </div>
  </div>
</section>

{{-- ============================================================= --}}
{{-- MARQUEE (signature moment)                                    --}}
{{-- ============================================================= --}}
<div class="marquee overflow-hidden border-y border-gold/15 bg-emerald-deep py-5">
  <div class="marquee-track">
    @php $marquee = ['Networking dinners','Founder roundtables','Family picnics','Cultural celebrations','The WAPNIK Gala','Coffee & conversation']; @endphp
    @for ($i = 0; $i < 2; $i++)
      <div class="flex shrink-0 items-center" aria-hidden="{{ $i === 1 ? 'true' : 'false' }}">
        @foreach ($marquee as $item)
          <span class="px-8 font-display text-lg font-light italic text-gold-light">{{ $item }}</span>
          <span class="text-gold/40">·</span>
        @endforeach
      </div>
    @endfor
  </div>
</div>

{{-- ============================================================= --}}
{{-- ETHOS — manifesto, verbatim. Asymmetric, no eyebrow-dash.     --}}
{{-- ============================================================= --}}
<section class="bg-paper py-[15vh]">
  <div class="mx-auto max-w-[1240px] px-6 md:px-10">
    <p class="mb-[8vh] text-center text-[0.7rem] font-medium uppercase tracking-[0.32em] text-gold">Our ethos</p>
    <div class="mx-auto max-w-[1000px]">
      <p data-reveal class="mb-[7vh] max-w-[16ch] font-display text-[clamp(1.7rem,4vw,3rem)] font-light leading-[1.24] tracking-[-0.02em] text-ink">
        A city can be full of people and still feel far from home.
      </p>
      <p data-reveal class="mb-[7vh] ml-auto max-w-[18ch] text-right font-display text-[clamp(1.7rem,4vw,3rem)] font-light leading-[1.24] tracking-[-0.02em] text-ink">
        So we built a <em class="italic text-gold">network</em>, where you are already understood.
        <span class="mt-5 ml-auto block max-w-[44ch] font-sans text-base font-normal leading-relaxed tracking-normal text-ink-soft">Where the introductions are warm, the table is generous, and the person across from you genuinely wants you to win.</span>
      </p>
      <p data-reveal class="mb-0 max-w-[16ch] font-display text-[clamp(1.7rem,4vw,3rem)] font-light leading-[1.24] tracking-[-0.02em] text-ink">
        We are careful about who we admit.
        <span class="mt-5 block max-w-[44ch] font-sans text-base font-normal leading-relaxed tracking-normal text-ink-soft">Not to keep people out. Because the quality of the room is the whole of what we offer.</span>
      </p>
    </div>
  </div>
</section>

{{-- ============================================================= --}}
{{-- TEASER · WHO WE ARE — full-bleed split, image to the edge.    --}}
{{-- ============================================================= --}}
<section class="bg-cream">
  <div class="grid items-stretch lg:grid-cols-2">
    <div data-reveal class="order-2 lg:order-1">
      {{-- INTENDED PHOTO: candid group of WAPNIK members around a long
           table in Kigali, warm evening light. --}}
      @include('partials.photo', ['src' => 'who/belonging.svg', 'alt' => 'WAPNIK members in conversation around a table in Kigali', 'ratio' => 'aspect-[4/3] lg:aspect-auto lg:h-full', 'grade' => 'soft'])
    </div>
    <div class="order-1 flex items-center lg:order-2">
      <div class="px-6 py-[12vh] md:px-12 lg:max-w-[520px] lg:pl-16">
        <span class="text-[0.7rem] font-medium uppercase tracking-[0.28em] text-gold">Who we are</span>
        <h2 class="mt-5 font-display text-[clamp(2.1rem,4vw,3rem)] font-light leading-[1.05] tracking-[-0.02em]">A network, not a group chat.</h2>
        <p class="mt-6 font-display text-xl font-light italic leading-snug text-ink">West Africans who chose Kigali.</p>
        <p class="mt-5 max-w-[46ch] font-light text-ink-soft">Founders, doctors, diplomats, engineers, and the families beside them. We weren't short on contacts. We were short on a room where someone wants you to win.</p>
        <a href="{{ route('who-we-are') }}" class="group mt-9 inline-flex items-center gap-4 text-[0.74rem] font-semibold uppercase tracking-[0.18em] text-emerald">
          Read who we are
          <span class="h-px w-9 bg-emerald transition-[width] duration-300 group-hover:w-14"></span>
        </a>
      </div>
    </div>
  </div>
</section>

{{-- ============================================================= --}}
{{-- TEASER · EVENTS — editorial list + single tall image.         --}}
{{-- Different layout family from the split above.                 --}}
{{-- ============================================================= --}}
<section class="bg-cream-2 py-[14vh]">
  <div class="mx-auto max-w-[1240px] px-6 md:px-10">
    <div class="grid gap-14 lg:grid-cols-[1fr_1.1fr] lg:items-end">
      <div>
        <span class="text-[0.7rem] font-medium uppercase tracking-[0.28em] text-gold">Events &amp; experiences</span>
        <h2 class="mt-5 max-w-[14ch] font-display text-[clamp(2.1rem,4.5vw,3.4rem)] font-light leading-[1.04] tracking-[-0.02em]">Where friendships are made.</h2>
        <p class="mt-6 max-w-[42ch] font-light text-ink-soft">From quiet coffees to the black-tie Gala, our calendar is a standing invitation. Show up as life allows.</p>

        <ul class="mt-10 divide-y divide-line border-t border-line">
          @php $teaserEvents = [
            ['Networking Dinner', 'Monthly · last Friday'],
            ['Founder Roundtable', 'Quarterly · by invitation'],
            ['Family Picnics', 'Twice a year'],
            ['The WAPNIK Gala', 'Annual · black tie'],
          ]; @endphp
          @foreach ($teaserEvents as $ev)
            <li class="flex items-baseline justify-between gap-6 py-4">
              <span class="font-display text-xl font-light text-emerald">{{ $ev[0] }}</span>
              <span class="text-[0.72rem] uppercase tracking-[0.14em] text-faint">{{ $ev[1] }}</span>
            </li>
          @endforeach
        </ul>

        <a href="{{ route('events') }}" class="group mt-9 inline-flex items-center gap-4 text-[0.74rem] font-semibold uppercase tracking-[0.18em] text-emerald">
          See the full calendar
          <span class="h-px w-9 bg-emerald transition-[width] duration-300 group-hover:w-14"></span>
        </a>
      </div>

      <div data-reveal>
        {{-- INTENDED PHOTO: the WAPNIK Gala — black-tie evening, candid. --}}
        @include('partials.photo', ['src' => 'events/gala.svg', 'alt' => 'Guests at the annual black-tie WAPNIK Gala', 'ratio' => 'aspect-[4/5]'])
      </div>
    </div>
  </div>
</section>

{{-- ============================================================= --}}
{{-- APPLY CTA — drenched emerald band with ambient image.         --}}
{{-- ============================================================= --}}
<section class="relative overflow-hidden bg-gradient-to-b from-emerald-deep to-emerald py-[16vh] text-cream">
  {{-- INTENDED PHOTO: quiet Kigali evening, low opacity ambient. --}}
  <img src="{{ asset('images/apply/ambient.svg') }}" alt="" aria-hidden="true" loading="lazy"
       class="absolute inset-0 h-full w-full object-cover opacity-[0.15]">
  <div class="relative mx-auto max-w-[820px] px-6 text-center md:px-10">
    <h2 class="font-display text-[clamp(2.2rem,6vw,4rem)] font-light leading-[1.05] tracking-[-0.02em]">
      You are not signing up.<br>You are being considered.
    </h2>
    <p class="mx-auto mt-7 max-w-[48ch] font-light text-cream/65">A few quiet questions, each read by the committee, never a bot. We say no often. That's why a yes means something.</p>
    <a href="{{ route('apply') }}"
       class="group mt-10 inline-flex items-center gap-4 rounded-sm bg-gold px-9 py-4 text-[0.78rem] font-semibold uppercase tracking-[0.18em] text-emerald-deep transition-[transform,background-color] duration-300 ease-[cubic-bezier(.16,1,.3,1)] hover:-translate-y-0.5 hover:bg-gold-light">
      Request an invitation
      <span class="h-px w-8 bg-current transition-[width] duration-300 group-hover:w-12"></span>
    </a>
  </div>
</section>

@endsection
