@extends('backend.master')

@section('title')
    Dashboard
@endsection


@section('body')

<div class="mt-5 text-center"><u><h3>Dashboard</h3></u></div>
    <div class=" row mt-8">

        <div class="col-md-3">
            <div class="card bg-light mb-3" style="">

                <div class="card-body text-center">
                  <h5 class="card-title">
                    TOTAL CUSTOMER : {{$totalCustomers}}
                    </h5>
                    <a href="{{ route('customers.index') }}">click</a>
                </div>
              </div>
        </div>
     <div class="col-md-3"> <div class="card bg-light mb-3" style="">

        <div class="card-body text-center">
          <h5 class="card-title">TOTAL VEHICLE : {{$totalVehicles}}</h5>
          <a href="{{ route('vehicles.index') }}">click</a>
        </div>
      </div>
    </div>



    <div class="col-md-3">
        <div class="card bg-light mb-3" style="">

            <div class="card-body text-center">
              <h5 class="card-title">TOTAL JOB SHEET : {{$totalJobSheets}}</h5>
              <a href="{{ route('job-sheets.index') }}">click</a>
            </div>
          </div>
    </div>




<div class="col-md-3">
    <div class="card bg-light mb-3" style="">

        <div class="card-body text-center">
          <h5 class="card-title">
            TODAY JOB SHEET : {{ $todaysJobSheets}}
            </h5>
            <a href="{{ route('tjs') }}">click</a>
        </div>
      </div>
</div>



    </div>
@endsection


