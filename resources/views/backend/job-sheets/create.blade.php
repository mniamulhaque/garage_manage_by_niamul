
@extends('backend.master')

@section('title', isset($jobSheet) ? 'Edit' : 'Create'.' Job Sheet')


@push('style')
<link rel="stylesheet" href="https://code.jquery.com/ui/1.14.0/themes/base/jquery-ui.css">



@endpush

@section('body')
    <div class="row mt-5">
        <div class="col-md-12 mx-auto">
            <div class="card">
                <div class="card-header bg-light">
                    <h3>{{ isset($jobSheet) ? 'update' : 'Create' }}Job Sheet</h3>
                    <a href="{{ route('job-sheets.index') }}" class="btn btn-success btn-sm position-absolute me-5"
                        style="right: 0"><i class="fa fa-sliders"></i></a>
                </div>
                <div class="card-body">
                    <form
                        action="{{ isset($jobSheet) ? route('job-sheets.update', $jobSheet->id) : route('job-sheets.store') }}"
                        method="post" enctype="multipart/form-data">
                        @csrf


                        @if (isset($jobSheet))
                            @method('put')
                        @endif

                        <div class="row mt-3">
                            <div class="col-md-4">
                                <label for="" class=""></label>



                                <div class="">


                                    <input type="text" name="job_no" class="form-control"
                                        value="{{ isset($jobSheet) ? $jobSheet->job_no : 1000 }}" readonly
                                        placeholder="Job No" />


                                </div>




                                @error('job_no')
                                    <span class="text-danger">{{ $errors->first('job_no') }}</span>
                                @enderror
                            </div>


                            <div class="col-md-4">
                                <label for="" class="">Date</label>

                                <div class="">
                                    <input  class="ms-2 form-control" name="date"  type="text" id="datepicker3" value="{{ date('m/d/Y') }}" >

                                </div>

                                @error('date')
                                    <span class="text-danger">{{ $errors->first('date') }}</span>
                                @enderror
                            </div>


                            <div class="col-md-4">
                                <label for="" class="">Owner Name</label>
                                <div class="">
                                    <select name="customer_id" id="name" class=" form-control " data-toggle="select"
                                        data-placeholder="Choose ...">
                                        <option value="">Select a Owner Name</option>
                                        @foreach ($customers as $customer)
                                            <option value="{{ $customer->id }}"
                                                {{ $errors->any() ? old('customer_id') : (isset($jobSheet) && $jobSheet->customer_id == $customer->id ? 'selected' : '') }}>
                                                {{ $customer->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('customer_id')
                                    <span class="text-danger">{{ $errors->first('customer_id') }}</span>
                                @enderror
                            </div>



                        </div>

                        <div class="row mt-3">


                            <div class="col-md-4">
                                <label for="" class="">Owner Mob</label>
                                <div class="">
                                    <input type="text" name="mob" class="form-control" id="mobileNumber"
                                    value="{{ isset($jobSheet) ? $jobSheet->mob : '' }}"
                                    placeholder="Owner Mob" />
                                </div>
                                @error('mob')
                                    <span class="text-danger">{{ $errors->first('mob') }}</span>
                                @enderror
                            </div>





                            <div class="col-md-4">
                                <label for="" class="">Vehicle No</label>

                                <select name="vehicle_id" id="vehicleNumber" class=" form-control " data-toggle="select"
                                    data-placeholder="Choose ...">
                                    <option value="">Select a Vehicle No</option>
                                    @foreach ($vehicles as $vehicle)
                                        <option value="{{ $vehicle->id }}"
                                            {{ $errors->any() ? old('vehicle_id') : (isset($jobSheet) && $jobSheet->vehicle_id == $vehicle->vehicle_id ? 'selected' : '') }}>
                                            {{ $vehicle->vehicle_number }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('vehicle_id')
                                <span class="text-danger">{{ $errors->first('vehicle_id') }}</span>
                            @enderror


                            <div class="col-md-4">
                                <label for="" class="">Color</label>


                           <div class="">
                                    <input type="text" name="color" class="form-control" id="color"
                                    value="{{ isset($jobSheet) ? $jobSheet->color : '' }}"
                                    placeholder="Vehicle Color" />
                                </div>
                            @error('color')
                                <span class="text-danger">{{ $errors->first('color') }}</span>
                            @enderror


                        </div>

                        <div class="row mt-3">

                            <div class="col-md-4">
                                <label for="" class="">Driver Name</label>

                                <div class="">
                                    <input type="text" name="driver_name" class="form-control"
                                        value="{{ isset($jobSheet) ? $jobSheet->driver_name : '' }}"
                                        placeholder="Driver Name" />
                                </div>

                                @error('driver_name')
                                    <span class="text-danger">{{ $errors->first('driver_name') }}</span>
                                @enderror
                            </div>



                            <div class="col-md-4">
                                <label for="" class="">Mob</label>

                                <div class="">
                                    <input type="text" name="mob" class="form-control"
                                        value="{{ isset($jobSheet) ? $jobSheet->mob : '' }}"
                                        placeholder="Mob" />
                                </div>

                                @error('mob')
                                    <span class="text-danger">{{ $errors->first('mob') }}</span>
                                @enderror
                            </div>


                            <div class="col-md-4">
                                <label for="" class="">Vehicle Incoming Date</label>

                                <div class="">
                                    <input type="text" name="vehicle_incoming_date"  class="form-control"   id="datepicker"
                                        value="{{ isset($jobSheet) ? $jobSheet->vehicle_incoming_date : date('m/d/Y')}}"
                                        placeholder="Vehicle Incoming Date" />
                                </div>

                                @error('vehicle_incoming_date')
                                    <span class="text-danger">{{ $errors->first('vehicle_incoming_date') }}</span>
                                @enderror
                            </div>






                        </div>

                        <div class="row mt-3">

                            <div class="col-md-4">
                                <label for="" class="">Vehicle Outgoing Date</label>

                                <div class="">
                                    <input type="text" name="vehicle_outgoing_date" class="form-control"  id="datepicker2"
                                        value="{{ isset($jobSheet) ? $jobSheet->vehicle_outgoing_date : date('m/d/Y')  }}"
                                        placeholder="Vehicle Outgoing Date" />
                                </div>

                                @error('vehicle_outgoing_date')
                                    <span class="text-danger">{{ $errors->first('vehicle_outgoing_date') }}</span>
                                @enderror
                            </div>


                            <div class="col-md-4">
                                <label for="" class="">Received By</label>

                                <div class="">
                                    <input type="text" name="received_by" class="form-control"
                                        value="{{ isset($jobSheet) ? $jobSheet->received_by :  auth()->user()->name }} "
                                        placeholder="Received By" />
                                </div>

                                @error('received_by')
                                    <span class="text-danger">{{ $errors->first('received_by') }}</span>
                                @enderror
                            </div>






                        </div>









                                <div class="row mt-3">
                                    <label for="" class="col-md-4"></label>
                                    <div class="col-md-9">
                                        <input type="submit" class="btn btn-success"
                                            value="{{ isset($jobSheet) ? 'update' : 'Create' }} job Sheet">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')

<script src="https://code.jquery.com/ui/1.14.0/jquery-ui.js"></script>


<script>
    $( function() {
      $( "#datepicker" ).datepicker();
    } );
    </script>

<script>
    $( function() {
      $( "#datepicker2" ).datepicker();
    } );
    </script>
    <script>
        $( function() {
          $( "#datepicker3" ).datepicker();
        } );
        </script>
<script>
  $(document).on('change', '#name', function (){
        event.preventDefault();

       var customerId =  $('#name').val();


        $.ajax({
            url: "{{ url('/') }}/customers/"+customerId,
            method: "GET",
            success: function (response) {
                console.log(response);
                $('#mobileNumber').val(response.mobile);

            }
        })
    })
    </script>


<script>
    $(document).on('change', '#vehicleNumber', function (){
          event.preventDefault();

         var vehicleId =  $('#vehicleNumber').val();


          $.ajax({
              url: "{{ url('/') }}/vehicles/"+vehicleId,
              method: "GET",
              success: function (response) {
                  console.log(response);
                  $('#color').val(response.color.name);

              }
          })
      })
      </script>


@endpush


