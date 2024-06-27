<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="container-fluid">
        <div class="content border-radius-sm bg-white">
            <div class="header ">
                <button type="button" class="btn" id="BtnCreateInvoice">
                    <i class="fa fa-users fa-1x"></i>
                    Monitor Log User
                </button>
                <button type="button" class="btn" id="BtnCreateInvoice">
                    <i class="fa fa-coins fa-1x"></i>
                    Monitor Log Pemasukan
                </button>
                <button type="button" class="btn" id="BtnCreateInvoice">
                    <i class="fa fa-coins fa-1x"></i>
                    Monitor Log Pengeluaran
                </button>
                <button type="button" class="btn" id="BtnCreateInvoice">
                    <i class="fa fa-wallet fa-1x"></i>
                    Monitor Log Transaksi
                </button>
                <button type="button" class="btn" id="BtnCreateInvoice">
                    <i class="fa fa-whatsapp fa-1x"></i>
                    Monitor Log Broadcast
                </button>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-hover mt-3 hidden">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Invoice</th>
                                <th class="text-center">Total</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-layout>