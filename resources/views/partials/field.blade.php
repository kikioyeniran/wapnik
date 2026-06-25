{{--
  Accessible form field: label ABOVE control, helper/error slot BELOW.
  Used on the apply form. Params:
    label, name, type (default 'text'), as ('input'|'select'|'textarea'),
    required (bool), placeholder, optional (string), options (array for select)
--}}
@php
  $as = $as ?? 'input';
  $type = $type ?? 'text';
  $required = $required ?? false;
  $placeholder = $placeholder ?? '';
  $optional = $optional ?? null;
  $options = $options ?? [];
  $base = 'w-full bg-transparent border-0 border-b border-cream/20 text-cream font-sans text-lg font-light py-3 transition-colors duration-500 placeholder:text-cream/30 focus:outline-none focus:border-gold';
@endphp

<div class="mb-9">
  <label for="{{ $name }}" class="mb-4 block text-[0.68rem] uppercase tracking-[0.18em] text-cream/55">
    {{ $label }}@if($optional) <span class="tracking-[0.1em] text-faint">{{ $optional }}</span>@endif
  </label>

  @if ($as === 'select')
    <select id="{{ $name }}" name="{{ $name }}" @if($required) required aria-required="true" @endif
            class="{{ $base }} cursor-pointer appearance-none"
            style="background-image:url(&quot;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath d='M1 1l5 5 5-5' stroke='%239aa39c' fill='none' stroke-width='1.2'/%3E%3C/svg%3E&quot;);background-repeat:no-repeat;background-position:right 4px center;">
      <option value="">Select</option>
      @foreach ($options as $opt)
        <option value="{{ $opt }}" class="bg-emerald-deep text-cream">{{ $opt }}</option>
      @endforeach
    </select>
  @elseif ($as === 'textarea')
    <textarea id="{{ $name }}" name="{{ $name }}" rows="2" @if($required) required aria-required="true" @endif
              placeholder="{{ $placeholder }}" class="{{ $base }} min-h-[60px] resize-none leading-relaxed"></textarea>
  @else
    <input id="{{ $name }}" name="{{ $name }}" type="{{ $type }}" @if($required) required aria-required="true" @endif
           placeholder="{{ $placeholder }}" class="{{ $base }}">
  @endif
</div>
