@php
    use NumberToWords\NumberToWords;
    $numberToWords = new NumberToWords();
    $numberTransformer = $numberToWords->getNumberTransformer('en');

@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tax Invoice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <style>
            #head
            {
                border:1px solid black;

            }

            #footer
            {
                border: dotted 1px rgb(184, 181, 181);

            }
            #logo
            {
                padding-top: 8px;
                width: 60px;
                height: 50px;
                padding-bottom: 8px;
                padding-left: 16px;
            }
            #address
            {
                padding-left: 100px;
            }
            .border
            {
                border-style: dashed;
                border-width: 1.5px;
                color: black;
            }
            #sign
            {
                width: 120px;
                height: 50px;
            }
            table { border-collapse: collapse; }
            p
            {
                margin: 0%;
                font-size: 13px;
                color: black;
            }
            h5,h6,h4,h3{
                margin: 0%;
            }
    </style>
</head>
<body>
    <form action={{ url('/inbill',$customer->id) }} method="POST">
        @csrf
   <div class="container">
    <h6 class="text-center">Tax Invoice</h6>
    <div class="container mt-2" id="head">
        @foreach ($name as $company)

        @endforeach
        <table class="table-barderless">
            <tbody style="border-bottom: solid 1px black">
                <tr>
                    <td class="td-50"><img src="{{ $company->logo }}" alt="png" id="logo"></td>
                    <td class="td-50" style="width: 460px;">
                        <h5 class="text-end" style="padding-right: 5px">{{ $company->companyname }}</h5>
                        <p class="text-end" style="font-size: 8 px;padding-right: 5px">
                            {{ $company->address }}</p>
                        <p class="text-end" style="padding-right: 5px">Phone no:{{ $company->mobile }}  Email:{{ $company->email }}</p>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="row mt-0" style="border-bottom: solid 1px black; width:274px; border-right: solid 1px black;padding-right: 5px;padding-left: 5px;">
            <div class="col-6"><p class="fw-bolder">Bill To:</p></div>
        </div>
        <table class="table-barderless" style="margin-top: 0px;">
            <tbody >
                <tr>
                    <td class="mt-1" style="width:274px; border-right: solid 1px black;padding-right: 5px;padding-left: 5px;">
                        <h6 class="fw-bolder">{{ $customer->invoicecompanyname }}</h6>
                        <p>{{ $customer->address }}</p>
                        <p>Contact No.:{{ $customer->contact }}</p>
                    </td>
                    @foreach ($bill as $bills)
                        @php
                            $date = $bills->date
                            // $newDate = date("d-m-Y", strtotime($date));
                            // $day = $newDate."(MM-DD-YYYY)"
                        @endphp
                    @endforeach
                    {{-- <th class="text-end" style="padding-left: 134px;padding-top: -50px"> --}}
                        <h6 style="padding-left: 155px;">Invoice No.: {{ $customer->id }}</h6>
                        <h6 style="padding-left: 135px;">Date: {{ $date }}</h6>
                    {{-- </th> --}}
                </tr>
            </tbody>
        </table>
       <div class="row mt-0" style=" border-top: solid 1px black; margin-top: 0px;">
            <table id="tables" style="border-bottom: solid 1px black;">
                <thead class="table" style=" border-bottom: solid 1px black">
                    <tr >
                        <th class="text-start" style=" border: none; padding-right: 5px; border-right: solid 1px black;
                        text-align: end;
                        padding-right: 5px;
                        padding-left: 5px;">#</th>
                        <th class="text-start" style="border-right: solid 1px black;
                        border-left: solid 1px black;
                        text-align: end;
                        padding-right: 5px;
                        padding-left: 5px;width: 120px">Item name</th>
                        <th class="text-start" style="border-right: solid 1px black;
                        border-left: solid 1px black;
                        text-align: end;
                        padding-right: 5px;
                        padding-left: 5px;width: 78px">HSN/ SAC </th>
                        <th class="text-end" style="border-right: solid 1px black;
                        border-left: solid 1px black;
                        text-align: end;
                        padding-right: 5px;
                        padding-left: 5px;">Quantity</th>
                        <th class="text-end" style="border-right: solid 1px black;
                        border-left: solid 1px black;
                        text-align: end;
                        padding-right: 5px;
                        padding-left: 5px;width: 40px">Unit</th>
                        <th class="text-end" style="border-right: solid 1px black;
                        border-left: solid 1px black;
                        text-align: end;
                        padding-right: 5px;
                        padding-left: 5px;width: 79px">Price/ unit</th>
                        <th class="text-end" style=" border: none;
                        border-left: solid 1px black;
                        text-align: end;
                        padding-right: 5px;
                        padding-left: 5px;width: 79px">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i=1;
                        $total = 0;
                        $quts = 0;
                    @endphp
                    @foreach ($bill as $item)
                        <tr>
                            <td style="border-right: solid 1px black;
                            text-align: end;
                            padding-right: 5px;
                            padding-left: 5px;">{{ $i }}</td>
                            <td style="border-right: solid 1px black;
                            border-left: solid 1px black;
                            text-align: end;
                            padding-right: 5px;
                            padding-left: 5px;">{{ $item->itemname }}</td>
                            <td style="border-right: solid 1px black;
                            border-left: solid 1px black;
                            text-align: end;
                            padding-right: 5px;
                            padding-left: 5px;">{{ $item->hsn }}</td>
                            <td class="text-end" style="border-right: solid 1px black;
                            border-left: solid 1px black;
                            text-align: end;
                            padding-right: 5px;
                            padding-left: 5px;">{{ $item->quantity  }}</td>
                            <td class="text-end" style="border-right: solid 1px black;
                            border-left: solid 1px black;
                            text-align: end;
                            padding-right: 5px;
                            padding-left: 5px;">{{ $item->unit }}</td>
                            <td class="text-end" style="border-right: solid 1px black;
                            border-left: solid 1px black;
                            text-align: end;
                            padding-right: 5px;
                            padding-left: 5px;font-family: DejaVu Sans; sans-serif;font-size:13px">₹ {{ $item->price }}</td>
                            <td class="text-end" style="border-left: solid 1px black;
                            text-align: end;
                            padding-right: 5px;
                            padding-left: 5px;font-family: DejaVu Sans; sans-serif; font-size:13px">₹ {{ $item->amount }}</td>
                        </tr>
                        @php
                            $i++;
                            $total += $item->amount;
                            $quts += $item->quantity;
                            // $word = SpellNumber::value($total)->toLetters();

                        @endphp
                    @endforeach
                    <tr style=" border-top: solid 1px black">
                        <td style=" border: none;"></td>
                        <th class="text-start" style="border-left: solid 1px black;
                        text-align: end;
                        padding-right: 5px;
                        padding-left: 5px;">Total</th>
                        <td style="border-left: solid 1px black;
                        text-align: end;
                        padding-right: 5px;
                        padding-left: 5px;"></td>
                        <th class="text-end" style="border-left: solid 1px black;
                        text-align: end;
                        padding-right: 5px;
                        padding-left: 5px;">{{ $quts }}</th>
                        <td class="text-end" style="border-left: solid 1px black;
                        text-align: end;
                        padding-right: 5px;
                        padding-left: 5px;"></td>
                        <td class="text-end" style="border-left: solid 1px black;
                        text-align: end;
                        padding-right: 5px;
                        padding-left: 5px;"></td>
                        <th class="text-end" style="border-left: solid 1px black;
                        text-align: end;
                        padding-right: 5px;
                        padding-left: 5px;font-family: DejaVu Sans; sans-serif;font-size:13px">₹ {{ $total }}</th>
                    </tr>
                </tbody>
            </table>
       </div>
       <table style="border-bottom: solid 1px black;">
        <tr>

            <td rowspan="4" class="td-50" style="border-right: solid 1px black;padding-right: 5px;padding-left: 5px;width: 285px">
                <h4 class="fw-bolder text-center">Invoice Amount In Words</h4>
                <p class="text-center" style="font-size: 15px;"> {{ $numberTransformer->toWords($total); }} rupees only</p>
                <h4 class="fw-bolder text-center">Payment Mode</h4>
                <p class="text-center">Credit</p>
            </td>
            <td style="width: 234px; border-bottom: solid 1px black;padding-right: 5px;
            padding-left: 5px; padding-top: -5px;height: 50px">
                <h6 class="fw-bolder text-start">Amounts:</h6>
                <p >Sub Total<span class="d-flex float-end" style="font-family: DejaVu Sans; sans-serif;font-size:13px;margin-top: -4px;">₹ {{ $total }}</span></p>
            </td>
            <tr>
                <td style="padding-right: 5px;padding-left: 5px;">
                    <h6 class="fw-bolder">Total<span class="d-flex float-end" style="font-family: DejaVu Sans; sans-serif;font-size:13px;">₹ {{ $total }}
                    </span></h6>
                </td>
            </tr>
            <tr>
                <td style="border-bottom: solid 1px black;padding-right: 5px;
                padding-left: 5px; height: 30px;">
                <p>Received<span class="d-flex float-end" style="font-family: DejaVu Sans; sans-serif;font-size:13px; margin-top: -4px;">₹ 0.00</span></p>
            </td>
            </tr>
            <tr>
                <td style="padding-right: 5px;padding-left: 5px;height: 25px">
                    <p>Balance<span class="d-flex float-end" style="font-family: DejaVu Sans; sans-serif;font-size:13px; margin-top: -4px;">₹ {{ $total }}</span></p>

                </td>
            </tr>

        </tr>
       </table>
        <table>
            <tr>
                <td style="border-right: solid 1px black; width:285px;padding-right: 5px;padding-left: 5px;">
                    <h6 class="fw-bolder">Terms and conditions: </h6>
                    <p style="font-size: 13px;">Thank you for doing business with us</p>
                    <h6 class="fw-bolder">Bank details:</h6>
                    <p style="font-size: 13px;">Bank Name: {{ $company->bankname }}</p>
                    <p style="font-size: 13px;">Bank Account No.: {{ $company->bankacnum }}</p>
                    <p>Bank IFSC code: {{ $company->ifsccode }}</p>
                    <p>Account Holder's Name: {{ $company->acholdername }}</p>
                </td>
                <td class="text-center" style="width:250px;">
                    <p>For, {{ $company->companyname }}</p>
                    <img src="{{ $company->sign }}" alt="sign" id="sign">
                    <p>Authorized Signatory</p>
                </td>
            </tr>
        </table>
    </div>
    <div class="mt-5 ms-1 me-1 row " >
        <p id="footer" style="border: dashed 1px rgb(184, 181, 181);"></p>
    </div>
    <div class="row text-center">
        <h6>Acknowledgment</h6>
        <h3>{{ $company->companyname }}</h3>
    </div>
    <table class="mt-3">
        <tr>
            <td style="width: 250px">
                <h6 class="fw-bolder">{{ $customer->invoicecompanyname }}</h6>
                <p style="font-size: 15px;" class="fw-4">{{ $customer->address }}</p>
            </td>
            <td style="width: 280px;">
                <p class="text-end" style="font-size: 15px;">Invoice No. : {{ $customer->id }}</p>
                <p class="text-end" style="font-size: 15px;">Invoice Date : {{ $item->date }}</p>
                <p class="text-end" style="font-size: 15px;">Invoice Amount : {{ $total }}</p>
            </td>
        </tr>
    </table>
    <div class="mt-3">
        <p class="text-center" style="font-size: 15px;">Receiver's Seal & Sign</p>
    </div>
</form>

</body>
</html>
