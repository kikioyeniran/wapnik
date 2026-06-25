@php
  $links = [
    ['route' => 'home',        'label' => 'Home'],
    ['route' => 'who-we-are',  'label' => 'Who we are'],
    ['route' => 'events',      'label' => 'Events'],
  ];
@endphp

{{-- Fixed nav. Sits transparent over the dark masthead of every page,
     then becomes solid emerald on scroll (handled in app.js). --}}
<header id="site-nav" data-nav class="fixed inset-x-0 top-0 z-50 transition-[background-color,box-shadow] duration-500 ease-[cubic-bezier(.16,1,.3,1)]">
  <div class="mx-auto flex max-w-[1240px] items-center justify-between px-6 py-6 md:px-10">

    <a href="{{ route('home') }}" class="font-display text-xl font-normal tracking-[0.42em] pl-[0.42em] text-cream">WAPNIK</a>

    <nav class="hidden items-center gap-9 md:flex" aria-label="Primary">
      @foreach ($links as $link)
        <a href="{{ route($link['route']) }}"
           @if(request()->routeIs($link['route'])) aria-current="page" @endif
           class="group relative text-xs uppercase tracking-[0.16em] transition-colors duration-300
                  {{ request()->routeIs($link['route']) ? 'text-gold-light' : 'text-cream/75 hover:text-gold-light' }}">
          {{ $link['label'] }}
          <span class="absolute -bottom-1.5 left-0 h-px bg-gold-light transition-[width] duration-300 ease-[cubic-bezier(.16,1,.3,1)]
                       {{ request()->routeIs($link['route']) ? 'w-full' : 'w-0 group-hover:w-full' }}"></span>
        </a>
      @endforeach

      <a href="{{ route('apply') }}"
         class="rounded-sm bg-gold px-6 py-3 text-xs font-semibold uppercase tracking-[0.12em] text-emerald-deep
                transition-[transform,background-color] duration-300 ease-[cubic-bezier(.16,1,.3,1)]
                hover:-translate-y-0.5 hover:bg-gold-light">
        Request an invitation
      </a>
    </nav>

    {{-- mobile toggle --}}
    <button type="button" data-nav-toggle aria-expanded="false" aria-controls="mobile-nav"
            class="md:hidden text-cream" >
      <span class="sr-only">Open menu</span>
      <span class="text-xs uppercase tracking-[0.18em]">Menu</span>
    </button>
  </div>

  {{-- mobile panel --}}
  <div id="mobile-nav" data-nav-panel
       class="hidden md:hidden border-t border-gold/15 bg-emerald-deep/95 backdrop-blur-md">
    <nav class="mx-auto flex max-w-[1240px] flex-col gap-1 px-6 py-4" aria-label="Mobile">
      @foreach ($links as $link)
        <a href="{{ route($link['route']) }}"
           @if(request()->routeIs($link['route'])) aria-current="page" @endif
           class="py-3 text-sm uppercase tracking-[0.16em] {{ request()->routeIs($link['route']) ? 'text-gold-light' : 'text-cream/80' }}">
          {{ $link['label'] }}
        </a>
      @endforeach
      <a href="{{ route('apply') }}" class="mt-2 rounded-sm bg-gold px-5 py-3 text-center text-sm font-semibold uppercase tracking-[0.12em] text-emerald-deep">
        Request an invitation
      </a>
    </nav>
  </div>
</header>
