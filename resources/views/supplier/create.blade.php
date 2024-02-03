@extends('layout.app')
@section('konten')
  <div class="row">
    
    <div class="col-md-6">
      <div class="card">
        <form class="form-horizontal" action="{{ url('supplier') }}" method="post">
          {{ csrf_field() }}
          <div class="card-body">
            <h5 class="card-title">Tambah Supplier</h5>
            <br>
            <div class="form-group row">
              <label class="col-sm-3 text-end control-label col-form-label">Nama Supplier</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="NamaSupplier" required="required">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-3 text-end control-label col-form-label">Alamat</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="Alamat" required="required">
              </div>
            </div>

            <div class="form-group row">
              <label class="col-sm-3 text-end control-label col-form-label">Nomor Telepon</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name="NomorTelepon" required="required">
              </div>
            </div>
            
          </div>
          <div class="border-top">
            <div class="card-body">
              <button type="submit" class="btn btn-primary">
                Submit
              </button>

              <a href="{{ url('supplier') }}" class="btn btn-warning">Batal</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div> 
@endsection