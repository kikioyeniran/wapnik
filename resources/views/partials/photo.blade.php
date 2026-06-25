{{--
  Reusable photographic slot with one unified emerald color-grade.
  Every image on the site routes through here so the whole build reads
  as art-directed. Swap the placeholder file in public/images/ for a
  real photo later — the grade keeps it coherent automatically.

  Params (via @include('partials.photo', [...])):
    src     — path under public/images, e.g. 'events/gala.svg'
    alt     — descriptive alt text (required for meaningful images)
    ratio   — aspect-ratio utility, default 'aspect-[4/3]'
    class   — extra classes on the figure wrapper
    eager   — true to skip lazy-loading (use for the LCP hero only)
    grade   — grade strength: 'soft' | 'normal' (default) | 'rich'
--}}
@php
  $ratio = $ratio ?? 'aspect-[4/3]';
  $class = $class ?? '';
  $eager = $eager ?? false;
  $grade = $grade ?? 'normal';
  $tints = [
    'soft'   => 'bg-emerald-deep/15',
    'normal' => 'bg-emerald-deep/25',
    'rich'   => 'bg-emerald-deep/40',
  ];
  $tint = $tints[$grade] ?? $tints['normal'];
@endphp

<figure class="relative overflow-hidden bg-emerald-mid {{ $ratio }} {{ $class }}">
  <img
    src="{{ asset('images/'.$src) }}"
    alt="{{ $alt }}"
    @if($eager) fetchpriority="high" @else loading="lazy" decoding="async" @endif
    class="h-full w-full object-cover">
  {{-- unified emerald grade: a multiply tint + a base-darkening gradient --}}
  <span aria-hidden="true" class="pointer-events-none absolute inset-0 {{ $tint }} mix-blend-multiply"></span>
  <span aria-hidden="true" class="pointer-events-none absolute inset-0 bg-gradient-to-t from-emerald-deep/35 via-transparent to-emerald/5"></span>
</figure>
