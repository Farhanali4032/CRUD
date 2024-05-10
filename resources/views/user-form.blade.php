@include('header')
<div class="page page-center">
  @if (@session()->exists('status'))
      <div class="elrat elart-susscess">{{session['status']}}</div>
  @endif
  <div class="container container-tight py-4">
    <form method="POST" class="card card-md" action="{{url('role/'.$user->id.'/update')}}" enctype="multipart/form-data" autocomplete="off" novalidate>
      @csrf
      <div class="card-body">
        <div class="mb-3">
            <div class="form-label">Role</div>
            @error('role')
              <span class="text-danger">{{$message}}</span>
            @enderror
            <select class="form-select" name="role" >
              @if ($user->hasAnyRole('Admin', 'Manager', 'User'))
                @foreach ($userRole as $role)
              <option value="{{$role}}" selected>{{$role}}</option>
                @endforeach
                @else
                <option value="" selected>No Role</option>
              @endif
              @foreach ($roles as $role)
              @if (!$user->hasRole($role))
              <option value="{{$role}}">{{$role}}</option>
              @endif
              @endforeach
            </select>
          </div>
      </div>
        <div class="form-footer">
          <button type="submit" class="btn btn-primary w-100">Assign</button>
        </div>
        </div>
      </div>
    </form>
  </div>
</div>

@include('footer')