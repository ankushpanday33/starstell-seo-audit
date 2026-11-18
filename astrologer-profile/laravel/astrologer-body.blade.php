{{--
  Visible page components for one astrologer profile. Everything the schema
  claims (rating, price, languages, FAQ) must appear here as real text.
  Put in resources/views/partials/astrologer-body.blade.php.
--}}
<main class="astrologer-profile">

  <nav aria-label="Breadcrumb">
    <ol class="breadcrumb">
      <li><a href="/">Home</a></li>
      <li><a href="/talk-to-astrologer">Talk to Astrologer</a></li>
      <li aria-current="page">{{ $astrologer['name'] }}</li>
    </ol>
  </nav>

  {{-- 1. Hero: one H1 with name and main speciality --}}
  <header class="profile-hero">
    <img src="{{ $astrologer['photo'] }}" alt="{{ $astrologer['name'] }}, astrologer on StarsTell" width="240" height="240" fetchpriority="high">
    <div>
      <h1>{{ $astrologer['name'] }}: Online {{ $astrologer['specialities'][0] ?? 'Astrology' }} Astrologer</h1>
      <p class="tagline">{{ $astrologer['experience_years'] }} years of experience | {{ implode(', ', $astrologer['languages']) }}</p>
      <p class="price">&#8377;{{ $astrologer['price_per_min'] }} per minute</p>
      <a class="btn" href="/talk-to-astrologer?astrologer={{ $astrologer['slug'] }}">Talk to {{ $astrologer['name'] }}</a>
    </div>
  </header>

  {{-- 2. Fact table: answers "who, what, how much" in one place --}}
  <section aria-labelledby="facts">
    <h2 id="facts">Quick facts</h2>
    <dl>
      <dt>Specialities</dt><dd>{{ implode(', ', $astrologer['specialities']) }}</dd>
      <dt>Languages</dt><dd>{{ implode(', ', $astrologer['languages']) }}</dd>
      <dt>Experience</dt><dd>{{ $astrologer['experience_years'] }} years</dd>
      <dt>Consultation modes</dt><dd>Chat, call</dd>
      <dt>Price</dt><dd>&#8377;{{ $astrologer['price_per_min'] }} per minute</dd>
    </dl>
  </section>

  {{-- 3. About: 150 to 300 words of unique text, written per astrologer --}}
  <section aria-labelledby="about">
    <h2 id="about">About {{ $astrologer['name'] }}</h2>
    {!! $astrologer['bio_html'] !!}
  </section>

  {{-- 4. Credentials: E-E-A-T. Show only what StarsTell has verified --}}
  @if(!empty($astrologer['credentials']))
  <section aria-labelledby="creds">
    <h2 id="creds">Qualifications and verification</h2>
    <ul>@foreach($astrologer['credentials'] as $c)<li>{{ $c }}</li>@endforeach</ul>
  </section>
  @endif

  {{-- 5. Topics the astrologer helps with: internal links to service pages --}}
  <section aria-labelledby="help">
    <h2 id="help">What you can ask {{ $astrologer['name'] }}</h2>
    <ul>
      @foreach($astrologer['topics'] as $t)
        <li><a href="{{ $t['url'] }}">{{ $t['label'] }}</a></li>
      @endforeach
    </ul>
  </section>

  {{-- 6. Reviews: render the same reviews that go into the schema --}}
  <section aria-labelledby="reviews">
    <h2 id="reviews">Ratings and reviews</h2>
    @if(($astrologer['rating_count'] ?? 0) > 0)
      <p><strong>{{ $astrologer['rating_value'] }}</strong> out of 5 from {{ $astrologer['rating_count'] }} reviews</p>
      @foreach($reviews as $r)
        <article>
          <p>{{ $r['text'] }}</p>
          <footer>{{ $r['first_name'] }} | <time datetime="{{ $r['date'] }}">{{ $r['date'] }}</time></footer>
        </article>
      @endforeach
    @else
      <p>No reviews yet. Be the first to share your experience after a consultation.</p>
    @endif
  </section>

  {{-- 7. FAQ: the same Q and A pairs that go into the FAQPage schema --}}
  @if(!empty($faqs))
  <section aria-labelledby="faq">
    <h2 id="faq">Frequently asked questions</h2>
    @foreach($faqs as $f)
      <details><summary>{{ $f['q'] }}</summary><p>{{ $f['a'] }}</p></details>
    @endforeach
  </section>
  @endif

  {{-- 8. Related astrologers: crawlable links, 6 to 8 items --}}
  <section aria-labelledby="related">
    <h2 id="related">Similar astrologers</h2>
    <ul>
      @foreach($related as $r)
        <li><a href="/best-astrologer/{{ $r['slug'] }}">{{ $r['name'] }}</a> ({{ $r['specialities'][0] ?? '' }})</li>
      @endforeach
    </ul>
  </section>

  {{-- 9. Disclaimer: expected for advice-style content --}}
  <p class="disclaimer">Astrology is guidance based on belief and tradition. It is not a substitute for medical, legal or financial advice.</p>
</main>
