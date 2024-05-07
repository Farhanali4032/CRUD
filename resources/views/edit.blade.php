@include('header')
<div class="page page-center">
  @if (@session()->exists('status'))
      <div class="elrat elart-susscess">{{session['status']}}</div>
  @endif
  <div class="container container-tight py-4">
    <form method="POST" class="card card-md" action="{{url('update/record/'.$user_record->id.'/edit')}}" enctype="multipart/form-data" autocomplete="off" novalidate>
      @csrf
      @method('PUT')
      <div class="card-body">
        <div class="mb-3">
          <label class="form-label required">Full name</label>
          <input type="text" class="form-control" name="fname" value="{{$user_record->fname}}" autocomplete="off" />
          <span class="text-danger">
            @error('fname')
              {{$message}}
            @enderror
          </span>
        </div>
        <div class="mb-3">
          <label class="form-label required">Email</label>
          <input type="email" class="form-control" name="email" value="{{$user_record->email}}" autocomplete="off" />
          <span class="text-danger">
            @error('email')
              {{$message}}
            @enderror
          </span>
        </div>
        <div class="mb-3">
          <label class="form-label">Phone number</label>
          <input type="tel" class="form-control" name="phoneNo" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" value="{{$user_record->phoneNo}}" autocomplete="off" />
          <span class="text-danger">
            @error('phoneNo')
              {{$message}}
            @enderror
          </span>
        </div>
        <div class="mb-3">
          <label class="form-label">Age</label>
          <input type="number" id="age" name="age" value="{{$user_record->age}}" class="form-control" min="1" max="120" required>
          <span class="text-danger">
            @error('age')
              {{$message}}
            @enderror
          </span>
        </div>
        <div class="mb-3">
          <div class="form-label">Gander</div>
          <span class="text-danger">
            @error('gander')
              {{$message}}
            @enderror
          </span>
          <div>
            <label class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="gander" value="male" {{$user_record->gander == 'male' ? 'checked' : ''}}>
              <span class="form-check-label">Male</span>
            </label>
            <label class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="gander" value="female" {{$user_record->gander == 'female' ? 'checked' : ''}}>
              <span class="form-check-label">Female</span>
            </label>
            <label class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="gander" value="other" {{$user_record->gander == 'other' ? 'checked' : ''}}>
              <span class="form-check-label">Other</span>
            </label>
          </div>
        </div>
        <div class="mb-3">
          <label class="form-label">Subject</label>
          <span class="text-danger">
            @error('subjects')
            {{$message}}
            @enderror
          </span>
          <select type="text" class="form-select" placeholder="Select Subject" id="select-tags" name="subjects[]" multiple>
            @foreach($user_record->subject as $subj)
            <option value="{{$subj->id}}" selected> {{ $subj->subject }}</option>
            @endforeach
            @foreach ($subjects as $subj)
            <option value="{{$subj->id}}"> {{ $subj->subject }}</option>
            @endforeach
          </select>
      </div>
        <div class="mb-3">
          <label class="form-label">Description<span class="form-label-description"></span></label>
          <textarea class="form-control" name="desc" rows="6" placeholder="Content..">{{$user_record->desc}}</textarea>
          <span class="text-danger">
            @error('desc')
            {{$message}}
            @enderror
          </span>
        </div>
        <div class="form-footer">
          <button type="submit" class="btn btn-primary w-100">Update</button>
        </div>
        </div>
      </div>
    </form>
  </div>
</div>

@include('footer')