<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
<!-- Font Awesome -->
{{-- <link href="{{ asset('assets/fontawesome/css/all.css') }}" rel="stylesheet">
<link rel="shortcut icon" href="{{ asset('pkclaim/images/logo150.ico') }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="{{ asset('pkclaim/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
<link href="{{ asset('pkclaim/libs/spectrum-colorpicker2/spectrum.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('pkclaim/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet">
<!-- jquery.vectormap css -->
<link href="{{ asset('pkclaim/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css') }}"
    rel="stylesheet" type="text/css" />
<!-- DataTables -->
<link href="{{ asset('pkclaim/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
    type="text/css" />
<link href="{{ asset('pkclaim/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
    type="text/css" />
<link href="{{ asset('pkclaim/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css') }}" rel="stylesheet"
    type="text/css" />
<!-- Responsive datatable examples -->
<link href="{{ asset('pkclaim/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
    rel="stylesheet" type="text/css" />
<!-- Bootstrap Css -->
<link href="{{ asset('pkclaim/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="{{ asset('pkclaim/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="{{ asset('pkclaim/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" /> --}}

<!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    {{-- <link href="{{asset('assets/select2.min.css')}}" rel="stylesheet" /> --}}
    {{-- <script src="{{asset('assets/select2.min.js')}}"></script> --}}

    {{-- <link href="{{asset('dist/css/select2.min.css') }}" rel="stylesheet" />
    <script src="{{asset('dist/js/select2.min.js') }}"></script> --}}
      <!-- select2 -->
      <link rel="stylesheet" href="{{asset('asset/js/plugins/select2/css/select2.min.css')}}">
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

       

</head>
<style>
     body{
        background:
            /* url(/pkbackoffice/public/images/bg2.jpg); */
            /* -webkit-background-size: cover; */
        background-repeat: no-repeat;
		background-attachment: fixed;
		/* background-size: cover; */
        background-size: 100% 100%;
        font-family: Arial, Helvetica, sans-serif;
        }
        .input_new{
        /* border-radius: 2em 2em 2em 2em; */
        box-shadow: 0 0 15px rgb(124, 225, 250);
        /* border-color: #0583cc */
        border:solid 1px #0583cc;
    }
    .card_prs_2b{
        border-radius: 0em 0em 2em 2em;
        box-shadow: 0 0 15px rgb(124, 225, 250);
        /* border-color: #0583cc */
        border:solid 1px #0583cc;
    }
    .card_prs_4{
        border-radius: 2em 2em 2em 2em;
        box-shadow: 0 0 15px rgb(124, 225, 250);
        /* border-color: #0583cc */
        border:solid 1px #0583cc;
    }
    .prscheckbox{         
        width: 20px;
        height: 20px;       
        /* border-radius: 2em 2em 2em 2em; */
        border: 10px solid #0583cc;
        /* color: teal; */
        /* border-color: teal; */
        box-shadow: 0 0 10px #0583cc;
        /* box-shadow: 0 0 10px teal; */
    }
    .dcheckbox{         
        width: 25px;
        height: 25px;       
        /* border-radius: 2em 2em 2em 2em; */
        border: 2px solid #0583cc;
        /* color: teal; */
        /* border-color: teal; */
        box-shadow: 0 0 5px #0583cc;
        /* box-shadow: 0 0 10px teal; */
    }
    .d12font{
        font-size: 12px;
    }
    .d13font{
        font-size: 13px;
    }
    .d14font{
        font-size: 14px;
    } 
</style>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('admin_main') }}">
                    {{ config('app.name', 'คลีนิก') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                              {{-- <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{URL('admin_main')}}">Home</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="{{URL('onestop_service')}}">One Stop Service</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="{{URL('patient')}}">ทะเบียนคนไข้</a>
                              </li> --}}
                              
                            </ul>
                          </div>

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            {{-- @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif --}}
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->fname }}  {{ Auth::user()->lname }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>


    <!-- JAVASCRIPT -->
  <script src="{{ asset('pkclaim/libs/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('pkclaim/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
   
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
<!-- select2 -->
<script src="{{ asset('js/select2.min.js') }}"></script>
{{-- <link rel="stylesheet" href="{{asset('dist/js/plugins/select2/css/select2.min.css')}}"> --}}
 
@yield('footer')

</body>
</html>
