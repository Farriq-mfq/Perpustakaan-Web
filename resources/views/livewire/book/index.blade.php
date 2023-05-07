<div>
    <div class="row">
      @if(session()->has('alert'))
      <div class="col-md-12">
        <div class="alert alert-info alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5><i class="icon fas fa-info"></i> Alert!</h5>
          {{session('alert')}}
        </div>
      </div>
      @endif
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex justify-content-between">
                  <h3 class="card-title">Table Data Buku</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <livewire:book-table theme="bootstrap-4" />
                </div>
              </div>
              </div>
        </div>
    </div>
</div>