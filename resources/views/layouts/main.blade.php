<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GCLIT | LMS</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    
    @include('plugins.style')
    @vite('resources/css/app.css')

    @yield('style')

</head>

<body class="hold-transition sidebar-mini">

    <div class="wrapper">

        @include('layouts.navbar')
        @include('layouts.sidebar')



        <div class="content-wrapper">

            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>{{ $contentHeader ?? '' }}</h1>
                        </div>
                        @isset($breadcrumb)
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="{{ url($breadcrumbLink) }}">{{ $breadcrumb }}</a>
                                    </li>
                                    <li class="breadcrumb-item active">{{ $contentHeader }}</li>
                                </ol>
                            </div>
                        @endisset
                    </div>
                </div>
            </section>
            <section class="content">
                @yield('content')
            </section>

        </div>

        @include('layouts.footer')

        <script src="{{ asset('/plugins/jquery/jquery.min.js') }}"></script>
        {{-- <script src="https://code.jquery.com/jquery-3.6.1.min.js"
            integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script> --}}
        {{-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script> --}}
        @vite('resources/js/app.js')
        @include('plugins.script')
        @yield('script')
    </div>
</body>

</html>
