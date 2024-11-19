@extends('backend.master')
@section('title')
    ADP
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

@push('style')
<link rel="stylesheet" href="https://code.jquery.com/ui/1.14.0/themes/base/jquery-ui.css">



@endpush

@section('body')

    <div class="clearfix"></div>
    <section class="py-1 " id="">
        <form action="{{route('adps.store')}}" method="post" id="" enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{$jobSheet->id}}" name="job_sheet_id"/>
            <div class="container">


                <div class="my-5">
                    <div class="row">
                        <div class="col-md-12 table-responsive">
                            <table class="table  mt-3">

                                <tr>
                                    
                                    <th></th>
                                    <th></th>
                                    <th>DESCRIPTION</th>
                                    
                                   

                                </tr>

                                <tbody id="tbody">
                                <tr>
                                    <th>SL</th>
                                    <td><input type="text" value="1" class="" readonly></td>
                                    <td rowspan="3" style=""><textarea  class="me-5" name="description[1]" cols="50" rows="5"></textarea>

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
                                <tr>
                                    <th>AMOUNT</th>
                                    <td  style=""><input type="text" class="" name="amount[1]"></td>
                                </tr>
                                <tr>
                                     <th>DATE</th>
                                    <td  style=""><input type="text" class="" name="date[1]" id="datepicker" value="{{ date('m/d/Y') }}"></td>
                                </tr>
                                <tr>
                                    <th colspan="3"><hr></th>
                                </tr>

                                </tbody>

                                <tr class="ignore">
                                    <td colspan="4"></td>
                                    <td class="text-right"></td>
                                    <td class="text-right" colspan="2">
                                        <input type="submit" class="btn btn-success"
                                            value="Submit">
                                    </td>
                                </tr>

                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </section>

@endsection

@push('script')

    <script>
        var serialNumber = 1;
        $(document).on('click', '.plus', function () {
            var tr = '<tr>'+
                '<th>SL</th>'+
                '<td><input type="text" value="'+ ++serialNumber +'" class="" readonly></td>'+
                '<td rowspan="3" style=""><textarea  class="me-5" name="description['+serialNumber+']" cols="50" rows="5"></textarea></td>'+
                '<td class="d-flex ignore">' +
                '<button type="button" class="btn border btn-light plus">'+
                    '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">'+
                        '<path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>'+
                   ' </svg>'+
                '</button>'+
                '<button type="button" class="btn border minus">'+
                    '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="16" height="16" viewBox="0 0 256 256" xml:space="preserve"><defs></defs><g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)" ><path d="M 45 90 C 20.187 90 0 69.813 0 45 C 0 20.187 20.187 0 45 0 c 24.813 0 45 20.187 45 45 C 90 69.813 69.813 90 45 90 z M 45 8 C 24.598 8 8 24.598 8 45 c 0 20.402 16.598 37 37 37 c 20.402 0 37 -16.598 37 -37 C 82 24.598 65.402 8 45 8 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" /><rect x="19.97" y="41" rx="0" ry="0" width="50.05" height="8" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) "/></g></svg>'+
                '</button>'+
            '</td>'
            +'</tr>'+
            '<tr>'+
                '<th>AMOUNT</th>'+
                '<td  style=""><input type="text" class="" name="amount['+serialNumber+']"></td>'
            +'</tr>'+
            '<tr>'+
                '<th> Date </th>'+
                '<td  style=""><input type="text" class="" name="date['+serialNumber+']" id="datepicker" value="{{ date('m/d/Y') }}"></td>'
            +'</tr>'+
             '<tr>'+
                '<th colspan="3"> <hr> </th>'+
            +'</tr>';
            $('#tbody').append(tr);
        })








        $(document).on('click', '.minus', function () {
            $(this).closest('tr').remove();

        })


    </script>

    <script src="https://code.jquery.com/ui/1.14.0/jquery-ui.js"></script>


<script>
    $( function() {
      $( "#datepicker" ).datepicker();
    } );
    </script>



@endpush
