<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  @yield('title')
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
</head>

<body>
    <div class="bars">
      @include('layout.navbar')</div>
      <div class="sidebar">
      @include('layout.sidebar')</div>
      <section>
        @yield('content')
      </section>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>