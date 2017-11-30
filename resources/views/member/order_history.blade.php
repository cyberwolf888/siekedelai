@extends('layouts.frontend')

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
            <table class="table-bordered">
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
                        <td>{{ $row->getStatus($row->status) }}</td>
                        <td>{{ 'Rp '.number_format($row->total,0,',','.') }}</td>
                        <td>{{ date("d M Y, H:i",strtotime($row->created_at)) }}</td>
                        <td>
                            <a href="{{ url(route('backend.transaction.show', ['id' => $row->id])) }}" class="btn-floating blue" style="opacity: 1;"><i class="material-icons">subject</i></a>
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
@endpush