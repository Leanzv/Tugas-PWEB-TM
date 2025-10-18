<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-500 to-purple-600 flex items-center justify-center">

  <div class="bg-white/90 backdrop-blur-sm shadow-xl rounded-2xl p-8 w-full max-w-md">
    <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Login</h1>

    <form action="/auth/login" method="POST" class="space-y-5">
      <div>
        <label class="block text-gray-700 font-medium mb-1">Username</label>
        <input type="text" name="username" required
               class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>

      <div>
        <label class="block text-gray-700 font-medium mb-1">Password</label>
        <input type="password" name="password" required
               class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
      </div>

      <button type="submit"
              class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded-lg font-semibold transition duration-200">
        Login
      </button>
    </form>

    <p class="text-center text-gray-600 mt-4">
      Belum punya akun?
      <a href="/auth/register" class="text-blue-600 hover:underline">Daftar di sini</a>
    </p>
  </div>

</body>
</html>
