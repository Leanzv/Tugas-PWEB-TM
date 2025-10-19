<?php
$user = $_SESSION['user'] ?? null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar User</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans min-h-screen">

    <div class="max-w-6xl mx-auto mt-10 bg-white shadow-xl rounded-2xl p-8">
        <div class="flex justify-between items-center border-b pb-4 mb-6">
            <h1 class="text-3xl font-bold text-gray-800">📋 Daftar User</h1>
            <div class="text-right">
                <p class="text-gray-600">
                    Halo, <span class="font-semibold text-blue-600"><?= htmlspecialchars($user['username']) ?></span>
                    |
                    <a href="/logout" class="text-red-500 hover:text-red-600 font-medium">Logout</a>
                </p>
            </div>
        </div>

        <div class="mb-6 flex justify-end">
            <a href="/user/create"
               class="bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 transition shadow">
               + Tambah User
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full border border-gray-300 rounded-lg overflow-hidden shadow-sm text-sm">
                <thead class="bg-blue-600 text-white uppercase text-left">
                    <tr>
                        <th class="py-3 px-4">ID</th>
                        <th class="py-3 px-4">Username</th>
                        <th class="py-3 px-4">Nama</th>
                        <th class="py-3 px-4">Email</th>
                        <th class="py-3 px-4">Role</th>
                        <th class="py-3 px-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <?php foreach ($users as $u): ?>
                    <tr class="hover:bg-gray-50 transition">
                        <td class="py-3 px-4"><?= htmlspecialchars($u['id']) ?></td>
                        <td class="py-3 px-4"><?= htmlspecialchars($u['username']) ?></td>
                        <td class="py-3 px-4"><?= htmlspecialchars($u['nama']) ?></td>
                        <td class="py-3 px-4"><?= htmlspecialchars($u['email']) ?></td>
                        <td class="py-3 px-4"><?= htmlspecialchars($u['role']) ?></td>
                        <td class="py-3 px-4 text-center space-x-2">
                            <a href="/user/show/<?= $u['id'] ?>"
                               class="text-blue-600 hover:underline">Detail</a>
                            <a href="/user/edit/<?= $u['id'] ?>"
                               class="text-yellow-600 hover:underline">Edit</a>
                            <a href="/user/delete/<?= $u['id'] ?>"
                               class="text-red-600 hover:underline"
                               onclick="return confirm('Yakin ingin menghapus user ini?')">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="mt-6 text-sm text-gray-500 text-center">
            &copy; <?= date('Y') ?> Ryan - Copyriqht Terlindungi.
        </div>
    </div>

</body>
</html>
