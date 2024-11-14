@extends('backend.master')

@section('title')
Vehicle Type
@endsection

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mx-auto">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between bg-light">
                            <h2 class="float-start">Vehicle Types</h2>
                            <button type="button" class="btn btn-sm btn-primary float-end" data-bs-toggle="modal" data-bs-target="#mymodal">Create</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead style="border: 3px solid black">
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($vehicleTypes as $vehicleType)
                                        <tr style="border: 3px solid black">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $vehicleType->name }}</td>

                                            <td class="d-flex" style="border: none">
                                                <a href="#" class="btn btn-primary btn-sm mr-2 edit me-1" data-id="{{ $vehicleType->id }}">edit</a>
                                                <form action="{{ route('vehicle-types.destroy', $vehicleType->id) }}" method="post" id="deleteItem">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm mr-2 delete-item">delete</button>
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
        </div>
    </section>
    @include('backend.vehicle-types.modal')
@endsection

@push('script')
    <script>
        $(document).on('click', '.edit', function (){
            event.preventDefault();

            $.ajax({
                url: "{{ url('/') }}/vehicle-types/"+$(this).attr('data-id')+"/edit",
                method: "GET",
                success: function (response) {
                    console.log(response);
                    $('#name').val(response.name);
                    $('form').attr('action', "{{ url('/') }}/vehicle-types/"+response.id).append('<input type="hidden" name="_method" value="put">');
                    // $('#mymodal').modal({show: true});
                    var myModal = new bootstrap.Modal(document.getElementById('mymodal'));

                    myModal.show();
                }
            })
        })
    </script>
@endpush

