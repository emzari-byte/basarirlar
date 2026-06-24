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
        <h1>Kurumsal kırtasiye tedariğini liste, teklif ve teslimat akışına dönüştürüyoruz.</h1>
        <p>Satın alma listenizi paylaşın; ürün seçimi, muadil değerlendirme, faturalı satış ve şehir içi teslimat sürecini tek akışta netleştirelim.</p>
        <div class="hero__actions">
            <a class="btn" href="<?= e(url('teklif-al')); ?>">Kurumsal Teklif Alın</a>
            <a class="btn btn--outline" href="https://wa.me/<?= e(CONTACT_WHATSAPP_E164); ?>?text=Merhaba%2C%20kurumsal%20k%C4%B1rtasiye%20listemi%20payla%C5%9Fmak%20istiyorum." target="_blank" rel="noopener" data-track="whatsapp_click">WhatsApp'tan Liste Gönderin</a>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-head">
            <div>
                <p class="eyebrow">Özel hizmetler</p>
                <h2>Satın alma ekibine hız kazandıran servis ayrıcalıkları</h2>
            </div>
            <p>Denizli'nin en büyük kurumsal kırtasiyesi olarak ürünü sadece satmıyor; acil ihtiyaç, tekrar eden liste ve faturalı teslimat sürecini birlikte yönetiyoruz.</p>
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
                <h2>Her hizmet doğrudan maliyet, zaman veya teslimat faydasına bağlı.</h2>
            </div>
        </div>
        <div class="service-grid">
            <?php foreach (services() as $index => $service): ?>
                <article class="service-card">
                    <span><?= $index + 1; ?></span>
                    <h3><?= e($service['title']); ?></h3>
                    <p><?= e($service['text']); ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="cta-band">
            <div>
                <h2>Listenizi gönderin, teslimat ve fiyat planını birlikte netleştirelim.</h2>
                <p>Kağıt, toner, dosya, ambalaj ve ofis sarf kalemlerinizi tek dosyada paylaşabilirsiniz.</p>
            </div>
            <a class="btn btn--light" href="<?= e(url('teklif-al')); ?>">Kurumsal Teklif Alın</a>
        </div>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
