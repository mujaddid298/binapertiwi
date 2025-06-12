<!DOCTYPE html>
<html>
<head>
    <title>Open Block Diajukan</title>
</head>
<body>
    <h2>Open Block Baru Telah Diajukan</h2>
    <p>Tanggal: {{ $openblock->tanggal }}</p>
    <p>Cabang: {{ $openblock->cabang }}</p>
    <p>Diajukan oleh: {{ $openblock->diajukan }}</p>

    <a href="{{ url('http://127.0.0.1:8000/approve/' . $openblock->id) }}" style="background-color: #08f476; color: white; padding: 10px 20px; text-decoration: none; border-radius: 20px;">Lihat Detail</a>
    <!-- Tambahkan detail lain sesuai kebutuhan -->
</body>
</html>
