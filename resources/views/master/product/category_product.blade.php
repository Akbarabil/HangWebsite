@include('template/header')
@include('template/sidebar')
<!--**********************************
    Content body start
***********************************-->
<div class="content-body">
    <!-- row -->
    <div class="container-fluid">
        <div class="row mb-4">
            <div class="col">
                <button style="float: right;" data-toggle="modal" data-target="#mdlAdd"  class="btn btn-sm btn-primary">
                    <i class="flaticon-381-add-2"></i>
                    Tambah Kategori Produk
                </button>
            </div>
        </div>
        
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
                        <h4 class="card-title">Daftar Produk</h4>
                    </div> --}}
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable" class="display min-w850">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kategori Produk</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($category_product as $item)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $item->NAME_PC }}</td>
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
                                            <button onclick="showMdlEdit('{{ $item->ID_PC }}', '{{ $item->NAME_PC }}', '{{ $item->deleted_at }}')" class="btn btn-primary btn-sm">
                                                <i class="flaticon-381-edit-1"></i>
                                            </button>
                                            {{-- <button onclick="showMdlDelete('{{ $item->ID_PC }}')" class="btn btn-primary btn-sm">
                                                <i class="flaticon-381-trash-1"></i>
                                            </button> --}}
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

<!-- Modal Tambah Category Product  -->
<div class="modal fade" id="mdlAdd">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Kategori Produk</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="{{ url('master/category-product/store') }}">
                <div class="form-group">
                    <label for="">Kategori Produk</label>
                    <input type="text" name="category_product" class="form-control" placeholder="Input Kategori Produk" required>
                </div>
                <div class="form-group">
                    <label for="">Status</label>
                    <div class="form-group mb-0">
                        <label class="radio-inline mr-3"><input type="radio" name="status" value="1" required> Enable</label>
                        <label class="radio-inline mr-3"><input type="radio" name="status" value="0" required> Disable</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="group_product">Grouping Produk</label>
                    <select name="group_product" id="group_product" class="form-control select2" required>
                        <option value="" disabled selected>Pilih Group</option>
                        @foreach ($groupings as $group)
                            <option value="{{ $group->ID_GROUP }}">{{ $group->NAME_GROUP }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal" onclick="this.form.reset();">Batalkan</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit  -->
<div class="modal fade" id="mdlEdit">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ubah Kategori Produk</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('master/category-product/update') }}">
                <div class="form-group">
                    <label for="">Kategori Produk</label>
                    <input type="text" name="category_product" id="mdlEdit_name" class="form-control" placeholder="Input nama kategori" required>
                </div>
                <div class="form-group">
                    <label for="">Status</label>
                    <div class="form-group mb-0">
                        <label class="radio-inline mr-3"><input type="radio" id="status_enable" name="status" value="1" required> Enable</label>
                        <label class="radio-inline mr-3"><input type="radio" id="status_disable" name="status" value="0" required> Disable</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="group_product">Grouping Produk</label>
                    <select name="group_product" id="group_product" class="form-control select2" required>
                        <option value="" disabled selected>Pilih Group</option>
                        @foreach ($groupings as $group)
                            <option value="{{ $group->ID_GROUP }}">{{ $group->NAME_GROUP }}</option>
                        @endforeach
                    </select>
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

<!-- Modal Delete  -->
<div class="modal fade" id="mdlDelete">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Kategori Produk</h5>
                <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Apakah anda yakin untuk menghapus data kategori produk?</p>
            </div>
            <form action="{{ url('master/category-product/destroy') }}">
            <div class="modal-footer">
                <input type="hidden" name="id" id="mdlDelete_id">
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

    function showMdlEdit(id, name, status){
        $('#mdlEdit_id').val(id)
        $('#mdlEdit_name').val(name)
        if (status == null || status == '') {
            $('#status_enable').prop('checked', true)
        } else {
            $('#status_disable').prop('checked', true)
        }
        $('#mdlEdit').modal('show');
    }

    function showMdlDelete(id){
        $('#mdlDelete_id').val(id)
        $('#mdlDelete').modal('show');
    }

    $(document).ready(function() {
        $('#group_product').select2({
            tags: true,
            ajax: {
                url: '{{ url("master/grouping/search") }}',  // Create a route and controller to handle search and create functionality
                dataType: 'json',
                processResults: function (data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: item.NAME_GROUP,
                                id: item.ID_GROUP
                            }
                        })
                    };
                }
            },
            createTag: function(params) {
                var term = $.trim(params.term);
                if (term === '') {
                    return null;
                }
                return {
                    id: term,
                    text: term,
                    newOption: true
                };
            },
            insertTag: function(data, tag) {
                data.push(tag);
            }
        });

        $('#group_product').on('select2:select', function (e) {
            var data = e.params.data;
            if(data.newOption){
                // Send an AJAX request to save the new group
                $.ajax({
                    url: '{{ url("master/grouping/store") }}',
                    type: 'POST',
                    data: {
                        name_group: data.text,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        // Update the select2 dropdown with the new group
                        var newOption = new Option(response.NAME_GROUP, response.ID_GROUP, true, true);
                        $('#group_product').append(newOption).trigger('change');
                    }
                });
            }
        });
    });
</script>