<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ClinicX') }}</title>
<!-- Font Awesome -->
<link href="{{ asset('assets/fontawesome/css/all.css') }}" rel="stylesheet">
<link rel="shortcut icon" href="{{ asset('pkclaim/images/logo150.ico') }}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="{{ asset('pkclaim/libs/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
<link href="{{ asset('pkclaim/libs/spectrum-colorpicker2/spectrum.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('pkclaim/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet">
 
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

    <link href="{{ asset('css/css53.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" /> 
    <script src="{{ asset('js/jss.min.js') }}"></script>
<!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
 
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="{{asset('dist/css/select2.min.css') }}" rel="stylesheet" />
    

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
        border-radius: 0em 0em 1em 1em;
        box-shadow: 0 0 15px rgb(124, 225, 250);
        /* border-color: #0583cc */
        border:solid 1px #0583cc;
    }
    .card_prs_4{
        border-radius: 1em 1em 1em 1em;
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
                              <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{URL('admin_main')}}">Home</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="{{URL('onestop_service')}}">One Stop Service</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="{{URL('patient')}}">ทะเบียนคนไข้</a>
                              </li>
                              
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


                            {{-- <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                  Dropdown
                                </a>
                                <ul class="dropdown-menu">
                                  <li><a class="dropdown-item" href="#">Action</a></li>
                                  <li><a class="dropdown-item" href="#">Another action</a></li>
                                  <li><hr class="dropdown-divider"></li>
                                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                              </li> --}}


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
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  <script src="{{ asset('pkclaim/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script> 
  <script src="{{ asset('pkclaim/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
  <script src="{{ asset('pkclaim/libs/spectrum-colorpicker2/spectrum.min.js') }}"></script>
  <script src="{{ asset('pkclaim/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>
  <script src="{{ asset('pkclaim/libs/admin-resources/bootstrap-filestyle/bootstrap-filestyle.min.js') }}"></script>
  <script src="{{ asset('pkclaim/libs/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script>
  <script src="{{ asset('pkclaim/libs/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.th.min.js"
  integrity="sha512-cp+S0Bkyv7xKBSbmjJR0K7va0cor7vHYhETzm2Jy//ZTQDUvugH/byC4eWuTii9o5HN9msulx2zqhEXWau20Dg=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 
   <!-- Required datatable js -->
   <script src="{{ asset('pkclaim/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
   <script src="{{ asset('pkclaim/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
   <!-- Buttons examples -->
   <script src="{{ asset('pkclaim/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
   <script src="{{ asset('pkclaim/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
   <script src="{{ asset('pkclaim/libs/jszip/jszip.min.js') }}"></script>
   <script src="{{ asset('pkclaim/libs/pdfmake/build/pdfmake.min.js') }}"></script>
   <script src="{{ asset('pkclaim/libs/pdfmake/build/vfs_fonts.js') }}"></script>
   <script src="{{ asset('pkclaim/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
   <script src="{{ asset('pkclaim/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
   <script src="{{ asset('pkclaim/libs/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>
   <script src="{{ asset('pkclaim/libs/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
   <script src="{{ asset('pkclaim/libs/datatables.net-select/js/dataTables.select.min.js') }}"></script>
   <!-- Responsive examples -->
   <script src="{{ asset('pkclaim/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
   <script src="{{ asset('pkclaim/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
   <!-- Datatable init js -->
   <script src="{{ asset('pkclaim/js/pages/datatables.init.js') }}"></script>
   <script src="{{ asset('pkclaim/libs/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js') }}"></script>
   <script src="{{ asset('pkclaim/libs/twitter-bootstrap-wizard/prettify.js') }}"></script>
   <script src="{{ asset('pkclaim/js/pages/form-wizard.init.js') }}"></script>
 
  <!-- App js -->
  {{-- <script src="{{ asset('pkclaim/js/app.js') }}"></script> --}}
  <script src="{{ asset('assets/jquery-tabledit/jquery.tabledit.min.js') }}"></script>
  <script src="{{ asset('js/select2.min.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="{{ asset('js/bootstrap-timepicker.js') }}"></script>

  @yield('footer')

  <script type="text/javascript">
    $(document).ready(function() {
       
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#InsertData').click(function() {
                var hn               = $('#HN').val();
                var fname            = $('#FNAME').val();
                var lname            = $('#LNAME').val();
                var cid              = $('#CID').val();
                var height           = $('#HEIGHT').val();
                var weight           = $('#WEIGHT').val();
                var pressure         = $('#PRESSURE').val();
                var pulse            = $('#PULSE').val();
                var datepicker       = $('#datepicker').val();
                var vsttime          = $('#VSTTIME').val();
                var intolerance      = $('#INTOLERANCE').val();
                var congenital       = $('#CONGENITAL').val();
                var cc               = $('#CC').val();
                
                // alert(hn);

                Swal.fire({ position: "top-end",
                        title: 'ต้องการบันทึกข้อมูลใช่ไหม ?',
                        text: "You Warn Save Data!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, Save it!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                $("#overlay").fadeIn(300);　
                                $("#spinner").show(); //Load button clicked show spinner

                                $.ajax({
                                    url: "{{ route('one.onestop_service_save') }}",
                                    type: "POST",
                                    dataType: 'json',
                                    data: {hn,fname,lname,cid,height,weight,pressure,pulse,datepicker,vsttime,intolerance,congenital,cc},
                                    success: function(data) {
                                        if (data.status == 200) {
                                            Swal.fire({ position: "top-end",
                                                title: 'บันทึกข้อมูลสำเร็จ',
                                                text: "You Save data success",
                                                icon: 'success',
                                                showCancelButton: false,
                                                confirmButtonColor: '#06D177',
                                                confirmButtonText: 'เรียบร้อย'
                                            }).then((result) => {
                                                if (result
                                                    .isConfirmed) {
                                                    console.log(
                                                        data);
                                                    window.location.reload();
                                                    // window.location="{{url('wh_sub_main_rp')}}";
                                                    $('#spinner').hide();//Request is complete so hide spinner
                                                        setTimeout(function(){
                                                            $("#overlay").fadeOut(300);
                                                        },500);
                                                }
                                            })
                                        } else {

                                        }
                                    },
                                });

                            }
                })
        });
        

    });


</script>
</body>
</html>
