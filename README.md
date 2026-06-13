# Başarırlar Kurumsal Kırtasiye

Denizli'nin en büyük kurumsal kırtasiyesi — kurumsal/toptan kırtasiye tedarik web sitesi.

## Teknoloji
- PHP (7.4+), saf HTML/CSS/JS (framework yok)
- PHPMailer ile SMTP e-posta gönderimi
- XAMPP / Apache üzerinde çalışır

## Kurulum (yerel veya sunucu)
1. Dosyaları web köküne yükleyin (örn. `htdocs/basarirlar` veya alan adının kök dizini).
2. `includes/secrets.example.php` dosyasını `includes/secrets.php` olarak kopyalayın ve SMTP bilgilerini girin:
   ```php
   define('SMTP_HOST', 'smtp.alanadiniz.com');
   define('SMTP_USER', 'web@alanadiniz.com');
   define('SMTP_PASS', 'gizli-sifre');
   ```
3. `uploads/` klasörünün yazılabilir olduğundan emin olun.
4. Canlı sunucuda `includes/config.php` içindeki `BASE_PATH` değerini kök dizine kuruluyorsa `''` yapın (detay aşağıda).

## Önemli notlar
- **`includes/secrets.php` git'e gönderilmez** (`.gitignore`). Şifreler yalnızca sunucuda bulunur.
- `BASE_PATH`: Yerelde `/basarirlar`. Site alan adının köküne kurulursa `''` (boş) yapılmalıdır.
- `SITE_URL`: `https://www.basarirlarkurumsal.com`
- Form gönderimleri `cihan@basarirlar.com.tr` adresine iletilir; kayıtlar `uploads/form-submissions.log` içine yazılır.

## Yapı
- `index.php`, `hakkimizda.php`, `kurumsal-kirtasiye.php`, `urun-gruplari.php`, `markalar.php`, `hizmetlerimiz.php`, `teklif-al.php`, `iletisim.php`, `blog.php`
- `kvkk.php`, `gizlilik-politikasi.php`, `cerez-politikasi.php` (yasal)
- `includes/` — config, header, navbar, footer, ortak parçalar
- `assets/` — css, js, görseller
- `PHPMailer/` — e-posta kütüphanesi
