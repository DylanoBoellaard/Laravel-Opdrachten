<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
</head>
<body>
    <h1>Shops</h1>
    <div>
        @if(session()->has('success'))
            <div>
                {{session('success')}}
            </div>
        @endif
    </div>

    <div>
        <a href="{{route('shop.create')}}">Create a new shop</a>
    </div>

    <div>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Street</th>
                    <th>City</th>
                    <th>Country</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($shops as $shop)
                <tr>
                    <td>{{$shop->id}}</td>
                    <td>{{$shop->name}}</td>
                    <td>{{$shop->street}}</td>
                    <td>{{$shop->city}}</td>
                    <td>{{$shop->country}}</td>
                    <td><a href="{{route('shop.edit', ['shop' => $shop])}}">Edit</a></td> <!-- ['product'] = {product} in route -->
                    <td>
                        <form action="{{route('shop.delete', ['shop' => $shop])}}" method="post">
                        @csrf
                        @method('delete') <!-- Both @'s required -->
                            <input type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>