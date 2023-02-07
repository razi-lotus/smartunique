<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Smart Unique Int</title>

    <link href="{{ asset('img/stock-logo.png') }}" rel="icon">
    <link href="{{ asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/simple-datatables/style.css') }}" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.36.3/apexcharts.min.js" integrity="sha512-sa449wQ9TM6SvZV7TK7Zx/SjVR6bc7lR8tRz1Ar4/R6X2jOLaFln/9C+6Ak2OkAKZ/xBAKJ94dQMeYa0JT1RLg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Template Main CSS File -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>
<body>
    <div>
        @yield('content')
    </div>
    <script src="{{ asset('js/jquery.js') }}"></script>
    {{-- <script src="{{ asset('vendor/apexcharts/apexcharts.min.js') }}"></script> --}}
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/chart.js/chart.min.js') }}"></script>
    <script src="{{ asset('vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('vendor/tinymce/tinymce.min.js') }}"></script>
    {{-- <script src="{{ asset('vendor/php-email-form/validate.js') }}"></script> --}}
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('dataTable/js/jquery.dataTables.min.js') }}"></script>
    <link href="{{ asset('dataTable/css/jquery.dataTables.min.css') }}" rel="stylesheet">

    <!-- Template Main JS File -->
    <script>
        $(document).ready(function () {
        $("#myTable").dataTable();
        });

        setInterval(() => {
            $.ajax({
                url:'{{ url("admin/del-account-24hrs-later") }}',
                type:'get',
                // data:{
                //     _token  : "{{ csrf_token() }}",
                //     user_id : user_id,
                //     amount  : amount
                // },
                success:function(data){
                    console.log(data,'rssss');
                }
            });
        }, 60 * 1000);

    </script>
    @stack('scripts')
</body>
<style>
    body {
      font-family: Arial, Helvetica, sans-serif;
    }

    .flip-card {
      background-color: transparent;
      width: 200px;
      height: 200px;
      perspective: 1000px;
    }

    .flip-card-inner {
      position: relative;
      width: 100%;
      height: 100%;
      text-align: center;
      transition: transform 0.6s;
      transform-style: preserve-3d;
      box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    }

    .flip-card:hover .flip-card-inner {
      transform: rotateY(180deg);
    }

    .flip-card-front, .flip-card-back {
      position: absolute;
      width: 100%;
      height: 100%;
      -webkit-backface-visibility: hidden;
      backface-visibility: hidden;
    }

    .flip-card-front {
      background-color: #bbb;
      color: black;
    }

    .flip-card-back {
      background-color: #2980b9;
      color: white;
      transform: rotateY(180deg);
    }
    .chip {
  display: inline-block;
  padding: 0 25px;
  height: 50px;
  font-size: 16px;
  line-height: 50px;
  border-radius: 25px;
  background-color: #f1f1f1;
}

.chip img {
  float: left;
  margin: 0 10px 0 -25px;
  height: 50px;
  width: 50px;
  border-radius: 50%;
}
    </style>

</html>
