@extends('backend.master')

@section('title', 'Search')



@section('body')
    <h2>Search Results for "{{ $search }}"</h2>
{{--
    <h3>Jobsheets</h3>
    @if($jobsheets->isEmpty())
        <p>No jobsheets found.</p>
    @else
        <table border="1">
            <thead>
                <tr>
                    <th>Job Number</th>

                    <th>Mobile</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($jobsheets as $jobsheet)
                    <tr>
                        <td>{{ $jobsheet->job_no }}</td>

                        <td>{{ $jobsheet->mobile }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif --}}

    <h3>Customers</h3>
    @if($customers->isEmpty())
        <p>No Customers found.</p>
    @else
        <table border="1">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Mobile</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customers as $customer)
                    <tr>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->mobile }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    {{-- <h3>Invoices</h3>
    @if($invoices->isEmpty())
        <p>No Invoices found.</p>
    @else
        <table border="1">
            <thead>
                <tr>
                    <th>Invoices Number</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($invoices as $invoice)
                    <tr>
                        <td>{{ $invoices->invoice_number }}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif --}}
@endsection
