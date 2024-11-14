@extends('backend.master')

@section('title', 'Manage Vehicle')

@section('body')
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-light">
                    <h3>Manage Vehicle</h3>
                    <a href="{{ route('vehicles.create') }}" class="btn btn-success btn-sm position-absolute me-5" style="right: 0">Create</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table" id="">
                        <thead style="border: 3px solid black">
                        <th>SL</th>
                        <th>Vehicle Number</th>
                        <th>Vehicle Brand Name</th>
                        <th>Vehicle Type Name</th>
                        <th>Vehicle Model Name</th>
                        <th>Vehicle Color</th>
                        <th>Vehicle Current Milage</th>
                        <th>Action</th>
                        </thead>
                        <tbody>
                        @foreach($vehicles as $vehicle)
                            <tr style="border: 3px solid black">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $vehicle->vehicle_number }}</td>
                                <td>{{ $vehicle->vehicleBrand->name ?? ''}}</td>
                                <td>{{ $vehicle->vehicleType->name ?? ''}}</td>
                                <td>{{ $vehicle->vehicle_model }}</td>
                                <td>{{ $vehicle->color->name ?? ''}}</td>
                                <td>{{ $vehicle->vehicle_current_milage }}</td>
                                <td class="d-flex" style="border: none">
                                    <a href="{{ route('vehicles.edit', $vehicle->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('vehicles.destroy', $vehicle->id) }}" method="post" id="deleteItem">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-sm btn-danger ms-1 delete-item">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
