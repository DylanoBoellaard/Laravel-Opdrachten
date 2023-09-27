<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a new shop</title>
</head>
<body>
    <h1>Create a new shop</h1>
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

    <form action="{{route('shop.store')}}" method="post">
        @csrf
        @method('post') <!-- Both @'s required for laravel -->
        <fieldset>
        <label for="name">Name:</label>
                <input type="text" name="name" id="name" placeholder="name">
            <label for="street">Street:</label>
                <input type="text" name="street" id="street" placeholder="street">
            <label for="city">City:</label>
                <input type="text" name="city" id="city" placeholder="city">
            <label for="country">Country:</label>
                <input type="text" name="country" id="country" placeholder="country">
            <input type="submit" value="Submit a new shop">
        </fieldset>
    </form>
</body>
</html>