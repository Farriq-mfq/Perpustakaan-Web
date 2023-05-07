<div class="card card-outline card-secondary">
    <div class="card-header text-center">
      <h1><b>Perpus</b>Qu</h1>
    </div>
    <div class="card-body">
      @if($error)
      <p class="login-box-msg text-danger">
        {{$error}}
      </p>
      @endif
      <form wire:submit.prevent="handleLogin" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" wire:model="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          @error('email')
          <div class="invalid-feedback">
            {{$message}}
          </div>        
          @enderror 
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" wire:model="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          @error('password')
          <div class="invalid-feedback">
            {{$message}}
          </div>        
          @enderror 
        </div>
        <div class="row">   
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>