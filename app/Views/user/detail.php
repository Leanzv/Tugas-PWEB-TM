<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail User</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans min-h-screen flex items-center justify-center">

    <div class="bg-white shadow-xl rounded-2xl p-8 w-full max-w-md">
        <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">👤 Detail User</h1>

        <div class="space-y-4">
            <div>
                <p class="text-gray-500 text-sm">ID</p>
                <p class="font-semibold text-gray-800"><?= htmlspecialchars($user['id']) ?></p>
            </div>
            <div>
                <p class="text-gray-500 text-sm">Username</p>
                <p class="font-semibold text-gray-800"><?= htmlspecialchars($user['username']) ?></p>
            </div>
            <div>
                <p class="text-gray-500 text-sm">Nama</p>
                <p class="font-semibold text-gray-800"><?= htmlspecialchars($user['nama']) ?></p>
            </div>
            <div>
                <p class="text-gray-500 text-sm">Email</p>
                <p class="font-semibold text-gray-800"><?= htmlspecialchars($user['email']) ?></p>
            </div>
            <div>
                <p class="text-gray-500 text-sm">Role</p>
                <span class="inline-block px-3 py-1 rounded-full text-sm font-semibold 
                    <?= $user['role'] === 'admin' ? 'bg-red-100 text-red-700' : 'bg-blue-100 text-blue-700' ?>">
                    <?= htmlspecialchars($user['role']) ?>
                </span>
            </div>
        </div>

        <div class="mt-8 text-center">
            <a href="/user"
               class="inline-block bg-blue-600 text-white px-5 py-2 rounded-lg hover:bg-blue-700 transition">
               ← Kembali
            </a>
        </div>
    </div>

</body>
</html>
