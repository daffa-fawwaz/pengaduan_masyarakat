<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Response Pengaduan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
        }

        p {
            color: #555;
            line-height: 1.6;
        }

        blockquote {
            margin: 20px 0;
            padding: 15px;
            background: #f9f9f9;
            border-left: 5px solid #007bff;
            font-style: italic;
            color: #333;
        }

        .footer {
            margin-top: 20px;
            font-size: 12px;
            color: #777;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Response Pengaduan</h2>
        <p>Halo,</p>
        <p>Complaint anda dengan judul : {{ $complaint }}</p>
        <p>Admin telah menanggapi pengaduan Anda:</p>
        <blockquote>"{{ $response }}"</blockquote>
        <p>Terima kasih telah menggunakan layanan kami.</p>

        <div class="footer">
            <p>&copy; {{ date('Y') }} Sistem Pengaduan Masyarakat</p>
        </div>
    </div>
</body>

</html>
