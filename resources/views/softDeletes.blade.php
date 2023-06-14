@extends('layouts.app')

@section('container')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col position-absolute">
                    <h6 class="font-weight-bold text-primary mt-2 pt-1">DataTables Example</h6>
                </div>
                <div class="col text-right">
                    <a href="/create" role="button" class="btn btn-success btn-circle"><i class="fas fa-plus"></i></a>
                </div>
            </div>
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Hospital</th>
                            <th>Reference</th>
                            <th>Pharmacist</th>
                            <th>Deleted At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Hospital</th>
                            <th>Reference</th>
                            <th>Pharmacist</th>
                            <th>Deleted At</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($datas as $data)
                        <tr>
                            <td>{{ $data['nama'] }}</td>
                            @if($data['rujukan'] == 1)
                                <td>{{ $data['rumah_sakit'] }}</td>
                                <td>Ya</td>
                            @elseif($data['rujukan'] == null)
                                <td>Tidak Dirujuk</td>
                                <td>Tidak</td>
                            @endif
                            <td>
                                <!-- Collapsable Card -->
                                <div class="card">

                                    <!-- Card Header - Accordion -->
                                    <a href="#col{{ $data['id'] }}" class="d-block card-header py-3" data-toggle="collapse"
                                        role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                        <h6 class="m-0 font-weight-bold text-primary">{{ $data['apoteker'] }}</h6>
                                    </a>
                                    <!-- End Card Header - Accordion -->

                                    <!-- Card Content - Collapse -->
                                    <div class="collapse" id="col{{ $data['id'] }}">
                                        <div class="card-body">
                                            Medicine : {{ implode(', ', $data['obat']) }}
                                            <hr />
                                            Unit Price : {{ implode(', ', $data['harga_satuan']) }}
                                            <hr />
                                            Amount Price : {{ $data['total_harga'] }}
                                        </div>
                                    </div>
                                    <!-- End Card Content - Collapse -->

                                </div>
                                <!-- End Collapsable Card -->
                            </td>
                            <td>
                                <!-- Collapsable Card -->
                                <div class="card">

                                    <!-- Card Header - Accordion -->
                                    <a href="#col1{{ $data['id'] }}" class="d-block card-header py-3" data-toggle="collapse"
                                        role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                        <h6 class="m-0 font-weight-bold text-primary">{{ substr($data['deleted_at'], 0, 10) }}</h6>
                                    </a>
                                    <!-- End Card Header - Accordion -->

                                    <!-- Card Content - Collapse -->
                                    <div class="collapse" id="col1{{ $data['id'] }}">
                                        <div class="card-body">
                                            Time : {{ substr($data['deleted_at'], 11, 8) }}
                                        </div>
                                    </div>
                                    <!-- End Card Content - Collapse -->

                                </div>
                                <!-- End Collapsable Card -->
                            </td>
                            <td>
                                <form method="POST" action="{{ route('hardDelete', $data['id']) }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col">
                                            <a class="btn btn-warning btn-circle" href="{{ route('restore', $data['id']) }}"><i class="fas fa-pencil-alt"></i></a>
                                            <button type="submit" class="btn btn-danger btn-circle"><i class="fas fa-trash"></i></button>
                                        </div>
                                    </div>
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
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
@endsection
