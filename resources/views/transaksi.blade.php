<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="container-fluid ph-4">
        <div class="row mb-3">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
              <div class="card">
                <div class="card-body p-3">
                  <div class="row">
                    <div class="col-8">
                      <div class="numbers">
                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Profit Bulan Ini</p>
                        <h5 class="font-weight-bolder">
                          Rp
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
                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Profit Global</p>
                        <h5 class="font-weight-bolder">
                          Rp 
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
          <div class="row">
            <div class="col-12 mt-4">
              <div class="card">
                <div class="card-header pb-0 px-3">
                  <h5 class="mb-0">Data Transaksi</h5>
                  <button type="button" data-bs-toggle="modal" data-bs-target="#TambahInvoice" class="mt-1 btn btn-primary">Create Invoice</button>
                </div>
                <div class="card-body pt-4 p-3">
                  <div class="table-responsive p-0">
                    <table class="table table-align-middle table-bordered mb-0" id="TableInvoice">
                      <thead>
                        <tr>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tanggal</th>
                          <th class=" text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                          <th class=" text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Total</th>
                          <th class=" text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Broadcast</th>
                          <th class=" text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                          <th class=" text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Batal</th>
                          <th class=" text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                        </tr>
                      </thead>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>
      <x-modal :totaluser="count($users)" :users="$users"/>
    
    <script>
        $(document).ready(function() {
            $('#TableInvoice').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('transaksi') }}",
                },
                columns: [
                  {data: null, name: 'id', render: function (data, type, row, meta) {
                        return `<div class="d-flex">${ meta.row + meta.settings._iDisplayStart + 1} </div>`;
                    }},
                    {data: null, name: 'tanggal', render: function(data) {
                        return `<div class="d-flex">
                                  <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">${data.tanggal}</h6>
                                    <p class="text-xs text-secondary mb-0">${data.invoice_code}</p>
                                  </div>
                                </div>`;
                    }},
                    {data: null, name: 'name',searchable: false, render: function(data) {
                      return `<div class="d-flex">
                                  <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">${data.name}</h6>
                                    <p class="text-xs text-secondary mb-0">${data.keterangan}</p>
                                  </div>
                                </div>`;
                    }},
                    {data: 'total', name: 'total'},
                    {data: 'broadcast', name: 'broadcast', render: function(data) {
                      if(data == 1) {
                        return `<div class="align-middle">
                        <span class="badge badge-sm bg-gradient-success">Sudah</span></div>`;
                      } else if(data == 0) {
                        return `<span class="align-middle badge badge-sm bg-gradient-danger">Belum</span>`;
                      }
                    }},
                    {data: 'status', name: 'status', render: function(data) {
                      if(data == 0) {
                        return `<span class="badge badge-sm bg-gradient-warning">Open</span>`;
                      } else if(data == 1) {
                        return `<span class="badge badge-sm bg-gradient-primary">Closed</span>`;
                      } else if(data == 2) {
                        return `<span class="badge badge-sm bg-gradient-danger">Failed</span>`;
                      }
                    }},
                    {data: 'batal', name: 'batal', render: function(data) {
                      if(data == 0) {
                        return `<span class="badge badge-sm bg-gradient-success">Aktif</span>`;
                      } else if(data == 1) {
                        return `<span class="badge badge-sm bg-gradient-danger">Batal</span>`;
                      }
                    }},
                    {data: null, name: 'action',searchable: false, render: function(data) {
                        return `<div class="align-middle text-center text-sm"><button type="button" class="btn btn-success btn-sm" id="BtnEditInvoice" data-id="${data.id}"><i class="fa fa-edit fa-1x"></i></button>`+
                        ` <button type="button" class="btn btn-danger btn-sm" id="BtnPdfInvoice" data-id="${data.id}"><i class="fa fa-file-pdf fa-1x"></i></button>
                        <button type="button" class="btn btn-success btn-sm" id="BtnDeleteUsers" data-id="${data.id}"><i class="fa fa-whatsapp fa-1x"></i></button>
                        </div>`;
                      }
                    },
                ],
            });

            $('#BtnTambahInvoice').on('click', function() {
              $.ajax({
                type: "POST",
                url: "{{ route('transaksi.store') }}",
                data: $('#FormTambahInvoice').serialize(),
                success: function(response) {
                    Swal.fire(
                        'Success!',
                        response.message,
                        'success'
                    );
                    $('#TableInvoice').DataTable().ajax.reload();
                    $('#TambahInvoice').modal('hide');
                },
                error: function(xhr, status, error) {
                    Swal.fire(
                        'Failed!',
                        error,
                        'error'
                    );
                    console.log(xhr);
                }
              });
            });
            // Form Edit Invoice
            $('#TableInvoice').on('click', '#BtnEditInvoice', function() {
              var id = $(this).data('id');
              $.get("/transaksi/" + id, function(response) {
                console.log(response);
                $('#FormEditInvoice #id').val(response.id);
                $('#FormEditInvoice #tanggal').val(response.tanggal);
                $('#FormEditInvoice #invoice_code').val(response.invoice_code);
                $('#FormEditInvoice #keterangan').val(response.keterangan);
                $('#FormEditInvoice #total').val(response.total);
                $('#FormEditInvoice #user_id').val(response.user_id);
                $('#FormEditInvoice #id').val(response.id);
                $('#EditInvoice').modal('show');
              });
              $('#EditInvoice').modal('show');

            });
            // Save Edit Invoice
            $('#BtnSaveEditInvoice').on('click',function() {
              console.log($('#FormEditInvoice').serialize());
              $.ajax({
                type: "PUT",
                url: "/transaksi/" + $('#FormEditInvoice #id').val(),
                data: $('#FormEditInvoice').serialize(),
                success: function(response) {
                  Swal.fire(
                    'Success!',
                    response.message,
                    'success'
                  );
                  $('#TableInvoice').DataTable().ajax.reload();
                  $('#EditInvoice').modal('hide');
                },
                error: function(xhr, status, error) {
                  Swal.fire(
                    'Failed!',
                    error,
                    'error'
                  );
                  console.log(xhr);
                }
              });
            });

            // Pdf Invoice
            $('#TableInvoice').on('click', '#BtnPdfInvoice', function() {
              var id = $(this).data('id');
              window.open('/pdfinvoice/'+id, '_blank');
            });
        });
    </script>
</x-layout>