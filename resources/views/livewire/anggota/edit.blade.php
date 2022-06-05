
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
                  <h3 class="card-title">Form edit anggota</h3>
                </div>
                <form wire:submit.prevent="edit">
                  @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label for="nama">Nama</label>
                      <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Masukan Nama" wire:model="nama">
                      @error('nama')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>        
                      @enderror        
                    </div>
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Masukan Password" wire:model="password">
                      @error('password')
                      <div class="invalid-feedback">
                        {{$message}}
                      </div>        
                      @enderror 
                    </div>
                    <div class="form-group">
                      <label for="konfirmasi_pass">Konfirmasi Password</label>
                      <input type="password" class="form-control @error('konfirmasi') is-invalid @enderror" id="konfirmasi_pass" placeholder="Masukan Password" wire:model="konfirmasi">
                      @error('konfirmasi')
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