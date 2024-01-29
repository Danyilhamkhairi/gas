@extends('layout.app')
@section('konten')
  <div class="row">
    <div class="col-md-12">
      <div class="card">

        <div class="card-body">
          <h3 class="card-title">Detail Pembelian</h3>
          <table cellpadding="10px" cellspacing="0" class="">
            <tr>
              <td>Tanggal Pembelian</td>
              <td>:</td>
              <td>{{ tanggal_indo(@$data_pembelian->TanggalPembelian) }}</td>

              <td>Nama Supplier</td>
              <td>:</td>
              <td>{{ @$data_pembelian->supplier->NamaSupplier }}</td>
            </tr>
          </table>
        </div>
      </div>
       
    </div>
  </div>

  <div class="row">
    
    <div class="col-md-12">
      <div class="card">
        <form class="form-inline" action="{{ url('detailpembelian') }}" method="post">
          {{ csrf_field() }}
          <input type="hidden" name="PembelianID" value="{{ @$data_pembelian->PembelianID }}">
          <div class="card-body">
            <h5 class="card-title">Tambah Produk Yang Dibeli</h5>
            <div class="row">
            <div class="col-md-3">
              <label class=" text-end control-label col-form-label">Nama Produk</label>
              
                <select class="form-control" name="ProdukID" required="required">
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
@endsection