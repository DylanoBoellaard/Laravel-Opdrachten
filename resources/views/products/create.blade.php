<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create-laravel</title>
</head>
<body>
    <h1>Create a product</h1>
    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
    </div>

    <div><a href="{{route('product.index')}}">Return to home page</a></div>

    <form action="{{route('product.store')}}" method="post">
        @csrf
        @method('post') <!-- Both @'s required for laravel -->
        <fieldset>
            <label for="name">Name:</label>
                <input type="text" name="name" id="name" placeholder="name">
            <label for="qty">qty:</label>
                <input type="number" name="qty" id="qty" placeholder="qty">
            <label for="price">Price:</label>
                <input type="number" name="price" id="price" placeholder="price (0.00)" step="0.01" min="0">
            <label for="description">Description:</label>
                <input type="text" name="description" id="description" placeholder="description">
            <input type="submit" value="Submit a new product">
        </fieldset>
    </form>
</body>
</html>