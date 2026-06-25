@extends('layouts.app')

@section('title', 'Request an invitation · WAPNIK')
@section('meta_description', 'Request an invitation to WAPNIK. A few quiet questions, each read by the membership committee. By consideration and decision, not sign-up.')

@section('content')

{{-- APPLY — drenched emerald, the form is the page. Ambient image behind. --}}
<section class="relative overflow-hidden bg-gradient-to-b from-emerald-deep to-emerald pt-36 pb-[14vh] text-cream md:pt-40">
  {{-- INTENDED PHOTO: quiet Kigali evening, ambient, very low opacity. --}}
  <img src="{{ asset('images/apply/ambient.svg') }}" alt="" aria-hidden="true" loading="lazy"
       class="absolute inset-0 h-full w-full object-cover opacity-[0.12]">

  <div class="relative mx-auto max-w-[1240px] px-6 md:px-10">
    <div class="mx-auto max-w-[720px] text-center">
      <span class="inline-flex items-center justify-center gap-3.5 text-[0.7rem] font-medium uppercase tracking-[0.32em] text-gold-light">Request an invitation</span>
      <h1 class="mt-6 font-display text-[clamp(2.4rem,6vw,4.4rem)] font-light leading-[1.05] tracking-[-0.02em]">
        You are not signing up.<br>You are being considered.
      </h1>
      <p class="mx-auto mt-6 max-w-[48ch] font-light text-cream/65">A few quiet questions. Each read by the committee, never a bot.</p>
    </div>

    {{-- ============ MULTI-STEP FORM (front-end only; action="#") ============ --}}
    <div class="mx-auto mt-16 max-w-[720px]">

      {{-- progress rail --}}
      <div class="mb-14 flex flex-wrap justify-center gap-3.5" data-rail>
        @php $rail = ['You', 'Work', 'Intent', 'CV']; @endphp
        @foreach ($rail as $i => $label)
          <span data-rail-dot class="flex items-center gap-3.5 text-[0.64rem] uppercase tracking-[0.18em] transition-colors duration-500 {{ $i === 0 ? 'text-cream' : 'text-faint' }}">
            <span class="h-px w-7 transition-colors duration-500 {{ $i === 0 ? 'bg-gold' : 'bg-cream/20' }}" data-rail-line></span>{{ $label }}
          </span>
        @endforeach
      </div>

      <form action="#" method="post" novalidate data-apply-form>

        {{-- STEP 1 --}}
        <div class="fstep is-active" data-step="0">
          <span class="mb-9 block text-center text-[0.7rem] uppercase tracking-[0.24em] text-gold-light">Step one of four</span>
          <h2 class="text-center font-display text-[clamp(1.8rem,4vw,2.7rem)] font-light">Who are you?</h2>
          <p class="mx-auto mb-14 mt-3 max-w-[44ch] text-center font-light text-cream/55">The essentials, so we know who we're considering.</p>

          @include('partials.field', ['label' => 'Full name', 'name' => 'name', 'type' => 'text', 'required' => true, 'placeholder' => 'Your name'])
          <div class="grid gap-10 sm:grid-cols-2">
            @include('partials.field', ['label' => 'Email', 'name' => 'email', 'type' => 'email', 'required' => true, 'placeholder' => 'you@email.com'])
            @include('partials.field', ['label' => 'Phone / WhatsApp', 'name' => 'phone', 'type' => 'tel', 'required' => true, 'placeholder' => '+250…'])
          </div>
          <div class="grid gap-10 sm:grid-cols-2">
            @include('partials.field', ['label' => 'Country of origin', 'name' => 'country', 'as' => 'select', 'required' => true, 'options' => ['Nigeria','Ghana','Cameroon','Sierra Leone','Liberia','Senegal',"Côte d'Ivoire",'Benin','Togo','Guinea','The Gambia','Mali','Burkina Faso','Guinea-Bissau','Cabo Verde','Other West African nation']])
            @include('partials.field', ['label' => 'Years in Kigali', 'name' => 'years', 'as' => 'select', 'required' => true, 'options' => ['Under three months','Less than a year','One to two years','Three to five years','More than five years']])
          </div>
        </div>

        {{-- STEP 2 --}}
        <div class="fstep" data-step="1">
          <span class="mb-9 block text-center text-[0.7rem] uppercase tracking-[0.24em] text-gold-light">Step two of four</span>
          <h2 class="text-center font-display text-[clamp(1.8rem,4vw,2.7rem)] font-light">What do you do?</h2>
          <p class="mx-auto mb-14 mt-3 max-w-[44ch] text-center font-light text-cream/55">How the committee comes to know you.</p>

          @include('partials.field', ['label' => 'Current role / title', 'name' => 'role', 'type' => 'text', 'required' => true, 'placeholder' => 'e.g. Founder, Country Director, Consultant'])
          @include('partials.field', ['label' => 'Where you currently work', 'name' => 'company', 'type' => 'text', 'required' => true, 'placeholder' => 'Company or organisation'])
          <div class="grid gap-10 sm:grid-cols-2">
            @include('partials.field', ['label' => 'Industry', 'name' => 'industry', 'type' => 'text', 'required' => true, 'placeholder' => 'e.g. Fintech, Health, Development'])
            @include('partials.field', ['label' => 'Highest education', 'name' => 'education', 'as' => 'select', 'required' => true, 'options' => ['Diploma / Professional certificate',"Bachelor's degree","Master's degree",'Doctorate / PhD','Professional qualification (CA, Bar, MD…)']])
          </div>
          @include('partials.field', ['label' => 'LinkedIn', 'optional' => '(recommended)', 'name' => 'linkedin', 'type' => 'url', 'placeholder' => 'linkedin.com/in/…'])
        </div>

        {{-- STEP 3 --}}
        <div class="fstep" data-step="2">
          <span class="mb-9 block text-center text-[0.7rem] uppercase tracking-[0.24em] text-gold-light">Step three of four</span>
          <h2 class="text-center font-display text-[clamp(1.8rem,4vw,2.7rem)] font-light">Why WAPNIK?</h2>
          <p class="mx-auto mb-14 mt-3 max-w-[44ch] text-center font-light text-cream/55">In your own words. Sound like a person, not a résumé.</p>

          @include('partials.field', ['label' => 'What draws you to this network?', 'name' => 'motivation', 'as' => 'textarea', 'required' => true, 'placeholder' => 'What are you hoping to find here?'])
          @include('partials.field', ['label' => 'What would you bring to the room?', 'name' => 'contribution', 'as' => 'textarea', 'required' => true, 'placeholder' => 'The best members give before they take.'])
          @include('partials.field', ['label' => 'Were you referred?', 'optional' => '(optional)', 'name' => 'referrer', 'type' => 'text', 'placeholder' => "A member's name, if any"])
        </div>

        {{-- STEP 4 --}}
        <div class="fstep" data-step="3">
          <span class="mb-9 block text-center text-[0.7rem] uppercase tracking-[0.24em] text-gold-light">Step four of four</span>
          <h2 class="text-center font-display text-[clamp(1.8rem,4vw,2.7rem)] font-light">Your CV.</h2>
          <p class="mx-auto mb-14 mt-3 max-w-[44ch] text-center font-light text-cream/55">Held in confidence. Central to how we consider you.</p>

          <div class="mb-10">
            <label for="cv" class="block cursor-pointer rounded-sm border border-cream/20 p-9 text-center transition-colors duration-500 hover:border-gold">
              <span class="text-[0.72rem] uppercase tracking-[0.2em] text-cream/70">Attach your CV</span>
              <span class="mt-3 block text-[0.74rem] font-light text-faint">PDF or Word · up to 10MB</span>
              <input id="cv" type="file" name="cv" accept=".pdf,.doc,.docx" required class="hidden">
              <span data-cv-name class="mt-4 block text-[0.82rem] tracking-[0.04em] text-gold-light"></span>
            </label>
          </div>

          <label class="mb-5 flex cursor-pointer items-start gap-4">
            <input type="checkbox" required class="mt-1.5 h-4 w-4 flex-none accent-gold">
            <span class="text-[0.86rem] font-light leading-relaxed text-cream/60">I confirm what I have shared is true, and I am comfortable with the committee reviewing it in confidence.</span>
          </label>
          <label class="flex cursor-pointer items-start gap-4">
            <input type="checkbox" required class="mt-1.5 h-4 w-4 flex-none accent-gold">
            <span class="text-[0.86rem] font-light leading-relaxed text-cream/60">I understand membership is by consideration and decision, and that a brief conversation may follow.</span>
          </label>
        </div>

        {{-- nav --}}
        <div class="mt-14 flex items-center justify-between border-t border-cream/12 pt-9">
          <button type="button" data-back class="text-[0.72rem] uppercase tracking-[0.18em] text-faint transition-colors duration-300 hover:text-cream" style="visibility:hidden">&larr; Back</button>
          <button type="button" data-fwd class="group inline-flex items-center gap-4 border-b border-cream/30 pb-2 text-[0.76rem] font-semibold uppercase tracking-[0.18em] text-cream transition-colors duration-300 hover:border-cream">
            Continue <span class="h-px w-9 bg-current transition-[width] duration-300 group-hover:w-14"></span>
          </button>
          <button type="submit" data-send class="inline-flex items-center gap-4 rounded-sm bg-gold px-8 py-4 text-[0.76rem] font-semibold uppercase tracking-[0.18em] text-emerald-deep shadow-[0_16px_40px_-16px_rgba(154,163,156,.6)] transition-[transform,background-color] duration-300 hover:-translate-y-0.5 hover:bg-gold-light" style="display:none">
            Submit for consideration
          </button>
        </div>
      </form>

      {{-- success state (revealed by JS after submit) --}}
      <div class="done-state py-[5vh] text-center" data-done>
        <div class="mx-auto mb-10 grid h-[74px] w-[74px] place-items-center rounded-full border border-gold text-3xl text-gold">&#10003;</div>
        <h2 class="font-display text-[clamp(2rem,5vw,3.2rem)] font-light">You have been put forward.</h2>
        <p class="mx-auto mt-6 max-w-[46ch] font-light text-cream/60">The committee will consider your request with care, and reach out either way.</p>
        <p class="mx-auto mt-3 max-w-[46ch] font-light text-cream/60">We don't leave people in silence.</p>
        <div class="mt-8 text-[0.7rem] uppercase tracking-[0.2em] text-gold-light">In confidence · WAPNIK Membership Committee</div>
      </div>
    </div>
  </div>
</section>

{{-- PROCESS — what happens after you submit. Stepped, with connectors. --}}
<section class="bg-cream py-[13vh]">
  <div class="mx-auto max-w-[1240px] px-6 md:px-10">
    <div class="max-w-[640px]">
      <span class="text-[0.7rem] font-medium uppercase tracking-[0.28em] text-gold">How to join</span>
      <h2 class="mt-5 font-display text-[clamp(2rem,4.5vw,3.2rem)] font-light leading-[1.04] tracking-[-0.02em]">Four steps. No shortcuts.</h2>
      <p class="mt-5 font-light text-ink-soft">Screening is why the room feels the way it does. Here's what happens after you submit.</p>
    </div>

    <div class="mt-14 grid gap-x-8 gap-y-12 sm:grid-cols-2 lg:grid-cols-4">
      @php $steps = [
        ['01', 'You apply', 'Who you are, where you work, why WAPNIK. Your CV helps us know you.'],
        ['02', 'We consider', 'The committee reviews your background, credibility, and fit.'],
        ['03', 'A short conversation', 'A likely fit earns a brief interview. A conversation, not an interrogation.'],
        ['04', 'The decision', 'The committee decides together. A yes brings your first invitation.'],
      ]; @endphp
      @foreach ($steps as $s)
        <div class="group relative">
          <div class="grid h-14 w-14 place-items-center rounded-full border border-gold font-display text-base font-light text-gold transition-colors duration-300 group-hover:bg-gold group-hover:text-emerald-deep">{{ $s[0] }}</div>
          <h3 class="mt-6 font-display text-lg font-normal text-emerald">{{ $s[1] }}</h3>
          <p class="mt-3 text-[0.92rem] font-light text-ink-soft">{{ $s[2] }}</p>
        </div>
      @endforeach
    </div>

    <div class="mt-14 max-w-[800px] rounded-md border border-line bg-cream-2 px-8 py-7 text-[1.05rem] font-light text-ink-soft">
      <strong class="font-medium text-emerald">Why so selective?</strong> A network is only as good as its people. We're honest about fit, for your sake as much as ours.
    </div>
  </div>
</section>

{{-- FAQ — accordion of details/summary --}}
<section class="bg-cream-2 py-[13vh]">
  <div class="mx-auto max-w-[1240px] px-6 md:px-10">
    <div class="mx-auto max-w-[880px] text-center">
      <span class="text-[0.7rem] font-medium uppercase tracking-[0.28em] text-gold">Before you apply</span>
      <h2 class="mt-5 font-display text-[clamp(2rem,4.5vw,3.2rem)] font-light leading-[1.04] tracking-[-0.02em]">The questions everyone asks first.</h2>
    </div>

    <div class="mx-auto mt-12 max-w-[880px]">
      @php $faqs = [
        ['Is there a membership fee?', "Applying is free. Any contribution covers events and runs the network, and we're transparent about it before you commit. WAPNIK isn't for anyone seeking financial assistance, and it isn't a money-making scheme."],
        ['I just moved to Kigali. Is it too soon?', 'Not at all. We ask how long you\'ve been here to know your story, not to disqualify you. New arrivals are often exactly who we want. Settling in is easier with people around you.'],
        ['Do I need a referral?', "It helps, but it isn't required. Without one, your application tells us more of your story. Strong applications stand on their own."],
        ['Why do you ask for my CV and education?', 'Because consideration is genuine, not symbolic. They help the committee see your credibility and what you\'ll add. Confidential to the committee.'],
        ['How long until I hear back?', "We review on a rolling basis. You'll hear from us either way. We don't leave people guessing."],
      ]; @endphp
      @foreach ($faqs as $faq)
        <details class="group border-b border-line">
          <summary class="flex cursor-pointer list-none items-center justify-between gap-6 py-7 font-display text-xl font-normal text-emerald transition-colors duration-300 hover:text-gold [&::-webkit-details-marker]:hidden">
            {{ $faq[0] }}
            <span class="grid h-[30px] w-[30px] flex-none place-items-center rounded-full border border-gold text-gold transition-all duration-300 group-open:rotate-45 group-open:bg-gold group-open:text-paper">+</span>
          </summary>
          <p class="max-w-[720px] pb-7 font-light text-ink-soft">{{ $faq[1] }}</p>
        </details>
      @endforeach
    </div>
  </div>
</section>

@endsection
