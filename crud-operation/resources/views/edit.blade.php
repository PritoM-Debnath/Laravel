<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit</title>
</head>
<body>
    <h1>Edit</h1>

    <form action="{{url('update',$data->id)}}" method="POST" enctype="multipart/form-data">
       @csrf 
        <div>
            <label>Name</lable>
            <input type="text" name="name" value="{{$data->name}}">
        </div>
        <div>
            <label>Email</lable>
            <input type="text" name="email" value="{{$data->email}}">
        </div>
        <div>
            <label>Old image</lable>
            <img height="100" width="100" src="/student/{{$data->image}}">
        </div>
        <div>
            <label>Change Image</lable>
            <input type="file" name="file">
        </div>
        <div>
            <label>Update</lable>
            <input type="submit">
        </div>
    </form>
</body>
</html>