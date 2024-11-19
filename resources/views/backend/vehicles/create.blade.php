
@extends('backend.master')

@section('title', isset($vehicle) ? 'Edit' : 'Create'.' Vehicle')

@section('body')
    <div class="row mt-5">
        <div class="col-md-12 mx-auto">
            <div class="card">
                <div class="card-header bg-light">
                    <h3>{{ isset($vehicle) ? 'update' : 'Create' }}Vehicle</h3>
                    <a href="{{ route('vehicles.index') }}" class="btn btn-success btn-sm position-absolute me-5"
                        style="right: 0"><i class="fa fa-sliders"></i></a>
                </div>
                <div class="card-body">
                    <form
                        action="{{ isset($vehicle) ? route('vehicles.update', $vehicle->id) : route('vehicles.store') }}"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{$rf}}" name="rf"/>
                        @if (isset($vehicle))
                            @method('put')
                        @endif

                        <div class="row mt-3">
                            <div class="col-md-4">
                                <label for="" class=""> Vehicle Brand Name</label>
                                <div class="">
                                    <select name="vehicle_brand_id" class=" form-control " data-toggle="select"
                                        data-placeholder="Choose ..." required>
                                        <option value="">Select a Vehicle Brand</option>
                                        @foreach ($vehicleBrands as $vehicleBrand)
                                            <option value="{{ $vehicleBrand->id }}"
                                                {{ $errors->any() ? old('vehicle_brand_id') : (isset($vehicle) && $vehicle->vehicle_brand_id == $vehicleBrand->id ? 'selected' : '') }}>
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

                                <select name="vehicle_type_id" class=" form-control " data-toggle="select" required>
                                    <option value="">Select a Vehicle Type</option>
                                    @foreach ($vehicleTypes as $vehicleType)
                                        <option value="{{ $vehicleType->id }}"
                                            {{ $errors->any() ? old('vehicle_type_id') : (isset($vehicle) && $vehicle->vehicle_type_id == $vehicleType->id ? 'selected' : '') }}>
                                            {{ $vehicleType->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('vehicle_type_id')
                                <span class="text-danger">{{ $errors->first('vehicle_type_id') }}</span>
                            @enderror


                            <div class="col-md-4">
                                <label for="" class=""> Vehicle Color</label>

                                <select name="vehicle_color_id" class=" form-control " data-toggle="select" required>
                                    <option value="">Select a Vehicle Color</option>
                                    @foreach ($vehicleColors as $vehicleColor)
                                        <option value="{{ $vehicleColor->id }}"
                                            {{ $errors->any() ? old('vehicle_color_id') : (isset($vehicle) && $vehicle->vehicle_color_id == $vehicleColor->id ? 'selected' : '') }}>
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
                                        placeholder=" Vehicle Model" required/>
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
                                        placeholder=" Vehicle Current Milage" required/>
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
                                        placeholder=" Vehicle Number" required/>
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
@endsection


