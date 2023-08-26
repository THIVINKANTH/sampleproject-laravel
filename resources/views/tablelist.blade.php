<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Tables / Data - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="public\img\favicon.png" rel="icon">
  <link href="public\img\apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('resources/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('resources/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('resources/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('resources/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ asset('resources/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ asset('resources/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('resources/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('resources/assets/css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Jul 27 2023 with Bootstrap v5.3.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  @include('layouts.header');
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  @include('layouts.silder');
  <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Tables</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <div class="row justify-content-center" style="font-size:30px; color: purple;font-style: italic">
        {{ session('message') }}
    </div>
    <section class="section">
      <div class="row" style="width: 1500px">
        <div class="col-xl">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Datatables</h5>

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Company Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Address</th>
                    <th scope="col">Logo</th>
                    <th scope="col">Sign</th>
                    <th scope="col">Bank Name</th>
                    <th scope="col">Bank Account No</th>
                    <th scope="col">IFSC Code</th>
                    <th scope="col">AC/Holder Name</th>
                    <th scope="col">Action</th>

                  </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($list as $lists )
                       <tr>
                        <td>{{ $i }}</td>
                        <td>{{ $lists->companyname }}</td>
                        <td>{{ $lists->email }}</td>
                        <td>{{ $lists->mobile }}</td>
                        <td>{{ $lists->address }}</td>
                        <td>{{ $lists->logo }}</td>
                        <td>{{ $lists->sign }}</td>
                        <td>{{ $lists->bankname }}</td>
                        <td>{{ $lists->bankacnum }}</td>
                        <td>{{ $lists->ifsccode }}</td>
                        <td>{{ $lists->acholdername }}</td>
                        <td>
                            <a href="update/{{ $lists->id }}" type="button" class="btn btn-warning">Edit</a>
                            <a href="delete/{{ $lists->id }}" type="button" class="btn btn-danger">Delete</a>
                        </td>
                        </tr>
                        @php
                            $i++;
                        @endphp
                    @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('layouts.footer');
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('resources/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('resources/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('resources/assets/vendor/chart.js/chart.umd.js') }}"></script>
  <script src="{{ asset('resources/assets/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('resources/assets/vendor/quill/quill.min.js') }}"></script>
  <script src="{{ asset('resources/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('resources/assets/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('resources/assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('resources/assets/js/main.js') }}"></script>

</body>

</html>
