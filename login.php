<!DOCTYPE html>
<html lang="id" class="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perusahaan Minyak</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 text-gray-800">
    <nav class="bg-gray-900 text-white px-6 py-4 flex justify-between items-center">
        <div class="text-xl font-bold">
            <a href="index.php"> Oil Nusantara</a>
        </div>
        <ul class="flex gap-6">
            <li><a href="about.php" class="hover:text-yellow-400">Tentang Kami</a></li>
            <li><a href="goals.php" class="hover:text-yellow-400">Tujuan Kami</a></li>
            <li><a href="contact.php" class="hover:text-yellow-400">Kontak Kami</a></li>
            <li><a href="login.php" class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-400 text-black">Login</a></li>
        </ul>
    </nav>
</body>

<?php
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username === "admin" && $password === "1234") {
        $message = "<p class='text-green-600 font-semibold text-center mt-4'>
                        Login berhasil! Selamat datang, <strong>Admin</strong>.
                    </p>";
    } else {
        $message = "<p class='text-red-600 font-semibold text-center mt-4'>
                        Login gagal. Periksa kembali Username dan Password.
                    </p>";
    }
}
?>

<section class="flex justify-center items-center h-[80vh]">
    <form action="" method="post" class="bg-white p-8 rounded-lg shadow-lg w-80">
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-900">Login</h2>
        
        <input 
            type="text" 
            name="username" 
            placeholder="Username" 
            class="w-full border px-3 py-2 mb-4 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400" 
            required
        >

        <input 
            type="password" 
            name="password" 
            placeholder="Password" 
            class="w-full border px-3 py-2 mb-6 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400" 
            required
        >

        <button 
            type="submit" 
            class="bg-yellow-500 text-black w-full py-2 rounded-lg hover:bg-yellow-400 transition font-semibold"
        >
            Masuk
        </button>

        <?php echo $message; ?>
    </form>
</section>

    <main class="p-6">
        <footer class="bg-gray-900 text-white text-center py-4 mt-10">
            &copy; 2024 Oil Nusantara. Semua hak dilindungi.
        </footer>
    </main>

</body>

</html>