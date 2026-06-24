# Sprint 0 Analiz Raporu

## Kapsam

Bu sprintte tasarım, sayfa component'i veya işlev kodu değiştirilmedi. İnceleme `C:\xampp\htdocs\basarirlar` çalışma kopyası ve hedef canlı URL `https://basarirlarkurumsal.com` üzerinden yapıldı. Not: `C:\Users\emzar\OneDrive\Belgeler\Başarırlar-Kırtasiye` altında commit içermeyen boş bir git başlangıcı görünüyor; aktif proje ve GitHub remote `C:\xampp\htdocs\basarirlar` içinde.

## 1. Mevcut Teknoloji

- Framework: Framework yok; saf PHP 7.4+, HTML, CSS, vanilla JS.
- Paket yöneticisi: Zorunlu paket yöneticisi yok. Playwright opsiyonel olarak `npm install -D playwright` ile kullanılıyor.
- E-posta: `PHPMailer/` vendored kütüphane; SMTP bilgileri `includes/secrets.php` içinde bekleniyor.
- Routing: `.htaccess` temiz URL, HTTPS/www yönlendirme, `/urun-gruplari/{slug}` ve `/blog/{slug}` rewrite kurallarını yönetiyor.
- Sayfa component'leri: Ortak layout `includes/header.php`, `includes/navbar.php`, `includes/footer.php`; ana sayfalar root PHP dosyaları.
- Form gönderimi: `includes/config.php` içindeki `handle_form_submission()`, `handle_uploaded_files()` ve `send_form_mail()` fonksiyonları.
- SEO metadata: Sayfa bazlı `$pageTitle`, `$pageDescription`, `$pagePath`, `$pageJsonLd`; ortak head çıktısı `includes/header.php`.
- İçerik modelleri: `product_groups()`, `blog_posts()`, `brand_items()`, `services()` fonksiyonları `includes/config.php` içinde.

## 2. Mevcut Sayfa Yapısı

Beklenen sayfalar mevcut:

- `/`
- `/hakkimizda`
- `/kurumsal-kirtasiye`
- `/urun-gruplari`
- `/markalar`
- `/hizmetlerimiz`
- `/blog`
- `/iletisim`
- `/teklif-al`
- `/kvkk`
- `/gizlilik-politikasi`
- `/cerez-politikasi`

Fazla/ek değerli sayfalar:

- `/tesekkurler`: teklif sonrası başarı ekranı.
- `/urun-gruplari/{slug}`: 12 kategori detay landing page'i.
- `/blog/{slug}`: 6 makale detay sayfası.
- `/sitemap.xml`, `/robots.txt`, `/llms.txt`.
- `/admin`: statik yönetim girişi gibi duruyor; yayın amacına göre erişim kontrolü gözden geçirilmeli.

Eksik sayfa:

- Beklenen listede eksik yok.
- Yerel ve canlı eşleşme canlı redirect sorunu nedeniyle doğrulanamadı.

## 3. Component ve Kod Tekrarları

- Header/Footer ortak partial'larda: iyi.
- CTA butonları sayfalarda inline tekrar ediyor; `quote_cta()` veya küçük CTA partial'ı ileride tekrar azaltır.
- Ürün grubu kartları ana sayfa ve `/urun-gruplari` içinde benzer HTML ile tekrar ediyor.
- Hizmet kartları data modelinden geliyor; yapı iyi.
- Marka listesi `markalar.php` ve ana sayfada benzer grid mantığı kullanıyor.
- Form bileşenleri `teklif-al.php` ve `iletisim.php` içinde ayrı yazılmış; field markup tekrarları var.
- SEO/head ortak; sayfa değişkenleriyle yönetiliyor. Bu mevcut mimari için doğru.

## 4. İçerik Problemleri

Güçlü taraflar:

- Hero artık teklif/list yükleme odaklı.
- 40+ yıl, 10.000+ ürün, 100+ marka, 13:00 teslimat mesajları mevcut.
- Kategori detayları örnek ürün, marka, avantaj ve SSS içeriyor.
- Blog içerikleri B2B satın alma konularına yönelmiş.

Riskler:

- “Denizli’nin en büyük” iddiası iyi ama kanıt formatı zayıf: mağaza fotoğrafı, depo/raf, marka/tedarik kapsamı, müşteri tipi, ticari geçmiş gibi güven sinyalleri daha görünür olmalı.
- “Faturalı satış” ve “kurumsal/toptan fiyat” bazı sayfalarda var ama teklif sürecine bağlanan kanıt metni sınırlı.
- Kategori detayları SEO için temel düzeyde iyi; ancak her kategori için Denizli + kurum tipi + kullanım senaryosu alt başlıkları artırılabilir.
- Markalar sayfasında gerçek logo görsel grid'i yok; metin kartları güven etkisini sınırlıyor.
- Hakkımızda ve kurumsal kırtasiye sayfaları dönüşüm CTA yoğunluğu açısından ana sayfadan daha zayıf.

## 5. UX ve Dönüşüm Değerlendirmesi

- İlk ekran değer önerisi: Yerelde net; “liste yükle, teklif al” mesajı doğru.
- Teklif al butonu: Header, hero, hızlı teklif, ürün kartları ve mobil bar içinde görünür.
- Ürün listesi yükleme: Formda dosya alanı ve limitler var; ancak dosya alanı ilk mobil ekranda görünmüyor, Sprint 1'de form içi “adım” hissi güçlendirilebilir.
- WhatsApp alternatifi: Header, hero, footer, mobil bar ve kategori detaylarında mevcut.
- Mobil teklif alma: Mobil conversion bar var; iyi. Form uzunluğu nedeniyle ilerleme hissi/alan gruplama eklenebilir.
- Form hata durumları: HTML5 validation, PHP required/email/phone/file limit kontrolü var. Hata mesajları tek alert içinde toplanıyor; alan bazlı hata UX'i yok.
- Başarılı gönderim: `/tesekkurler` var ve yönlendirme yapılıyor.
- Ölçüm: `quote_form_submit`, `quote_file_upload`, `whatsapp_click`, `phone_click`, `category_quote_click`, `blog_cta_click`, `contact_form_submit` hook'ları var. GA çerez onayından sonra yükleniyor.

## 6. Teknik SEO Durumu

- Title/meta description: Sayfa bazlı değişkenlerle mevcut.
- Canonical: `includes/header.php` içinde mevcut.
- Open Graph/Twitter: mevcut.
- Sitemap: statik `sitemap.xml` mevcut; kategori ve blog detayları dahil.
- Robots: mevcut, sitemap referansı var.
- Organization/LocalBusiness/WebSite schema: `page_schema()` içinde mevcut.
- FAQ schema: ana sayfa ve kategori detaylarında mevcut.
- BlogPosting schema: blog detaylarında mevcut.
- Breadcrumb schema: ortak head içinde mevcut; kategori/blog detaylarında trail veriliyor.
- İç linkleme: Ana sayfa, kategori grid, footer ve blog CTA'ları iyi; footer tüm önemli kategorileri değil sadece seçili kategorileri gösteriyor.

## 7. Kritik Riskler

1. Canlı HTTPS erişiminde redirect döngüsü/protokol problemi var. `curl -I -L https://basarirlarkurumsal.com/` aynı URL'ye tekrar eden 301 yanıtları ve sonunda invalid status line verdi.
2. Canlı smoke test bu yüzden tamamlanamadı; Googlebot ve kullanıcı erişimi etkilenebilir.
3. `.htaccess` HTTPS yönlendirmesi ile hosting/SSL panel yönlendirmesi çakışıyor olabilir.
4. `admin/` ve vendored `PHPMailer/` public kökte; erişim yüzeyi gözden geçirilmeli.
5. `sitemap.xml` statik; yeni kategori/blog eklenirse manuel güncelleme unutulabilir.

## 8. En Hızlı Kazanımlar

- Canlı redirect döngüsünü çözmek.
- `/teklif-al` formunu mobilde daha kısa, adım hissi veren ve dosya yüklemeyi daha erken gösteren hale getirmek.
- Markalar sayfasına gerçek logo/kanıt hissi eklemek.
- Hakkımızda ve kurumsal-kırtasiye sayfalarına üst bölüm CTA ve güven metrikleri eklemek.
- Kategori detaylarında “Denizli'de {kategori} kurumsal teklif” arama niyetini daha net hedeflemek.

## 9. Büyük Tasarım Değişikliği Gerektiren Alanlar

- Marka/logo grid ve kategori filtre deneyimi.
- Teklif formu UX'i: alan gruplama, dosya yükleme dropzone, success/error mikrocopy.
- Kurumsal güven bölümü: görsel kanıt, hizmet alanı, süreç ve teslimat modelinin daha ciddi B2B sunumu.
- İletişim sayfasında harita, adres ve form önceliği.
- Blog liste/detay sayfalarında lead magnet gibi teklif yönlendirmesi.

## 10. Sprint 1 İçin Önerilen Dosya Listesi

- `index.php`
- `teklif-al.php`
- `iletisim.php`
- `hakkimizda.php`
- `kurumsal-kirtasiye.php`
- `markalar.php`
- `urun-grubu-detay.php`
- `includes/config.php`
- `includes/footer.php`
- `assets/css/style.css`
- `assets/js/main.js`
- `.htaccess`
- `sitemap.xml`

## 11. Sprint 1'de Değiştirilecek Component'ler

- Header CTA ve mobil menü öncelikleri.
- Teklif formu alanları, dosya yükleme ve hata/success state.
- Ürün kartları ve kategori detay CTA blokları.
- Marka grid/filtre kartları.
- Güven metrikleri ve teslimat/servis bandı.
- Footer iç linkleme ve mobil conversion bar.
- SEO data modeli ve sitemap üretim/güncelleme rutini.

## 12. Çalıştırılan Komutlar

Başarılı:

```powershell
python "...\product-design\...\user_context_preflight.py"
powershell -ExecutionPolicy Bypass -File scripts\smoke-check.ps1 -BaseUrl "http://localhost/basarirlar"
```

Yerel smoke test PHP syntax, route ve temel SEO kontrollerinde başarılı geçti.

Canlı kontrolde başarısız:

```powershell
powershell -ExecutionPolicy Bypass -File scripts\smoke-check.ps1 -BaseUrl "https://basarirlarkurumsal.com"
curl.exe -I -L --max-redirs 10 https://basarirlarkurumsal.com/
```

Sebep: Canlı URL aynı HTTPS adrese 301 döngüsüne giriyor.

Paket eksikliği nedeniyle başarısız:

```powershell
node scripts\playwright-smoke.js
```

Sebep: Repo içinde `playwright` paketi kurulu değil (`Cannot find module 'playwright'`). Çalıştırmak için önce `npm install -D playwright && npx playwright install chromium` gerekir.
