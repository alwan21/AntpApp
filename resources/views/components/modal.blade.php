{{-- Modal Tambah Barang --}}
<div class="modal fade" id="TambahBarang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Barang</h1>
      </div>
      <div class="modal-body">
        <form id="FormTambahBarang" action="/databarang" method="post">
          @csrf
          <div class="mb-3">
            <label for="kode_barang" class="col-form-label">Kode Barang:</label>
            <input type="text" class="form-control" name="kode_barang" id="kode_barang" required>
          </div>
          <div class="mb-3">
            <label for="nama_barang" class="col-form-label">Nama Barang:</label>
            <input class="form-control" name="nama_barang" id="nama_barang" required></input>
          </div>
          <div class="mb-3">
            <label for="group_barang" class="col-form-label">Group Barang:</label>
            <select class="form-select form-control" name="group_barang" id="group_barang" required>
                <option selected>Open this select menu</option>
                <option value="Makanan">Makanan</option>
                <option value="Minuman">Minuman</option>
                <option value="Barang Lain">Barang Lain</option>
              </select>
          </div>
          <div class="mb-3">
            <div class="form-check">
                <input name="active" id="active" class="form-check-input" type="checkbox" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                 <strong>Aktif </strong>
                </label>
              </div>
        </div>
        <span>Satuan Barang</span>
       <small> <button type="button" id="btn_add_satuan" class="bg-success btn-success btn-sm mb-2"><i class="fa fa-plus fa-1x"></i></button>
       </small>
       <div class="container">
       <table class="table table-hover table-striped display responsive nowrap" id="satuanbarang" style="width:100%">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Kode Satuan</th>
                <th>Harga Beli</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody class="table-light text-center">
            <tr>
                <td>1</td>
                <td>
                    <select class="form-select form-control" name="kode_satuan" id="kode_satuan" required>
                        <option selected>Open this select menu</option>
                        <option value="Pcs">Pcs</option>
                        <option value="Pak">Pak</option>
                        <option value="Dus">Dus</option>
                      </select>
                </td>
                <td>
                    <input type="number" class="form-control" name="harga_beli" id="harga_beli" required>
                </td>
               
                <td>
                    <span>Aktif</span>
                </td>
                <td>
                    <button class="btn btn-warning btn-sm"><i class="fa fa-ban fa-1x"></i></button>
                    <button class="btn btn-danger btn-sm"><i class="fa fa-trash fa-1x"></i></button>
                </td>
            </tr>
        </tbody>
      </table>
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
        <button type="button" id="BtnTambahBarang" class="btn btn-primary">Simpan</button>
      </div>
    </form>

    </div>
  </div>
</div>
{{-- Akhir Modal Tambah Barang --}}


{{-- Modal Edit Barang  --}}


<div class="modal fade" id="EditBarang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Barang</h1>
      </div>
      <div class="modal-body">
        <form id="FormEditBarang">
          @csrf
          <input type="hidden" name="edit_id" id="edit_id">
          <div class="mb-3">
            <label for="kode_barang" class="col-form-label">Kode Barang:</label>
            <input type="text" class="form-control" name="edit_kode_barang" id="edit_kode_barang" required>
          </div>
          <div class="mb-3">
            <label for="nama_barang" class="col-form-label">Nama Barang:</label>
            <input class="form-control" name="edit_nama_barang" id="edit_nama_barang" required></input>
          </div>
          <div class="mb-3">
            <label for="group_barang" class="col-form-label">Group Barang:</label>
            <select class="form-select form-control" name="edit_group_barang" id="edit_group_barang" required>
                <option selected>Open this select menu</option>
                <option value="Makanan">Makanan</option>
                <option value="Minuman">Minuman</option>
                <option value="Barang Lain">Barang Lain</option>
              </select>
          </div>
          <div class="mb-3">
            <div class="form-check">
                <input name="edit_active" id="edit_active" class="form-check-input" type="checkbox" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                 <strong>Aktif </strong>
                </label>
              </div>
        </div>
        <span>Satuan Barang</span>
       <small> <button type="button" id="edit_btn_add_satuan" class="bg-success btn-success btn-sm mb-2"><i class="fa fa-plus fa-1x"></i></button>
       </small>
       <div class="container">
       <table class="table table-hover table-striped display responsive nowrap" id="edit_satuanbarang" style="width:100%">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Kode Satuan</th>
                <th>Harga Beli</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody class="table-light text-center">
            <tr>
                <td>1</td>
                <td>
                    <select class="form-select form-control" name="edit_kode_satuan" id="edit_kode_satuan" required>
                        <option selected>Open this select menu</option>
                        <option value="Pcs">Pcs</option>
                        <option value="Pak">Pak</option>
                        <option value="Dus">Dus</option>
                      </select>
                </td>
                <td>
                    <input type="number" class="form-control" name="edit_harga_beli" id="edit_harga_beli" required>
                </td>
               
                <td>
                  <span id="edit_status" class="badge bg-success">Aktif</span>
                </td>
                <td>
                    <button class="btn btn-warning btn-sm"><i class="fa fa-ban fa-1x"></i></button>
                    <button class="btn btn-danger btn-sm"><i class="fa fa-trash fa-1x"></i></button>
                </td>
            </tr>
        </tbody>
      </table>
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
        <button type="button" id="BtnSaveEditBarang" class="btn btn-primary">Edit</button>
      </div>
    </form>

    </div>
  </div>
</div>
{{-- akhir Edit Barang --}}

{{-- Tambah Pengeluaran --}}

<div class="modal fade" id="TambahPengeluaran" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Pengeluaran</h1>
      </div>
      <div class="modal-body">
        <form id="FormTambahPengeluaran">
          @csrf
          <div class="mb-3">
            <label for="user_id" class="col-form-label">User Input :</label>
            <input type="hidden" class="form-control text-start" name="user_id" id="user_id" value="{{ Auth::user()->id }}" readonly>
            <input type="text" class="form-control text-start" value="{{ Auth::user()->name }}" readonly>  
          </div>
          <div class="mb-3">
            <label for="tanggal" class="col-form-label">Tanggal :</label>
            <input type="date" class="form-control" name="tanggal" id="tanggal" value="{{ date('Y-m-d') }}" required>
          </div>
          <div class="mb-3">
            <label for="nama_barang" class="col-form-label">Nama Barang:</label>
            <input class="form-control" name="nama_barang" id="nama_barang" required></input>
          </div>
          <div class="mb-3">
            <label for="keterangan" class="col-form-label">Keterangan :</label>
            <input type="text" class="form-control" name="keterangan" id="keterangan" required>
          </div>
          <div class="mb-3">
            <label for="harga" class="col-form-label">Harga :</label>
            <input type="number" class="form-control" name="harga" id="harga" required>
          </div>
          <div class="mb-3">
            <label for="qty" class="col-form-label">Qty :</label>
            <input type="number" class="form-control" name="qty" id="qty" required>
          </div>
        </div>
        
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
        <button type="button" id="BtnTambahPengeluaran" class="btn btn-primary">Simpan</button>
      </div>
    </form>

    </div>
  </div>
</div>
{{-- Akhir Modal Tambah Pengeluaran --}}

{{-- Modal Edit Pengeluaran --}}

<div class="modal fade" id="EditPengeluaran" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Pengeluaran</h1>
      </div>
      <div class="modal-body">
        <form id="FormEditPengeluaran">
          @csrf
          <input type="hidden" class="form-control text-start" name="id" id="id" readonly>
          <div class="mb-3">
            <label for="user_id" class="col-form-label">User Input :</label>
            <input type="hidden" class="form-control text-start" name="user_id" id="user_id" value="{{ Auth::user()->id }}" readonly>
            <input type="text" id="view_user_id" class="form-control text-start" value="" readonly>  
          </div>
          <div class="mb-3">
            <label for="tanggal" class="col-form-label">Tanggal :</label>
            <input type="date" class="form-control" name="tanggal" id="tanggal" value="{{ date('Y-m-d') }}" required>
          </div>
          <div class="mb-3">
            <label for="nama_barang" class="col-form-label">Nama Barang:</label>
            <input class="form-control" name="nama_barang" id="nama_barang" required></input>
          </div>
          <div class="mb-3">
            <label for="keterangan" class="col-form-label">Keterangan :</label>
            <input type="text" class="form-control" name="keterangan" id="keterangan" required>
          </div>
          <div class="mb-3">
            <label for="harga" class="col-form-label">Harga :</label>
            <input type="number" class="form-control" name="harga" id="harga" required>
          </div>
          <div class="mb-3">
            <label for="qty" class="col-form-label">Qty :</label>
            <input type="number" class="form-control" name="qty" id="qty" required>
          </div>
          <div class="mb-3">
            <div class="form-check">
                <input name="batal" id="batal" class="form-check-input" type="checkbox" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                 <strong>Batal</strong>
                </label>
              </div>
        </div>
        </div>
        
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
        <button type="button" id="BtnSaveEditPengeluaran" class="btn btn-primary">Simpan</button>
      </div>
    </form>

    </div>
  </div>
</div>
{{-- Akhir Modal Edit Pengeluaran --}}

{{-- Tambah Pemasukan --}}

<div class="modal fade" id="TambahPemasukan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Pemasukan</h1>
      </div>
      <div class="modal-body">
        <form id="FormTambahPemasukan">
          @csrf
          <div class="mb-3">
            <label for="user_id" class="col-form-label">User Input :</label>
            <input type="hidden" class="form-control text-start" name="user_id" id="user_id" value="{{ Auth::user()->id }}" readonly>
            <input type="text" class="form-control text-start" value="{{ Auth::user()->name }}" readonly>  
          </div>
          <div class="mb-3">
            <label for="tanggal" class="col-form-label">Tanggal :</label>
            <input type="date" class="form-control" name="tanggal" id="tanggal" value="{{ date('Y-m-d') }}" required>
          </div>
          <div class="mb-3">
            <label for="keterangan" class="col-form-label">Keterangan :</label>
            <input type="text" class="form-control" name="keterangan" id="keterangan" required>
          </div>
          <div class="mb-3">
            <label for="total" class="col-form-label">Total :</label>
            <input type="number" class="form-control" name="total" id="total" required>
          </div>
          <div class="mb-3">
            <div class="form-check">
                <input name="batal" id="batal" class="form-check-input" type="checkbox" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                 <strong>Batal</strong>
                </label>
              </div>
        </div>
        </div>
        
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
        <button type="button" id="BtnTambahPemasukan" class="btn btn-primary">Simpan</button>
      </div>
    </form>

    </div>
  </div>
</div>
{{-- Akhir Modal Tambah Pemasukan --}}

{{-- Edit Pemasukan --}}
<div class="modal fade" id="EditPemasukan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Pemasukan</h1>
      </div>
      <div class="modal-body">
        <form id="FormEditPemasukan">
          @csrf
          <div class="mb-3">
            <input type="hidden" class="form-control text-start" name="id" id="id" readonly>
            <label for="user_id" class="col-form-label">User Input :</label>
            <input type="hidden" class="form-control text-start" name="user_id" id="user_id" value="{{ Auth::user()->id }}" readonly>
            <input type="text" class="form-control text-start" value="{{ Auth::user()->name }}" readonly>  
          </div>
          <div class="mb-3">
            <label for="tanggal" class="col-form-label">Tanggal :</label>
            <input type="date" class="form-control" name="tanggal" id="tanggal" value="{{ date('Y-m-d') }}" required>
          </div>
          <div class="mb-3">
            <label for="keterangan" class="col-form-label">Keterangan :</label>
            <input type="text" class="form-control" name="keterangan" id="keterangan" required>
          </div>
          <div class="mb-3">
            <label for="total" class="col-form-label">Total :</label>
            <input type="number" class="form-control" name="total" id="total" required>
          </div>
          <div class="mb-3">
            <div class="form-check">
                <input name="batal" id="batal" class="form-check-input" type="checkbox" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                 <strong>Batal</strong>
                </label>
              </div>
          </div>
        </div>
        
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
        <button type="button" id="BtnSaveEditPemasukan" class="btn btn-primary">Simpan</button>
      </div>
    </form>

    </div>
  </div>
</div>
{{-- Akhir Modal Edit Pemasukan --}}


{{-- Tambah Users --}}

<div class="modal fade" id="TambahUsers" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah User</h1>
      </div>
      <div class="modal-body">
        <form id="FormTambahUsers">
          @csrf
          <div class="mb-3">
            <label for="name" class="col-form-label">Name :</label>
            <input type="text" class="form-control" name="name" id="name" required>
          </div>
          <div class="mb-3">
            <label for="email" class="col-form-label">E-mail :</label>
            <input type="email" class="form-control" name="email" id="email" required>
          </div>
          <div class="mb-3">
            <label for="contact" class="col-form-label">Contact :</label>
            <input type="phone" class="form-control" name="contact" id="contact" required>
          </div>
          <div class="mb-3">
            <label for="username" class="col-form-label">Username :</label>
            <input class="form-control" name="username" id="username" required></input>
          </div>
          <div class="mb-3">
            <label for="password" class="col-form-label">Password :</label>
            <input type="text" class="form-control" name="password" id="password" required>
          </div>
          <div class="mb-3">
            <label for="role" class="col-form-label">Role :</label>
            <select class="form-select" name="role" id="role">
              <option value="admin">Admin</option>
              <option value="user">User</option>
            </select>
          </div>
          <div class="mb-3">
            <div class="form-check">
                <input name="status" id="status" class="form-check-input" type="checkbox" id="flexCheckDefault" checked>
                <label class="form-check-label" for="flexCheckDefault">
                 <strong>Aktif</strong>
                </label>
              </div>
          </div>
        </div>
        
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
        <button type="button" id="BtnTambahUsers" class="btn btn-primary">Simpan</button>
      </div>
    </form>

    </div>
  </div>
</div>
{{-- Akhir Modal Tambah Users --}}
{{-- Edit Users --}}
<div class="modal fade" id="EditUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit User</h1>
      </div>
      <div class="modal-body">
        <form id="FormEditUsers">
          @csrf
          <div class="mb-3">
            <label for="name" class="col-form-label">ID :</label>
            <input type="text" class="form-control" name="id" id="id" readonly>
          </div>
          <div class="mb-3">
            <label for="name" class="col-form-label">Name :</label>
            <input type="text" class="form-control" name="name" id="name" required>
          </div>
          <div class="mb-3">
            <label for="email" class="col-form-label">E-mail :</label>
            <input type="email" class="form-control" name="email" id="email" required>
          </div>
          <div class="mb-3">
            <label for="contact" class="col-form-label">Contact :</label>
            <input type="phone" class="form-control" name="contact" id="contact" required>
          </div>
          <div class="mb-3">
            <label for="username" class="col-form-label">Username :</label>
            <input class="form-control" name="username" id="username" required></input>
          </div>
          <div class="mb-3">
            <label for="password" class="col-form-label">Password :</label>
            <input type="text" class="form-control" name="password" id="password" >
          </div>
          <div class="mb-3">
            <label for="role" class="col-form-label">Role :</label>
            <select class="form-select" name="role" id="role">
              <option value="admin">Admin</option>
              <option value="user">User</option>
            </select>
          </div>
          <div class="mb-3">
            <div class="form-check">
                <input name="status" id="status" class="form-check-input" type="checkbox" id="flexCheckDefault" checked>
                <label class="form-check-label" for="flexCheckDefault">
                 <strong>Aktif</strong>
                </label>
              </div>
          </div>
        </div>
        
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
        <button type="button" id="BtnSaveEditUsers" class="btn btn-primary">Simpan</button>
      </div>
    </form>

    </div>
  </div>
</div>
{{-- Akhir Modal Edit Users --}}


{{-- Tambah Invoice --}}
<div class="modal fade" id="TambahInvoice" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Invoice</h1>
      </div>
      <div class="modal-body">
        <form id="FormTambahInvoice">
          @csrf
          <div class="mb-3">
            <label for="tanggal" class="col-form-label">Tanggal :</label>
            <input type="date" class="form-control" name="tanggal" id="tanggal" value="{{ date('Y-m-d') }}" required>
          </div>
          <div class="mb-3">
            <label for="invoice_code" class="col-form-label">Invoice Code :</label>
            <input type="invoice_code" class="form-control" name="invoice_code" id="invoice_code" required>
          </div>
          <div class="mb-3">
            <label for="user_id" class="col-form-label">User :</label>
            <select class="form-select" name="user_id" id="user_id">
            <?php
              if(request()->is('transaksi')){
              for($i = 0; $i < count($users); $i++){
            ?>
              <option value="{{ $users[$i]->id }}">{{ $users[$i]->name }}</option>
            <?php
              }
              }
            ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="keterangan" class="col-form-label">Keterangan :</label>
            <input type="text" class="form-control" name="keterangan" id="keterangan" required>
          </div>
          <div class="mb-3">
            <label for="total" class="col-form-label">Total :</label>
            <input type="number" class="form-control" name="total" id="total" required></input>
          </div>
        </div>
        
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
        <button type="button" id="BtnTambahInvoice" class="btn btn-primary">Simpan</button>
      </div>
    </form>

    </div>
  </div>
</div>
{{-- Akhir Modal Tambah Invoice --}}

{{-- Edit Invoice --}}
<div class="modal fade" id="EditInvoice" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Invoice</h1>
      </div>
      <div class="modal-body">
        <form id="FormEditInvoice">
          @csrf
          <input type="hidden" name="id" id="id">
          <div class="mb-3">
            <label for="tanggal" class="col-form-label">Tanggal :</label>
            <input type="date" class="form-control" name="tanggal" id="tanggal" value="{{ date('Y-m-d') }}" required>
          </div>
          <div class="mb-3">
            <label for="invoice_code" class="col-form-label">Invoice Code :</label>
            <input type="invoice_code" class="form-control" name="invoice_code" id="invoice_code" required>
          </div>
          <div class="mb-3">
            <label for="user_id" class="col-form-label">User :</label>
            <select class="form-select" name="user_id" id="user_id">
            <?php
              if(request()->is('transaksi')){
              for($i = 0; $i < count($users); $i++){
            ?>
              <option value="{{ $users[$i]->id }}">{{ $users[$i]->name }}</option>
            <?php
              }
              }
            ?>
            </select>
          </div>
          <div class="mb-3">
            <label for="keterangan" class="col-form-label">Keterangan :</label>
            <input type="text" class="form-control" name="keterangan" id="keterangan" required>
          </div>
          <div class="mb-3">
            <label for="total" class="col-form-label">Total :</label>
            <input type="number" class="form-control" name="total" id="total" required></input>
          </div>
        </div>
        
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
        <button type="button" id="BtnSaveEditInvoice" class="btn btn-primary">Simpan</button>
      </div>
    </form>

    </div>
  </div>
</div>
{{-- Akhir Modal Edit Invoice --}}
<script>
    $(document).ready(function() {
    var table = $('#satuanbarang').DataTable({
        responsive: true,
        paging: false,
        info: false,
        searching: false,
       
    });

    $('#btn_add_satuan').click(function() {
        $number = table.rows().count() + 1;
        table.row.add([
           table.rows().count() + 1,
           '<select class="form-select form-control" name="kode_satuan'+ $number + '" id="kode_satuan"> required'+
           '<option selected>Open this select menu</option>' +
            '<option value="1">Pcs</option>' +
            '<option value="2">Pak</option>' +
            '<option value="3">Dus</option>' +
            '</select>',
           '<input type="number" class="form-control" name="harga_beli' + $number + '" id="harga_beli"> required',
           '<span class="badge bg-success">Aktif</span>',
           ' <button class="btn btn-warning btn-sm"><i class="fa fa-ban fa-1x"></i></button>'+
           ' <button class="btn btn-danger btn-sm"><i class="fa fa-trash fa-1x"></i></button>'
        ]).draw(false).node();
    });

});
</script>