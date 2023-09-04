<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Forms / Elements - NiceAdmin Bootstrap Template</title>
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
  <!-- ======= Sidebar ======= -->
  @include('layouts.silder');
  <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Company Info</h1>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Company Info Updates</h5>

              <!-- General Form Elements -->
              <form method="POST" action={{ url('/update',$edits->id) }}>
                @csrf
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Company Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="uname" value="{{ $edits->companyname }}">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="email" class="form-control" name="uemail" value="{{ $edits->email }}">
                  </div>
                </div>
                <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Mobile</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" name="umobile" value="{{ $edits->mobile }}">
                    </div>
                  </div>
                <div class="row mb-3">
                  <label for="inputAddress" class="col-sm-2 col-form-label">Address</label>
                  <div class="col-sm-10">
                    <textarea name="uaddress" id="" cols="98" rows="2">{{ $edits->address }}</textarea>
                  </div>
                </div>
                <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Logo Upload</label>
                    <div class="col-sm-10">
                      <input class="form-control" type="file" id="formFile" name="ulogo" value="{{ $edits->logo }}">
                    </div>
                  </div>
                  <div class="row mb-3">
                      <label for="inputNumber" class="col-sm-2 col-form-label">Sign Upload</label>
                      <div class="col-sm-10">
                        <input class="form-control" type="file" id="formFile" name="usign" value="{{ $edits->sign }}">
                      </div>
                    </div>
                {{-- <div class="row mb-3">
                  <label for="inputDate" class="col-sm-2 col-form-label">Date</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control" name="date">
                  </div>
                </div> --}}
                <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Bank Name</label>
                    <div class="col-sm-10">
                      <input class="form-control" type="text" id="formFile" name="ubankname" value="{{ $edits->bankname }}">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">Bank Accout Number</label>
                    <div class="col-sm-10">
                      <input class="form-control" type="number" id="formFile" name="ubankacnumber" value="{{ $edits->bankacnum }}">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">IFSC Code</label>
                    <div class="col-sm-10">
                      <input class="form-control" type="text" id="formFile" name="uifsccode" value="{{ $edits->ifsccode }}">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputNumber" class="col-sm-2 col-form-label">AC/Holder Name</label>
                    <div class="col-sm-10">
                      <input class="form-control" type="text" id="formFile" name="uacname" value="{{ $edits->acholdername }}">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="form-check">
                      <input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
                      <label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
                      <div class="invalid-feedback">You must agree before submitting.</div>
                    </div>
                  </div>
                <div class="row mb-3 text-center">

                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary btn-sm">Update Form</button>
                  </div>
                </div>
              </form><!-- End General Form Elements -->

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
