<!DOCTYPE html>
<html lang="en" class="bg-emerald-deep">
<head>
  {{-- mark JS available so reveal animations only hide content when they can run --}}
  <script>document.documentElement.classList.add('js');</script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'WAPNIK · West African Professionals Network in Kigali')</title>
  <meta name="description" content="@yield('meta_description', 'A private network of West African professionals, founders, and families in Kigali. Membership by application and invitation.')">

  {{-- Fonts: Fraunces (display) + Inter (sans), per brand source-of-truth --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,300;0,9..144,400;0,9..144,500;0,9..144,600;1,9..144,300;1,9..144,400;1,9..144,500&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">

  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-cream font-sans text-ink antialiased leading-relaxed overflow-x-hidden">

  {{-- skip link for keyboard users --}}
  <a href="#main" class="sr-only focus:not-sr-only focus:fixed focus:top-4 focus:left-4 focus:z-[60] focus:bg-gold focus:text-emerald-deep focus:px-5 focus:py-3 focus:rounded-sm focus:font-medium">Skip to content</a>

  @include('partials.navbar')

  <main id="main">
    @yield('content')
  </main>

  @include('partials.footer')

</body>
</html>
