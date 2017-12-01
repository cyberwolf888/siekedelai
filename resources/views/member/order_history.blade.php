@extends('layouts.frontend')

@push('plugin_css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">

@endpush

@section('content')
    <!-- Titlebar
================================================== -->
    <section class="titlebar">
        <div class="container">
            <div class="sixteen columns">
                <h2>Order History</h2>

                <nav id="breadcrumbs">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Member</a></li>
                        <li>Order History</li>
                    </ul>
                </nav>
            </div>
        </div>
    </section>


    <div class="container">
        <div class="twelve columns centered">
            <table class="table-bordered" id="table_orderhistory">
                <thead>
                <tr>
                    <th>Order No</th>
                    <th>Order Status</th>
                    <th>Total</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
                <tbody>
                @foreach($model as $row)
                    <tr>
                        <td>{{ $row->id }}</td>
                        <td>
                            {{ $row->getStatus($row->status) }}
                            @if($row->resi != null)
                                <br>
                                No. Resi:
                                <br>
                                {{ $row->resi }}
                            @endif
                        </td>
                        <td>{{ 'Rp '.number_format($row->total,0,',','.') }}</td>
                        <td>{{ date("d M Y, H:i",strtotime($row->created_at)) }}</td>
                        <td>
                            <a class="button" href="{{ route('member.invoice',$row->id) }}"><i class="fa fa-book"></i> Invoice</a>
                            @if($row->status == 1)
                            <a class="button" href="{{ route('member.payment',$row->id) }}"><i class="fa fa-money"></i> Bayar</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
                </thead>
            </table>
        </div>

    </div>
    <div class="margin-top-50"></div>
@endsection

@push('plugin_scripts')
    <script src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#table_orderhistory').DataTable();
        } );
    </script>
@endpush