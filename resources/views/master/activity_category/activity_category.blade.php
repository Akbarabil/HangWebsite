@include('template/header')
@include('template/sidebar')
<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        @if ($errors->any())
            <div class="alert alert-danger" style="margin-top: 1rem;">{{ $errors->first() }}</div>
        @endif
        @if (session('succ_msg'))
            <div class="alert alert-success">{{ session('succ_msg') }}</div>
        @endif
        @if (session('err_msg'))
            <div class="alert alert-danger">{{ session('err_msg') }}</div>
        @endif

        @if ($total_persen != 100)
            <div class="alert alert-warning" style="margin-top: 1rem;">Persentase total: {{ $total_persen }}%</div> 
        @endif
        <!-- Add Order -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    {{-- <div class="card-header">
                        <h4 class="card-title">Daftar Produk</h4>
                    </div> --}}
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="display min-w850">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kategori Aktivitas</th>
                                        <th>Target Asmen</th>
                                        <th>Target RPO</th>
                                        <th>Target User</th>
                                        <th>Persentase</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($activity_category as $item)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $item->NAME_AC }}</td>
                                        <td>{{ $item->TGTLOCATION_AC }}</td>
                                        <td>{{ $item->TGTREGIONAL_AC }}</td>
                                        <td>{{ $item->TGTUSER_AC }}</td>
                                        <td>{{ $item->PERCENTAGE_AC }}%</td>
                                        <td>
                                            @if ($item->deleted_at == NULL)
                                                <i class="fa-solid fa-circle mr-2" style="color:#3CC13B;"></i>
                                                Enable
                                            @else
                                                <i class="fa-solid fa-circle mr-2" style="color:#C13B3B;"></i>
                                                Disable
                                            @endif
                                        </td>
                                        <td>
                                            <button onclick="showMdlEdit('{{ $item->ID_AC }}', '{{ $item->NAME_AC }}', '{{ $item->TGTLOCATION_AC }}', '{{ $item->TGTREGIONAL_AC }}', '{{ $item->TGTUSER_AC }}',  '{{ $item->PERCENTAGE_AC }}', '{{ $item->deleted_at }}')" class="btn btn-primary btn-sm">
                                                <i class="flaticon-381-edit-1"></i>
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

<!-- Modal Edit  -->
<div class="modal fade" id="mdlEdit">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ubah Kategori Aktivitas</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('master/activity-category/update') }}">
                <div class="form-group">
                    <label for="">Kategori Aktivitas</label>
                    <input type="text" name="category_activity" id="mdlEdit_name" class="form-control" placeholder="Input nama kategori" required>
                </div>
                <div class="form-group">
                    <label for="">Target Asmen</label>
                    <input type="text" name="target_asm_act" id="mdlEdit_asm" class="form-control" placeholder="Input Target Regional" required>
                </div>
                <div class="form-group">
                    <label for="">Target Regional</label>
                    <input type="text" name="target_reg_act" id="mdlEdit_reg" class="form-control" placeholder="Input Target Regional" required>
                </div>
                <div class="form-group">
                    <label for="">Target User</label>
                    <input type="text" name="target_user_act" id="mdlEdit_user" class="form-control" placeholder="Input Target User" required>
                </div>
                <div class="form-group">
                    <label for="">Persentase Aktivitas</label>
                    <input type="text" name="percentage_activity" id="mdlEdit_percentage" class="form-control" placeholder="Input persentase" required>
                </div>
                <div class="form-group">
                    <label for="">Status</label>
                    <div class="form-group mb-0">
                        <label class="radio-inline mr-3"><input type="radio" id="status_enable" name="status" value="1" required> Enable</label>
                        <label class="radio-inline mr-3"><input type="radio" id="status_disable" name="status" value="0" required> Disable</label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id" id="mdlEdit_id">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Batalkan</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!--**********************************
    Content body end
***********************************-->
@include('template/footer')
<script>
    $('#datatable').DataTable()

    function showMdlEdit(id, name, targetasmen, targetreg, targetuser, percentage, status){
        $('#mdlEdit_id').val(id)
        $('#mdlEdit_name').val(name)
        $('#mdlEdit_asm').val(targetasmen)
        $('#mdlEdit_reg').val(targetreg)
        $('#mdlEdit_user').val(targetuser)
        $('#mdlEdit_percentage').val(percentage)
        if (status == null || status == '') {
            $('#status_enable').prop('checked', true)
        } else {
            $('#status_disable').prop('checked', true)
        }
        $('#mdlEdit').modal('show');
    }
</script>