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

         
             
        @media print {
    html, body, div, span, applet, object, iframe, p, blockquote, pre, a, abbr, acronym, address, big, cite, code, del, dfn, em, font, ins, kbd, q, s, samp, small, strike, strong, sub, sup, tt, var, dl, dt, dd, ol, ul, li, fieldset, form, label, legend, table, caption, tbody, tfoot, thead, tr, th, td {
               font-size: 14pt !important;
          }

          body{
            margin-top:175px
          }

          table, th, td {
              border: 1px red solid;
              padding: 10px;
            }

    }

    </style>
@endsection

@section('body')
    <div class="mt-1 me-1">

{{--        <button type="button" class="float-end print-btn">Print</button>--}}
        {{-- <button type="button" class="float-end pdf-btn me-1">Pdf</button> --}}
        <button type="button" style="background-color:MediumSeaGreen" class="float-end me-1" data-bs-toggle="modal" data-bs-target="#mymodal">Create Customer</button>

        {{-- <a href="{{ route('customers.create') }}" class="btn btn-success btn-md float-end me-1" style="right: 0">Create Customer</a> --}}

    </div>
    <div class="clearfix"></div>
    <section class="py-1 print-area" id="printArea">
        <form action="" method="post" id="invoiceForm">
            <div class="container">

                <div class="row">
                    <div class="col-md-8 col-sm-8">
                        <h1 class="fw-bolder">INVOICE</h1>
                        <div class="mt-4">
                            <h4><b>BILL TO</b></h4>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="d-flex align-items-center mb-1">
                                        <p class="me-2"><b>Name:</b></p>
                                        <p  id="name">{{ $customer->name ?? '' }}</p>
                                    </div>

                                    <div class="d-flex align-items-center ">
                                        <p class="me-2"><b>Vehicle Number:</b></p>
                                        <p  id="vehicleNumber">{{ $customer->vehicle_number ?? '' }}</p>
                                    </div>

                                    <div class="d-flex align-items-center ">
                                        <p class="me-2"><b>Address:</b></p>
                                        <p  id="address">{{ $customer->address ?? '' }}</p>
                                    </div>

                                    <div class="d-flex align-items-center ">
                                        <p class="me-2"><b>Mobile Number:</b></p>
                                        <p  id="mobileNumber">{{ $customer->mobile ?? '' }}</p>
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
                    </div>
                    <div class="col-md-4 col-sm-4 mt-5">
                        <div class=" d-flex align-items-center mt-1">
                            <b>Date: </b>
                            <input  class="ms-2" type="text" value="{{ date('d-m-Y') }}" readonly>
                        </div>

                        <div class="align-items-center mt-1 hide" style="display:none">
                            <b>Invoice Id: </b>
                            <input id="invoiceNumber" class="ms-2" type="text" value="" readonly>
                        </div>
{{--                        <div class="row mt-1">--}}
{{--                            <span class="col-md-6"><span class="float-end"><b>Invoice Id: </b></span></span>--}}
{{--                            <span class="col-md-6 "> <input type="text" value="{{ rand(10, 100000) }}" ></span>--}}
{{--                        </div>--}}
                        <div class="d-flex align-items-center mt-1 ignore">
                            <label for="" class="">Owner Name</label>
                            <div class="">
                                <select class="selectpicker" id="customerId" data-live-search="true" data-container="body">
                                      <option data-tokens="100">100-Hot Dog, Fries and a Soda</option>
                                      <option data-tokens="101">101-Burger, Shake and a Smile</option>
                                      <option data-tokens="102">102-Sugar, Spice and all things nice</option>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>
                
                <div class="my-5">
                    <div class="row">
                        <div class="col-md-12 table-responsive">
                            <table class="table table-bordered mt-3 text-center">

                                <tr>
                                    <th style="width: 80px">SL</th>
                                    <th colspan="2">DESCRIPTION</th>
                                    <th>QUT</th>
                                    <th>PRICE</th>
                                    <th colspan="2">AMOUNT</th>
                                </tr>

                                <tbody id="tbody">
                                <tr>
                                    <td style="width: 80px"><input type="text" value="1" class="" readonly></td>
                                    <td colspan="2" style=""><input type="text" class="" name="description[1]"></td>
                                    <td><input type="text" min="0" class=" qty" name="qty[1]"></td>
                                    <td><input type="text" min="0" class=" price" name="price[1]"></td>
                                    <td><input type="text" min="0" class=" amount" name="amount[1]" readonly></td>
                                    <td class="d-flex ignore">
                                        <button type="button" class="btn border btn-light plus">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
                                            </svg>
                                        </button>

                                        {{-- <button type="button" class="btn border minus">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash" viewBox="0 0 16 16">
                                                <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8"/>
                                              </svg>
                                        </button> --}}


                                    </td>
                                </tr>

                                </tbody>
                                <tfoot>
                                <tr>
                                    <td colspan="4"></td>
                                    <td class="text-right"><span class="float-end">Subtotal</span></td>
                                    <td class="text-right" colspan="2"><input type="text" id="subtotal" name="sub_total" class=" sub_total" readonly></td>
                                </tr>

                                <tr>
                                    <td colspan="4"></td>
                                    <td class="text-right"><span class="float-end">Discount</span></td>
                                    <td class="text-right" colspan="2"><input type="text" id="discount" name="discount" class="discount"></td>
                                </tr>
                                <tr>
                                    <td colspan="4"></td>
                                    <td class="text-right"><h6 class="float-end">TOTAL</h6></td>
                                    <td class="text-right" colspan="2"><input type="text" id="total" name="total" class="total" readonly></td>
                                </tr>
                                <tr>
                                    <td colspan="4"></td>
                                    <td class="text-right" colspan="5">
                                        <p>INWORD: <span class="inword text-uppercase">Zero</span></p>
                                    </td>
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
                <p>INWORD: <span class="inword text-uppercase">Zero</span></p>
            </div>
        </form>
    </section>
@include('backend.customers.modal')
@endsection

@push('script')
    <script src="{{ asset('/') }}bootstrap-5.3.3-dist/js/jquerySpellingNumber.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script src="{{ asset('/') }}bootstrap-5.3.3-dist/js/jqueryPrint.doersGuild.min.js"></script>
    <script>
        var serialNumber = 1;
        $(document).on('click', '.plus', function () {
            var tr = '<tr>'+
                '<td><input type="text" value="'+ ++serialNumber +'" class="" readonly></td>' +
            '<td colspan="2"><input type="text" class="" name="description['+serialNumber+']"></td>' +
            '<td><input type="number" min="0" class=" qty" name="qty['+serialNumber+']"></td>' +
            '<td><input type="number" class=" price" name="price['+serialNumber+']"></td>' +
            '<td><input type="number" class=" amount" name="amount['+serialNumber+']" readonly></td>' +
            '<td class="d-flex ignore">' +
                '<button type="button" class="btn border btn-light plus">'+
                    '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">'+
                        '<path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>'+
                   ' </svg>'+
                '</button>'+
                '<button type="button" class="btn border minus">'+
                    '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="16" height="16" viewBox="0 0 256 256" xml:space="preserve"><defs></defs><g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)" ><path d="M 45 90 C 20.187 90 0 69.813 0 45 C 0 20.187 20.187 0 45 0 c 24.813 0 45 20.187 45 45 C 90 69.813 69.813 90 45 90 z M 45 8 C 24.598 8 8 24.598 8 45 c 0 20.402 16.598 37 37 37 c 20.402 0 37 -16.598 37 -37 C 82 24.598 65.402 8 45 8 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" /><rect x="19.97" y="41" rx="0" ry="0" width="50.05" height="8" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) "/></g></svg>'+
                '</button>'+
            '</td>'+
        '</tr>';
            $('#tbody').append(tr);
        })
        $(document).on('keyup', '.qty', function () {
            var qty = $(this).val();
            var price = $(this).closest('tr').find('.price').val();
            var amount = getAmount(qty, price);
            $(this).closest('tr').find('.amount').val(amount);
            getSubTotal()
            getTotal()
        })
        $(document).on('keyup', '.price', function () {
            var price = $(this).val();
            var qty = $(this).closest('tr').find('.qty').val();
            var amount = getAmount(qty, price);
            $(this).closest('tr').find('.amount').val(amount);
            getSubTotal()
            getTotal()
        })




        $(document).on('keyup', '#customerId', function () {
            var price = $(this).val();
            var qty = $(this).closest('tr').find('.qty').val();
            var amount = getAmount(qty, price);
            $(this).closest('tr').find('.amount').val(amount);
            getSubTotal()
            getTotal()
        })

        function getSubTotal(){
            var sub_total = 0;
            $.each($('.amount'), function (key, ele) {
                if (ele.value)
                {
                    if (ele.value > 0)
                    {
                        sub_total += Number(ele.value);
                    }
                }
            })
            $('.sub_total').val(sub_total);
            return sub_total;


        }


$(document).on('keyup', '#discount', function () {

    var sub_total = $('.sub_total').val();
       var discount = $('.discount').val();
        console.log(sub_total);
        console.log(discount);
      var total = sub_total - discount;
         console.log(total);
         $('.total').val(total);
         $('.inword').html($.spellingNumber(total));



})

        function getTotal() {
            var total = $('.sub_total').val();
            $('.total').val(total);
            $('.inword').html($.spellingNumber(total));
            return total;
        }


        function getAmount(qty, price) {
            return Number(qty) * Number(price);
        }
        $(document).on('click', '.minus', function () {
            $(this).closest('tr').remove();
            getSubTotal()
            getTotal();
        })
        $(document).on('click', '.print-btn', function () {
            $('.print-area').print({
                append : null,
                prepend : null,
                noPrintSelector : ".ignore",
            });
            // var formData = $('#invoiceForm').serialize();
            // // console.log(formData);
            // $.ajax({
            //     url: "{{ url('/') }}/invoices",
            //     method: "POST",
            //     data: formData,
            //     success: function (response) {
            //         console.log(response);
            //         if (response.status == 'success')
            //         {
            //             toastr.success(response.msg);
            //             $('#invoiceNumber').val(response.invoice.id);
            //             $('.hide').css('display', 'block')
            //             $('.print-area').print({
            //                 append : null,
            //                 prepend : null,
            //                 noPrintSelector : ".ignore",
            //             });

            //             // location.reload();
            //         } else {
            //             toastr.error(response.msg);
            //         }
            //     }
            // })
        })

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

    $(document).on('change', '#customerId', function (){
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

    $(document).ready(function(){
    $('.selectpicker').selectpicker();
    //   $(function () {
    //     $('select').selectpicker();
    // });
  
    });
</script>
@endpush
