@extends('backend.master')
@section('title')
    Generate
@endsection
@section('style')
    <style>

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p {
            margin: 0;
        }

        .min-width-105 {
            min-width: 105px;
        }
        .width-50 {
            width: 50%;
        }
        .width-300 {
            width: 300px;
        }
        .w-100 { width: 100px}
        .pls-btn {
            position: absolute;
            top: 60px;
            right: -40px;
        }

    </style>
@endsection

@section('body')
    <div class="mt-1 me-1">

{{--        <button type="button" class="float-end print-btn">Print</button>--}}
        {{-- <button type="button" class="float-end pdf-btn me-1">Pdf</button> --}}

        {{-- <a href="{{ route('customers.create') }}" class="btn btn-success btn-md float-end me-1" style="right: 0">Create</a> --}}

    </div>
    <div class="clearfix"></div>
    <section class="py-1 print-area" id="printArea">
        <form action="" method="post" id="invoiceForm">
            <div class="container">

                <div class="row">
                    <div class="col-7">
                        <h1 class=" fw-bolder">INVOICE</h1>
                    </div>
                    <div class="col-5">
                        <div class=" d-flex align-items-center mt-1">
                            <b>Date: </b>
                            <input  class="ms-2" type="text" value="{{ date('d-m-Y') }}" readonly>
                        </div>

                        <div class="align-items-center mt-1 ">
                            <b>Invoice Id: </b>
                            <input id="invoiceNumber" class="ms-2" type="text" value="{{$invoice->id}}" readonly>
                        </div>
{{--                        <div class="row mt-1">--}}
{{--                            <span class="col-6"><span class="float-end"><b>Invoice Id: </b></span></span>--}}
{{--                            <span class="col-6 "> <input type="text" value="{{ rand(10, 100000) }}" ></span>--}}
{{--                        </div>--}}
                        <div class="d-flex align-items-center mt-1">
                            <b>Customer Id: </b>

                            <input class="mx-2" type="text" id="customerId" name="customer_id" value="{{ $invoice->customer->id ?? '' }}">



                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <h4><b>BILL TO</b></h4>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="d-flex align-items-center mb-1">
                                <p class="me-2"><b>Name:</b></p>
                                <p  id="name">{{ $invoice->customer->name ?? '' }}</p>
                            </div>

                            <div class="d-flex align-items-center ">
                                <p class="me-2"><b>Vehicle Number:</b></p>
                                <p  id="vehicleNumber">{{ $invoice->customer->vehicle_number ?? '' }}</p>
                            </div>

                            <div class="d-flex align-items-center ">
                                <p class="me-2"><b>Address:</b></p>
                                <p  id="address">{{ $invoice->customer->address ?? '' }}</p>
                            </div>

                            <div class="d-flex align-items-center ">
                                <p class="me-2"><b>Mobile Number:</b></p>
                                <p  id="mobileNumber">{{ $invoice->customer->mobile ?? '' }}</p>
                            </div>
                        </div>
                        {{-- <div class="col-md-4">
                            <table class="table mt-3 d-none">
                                <tbody>
                                <tr>
                                    <td class="width-100"><b>Name:</b></td>
                                    <td class="width-50" id="name">{{ $customer->name ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td class="width-100"><b>Vehicle Number:</b></td>
                                    <td class="width-50" id="vehicleNumber">{{ $customer->vehicle_number ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td class="width-100"><b>Address:</b></td>
                                    <td class="width-50" id="address">{{ $customer->address ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td class="width-100"><b>Mobile Number:</b></td>
                                    <td class="width-50" id="mobileNumber">{{ $customer->mobile ?? '' }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div> --}}
                    </div>
                </div>
                <div class="my-5">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table  mt-3">

                                <tr>
                                    <th style="width: 80px">SL</th>
                                    <th colspan="2">DESCRIPTION</th>
                                    <th>QUT</th>
                                    <th>PRICE</th>
                                    <th colspan="2">AMOUNT</th>
                                </tr>

                                <tbody id="tbody">
                                    @foreach($invoice->invoiceDetails as $invoiceDetail)
                                <tr>
                                    <td style="width: 80px"><input type="text" value="{{$loop->iteration}}" class="" readonly></td>
                                    <td colspan="2" style=""><input type="text" class="" value="{{$invoiceDetail->description}}" name="description[1]"></td>
                                    <td><input type="text" min="0" class=" qty" value="{{$invoiceDetail->qty}}" name="qty[1]"></td>
                                    <td><input type="text" min="0" class=" price" value="{{$invoiceDetail->price}}" name="price[1]"></td>
                                    <td><input type="text" min="0" class=" amount" value="{{$invoiceDetail->amount}}"  name="amount[1]" readonly></td>

                                </tr>
                                @endforeach

                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="4"></td>
                                    <td class="text-right"><span class="float-end">Subtotal</span></td>
                                    <td class="text-right" colspan="2"><input type="text" value="{{$invoice->sub_total}}" id="subtotal" name="sub_total" class=" total" readonly></td>
                                </tr>
                                <tr>
                                    <td colspan="4"></td>
                                    <td class="text-right"><h6 class="float-end">TOTAL</h6></td>
                                    <td class="text-right" colspan="2"><input type="text" id="total" value="{{$invoice->total}}" name="total" class=" total" readonly></td>
                                </tr>
{{--                                <tr class="ignore">--}}
{{--                                    <td colspan="4"></td>--}}
{{--                                    <td class="text-right"><h6 class="float-end">Payment Status</h6></td>--}}
{{--                                    <td class="text-right" colspan="2">--}}
{{--                                        <select name="status" class="form-control" id="">--}}
{{--                                            <option value="pending">Pending</option>--}}
{{--                                            <option value="complete">Complete</option>--}}
{{--                                        </select>--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
                                <tr class="ignore">
                                    <td colspan="4"></td>
                                    <td class="text-right"></td>
                                    <td class="text-right" colspan="2">
                                        <button type="button" class="float-end print-btn btn btn-success">Print</button>
                                    </td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                <p>INWORD: <span class="inword text-uppercase"></span></p>
            </div>
        </form>
    </section>

@endsection

@push('script')
    <script src="{{ asset('/') }}bootstrap-5.3.3-dist/js/jquerySpellingNumber.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script src="{{ asset('/') }}bootstrap-5.3.3-dist/js/jqueryPrint.doersGuild.min.js"></script>

    <script>
    $(document).ready(function (){
        $('.inword').html($.spellingNumber({{$invoice->total}}));

    });
    </script>
    <script>

        $(document).on('click', '.print-btn', function () {
            // $('.print-area').print({
            //     append : null,
            //     prepend : null,
            //     noPrintSelector : ".ignore",
            // });


                        $('.print-area').print({
                            append : null,
                            prepend : null,
                            noPrintSelector : ".ignore",
                        });

                        // location.reload();
                    }

        )

        $(document).on('click', '.pdf-btn', function () {
            var element = document.getElementById('printArea');

            // Temporarily hide elements with the class 'ignore'
            // var ignoreElements = document.querySelectorAll('.ignore');
            // ignoreElements.forEach(el => el.style.display = 'none');
            $('.ignore').css('cssText', 'display: none !important');

            html2pdf().set({
                fileName: "invoice.pdf",

            }).from(element).save().then(() => {
                // After saving the PDF, restore the visibility of ignored elements
                // ignoreElements.forEach(el => el.style.display = 'block');
                $('.ignore').css('display', '');
            });
        })
    </script>
    <script>



        $(document).on('change','.amount'), function(){
            $('.total').val(total);
            $('.inword').html($.spellingNumber(total));
        }



        </script>

<script>
    $(document).on('click', '.customerInfo', function (){
        event.preventDefault();

       var customerId =  $('#customerId').val();

        $.ajax({
            url: "{{ url('/') }}/customers/"+customerId,
            method: "GET",
            success: function (response) {
                console.log(response);
                $('#name').text(response.name);
                $('#mobileNumber').text(response.mobile);
                $('#vehicleNumber').text(response.vehicle_number);
                $('#address').text(response.address);

            }
        })
    })
</script>
@endpush
