@extends('backend.master')

@section('title')
    Invoice
@endsection

@section('body')

            <div class="row mt-5">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-light">
                            <h3>Manage Invoice</h3>
                    <a href="{{ route('invoices.create') }}" class="btn btn-success btn-sm position-absolute me-5" style="right: 0">Create</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table"id="myTable">
                                    <thead style="border: 3px solid black">
                                    <tr>
                                        <th>Invoice Number</th>
                                        <th>Customer Name</th>
                                        <th>Mobile</th>
                                        <th>Vehicle Number</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Sub Total</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($invoices as $invoice)
                                        <tr style="border: 3px solid black">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $invoice->customer->name }}</td>
                                            <td>{{ $invoice->customer->mobile }}</td>
                                            <td>{{ $invoice->customer->vehicle_number }}</td>
                                            <td>{{ $invoice->customer->email }}</td>
                                            <td>{{ $invoice->customer->address }}</td>
                                            <td>{{$invoice->sub_total}}</td>
                                            <td>{{$invoice->total}}</td>
                                            <td class="d-flex" style="border: none">

                                                <a href="{{ route('invoices.show', $invoice->id) }}" class="btn btn-primary btn-sm mr-2 me-1 edit" >Detail</a>



                                                <form action="{{ route('invoices.destroy', $invoice->id) }}" method="post" id="deleteItem">
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


@endsection



