# Redesign Roadmap

## Hedef

Başarırlar Kurumsal sitesini “kurumsal broşür” hissinden çıkarıp, satın alma müdürü ve kurum yetkilisi için güven veren, hızlı teklif aldıran, kategori bazlı SEO büyütebilen bir B2B tedarik sitesine dönüştürmek.

## Sprint 0: Analiz ve Talimat

Durum: Tamamlandı.

Çıktılar:

- `docs/audit-sprint-0.md`
- `docs/redesign-roadmap.md`
- `AGENTS.md`

Not: Sayfa tasarımı ve component kodu değiştirilmedi.

## Sprint 1: Yayın Sağlığı ve Teklif Akışı

Öncelik: Çok yüksek.

İşler:

1. Canlı HTTPS/redirect döngüsünü çöz.
2. `.htaccess` ve hosting SSL yönlendirmesini tek kaynak haline getir.
3. `/teklif-al` formunu mobilde daha hızlı doldurulur hale getir.
4. Dosya yüklemeyi daha görünür yap; Excel/PDF/fotoğraf kabulünü görsel olarak netleştir.
5. Form hata mesajlarını alan bazlı ve anlaşılır hale getir.
6. `/tesekkurler` ekranında WhatsApp ve telefonla devam aksiyonunu güçlendir.

Dosyalar:

- `.htaccess`
- `teklif-al.php`
- `tesekkurler.php`
- `assets/css/style.css`
- `assets/js/main.js`
- `includes/config.php`

Kabul kriterleri:

- `https://basarirlarkurumsal.com/` 200 döner.
- HTTP ve www tek canonical HTTPS adrese 301 ile gider.
- Form dosya limitleri frontend/backend tarafında çalışır.
- Mobilde CTA ve dosya yükleme kolay görülür.

## Sprint 2: Güven ve Kurumsal İkna

Öncelik: Yüksek.

İşler:

1. Hakkımızda ve kurumsal kırtasiye sayfalarını satın alma odaklı yeniden yapılandır.
2. 40+ yıl, 10.000+ ürün, 100+ marka, faturalı satış ve şehir içi servis kanıtlarını her kritik sayfada konumlandır.
3. Marka sayfasında gerçek logo/marka grid sunumu oluştur.
4. Kurum tipi bazlı güven blokları ekle: şirketler, kamu, sanayi işletmeleri.

Dosyalar:

- `hakkimizda.php`
- `kurumsal-kirtasiye.php`
- `markalar.php`
- `includes/config.php`
- `assets/css/style.css`

Kabul kriterleri:

- Her sayfa birincil CTA ile teklif formuna yönlendirir.
- Markalar ve güven kanıtları metin kartı hissinden çıkar.
- İçerik perakende değil kurumsal alım dilinde kalır.

## Sprint 3: Kategori SEO Büyümesi

Öncelik: Yüksek.

İşler:

1. 12 kategori detayını SEO landing page mantığıyla derinleştir.
2. Her kategoriye “örnek ürün listesi”, “kurumsal kullanım senaryosu”, “Denizli teslimat avantajı”, “ilgili markalar” ve “SSS” ekle.
3. Footer ve ana sayfa iç linklerini kategori önceliğine göre güçlendir.
4. Sitemap güncelleme sürecini dokümante et veya otomasyona bağla.

Dosyalar:

- `urun-grubu-detay.php`
- `urun-gruplari.php`
- `includes/config.php`
- `includes/footer.php`
- `sitemap.xml`

Kabul kriterleri:

- Her kategori özgün title/meta/FAQ/schema üretir.
- Kategori CTA'sı `teklif-al?urun_grubu=...` ile formu ön seçili açar.
- İç linkleme ana kategori fırsatlarını destekler.

## Sprint 4: İçerik ve Blog Dönüşümü

Öncelik: Orta.

İşler:

1. Blog liste ve detaylarını teklif yönlendiren rehber yapısına dönüştür.
2. Her makalede ilgili ürün grubu CTA'sı ve WhatsApp alternatifi ekle.
3. Yeni makale fırsatları planla: aylık kırtasiye listesi, toner maliyeti, A4 kağıt stok planı, kamu alımı kontrol listesi.

Dosyalar:

- `blog.php`
- `blog-detay.php`
- `includes/config.php`
- `assets/css/style.css`

Kabul kriterleri:

- Her blog detayı BlogPosting schema ile kalır.
- Makaleler bilgilendirir ama teklif formuna doğal geçiş verir.

## Sprint 5: Performans, Erişilebilirlik ve Ölçüm

Öncelik: Orta.

İşler:

1. Görsel boyutlarını ve lazy-load kullanımını kontrol et.
2. Klavye navigasyonu, focus state ve form label erişilebilirliğini test et.
3. GA event hook'larının çerez izni sonrası çalıştığını doğrula.
4. Lighthouse performance, accessibility, best practices ve SEO raporu al.

Dosyalar:

- `assets/css/style.css`
- `assets/js/main.js`
- `includes/header.php`
- `includes/footer.php`
- `scripts/playwright-smoke.js`

Kabul kriterleri:

- Mobilde yatay taşma yok.
- Form, menü ve CTA'lar klavye ile kullanılabilir.
- Analytics onaysız çalışmaz, onaylı durumda event gönderir.

## Öncelikli Risk Sırası

1. Canlı HTTPS redirect döngüsü.
2. Teklif formunda mobil sürtünme.
3. Güven kanıtlarının görsel/kanıt olarak zayıf kalması.
4. Kategori SEO sayfalarının henüz yeterince derin olmaması.
5. Statik sitemap'in güncelleme unutma riski.
