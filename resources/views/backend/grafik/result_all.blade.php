@extends('layouts.backend')

@push('plugin_css')
    <link href="{{ url('assets/backend') }}/css/styles.css" type="text/css" rel="stylesheet">                                     <!-- Core CSS with all styles -->
    <link href="{{ url('assets/backend') }}/plugins/sweetalert/sweetalert.css" rel="stylesheet" type="text/css"/>
    <link href="{{ url('assets/backend') }}/plugins/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <style>
        .margin-right-10{
            margin-right: 10px;
        }
    </style>
@endpush

@section('content')
    <main class="mn-inner">
        <div class="row no-m-t no-m-b">
            <div class="col s12 m12 l4"></div>
            <div class="col s12 m12 l4">
                <div class="panel panel-default" data-widget='{"draggable": "false"}'>
                    <div class="panel-heading">
                        <h2>Pie Chart</h2>
                        <div class="panel-ctrls" data-actions-container="" data-action-collapse='{"target": ".panel-body"}'></div>
                    </div>
                    <div class="panel-body">
                        <div id="graph0" style="width:100%; height: 300px" class="centered"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col s12">
                <div class="page-title">Report Transaction</div>
            </div>
            <div class="col s12 m12 l12">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Report Periode {{ date('d F Y',strtotime($start_date)) }} - {{ date('d F Y',strtotime($end_date)) }}</span>
                        <table id="example" class="display responsive-table datatable-example">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Jumlah</th>
                                <th>Transaksi</th>
                                <th>Status</th>
                                <th>Created Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Jumlah</th>
                                <th>Transaksi</th>
                                <th>Status</th>
                                <th>Created Date</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <?php $no = 1; ?>
                            @foreach($model as $row)
                                <tr>
                                    <td>{{ $no }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->total }}</td>
                                    <td>{{ $row->transaction }}</td>
                                    <td>{{ $row->status }}</td>
                                    <td>{{ date("d M Y, H:i",strtotime($row->created_at)) }}</td>
                                    <td>
                                        <a href="{{ url(route('backend.transaction.show', ['id' => $row->transaction])) }}" class="btn-floating blue" style="opacity: 1;"><i class="material-icons">subject</i></a>
                                    </td>
                                </tr>
                                <?php $no++; ?>
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
    <script src="{{ url('assets/backend') }}/plugins/sweetalert/sweetalert.min.js"></script>
    <script src="{{ url('assets/backend') }}/plugins/datatables/js/jquery.dataTables.min.js"></script>
    <script src="{{ url('assets/backend') }}/datatables/dataTables.buttons.min.js"></script>
    <script src="{{ url('assets/backend') }}/datatables/jszip.min.js"></script>
    <script src="{{ url('assets/backend') }}/datatables/pdfmake.min.js"></script>
    <script src="{{ url('assets/backend') }}/datatables/vfs_fonts.js"></script>
    <script src="{{ url('assets/backend') }}/datatables/buttons.html5.min.js"></script>

    <script src="{{ url('assets/backend') }}/plugins/charts-flot/jquery.flot.min.js"></script>             <!-- Flot Main File -->
    <script src="{{ url('assets/backend') }}/plugins/charts-flot/jquery.flot.pie.min.js"></script>         <!-- Flot Pie Chart Plugin -->
    <script src="{{ url('assets/backend') }}/plugins/charts-flot/jquery.flot.resize.js"></script>          <!-- Flot Responsive -->

    <script src="{{ url('assets/backend') }}/plugins/charts-flot/jquery.flot.tooltip.min.js"></script>    <!-- Flot Tooltips -->
@endpush

@push('scripts')
    <script>
        $(document).ready(function() {
            // data
            var datax = [
                <?= $datax ?>
            ];

            $.plot($("#graph0"), datax,
                {
                    series: {
                        pie: {
                            show: true
                        }
                    },
                    legend: {
                        show: false
                    },
                    grid: {
                        hoverable: true
                    },
                    tooltip: true,
                    tooltipOpts: {
                        content: "%p.0%, %s"
                    }
                });

            var buttonCommon = {
                exportOptions: {
                    format: {
                        body: function ( data, row, column, node ) {
                            // Strip $ from salary column to make it numeric
                            return column === 3 ?
                                data.replace( /[Rp .]/g, '' ) :
                                data;
                        }
                    }
                }
            };

            $('#example').DataTable({
                language: {
                    searchPlaceholder: 'Search records',
                    sSearch: '',
                    sLengthMenu: 'Show _MENU_',
                    sLength: 'dataTables_length',
                    oPaginate: {
                        sFirst: '<i class="material-icons">chevron_left</i>',
                        sPrevious: '<i class="material-icons">chevron_left</i>',
                        sNext: '<i class="material-icons">chevron_right</i>',
                        sLast: '<i class="material-icons">chevron_right</i>'
                    }
                },
                dom: 'Bfrtip',
                buttons: [
                    $.extend( true, {}, buttonCommon, {
                        extend: 'copyHtml5',
                        className:"btn btn-primary btn-raised margin-right-10",
                        exportOptions: {
                            columns: [ 0, 1, 2, 3, 4, 5 ]
                        }
                    } ),
                    $.extend( true, {}, buttonCommon, {
                        extend: 'excelHtml5',
                        className:"btn btn-primary btn-raised margin-right-10",
                        exportOptions: {
                            columns: [ 0, 1, 2, 3, 4, 5 ]
                        }
                    }),
                    {
                        extend: 'pdfHtml5',
                        className:"btn btn-primary btn-raised margin-right-10",
                        exportOptions: {
                            columns: [ 0, 1, 2, 3, 4, 5 ]
                        }
                    },
                    $.extend( true, {}, buttonCommon, {
                        extend: 'csvHtml5',
                        className:"btn btn-primary btn-raised margin-right-10",
                        exportOptions: {
                            columns: [ 0, 1, 2, 3, 4, 5 ]
                        }
                    })
                ]
            });
            $('.dataTables_length select').addClass('browser-default');
        });

        @if (session('success'))
        $(document).ready(function () {
            swal("Success!", "{{ session('success') }}", "success");
        })
        @endif
    </script>
@endpush