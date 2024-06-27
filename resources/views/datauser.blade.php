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
            <div class="col-12">
              <div class="card mb-4">
                <div class="card-header pb-0">
                  <h5>Data Users</h5>
                <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#TambahUsers">Tambah User</button>
                
                </div>
                <div class="card-body  mt-3 p-3">
                  <div class="table-responsive p-0">
                    <table class="tablealign-items-center mb-0" id="TableUsers">
                      <thead>
                        <tr>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Name</th>
                          <th class="align-middle text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Username</th>
                          <th class="align-middle text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Contact</th>
                          <th class="align-middle text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Role</th>
                          <th class="align-middle text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                          <th class="align-middle text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Created</th>
                          <th class="align-middle text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
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
            $('#TableUsers').DataTable({
                processing: true,
                serverSide: true,
                scrollX: false,
                ajax: {
                    url : "{{ route('datauser') }}",
                    // data: function (d) {
                    //     d.month = $('#month-select').val();
                    // },
                    
                },
                columns: [
                    {data: null, name: 'id', render: function (data, type, row, meta) {
                        return `<div class="d-flex px-2 py-1">${ meta.row + meta.settings._iDisplayStart + 1} </div>`;
                    }},
                    {
                      data: null, 
                      name: 'name',
                      render: function(data) {
                        return `<div class="d-flex px-2 py-1">
                                  <div>
                                    <img src="../assets/img/team-4.jpg" class="avatar avatar-sm me-3" alt="user6">
                                  </div>
                                  <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">${data.name}</h6>
                                    <p class="text-xs text-secondary mb-0">${data.email}</p>
                                  </div>
                                </div>`;
                      }
                    },
                    {data: 'username', name: 'username', render: function(data) { 
                      return `<div class="align-middle text-center text-sm">${data}</div>`; 
                    
                    }},
                    {data:'contact', name: 'contact', render: function(data) {
                      return `<div class="align-middle text-center text-sm">${data}</div>`;
                    }
                    },
                    {data: 'role', name: 'role', render: function(data) {
                      if(data == 'admin'){
                        return `<div class="align-middle text-center text-sm"><span class="badge badge-sm bg-gradient-primary">${data}</span></div>`
                      }else{
                        return `<div class="align-middle text-center text-sm"><span class="badge badge-sm bg-gradient-success">${data}</span></div>`
                      }
                    }},
                    {data:'status', name: 'status', render: function(data) {
                      if(data == 1){
                        return `<div class="align-middle text-center text-sm"><span class="badge badge-sm bg-gradient-success">Aktif</span></div>`
                      }else{
                        return `<div class="align-middle text-center text-sm"><span class="badge badge-sm bg-gradient-danger">Nonaktif</span></div>`
                      }
                    }},
                    {data: 'created_at', name: 'created_at', render: function(data) {
                      return `<div class="align-middle text-center text-sm">${data}</div>`;
                    }},
                    {
                      data: null, 
                      render: function(data) {
                        return `<div class="align-middle text-center text-sm"><button type="button" class="btn btn-success btn-sm" id="EditUsers" data-id="${data.id}"><i class="fa fa-edit fa-1x"></i></button>`+
                        ` <button type="button" class="btn btn-danger btn-sm" id="BtnDeleteUsers" data-id="${data.id}"><i class="fa fa-trash fa-1x"></i></button></div>`;
                      }
                    },
                ],

            });

           $('#TableUsers').on('click', '#BtnDeleteUsers', function () {
            var id = $(this).data('id');
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Data yang di hapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "DELETE",
                        url: "/datauser/" + id,
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            Swal.fire(
                                'Deleted!',
                                response.message,
                                'success'
                            )
                            $('#TableUsers').DataTable().ajax.reload();
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

          $('#BtnTambahUsers').on('click', function() {
            $.ajax({
                type: "POST",
                url: "{{ route('datauser.store') }}",
                data: $('#FormTambahUsers').serialize(),
                success: function(response) {
                    Swal.fire(
                        'Success!',
                        response.message,
                        'success'
                    );
                    $('#TableUsers').DataTable().ajax.reload();
                    $('#TambahUsers').modal('hide');
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

          $('#TableUsers').on('click', '#EditUsers', function() {
            var id = $(this).data('id');
            $.ajax({
                type: "GET",
                url: "/datauser/" + id,
                success: function(response) {
                    $('#FormEditUsers #id').val(response.id);
                    $('#FormEditUsers #name').val(response.name);
                    $('#FormEditUsers #email').val(response.email);
                    $('#FormEditUsers #contact').val(response.contact);
                    $('#FormEditUsers #username').val(response.username);
                    $('#FormEditUsers #password').val(response.password);
                    $('#FormEditUsers #role').val(response.role);
                    if(response.status == 1){
                      $('#FormEditUsers #status').prop('checked', true);
                    }else{
                      $('#FormEditUsers #status').prop('checked', false);
                    }
                    $('#EditUser').modal('show');
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

          $('#BtnSaveEditUsers').on('click', function() {
            console.log($('#FormEditUsers').serialize());
            $.ajax({
                type: "PUT",
                url: "/datauser/" + $('#FormEditUsers #id').val(),
                data: $('#FormEditUsers').serialize(),
                success: function(response) {
                    Swal.fire(
                        'Success!',
                        response.message,
                        'success'
                    );
                    $('#TableUsers').DataTable().ajax.reload();
                    $('#EditUser').modal('hide');
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
</x-layout>