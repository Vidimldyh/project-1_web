<?php
// Panggil file koneksi
include 'koneksi.php';

// Cek apakah form dikirim dengan metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil dan simpan data dari form
    $namalengkap = $_POST["namalengkap"];
    $tanggal = $_POST["tanggal"];
    $jeniskelamin = $_POST["optradio"]; // nilai: 'laki-laki' atau 'perempuan'
    $umur = $_POST["umur"];

    // Validasi dasar (opsional, karena HTML sudah pakai required)
    if (!empty($namalengkap) && !empty($tanggal) && !empty($jeniskelamin) && !empty($umur)) {
        // Siapkan SQL untuk menyimpan data
        $sql = "INSERT INTO daftar (namalengkap, tanggal, jeniskelamin, umur)
                VALUES (?, ?, ?, ?)";

        // Gunakan prepared statement agar aman dari SQL injection
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $namalengkap, $tanggal, $jeniskelamin, $umur);

        if ($stmt->execute()) {
            // Berhasil disimpan
            echo "<script>
                window.location.href = 'tampildata.php';
            </script>";
        } else {
            // Gagal menyimpan
            echo "Terjadi kesalahan: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Semua field wajib diisi.";
    }
}

$conn->close();
?>
