<!DOCTYPE html>
<html>
<head>
    <title >@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="icon" href="{{asset('/')}}front/images/logo/tab.png">
    <link rel="stylesheet" href="{{asset('/')}}front/css/bootstrap.css">
    <link rel="stylesheet" href="{{asset('/')}}front/css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    {{--Algolia--}}
    <link href="{{ asset("/") }}front/css/algolia.css" rel=stylesheet />

    @yield('extra-css')

</head>
<body>
    @include('front.includes.nav')
    @include('front.includes.sidebar')
    @yield('body')
    @include('front.includes.footer')
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>
    function openNav() {
        document.getElementById("mySidepanel").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("mySidepanel").style.width = "0";
    }
</script>

{{--Algolia--}}
<script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
<script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
<script src="{{ asset("/") }}front/js/algolia.js"></script>

@yield('extra-js')

</html>
