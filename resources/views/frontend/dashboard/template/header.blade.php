<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @if($page_name != null)
    <title>Inove Sitemas - {{$page_name}}</title>
    @else
    <title>Inove Sitemas - Admin</title>
    @endif

    <link rel="shortcut icon" href="{{asset('images/inovdashicon.png')}}" type="image/x-icon">
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <!-- Bootstrap IcON -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{asset('assets/compiled/css/iconly.css')}}">
    <script src="https://cdn.tailwindcss.com"></script>

  </head>
<body class="flex h-screen bg-gray-100">
@vite(['resources/css/app.css','resources/css/all.css'])
{{-- 
  @include('sweetalert::alert')
  --}}
