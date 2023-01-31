<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.backsite.meta')
    <title> @yield('title') |Backsite</title>
    @stack('before-style')
    @include('includes.backsite.style')
    @stack('after-style')
</head>

<body class="vertical-layout vertical-compact-menu 2-columns fixed-navbar" data-open="click"
    data-menu="vertical-compact-menu" data-col="2-columns">

    @include('components.backsite.header')
    @include('components.backsite.sidebar')
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">

            @yield('content')
        </div>
    </div>
    @include('components.backsite.footer')
    @stack('before-script')
    @include('includes.backsite.script')
    @stack('after-script')
</body>

</html>
