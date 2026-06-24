# Başarırlar Kurumsal Kırtasiye

Denizli odaklı, B2B kurumsal kırtasiye teklif toplama sitesi. Site; şirketler, kamu kurumları ve sanayi işletmeleri için ürün listesi alma, kategori bazlı teklif yönlendirme, WhatsApp alternatifi ve SEO odaklı içerik yapısı sunar.

## Öne çıkan yapı

- 12 ürün grubu için SEO uyumlu detay URL yapısı: `/urun-gruplari/{slug}`
- 6 başlangıç makalesi için gerçek blog detay yapısı: `/blog/{slug}`
- Teklif formu: firma, yetkili, telefon, e-posta, ürün grubu, açıklama, dosya yükleme, KVKK onayı
- Dosya doğrulama: en fazla 5 dosya, dosya başına 8 MB, güvenli uzantı/MIME kontrolü
- Başarılı teklif sonrası `/tesekkurler` yönlendirmesi
- Event hook noktaları: `quote_form_submit`, `quote_file_upload`, `whatsapp_click`, `phone_click`, `category_quote_click`
- Google Analytics etiketi çerez onayı verilmeden yüklenmez
- LocalBusiness / Organization, FAQ, BlogPosting ve kategori schema çıktıları

## Teknoloji

- PHP 7.4+
- Saf HTML/CSS/JS
- Apache `.htaccess` rewrite
- PHPMailer ile SMTP e-posta gönderimi

## Kurulum

1. Dosyaları web köküne yükleyin.
2. `includes/secrets.example.php` dosyasını `includes/secrets.php` olarak kopyalayın ve SMTP bilgilerini girin.
3. `uploads/` klasörünün yazılabilir olduğundan emin olun.
4. Canlı kurulumda site kök dizindeyse `BASE_PATH` otomatik boş döner; yerelde `/basarirlar` olarak çalışır.

## Veri modeli

Ana içerik modeli `includes/config.php` içindedir:

- `product_groups()`: ürün grubu slug, başlık, görsel, özet, örnek ürünler, markalar, avantajlar, SSS ve meta açıklama.
- `blog_posts()`: blog slug, başlık, özet, kategori, tarih, okuma süresi ve makale bölümleri.
- `brand_items()`: marka adı, kategori ve öne çıkan marka bilgisi.
- `services()`: hizmet başlığı ve tekrar etmeyen fayda metni.

## Sayfa yapısı

- `/`
- `/hakkimizda`
- `/kurumsal-kirtasiye`
- `/urun-gruplari`
- `/urun-gruplari/ofis-kirtasiye`
- `/urun-gruplari/okul-kirtasiye`
- `/urun-gruplari/kagit-urunleri`
- `/urun-gruplari/toner-kartus`
- `/urun-gruplari/dosyalama-urunleri`
- `/urun-gruplari/arsivleme-urunleri`
- `/urun-gruplari/bilgisayar-sarf`
- `/urun-gruplari/ambalaj-sarf`
- `/urun-gruplari/promosyon-urunleri`
- `/urun-gruplari/masaustu-gerecleri`
- `/urun-gruplari/yazi-gerecleri`
- `/urun-gruplari/etiket-rulo`
- `/markalar`
- `/hizmetlerimiz`
- `/blog`
- `/blog/{slug}`
- `/iletisim`
- `/teklif-al`
- `/tesekkurler`
- `/kvkk`
- `/gizlilik-politikasi`
- `/cerez-politikasi`

## Test

Yerel Apache/XAMPP çalışırken:

```powershell
powershell -ExecutionPolicy Bypass -File scripts\smoke-check.ps1 -BaseUrl "http://localhost/basarirlar"
```

Playwright yüklüyse:

```powershell
npm install -D playwright
npx playwright install chromium
node scripts\playwright-smoke.js
```

Lighthouse kontrolü için:

```powershell
npx lighthouse https://basarirlarkurumsal.com/ --view --only-categories=performance,accessibility,best-practices,seo
```

## cPanel deploy notu

`.cpanel.yml` kullanılıyorsa public_html hedefi için ana dosyalar, `assets`, `images`, `includes`, `PHPMailer`, `admin`, `robots.txt`, `sitemap.xml`, `llms.txt` ve `.htaccess` kopyalanmalıdır. Paylaşımlı hostingde terminal yoksa cPanel Git “Deploy HEAD Commit” yerine manuel dosya kopyalama da kullanılabilir.

## Önemli

- `includes/secrets.php` git'e gönderilmez.
- `SITE_URL`: `https://basarirlarkurumsal.com`
- Form gönderimleri `cihan@basarirlar.com.tr` adresine iletilir; kayıtlar `uploads/form-submissions.log` içine yazılır.
