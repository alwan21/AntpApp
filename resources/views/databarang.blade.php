<x-Layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
              <div class="card">
                <div class="card-body p-3">
                  <div class="row">
                    <div class="col-8">
                      <div class="numbers">
                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Today's Money</p>
                        <h5 class="font-weight-bolder">
                          $53,000
                        </h5>
                        <p class="mb-0">
                          <span class="text-success text-sm font-weight-bolder">+55%</span>
                          since yesterday
                        </p>
                      </div>
                    </div>
                    <div class="col-4 text-end">
                      <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                        <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
              <div class="card">
                <div class="card-body p-3">
                  <div class="row">
                    <div class="col-8">
                      <div class="numbers">
                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Today's Users</p>
                        <h5 class="font-weight-bolder">
                          {{ $total_users }}
                        </h5>
                        <p class="mb-0">
                          <span class="text-success text-sm font-weight-bolder">+3%</span>
                          since last week
                        </p>
                      </div>
                    </div>
                    <div class="col-4 text-end">
                      <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                        <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
              <div class="card">
                <div class="card-body p-3">
                  <div class="row">
                    <div class="col-8">
                      <div class="numbers">
                        <p class="text-sm mb-0 text-uppercase font-weight-bold">New Clients</p>
                        <h5 class="font-weight-bolder">
                          +3,462
                        </h5>
                        <p class="mb-0">
                          <span class="text-danger text-sm font-weight-bolder">-2%</span>
                          since last quarter
                        </p>
                      </div>
                    </div>
                    <div class="col-4 text-end">
                      <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                        <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6">
              <div class="card">
                <div class="card-body p-3">
                  <div class="row">
                    <div class="col-8">
                      <div class="numbers">
                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Sales</p>
                        <h5 class="font-weight-bolder">
                          $103,430
                        </h5>
                        <p class="mb-0">
                          <span class="text-success text-sm font-weight-bolder">+5%</span> than last month
                        </p>
                      </div>
                    </div>
                    <div class="col-4 text-end">
                      <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                        <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
              <div class="card z-index-2 h-100">
                <div class="card-header pb-0 pt-3 bg-transparent">
                  <h6 class="text-capitalize">Data Barang</h6>
                  <p class="text-sm mb-0">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#TambahBarang"><i class="fa fa-plus fa-1x">Tambah Data</i></button>
                    @if(@session()->has('success'))
                      <div class="alert alert-success alert-dismissible fade show " role="alert">
                      {{ session('success') }}
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endsession
                  </p>
                </div>
                <div class="card-body p-3">
                    <table class="table table-striped display mb-0 w-100" id="DataBarang">
                        <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Group Barang</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    </table>
                  
                </div>
              </div>
            </div>
          </div>
    </div>
    <x-modal></x-modal>
    <script type="text/javascript">
        $(function(){

            $('#DataBarang').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('databarang') }}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'kode_barang', name: 'kode_barang'},
                    {data: 'nama_barang', name: 'nama_barang'},
                    {data: 'group_barang', name: 'group_barang'},
                    {
                      data: 'active', 
                      name: 'active',
                      render: function(data) {
                        if (data == 1) {
                          return '<span class="badge bg-success">Aktif</span>';
                        } else {
                          return '<span class="badge bg-danger">Tidak Aktif</span>';
                        }
                      }
                    },
                    {
                      data: 'id', 
                      name: 'aksi',
                      render: function(data) {
                        return '<button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" id="BtnEditBarang" data-bs-target="#EditBarang" data-id=' + data + '><i class="fa fa-edit fa-1x"></i></button>'+
                        ' <button type="button" class="btn btn-primary btn-sm" id="DetailBarang" data-id=' + data + '><i class="fa fa-eye fa-1x"></i></button>' + 
                        ' <button type="button" class="btn btn-danger btn-sm" id="DeleteBarang" data-id=' + data + '><i class="fa fa-trash fa-1x"></i></button>';
                      }
              },
                ],
                responsive: true,
                pagingType: 'simple_numbers',
            });
        

        $('#BtnTambahBarang').on('click', function() {
          $.ajax({
            type: "POST",
            url: "{{ route('databarang.input') }}",
            data: $('#FormTambahBarang').serialize(),
            success: function(response) {
              Swal.fire(
                'Success!',
                response.message,
                'success'
              );
              $('#DataBarang').DataTable().ajax.reload();
              $('#TambahBarang').modal('hide');
            },
            error: function(xhr, status, error) {
              Swal.fire(
                'Failed!',
                status,
                'error'
              );
              console.log(xhr);
            }
          });
        
        });

        
        $('#DataBarang').on('click', '#DeleteBarang', function() {
          var id = $(this).data('id');
              Swal.fire({
                  title: 'Apakah anda yakin?',
                  text: "Data yang sudah dihapus tidak bisa dikembalikan!",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Delete'
                  }).then((result) => {
                  if (result.isConfirmed) {
                      $.ajax({
                          type: "DELETE",
                          url: "/databarang/" + id,
                          data: {
                            "_token": "{{ csrf_token() }}"
                          },
                          success: function(response) {
                              Swal.fire(
                                  'Deleted!',
                                  response.message,
                                  'success'
                              )
                              $('#DataBarang').DataTable().ajax.reload();
                          },
                          error: function(xhr, status, error) {
                            Swal.fire(
                                  'Failed!',
                                  status,
                                  'error'
                              )
                          }
                      }); 
                  }
              })
            });
        // View Form Edit Barang
        $('#DataBarang').on('click', '#BtnEditBarang', function() {
          var id = $(this).data('id');
          $.get("/databarang/" + id, function(response) {
            console.log(response);
            $('#edit_id').val(response.id);
            $('#edit_kode_barang').val(response.kode_barang);
            $('#edit_nama_barang').val(response.nama_barang);
            $('#edit_group_barang').val(response.group_barang);
            if (response.active == 1) {
              $('#edit_active').prop('checked', true);
            } else {
              $('#edit_active').prop('checked', false);
            }
            $('#edit_kode_satuan').val(response.kode_satuan);
            $('#edit_harga_beli').val(response.harga_beli);
            $('#edit_status').text(response.active_satuan == 1 ? 'Aktif' : 'Tidak Aktif');
            $('#edit_status').attr('class', response.active_satuan == 1 ? 'badge bg-success' : 'badge bg-danger');
            $('#EditBarang').modal('show');
          });
        });

        // Save Edit Barang
        $('#BtnSaveEditBarang').on('click', function() {
          $.ajax({
            type: "PUT",
            url: "/databarang/" + $('#edit_id').val(),
            data: $('#FormEditBarang').serialize(),
            success: function(response) {
              Swal.fire(
                'Success!',
                response.message,
                'success'
              );
              $('#DataBarang').DataTable().ajax.reload();
              $('#EditBarang').modal('hide');
            },
            error: function(xhr, status, error) {
              Swal.fire(
                'Failed!',
                status,
                'error'
              );
              console.log(xhr);
            }
          });
      })

    });
    </script>
</x-Layout>