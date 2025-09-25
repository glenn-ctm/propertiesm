<html>
<head>
    @stack('meta')
    <title>{{ $title ?? '' }}</title>
    @stack('css')
</head>
<body class="{{ $body_class ?? '' }}">
    @yield('body')
    @stack('script')
</body>