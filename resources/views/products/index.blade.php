<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
</head>
<body>
    <!-- Larvavel CRUD source video used: https://www.youtube.com/watch?v=_LA9QsgJ0bw -->
    <h1>Products</h1>
    <div>
        @if(session()->has('success'))
            <div>
                {{session('success')}} <!-- 'success' points to with('success') message in route -->
            </div>
        @endif
    </div>

    <div>
        <a href="{{route('product.create')}}">Create a new product</a>
    </div>

    <div>
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>QTY</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->qty}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->description}}</td>
                    <td><a href="{{route('product.edit', ['product' => $product])}}">Edit</a></td> <!-- ['product'] = {product} in route -->
                    <td>
                        <form action="{{route('product.delete', ['product' => $product])}}" method="post">
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