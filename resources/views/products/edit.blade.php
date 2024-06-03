<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
</head>
<body>
    <h1>Edit Product</h1>
    
    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ $product->name }}">
        <br>
        <label for="price">Price:</label>
        <input type="text" id="price" name="price" value="{{ $product->price }}">
        <br>
        <button type="submit">Update Product</button>
    </form>
    
    <a href="{{ route('products.index') }}">Back to Product List</a>
</body>
</html>
