
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title', config('app.name'))</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('ahub/images/favicon.ico')}}">

    <!-- Icons css  (Mandatory in All Pages) -->
    <link href="{{asset('ahub/css/icons.min.css')}}" rel="stylesheet" type="text/css">

    <!-- App css  (Mandatory in All Pages) -->
    <link href="{{asset('ahub/css/app.min.css')}}" rel="stylesheet" type="text/css">
</head>

<body>

    <div class="wrapper">
        @include('partials.sidenav')

        @include('partials.navbar')


        <!-- Start Page Content here -->
        <div class="page-content">

            <main>

                <div class="container py-6">
                    @yield('content')

                </div>

            </main>
`
        </div>
        <!-- End Page content -->

    </div>

    <!-- Plugin Js (Mandatory in All Pages) -->
    <script src="{{asset('ahub/libs/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('ahub/libs/preline/preline.js')}}"></script>
    <script src="{{asset('ahub/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('ahub/libs/lucide/umd/lucide.min.js')}}"></script>
    <script src="{{asset('ahub/libs/iconify-icon/iconify-icon.min.js')}}"></script>
    <script src="{{asset('ahub/libs/node-waves/waves.min.js')}}"></script>

    <!-- App Js (Mandatory in All Pages) -->
    <script src="{{asset('ahub/js/app.js')}}"></script>

</body>

</html>