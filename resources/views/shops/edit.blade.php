<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Shops</title>
</head>
<body>
    <h1>Edit a shop</h1>
    <div>
        @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
        @endif
    </div>

    <div><a href="{{route('shop.index')}}">Return to home page</a></div>

    <form action="{{route('shop.update', ['shop' => $shop])}}" method="post">
        @csrf
        @method('put') <!-- Both @'s required for laravel ||| 'put' is for updating -->
        <fieldset>
            <label for="name">Name:</label>
                <input type="text" name="name" id="name" placeholder="name" value="{{$shop->name}}">
            <label for="street">Street:</label>
                <input type="text" name="street" id="street" placeholder="street" value="{{$shop->street}}">
            <label for="city">City:</label>
                <input type="text" name="city" id="city" placeholder="city" value="{{$shop->city}}">
            <label for="country">Country:</label>
                <input type="text" name="country" id="country" placeholder="country" value="{{$shop->country}}">
            <input type="submit" value="Update a new shop">
        </fieldset>
    </form>
</body>
</html>