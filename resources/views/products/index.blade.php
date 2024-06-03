<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
</head>
<body>
    <h1>Product List</h1>
    
    <ul>
        @foreach($products as $product)
            <li>
                <a href="{{ route('products.show', $product->id) }}">
                    {{ $product->name }} - ${{ $product->price }}
                </a>
            </li>
        @endforeach
    </ul>
</body>
</html>
