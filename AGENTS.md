# Repository Guidelines

## Proje Amacı

Başarırlar Kurumsal sitesi, bireysel satış vitrini değil; şirket, kamu kurumu ve sanayi işletmelerinden ürün listesi alıp hızlı kurumsal teklif üretmeye odaklı bir B2B kırtasiye tedarik sitesidir.

## Hedef Kullanıcı

Birincil kullanıcı genel müdür, satın alma müdürü, idari işler veya kurum yetkilisidir. İçerik; fiyat karşılaştırma, faturalı satış, teslimat, marka/muadil netliği ve güven duygusunu hızlı vermelidir.

## Tasarım Dili

Kurumsal, sakin, okunaklı ve satışa yönlendiren bir arayüz korunmalıdır. Pazarlama kalabalığı yerine net CTA, kısa metin, görünür telefon/WhatsApp, dosya yükleme ve kategori bazlı teklif akışı önceliklidir. Turuncu marka rengi ana vurgu, koyu lacivert kurumsal zemin, beyaz/nötr alanlar denge olmalıdır.

## Korunacak Marka Mesajları

- Denizli'nin büyük kurumsal kırtasiye tedarikçilerinden biri
- 40+ yıl tecrübe, 10.000+ ürün, 100+ marka
- Kurumsal/toptan fiyatlandırma ve faturalı satış
- Hafta içi şehir içi servis, 13:00'a kadar aynı gün teslimat
- Şirketler, kamu kurumları ve sanayi işletmeleri odağı

## Kodlama Kuralları

Proje saf PHP 7.4+, HTML, CSS ve JS kullanır. Ortak helper ve veri modelleri `includes/config.php` içindedir. Çıktıları `e()` ile kaçırın, iç linkleri `url()`, assetleri `asset()` veya `versioned_asset()` ile üretin. Slug'lar küçük harfli, ASCII ve tireli olmalıdır: `toner-kartus`, `kurumsal-kirtasiye`.

## Build, Lint ve Test Komutları

```powershell
powershell -ExecutionPolicy Bypass -File scripts\smoke-check.ps1 -BaseUrl "http://localhost/basarirlar"
npm install -D playwright
npx playwright install chromium
node scripts\playwright-smoke.js
```

Smoke testi PHP syntax, route ve temel SEO kontrollerini yapar. Playwright mobil CTA, overflow ve form akışını doğrular.

## SEO Kuralları

Her sayfada özgün `$pageTitle`, `$pageDescription`, `$pagePath`, canonical ve OG çıktısı olmalıdır. Kategori/blog detayları `includes/config.php` data modelinden beslenmeli; sitemap güncel tutulmalı; FAQ, BlogPosting, Organization/LocalBusiness ve breadcrumb schema bozulmamalıdır.

## Form ve KVKK Hassasiyetleri

Teklif formu dosya yükleme, KVKK onayı, frontend/backend limitleri ve başarı yönlendirmesini korumalıdır. `includes/secrets.php`, `uploads/*`, loglar ve müşteri dosyaları commitlenmez. Analytics yalnızca çerez izni sonrası çalışmalıdır.

## İş Bitirme Kriterleri

Sayfa kodu değiştiğinde local smoke testi çalışmalı, mobilde taşma ve CTA görünürlüğü kontrol edilmeli, `/teklif-al` dosya yükleme ve hata durumları test edilmelidir. Canlı deploy sonrası HTTPS, sitemap, robots ve form maili manuel doğrulanmalıdır.
