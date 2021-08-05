<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Dashboard</title>
</head>
<body>
    <h1 class="text-lg-center">Dashboard</h1>
    <form action="{{url('update_table')}}" method="post">
        {{ csrf_field() }}
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">URL</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Block/unblock</th>
            </tr>
            </thead>
            <tbody>
            @foreach($instances as $i)
                <tr>
                    <td>{{ $i->name }}</td>
                    <td><a href = "http://{{ $i->url }}">{{ $i->url }}</a></td>
                    <td><input type="text" name="title{{$i->id}}" id="title{{$i->id}}" value="{{$configs[$i->name]['title']}}"></td>
                    <td><input type="text" name="desc{{$i->id}}" id="desc{{$i->id}}" value="{{$configs[$i->name]['description']}}"></td>
                    <td>
                        @if ($configs[$i->name]['status'] == true)
                            <input type="checkbox" name="status{{$i->id}}" id="status{{$i->id}}" checked>
                        @else
                            <input type="checkbox" name="status{{$i->id}}" id="statu{{$i->id}}">
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary pull-right">Save</button>
    </form>
</body>
</html>
