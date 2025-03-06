<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
  <header class="bg-blue-500 text-white py-4">
    <div class="container mx-auto flex justify-between items-center">
      <h1 class="text-2xl font-bold">Dashboard</h1>
      <nav>
        <a href=" " class="text-white px-4">Homepage</a>
        <a href="{{ route('account.logout') }}" class="text-white px-4">Logout</a>
        
      </nav>
    </div>
  </header>
  <main class="container mx-auto py-10">
    <h2 class="text-3xl font-semibold mb-6">Welcome, This Is Your Dashboard </h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

    </div>
  </main>
</body>
</html>
