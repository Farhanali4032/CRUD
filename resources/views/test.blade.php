@include('header')

<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Student</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($students as $key => $stud)
      <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $stud->name }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <div>{{ $students->links()}}</div>
@include('footer')