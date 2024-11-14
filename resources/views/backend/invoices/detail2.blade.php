@extends('backend.master')
@section('title')
    Generate
@endsection


@section('body')
<div class="row print-area">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="clearfix">
                    <div class="float-start">
                        <h3 class="card-title mb-0">#INV-{{$invoice->id}}</h3>
                    </div>
                    <div class="float-end">
                        <h3 class="card-title">Date: {{ date('d-m-Y') }}</h3>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-6 ">
                        <p class="h3">BILL TO</p>
                        <div class="">
                            <div class="d-flex align-items-center ">
                                <p class="me-2 mb-0">Name:</p>
                                <p class="mb-0" id="name">{{ $invoice->customer->name ?? '' }}</p>
                            </div>

                            <div class="d-flex align-items-center ">
                                <p class="me-2 mb-0">Customer Id:</p>
                                <p class="mb-0" id="name">{{ $invoice->customer->id ?? '' }}</p>
                            </div>

                            <div class="d-flex align-items-center ">
                                <p class="me-2 mb-0">Vehicle Number:</p>
                                <p  id="vehicleNumber" class="mb-0">{{ $invoice->customer->vehicle_number ?? '' }}</p>
                            </div>

                            <div class="d-flex align-items-center ">
                                <p class="me-2 mb-0">Address:</p>
                                <p  id="address" class="mb-0">{{ $invoice->customer->address ?? '' }}</p>
                            </div>

                            <div class="d-flex align-items-center ">
                                <p class="me-2 mb-0">Mobile Number:</p>
                                <p  id="mobileNumber" class="mb-0">{{ $invoice->customer->mobile ?? '' }}</p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="table-responsive push mt-3">
                    <table class="table  table-hover mb-0 text-nowrap border-bottom">
                        <tr class=" ">
                            <th class="">SL</th>
                            <th>DESCRIPTION</th>
                            <th class="text-center">QTY
                            </th>
                            <th class="text-end">PRICE</th>
                            <th class="text-end">AMOUNT</th>
                        </tr>
                        <tbody>
                        <tr>
                            @foreach($invoice->invoiceDetails as $invoiceDetail)
                            <td class="">{{$loop->iteration}}</td>
                            <td>
                                <p class="font-w600 mb-1">{{$invoiceDetail->description}}</p>

                            </td>
                            <td class="text-center">{{$invoiceDetail->qty}}</td>
                            <td class="text-end">{{$invoiceDetail->price}}</td>
                            <td class="text-end">{{$invoiceDetail->amount}}</td>
                        </tr>
                        @endforeach

                        <tr>
                            <td colspan="4" class="fw-bold text-uppercase text-end">Total</td>
                            <td class="fw-bold text-end h4">{{$invoice->total}}</td>
                        </tr>

                        <tr>

                            <td colspan="5" class=""><p>INWORD: <span class="inword text-uppercase"></span></p></td>
                        </tr>
                    </tbody></table>
                </div>
            </div>
            <div class="card-footer text-end ignore">

                <button type="button" class="btn btn-info mb-1 print-btn" ><i class="si si-printer"></i> Print Invoice</button>
            </div>
        </div>
    </div><!-- COL-END -->
</div>
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
