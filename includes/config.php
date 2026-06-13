<?php
declare(strict_types=1);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Taban yolu otomatik algılanır: yerelde "/basarirlar", canlıda alan adı kökünde "".
$scriptDir = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? ''));
define('BASE_PATH', ($scriptDir === '/' || $scriptDir === '.' || $scriptDir === '') ? '' : rtrim($scriptDir, '/'));
define('SITE_URL', 'https://www.basarirlarkurumsal.com');
define('SITE_NAME', 'Başarırlar Kurumsal Kırtasiye');
define('SITE_TAGLINE', "Denizli'nin En Büyük Kurumsal Kırtasiyesi");
define('SITE_SLOGAN', 'İhtiyacınız olan her şey burada.');
define('COMPANY_NAME', 'Başarırlar Kurumsal Kırtasiye A.Ş.');
define('CONTACT_PERSON', 'Cihan Berber');
define('CONTACT_EMAIL', 'kurumsal@basarirlar.com.tr');
define('CONTACT_PHONE', '0258 263 45 67');
define('CONTACT_MOBILE', '0537 212 24 02');
define('CONTACT_WHATSAPP', '0555 966 45 45');
define('CONTACT_WHATSAPP_E164', '905559664545');
define('SOCIAL_INSTAGRAM', 'https://www.instagram.com/basarirlar_kurumsal_kirtasiye/');
define('CONTACT_ADDRESS', 'Dokuzkavaklar Mah. Ankara Bulvarı No:86 Pamukkale / Denizli');
define('GOOGLE_PLACE_ID', 'ChIJGStXAAA_xxQRQvVMUoEaEzQ');
define('WORKING_HOURS_WEEK', 'Pazartesi - Cumartesi · 08:30 - 19:00');
define('WORKING_HOURS_SAME_DAY', "Saat 13:00'a kadar verilen siparişler aynı gün teslim");
// Coğrafi konum (Google haritasındaki noktadan; yapay zeka ve yerel arama için doğrulayın)
define('GEO_LAT', '37.85899');
define('GEO_LNG', '29.07840');
define('PARENT_COMPANY', 'Başarırlar Yayın Dağıtım');
define('COMPANY_FOUNDED', '2025'); // Başarırlar Kurumsal Kırtasiye A.Ş. kuruluş yılı
define('FORM_MAIL_ENABLED', true);
define('FORM_RECIPIENT', 'cihan@basarirlar.com.tr'); // Form gönderimlerinin ulaşacağı adres
define('MAIL_FROM_NAME', SITE_NAME);

// ---- SMTP gizli bilgileri ----
// Şifre vb. bilgiler includes/secrets.php içinde tutulur (GitHub'a gönderilmez, .gitignore'da).
// Sunucuda secrets.php mevcut olmalı; yoksa aşağıdaki güvenli varsayılanlar devreye girer.
$secretsFile = __DIR__ . '/secrets.php';
if (is_file($secretsFile)) {
    require $secretsFile;
}
defined('SMTP_HOST') || define('SMTP_HOST', '');
defined('SMTP_PORT') || define('SMTP_PORT', 587);
defined('SMTP_SECURE') || define('SMTP_SECURE', '');
defined('SMTP_USER') || define('SMTP_USER', '');
defined('SMTP_PASS') || define('SMTP_PASS', '');
defined('MAIL_FROM') || define('MAIL_FROM', CONTACT_EMAIL);

function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function url(string $path = ''): string
{
    return rtrim(BASE_PATH, '/') . '/' . ltrim($path, '/');
}

function asset(string $path): string
{
    return url('assets/' . ltrim($path, '/'));
}

function canonical_url(string $path = ''): string
{
    return rtrim(SITE_URL, '/') . '/' . ltrim($path, '/');
}

function maps_embed_url(): string
{
    return 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d100801.77496403347!2d29.078399744774842!3d37.85899255008512!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14c73f0000572b19%3A0x34131a81524cf542!2zQmHFn2FyxLFybGFyIEt1cnVtc2FsIEvEsXJ0YXNpeWUgQS7Fni4!5e0!3m2!1str!2str!4v1781359495902!5m2!1str!2str';
}

function maps_directions_url(): string
{
    return 'https://www.google.com/maps/dir/?api=1&destination=' . rawurlencode(CONTACT_ADDRESS)
        . '&destination_place_id=' . rawurlencode(GOOGLE_PLACE_ID);
}

function maps_place_url(): string
{
    return 'https://www.google.com/maps/search/?api=1&query=' . rawurlencode(CONTACT_ADDRESS)
        . '&query_place_id=' . rawurlencode(GOOGLE_PLACE_ID);
}

function nav_items(): array
{
    return [
        'anasayfa' => ['label' => 'Anasayfa', 'href' => url('')],
        'hakkimizda' => ['label' => 'Hakkımızda', 'href' => url('hakkimizda')],
        'kurumsal-kirtasiye' => ['label' => 'Kurumsal Kırtasiye', 'href' => url('kurumsal-kirtasiye')],
        'urun-gruplari' => ['label' => 'Ürün Grupları', 'href' => url('urun-gruplari')],
        'markalar' => ['label' => 'Markalar', 'href' => url('markalar')],
        'hizmetlerimiz' => ['label' => 'Hizmetlerimiz', 'href' => url('hizmetlerimiz')],
        'blog' => ['label' => 'Blog', 'href' => url('blog')],
        'iletisim' => ['label' => 'İletişim', 'href' => url('iletisim')],
    ];
}

function legal_nav(): array
{
    return [
        'kvkk' => ['label' => 'KVKK Aydınlatma Metni', 'href' => url('kvkk')],
        'gizlilik-politikasi' => ['label' => 'Gizlilik Politikası', 'href' => url('gizlilik-politikasi')],
        'cerez-politikasi' => ['label' => 'Çerez Politikası', 'href' => url('cerez-politikasi')],
    ];
}

function product_groups(): array
{
    return [
        [
            'slug' => 'ofis-kirtasiye',
            'title' => 'Ofis Kırtasiye',
            'image' => asset('images/products/ofis-kirtasiye.jpg'),
            'summary' => 'Kalem, zımba, bant, makas, masaüstü gereçleri ve günlük ofis sarf ürünleri.',
        ],
        [
            'slug' => 'okul-kirtasiye',
            'title' => 'Okul Kırtasiye',
            'image' => asset('images/products/okul-kirtasiye.jpg'),
            'summary' => 'Defter, kalem, boya, resim ve eğitim dönemine yönelik toplu kırtasiye ürün grupları.',
        ],
        [
            'slug' => 'kagit-urunleri',
            'title' => 'Kağıt Ürünleri',
            'image' => url('images/' . rawurlencode('VEGE COPİER BOND A-4 FOTOKOPİ KAĞIDI 80 GR.jpeg')),
            'summary' => 'Fotokopi kağıdı, renkli kağıt, not kağıdı, defter ve baskı ihtiyaçları.',
        ],
        [
            'slug' => 'toner-kartus',
            'title' => 'Toner & Kartuş',
            'image' => asset('images/products/toner-kartus.jpg'),
            'summary' => 'Yazıcı sarf malzemeleri, kartuş, toner ve kurum içi baskı sürekliliği çözümleri.',
        ],
        [
            'slug' => 'dosyalama',
            'title' => 'Dosyalama Ürünleri',
            'image' => asset('images/products/dosyalama.jpg'),
            'summary' => 'Klasör, telli dosya, poşet dosya, ayraç ve düzenli arşiv ekipmanları.',
        ],
        [
            'slug' => 'arsivleme',
            'title' => 'Arşivleme Ürünleri',
            'image' => asset('images/products/arsivleme.jpg'),
            'summary' => 'Kutu, klasör, etiket ve kurumsal belge yönetimine uygun arşiv çözümleri.',
        ],
        [
            'slug' => 'bilgisayar-sarf',
            'title' => 'Bilgisayar Sarf Malzemeleri',
            'image' => url('images/mouse.jpg'),
            'summary' => 'Mouse, klavye, USB bellek, kablo, CD/DVD ve bilgisayar çevre birimi sarf malzemeleri.',
        ],
        [
            'slug' => 'ambalaj-sarf',
            'title' => 'Ambalaj ve Sarf',
            'image' => asset('images/products/ambalaj-sarf.jpg'),
            'summary' => 'Koli bandı, etiket, paketleme ve günlük operasyon sarf malzemeleri.',
        ],
        [
            'slug' => 'promosyon',
            'title' => 'Promosyon Ürünleri',
            'image' => asset('images/products/promosyon.jpg'),
            'summary' => 'Kurum içi kullanım, etkinlik ve marka görünürlüğü için seçili promosyon ürünleri.',
        ],
        [
            'slug' => 'masaustu-gerecleri',
            'title' => 'Masaüstü Gereçleri',
            'image' => asset('images/products/masaustu-gerecleri.jpg'),
            'summary' => 'Hesap makinesi, kesici, düzenleyici ve masa kullanımını kolaylaştıran ürünler.',
        ],
        [
            'slug' => 'yazi-gerecleri',
            'title' => 'Yazı Gereçleri',
            'image' => asset('images/products/yazi-gerecleri.jpg'),
            'summary' => 'Tükenmez kalem, fosforlu kalem, marker, kurşun kalem ve imza kalemleri.',
        ],
        [
            'slug' => 'etiket-rulo',
            'title' => 'Etiket ve Rulo',
            'image' => asset('images/products/etiket-rulo.jpg'),
            'summary' => 'Etiketleme, barkod, fiyatlama ve operasyon takip süreçleri için rulo ürünler.',
        ],
    ];
}

function services(): array
{
    return [
        'Kurumsal tedarik',
        'Toplu sipariş yönetimi',
        'Düzenli teslimat',
        'Tekliflendirme',
        'Ürün danışmanlığı',
        'Kuruma özel çözüm',
        'Faturalı satış',
        'Kurum ve ofis ihtiyaç planlaması',
    ];
}

function blog_posts(): array
{
    return [
        [
            'title' => 'Kurumsal Kırtasiye Tedarikinde Planlama Nasıl Yapılır?',
            'excerpt' => 'Departman ihtiyaçlarını tek listede toplamak, tüketim hızını ölçmek ve dönemsel stok planı oluşturmak maliyeti düşürür.',
            'category' => 'Tedarik',
            'date' => '2026-06-13',
        ],
        [
            'title' => 'Toplu Kırtasiye Siparişlerinde Dikkat Edilmesi Gerekenler',
            'excerpt' => 'Marka standardı, teslimat takvimi, faturalandırma ve ürün muadil politikası teklif sürecini netleştirir.',
            'category' => 'Satın Alma',
            'date' => '2026-06-13',
        ],
        [
            'title' => 'Ofis Sarf Malzemelerinde Stok Sürekliliği',
            'excerpt' => 'Kağıt, kalem, toner, etiket ve ambalaj ürünleri için düzenli tedarik akışı iş sürekliliğini destekler.',
            'category' => 'Operasyon',
            'date' => '2026-06-13',
        ],
    ];
}

function brands(): array
{
    return [
        'Faber-Castell', 'Stabilo', 'Staedtler', 'Pensan', 'Bic', 'Uniball',
        'Sharpie', 'Edding', 'Pelikan', 'Adel', 'Mas', 'Noki',
        'Serve', 'Hi-Text', 'Gıpta', 'Maped', 'Pritt', 'Monami',
        'Bigpoint', 'Mopak', 'Fatih', 'Tanex', 'Dong-A', 'Bafix',
        'Keskin Color', 'Nova Color', 'Giotto', 'Lyra', 'Snowman', 'Legamaster',
        'Carioca', 'Amos', 'Play-Doh', 'Alpino', 'Kraf', 'Brons',
    ];
}

function special_services(): array
{
    return [
        [
            'icon' => 'truck',
            'title' => 'Hafta İçi Her Gün Şehir İçi Servis',
            'text' => 'Kurumsal müşterilerimize hafta içi her gün düzenli şehir içi teslimat. Siparişinizi biz getiriyoruz; ofisinizden çıkmanıza gerek yok.',
        ],
        [
            'icon' => 'clock',
            'title' => "Saat 13:00'a Kadar Aynı Gün Teslimat",
            'text' => "Saat 13:00'a kadar verilen siparişler aynı gün teslim edilir. Acil ihtiyaçlarınızda işiniz hiç beklemez.",
        ],
        [
            'icon' => 'factory',
            'title' => 'Organize ve Çevre Sanayi Sitelerine Özel',
            'text' => 'Organize Sanayi Bölgesi ve çevre sanayi sitelerindeki işyerlerine doğrudan, planlı ve düzenli tedarik desteği sağlıyoruz.',
        ],
    ];
}

function product_categories(): array
{
    return [
        'Defter & Ajanda',
        'Dosyalama & Arşivleme',
        'Kağıt Ürünleri',
        'Kalem & Yazı Gereçleri',
        'Ofis Kırtasiye',
        'Okul Kırtasiye',
        'Pano ve Aksesuar',
        'Sanatsal Malzemeler',
    ];
}

function service_icon(string $name): string
{
    $icons = [
        'truck' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 6h11v9H3z"/><path d="M14 9h4l3 3v3h-7z"/><circle cx="7" cy="18" r="2"/><circle cx="17.5" cy="18" r="2"/></svg>',
        'clock' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3.5 2"/></svg>',
        'factory' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 21V10l6 4V10l6 4V7l3-2v16z"/><path d="M3 21h18"/></svg>',
    ];

    return $icons[$name] ?? '';
}

function clean_input(?string $value): string
{
    return trim(strip_tags((string) $value));
}

function normalize_tr_phone(string $phone): string
{
    $d = preg_replace('/\D+/', '', $phone) ?? '';
    if (strpos($d, '0090') === 0) {
        $d = substr($d, 4);
    } elseif (strpos($d, '90') === 0 && strlen($d) === 12) {
        $d = substr($d, 2);
    } elseif (strpos($d, '0') === 0 && strlen($d) === 11) {
        $d = substr($d, 1);
    }

    return $d;
}

function is_valid_tr_phone(string $phone): bool
{
    return (bool) preg_match('/^[2-5][0-9]{9}$/', normalize_tr_phone($phone));
}

function format_tr_phone(string $phone): string
{
    $d = normalize_tr_phone($phone);
    if (strlen($d) !== 10) {
        return $phone;
    }

    return '0' . substr($d, 0, 3) . ' ' . substr($d, 3, 3) . ' ' . substr($d, 6, 2) . ' ' . substr($d, 8, 2);
}

function handle_uploaded_files(string $field, array &$errors): array
{
    $saved = [];
    if (empty($_FILES[$field]) || !is_array($_FILES[$field]['name'] ?? null)) {
        return $saved;
    }

    $allowed = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'heic', 'pdf', 'doc', 'docx', 'xls', 'xlsx', 'csv', 'txt'];
    $maxSize = 8 * 1024 * 1024; // 8 MB
    $maxFiles = 5;

    $destDir = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'ekler';
    if (!is_dir($destDir)) {
        @mkdir($destDir, 0775, true);
    }

    $count = count($_FILES[$field]['name']);
    $accepted = 0;
    for ($i = 0; $i < $count; $i++) {
        $err = $_FILES[$field]['error'][$i] ?? UPLOAD_ERR_NO_FILE;
        if ($err === UPLOAD_ERR_NO_FILE) {
            continue;
        }

        $orig = (string) ($_FILES[$field]['name'][$i] ?? 'dosya');
        if ($accepted >= $maxFiles) {
            $errors[] = 'En fazla ' . $maxFiles . ' dosya ekleyebilirsiniz.';
            break;
        }
        if ($err !== UPLOAD_ERR_OK) {
            $errors[] = $orig . ' yüklenemedi, lütfen tekrar deneyin.';
            continue;
        }
        if (($_FILES[$field]['size'][$i] ?? 0) > $maxSize) {
            $errors[] = $orig . ' dosyası 8 MB sınırını aşıyor.';
            continue;
        }

        $ext = strtolower(pathinfo($orig, PATHINFO_EXTENSION));
        if (!in_array($ext, $allowed, true)) {
            $errors[] = $orig . ' desteklenmeyen bir dosya türü (izinli: resim, PDF, Word, Excel).';
            continue;
        }

        $tmp = $_FILES[$field]['tmp_name'][$i];
        $safeName = bin2hex(random_bytes(6)) . '.' . $ext;
        $target = $destDir . DIRECTORY_SEPARATOR . $safeName;
        if (is_uploaded_file($tmp) && move_uploaded_file($tmp, $target)) {
            $saved[] = ['path' => $target, 'name' => $orig];
            $accepted++;
        } else {
            $errors[] = $orig . ' kaydedilemedi.';
        }
    }

    return $saved;
}

function send_form_mail(string $subject, array $fields, array $attachments, string $replyEmail = '', string $replyName = ''): bool
{
    $base = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'PHPMailer' . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR;
    if (!is_file($base . 'PHPMailer.php')) {
        return false;
    }

    require_once $base . 'Exception.php';
    require_once $base . 'PHPMailer.php';
    require_once $base . 'SMTP.php';

    $mail = new \PHPMailer\PHPMailer\PHPMailer(true);
    try {
        $mail->CharSet = 'UTF-8';
        if (defined('SMTP_HOST') && SMTP_HOST !== '') {
            $mail->isSMTP();
            $mail->Host = SMTP_HOST;
            $mail->Port = (int) SMTP_PORT;
            $mail->Timeout = 20;
            if (SMTP_USER !== '') {
                $mail->SMTPAuth = true;
                $mail->Username = SMTP_USER;
                $mail->Password = SMTP_PASS;
            }
            if (SMTP_SECURE !== '') {
                $mail->SMTPSecure = SMTP_SECURE;
            } else {
                // Sunucu STARTTLS desteklemiyor; otomatik TLS denemesini kapat
                $mail->SMTPAutoTLS = false;
            }
            // Paylaşımlı hosting'lerde sertifika adı uyuşmazlığını tolere et
            $mail->SMTPOptions = [
                'ssl' => [
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true,
                ],
            ];
        } else {
            $mail->isMail();
        }

        $mail->setFrom(MAIL_FROM, MAIL_FROM_NAME);
        $mail->addAddress(FORM_RECIPIENT);
        if ($replyEmail !== '' && filter_var($replyEmail, FILTER_VALIDATE_EMAIL)) {
            $mail->addReplyTo($replyEmail, $replyName !== '' ? $replyName : $replyEmail);
        }

        $rows = '';
        $text = '';
        foreach ($fields as $label => $value) {
            $rows .= '<tr><td style="padding:8px 12px;border:1px solid #e6eaf0;background:#faf6f0;font-weight:700;vertical-align:top">'
                . e((string) $label) . '</td><td style="padding:8px 12px;border:1px solid #e6eaf0">'
                . nl2br(e((string) $value)) . '</td></tr>';
            $text .= $label . ': ' . $value . "\n";
        }

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = '<div style="font-family:Arial,sans-serif;color:#16202e">'
            . '<h2 style="color:#d2620e;margin:0 0 14px">' . e(SITE_NAME) . ' — Yeni İletişim Talebi</h2>'
            . '<table style="border-collapse:collapse;width:100%;max-width:640px">' . $rows . '</table>'
            . '<p style="margin-top:16px;color:#5b6776;font-size:13px">Bu mesaj web sitesi formundan gönderildi.</p></div>';
        $mail->AltBody = $text;

        foreach ($attachments as $att) {
            if (!empty($att['path']) && is_file($att['path'])) {
                $mail->addAttachment($att['path'], (string) ($att['name'] ?? ''));
            }
        }

        $mail->send();
        return true;
    } catch (\Throwable $ex) {
        error_log('Form mail gönderilemedi: ' . $ex->getMessage());
        return false;
    }
}

function handle_form_submission(string $formKey, array $requiredFields, array $options = []): array
{
    $result = ['status' => 'idle', 'errors' => [], 'old' => []];

    if ($_SERVER['REQUEST_METHOD'] !== 'POST' || ($_POST['form_key'] ?? '') !== $formKey) {
        return $result;
    }

    foreach ($_POST as $key => $value) {
        if ($key !== 'website' && $key !== 'form_key' && is_string($value)) {
            $result['old'][$key] = clean_input($value);
        }
    }

    if (!empty($_POST['website'] ?? '')) {
        $result['errors'][] = 'Form gönderimi doğrulanamadı. Lütfen tekrar deneyin.';
    }

    foreach ($requiredFields as $field => $label) {
        if (clean_input($_POST[$field] ?? '') === '') {
            $result['errors'][] = $label . ' alanı zorunludur.';
        }
    }

    $email = clean_input($_POST['email'] ?? '');
    if ($email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result['errors'][] = 'Geçerli bir e-posta adresi yazın.';
    }

    foreach (($options['phone_fields'] ?? []) as $phoneField) {
        $phoneValue = clean_input($_POST[$phoneField] ?? '');
        if ($phoneValue !== '' && !is_valid_tr_phone($phoneValue)) {
            $result['errors'][] = 'Geçerli bir telefon numarası yazın (örn. 0532 123 45 67).';
            break;
        }
    }

    $attachments = [];
    if (!empty($options['file_field'])) {
        $attachments = handle_uploaded_files((string) $options['file_field'], $result['errors']);
    }

    if (!empty($result['errors'])) {
        $result['status'] = 'error';
        foreach ($attachments as $att) {
            @unlink($att['path']);
        }
        return $result;
    }

    foreach (($options['phone_fields'] ?? []) as $phoneField) {
        if (!empty($result['old'][$phoneField])) {
            $result['old'][$phoneField] = format_tr_phone($result['old'][$phoneField]);
        }
    }

    $payload = [
        'form' => $formKey,
        'date' => date('c'),
        'ip' => $_SERVER['REMOTE_ADDR'] ?? 'local',
        'fields' => $result['old'],
        'attachments' => array_map(static fn ($a) => $a['name'], $attachments),
    ];

    $logDir = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'uploads';
    if (is_dir($logDir) && is_writable($logDir)) {
        file_put_contents(
            $logDir . DIRECTORY_SEPARATOR . 'form-submissions.log',
            json_encode($payload, JSON_UNESCAPED_UNICODE) . PHP_EOL,
            FILE_APPEND | LOCK_EX
        );
    }

    if (FORM_MAIL_ENABLED) {
        $labels = $options['labels'] ?? [];
        $mailFields = [];
        foreach ($result['old'] as $key => $value) {
            $mailFields[$labels[$key] ?? ucfirst($key)] = $value;
        }
        $subject = $options['subject'] ?? (SITE_NAME . ' - Yeni form gönderimi');
        $replyName = $result['old']['adsoyad'] ?? ($result['old']['yetkili'] ?? '');
        send_form_mail($subject, $mailFields, $attachments, $email, $replyName);
    }

    return ['status' => 'success', 'errors' => [], 'old' => []];
}

function old_value(array $form, string $key): string
{
    return e($form['old'][$key] ?? '');
}

function social_links(): array
{
    // İşletmenin sosyal medya / dizin profilleri (yapay zeka ve arama motorları için).
    // Doldurdukça AI uygulamaları işletmeyi daha güvenilir bulur.
    return array_values(array_filter([
        SOCIAL_INSTAGRAM,
        // 'https://www.facebook.com/...',
        // 'https://www.linkedin.com/company/...',
        maps_place_url(),
    ]));
}

function faqs(): array
{
    return [
        [
            'q' => 'Başarırlar Kurumsal Kırtasiye nerede?',
            'a' => 'Dokuzkavaklar Mahallesi Ankara Bulvarı No:86 Pamukkale / Denizli adresindeyiz. Denizli ve çevresindeki kurumlara hizmet veriyoruz.',
        ],
        [
            'q' => 'Denizli\'de kurumsal kırtasiye tedarikçisi arıyorum, kime başvurmalıyım?',
            'a' => 'Başarırlar Kurumsal Kırtasiye, Denizli\'nin en büyük kurumsal kırtasiyesidir. 10.000+ ürün ve 100+ marka ile şirketlere, kamu kurumlarına ve sanayi işletmelerine toptan ve proje bazlı tedarik sağlar. ' . CONTACT_PHONE . ' numarasından veya WhatsApp ' . CONTACT_WHATSAPP . ' üzerinden ulaşabilirsiniz.',
        ],
        [
            'q' => 'Aynı gün teslimat var mı?',
            'a' => 'Evet. Hafta içi her gün şehir içi servisimizle, saat 13:00\'a kadar verilen siparişler aynı gün teslim edilir.',
        ],
        [
            'q' => 'Bireysel (perakende) satış yapıyor musunuz?',
            'a' => 'Hayır. Başarırlar Kurumsal Kırtasiye yalnızca şirketlere, kamu kurumlarına ve sanayi işletmelerine kurumsal satış yapar; okullara bireysel/perakende satış yapılmaz.',
        ],
        [
            'q' => 'Hangi ürünleri tedarik ediyorsunuz?',
            'a' => 'Ofis kırtasiye, okul kırtasiye, kağıt ürünleri, toner ve kartuş, dosyalama, arşivleme, bilgisayar sarf malzemeleri, ambalaj, promosyon, masaüstü ve yazı gereçleri dahil 10.000+ ürün.',
        ],
        [
            'q' => 'Hangi markaları bulundururuyorsunuz?',
            'a' => 'Faber-Castell, Stabilo, Staedtler, Pensan, Bic, Uniball, Pelikan, Adel, Mas, Maped ve 100+ öncü marka stoklarımızdadır.',
        ],
        [
            'q' => 'Sanayi sitelerine teslimat yapıyor musunuz?',
            'a' => 'Evet. Organize Sanayi Bölgesi ve çevre sanayi sitelerindeki işyerlerine doğrudan, planlı ve düzenli tedarik desteği veriyoruz.',
        ],
        [
            'q' => 'Nasıl fiyat teklifi alabilirim?',
            'a' => 'Ürün listenizi web sitesindeki teklif formundan, e-posta (' . CONTACT_EMAIL . ') veya WhatsApp (' . CONTACT_WHATSAPP . ') ile iletmeniz yeterli. Toptan ve proje bazlı rekabetçi fiyat hazırlanır. Bize fiyat sormadan kırtasiye almaya karar vermeyin.',
        ],
    ];
}

function faq_schema(): array
{
    $items = [];
    foreach (faqs() as $faq) {
        $items[] = [
            '@type' => 'Question',
            'name' => $faq['q'],
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text' => $faq['a'],
            ],
        ];
    }

    return [
        '@context' => 'https://schema.org',
        '@type' => 'FAQPage',
        'mainEntity' => $items,
    ];
}

function breadcrumb_schema(string $activePage): array
{
    $items = [[
        '@type' => 'ListItem',
        'position' => 1,
        'name' => 'Anasayfa',
        'item' => canonical_url(''),
    ]];

    $nav = nav_items();
    if ($activePage !== 'anasayfa' && isset($nav[$activePage])) {
        $items[] = [
            '@type' => 'ListItem',
            'position' => 2,
            'name' => $nav[$activePage]['label'],
            'item' => canonical_url($activePage),
        ];
    }

    return [
        '@context' => 'https://schema.org',
        '@type' => 'BreadcrumbList',
        'itemListElement' => $items,
    ];
}

function page_schema(): array
{
    $offerCatalog = [];
    foreach (product_groups() as $group) {
        $offerCatalog[] = [
            '@type' => 'Offer',
            'itemOffered' => [
                '@type' => 'Product',
                'name' => $group['title'],
                'description' => $group['summary'],
            ],
        ];
    }

    $organization = [
        '@type' => 'Organization',
        '@id' => canonical_url('') . '#organization',
        'name' => SITE_NAME,
        'legalName' => COMPANY_NAME,
        'url' => canonical_url(''),
        'logo' => canonical_url('assets/images/basarirlar-logo.png'),
        'image' => canonical_url('assets/images/basarirlar-logo.png'),
        'slogan' => SITE_SLOGAN,
        'description' => COMPANY_NAME . ', ' . SITE_TAGLINE . '. 10.000+ ürün ve 100+ marka ile şirketlere, kamu kurumlarına ve sanayi işletmelerine toptan ve proje bazlı kırtasiye tedariği sağlar.',
        'email' => CONTACT_EMAIL,
        'telephone' => '+90' . preg_replace('/\D+/', '', CONTACT_PHONE),
        'parentOrganization' => [
            '@type' => 'Organization',
            'name' => PARENT_COMPANY,
            'description' => PARENT_COMPANY . ', 40 yılı aşkın geçmişiyle Ege\'nin en büyük yayın dağıtım firmasıdır.',
        ],
        'sameAs' => social_links(),
        'knowsAbout' => [
            'Kurumsal kırtasiye', 'Toptan kırtasiye', 'Ofis sarf malzemeleri', 'Kağıt ürünleri',
            'Toner ve kartuş', 'Bilgisayar sarf malzemeleri', 'Dosyalama ve arşivleme', 'Proje bazlı tedarik',
        ],
    ];

    $localBusiness = [
        '@type' => ['LocalBusiness', 'Store'],
        '@id' => canonical_url('') . '#localbusiness',
        'name' => COMPANY_NAME,
        'image' => canonical_url('assets/images/basarirlar-logo.png'),
        'logo' => canonical_url('assets/images/basarirlar-logo.png'),
        'url' => canonical_url(''),
        'email' => CONTACT_EMAIL,
        'telephone' => '+90' . preg_replace('/\D+/', '', CONTACT_PHONE),
        'description' => SITE_TAGLINE . '. Şirketlere, kamu kurumlarına ve sanayi işletmelerine 10.000+ ürün, 100+ marka ile toptan ve proje bazlı kırtasiye tedariği. Hafta içi her gün şehir içi servis ve 13:00\'a kadar aynı gün teslimat.',
        'slogan' => SITE_TAGLINE,
        'priceRange' => '₺₺',
        'currenciesAccepted' => 'TRY',
        'paymentAccepted' => 'Havale/EFT, Kredi Kartı, Nakit, Faturalı Satış',
        'parentOrganization' => ['@id' => canonical_url('') . '#organization'],
        'address' => [
            '@type' => 'PostalAddress',
            'streetAddress' => 'Dokuzkavaklar Mah. Ankara Bulvarı No:86',
            'addressLocality' => 'Pamukkale',
            'addressRegion' => 'Denizli',
            'postalCode' => '20070',
            'addressCountry' => 'TR',
        ],
        'geo' => [
            '@type' => 'GeoCoordinates',
            'latitude' => GEO_LAT,
            'longitude' => GEO_LNG,
        ],
        'hasMap' => maps_place_url(),
        'areaServed' => [
            ['@type' => 'City', 'name' => 'Denizli'],
            ['@type' => 'AdministrativeArea', 'name' => 'Pamukkale'],
            ['@type' => 'AdministrativeArea', 'name' => 'Merkezefendi'],
            ['@type' => 'Place', 'name' => 'Denizli Organize Sanayi Bölgesi'],
            ['@type' => 'AdministrativeArea', 'name' => 'Ege Bölgesi'],
        ],
        'openingHoursSpecification' => [
            '@type' => 'OpeningHoursSpecification',
            'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
            'opens' => '08:30',
            'closes' => '19:00',
        ],
        'hasOfferCatalog' => [
            '@type' => 'OfferCatalog',
            'name' => 'Kurumsal Kırtasiye Ürün Grupları',
            'itemListElement' => $offerCatalog,
        ],
        'sameAs' => social_links(),
    ];

    if (COMPANY_FOUNDED !== '') {
        $organization['foundingDate'] = COMPANY_FOUNDED;
    }

    $website = [
        '@type' => 'WebSite',
        '@id' => canonical_url('') . '#website',
        'url' => canonical_url(''),
        'name' => SITE_NAME,
        'inLanguage' => 'tr-TR',
        'publisher' => ['@id' => canonical_url('') . '#organization'],
    ];

    return [
        '@context' => 'https://schema.org',
        '@graph' => [$organization, $localBusiness, $website],
    ];
}
