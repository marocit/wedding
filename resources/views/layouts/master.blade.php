<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <!-- Piwik -->
    <script type="text/javascript">
      var _paq = _paq || [];
      /* tracker methods like "setCustomDimension" should be called before "trackPageView" */
      _paq.push(['trackPageView']);
      _paq.push(['enableLinkTracking']);
      (function() {
        var u="//piwik.marocit.de/";
        _paq.push(['setTrackerUrl', u+'piwik.php']);
        _paq.push(['setSiteId', '5']);
        var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
        g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
      })();
    </script>
<!-- End Piwik Code -->
  </head>
  <body>

  <nav class="navbar has-shadow">
    <div class="navbar-brand">
      <div class="navbar-item">
      <a href="{{url('/')}}">
        <img src="{{asset('images/Logo.svg')}}" alt="Bulma: a modern CSS framework based on Flexbox" width="200" height="28">
      </a>
      </div>
      <div class="navbar-burger burger" data-target="navMenu">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
    <div class="navbar-menu" id="navMenu">
        <div class="navbar-start">
          <a href="{{route('home')}}" class="{{Request::is('/') ? "is-active" : ""}} navbar-item is-tab"><span class="icon"><i class="m-r-5 fa fa-fw fa-map-marker"></i></span> Fundort Markieren</a>
          <a href="{{route('map')}}" class="{{Request::is('map') ? "is-active" : ""}} navbar-item is-tab"><span class="icon"><i class="m-r-5 fa fa-fw fa-map-pin"></i></span>Gefundene Ballons</a>
        </div>
        <div class="navbar-end">
        </div>
    </div>


  </nav>
  <div id="app">
    @yield('content')
  </div>

<script src="{{ asset('js/app.js') }}"></script>
<script defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCgpnnyYJWfI52yozhc4DeQsjwIOy0yBs4&libraries=places&callback=initAutocomplete">
</script>

</body>
</html>
