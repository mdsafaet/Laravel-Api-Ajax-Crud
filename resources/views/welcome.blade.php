<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Homepage</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
  <header class="bg-blue-500 text-white py-4">
    <div class="container mx-auto flex justify-between items-center">
      <h1 class="text-2xl font-bold">Welcome to Peddy</h1>
      <nav>
        <a href="{{route('account.Loginshow')}}" class="text-white px-4">Login</a>
        <a href="{{route('account.RegistrationShow')}}" class="text-white px-4">Register</a>
      </nav>
    </div>
  </header>
  <main class="container mx-auto py-10">
    <h2 class="text-3xl text-center font-semibold mb-6">About Peddy</h2>
    <p class="text-gray-700 text-center">
      Peddy is your all-in-one solution for managing tasks, products, and more.
    </p>
  </main>
</body>
</html>
