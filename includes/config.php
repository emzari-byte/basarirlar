<?php
declare(strict_types=1);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$scriptDir = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? ''));
define('BASE_PATH', ($scriptDir === '/' || $scriptDir === '.' || $scriptDir === '') ? '' : rtrim($scriptDir, '/'));
define('SITE_URL', 'https://basarirlarkurumsal.com');
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
define('GEO_LAT', '37.85899');
define('GEO_LNG', '29.07840');
define('PARENT_COMPANY', 'Başarırlar Yayın Dağıtım');
define('COMPANY_FOUNDED', '2025');
define('SUPPLY_EXPERIENCE', '40+ yıl');
define('PRODUCT_COUNT', '10.000+');
define('BRAND_COUNT', '100+');
define('GA_MEASUREMENT_ID', 'G-D9PS90ZQL8');
define('FORM_MAIL_ENABLED', true);
define('FORM_RECIPIENT', 'cihan@basarirlar.com.tr');
define('MAIL_FROM_NAME', SITE_NAME);

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

function versioned_asset(string $path): string
{
    $relativePath = ltrim($path, '/');
    $filePath = dirname(__DIR__) . '/assets/' . $relativePath;
    $version = is_file($filePath) ? (string) filemtime($filePath) : '1';

    return asset($relativePath) . '?v=' . rawurlencode($version);
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
            'summary' => 'Günlük ofis sarfını tek listeden, kurumsal fiyatla tamamlayın.',
            'description' => 'Kalemden zımbaya, banttan masaüstü düzenleyicilere kadar ofislerin sürekli tükettiği ürünlerde marka, adet ve teslimat planı birlikte yönetilir.',
            'samples' => ['Tükenmez ve imza kalemleri', 'Zımba, delgeç ve ataş', 'Bant, makas ve yapıştırıcı', 'Not kağıdı ve post-it', 'Masaüstü düzenleyiciler'],
            'brands' => ['Pensan', 'Faber-Castell', 'Mas', 'Pritt', 'Noki'],
            'advantages' => ['Departman bazlı ihtiyaç listesi hazırlanır.', 'Muadil ürün seçenekleriyle bütçe kontrolü sağlanır.', 'Düzenli tüketilen kalemlerde stok sürekliliği korunur.'],
            'faq' => [
                ['q' => 'Ofis ürünlerinde karışık marka listesi gönderebilir miyiz?', 'a' => 'Evet. Mevcut listenizi marka, adet veya muadil notuyla paylaşabilirsiniz; teklif bu bilgiye göre hazırlanır.'],
                ['q' => 'Düzenli aylık ofis sarf tedariği yapılır mı?', 'a' => 'Evet. Sık tüketilen ürünler için düzenli sipariş ve şehir içi teslimat planı oluşturulur.'],
            ],
            'meta_description' => 'Ofis kırtasiye ürünleri için toptan ve kurumsal teklif alın. Kalem, zımba, bant, post-it, masaüstü gereçleri ve düzenli teslimat.',
        ],
        [
            'slug' => 'okul-kirtasiye',
            'title' => 'Okul Kırtasiye',
            'image' => asset('images/products/okul-kirtasiye.jpg'),
            'summary' => 'Eğitim kurumları ve dönemsel toplu alımlar için planlı ürün tedariği.',
            'description' => 'Defter, kalem, boya ve yardımcı eğitim ürünlerinde dönem başı, proje veya kurum içi liste talepleri toplu fiyat avantajıyla değerlendirilir.',
            'samples' => ['Defter ve ajandalar', 'Boya ve resim ürünleri', 'Kalem setleri', 'Dosya ve kaplık ürünleri', 'Etkinlik sarfları'],
            'brands' => ['Faber-Castell', 'Adel', 'Gıpta', 'Fatih', 'Nova Color'],
            'advantages' => ['Dönemsel toplu listeler hızlı fiyatlandırılır.', 'Yaş grubu ve kullanım alanına göre ürün önerilir.', 'Kurum standardına uygun marka seçimi korunur.'],
            'faq' => [
                ['q' => 'Okul kırtasiye alımı bireysel öğrencilere yönelik mi?', 'a' => 'Hayır. Bu kategori kurumsal ve toplu satın alma talepleri için değerlendirilir.'],
                ['q' => 'Toplu listeyi Excel olarak gönderebilir miyiz?', 'a' => 'Evet. Teklif formundan Excel, PDF veya görsel liste yükleyebilirsiniz.'],
            ],
            'meta_description' => 'Okul kırtasiye ürünlerinde toplu ve kurumsal teklif. Defter, kalem, boya, etkinlik ve eğitim sarf ürünleri için planlı tedarik.',
        ],
        [
            'slug' => 'kagit-urunleri',
            'title' => 'Kağıt Ürünleri',
            'image' => url('images/fotokopi-kagidi-vege-copier-80-gr.jpeg'),
            'summary' => 'Fotokopi, baskı ve evrak akışı için kesintisiz kağıt tedariği.',
            'description' => 'A4 fotokopi kağıdı başta olmak üzere renkli kağıt, not kağıdı, defter ve baskı sarflarında adet ve teslimat sıklığına göre kurumsal teklif hazırlanır.',
            'samples' => ['A4 fotokopi kağıdı', 'Renkli kağıt', 'Not ve blok kağıtlar', 'Defter ve ajanda', 'Baskı sarf kağıtları'],
            'brands' => ['Allcopy', 'Vege', 'Mopak', 'Gıpta', 'Keskin Color'],
            'advantages' => ['Yüksek tüketimli ürünlerde fiyat ve stok takibi yapılır.', 'Acil kağıt ihtiyaçları şehir içi servisle çözülür.', 'Marka ve gramaj standardı teklifte netleştirilir.'],
            'faq' => [
                ['q' => 'A4 kağıt için koli bazlı fiyat alabilir miyiz?', 'a' => 'Evet. Koli, paket veya düzenli tüketim miktarına göre teklif hazırlanır.'],
                ['q' => 'Farklı gramaj ve marka seçenekleri sunuluyor mu?', 'a' => 'Evet. Kullanım alanına göre marka, gramaj ve muadil alternatifleri paylaşılır.'],
            ],
            'meta_description' => 'Kağıt ürünleri için kurumsal teklif alın. A4 fotokopi kağıdı, renkli kağıt, not kağıdı ve baskı sarfları.',
        ],
        [
            'slug' => 'toner-kartus',
            'title' => 'Toner & Kartuş',
            'image' => asset('images/products/toner-kartus.jpg'),
            'summary' => 'Baskı sürekliliği için orijinal ve muadil sarf seçenekleri.',
            'description' => 'Yazıcı modelinize göre toner, kartuş ve baskı sarf ürünleri belirlenir; orijinal veya muadil seçenekler maliyet ve performans dengesiyle tekliflendirilir.',
            'samples' => ['Lazer toner', 'Mürekkep kartuş', 'Muadil toner', 'Drum ve baskı sarfı', 'Yazıcı bakım sarfları'],
            'brands' => ['HP', 'Canon', 'Epson', 'Brother', 'Samsung'],
            'advantages' => ['Yazıcı modeli üzerinden doğru ürün eşleşmesi yapılır.', 'Muadil ürünlerde kalite ve uyumluluk değerlendirilir.', 'Baskı kesintisini azaltan stok planı oluşturulur.'],
            'faq' => [
                ['q' => 'Yazıcı modelini göndersem doğru toneri bulur musunuz?', 'a' => 'Evet. Marka ve model bilgisini iletmeniz yeterlidir.'],
                ['q' => 'Muadil toner için teklif alabilir miyiz?', 'a' => 'Evet. Orijinal ve uygun muadil alternatifleri birlikte değerlendirilebilir.'],
            ],
            'meta_description' => 'Toner ve kartuş tedariki için teklif alın. Orijinal ve muadil toner, kartuş, drum ve yazıcı sarfları.',
        ],
        [
            'slug' => 'dosyalama-urunleri',
            'title' => 'Dosyalama Ürünleri',
            'image' => asset('images/products/dosyalama.jpg'),
            'summary' => 'Evrak düzeni, klasörleme ve ofis arşivi için standart ürünler.',
            'description' => 'Klasör, telli dosya, poşet dosya, ayraç ve evrak düzenleyicilerinde departman bazlı kullanım için toplu tedarik planlanır.',
            'samples' => ['Klasör ve telli dosya', 'Poşet dosya', 'Ayraç ve separatör', 'Evrak rafı', 'Sunum dosyaları'],
            'brands' => ['Noki', 'Mas', 'Bigpoint', 'Gıpta', 'Kraf'],
            'advantages' => ['Kurumsal evrak standardına uygun ürün seçilir.', 'Renk, ebat ve adet planı netleştirilir.', 'Toplu alımda birim maliyet avantajı sağlanır.'],
            'faq' => [
                ['q' => 'Klasör renk ve ebat seçenekleri belirtilebilir mi?', 'a' => 'Evet. Renk, sırt genişliği ve adet bilgisi teklif aşamasında dikkate alınır.'],
                ['q' => 'Arşiv ve dosyalama ürünleri birlikte tekliflenir mi?', 'a' => 'Evet. Birleşik liste gönderebilirsiniz.'],
            ],
            'meta_description' => 'Dosyalama ürünlerinde kurumsal teklif. Klasör, poşet dosya, telli dosya, ayraç ve evrak düzenleyiciler.',
        ],
        [
            'slug' => 'arsivleme-urunleri',
            'title' => 'Arşivleme Ürünleri',
            'image' => asset('images/products/arsivleme.jpg'),
            'summary' => 'Belge saklama ve arşiv düzeni için dayanıklı çözümler.',
            'description' => 'Arşiv kutusu, klasör, etiket ve saklama ekipmanlarında kurumun belge yoğunluğu ve kullanım alanına göre teklif hazırlanır.',
            'samples' => ['Arşiv kutuları', 'Arşiv klasörleri', 'Etiket ve ayraçlar', 'Kutu dosyalar', 'Belge saklama ürünleri'],
            'brands' => ['Noki', 'Kraf', 'Mas', 'Tanex', 'Gıpta'],
            'advantages' => ['Belge yoğunluğuna göre ürün dayanıklılığı seçilir.', 'Arşiv etiketleme düzeni desteklenir.', 'Kurum içi belge akışına uygun paket oluşturulur.'],
            'faq' => [
                ['q' => 'Arşiv kutusu için adetli teklif alabilir miyiz?', 'a' => 'Evet. İhtiyaç adetini ve tercih edilen ölçüyü iletmeniz yeterlidir.'],
                ['q' => 'Etiket ve klasör birlikte tedarik edilir mi?', 'a' => 'Evet. Arşiv seti olarak teklif hazırlanabilir.'],
            ],
            'meta_description' => 'Arşivleme ürünlerinde kurumsal teklif. Arşiv kutusu, klasör, etiket ve belge saklama ürünleri.',
        ],
        [
            'slug' => 'bilgisayar-sarf',
            'title' => 'Bilgisayar Sarf Malzemeleri',
            'image' => url('images/bilgisayar-mouse.jpg'),
            'summary' => 'BT ve ofis ekipleri için günlük bilgisayar çevre birimi sarfları.',
            'description' => 'Mouse, klavye, kablo, USB bellek ve bağlantı ürünlerinde kurum içi kullanım yoğunluğuna göre marka ve adet alternatifleri sunulur.',
            'samples' => ['Mouse ve klavye', 'USB bellek', 'Kablo ve adaptör', 'CD/DVD sarfları', 'Temel çevre birimleri'],
            'brands' => ['Logitech', 'HP', 'Microsoft', 'Sandisk', 'Kingston'],
            'advantages' => ['BT ekipleri için standart ürün listesi oluşturulur.', 'Uyumluluk ve kullanım sıklığı dikkate alınır.', 'Acil değişim ihtiyaçları hızlı karşılanır.'],
            'faq' => [
                ['q' => 'Bilgisayar sarf ürünlerinde marka tercihi yapabilir miyiz?', 'a' => 'Evet. Kullanılan marka standardınızı teklif formunda belirtebilirsiniz.'],
                ['q' => 'USB bellek ve kablo gibi ürünlerde toplu fiyat var mı?', 'a' => 'Evet. Adet ve marka tercihine göre toplu fiyat hazırlanır.'],
            ],
            'meta_description' => 'Bilgisayar sarf malzemeleri için kurumsal teklif. Mouse, klavye, USB bellek, kablo ve çevre birimi sarfları.',
        ],
        [
            'slug' => 'ambalaj-sarf',
            'title' => 'Ambalaj ve Sarf',
            'image' => asset('images/products/ambalaj-sarf.jpg'),
            'summary' => 'Paketleme, sevkiyat ve depo operasyonları için sarf ürünleri.',
            'description' => 'Koli bandı, etiket, paketleme bandı ve operasyon sarflarında depo, sevkiyat ve idari birimlerin düzenli tüketimi planlanır.',
            'samples' => ['Koli bandı', 'Paketleme bandı', 'Etiket ürünleri', 'Streç ve paket sarfları', 'Depo kullanım ürünleri'],
            'brands' => ['Bafix', 'Tanex', 'Mas', 'Bigpoint', 'Kraf'],
            'advantages' => ['Depo ve sevkiyat ekiplerine uygun ürün seçilir.', 'Yüksek tüketimde düzenli tedarik planlanır.', 'Etiket ve bant ürünleri birlikte tekliflenir.'],
            'faq' => [
                ['q' => 'Koli bandı ve etiket ürünleri aynı listede olabilir mi?', 'a' => 'Evet. Ambalaj ve sarf ürünlerini tek teklif listesinde toplayabilirsiniz.'],
                ['q' => 'Sanayi işletmelerine teslimat yapılıyor mu?', 'a' => 'Evet. Organize ve çevre sanayi sitelerine planlı servis sağlanır.'],
            ],
            'meta_description' => 'Ambalaj ve sarf ürünlerinde kurumsal teklif. Koli bandı, etiket, paketleme ve depo sarfları.',
        ],
        [
            'slug' => 'promosyon-urunleri',
            'title' => 'Promosyon Ürünleri',
            'image' => asset('images/products/promosyon.jpg'),
            'summary' => 'Kurum içi kullanım ve etkinlikler için seçili promosyon ürünleri.',
            'description' => 'Toplantı, etkinlik, kurum içi dağıtım veya marka görünürlüğü için ihtiyaç duyulan promosyon ürünleri proje bazlı değerlendirilir.',
            'samples' => ['Promosyon kalem', 'Defter ve bloknot', 'Kurum içi dağıtım ürünleri', 'Etkinlik sarfları', 'Markalı ofis ürünleri'],
            'brands' => ['Faber-Castell', 'Pensan', 'Gıpta', 'Keskin Color', 'Bigpoint'],
            'advantages' => ['Proje bazlı adet ve teslim tarihi planlanır.', 'Kurum kullanım amacına uygun ürün seçilir.', 'Bütçe ve görünürlük beklentisi dengelenir.'],
            'faq' => [
                ['q' => 'Promosyon ürünleri baskılı mı sunuluyor?', 'a' => 'Baskı gerektiren talepler proje detayına göre ayrıca değerlendirilir.'],
                ['q' => 'Etkinlik için hızlı teklif alabilir miyiz?', 'a' => 'Evet. Ürün, adet ve tarih bilgisiyle hızlı ön teklif hazırlanır.'],
            ],
            'meta_description' => 'Promosyon ürünleri için kurumsal teklif. Promosyon kalem, defter, etkinlik ve kurum içi dağıtım ürünleri.',
        ],
        [
            'slug' => 'masaustu-gerecleri',
            'title' => 'Masaüstü Gereçleri',
            'image' => asset('images/products/masaustu-gerecleri.jpg'),
            'summary' => 'Çalışma masaları için düzen, ölçüm, kesim ve yardımcı ekipmanlar.',
            'description' => 'Hesap makinesi, maket bıçağı, cetvel, düzenleyici ve masaüstü yardımcılarında ofis ekiplerine uygun toplu seçenekler sunulur.',
            'samples' => ['Hesap makinesi', 'Maket bıçağı', 'Cetvel ve makas', 'Masa düzenleyici', 'Pano ve aksesuar'],
            'brands' => ['Mas', 'Maped', 'Bigpoint', 'Legamaster', 'Kraf'],
            'advantages' => ['Departman kullanımına göre ürün seçimi yapılır.', 'Uzun ömürlü masaüstü ekipmanları önerilir.', 'Eksik ofis kurulum listeleri tamamlanır.'],
            'faq' => [
                ['q' => 'Yeni ofis kurulumu için masaüstü listesi hazırlanır mı?', 'a' => 'Evet. Kişi sayısı ve departman yapısına göre ihtiyaç listesi oluşturulabilir.'],
                ['q' => 'Hesap makinesi gibi ürünlerde marka seçebilir miyiz?', 'a' => 'Evet. Marka ve adet bilgisi teklif formunda belirtilebilir.'],
            ],
            'meta_description' => 'Masaüstü gereçleri için kurumsal teklif. Hesap makinesi, maket bıçağı, cetvel, makas ve ofis düzenleyiciler.',
        ],
        [
            'slug' => 'yazi-gerecleri',
            'title' => 'Yazı Gereçleri',
            'image' => asset('images/products/yazi-gerecleri.jpg'),
            'summary' => 'Kalem, marker ve işaretleme ürünlerinde marka standartlı tedarik.',
            'description' => 'Tükenmez kalem, fosforlu kalem, marker, tahta kalemi ve imza kalemlerinde kullanım alanına göre doğru ürün seçimi yapılır.',
            'samples' => ['Tükenmez kalem', 'Fosforlu kalem', 'Tahta kalemi', 'Marker ve permanent kalem', 'İmza kalemleri'],
            'brands' => ['Pensan', 'Faber-Castell', 'Stabilo', 'Staedtler', 'Edding'],
            'advantages' => ['Kurum standardına uygun marka korunur.', 'Departman tüketimine göre adet planlanır.', 'Muadil kalem seçenekleriyle maliyet dengelenir.'],
            'faq' => [
                ['q' => 'Tek marka kalem tedariği yapılabilir mi?', 'a' => 'Evet. Kurum standardınız varsa aynı marka/model üzerinden teklif hazırlanır.'],
                ['q' => 'Tahta kalemi ve marker ürünleri toplu alınabilir mi?', 'a' => 'Evet. Kutu veya adet bazlı teklif paylaşılır.'],
            ],
            'meta_description' => 'Yazı gereçleri için kurumsal teklif. Kalem, fosforlu kalem, marker, tahta kalemi ve imza kalemleri.',
        ],
        [
            'slug' => 'etiket-rulo',
            'title' => 'Etiket ve Rulo',
            'image' => asset('images/products/etiket-rulo.jpg'),
            'summary' => 'Barkod, fiyatlama ve operasyon takibi için etiket-rulo tedariği.',
            'description' => 'Termal etiket, barkod etiketi, fiyat etiketi ve rulo ürünlerinde ölçü, sarım ve kullanım alanı bilgisine göre teklif hazırlanır.',
            'samples' => ['Termal etiket', 'Barkod etiketi', 'Fiyat etiketi', 'Rulo ürünler', 'Etiketleme sarfları'],
            'brands' => ['Tanex', 'Mas', 'Bigpoint', 'Noki', 'Bafix'],
            'advantages' => ['Ölçü ve kullanım alanına göre doğru ürün seçilir.', 'Depo, mağaza ve üretim takibi desteklenir.', 'Düzenli tüketimde stok sürekliliği sağlanır.'],
            'faq' => [
                ['q' => 'Etiket ölçüsünü bilmiyorsak nasıl ilerleriz?', 'a' => 'Mevcut etiketten fotoğraf veya ölçü bilgisi gönderebilirsiniz; uygun seçenek belirlenir.'],
                ['q' => 'Termal rulo ürünlerinde toplu teklif var mı?', 'a' => 'Evet. Rulo adedi, ölçü ve kullanım alanına göre teklif hazırlanır.'],
            ],
            'meta_description' => 'Etiket ve rulo ürünleri için kurumsal teklif. Termal etiket, barkod etiketi, fiyat etiketi ve operasyon sarfları.',
        ],
    ];
}

function find_product_group(string $slug): ?array
{
    foreach (product_groups() as $group) {
        if ($group['slug'] === $slug) {
            return $group;
        }
    }

    return null;
}

function product_group_options(): array
{
    return array_map(static fn (array $group): string => $group['title'], product_groups());
}

function services(): array
{
    return [
        ['title' => 'Kurumsal tedarik', 'text' => 'Şirket, kamu kurumu ve sanayi işletmelerinin düzenli tükettiği ürünler tek tedarik planında toplanır.'],
        ['title' => 'Toplu sipariş yönetimi', 'text' => 'Farklı departmanlardan gelen listeler marka, adet ve teslimat önceliğine göre sadeleştirilir.'],
        ['title' => 'Düzenli teslimat', 'text' => 'Hafta içi şehir içi servisle kurum içi ihtiyaçlar raflara veya ilgili birime zamanında ulaşır.'],
        ['title' => 'Tekliflendirme', 'text' => 'Toptan ve proje bazlı fiyatlar ürün grubu, miktar ve marka standardına göre netleştirilir.'],
        ['title' => 'Ürün danışmanlığı', 'text' => 'Orijinal, muadil veya alternatif ürün seçenekleri kullanım amacına göre karşılaştırılır.'],
        ['title' => 'Kuruma özel çözüm', 'text' => 'Aylık tüketim, dönemsel proje veya yeni ofis kurulumu için esnek tedarik setleri hazırlanır.'],
        ['title' => 'Faturalı satış', 'text' => 'Kurumsal satın alma süreçlerine uygun fatura, teslimat ve kayıt akışı desteklenir.'],
        ['title' => 'İhtiyaç planlama', 'text' => 'Sık tükenen ürünler belirlenir, tekrar siparişleri kolaylaştıran standart liste yapısı kurulur.'],
    ];
}

function blog_posts(): array
{
    return [
        [
            'slug' => 'kurumsal-kirtasiye-tedarikinde-planlama',
            'title' => 'Kurumsal Kırtasiye Tedarikinde Planlama Nasıl Yapılır?',
            'excerpt' => 'Departman ihtiyaçlarını tek listede toplamak, tüketim hızını ölçmek ve dönemsel stok planı oluşturmak maliyeti düşürür.',
            'category' => 'Tedarik',
            'date' => '2026-06-13',
            'read_time' => '4 dk',
            'content' => [
                ['heading' => 'İhtiyaç listesini tek merkezde toplayın', 'body' => ['Kurumsal kırtasiye alımlarında en çok zaman kaybı, farklı ekiplerden gelen küçük taleplerin dağınık yönetilmesinden doğar. Satın alma ekibi önce ürünleri kategori, adet ve marka standardına göre tek listeye almalıdır.']],
                ['heading' => 'Sık tüketilen ürünleri ayrı işaretleyin', 'body' => ['A4 kağıt, toner, kalem, dosya ve ambalaj ürünleri gibi sürekli tüketilen kalemler düzenli takip edilirse acil alım maliyeti azalır.']],
                ['heading' => 'Teslimat beklentisini baştan netleştirin', 'body' => ['Aynı gün teslimat, haftalık servis veya proje teslimi gibi beklentiler teklif aşamasında belirtilmelidir. Bu bilgi hem fiyatı hem de stok planını doğrudan etkiler.']],
            ],
        ],
        [
            'slug' => 'toplu-kirtasiye-siparislerinde-dikkat-edilecekler',
            'title' => 'Toplu Kırtasiye Siparişlerinde Dikkat Edilecekler',
            'excerpt' => 'Marka standardı, teslimat takvimi, faturalandırma ve ürün muadil politikası teklif sürecini netleştirir.',
            'category' => 'Satın Alma',
            'date' => '2026-06-13',
            'read_time' => '3 dk',
            'content' => [
                ['heading' => 'Marka veya muadil tercihini yazın', 'body' => ['Bazı ürünlerde marka standardı kritik olabilir; bazı ürünlerde ise muadil seçenek maliyeti düşürebilir. Teklif talebinde bu ayrımı belirtmek daha doğru karşılaştırma sağlar.']],
                ['heading' => 'Adet aralığını netleştirin', 'body' => ['Toplu siparişlerde adet bilgisi fiyatı doğrudan etkiler. Kesin sayı yoksa tahmini adet aralığı paylaşmak da teklif sürecini hızlandırır.']],
                ['heading' => 'Faturalı satış bilgilerini hazır tutun', 'body' => ['Firma unvanı, teslimat adresi ve yetkili kişi bilgileri tekliften siparişe geçişi hızlandırır.']],
            ],
        ],
        [
            'slug' => 'ofis-sarf-malzemelerinde-stok-surekliligi',
            'title' => 'Ofis Sarf Malzemelerinde Stok Sürekliliği',
            'excerpt' => 'Kağıt, kalem, toner, etiket ve ambalaj ürünleri için düzenli tedarik akışı iş sürekliliğini destekler.',
            'category' => 'Operasyon',
            'date' => '2026-06-13',
            'read_time' => '4 dk',
            'content' => [
                ['heading' => 'Kritik sarfları ayırın', 'body' => ['Kağıt, toner, etiket ve sık kullanılan kalemler bittiğinde iş akışı doğrudan etkilenir. Bu ürünler için minimum stok seviyesi belirlenmelidir.']],
                ['heading' => 'Aylık tüketimi izleyin', 'body' => ['Her ay tekrar eden ürünler belirlendiğinde satın alma ekibi daha az acil talep yönetir ve daha iyi fiyat alır.']],
                ['heading' => 'Servis modelini kullanın', 'body' => ['Denizli şehir içi servis, düzenli tedarik planında ofis içi operasyon yükünü azaltır.']],
            ],
        ],
        [
            'slug' => 'denizlide-kurumsal-kirtasiye-tedarikcisi-secimi',
            'title' => "Denizli'de Kurumsal Kırtasiye Tedarikçisi Seçimi",
            'excerpt' => 'Geniş ürün kapsamı, teslimat gücü, faturalı satış ve kurumsal referanslar doğru tedarikçi seçiminde belirleyicidir.',
            'category' => 'Denizli',
            'date' => '2026-06-13',
            'read_time' => '4 dk',
            'content' => [
                ['heading' => 'Ürün kapsamı geniş olmalı', 'body' => ['Satın alma ekipleri tek kalem ürün değil, tüm ofis ve sarf ihtiyacını aynı tedarikçiden yönetmek ister. 10.000+ ürün kapsamı bu noktada zaman kazandırır.']],
                ['heading' => 'Teslimat hızı satın alma maliyetidir', 'body' => ['Sadece ürün fiyatı değil, ürünün ne zaman ve nasıl teslim edildiği de toplam maliyetin parçasıdır. 13:00’a kadar aynı gün teslimat bu yüzden değerlidir.']],
                ['heading' => 'Kurumsal işleyişe uyum aranmalı', 'body' => ['Faturalı satış, yetkili iletişimi, ürün listesi yönetimi ve muadil önerileri profesyonel tedarikçinin ayırt edici özellikleridir.']],
            ],
        ],
        [
            'slug' => 'toner-kartus-tedarikinde-muadil-urun-secimi',
            'title' => 'Toner Kartuş Tedarikinde Muadil Ürün Seçimi',
            'excerpt' => 'Muadil toner seçerken yazıcı uyumluluğu, baskı kalitesi, garanti yaklaşımı ve adet bazlı maliyet birlikte değerlendirilmelidir.',
            'category' => 'Baskı Sarf',
            'date' => '2026-06-13',
            'read_time' => '3 dk',
            'content' => [
                ['heading' => 'Yazıcı modeli en kritik bilgidir', 'body' => ['Doğru toner veya kartuş seçimi için yazıcının marka ve model bilgisi gerekir. Bu bilgi olmadan yapılan eşleşmeler baskı sorunlarına yol açabilir.']],
                ['heading' => 'Orijinal ve muadil fiyatını birlikte görün', 'body' => ['Her kullanım senaryosunda en ucuz seçenek doğru olmayabilir. Baskı hacmi, belge türü ve cihaz yaşı değerlendirilmelidir.']],
                ['heading' => 'Stok sürekliliğini planlayın', 'body' => ['Baskı bir kurum için kritikse toner bitmeden tekrar sipariş akışı kurulmalıdır.']],
            ],
        ],
        [
            'slug' => 'sirketler-icin-aylik-kirtasiye-ihtiyac-listesi',
            'title' => 'Şirketler İçin Aylık Kırtasiye İhtiyaç Listesi',
            'excerpt' => 'Aylık ofis sarf listesi, tekrar eden alımları düzenler ve satın alma ekibinin hızlı teklif almasını sağlar.',
            'category' => 'Kontrol Listesi',
            'date' => '2026-06-13',
            'read_time' => '5 dk',
            'content' => [
                ['heading' => 'Temel ofis ürünleri', 'body' => ['A4 kağıt, kalem, not kağıdı, zımba teli, ataş, bant, klasör ve poşet dosya çoğu kurumun aylık listesinde yer alır.']],
                ['heading' => 'Departman bazlı sarflar', 'body' => ['Muhasebe için arşiv ve dosyalama, depo için etiket ve koli bandı, idari işler için temizlik ve masaüstü ürünleri ayrı takip edilebilir.']],
                ['heading' => 'Listeyi teklif formuna ekleyin', 'body' => ['Excel veya PDF listenizi teklif formuna ekleyerek daha hızlı ve eksiksiz fiyat alabilirsiniz.']],
            ],
        ],
    ];
}

function find_blog_post(string $slug): ?array
{
    foreach (blog_posts() as $post) {
        if ($post['slug'] === $slug) {
            return $post;
        }
    }

    return null;
}

function brand_items(): array
{
    return [
        ['name' => 'Faber-Castell', 'category' => 'Yazı Gereçleri', 'featured' => true],
        ['name' => 'Stabilo', 'category' => 'Yazı Gereçleri', 'featured' => true],
        ['name' => 'Staedtler', 'category' => 'Yazı Gereçleri', 'featured' => true],
        ['name' => 'Pensan', 'category' => 'Yazı Gereçleri', 'featured' => true],
        ['name' => 'Bic', 'category' => 'Yazı Gereçleri', 'featured' => false],
        ['name' => 'Uniball', 'category' => 'Yazı Gereçleri', 'featured' => false],
        ['name' => 'Edding', 'category' => 'Yazı Gereçleri', 'featured' => false],
        ['name' => 'Pelikan', 'category' => 'Yazı Gereçleri', 'featured' => false],
        ['name' => 'Adel', 'category' => 'Okul Kırtasiye', 'featured' => true],
        ['name' => 'Gıpta', 'category' => 'Kağıt Ürünleri', 'featured' => true],
        ['name' => 'Mopak', 'category' => 'Kağıt Ürünleri', 'featured' => false],
        ['name' => 'Allcopy', 'category' => 'Kağıt Ürünleri', 'featured' => true],
        ['name' => 'Mas', 'category' => 'Ofis Kırtasiye', 'featured' => true],
        ['name' => 'Noki', 'category' => 'Dosyalama', 'featured' => true],
        ['name' => 'Serve', 'category' => 'Okul Kırtasiye', 'featured' => false],
        ['name' => 'Hi-Text', 'category' => 'Yazı Gereçleri', 'featured' => false],
        ['name' => 'Maped', 'category' => 'Masaüstü', 'featured' => true],
        ['name' => 'Pritt', 'category' => 'Ofis Kırtasiye', 'featured' => true],
        ['name' => 'Monami', 'category' => 'Yazı Gereçleri', 'featured' => false],
        ['name' => 'Bigpoint', 'category' => 'Ofis Kırtasiye', 'featured' => false],
        ['name' => 'Fatih', 'category' => 'Okul Kırtasiye', 'featured' => false],
        ['name' => 'Tanex', 'category' => 'Etiket ve Rulo', 'featured' => true],
        ['name' => 'Bafix', 'category' => 'Ambalaj', 'featured' => false],
        ['name' => 'Keskin Color', 'category' => 'Kağıt Ürünleri', 'featured' => false],
        ['name' => 'Nova Color', 'category' => 'Okul Kırtasiye', 'featured' => false],
        ['name' => 'Giotto', 'category' => 'Okul Kırtasiye', 'featured' => false],
        ['name' => 'Lyra', 'category' => 'Yazı Gereçleri', 'featured' => false],
        ['name' => 'Legamaster', 'category' => 'Masaüstü', 'featured' => false],
        ['name' => 'Kraf', 'category' => 'Arşivleme', 'featured' => true],
        ['name' => 'Brons', 'category' => 'Ofis Kırtasiye', 'featured' => false],
    ];
}

function brands(): array
{
    return array_map(static fn (array $brand): string => $brand['name'], brand_items());
}

function featured_brands(): array
{
    return array_values(array_filter(brand_items(), static fn (array $brand): bool => !empty($brand['featured'])));
}

function brand_categories(): array
{
    return array_values(array_unique(array_map(static fn (array $brand): string => $brand['category'], brand_items())));
}

function special_services(): array
{
    return [
        [
            'icon' => 'truck',
            'title' => 'Hafta İçi Şehir İçi Servis',
            'text' => 'Kurumsal müşterilere hafta içi planlı Denizli şehir içi teslimat sağlanır; ürünler doğrudan ofise veya işletmeye ulaşır.',
        ],
        [
            'icon' => 'clock',
            'title' => "13:00'a Kadar Aynı Gün Teslimat",
            'text' => "Saat 13:00'a kadar gelen uygun siparişler aynı gün teslimat akışına alınır; acil ofis sarf ihtiyaçları beklemez.",
        ],
        [
            'icon' => 'factory',
            'title' => 'Sanayi ve Kurum Odaklı Çalışma',
            'text' => 'Organize ve çevre sanayi siteleri, kamu kurumları ve şirketlerin faturalı satın alma akışına uygun tedarik modeli sunulur.',
        ],
    ];
}

function product_categories(): array
{
    return [
        'Yazı Gereçleri',
        'Ofis Kırtasiye',
        'Kağıt Ürünleri',
        'Toner & Kartuş',
        'Dosyalama',
        'Arşivleme',
        'Ambalaj',
        'Etiket ve Rulo',
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

    $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp', 'heic', 'pdf', 'doc', 'docx', 'xls', 'xlsx', 'csv', 'txt'];
    $allowedMimes = [
        'image/jpeg', 'image/png', 'image/gif', 'image/webp', 'image/heic', 'image/heif',
        'application/pdf',
        'text/plain', 'text/csv',
        'application/msword',
        'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        'application/vnd.ms-excel',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
    ];
    $maxSize = 8 * 1024 * 1024;
    $maxFiles = 5;

    $destDir = dirname(__DIR__) . DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . 'ekler';
    if (!is_dir($destDir)) {
        @mkdir($destDir, 0775, true);
    }

    $finfo = function_exists('finfo_open') ? finfo_open(FILEINFO_MIME_TYPE) : null;
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
        if (!in_array($ext, $allowedExtensions, true)) {
            $errors[] = $orig . ' desteklenmeyen bir dosya türü.';
            continue;
        }

        $tmp = $_FILES[$field]['tmp_name'][$i];
        $mime = $finfo ? (string) finfo_file($finfo, $tmp) : '';
        if ($mime !== '' && !in_array($mime, $allowedMimes, true) && $ext !== 'csv') {
            $errors[] = $orig . ' güvenli bir dosya türü olarak doğrulanamadı.';
            continue;
        }

        $safeName = bin2hex(random_bytes(8)) . '.' . $ext;
        $target = $destDir . DIRECTORY_SEPARATOR . $safeName;
        if (is_uploaded_file($tmp) && move_uploaded_file($tmp, $target)) {
            $saved[] = ['path' => $target, 'name' => $orig];
            $accepted++;
        } else {
            $errors[] = $orig . ' kaydedilemedi.';
        }
    }

    if ($finfo) {
        finfo_close($finfo);
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
                $mail->SMTPAutoTLS = false;
            }
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
            . '<h2 style="color:#d2620e;margin:0 0 14px">' . e(SITE_NAME) . ' - Yeni Teklif / İletişim Talebi</h2>'
            . '<table style="border-collapse:collapse;width:100%;max-width:720px">' . $rows . '</table>'
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

    if (!empty($options['redirect'])) {
        header('Location: ' . (string) $options['redirect'], true, 303);
        exit;
    }

    return ['status' => 'success', 'errors' => [], 'old' => []];
}

function old_value(array $form, string $key): string
{
    return e($form['old'][$key] ?? '');
}

function social_links(): array
{
    return array_values(array_filter([
        SOCIAL_INSTAGRAM,
        maps_place_url(),
    ]));
}

function faqs(): array
{
    return [
        ['q' => 'Başarırlar Kurumsal Kırtasiye kimlere hizmet verir?', 'a' => 'Şirketler, kamu kurumları, organize sanayi ve çevre sanayi sitelerindeki işletmeler için kurumsal ve faturalı satış yapılır. Bireysel/perakende satış odağı yoktur.'],
        ['q' => 'Aynı gün teslimat var mı?', 'a' => "Evet. Denizli şehir içinde hafta içi saat 13:00'a kadar gelen uygun siparişler aynı gün teslimat akışına alınır."],
        ['q' => 'Ürün listemi nasıl gönderebilirim?', 'a' => 'Teklif formundan Excel, PDF, görsel veya metin dosyası yükleyebilir; dilerseniz WhatsApp üzerinden liste paylaşabilirsiniz.'],
        ['q' => 'Toptan ve proje bazlı fiyat alabilir miyim?', 'a' => 'Evet. Ürün grubu, miktar, marka tercihi ve teslimat beklentisine göre kurumsal fiyat hazırlanır.'],
        ['q' => 'Hangi ürün gruplarını tedarik ediyorsunuz?', 'a' => 'Ofis kırtasiye, okul kırtasiye, kağıt, toner-kartuş, dosyalama, arşivleme, bilgisayar sarf, ambalaj, promosyon, masaüstü, yazı gereçleri ve etiket-rulo dahil 10.000+ ürün.'],
        ['q' => 'Sanayi sitelerine servis var mı?', 'a' => 'Evet. Organize ve çevre sanayi sitelerindeki işletmelere planlı şehir içi servis desteği sağlanır.'],
    ];
}

function faq_schema(?array $faqs = null): array
{
    $items = [];
    foreach ($faqs ?? faqs() as $faq) {
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

function breadcrumb_schema(string $activePage, array $trail = []): array
{
    $items = [[
        '@type' => 'ListItem',
        'position' => 1,
        'name' => 'Anasayfa',
        'item' => canonical_url(''),
    ]];

    if ($trail) {
        foreach ($trail as $entry) {
            $items[] = [
                '@type' => 'ListItem',
                'position' => count($items) + 1,
                'name' => $entry['name'],
                'item' => canonical_url($entry['path']),
            ];
        }
    } else {
        $nav = nav_items();
        if ($activePage !== 'anasayfa' && isset($nav[$activePage])) {
            $items[] = [
                '@type' => 'ListItem',
                'position' => 2,
                'name' => $nav[$activePage]['label'],
                'item' => canonical_url($activePage),
            ];
        }
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
                'url' => canonical_url('urun-gruplari/' . $group['slug']),
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
        'slogan' => SITE_TAGLINE,
        'description' => COMPANY_NAME . ', ' . SITE_TAGLINE . '. 40+ yıl tedarik tecrübesi, 10.000+ ürün ve 100+ marka ile kurumlara toptan kırtasiye tedariği sağlar.',
        'email' => CONTACT_EMAIL,
        'telephone' => '+90' . preg_replace('/\D+/', '', CONTACT_PHONE),
        'parentOrganization' => [
            '@type' => 'Organization',
            'name' => PARENT_COMPANY,
            'description' => PARENT_COMPANY . ', 40 yılı aşkın geçmişiyle Ege bölgesinde yayın ve kırtasiye tedariği alanında faaliyet gösterir.',
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
        'description' => SITE_TAGLINE . '. Şirketlere, kamu kurumlarına ve sanayi işletmelerine 10.000+ ürün, 100+ marka ile toptan ve proje bazlı kırtasiye tedariği.',
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

function product_group_schema(array $group): array
{
    return [
        '@context' => 'https://schema.org',
        '@type' => 'CollectionPage',
        'name' => $group['title'] . ' | ' . SITE_NAME,
        'description' => $group['meta_description'] ?? $group['description'],
        'url' => canonical_url('urun-gruplari/' . $group['slug']),
        'mainEntity' => [
            '@type' => 'OfferCatalog',
            'name' => $group['title'],
            'itemListElement' => array_map(static fn (string $item): array => [
                '@type' => 'Offer',
                'itemOffered' => ['@type' => 'Product', 'name' => $item],
            ], $group['samples']),
        ],
    ];
}

function blog_post_schema(array $post): array
{
    return [
        '@context' => 'https://schema.org',
        '@type' => 'BlogPosting',
        'headline' => $post['title'],
        'description' => $post['excerpt'],
        'datePublished' => $post['date'],
        'dateModified' => $post['date'],
        'inLanguage' => 'tr-TR',
        'url' => canonical_url('blog/' . $post['slug']),
        'author' => [
            '@type' => 'Organization',
            'name' => SITE_NAME,
        ],
        'publisher' => [
            '@type' => 'Organization',
            'name' => SITE_NAME,
            'logo' => [
                '@type' => 'ImageObject',
                'url' => canonical_url('assets/images/basarirlar-logo.png'),
            ],
        ],
    ];
}
