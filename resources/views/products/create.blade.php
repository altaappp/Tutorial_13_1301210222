<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Product</title>
</head>
<body>
    <h1>Create New Product</h1>
    
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" id="name" name="name">
        <br>
        <label for="price">Price:</label>
        <input type="text" id="price" name="price">
        <br>
        <button type="submit">Create Product</button>
    </form>
    
    <a href="{{ route('products.index') }}">Back to Product List</a>
</body>
</html>
