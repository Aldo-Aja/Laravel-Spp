@extends('template.main')

@section('konten')
    <div class="container-fluid">
        <!--Page Heading-->
        <h1 class="h3 mb-2 text-gray-800">Data Siswa</h1>
        <p class="mb-4">Manajemen Spp | Inventory Spp</p>

        <!--Datatables Example-->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">CRUD Laravel</h6>
            </div>

            <div class="card-body">
                <div class="table-responsive">

                    <table class="table table-sm table-hover table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Siswa</th>
                                <th>Tanggal Pembayaran</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>

                        <tbody>
                            @php
                                $no = 1;@endphp
                                @foreach ($pembayaran as $row)
                                    <tr>
                                        <td width="5%">{{$no++}}</td>
                                        <td>{{$row->nama}}</td>
                                        <td>{{$row->tgl_bayar}}</td>
                                        <td>{{$row->jumlah}}</td>
                                    </tr> @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection