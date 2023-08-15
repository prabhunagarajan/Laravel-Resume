@include('Layout.header')

<div class="container">
    <h1>Resume Details</h1>
    <table class="table table-striped">
    @foreach ($resumes as $resume)

    <img src="{{ asset('upload/' . $resume->img) }}" alt="Resume Image" width="150" height="150" style="object-fit: cover; object-position: top; margin-bottom: 10px; float: right;">
        <tr>
            <th>Name:</th>
            <td>{{ $resume->name }}</td>
        </tr>
        <tr>
            <th>Dob:</th>
            <td>{{ $resume->dob }}</td>
        </tr>
        <tr>
            <th>Gender:</th>
            <td>{{ $resume->gender }}</td>
        </tr>
        <tr>
            <th>Email:</th>
            <td>{{ $resume->email }}</td>
        </tr>
        <tr>
            <th>Phone:</th>
            <td>{{ $resume->phone }}</td>
        </tr>
        <tr>
            <th>City:</th>
            <td>{{ $resume->city }}</td>
        </tr>
        <tr>
            <th>Experience:</th>
            <td>{{ $resume->experience }}</td>
        </tr>
        <tr>
            <th>Address:</th>
            <td>{{ $resume->address }}</td>
        </tr>
        <tr>
            <th>Education:</th>
            <td>{{ $resume->education }}</td>
        </tr>
        <tr>
            <th>Skills:</th>
            <td>{{ $resume->skills }}</td>
        </tr>
        @endforeach
    </table>
</div>

@include('Layout.footer')
