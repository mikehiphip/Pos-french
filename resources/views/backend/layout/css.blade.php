<base href="{{ url('/th') }}">
<meta name="csrf-token" content="{{ csrf_token() }}" />
<meta charset="utf-8">
<link href="{{asset("backend/dist/images/logo.svg")}}" rel="shortcut icon">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Backend System | ORANGE TECHNOLOGY SOLUTION V.1">
<meta name="keywords" content="Orange Technology, Template Orange, web app">
<meta name="author" content="Mike">
<title>Backend System | ORANGE TECHNOLOGY SOLUTION V.1</title>
<link rel="stylesheet" href="{{asset("backend/dist/css/app.css")}}" />
<link rel="stylesheet" type="text/css" href="{{ asset('backend/libs/toastr/toastr.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('backend/libs/fontawesome/icons.min.css')}}">
<!-- Sweet Alert-->
<link href="{{ asset('backend/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
<style>
.swal2-container {
  z-index: 99999 !important;
}
</style>