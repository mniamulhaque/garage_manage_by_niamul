@extends('backend.master')

@section('title', 'Manage job
Sheet')

@section('body')
    <div class="row mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-light">
                    <h3>Manage job Sheet</h3>
                    <a href="{{ route('job-sheets.create') }}" class="btn btn-success btn-sm position-absolute me-5" style="right: 0">Create</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table " id="myTable" >
                        <thead style="border: 3px solid black">
                        <th>SL</th>
                        <th>JOB NUMBER</th>
                        <th>OWNER NAME</th>
                        <th>PHONE</th>
                        <th>Action</th>
                        </thead>
                        <tbody>
                        @foreach($todaysJobSheets as $todayJobSheet)
                            <tr style="border: 3px solid black">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $todayJobSheet->job_no }}</td>
                                <td>{{ $todayJobSheet->customer->name ?? ''}}</td>
                                <td>{{ $todayJobSheet->customer->mobile ?? ''}}</td>
                                <td class="d-flex" style="border: none">
                                    <a href="{{ route('job-sheets.edit', $todayJobSheet->id) }}" class="btn btn-sm btn-warning">EDIT</a>


                                    <form action="{{ route('job-sheets.destroy', $todayJobSheet->id) }}" method="post" id="deleteItem">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-sm btn-danger ms-1 delete-item me-1">DELETE</button>
                                    </form>

                                    <a href="{{ route('job-sheets.show', $todayJobSheet->id) }}" class="btn btn-sm btn-primary me-1">VIEW</a>

                                    <a href="{{ route('wd', $todayJobSheet->id) }}" class="btn btn-sm btn-secondary me-1">Work Description</a>

                                    <a href="{{ route('tp', $todayJobSheet->id) }}" class="btn btn-sm btn-success me-1">Tools and Paper</a>

                                    <a href="{{ route('ph', $todayJobSheet->id) }}" class="btn btn-sm  me-1" style="background-color:darkblue;color:white">Paper History</a>

                                    <a href="{{ route('spv', $todayJobSheet->id) }}" class="btn btn-sm btn-info me-1">Spare Parts of Vehicle</a>

                                    <a href="{{ route('adp', $todayJobSheet->id) }}" class="btn btn-sm  me-1" style="background-color:indigo;color:white">Date of Advance</a>

                                    <a href="{{ route('twb', $todayJobSheet->id) }}" class="btn btn-sm btn-dark me-1">Total Works Bill</a>

                                    <a href="{{ route('engine', $todayJobSheet->id) }}" class="btn btn-sm  me-1" style="background-color:brown;color:white">Engine</a>

                                    <a href="{{ route('denting', $todayJobSheet->id) }}" class="btn btn-sm me-1" style="background-color:chocolate;color:white">Denting</a>

                                    <a href="{{ route('painting', $todayJobSheet->id) }}"class="btn btn-sm  me-1" style="background-color:darkturquoise;color:white">Painting</a>

                                    <a href="{{ route('warring', $todayJobSheet->id) }}" class="btn btn-sm me-1" style="background-color:hotpink;color:white">Warring</a>
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