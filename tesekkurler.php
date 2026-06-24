<?php
require_once __DIR__ . '/includes/config.php';

$pageTitle = 'Teklif Talebiniz Alındı | ' . SITE_NAME;
$pageDescription = 'Başarırlar Kurumsal Kırtasiye teklif talebiniz alınmıştır. En kısa sürede firma yetkilinizle iletişime geçilecektir.';
$pagePath = 'tesekkurler';
$activePage = '';
require __DIR__ . '/includes/header.php';
?>

<section class="page-hero thanks-hero">
    <div class="container">
        <p class="eyebrow">Talep alındı</p>
        <h1>Teşekkürler, teklif talebiniz bize ulaştı.</h1>
        <p>Ürün listeniz, marka tercihleriniz ve teslimat beklentiniz incelenerek size dönüş yapılacak. Acil bir ihtiyacınız varsa WhatsApp üzerinden de yazabilirsiniz.</p>
        <div class="hero__actions">
            <a class="btn" href="https://wa.me/<?= e(CONTACT_WHATSAPP_E164); ?>?text=Merhaba%2C%20teklif%20talebim%20hakk%C4%B1nda%20bilgi%20almak%20istiyorum." target="_blank" rel="noopener" data-track="whatsapp_click">WhatsApp'tan Yaz</a>
            <a class="btn btn--outline" href="<?= e(url('urun-gruplari')); ?>">Ürün Gruplarına Dön</a>
        </div>
    </div>
</section>

<section class="section">
    <div class="container process-grid">
        <div class="process-step">
            <span>1</span>
            <h3>Talebiniz incelenir</h3>
            <p>Ürün grubu, adet, marka tercihi ve teslimat beklentisi kontrol edilir.</p>
        </div>
        <div class="process-step">
            <span>2</span>
            <h3>Alternatifler netleşir</h3>
            <p>Gerekirse orijinal, muadil veya farklı marka seçenekleri karşılaştırılır.</p>
        </div>
        <div class="process-step">
            <span>3</span>
            <h3>Teklif paylaşılır</h3>
            <p>Kurumsal fiyat, faturalı satış ve teslimat planı size iletilir.</p>
        </div>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
