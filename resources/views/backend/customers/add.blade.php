
@extends('backend.master')

@section('title','Create Customer')

@push('style')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endpush


@section('body')
    <div class="row mt-5">
        <div class="col-md-12 mx-auto">
            <div class="card">
                <div class="card-header bg-light">
                    <h3>Create Customer</h3>
                    <a href="{{ route('customers.index') }}" class="btn btn-success btn-sm position-absolute me-5"
                        style="right: 0"><i class="fa fa-sliders"></i></a>
                </div>
                <div class="card-body">
                    <form action="{{ route('customers.store') }}" method="post">
                        @csrf

                        <div class="row">
                            <label for="name" class="col-md-4">Customer Name</label>
                            <div class="col-md-8">
                                <input type="text" name="name" id="name" class="form-control" />
                            </div>
                        </div>

                        <div class="row mt-3">
                            <label for="email" class="col-md-4">Email</label>
                            <div class="col-md-8">
                                <input type="text" name="email" id="email" class="form-control" />
                            </div>
                        </div>
                        <div class="row mt-3">
                            <label for="mobile" class="col-md-4">Mobile</label>
                            <div class="col-md-8">
                                <input type="text" name="mobile" id="mobile" class="form-control" />
                            </div>
                        </div>
                        <div class="row mt-3">

                                <label for="" class="col-md-4">Vehicle Number</label>
                                <div class="col-md-6" >
                                    <div style="width: 100% !important">
                                        <select name="vehicle_number" class=" form-control js-example-basic-single" >
                                            <option value="" selected hidden>--Select a Vehicle Number-- </option>
                                            @foreach ($vehicles as $vehicle)
                                                <option value="{{ $vehicle->vehicle_number }}">
                                                    {{ $vehicle->vehicle_number }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('vehicle_number')
                                        <span class="text-danger">{{ $errors->first('vehicle_number') }}</span>
                                    @enderror

                                    </div>
                                    <div class="col-md-2"><a class="btn float-end btn-primary" href="{{ route('vehicles.create',['rf' => 'customerCreate']) }}">Create</a></div>





                        </div>
                        <div class="row mt-3">
                            <label for="address" class="col-md-4">Address</label>
                            <div class="col-md-8">
                                <textarea name="address" class="form-control" id="address" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <label for="" class="col-md-4"></label>
                            <div class="col-md-8 ">
                                <div class="float-end">

                                    <input type="submit" class="btn btn-primary" >
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>

@endpush


