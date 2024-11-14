@extends('front.master')

@section('title')
    Home
@endsection

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-11 mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="float-start">Customers</h2>
                            <button type="button" class="btn btn-sm btn-primary float-end" data-bs-toggle="modal" data-bs-target="#mymodal">Create</button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Mobile</th>
                                        <th>Vehicle Number</th>
                                        <th>Address</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($customers as $customer)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $customer->name }}</td>
                                            <td>{{ $customer->mobile }}</td>
                                            <td>{{ $customer->vehicle_number }}</td>
                                            <td>{{ $customer->address }}</td>
                                            <td class="d-flex">
                                                <a href="{{ route('generate', ['customer' => $customer->id]) }}" class="btn btn-success btn-sm mr-2 ">generate</a>
                                                <a href="#" class="btn btn-primary btn-sm mr-2 edit" data-id="{{ $customer->id }}">edit</a>
                                                <form action="{{ route('customers.destroy', $customer->id) }}" method="post" onsubmit="return confirm('Are you sure to delete this?')">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm mr-2">delete</button>
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
    @include('front.customers.modal')
@endsection

@push('script')
    <script>
        $(document).on('click', '.edit', function (){
            event.preventDefault();

            $.ajax({
                url: "{{ url('/') }}/customers/"+$(this).attr('data-id')+"/edit",
                method: "GET",
                success: function (response) {
                    console.log(response);
                    $('#name').val(response.name);
                    $('#mobile').val(response.mobile);
                    $('#vehicle').val(response.vehicle_number);
                    $('#address').text(response.address);
                    $('form').attr('action', "{{ url('/') }}/customers/"+response.id).append('<input type="hidden" name="_method" value="put">');
                    // $('#mymodal').modal({show: true});
                    var myModal = new bootstrap.Modal(document.getElementById('mymodal'));

                    myModal.show();
                }
            })
        })
    </script>
@endpush

