# Sprint 1.5 QA Raporu

## Kapsam

Bu kontrol Sprint 1'de değişen ana sayfa, global header/footer, ortak CTA sistemi, ürün grubu kartları, hizmet metinleri, marka kartları ve mobil sticky CTA alanını kapsar. Amaç yeni büyük özellik eklemek değil; müşteriye görünen metinleri, CTA tutarlılığını ve temel kullanılabilirliği profesyonel B2B seviyesine getirmektir.

## Sprint 1 Kabul Durumu

Tamamlananlar:

- Ana sayfada tek H1 ile net B2B teklif mesajı kuruldu.
- Hero, hızlı teklif kutusu, hedef kurum kartları, ürün grupları, servis modeli, marka gücü, teklif süreci, SSS ve final CTA sırası korundu.
- Header, footer, hero ve ürün kartlarında teklif yönlendirmesi görünür durumda.
- Mobil sticky alanda `Teklif Al` ve `WhatsApp` aksiyonları mevcut.
- Ana sayfa ürün grubu kartları ortak component üzerinden örnek ürün ve kategori teklif CTA'sı gösteriyor.

Eksik veya sonraki sprint konusu:

- Teklif formu UX'i ve backend hata akışı Sprint 1.5 kapsamında değiştirilmedi.
- Markalar sayfası logoya hazır metin kartı yapısında; gerçek logo görselleri Sprint 2 konusu.
- Canlı HTTPS/redirect sağlığı yerel kontrolden ayrı olarak panel/deploy sonrası doğrulanmalı.

## Tespitler

- `hakkimizda.php` içinde müşteriye gösterilmemesi gereken "genişletilebilir yapı", "admin yönetimine dönüşebilir" benzeri geliştirme dili vardı.
- `admin/index.php` 403 dönmesine rağmen "admin altyapısı hazırlanmaktadır" gibi yayın kalitesini düşüren ifade içeriyordu.
- CTA dili bazı yüzeylerde `Kurumsal Teklif Al`, `Teklif al`, `WhatsApp ile liste gönder` gibi farklılaşıyordu.
- Ürün grupları giriş metni kategori detaylarının varlığını anlatıyor, satın alma faydasını yeterince öne çıkarmıyordu.
- Hizmet açıklamaları doğru başlıklara sahipti ancak satın alma, muhasebe, operasyon ve stok faydası daha somut yazılmalıydı.

## Düzeltme Sonrası Kontrol

- Geliştirici/altyapı ifadeleri görünür PHP sayfalarından kaldırıldı.
- CTA dili şu standarda yaklaştırıldı: `Ürün Listenizi Yükleyin`, `WhatsApp'tan Liste Gönderin`, `Kurumsal Teklif Alın`, `Bu Kategori İçin Teklif Alın`.
- Ana sayfa hero'suna üçüncü küçük yönlendirme olarak `Ürün Gruplarını İncele` eklendi.
- Ürün grupları sayfası "tek tedarik noktası" faydasını anlatacak şekilde yeniden yazıldı.
- Marka kartları kategori etiketi ve marka tercihi mesajı gösterecek şekilde logoya hazır hale getirildi.

## Test Durumu

Başarılı kontroller:

- PHP syntax kontrolü: başarılı.
- Local smoke check: tüm ana route'lar ve kategori/blog detayları `200 OK`.
- `git diff --check`: yalnızca LF/CRLF uyarıları var, whitespace hatası yok.
- Geliştirici ifade taraması: görünür PHP sayfalarında temiz.
- Browser desktop/mobil kontrol: seçili sayfalarda tek H1, yatay taşma yok, görsellerde alt metin eksikliği yok, mobil sticky CTA görünür, console error yok.

Çalıştırılamayan kontroller:

- `npm run build` / `npm run lint`: projede `package.json` yok.
- `node scripts/playwright-smoke.js`: `playwright` paketi kurulu olmadığı için çalışmadı.
- Lighthouse: npm/browser Lighthouse bağımlılığı bu repoda kurulu değil.
