@include('Layout.header')
<table class="table">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Dob</th>
      <th scope="col">Gender</th>
      <th scope="col">Email</th>
      <th scope="col">Phone Number</th>
      <th scope="col">City</th>
      <th scope="col">Experience</th>
      <th scope="col">Address</th>
      <th scope="col">Education</th>
      <th scope="col">Skills</th>
      <th scope="col">View</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
  @foreach($resumes as $resume)
    <tr>
      <td>{{$resume->name}}</td>
      <td>{{$resume->dob}}</td>
      <td>{{$resume->gender}}</td>
      <td>{{$resume->email}}</td>
      <td>{{$resume->phone}}</td>
      <td>{{$resume->city}}</td>
      <td>{{$resume->experience}}</td>
      <td>{{$resume->address}}</td>
      <td>{{$resume->education}}</td>
      <td>{{$resume->skills}}</td>
      <td>
      <a href="{{ url($resume->id.'/view') }}" class="btn btn-rounded btn-outline-info">View</a>
      </td>
      <td>
      <a href="{{ url($resume->id.'/delete') }}" class="btn btn-rounded btn-outline-info">Delete</a>
      </td>
      </tr>
      @endforeach
@include('Layout.footer')