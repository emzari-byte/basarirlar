<?php
// ÖRNEK dosya. Bunu kopyalayıp "secrets.php" adıyla kaydedin ve kendi bilgilerinizi girin.
// secrets.php GitHub'a gönderilmez; gerçek şifreler yalnızca sunucuda bulunur.
define('SMTP_HOST', 'smtp.alanadiniz.com');
define('SMTP_PORT', 587);          // 587, 465 vb.
define('SMTP_SECURE', '');         // '' (yok), 'tls' veya 'ssl'
define('SMTP_USER', 'web@alanadiniz.com');
define('SMTP_PASS', 'BURAYA_SIFRE');
define('MAIL_FROM', 'web@alanadiniz.com');
