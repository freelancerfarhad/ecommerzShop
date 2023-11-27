<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>MFCMart</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{asset('backend/assets/plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="{{asset('backend/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <link rel="stylesheet" href="{{asset('backend/assets/dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{asset('backend/assets/css/dataTables.min.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
  <link href="{{asset('backend/assets/css/toastify.min.css')}}" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

  <script src="{{asset('backend/assets/js/axios.min.js')}}"></script>
  <script src="{{asset('backend/assets/plugins/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('backend/assets/js/toastify-js.js')}}"></script>
  <script src="{{asset('backend/assets/js/config.js')}}"></script>
  <script src="{{asset('backend/assets/js/dataTables.min.js')}}"></script>
	{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> --}}

</head>
<body class="hold-transition  sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

    <div class="wrapper">

    @yield('content')

    </div>


<script src="{{asset('backend/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('backend/assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<script src="{{asset('backend/assets/dist/js/adminlte.js')}}"></script>

<script src="{{asset('backend/assets/dist/js/pages/dashboard2.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
@yield('scripts')
<script>
  // alertify.success('Success notification message.'); 
</script>
</body>
</html>
