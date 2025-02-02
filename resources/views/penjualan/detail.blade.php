@extends('layout.app')
@section('konten')
  <div class="row">
    <div class="col-md-5">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Detail Penjualan</h5>
          <table cellpadding="7px" cellspacing="0" class="">
            <tr>
              <td>Tanggal Penjualan</td>
              <td>:</td>
              <td>{{ tanggal_indo(@$data_penjualan->TanggalPenjualan) }}</td>
            </tr>
            <tr>
              <td>Nama Pembeli</td>
              <td>:</td>
              <td>{{ @$data_penjualan->Pembeli .' '.@$data_penjualan->pelanggan->NamaPelanggan }}</td> 
            </tr>
          </table>
        </div>
      </div>
       
    </div>


    
    <div class="col-md-7">
      <div class="card">
        <form class="form-inline" action="{{ url('detailpenjualan') }}" method="post">
          {{ csrf_field() }}
          <input type="hidden" name="PenjualanID" value="{{ @$data_penjualan->PenjualanID }}">
          <div class="card-body">
            <h5 class="card-title">Tambah Produk</h5>
            <div class="row">
            <div class="col-md-6">
              <label class=" text-end control-label col-form-label">Nama Produk</label>
              
                <select class="form-control select2" name="ProdukID" required="required">
                  <option value="">-- Pilih Produk --</option>
                  @if (@$produk!=null)
                    @foreach ($produk as $p)
                      <option value="{{ $p->ProdukID }}">{{ @$p->NamaProduk }}</option>
                    @endforeach
                  @endif
                </select>
            </div>

            <div class="col-md-3">
              <label class="text-end control-label col-form-label">Jumlah Produk</label>
              <input type="number" name="JumlahProduk" required="required" class="form-control">
            </div>

            <div class="col-md-3">
              <button type="submit" style="margin-top: 34px" class="btn btn-primary">
                Submit
              </button>
            </div>
            
          </div>

          </div>
        </form>
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-md-7">
      <div class="card">
        <div class="card-body">
          <div class="card-title">Daftar Produk Penjualan</div>
          <table class="table table-sniped" style="font-size: 12px;">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Harga Jual</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
                <th>Opsi</th>
              </tr>
            </thead>
            <tbody>
               @if(@$detail != 'NULL')
                @php
                  $no = 1;
                  $total_semua = 0;
                @endphp
                @foreach($detail as $d)
                  @php
                    $total_semua +=$d->Subtotal;
                  @endphp
                  <tr>
                    <td>{{ @$no++ }}</td>
                    <td>{{ @$d->produk->NamaProduk }}</td>
                    <td>{{ rupiah(@$d->produk->harga_jual) }}</td>
                    <td>{{ @$d->JumlahProduk }}</td>
                    <td>{{ rupiah(@$d->Subtotal) }}</td>
                    <td>
                      <form id="theFormDetail{{ @$d->DetailID }}" style="float: left; margin-left: 2px" method="POST" action="{{ url('/detailpenjualan').'/'.$d->DetailID }}">
                          {{ csrf_field() }}
                          {{ method_field('DELETE') }}

                          <div class="form-group">
                              <input type="button" data-id="{{ @$d->DetailID }}" class="btn btn-danger btn-sm delete-detail" value="Hapus">
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

    <div class="col-md-5">
      <div class="card">
        <div class="card-body">
          <form action="{{ url('penjualan/tunai/').'/'.@$data_penjualan->PenjualanID }}" method="post">
            {{ csrf_field() }}
            <table class="table table-sniped">
              <tr>
                <th>Total</th>
                <th>{{ rupiah(@$total_semua) }}</th>
              </tr>

              <tr>
                <th>Tunai</th>
                <td><input min="{{ @$total_semua }}" type="number" class="form-control" name="tunai" value="{{ @$data_penjualan->tunai }}" required></td>
              </tr>

              <tr>
                <th></th>
                <td >
                  <button type="submit"class="btn btn-primary">
                    Proses
                  </button>
                </td>
              </tr>

              <tr>
                <th>Kembali</th>
                <td>{{ rupiah(@$data_penjualan->kembali) }}</td>
              </tr>
              <tr>
                <th colspan="2">
                  <a target="_blank" class="btn btn-sm btn-danger" href="{{ url('penjualan/struk/').'/'.@$data_penjualan->PenjualanID }}"><i class="fa fa-file-pdf"></i> Cetak Struk</a>
                </th>
              </tr>
            </table>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="card">
      <div class="card-body">
        <a href="{{ url('penjualan') }}" class="btn btn-warning">Kembali</a>
      </div>
    </div>
    </div>
  </div> 
@endsection

@section('js')
  <script type="text/javascript">

    $(document).on('click', '.delete-detail', function(){
        var id = $(this).attr('data-id');
        var result = confirm("Anda yakin Akan Menghapus Data Ini?");
        if (result) {
            // document.theForm.submit();
            $("#theFormDetail"+id).submit();
        }  
    });
  </script>
@endsection