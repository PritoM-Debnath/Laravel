<!DOCTYPE html>
<html lang="en">
<head>
    <title>Show</title>
</head>
<body>
    <form action="{{url('search')}}" method="POST" align="center">
        @csrf
       <input type="search" name="search" placeholder="Search here">
       <input type="submit" value="Search">
    </form>
    <br>
    <table border="1px" align="center">
        <tr>
            <td>Student name</td>
            <td>Email</td>
            <td>Image</td>
            <td>Remove</td>
            <td>Edit</td>
        </tr>

        @foreach($data as $student)
        <tr>
            <td>{{$student->name}}</td>
            <td>{{$student->email}}</td>
            <td>
                <img height="150" width="150" src="student/{{$student->image}}">
            </td>
            <td>
                <a href="{{url('remove',$student->id)}}">Remove</a>
            </td>
            <td>
                <a href="{{url('edit',$student->id)}}">Edit</a>
            </td>
        </tr>
        @endforeach
    </table>

</body>
</html>