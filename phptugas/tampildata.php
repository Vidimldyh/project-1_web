<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container mt-5">
        <h1>DAFTAR PESERTA</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>Tanggal Daftar</th>
                    <th>Jenis Kelamin</th>
                    <th>Umur</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Panggil file koneksi
                include 'koneksi.php';

                // Ambil data dari tabel pendaftaran
                $sql = "SELECT * FROM daftar";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $no = 1;
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $no++ . "</td>";
                        echo "<td>" . htmlspecialchars($row["namalengkap"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["tanggal"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["jeniskelamin"]) . "</td>";
                        echo "<td>" . htmlspecialchars($row["umur"]) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='5'>Belum ada data peserta.</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
        <a href="audisi.html" class="btn btn-secondary">Kembali ke Form</a>
    </div>
</body>
</html>
