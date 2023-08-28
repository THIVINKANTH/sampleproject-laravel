
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Tables / General - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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
      <h1>General Tables</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Tables</li>
          <li class="breadcrumb-item active">General</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <div class="row justify-content-center" style="font-size:30px; color: purple;font-style: italic">
        {{ session('message') }}
    </div>
    <section class="section">
        <div class="row" style="width: 1200px">
          <div class="col-xxl">

            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Form Invoice</h5>
                  <form action="{{ url('/updateinvoice',$edits->id) }}" method="POST">
                      @csrf
                      <div class="row">
                          <div class="col mb-3">
                              <label for="inputText" class="col-sm-10 col-form-label">Company Name</label>
                              <div class="col-sm-10">
                                <input class="form-control" type="text" id="formFile" name="ucompanyname" value="{{ $edits->invoicecompanyname }}">
                              </div>
                            </div>
                          <div class="col mb-3">
                              <label for="inputText" class="col-sm-10 col-form-label">Address</label>
                              <div class="col-sm-10">
                                <input class="form-control" type="text" id="formFile" name="uaddress" value="{{ $edits->address}}">
                              </div>
                            </div>
                            <div class="col mb-3">
                              <label for="inputNumber" class="col-sm-10 col-form-label">Contact</label>
                              <div class="col-sm-10">
                                <input class="form-control" type="text" id="formFile" name="ucontact" value="{{ $edits->contact }}">
                              </div>
                            </div>
                      </div>
                      <h5 class="card-title">Invoice Table</h5>
                      <!-- Table with stripped rows -->
                <table class="table datatable">
                  <thead>
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col">Item Name</th>
                      <th scope="col">HSN/ SAC</th>
                      <th scope="col">Quantity</th>
                      <th scope="col">Unit</th>
                      <th scope="col">Price/ unit</th>
                      <th scope="col">Amount</th>
                    </tr>
                  </thead>
                  <tbody>
                      {{-- @for ($i = 0; $i <=$listinvoice[0]->id ; $i++) --}}
                      {{-- @foreach ($listinvoice as $listin)
                     @if (($listinvoice[0]->id == $listinvoice[0]->invoiceid)==$listinvoice[0]->itemname) --}}
                     @php
                         $i = $listinvoice[0]->invoiceid;

                     @endphp


                     <tr>
                        <td>{{ $i }}</td>
                        <td><input class="form-control itemname" type="text" name="itemname[]" value="{{ $listinvoice[0]->itemname }}"></td>
                        <td><input class="form-control hsn" style="width: 90px" type="text" name="hsn[]" value="{{ $listinvoice[0]->hsn }}"></td>
                        <td><input class="form-control quantity" style="width: 90px" type="number" name="quantity[]" value="{{ $listinvoice[0]->quantity }}"></td>
                        <td><input class="form-control unit" style="width: 90px" type="text" name="unit[]" value="{{ $listinvoice[0]->unit }}"></td>
                        <td><input class="form-control price" style="width: 130px" type="number" name="price[]" value="{{ $listinvoice[0]->price }}"></td>
                        <td><input class="form-control amount" style="width: 130px" type="number" name="amount[]" value="{{ $listinvoice[0]->amount }}"></td>
                     </tr>
                     @php
                         $i++;
                     @endphp


                           {{-- @php
                               print_r($listinvoice[0]->id);exit;
                           @endphp --}}

                           {{-- @else
                             no data
                           @endif
                           @endforeach --}}
                      {{-- @endfor --}}
                      <tr>
                          <td></td>
                          <td><h4>Total</h4></td>
                          <td></td>
                          <td><input class="form-control totalquantity" style="width: 90px" type="number" name="totalquantity"></td>
                          <td></td>
                          <td></td>
                          <td><input class="form-control totalamount" style="width: 130px" type="number" name="totalamount"></td>

                      </tr>

                  </tbody>
                </table>
                <!-- End Table with stripped rows -->
                <div class="row mb-3 text-center">

                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Submit Form</button>
                  </div>
                </div>
              </form>


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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    $('.quantity').on('keyup',function()
    {
        var price = $(this).closest('tr').find('.price').val();
        var amount = price * $(this).val();
        $(this).closest('tr').find('.amount').val(amount);
    });
    $('.price').on('keyup',function()
    {
        var price = $(this).closest('tr').find('.quantity').val();
        var amount = price * $(this).val();
        $(this).closest('tr').find('.amount').val(amount);
    });
    // $('.totalquantity').on('keyup',function()
    // {
    //     var qut = $(this).closest('td').find('.quantity').val();
    //     var totalqut = qut  $(this).val();
    //     $(this).closest('td').find('.totalquantity').val(totalqut);
    // });
</script>




  <script src="{{ asset('resources/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('resources/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('resources/assets/vendor/chart.js/chart.umd.js') }}"></script>
  <script src="{{ asset('resources/assets/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ asset('resources/assets/vendor/quill/quill.min.js') }}"></script>
  <script src="{{ asset('resources/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('resources/assets/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('resources/assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('resources/') }}assets/js/main.js"></script>

</body>

</html>
