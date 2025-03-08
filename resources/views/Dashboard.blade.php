<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- jQuery (Required for AJAX) -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- Bootstrap JS (for modal) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body class="bg-gray-100">

    <!-- Header Section -->
    <header class="bg-blue-500 text-white py-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold text-red-500"> Dashboard</h1>
            <nav>
                <a href="{{ url('/') }}" class="text-white px-4">Homepage</a>
                <a href="{{ route('account.logout') }}" class="text-white px-4">Logout</a>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto py-10">

        <h2 class="text-3xl font-semibold mb-6">Welcome to Your Dashboard</h2>

        <!-- Add Product Button -->
        <button type="button" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600"
                data-bs-toggle="modal" data-bs-target="#exampleModal">
            Add Product
        </button>

        <!-- Product Table -->
        <div class="mt-8">
            @if($products->isEmpty())
                <p>No products found.</p>
            @else
                <table class="min-w-full border-collapse table-auto">
                    <thead>
                        <tr class="bg-blue-500 text-white">
                            <th class="px-4 py-2 border">ID</th>
                            <th class="px-4 py-2 border">Name</th>
                            <th class="px-4 py-2 border">Quantity</th>
                            <th class="px-4 py-2 border">Price</th>
                            <th class="px-4 py-2 border">Image</th>
                            <th class="px-4 py-2 border">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr class="border-t border-gray-300 font-bold">
                                <td class="px-4 py-2 border">{{ $product->id }}</td>
                                <td class="px-4 py-2 border">{{ $product->name }}</td>
                                <td class="px-4 py-2 border">{{ $product->quantity }}</td>
                                <td class="px-4 py-2 border">${{ number_format($product->price, 2) }}</td>
                                <td class="px-4 py-2 border">
                                    @if($product->image)
                                        <img src="{{ Storage::url($product->image) }}" alt="Product Image" class="w-24 h-auto">
                                    @else
                                        No image available
                                    @endif
                                </td>
                                <td class="px-4 py-2">
                                    <div class="gap-2 flex">

                                        <button class="btn btn-primary btn-sm  editProduct"  data-id="{{ $product->id }}">Edit</button>
                                        <button class="btn btn-danger btn-sm delete_product" data-id="{{ $product->id }} ">Delete</button>
                                        <button class="btn btn-info btn-sm view-product" data-id="{{ $product->id }}">View</button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>

        <!-- Pagination -->
        <div class="mt-6 text-white">
            {{ $products->links() }}
        </div>

    </main>

    <!-- Include Modal -->
    @include('addmodal')
    @include('editmodal')
    @include('deletemodal')
    @include('viewproduct')
    

</body>

</html>
