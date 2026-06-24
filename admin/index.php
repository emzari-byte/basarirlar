<?php
http_response_code(403);
?>
<!doctype html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin | Başarırlar Kurumsal Kırtasiye</title>
    <style>
        body {
            margin: 0;
            min-height: 100vh;
            display: grid;
            place-items: center;
            font-family: "Segoe UI", Arial, sans-serif;
            color: #12213a;
            background: #f3f7fb;
        }

        main {
            width: min(520px, calc(100% - 32px));
            padding: 30px;
            border: 1px solid #dbe5f2;
            border-radius: 8px;
            background: #fff;
        }
    </style>
</head>
<body>
<main>
    <h1>Yetkili erişim alanı</h1>
    <p>Bu sayfa yalnızca yetkili kullanıcılar içindir. Site kullanımı için ana sayfaya dönebilirsiniz.</p>
</main>
</body>
</html>
