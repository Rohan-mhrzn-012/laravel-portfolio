<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Ajay Bhayadyo | Portfolio</title>
    <link rel="stylesheet" href="{{asset('css/styleportfolio.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    @include('Portfolio.layout.common.navbar')

    @yield('body')
        <script src="https://cdn.tailwindcss.com"></script>
       <script src="{{asset('js/portfolio.js')}}"></script>
</body>
</html>