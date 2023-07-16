<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home</title>
</head>
<body>
    <div align="center">
        <form action="{{url('upload')}}" method="POST" enctype="multipart/form-data">
        @csrf
            <div style="padding: 10px;">
                <lable>Name</lable>
                <input type='text' name="name">
            </div>

            <div style="padding: 10px;">
                <lable>Email</lable>
                <input type='email' name="email">
            </div>

            <div style="padding: 10px;">
                <lable>Image</lable>
                <input type='file' name="file">
            </div>

            <div style="padding: 10px;">
                <input type='submit'>
            </div>
        </form>

    </div>

</body>
</html>