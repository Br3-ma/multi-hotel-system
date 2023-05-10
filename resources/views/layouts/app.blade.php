<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Shamba') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('theme/vendor/chartist/css/chartist.min.css')}}">
        <link href="{{ asset('theme/vendor/jquery-nice-select/css/nice-select.css')}}" rel="stylesheet">
        <link href="{{ asset('theme/vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet">
        <!-- Style css -->
        <link href="{{ asset('theme/css/style.css')}}" rel="stylesheet">
        <!-- Scripts -->
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

        <link href="{{ asset('theme/css/main.min.css')}}" rel="stylesheet">
        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <?php include  "theme/components/preloader.php" ?>
        <div id="main-wrapper">
            <div class="nav-header">
                <a href="{{ route('dashboard')}}" class="brand-logo">

                    <img width="100" class="logo-abbr" src="{{asset('public/img/logo.png')}}">
                    <img width="98" class="brand-title" src="{{ asset('public/img/logowhite.png')}}">
                </a>
                <div class="nav-control">
                    <div class="hamburger">
                        <span class="line"></span><span class="line"></span><span class="line"></span>
                    </div>
                </div>
            </div>
                @include('layouts.sidemanager')
                @livewire('navigation-menu')
                @include('layouts.sidenav')
                <!-- Page Heading -->
                @if (isset($header))
                    {{-- <header class="bg-white shadow">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header> --}}
                @endif

                <!-- Page Content -->
                <main>
                    {{ $slot }}
                </main>

            @stack('modals')

            @livewireScripts
        </div>
    </body>

    	<!-- Required vendors -->
	<script src="{{ asset('theme/vendor/global/global.min.js')}}"></script>
	<script src="{{ asset('theme/vendor/chart_js/Chart.bundle.min.js')}}"></script>
	<script src="{{ asset('theme/vendor/jquery-nice-select/js/jquery.nice-select.min.js')}}"></script>
	<!-- Chart piety plugin files -->
	<script src="{{ asset('theme/vendor/peity/jquery.peity.min.js')}}"></script>
	<!-- Apex Chart -->
	<script src="{{ asset('theme/vendor/apexchart/apexchart.js')}}"></script>
	<script src="{{ asset('theme/vendor/bootstrap-datetimepicker/js/moment.js')}}"></script>
	<script src="{{ asset('theme/vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js')}}"></script>
	<!-- Dashboard 1 -->
	<script src="{{ asset('theme/js/dashboard/dashboard-1.js')}}"></script>
	<script src="{{ asset('theme/js/custom.min.js')}}"></script>
	{{-- <script src="{{ asset('theme/js/deznav-init.js')}}"></script> --}}
	<script src="{{ asset('theme/js/demo.js')}}"></script>

    <script src="{{ asset('theme/js/main.min.js')}}"></script>
	{{-- <script src="{{ asset('theme/js/fullcalendar-init.js')}}"></script> --}}
	<script src="{{ asset('theme/js/jquery.nice-select.min.js')}}"></script>

	<script>
		$(function() {
			$('#datetimepicker').datetimepicker({
				inline: true,
			});
		});

		$(document).ready(function() {
			$(".booking-calender .fa.fa-clock-o").removeClass(this);
			$(".booking-calender .fa.fa-clock-o").addClass('fa-clock');
		});
    
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // $('#submitting').hide();

        // $("#datepicker").datepicker({
        //     iconsLibrary: "fontawesome",
        //     icons: {
        //     rightIcon: '<span class="fa fa-caret-down"></span>',
        //     },
        // });

        // $("#datepicsker2").datepicker({
        //     iconsLibrary: "fontawesome",
        //     icons: {
        //     rightIcon: '<span class="fa fa-caret-down"></span>',
        //     },
        // });
        // // Initialize datepicker
        // $("#pickdate").datepicker({
        //     dateFormat: "dd/mm/yy", // Format of the displayed date
        //     showButtonPanel: true, // Show a button panel with today and close buttons
        //     changeMonth: true, // Allow changing the month
        //     changeYear: true, // Allow changing the year
        //     yearRange: "1900:2030" // Set the range of selectable years
        // });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('public/js/toastr.js')}}"></script>
<script src="{{ asset('public/js/booking.js')}}"></script>
<script src="{{ asset('public/js/email.js')}}"></script>
</html>
