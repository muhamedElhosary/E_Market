<!DOCTYPE html>
<html lang="en" class="form-screen">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>

  <!-- Tailwind is included -->
  <link rel="stylesheet" href="dist/css/main.css?v=1628755089081">

  <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png"/>
  <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png"/>
  <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png"/>
  <link rel="mask-icon" href="safari-pinned-tab.svg" color="#00b4b6"/>

  <meta name="description" content="Admin One - free Tailwind dashboard">

  <meta property="og:url" content="https://justboil.github.io/admin-one-tailwind/">
  <meta property="og:site_name" content="JustBoil.me">
  <meta property="og:title" content="Admin One HTML">
  <meta property="og:description" content="Admin One - free Tailwind dashboard">
  <meta property="og:image" content="https://justboil.me/images/one-tailwind/repository-preview-hi-res.png">
  <meta property="og:image:type" content="image/png">
  <meta property="og:image:width" content="1920">
  <meta property="og:image:height" content="960">

  <meta property="twitter:card" content="summary_large_image">
  <meta property="twitter:title" content="Admin One HTML">
  <meta property="twitter:description" content="Admin One - free Tailwind dashboard">
  <meta property="twitter:image:src" content="https://justboil.me/images/one-tailwind/repository-preview-hi-res.png">
  <meta property="twitter:image:width" content="1920">
  <meta property="twitter:image:height" content="960">

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-130795909-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-130795909-1');
  </script>

</head>
<body>

<div id="app">
  <section class="section main-section">
    <div class="card">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-lock"></i></span>
          Admin Login
        </p>
      </header>
      <div class="card-content">
        <form method="POST" action="{{ route('adminlogin') }}">
          @csrf

          <!-- Username Field -->
          <div class="field spaced">
            <label class="label">Username</label>
            <div class="control icons-left">
              <input class="input @error('username') is-danger @enderror" type="text" id="username" name="username" value="" placeholder="user@example.com" autocomplete="username">
              <span class="icon is-small left"><i class="mdi mdi-account"></i></span>
              @error('username')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            <p class="help">
              Please enter username
            </p>
          </div>

          <!-- Password Field -->
          <div class="field spaced">
            <label class="label">Password</label>
            <p class="control icons-left">
              <input class="input @error('password') is-danger @enderror" type="password" id="password" name="password" placeholder="Password" autocomplete="current-password">
              <span class="icon is-small left"><i class="mdi mdi-asterisk"></i></span>
              @error('password')
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </p>
            <p class="help">
              Please enter your password
            </p>
          </div>
          <hr>

          <div class="field grouped">
            <div class="control">
              <button type="submit" class="button blue">
                Login
              </button>
            </div>
            <div class="control">
              <a href="/" class="button">
                Back
              </a>
            </div>
          </div>

          @if ($errors->any())
            <div class="notification is-danger">
              <button class="delete"></button>
              Invalid username or password.
            </div>
          @endif
        </form>
      </div>
    </div>
  </section>
</div>

<!-- Scripts below are for demo only -->
<script type="text/javascript" src="js/main.min.js?v=1628755089081"></script>

<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f.fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '658339141622648');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=658339141622648&ev=PageView&noscript=1"/></noscript>

<!-- Icons below are for demo only. Feel free to use any icon pack. Docs: https://bulma.io/documentation/elements/icon/ -->
<link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">

</body>
</html>
