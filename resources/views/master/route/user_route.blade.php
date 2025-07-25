@include('template/header')
@include('template/sidebar')
<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">

        <?php $hide = true; ?>
        @if(!$hide)
        <div class="row mb-4">
            <div class="col">
                <a href="{{ url('master/rute/create') }}" class="btn btn-sm btn-primary" style="float: right;">
                    <i class="flaticon-381-add-2"></i>
                    Tambah Rute
                </a>
            </div>
        </div>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger" style="margin-top: 1rem;">{{ $errors->first() }}</div>
        @endif
        @if (session('succ_msg'))
        <div class="alert alert-success">{{ session('succ_msg') }}</div>
        @endif
        @if (session('err_msg'))
        <div class="alert alert-danger">{{ session('err_msg') }}</div>
        @endif

        <!-- Add Order -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    {{-- <div class="card-header">
                        <h4 class="card-title">Daftar User</h4>
                    </div> --}}
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="display min-w850">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama User</th>
                                        <th>Minggu</th>
                                        <th>Rute Grup</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $no = 1;
                                    @endphp
                                    @foreach ($routes as $item)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $item->NAME_USER }}</td>
                                        <td>{{ $item->WEEK }}</td>
                                        <td>Grup {{ $item->ROUTE_GROUP }}</td>
                                        <td>
                                            <form action="<?= url('master/rute/edit') ?>" method="get">
                                                <input type="hidden" name="id_user" value="{{ $item->ID_USER }}">
                                                <input type="hidden" name="route_group" value="{{ $item->ROUTE_GROUP }}">
                                                <input type="hidden" name="week" value="{{ $item->WEEK }}">
                                                <button type="submit" class="btn btn-primary btn-sm">
                                                    <i class="flaticon-381-edit-1"></i>
                                                </button>
                                            </form>
                                            <button onclick="" class="btn btn-primary btn-sm">
                                                <i class="flaticon-381-trash-1"></i>
                                            </button>
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
</div>


<!--**********************************
    Content body end
***********************************-->
@include('template/footer')
<script>
    $('#datatable').DataTable()
</script>