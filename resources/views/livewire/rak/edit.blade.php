
<div>
    @if(session()->has('alert'))
    <div class="alert alert-info alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h5><i class="icon fas fa-info"></i> Alert!</h5>
      {{session('alert')}}
    </div>
    @endif
      <div class="row">
          <div class="col-md-12">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Form add rak</h3>
                </div>
                <form wire:submit.prevent="update" method="post">
                  @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="Kode">Kode Rak</label>
                      <input type="text" disabled class="form-control @error('kode') is-invalid @enderror" id="kode" wire:model="kode">
                      @error('kode')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>        
                      @enderror        
                    </div>
                    <div class="form-group">
                      <label for="lokasi">Lokasi Rak</label>
                      <input type="text" class="form-control @error('lokasi') is-invalid @enderror" id="lokasi" placeholder="Masukan lokasi rak" wire:model="lokasi">
                      @error('lokasi')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>        
                      @enderror 
                    </div>
                  </div>
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                  </div>
                </form>
              </div>
            </div>
      </div>
  </div>