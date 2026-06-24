# Sprint 1.5 Değişiklik Özeti

## Amaç

Sprint 1 kalite kontrolünde ana sayfa, global header/footer, CTA sistemi, ürün grubu kartları, hizmetler ve markalar alanındaki metin tutarlılığı güçlendirildi. Yeni büyük özellik eklenmedi; müşteriye görünen B2B satın alma dili iyileştirildi.

## Yapılan Değişiklikler

- Ana sayfa hero CTA düzeni güncellendi: `Ürün Listenizi Yükleyin`, `WhatsApp'tan Liste Gönderin`, `Ürün Gruplarını İncele`.
- Header ve footer ana dönüşüm dili `Kurumsal Teklif Alın` olarak standardize edildi.
- Mobil sticky CTA alanı `Teklif Al` ve `WhatsApp` olarak kısa tutuldu.
- Ana sayfa hedef kurum kartları satın alma faydasına göre yeniden yazıldı.
- Ana sayfa servis modeli başlık + açıklama formatına geçirildi.
- Ürün grupları sayfası "tek tedarik noktası" mesajı ve kategori bazlı teklif akışıyla yeniden yazıldı.
- Ürün grubu kartları ortak component üzerinden örnek ürün ve kategori teklif CTA'sı gösterir hale getirildi.
- Hizmet açıklamaları operasyon, muhasebe, stok ve satın alma faydasına bağlandı.
- Markalar sayfasındaki kartlar marka adı, kategori etiketi ve marka tercihi mesajıyla logoya hazır hale getirildi.
- `hakkimizda.php` ve `admin/index.php` içindeki geliştirme/altyapı dili müşteriye uygun metinle değiştirildi.

## Güncellenen CTA Standartları

- `Ürün Listenizi Yükleyin`
- `WhatsApp'tan Liste Gönderin`
- `Kurumsal Teklif Alın`
- `Bu Kategori İçin Teklif Alın`
- Mobil kısa aksiyon: `Teklif Al`

## Değişen Dosyalar

- `index.php`
- `urun-gruplari.php`
- `urun-grubu-detay.php`
- `hizmetlerimiz.php`
- `markalar.php`
- `hakkimizda.php`
- `admin/index.php`
- `includes/components.php`
- `includes/config.php`
- `includes/navbar.php`
- `includes/footer.php`
- `assets/css/style.css`

## Test Notları

Çalıştırılan kontroller:

- `C:\xampp\php\php.exe -l` ile değişen PHP dosyaları kontrol edildi: başarılı.
- `powershell -ExecutionPolicy Bypass -File scripts\smoke-check.ps1 -BaseUrl "http://localhost/basarirlar"`: başarılı, tüm route'lar `200 OK`.
- `git diff --check`: yalnızca LF/CRLF uyarıları verdi.
- Browser desktop/mobil QA: `/`, `/urun-gruplari`, `/hizmetlerimiz`, `/markalar`, `/teklif-al` sayfalarında yatay taşma yok, H1 sayısı 1, mobil sticky CTA görünür, görsel alt metin eksikliği yok, console error yok.

Çalıştırılamayan kontroller:

- Build/lint: projede `package.json`, `composer.json`, `Makefile` veya benzer build hattı yok.
- Playwright smoke: `node scripts\playwright-smoke.js` komutu `Cannot find module 'playwright'` hatasıyla durdu.
- Lighthouse: gerekli npm bağımlılığı/komutu projede tanımlı değil.

## Kalan Riskler

- Projede `package.json` olmadığı için standart `npm run build` veya `npm run lint` hattı yok.
- Playwright scripti için `playwright` paketi kurulu değilse test çalışmaz.
- Canlı HTTPS ve deploy sonrası form/mail kontrolleri yerelden değil panel/canlı ortamdan ayrıca doğrulanmalıdır.
