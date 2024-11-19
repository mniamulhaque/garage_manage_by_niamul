@extends('backend.master')

@section('title')
    Customer
@endsection

@push('style')

@endpush


@section('body')

            <div class="row mt-5">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-light">
                            <h3>Manage Customer</h3>
                    <a href="{{ route('customers.create') }}" class="btn btn-success btn-sm position-absolute me-5" style="right: 0">Create</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="myTable">
                                    <thead style="border: 3px solid black">
                                    <tr>
                                        <th>SL</th>
                                        <th>Customer Number</th>                                        <th>Name</th>
                                        <th>Mobile</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($customers as $customer)
                                        <tr style="border: 3px solid black">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $customer->id }}</td>
                                            <td>{{ $customer->name }}</td>
                                            <td>{{ $customer->mobile }}</td>
                                            <td>{{ $customer->email }}</td>
                                            <td>{{ $customer->address }}</td>
                                            <td class="d-flex" style="border: none">
                                                <a href="{{ route('invoices.index', ['customer' => $customer->id]) }}" class="btn btn-success btn-sm mr-2 me-1">generate</a>
                                                <a href="#" class="btn btn-primary btn-sm mr-2 edit me-1" data-id="{{ $customer->id }}">edit</a>
                                                <form action="{{ route('customers.destroy', $customer->id) }}" method="post" id="deleteItem">
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


    @include('backend.customers.modal')
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
                    $('#vehicle').select2();
                    $('#address').text(response.address);
                    $('#email').val(response.email);
                    $('form').attr('action', "{{ url('/') }}/customers/"+response.id).append('<input type="hidden" name="_method" value="put">');
                    // $('#mymodal').modal({show: true});
                    var myModal = new bootstrap.Modal(document.getElementById('mymodal'));

                    myModal.show();
                }
            })
        })
    </script>
@endpush

