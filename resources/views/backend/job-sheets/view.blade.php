@extends('backend.master')
@section('title')
  VIEW
@endsection


@push('style')
<style>
* {
  box-sizing: border-box;
}

table, th, td {
  border: 1px black solid;
  padding: 5px;
}
.rowdubble{
    background:#833c0c;
    color: white;
}

.rowdubbletow{
    background:#757171;
    color: white;
}
.rowdubbletow_part{
    background:#aeaaaa;
    color: white;
}


@page {
size: A4;
}

@media print {
    html, body, div, span, applet, object, iframe,  h2, h3, h4, h5, h6, p, blockquote, pre, a, abbr, acronym, address, big, cite, code, del, dfn, em, font, ins, kbd, q, s, samp, small, strike, strong, sub, sup, tt, var, dl, dt, dd, ol, ul, li, fieldset, form, label, legend, table, caption, tbody, tfoot, thead, tr, th, td {
               font-size: 17pt !important;
               margin: 0;
               padding: 0;
          }

          .job-site{
            font-size: 25px !important;
          }

          body{
            margin-left: 20px;
            margin-right: 20px;
          }

          able, th, td {
  border: 1px black solid;
  padding: 5px;
}
.rowdubble{
    background:#833c0c;
    color: white;
}

.rowdubbletow{
    background:#757171;
    color: white;
}
.rowdubbletow_part{
    background:#aeaaaa;
    color: white;
}



    }
</style>
@endpush

@section('body')
<div class="print-area">
<div class="text-center" style="padding-top:10px">
    <p style="font-size: 28px; font-weight: bold;">EMIC Car Solution</p>
    <div class="d-flex justify-content-center">
        <div style="background-color: black; height:auto;width :150px; border-radius: 30px; padding:10px"><p style="font-size: 18px; font-weight: bold; margin-bottom:0;color:white" class="job-site">Job Site</p></div>
    </div>

</div>
<!-- Job Information Section -->
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="row mb-3 h6">
            <div class="col-md-6 col-sm-6">
                <p>Job No: <span>{{$jobSheet->job_no}}</span></p>
                <p>Owner Name: <span>{{$jobSheet->customer->name}}</span></p>
                <p>Vehicle No: <span>{{$jobSheet->vehicle->vehicle_number}}</span></p>
                <p>Driver Name: <span>{{$jobSheet->driver_name}}</span></p>
                <p>Vehicle Incoming Date: <span>{{$jobSheet->vehicle_incoming_date}}</span></p>
                <p>Received by: <span>{{$jobSheet->received_by}}</span></p>
            </div>
            <div class="col-md-6 col-sm-6 text-end">
                <p>Date: <span>{{$jobSheet->date}}</span></p>
                <p>Mob: <span>{{$jobSheet->mob}}</span></p>
                <p>Color: <span>{{$jobSheet->color}}</span></p>
                 <p>Driver Mob: <span>{{$jobSheet->mob}}</span></p>
                 <p>Vehicle Outgoing Date: <span>{{$jobSheet->vehicle_outgoing_date}}</span></p>
                 <p class="mt-2">Customer Id: <span style="border:1px solid red; padding: 4px 15px;">{{$jobSheet->customer->id}}</span></p>
            </div>

           
        </div>
        <!---Work View One -------->
        <div class="row">
            <diV class="col-md-12">
                <table class="" id="" style="width:100%;">
                    <tr>
                        <th>SL_No.</th>
                        <th class="text-center">Work Description </th>

                    </tr>



                    <tbody>


                        @php($totalObject = count($jobSheet->wds))

                        @for($i = 1; $i <=20; $i++)
                            @if($i <= $totalObject)
                            @foreach($jobSheet->wds as $key=> $wd)
                            @if(++$key == $i )
                            <tr>
                                <td class="text-center">{{$loop->iteration}}</td>
                                <td class="w-100 ps-5">{{$wd->wdes}}</td>
                            </tr>




                            @endif
                            @endforeach

                            @else
                            <tr>
                                <td class="text-center">{{$i}}</td>
                                <td></td>
                            </tr>


                        @endif
                    @endfor




                    </tbody>
                </table>
            </diV>

        </div>
        <!----tps --------------------------------------------->
        <div class="row ">
            <div class="col-md-12">
                 <table class="w-100" id="">
                    <thead>
                         <p class="pt-3"><b>Tools and Paper:</b></p>
                    </thead>
                     <tbody>

                         {{-- @foreach($jobSheet->tps->chunk(3) as $tp)
                         <tr>
                            @foreach($tp as $item)
                             <td class="text-center">{{$item->id}}</td>
                             <td>{{$item->name}}</td>
                             @endforeach

                             @if($tp->count() < 3)
                                @for($i = 0; $i < 3 - $tp->count(); $i++)
                                    <td>{{$i}}</td>
                                    <td></td>
                                @endfor
                            @endif
                         </tr>
                         @endforeach --}}


                         @for($i = 0; $i <4; $i++)
                            <tr>
                                <!-- First column -->
                                <td>{{ $jobSheet->tps[$i]->id ?? '' }}</td>
                                <td>{{ $jobSheet->tps[$i]->name ?? '' }}</td>

                                <!-- Second column (corresponding offset by half of the total data) -->
                                @if(isset($jobSheet->tps[$i + ceil(4)]))
                                    <td>{{ $jobSheet->tps[$i + ceil(4)]->id ?? '' }}</td>
                                    <td>{{ $jobSheet->tps[$i + ceil(4)]->name ?? '' }}</td>



                                @else
                                    <td>{{$i}}</td>
                                    <td></td>
                                @endif

                                @if(isset($jobSheet->tps[$i + ceil(8)]))
                                    <td>{{ $jobSheet->tps[$i + ceil(8)]->id ?? '' }}</td>
                                    <td>{{ $jobSheet->tps[$i + ceil(8)]->name ?? '' }}</td>



                                @else
                                    <td>{{$i}}</td>
                                    <td></td>
                                @endif
                            </tr>
                        @endfor
                     </tbody>
                 </table>
             </div>
        </div>
        <!----paperhistories --------------------------------------------->
         <div class="row">
             <div class="col-md-12 table-responsive mt-5 ">

                 <table class="w-100" id="">


                     <tbody>
                        @if(count($jobSheet->paperhistories) > 0)
                         @foreach($jobSheet->paperhistories as $paperhistory)
                         <tr>
                             <td><b><span>Paper History: </span></b> </td>
                             <td><b><span>Tax Token: </span></b>{{$paperhistory->tax_token}}</td>
                             <td><b><span>Fitness: </span></b>{{$paperhistory->fitness}}</td>
                             <td><b><span>Milage:</span></b>{{$paperhistory->milage}}</td>
                         </tr>
                         @endforeach
                         @else

                         <tr>
                            <td class="bg-white"><b><span>Paper History: </span></b> </td>
                            <td class="bg-yellow"><b><span>Tax Token: </span></b></td>
                            <td class="bg-white"><b><span>Fitness: </span></b></td>
                            <td class="bg-yellow"><b><span>Milage:</span></b></td>
                         </tr>
                         @endif
                     </tbody>
                 </table>
             </div>
         </div>

        <!----spvs --------------------------------------------->
        <div class="row text-center">
            <div class="col-md-6 col-sm-6 pe-0 me-0 ms-0">
                <table class="w-100" style="background:lightgreen;">
                     <tr>
                         <th class="no">No.</th>
                         <th class="parts">Spare Parts</th>
                         <th class="price">Price</th>

                     </tr>

                     <?php
                      $partstotal = 0;
                     ?>
                     @php($totalspvs = count($jobSheet->spvs))
                     @for($i = 1; $i <=25; $i++)
                     @if($i <= $totalspvs)

                     <!-- Table Rows for Spare Parts -->
                     @foreach($jobSheet->spvs as $key=>$spv)
                     @if(++$key == $i )
                     <tr>
                         <td>{{ $loop->iteration}}</td>
                         <td>{{$spv->parts_name}}</td>
                         <td class="price">{{$spv->price}}</td>
                         <?php

                         $partstotal+= $spv->price ?>
                     </tr>
                     @endif
                     @endforeach
                     @else
                            <tr>
                                <td>{{$i}}</td>
                                <td></td>
                                <td></td>
                            </tr>

                     @endif
                     @endfor
                     <!-- Row for Total -->
                     {{-- <tr class="total">

                         <td colspan="3">Total: <?php echo $partstotal ?></td>
                     </tr> --}}


                 </table>
             </div>

             <div class="col-md-6 col-sm-6 ps-0 ms-0 me-0 ">

                <table class="w-100">
                    <tr class="bg-green">

                        <th class="parts">date of Advance</th>
                        <th class="price">Taka</th>

                    </tr>


                    <?php
                     $advancetotal = 0;
                    ?>
                     @php($totaladps = count($jobSheet->adps))
                     @for($i = 1; $i <=10; $i++)
                     @if($i <= $totaladps)

                     <!-- Table Rows for Spare Parts -->
                     @foreach($jobSheet->adps as $key=>$adp)
                     @if(++$key == $i )
                    <tr class="bg-green">

                        <td>{{$adp->date}}</td>
                        <td class="price">{{$adp->amount}}</td>
                        <?php

                        $advancetotal+= $adp->amount ?>
                    </tr>
                   @endif
                     @endforeach
                     @else
                            <tr class="bg-green">
                                <td style="height:31px;">.</td>
                                <td></td>
                            </tr>

                     @endif
                     @endfor



                    <!-- Row for Total -->
                    <tr class="total bg-red">

                        <td ><b>Total</b> </td>
                        <td><?php echo $advancetotal ?></td>
                    </tr>


                @if(count($jobSheet->twbs) > 0)
                    @foreach ($jobSheet->twbs as $twb)

                     <tr>
                        <td style="background:#525252;color: white;"><b>Total Works Bill</b></td>
                        <td class="rowdubble">{{$twb->price ?? 0}}</td>
                    </tr>

                    @endforeach

                    @else

                    <tr>
                        <td style="background:#525252;color: white;"><b>Total Works Bill</b></td>
                        <td class="rowdubble">0</td>
                    </tr>
                    @endif


                    @if(count($jobSheet->engines) > 0)
                   @foreach($jobSheet->engines as $engine)
                    <tr>
                        <td style="background:#203764;color: white;"><b>Engine</b></td>
                        <td class="rowdubble">{{$engine->price ?? 0}}</td>
                    </tr>
                    @endforeach

                    @else

                    <tr>
                        <td style="background:#203764;color: white;"><b>Engine</b></td>
                        <td class="rowdubble">0</td>
                    </tr>
                    @endif



                    @if(count($jobSheet->dentings) > 0)
                    @foreach($jobSheet->dentings as $denting)
                    <tr>
                        <td style="background:#806000;color: white;"><b>Denting</b></td>
                        <td class="rowdubble">{{$denting->price}}</td>
                    </tr>

                    @endforeach
                    @else

                    <tr>
                        <td style="background:#806000;color: white;"><b>Denting</b></td>
                        <td class="rowdubble">0</td>
                    </tr>
                    @endif

                    @if(count($jobSheet->paintings) > 0)
                    @foreach($jobSheet->paintings as $painting)
                    <tr>
                        <td style="background:#375623;color: white;"><b>Painting</b></td>
                        <td class="rowdubble">{{$painting->price}}</td>
                    </tr>
                    @endforeach

                    @else

                    <tr>
                        <td style="background:#375623;color: white;"><b>Painting</b></td>
                        <td class="rowdubble">0</td>
                    </tr>
                    @endif
                    @if(count($jobSheet->warrings) > 0)
                    @foreach($jobSheet->warrings as $warring)
                    <tr>
                        <td style="background:#7030a0;color: white;"><b>Warring A/C</b></td>
                        <td class="rowdubble">{{$warring->price}}</td>
                    </tr>
                    @endforeach
                    @else

                    <tr>
                        <td style="background:#7030a0;color: white;"><b>Warring A/C</b></td>
                        <td class="rowdubble">0</td>
                    </tr>
                    @endif

                    <tr>
                        <td style="background:red;color: white;color: white;"><b>Parts</b></td>
                        <td class="rowdubble"><?php echo $partstotal ?></td>
                    </tr>

                    <tr>
                        <?php $totalBill = (count($jobSheet->twbs) > 0 ? $jobSheet->twbs[0]->price : 0) + (count($jobSheet->engines) > 0 ? $jobSheet->engines[0]->price : 0) + (count($jobSheet->dentings)> 0 ? $jobSheet->dentings[0]->price : 0) + (count($jobSheet->paintings) > 0? $jobSheet->paintings[0]->price : 0) + (count($jobSheet->warrings)> 0 ? $jobSheet->warrings[0]->price : 0)

    + $partstotal ?>
                        <td class="rowdubbletow text-right"><b>Total Bill=</b></td>
                        <td class="rowdubbletow_part"><?php echo $totalBill ?? 0 ?></td>
                    </tr>

                    <tr>
                        <td class="rowdubbletow text-right"><b>Advance=</b></td>
                        <td class="rowdubbletow_part"><?php echo $advancetotal ?></td>
                    </tr>

                    <tr>
                        <?php $due =$totalBill -$advancetotal?>
                        <td class="rowdubbletow text-right"><b>Due=</b></td>
                        <td class="rowdubbletow_part"><?php echo $due ?></td>
                    </tr>

                </table>
            </div>

            <div class="row mt-5">
                <div class="col-md-6">
                    <input type="text">
                    <p>Customer Signature</p>

                </div>
                <div class="col-md-6 text-end">
                    <input type="text">
                    <p>Authorized Signature</p>
                </div>
            </div>

            <div class="row ignore mt-5 mb-5">
                <div class="col-md-3 mx-auto">
                    <tr >
                        <td colspan="4"></td>
                        <td class="text-right"></td>
                        <td class="text-right" colspan="2">
                            <button type="button" class="float-end print-btn btn btn-success">Print</button>
                        </td>
                    </tr>
                </div>
            </div>
        </div>
       
        </div>
    </div>
</div>
@endsection

@push('script')
<script src="{{ asset('/') }}bootstrap-5.3.3-dist/js/jqueryPrint.doersGuild.min.js"></script>
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
</script>


@endpush




