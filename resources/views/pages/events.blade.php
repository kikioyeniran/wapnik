@extends('layouts.app')

@section('title', 'Events · WAPNIK')
@section('meta_description', 'From quiet coffees to the annual black-tie Gala, the WAPNIK calendar is a standing invitation. Networking, professional development, family and culture.')

@section('content')

{{-- MASTHEAD — opener: label set beside a rule, distinct from other pages --}}
<header class="bg-emerald-deep pt-36 pb-24 text-cream md:pt-40">
  <div class="mx-auto max-w-[1240px] px-6 md:px-10">
    <div class="grid gap-8 lg:grid-cols-[1.3fr_1fr] lg:items-end">
      <div>
        <span data-reveal class="text-[0.7rem] font-medium uppercase tracking-[0.32em] text-gold">Events &amp; experiences</span>
        <h1 data-reveal class="mt-6 max-w-[14ch] font-display text-[clamp(2.6rem,7vw,5.5rem)] font-light leading-[0.98] tracking-[-0.03em]">Where friendships are made.</h1>
      </div>
      <p data-reveal class="max-w-[40ch] font-light text-cream/70 lg:pb-3">From quiet coffees to the black-tie Gala. Filter by the room you want, and show up as life allows.</p>
    </div>
  </div>
</header>

{{-- EVENTS GRID + FILTER. Cards are rendered server-side (visible without
     JS); the filter only toggles a hidden class when JS is present. --}}
<section class="bg-cream py-[12vh]">
  <div class="mx-auto max-w-[1240px] px-6 md:px-10">

    <div class="mb-12 flex flex-wrap gap-2.5" data-ev-filter role="group" aria-label="Filter events">
      @php $filters = [
        'all' => 'Everything', 'network' => 'Networking', 'growth' => 'Professional',
        'family' => 'Family & culture', 'signature' => 'Signature',
      ]; @endphp
      @foreach ($filters as $key => $label)
        <button type="button" data-f="{{ $key }}" aria-pressed="{{ $key === 'all' ? 'true' : 'false' }}"
          class="rounded-full border px-5 py-2.5 text-[0.8rem] font-medium tracking-[0.02em] transition-colors duration-300
                 {{ $key === 'all'
                    ? 'border-emerald bg-emerald font-semibold text-gold-light'
                    : 'border-line text-ink-soft hover:border-gold hover:text-emerald' }}">
          {{ $label }}
        </button>
      @endforeach
    </div>

    @php $events = [
      ['cat' => 'network',   'tag' => 'Monthly',            'when' => 'Last Friday',        'title' => 'Networking Dinner',          'desc' => 'A long table, good food, introductions that go somewhere.', 'img' => 'events/networking-dinner.jpg'],
      ['cat' => 'network',   'tag' => 'Monthly',            'when' => 'Saturday mornings',  'title' => 'Coffee & Brunch',            'desc' => 'Low-key, no agenda. Good people, better conversation.', 'img' => 'events/coffee-brunch.jpg'],
      ['cat' => 'growth',    'tag' => 'Quarterly',          'when' => 'By invitation',      'title' => 'Founder Roundtable',         'desc' => 'Closed-door rooms where leaders trade what works.', 'img' => 'events/founder-roundtable.jpg'],
      ['cat' => 'growth',    'tag' => 'Quarterly',          'when' => 'Rotating venues',    'title' => 'Development Sessions',        'desc' => 'Masterclasses and leadership talks to keep you sharp.', 'img' => 'events/development.jpg'],
      ['cat' => 'family',    'tag' => 'Twice a year',       'when' => 'Weekend afternoons', 'title' => 'Family Picnics',             'desc' => 'Bring the kids and the partner. Everyone you love.', 'img' => 'events/family-picnic.jpg'],
      ['cat' => 'family',    'tag' => 'Twice a year',       'when' => 'Seasonal',           'title' => 'Cultural Celebrations',      'desc' => 'The music, the food, the colour. West Africa, alive in Kigali.', 'img' => 'events/cultural.jpg'],
      ['cat' => 'signature', 'tag' => 'Annual · Signature', 'when' => 'Black tie',          'title' => 'The WAPNIK Gala',            'desc' => 'Our flagship evening. The night everyone clears their calendar for.', 'img' => 'events/gala.jpg'],
      ['cat' => 'network',   'tag' => 'Ongoing',            'when' => 'Member-to-member',   'title' => 'Introductions & Referrals',  'desc' => 'A quiet word to the right person. The most valuable thing we do.', 'img' => 'events/introductions.jpg'],
    ]; @endphp

    <div data-ev-grid class="grid gap-7 sm:grid-cols-2 lg:grid-cols-3">
      @foreach ($events as $ev)
        @php $signature = $ev['cat'] === 'signature'; @endphp
        <article data-cat="{{ $ev['cat'] }}" data-reveal
          class="group flex flex-col overflow-hidden rounded-md border bg-paper transition-[transform,box-shadow] duration-500 ease-[cubic-bezier(.16,1,.3,1)] hover:-translate-y-2 hover:shadow-[0_40px_70px_-36px_rgba(12,42,31,.36)]
                 {{ $signature ? 'border-gold/60 ring-1 ring-gold/30 sm:col-span-2 lg:col-span-1' : 'border-line' }}">
          <div class="relative overflow-hidden">
            @include('partials.photo', ['src' => $ev['img'], 'alt' => $ev['title'].' — a WAPNIK gathering in Kigali', 'ratio' => 'aspect-[3/2]', 'class' => 'transition-transform duration-[1.4s] ease-[cubic-bezier(.16,1,.3,1)] group-hover:scale-[1.07]'])
            <span class="absolute left-4 top-4 rounded-full border border-gold/40 bg-emerald-deep/80 px-3 py-1.5 text-[0.64rem] font-semibold uppercase tracking-[0.14em] text-gold-light backdrop-blur-sm">{{ $ev['tag'] }}</span>
          </div>
          <div class="flex flex-1 flex-col p-7">
            <div class="text-[0.7rem] font-semibold uppercase tracking-[0.14em] text-gold">{{ $ev['when'] }}</div>
            <h2 class="mt-2.5 font-display text-xl font-normal text-emerald">{{ $ev['title'] }}</h2>
            <p class="mt-2.5 text-[0.92rem] font-light text-ink-soft">{{ $ev['desc'] }}</p>
            <div class="mt-auto flex items-center gap-2 pt-5 text-[0.72rem] font-semibold uppercase tracking-[0.12em] text-gold">
              Members only
              <span class="transition-transform duration-300 group-hover:translate-x-1.5">&rarr;</span>
            </div>
          </div>
        </article>
      @endforeach
    </div>

    {{-- shown by JS only when a filter leaves no results --}}
    <p data-ev-empty hidden class="mt-16 text-center font-display text-xl font-light italic text-faint">Nothing in this room right now. Try another.</p>
  </div>
</section>

{{-- RHYTHM / CADENCE — distinct layout: three light cadence cards + one
     drenched signature panel. Different family from the events grid. --}}
<section class="bg-cream-2 py-[13vh]">
  <div class="mx-auto max-w-[1240px] px-6 md:px-10">
    <div class="max-w-[640px]">
      <span data-reveal class="text-[0.7rem] font-medium uppercase tracking-[0.28em] text-gold">Our annual rhythm</span>
      <h2 data-reveal class="mt-5 font-display text-[clamp(2rem,4.5vw,3.2rem)] font-light leading-[1.04] tracking-[-0.02em]">Show up as life allows.</h2>
      <p data-reveal class="mt-5 font-light text-ink-soft">Always something on. No pressure. A standing invitation.</p>
    </div>

    <div class="mt-14 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
      @php $cadences = [
        ['Every month', ['Networking dinner', 'Coffee meetup']],
        ['Every quarter', ['Founder roundtable', 'Professional development']],
        ['Twice a year', ['Family picnic', 'Cultural celebration']],
      ]; @endphp
      @foreach ($cadences as $c)
        <div data-reveal class="rounded-md border border-line bg-paper p-8">
          <div class="text-[0.68rem] font-bold uppercase tracking-[0.18em] text-gold">{{ $c[0] }}</div>
          <ul class="mt-5 flex flex-col gap-3.5">
            @foreach ($c[1] as $item)
              <li class="flex items-center gap-3 font-display text-lg font-light text-emerald">
                <span class="h-1.5 w-1.5 flex-none rounded-full bg-gold"></span>{{ $item }}
              </li>
            @endforeach
          </ul>
        </div>
      @endforeach

      <div data-reveal class="rounded-md border border-gold/25 bg-emerald p-8 text-cream">
        <div class="text-[0.68rem] font-bold uppercase tracking-[0.18em] text-gold-light">Once a year</div>
        <div class="mt-5 font-display text-2xl font-light leading-tight">The WAPNIK Gala</div>
        <p class="mt-3 text-[0.86rem] font-light text-cream/70">Our black-tie evening. The night everyone clears their calendar for.</p>
      </div>
    </div>
  </div>
</section>

@endsection
