@push('style')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endpush

<div class="modal fade" id="mymodal" >
    <div class="modal-dialog modal-fullscreen-md-down modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Customer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
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
                    {{-- <div class="row mt-3">
                        <label for="vehicle" class="col-md-4">Vehicle Number</label>
                        <div class="col-md-8">
                            <input type="text" name="vehicle_number" id="vehicle" class="form-control" />
                        </div>
                    </div> --}}

                     <div class="row mt-3">

                                <label for="" class="col-md-4">Vehicle Number</label>
                                <div class="col-md-8">
                                    <select name="vehicle_number" class=" form-control js-example-basic-single " id="vehicle">
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
                                <input type="button" class="btn btn-danger" data-bs-dismiss="modal" value="Close">
                                <input type="submit" class="btn btn-primary" >
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

@push('script')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>

@endpush
