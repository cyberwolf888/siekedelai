@extends('layouts.backend')

@section('content')
    <main class="mn-inner inner-active-sidebar">
            <div class="row no-m-t no-m-b">
                <div class="col s12 m12 l4">
                    <div class="card stats-card">
                        <div class="card-content">
                            <div class="card-options">
                                <ul>
                                    <li class="red-text"><span class="badge cyan lighten-1">netto</span></li>
                                </ul>
                            </div>
                            <span class="card-title">Sales</span>
                            <span class="stats-counter">Rp <span class="">{{ number_format($sales,0,',','.') }}</span><small>This week</small></span>
                        </div>
                        <div class="progress stats-card-progress">
                            <div class="determinate" style="width: 100%"></div>
                        </div>
                    </div>
                </div>
                <div class="col s12 m12 l4">
                    <div class="card stats-card">
                        <div class="card-content">
                            <div class="card-options">
                                <!-- <ul>
                                    <li><a href="javascript:void(0)"><i class="material-icons">more_vert</i></a></li>
                                </ul> -->
                            </div>
                            <span class="card-title">New Member</span>
                            <span class="stats-counter"><span class="counter">{{ $member }}</span><small>This month</small></span>
                        </div>
                        <div class="progress stats-card-progress">
                            <div class="determinate" style="width: 100%"></div>
                        </div>
                    </div>
                </div>
                <div class="col s12 m12 l4">
                    <div class="card stats-card">
                        <div class="card-content">
                            <span class="card-title">Total Transaction</span>
                            <span class="stats-counter"><span class="counter">{{ $count_transaction }}</span><small>This week</small></span>
                        </div>
                        <div class="progress stats-card-progress">
                            <div class="determinate" style="width: 100%"></div>
                        </div>
                    </div>
                </div>
            </div>
        <div class="row no-m-t no-m-b">
            <div class="col s12 m12 l12">
                <div class="card invoices-card">
                    <div class="card-content">
                        <div class="card-options">
                        </div>
                        <span class="card-title">Last 5 Transaction</span>
                        <table class="responsive-table bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Created Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($transaction as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->fullname }}</td>
                                    <td>{{ $row->phone }}</td>
                                    <td>{{ 'Rp '.number_format($row->total,0,',','.') }}</td>
                                    <td>{{ $row->getStatus($row->status) }}</td>
                                    <td>{{ date("d M Y, H:i",strtotime($row->created_at)) }}</td>
                                    <td>
                                        <a href="{{ route('backend.transaction.show',$row->id) }}" class="btn-floating blue" style="opacity: 1;"><i class="material-icons" style="color: white;">subject</i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('plugin_scripts')
<script src="{{ url('assets/backend') }}/plugins/counter-up-master/jquery.counterup.min.js"></script>
@endpush

@push('scripts')
<script>
    $( document ).ready(function() {
        // CounterUp Plugin
        $('.counter').each(function () {
            $(this).prop('Counter',0).animate({
                Counter: $(this).text()
            }, {
                duration: 3500,
                easing: 'swing',
                step: function (now) {
                    $(this).text(Math.ceil(now));
                    $(this).text($(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
                }
            });
        });
    });
</script>
@endpush