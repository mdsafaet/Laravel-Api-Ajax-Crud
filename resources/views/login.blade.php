<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
  <div class="bg-white p-8 rounded shadow-lg w-96">
    <h2 class="text-2xl font-bold mb-6 text-center">Login</h2>
    @if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        {{ session('error') }}
    </div>
@endif
<form action="{{ route('account.LoginIndex') }}" method="POST">

      @csrf
      <div class="mb-4">
          <label for="email" class="block text-gray-700">Email</label>
          <input type="email" id="email" name="email" class="w-full border border-gray-300 px-3 py-2 rounded" required>
      </div>
      <div class="mb-4">
          <label for="password" class="block text-gray-700">Password</label>
          <input type="password" id="password" name="password" class="w-full border border-gray-300 px-3 py-2 rounded" required>
      </div>
      <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded">Login</button>
  </form>
    <p class="text-center text-gray-600 mt-4">
      Don't have an account? <a href="" class="text-blue-500">Register here</a>
    </p>
  </div>
</body>
</html>
