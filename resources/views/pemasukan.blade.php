<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
              <div class="card">
                <div class="card-body p-3">
                  <div class="row">
                    <div class="col-8">
                      <div class="numbers">
                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Pemasukan Hari Ini</p>
                        <h5 id="total_hari_ini" class="font-weight-bolder">
                          Rp {{ $total_hari_ini }}
                        </h5>
                        <p class="mb-0">
                          <span id+="selisih" class="text-success text-sm font-weight-bolder">{{ $selisih }}</span>
                          % dari kemarin
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
                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Pemasukan Bulan Ini</p>
                        <h5 id="total_bulan_ini" class="font-weight-bolder">
                          Rp {{ $total_bulan_ini }}
                        </h5>
                        <p class="mb-0">
                          <span id="selisih_bulan" class="text-success text-sm font-weight-bolder">{{ $selisih_bulan }}%</span>
                          dari bulan lalu
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
                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Pemasukan Global</p>
                        <h5 id="total_all" class="font-weight-bolder">
                          Rp {{ $total_all }}
                        </h5>
                        <p class="mb-0">
                          <span class="text-danger text-sm font-weight-bolder"><br></span>
                          
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
                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Customers</p>
                        <h5 id="customers" class="font-weight-bolder">
                          {{ $customers }}
                        </h5>
                        <p class="mb-0">
                          <span class="text-success text-sm font-weight-bolder"><br></span> 
                        </p>
                      </div>
                    </div>
                    <div class="col-4 text-end">
                      <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                        <i class="ni ni-single-02 text-lg opacity-10" aria-hidden="true"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row mt-4">
            <div class="col-12 mb-lg-0 mb-4">
              <div class="card z-index-2 h-100">
                <div class="card-header pb-0 pt-3 bg-transparent">
                  <h5 class="text-capitalize">{{ $title }}</h5>
                  <p class="text-sm mb-0">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#TambahPemasukan"><i class="fa fa-plus fa-1x">Tambah Data</i></button>
                    @if(@session()->has('success'))
                      <div class="alert alert-success alert-dismissible fade show " role="alert">
                      {{ session('success') }}
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endsession
                  </p>
                  <div class="col-md-4">
                </div>
                </div>
                <div class="card-body p-3">
                    <div class="table-responsive">
                        <label for="month-select">Filter by Month:</label>
                        <input type="month" name="month-select" id="month-select" >
                    <table class="table table-striped display no-wrap mb-0" width="100%" id="TablePemasukan">
                        <thead class="table-dark text-center">
                        <tr class="text-center">
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Keterangan</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>User Input</th>
                            <th>Aksi</th>
                        </tr>
                        <tfoot>
                            <tr>
                                <th colspan="3">Total</th>
                                <th id="totalHarga">0</th>
                                <th colspan="3"></th>
                            </tr>
                    </thead>
                    </table>
                 </div>
                </div>
              </div>
            </div>
          </div>
    </div>
    <x-modal></x-modal>
    <script>
        $(document).ready(function() {

          function UpdataTotal(totals){
            $('#total_hari_ini').text(totals['total_hari_ini']);
            $('#selisih').text(totals['selisih']);
            $('#total_bulan_ini').text(totals['total_bulan_ini']);
            $('#selisih_bulan').text(totals['selisih_bulan']);
            $('#total_all').text(totals['total_all']);
            $('#customers').text(totals['customers']);
          }
           var table = $('#TablePemasukan').DataTable({
                processing: true,
                serverSide: true,
                scrollX: false,
                ajax: {
                    url : "{{ route('pemasukan') }}",
                    data: function (d) {
                        d.month = $('#month-select').val();
                    },
                    
                },
                columns: [
                    {data: null, name: 'id', render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }},
                    {data: 'tanggal', name: 'tanggal'},
                    {data: 'keterangan', name: 'keterangan'},
                    {data: 'total', name: 'total'},
                    {data: 'batal',
                        render: function(data) {
                        if (data == 1) {
                          return '<span class="badge bg-danger">Batal</span>';
                        } else {
                          return '<span class="badge bg-success">Aktif</span>';
                        }
                        }
                    },
                    {data: 'name', name: 'name', searchable: false},
                    {
                      data: null, 
                      render: function(data) {
                        return `<button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" id="BtnEditPemasukan" data-bs-target="#EditPemasukan" data-id="${data.id}"><i class="fa fa-edit fa-1x"></i></button>`+
                        ` <button type="button" class="btn btn-danger btn-sm" id="BtnDeletePemasukan" data-id="${data.id}"><i class="fa fa-trash fa-1x"></i></button>`;
                      }
                    },
                ],
                footerCallback: function(row, data, start, end, display) {
                    var api = this.api();
                    // Remove the formatting to get integer data for summation
                    var intVal = function(i) {
                        return typeof i === 'string' ?
                            i.replace(/[\$,]/g, '')*1 :
                            typeof i === 'number' ?
                                i : 0;
                };

                      // Total over this page
                      var pageTotal = api
                          .column(3, { page: 'current'})
                          .data()
                          .reduce(function(a, b) {
                              return intVal(a) + intVal(b);
                          }, 0);

                      // Update footer
                      $(api.column(3).footer()).html(
                          pageTotal 
                      );
                  },
            
        });

        // $('#BtnEditPengeluaran').on('click', function() {
        // });

        $('#BtnTambahPemasukan').on('click', function() {
                $.ajax({
                    type: "POST",
                    url: "{{ route('pemasukan.store') }}",
                    data: $('#FormTambahPemasukan').serialize(),
                    success: function(response) {
                        UpdataTotal(response.DataTotal);
                        Swal.fire(
                            'Success!',
                            response.message,
                            'success'
                        );
                        $('#TablePemasukan').DataTable().ajax.reload();
                        $('#TambahPemasukan').modal('hide');
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

          $('#TablePemasukan').on('click', '#BtnDeletePemasukan', function() {
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
                          url: "/pemasukan/" + id,
                          data: {
                            "_token": "{{ csrf_token() }}"
                          },
                          success: function(response) {
                              UpdataTotal(response.DataTotal);
                              Swal.fire(
                                  'Deleted!',
                                  response.message,
                                  'success'
                              )
                              $('#TablePemasukan').DataTable().ajax.reload();
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

            // view form edit pengeluaran
            $('#TablePemasukan').on('click', '#BtnEditPemasukan', function() {
              var id = $(this).data('id');
              $.get("/pemasukan/" + id, function(response) {
                // console.log(response);
                $('#FormEditPemasukan #id').val(response.id);
                $('#FormEditPemasukan #tanggal').val(response.tanggal);
                $('#FormEditPemasukan #keterangan').val(response.keterangan);
                $('#FormEditPemasukan #total').val(response.total);
                $('#FormEditPemasukan #user_id').val(response.user_id);
                $('#FormEditPemasukan #view_user_id').val(response.user);
                if (response.batal == 1) {
                    $('#FormEditPemasukan #batal').prop('checked', true);
                } else {
                    $('#FormEditPemasukan #batal').prop('checked', false);
                }
                $('#EditPemasukan').modal('show');
              });
              $('#EditPemasukan').modal('show');

            });

            // Save Edit Pemasukan
            $('#BtnSaveEditPemasukan').on('click',function() {
              console.log($('#FormEditPemasukan').serialize());
              $.ajax({
                type: "PUT",
                url: "/pemasukan/" + $('#FormEditPemasukan #id').val(),
                data: $('#FormEditPemasukan').serialize(),
                success: function(response) {
                  UpdataTotal(response.DataTotal);
                  Swal.fire(
                    'Success!',
                    response.message,
                    'success'
                  );
                  $('#TablePemasukan').DataTable().ajax.reload();
                  $('#EditPemasukan').modal('hide');
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
            
            // searching

            $('#month-select').on('change', function() {
              console.log($('#month-select').val());
              table.draw();
            });

           
        });
    </script>
</x-layout>