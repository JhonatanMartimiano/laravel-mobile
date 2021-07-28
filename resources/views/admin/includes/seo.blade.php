<title>{{ MyApp::SEO['site_name'] }} - @yield('title')</title>

<!-- METAS -->
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="author" content="{{ MyApp::SEO['author'] }}" />
<meta name="description" content="{{ MyApp::SEO['description'] }}" />
<meta name="robots" content="noindex, nofollow"/>
<meta name="theme-color" content="{{ MyApp::SEO['theme_color'] }}">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="copyright" content="{{ MyApp::SEO['copyright'] }}" />
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="cache-control"   content="no-cache" />


<!-- OG Type -->
<meta itemprop="name" content="{{ MyApp::SEO['site_name'] }}"/>
<meta itemprop="description" content="{{ MyApp::SEO['description'] }}"/>
<meta itemprop="image" content="{{ MyApp::SEO['image'] }}"/>
<meta itemprop="url" content="{{ MyApp::SEO['base'] }}"/>

<meta property="og:type" content="website" />
<meta property="og:title" content="{{ MyApp::SEO['title'] }}" />
<meta property="og:description" content="{{ MyApp::SEO['description'] }}" />
<meta property="og:image" content="{{ MyApp::SEO['image'] }}" />
<meta property="og:url" content="{{ MyApp::SEO['base'] }}" />
<meta property="og:site_name" content="{{ MyApp::SEO['site_name'] }}" />
<meta property="og:locale" content="pt_BR" />

<meta property="twitter:card" content="summary_large_image" />
<meta property="twitter:domain" content="{{ MyApp::SEO['base'] }}" />
<meta property="twitter:title" content="{{ MyApp::SEO['title'] }}" />
<meta property="twitter:description" content="{{ MyApp::SEO['description'] }}" />
<meta property="twitter:image" content="{{ MyApp::SEO['image'] }}" />
<meta property="twitter:url" content="{{ MyApp::SEO['base'] }}" />

<!-- Link -->
<link rel="canonical" href="{{ MyApp::SEO['base'] }}" />
<link rel="shortcut icon" href="{{ asset('site/images/icons/favicon.ico') }}" type="image/x-icon">
<link rel="icon" href="{{ asset('site/images/icons/favicon.ico') }}" type="image/x-icon">
