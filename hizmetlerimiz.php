<?php
$pageTitle = 'Hizmetlerimiz | Kurumsal Tedarik ve Toplu Sipariş Yönetimi';
$pageDescription = 'Başarırlar Kurumsal Kırtasiye; kurumsal tedarik, toplu sipariş yönetimi, düzenli teslimat, tekliflendirme ve ürün danışmanlığı hizmetleri sunar.';
$pagePath = 'hizmetlerimiz';
$activePage = 'hizmetlerimiz';
require __DIR__ . '/includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <p class="eyebrow">Hizmetlerimiz</p>
        <h1>Kurumsal kırtasiye tedariğini satın alma süreçlerinize uyumlu hale getiriyoruz.</h1>
        <p>Ürün seçimi, tekliflendirme, teslimat ve faturalandırma adımlarını kurum ihtiyaçlarına göre düzenleyen bir hizmet modeli sunuyoruz.</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-head">
            <div>
                <p class="eyebrow">Özel hizmetler</p>
                <h2>Kurumsal müşterilerimize özel servis ayrıcalıkları</h2>
            </div>
            <p>Denizli'nin en büyük kurumsal kırtasiyesi olarak ürünü sadece satmıyor, planlı servisimizle kapınıza kadar getiriyoruz.</p>
        </div>
        <div class="special-grid">
            <?php foreach (special_services() as $svc): ?>
                <article class="special-card">
                    <span class="special-card__icon"><?= service_icon($svc['icon']); ?></span>
                    <h3><?= e($svc['title']); ?></h3>
                    <p><?= e($svc['text']); ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section section--soft">
    <div class="container">
        <div class="section-head">
            <div>
                <p class="eyebrow">Tedarik hizmetleri</p>
                <h2>Satın alma sürecinizi uçtan uca yöneten çözümler</h2>
            </div>
        </div>
        <div class="service-grid">
            <?php foreach (services() as $index => $service): ?>
                <article class="service-card">
                    <span><?= $index + 1; ?></span>
                    <h3><?= e($service); ?></h3>
                    <p>Kurumunuzun ürün listesi, adet beklentisi ve teslimat düzeni dikkate alınarak uygulanabilir bir tedarik akışı oluşturulur.</p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="cta-band">
            <div>
                <h2>Toplu sipariş ve düzenli teslimat için görüşelim.</h2>
                <p>İhtiyaç kalemlerinizi paylaşın; kuruma özel tedarik ve tekliflendirme sürecini birlikte planlayalım.</p>
            </div>
            <a class="btn btn--light" href="<?= e(url('teklif-al')); ?>">Teklif Al</a>
        </div>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
