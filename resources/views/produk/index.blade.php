@extends('layout.app')
@section('konten')
  <div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="card">
        <div class="card-body">
          <h5 class="card-title">Data Produk</h5>
          <a href="{{ url('produk/create') }}" class="btn btn-primary">Tambah</a>
          <div class="table-responsive">
              <table class="table table-sniped" id="data-tabel">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Opsi</th>
                  </tr>
                </thead>
                <tbody>
                  @if (@$data!=null)
                  @php
                    $no =1;
                  @endphp
                    @foreach ($data as $d)
                      <tr>
                        <td>{{ @$no++; }}</td>
                        <td>{{ @$d->NamaProduk; }}</td>
                        <td>{{ rupiah(@$d->Harga); }}</td>
                        <td>{{ @$d->Stok; }}</td>
                        <td>
                          <a style="float: left;" href="{{ url('produk').'/'.@$d->ProdukID.'/edit' }}" class="btn btn-warning btn-sm">Edit</a>

                          <form name="theForm" style="float: left; margin-left: 4px" method="POST" action="{{ url('/produk').'/'.$d->ProdukID }}">
                                  {{ csrf_field() }}
                                  {{ method_field('DELETE') }}

                                  <div class="form-group">
                                      <input type="button" onclick="hapus();" class="btn btn-danger btn-sm" value="Hapus">
                                  </div>
                              </form>
                        </td>
                      </tr>
                    @endforeach
                  @endif
                </tbody>
              </table>
          </div>
        </div>
      </div>
    </div>
  </div> 
@endsection
