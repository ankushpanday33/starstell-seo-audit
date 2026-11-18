{{--
  Put this partial in resources/views/partials/astrologer-head.blade.php
  and @include it inside <head> on the astrologer profile view.

  Expects: $astrologer (array), $reviews (array, may be empty), $faqs (array, may be empty)
--}}
@php
    $url   = 'https://starstell.com/best-astrologer/' . $astrologer['slug'];
    $title = $astrologer['name'] . ' | Online Astrologer for ' . ($astrologer['specialities'][0] ?? 'Astrology') . ' | StarsTell';
    $desc  = \Illuminate\Support\Str::limit(strip_tags($astrologer['bio'] ?? ''), 155);
    $image = str_starts_with($astrologer['photo'] ?? '', 'http')
        ? $astrologer['photo']
        : 'https://starstell.com/' . ltrim($astrologer['photo'] ?? 'assets/images/logo.png', '/');
@endphp

<title>{{ $title }}</title>
<meta name="description" content="{{ $desc }}">
<link rel="canonical" href="{{ $url }}">
<meta name="robots" content="index,follow,max-image-preview:large,max-snippet:-1">

<meta property="og:type" content="profile">
<meta property="og:site_name" content="StarsTell">
<meta property="og:title" content="{{ $title }}">
<meta property="og:description" content="{{ $desc }}">
<meta property="og:url" content="{{ $url }}">
<meta property="og:image" content="{{ $image }}">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $title }}">
<meta name="twitter:description" content="{{ $desc }}">
<meta name="twitter:image" content="{{ $image }}">

<script type="application/ld+json">
{!! json_encode(
    \App\Support\AstrologerSeo::graph($astrologer, $reviews ?? [], $faqs ?? []),
    JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_HEX_TAG | JSON_PRETTY_PRINT
) !!}
</script>
