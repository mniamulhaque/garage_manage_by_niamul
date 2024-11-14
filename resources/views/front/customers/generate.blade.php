@extends('front.master')
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
        <button type="button" class="float-end print-btn">Print</button>
        <button type="button" class="float-end pdf-btn me-1">Pdf</button>
        <button type="button" class="float-end me-1" data-bs-toggle="modal" data-bs-target="#mymodal">Create</button>
    </div>
    <div class="clearfix"></div>
    <section class="py-1 print-area" id="printArea">
        <div class="container">

            <div class="row">
                <div class="col-7">
                    <h1 class="text-center fw-bolder">INVOICE</h1>
                </div>
                <div class="col-5">
                    <div class="row mt-1">
                        <span class="col-6"><span class="float-end">Date: </span></span>
                        <span class="col-6"> <input type="text" value="{{ date('d-m-Y') }}" readonly></span>
                    </div>
                    <div class="row mt-1">
                        <span class="col-6"><span class="float-end">Invoice Id: </span></span>
                        <span class="col-6 "> <input type="text" value="{{ rand(10, 100000) }}" readonly></span>
                    </div>
                    <div class="row mt-1">
                        <span class="col-6"><span class="float-end">Customer Id: </span></span>
                        <span class="col-6"> <input type="text" value="{{ $customer->id ?? '' }}" readonly></span>
                    </div>
                </div>
            </div>
            <div class="mt-1">
                <h4>BILL TO</h4>
                <div class="row">
                    <div class="col-md-8">
                        <table class="table table-bordered mt-3">
                            <tbody>
                            <tr>
                                <td class="width-100">Name:</td>
                                <td class="width-50">{{ $customer->name ?? '' }}</td>
                            </tr>
                            <tr>
                                <td class="width-100">Vehicle Number:</td>
                                <td class="width-50">{{ $customer->vehicle_number ?? '' }}</td>
                            </tr>
                            <tr>
                                <td class="width-100">Address:</td>
                                <td class="width-50">{{ $customer->address ?? '' }}</td>
                            </tr>
                            <tr>
                                <td class="width-100">Mobile Number:</td>
                                <td class="width-50">{{ $customer->mobile ?? '' }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="my-1">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-primary mt-3">
                            <thead>
                                <tr>
                                    <th style="width: 80px">SL</th>
                                    <th colspan="2">DESCRIPTION</th>
                                    <th>QUT</th>
                                    <th>PRICE</th>
                                    <th colspan="2">AMOUNT</th>
                                </tr>
                            </thead>
                            <tbody id="tbody">
                            <tr>
                                <td style="width: 80px"><input type="text" value="1" class="form-control" readonly></td>
                                <td colspan="2" style=""><input type="text" class="form-control" name="description"></td>
                                <td><input type="text" class="form-control qty" name="qty"></td>
                                <td><input type="text" class="form-control price" name="price"></td>
                                <td><input type="text" class="form-control amount" name="amount" readonly></td>
                                <td class="d-flex">
                                    <button type="button" class="btn border plus">
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="16"
                                            height="16"
                                            fill="currentColor"
                                            class="bi bi-plus-lg"
                                            viewBox="0 0 16 16"
                                        >
                                            <path
                                                fill-rule="evenodd"
                                                d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"
                                            />
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
                                <td class="text-right" colspan="2"><input type="text" id="subtotal" class="form-control total" readonly></td>
                            </tr>
                            <tr>
                                <td colspan="4"></td>
                                <td class="text-right"><h6 class="float-end">TOTAL</h6></td>
                                <td class="text-right" colspan="2"><input type="text" id="total" class="form-control total" readonly></td>
                            </tr>

                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <p>INWORD: <span class="inword text-uppercase">Zero</span></p>
        </div>
    </section>
@include('front.customers.modal')
@endsection

@push('script')
    <script src="{{ asset('/') }}bootstrap-5.3.3-dist/js/jquerySpellingNumber.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script src="{{ asset('/') }}bootstrap-5.3.3-dist/js/jqueryPrint.doersGuild.min.js"></script>
    <script>
        var serialNumber = 1;
        $(document).on('click', '.plus', function () {
            var tr = '<tr>'+
                '<td><input type="text" value="'+ ++serialNumber +'" class="form-control" readonly></td>' +
            '<td colspan="2"><input type="text" class="form-control"></td>' +
            '<td><input type="text" class="form-control qty" name="qty"></td>' +
            '<td><input type="text" class="form-control price" name="price"></td>' +
            '<td><input type="text" class="form-control amount" name="amount" readonly></td>' +
            '<td class="d-flex">' +
                '<button type="button" class="btn border plus">'+
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
            getTotal()
        })
        $(document).on('keyup', '.price', function () {
            var price = $(this).val();
            var qty = $(this).closest('tr').find('.qty').val();
            var amount = getAmount(qty, price);
            $(this).closest('tr').find('.amount').val(amount);
            getTotal()
        })
        function getTotal() {
            var total = 0;
            $.each($('.amount'), function (key, ele) {
                if (ele.value)
                {
                    if (ele.value > 0)
                    {
                        total += Number(ele.value);
                    }
                }
            })
            $('.total').val(total);
            $('.inword').html($.spellingNumber(total));
            return total;
        }
        function getAmount(qty, price) {
            return Number(qty) * Number(price);
        }
        $(document).on('click', '.minus', function () {
            $(this).closest('tr').remove();
            getTotal();
        })
        $(document).on('click', '.print-btn', function () {
            $('.print-area').print({
                append : null,
                prepend : null
            });
        })

        $(document).on('click', '.pdf-btn', function () {
            var element = document.getElementById('printArea')
            html2pdf().set({
                fileName: "invoice.pdf",

            }).from(element).save();
        })
    </script>
@endpush
