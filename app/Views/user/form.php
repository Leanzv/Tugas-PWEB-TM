<?php
$editing = isset($user);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $editing ? 'Edit' : 'Tambah' ?> User</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
  <div class="w-full max-w-md bg-white shadow-lg rounded-2xl p-8">
    <h1 class="text-2xl font-semibold text-center mb-6 text-gray-800">
      <?= $editing ? 'Edit' : 'Tambah' ?> User
    </h1>

    <form method="post" 
          action="<?= $editing ? "/user/edit/{$user['id']}" : '/user/create' ?>" 
          class="space-y-4">

      <div>
        <label class="block text-sm font-medium text-gray-700">Username</label>
        <input type="text" name="username" required
               value="<?= $editing ? htmlspecialchars($user['username']) : '' ?>"
               class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">Password</label>
        <input type="password" name="password" <?= $editing ? '' : 'required' ?>
               placeholder="<?= $editing ? '(Kosongkan jika tidak diubah)' : '' ?>"
               class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">Nama</label>
        <input type="text" name="nama"
               value="<?= $editing ? htmlspecialchars($user['nama']) : '' ?>"
               class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" name="email"
               value="<?= $editing ? htmlspecialchars($user['email']) : '' ?>"
               class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">Role</label>
        <select name="role" 
                class="mt-1 w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500">
          <option value="user" <?= $editing && $user['role']=='user' ? 'selected' : '' ?>>User</option>
          <option value="admin" <?= $editing && $user['role']=='admin' ? 'selected' : '' ?>>Admin</option>
        </select>
      </div>

      <button type="submit" 
              class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition duration-200">
        Simpan
      </button>
    </form>

    <p class="text-center mt-6">
      <a href="/user" class="text-blue-600 hover:underline">← Kembali</a>
    </p>
  </div>
</body>
</html>
