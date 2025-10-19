<?php
include 'config.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'] ?? '';
    $email = $_POST['email'] ?? '';
    $pesan = $_POST['pesan'] ?? '';

    if (!empty($nama) && !empty($email) && !empty($pesan)) {
        $sql = "INSERT INTO contact_messages (nama, email, pesan) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $nama, $email, $pesan);

        if ($stmt->execute()) {
            $message = "<p class='text-green-600 font-semibold text-center mt-4'>Pesan berhasil dikirim! Terima kasih telah menghubungi kami.</p>";
        } else {
            $message = "<p class='text-red-600 font-semibold text-center mt-4'>Terjadi kesalahan saat menyimpan pesan.</p>";
        }

        $stmt->close();
    } else {
        $message = "<p class='text-red-600 font-semibold text-center mt-4'>Semua kolom wajib diisi.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="id" class="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perusahaan Minyak - Hubungi Kami</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 text-gray-800">

    <nav class="bg-gray-900 text-white px-6 py-4 flex justify-between items-center">
        <div class="text-xl font-bold">
            <a href="index.php">Oil Nusantara</a>
        </div>
        <ul class="flex gap-6">
            <li><a href="about.php" class="hover:text-yellow-400">Tentang Kami</a></li>
            <li><a href="goals.php" class="hover:text-yellow-400">Tujuan Kami</a></li>
            <li><a href="contact.php" class="hover:text-yellow-400">Kontak Kami</a></li>
            <li><a href="login.php" class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-400 text-black">Login</a></li>
        </ul>
    </nav>

    <section class="max-w-3xl mx-auto mt-10">
        <h2 class="text-3xl font-bold mb-6 text-center">Hubungi Kami</h2>

        <form action="" method="post" class="bg-white p-6 rounded-lg shadow-md">
            <label class="block mb-2 font-semibold">Nama</label>
            <input type="text" name="nama" class="w-full border rounded-lg px-3 py-2 mb-4" required>

            <label class="block mb-2 font-semibold">Email</label>
            <input type="email" name="email" class="w-full border rounded-lg px-3 py-2 mb-4" required>

            <label class="block mb-2 font-semibold">Pesan</label>
            <textarea name="pesan" class="w-full border rounded-lg px-3 py-2 mb-4" rows="4" required></textarea>

            <button type="submit" class="bg-yellow-500 text-black px-6 py-2 rounded-lg hover:bg-yellow-400">Kirim</button>

            <?php echo $message; ?>
        </form>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white text-center py-4 mt-10">
        &copy; 2024 Oil Nusantara. Semua hak dilindungi.
    </footer>

</body>
</html>
