

<div class="modal fade" id="mymodal" >
    <div class="modal-dialog modal-fullscreen-md-down modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Vehicle</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form
                action="{{ isset($vehicle) ? route('vehicles.update', $vehicle->id) : route('vehicles.store') }}"
                method="post" enctype="multipart/form-data">
                @csrf
                @if (isset($vehicle))
                    @method('put')
                @endif

                <div class="row mt-3">
                    <div class="col-md-4">
                        <label for="" class=""> Vehicle Brand Name</label>
                        <div class="">
                            <select name="vehicle_brand_id" class=" form-control " data-toggle="select"
                                data-placeholder="Choose ...">
                                <option value="">Select a Vehicle Brand</option>
                                @foreach ($vehicleBrands as $vehicleBrand)
                                    <option value="{{ $vehicleBrand->id }}"
                                        >
                                        {{ $vehicleBrand->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('vehicle_brand_id')
                            <span class="text-danger">{{ $errors->first('vehicle_brand_id') }}</span>
                        @enderror
                    </div>






                    <div class="col-md-4">
                        <label for="" class=""> Vehicle Type</label>

                        <select name="vehicle_type_id" class=" form-control " data-toggle="select"
                            data-placeholder="Choose ...">
                            <option value="">Select a Vehicle Type</option>
                            @foreach ($vehicleTypes as $vehicleType)
                                <option value="{{ $vehicleType->id }}"
                                    >
                                    {{ $vehicleType->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('vehicle_type_id')
                        <span class="text-danger">{{ $errors->first('vehicle_type_id') }}</span>
                    @enderror


                    <div class="col-md-4">
                        <label for="" class=""> Vehicle Color</label>

                        <select name="vehicle_color_id" class=" form-control " data-toggle="select"
                            data-placeholder="Choose ...">
                            <option value="">Select a Vehicle Color</option>
                            @foreach ($vehicleColors as $vehicleColor)
                                <option value="{{ $vehicleColor->id }}"
                                    >
                                    {{ $vehicleColor->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('vehicle_color_id')
                        <span class="text-danger">{{ $errors->first('vehicle_color_id') }}</span>
                    @enderror
                </div>

                <div class="row mt-3">

                    <div class="col-md-4">
                        <label for="" class="">Vehicle Model</label>
                        <div class="">
                            <input type="text" name="vehicle_model" class="form-control"
                                value="{{ isset($vehicle) ? $vehicle->vehicle_model : '' }}"
                                placeholder=" Vehicle Model" />
                        </div>
                        @error('vehicle_model')
                            <span class="text-danger">{{ $errors->first('vehicle_model') }}</span>
                        @enderror
                    </div>


                    <div class="col-md-4">
                        <label for="" class="">Vehicle Current Milage</label>
                        <div class="">
                            <input type="text" name="vehicle_current_milage" class="form-control"
                                value="{{ isset($vehicle) ? $vehicle->vehicle_current_milage : '' }}"
                                placeholder=" Vehicle Current Milage" />
                        </div>
                        @error('vehicle_current_milage')
                            <span class="text-danger">{{ $errors->first('vehicle_current_milage') }}</span>
                        @enderror
                    </div>


                    <div class="col-md-4">
                        <label for="" class="">Vehicle Number</label>
                        <div class="">
                            <input type="text" name="vehicle_number" class="form-control"
                                value="{{ isset($vehicle) ? $vehicle->vehicle_number : '' }}"
                                placeholder=" Vehicle Number" />
                        </div>
                        @error('vehicle_number')
                            <span class="text-danger">{{ $errors->first('vehicle_number') }}</span>
                        @enderror
                    </div>
                </div>








                        <div class="row mt-3">
                            <label for="" class="col-md-4"></label>
                            <div class="col-md-9">
                                <input type="submit" class="btn btn-success"
                                    value="{{ isset($vehicle) ? 'update' : 'Create' }} Vehicle">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            </div>

        </div>
    </div>
</div>


