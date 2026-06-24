<?php
require_once __DIR__ . '/includes/config.php';

$slug = clean_input($_GET['slug'] ?? '');
$group = find_product_group($slug);

if (!$group) {
    http_response_code(404);
    $pageTitle = 'Ürün grubu bulunamadı | ' . SITE_NAME;
    $pageDescription = 'Aradığınız ürün grubu bulunamadı. Kurumsal kırtasiye ürün gruplarını inceleyebilirsiniz.';
    $pagePath = 'urun-gruplari';
    $activePage = 'urun-gruplari';
    require __DIR__ . '/includes/header.php';
    ?>
    <section class="page-hero">
        <div class="container">
            <p class="eyebrow">Ürün grupları</p>
            <h1>Bu ürün grubu bulunamadı.</h1>
            <p>Aradığınız kategori taşınmış veya kaldırılmış olabilir. Tüm ürün gruplarını inceleyebilirsiniz.</p>
            <div class="hero__actions">
                <a class="btn" href="<?= e(url('urun-gruplari')); ?>">Ürün Gruplarına Dön</a>
            </div>
        </div>
    </section>
    <?php require __DIR__ . '/includes/footer.php'; ?>
    <?php exit; ?>
<?php
}

$pageTitle = $group['title'] . ' Teklifi | ' . SITE_NAME;
$pageDescription = $group['meta_description'];
$pagePath = 'urun-gruplari/' . $group['slug'];
$activePage = 'urun-gruplari';
$breadcrumbTrail = [
    ['name' => 'Ürün Grupları', 'path' => 'urun-gruplari'],
    ['name' => $group['title'], 'path' => 'urun-gruplari/' . $group['slug']],
];
$pageJsonLd = [
    product_group_schema($group),
    faq_schema($group['faq']),
];
require __DIR__ . '/includes/header.php';
?>

<section class="page-hero category-hero">
    <div class="container">
        <p class="eyebrow">Ürün grubu</p>
        <h1><?= e($group['title']); ?> için kurumsal teklif alın.</h1>
        <p><?= e($group['description']); ?></p>
        <div class="hero__actions">
            <a class="btn" href="<?= e(url('teklif-al?urun_grubu=' . rawurlencode($group['title']))); ?>" data-track="category_quote_click" data-category="<?= e($group['slug']); ?>">Bu kategori için teklif al</a>
            <a class="btn btn--outline" href="<?= e(url('urun-gruplari')); ?>">Tüm ürün grupları</a>
        </div>
    </div>
</section>

<section class="section">
    <div class="container category-layout">
        <div class="category-main">
            <div class="section-head section-head--compact">
                <div>
                    <p class="eyebrow">Örnek ürünler</p>
                    <h2>Bu kategoride teklif isteyebileceğiniz ürünler</h2>
                </div>
            </div>
            <div class="list-card-grid">
                <?php foreach ($group['samples'] as $sample): ?>
                    <div class="list-card"><?= e($sample); ?></div>
                <?php endforeach; ?>
            </div>

            <div class="content-panel">
                <h2>Kurumsal alım avantajları</h2>
                <ul class="check-list">
                    <?php foreach ($group['advantages'] as $advantage): ?>
                        <li><?= e($advantage); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="content-panel">
                <h2>İlgili markalar</h2>
                <div class="pill-grid">
                    <?php foreach ($group['brands'] as $brand): ?>
                        <span class="pill"><?= e($brand); ?></span>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="content-panel">
                <h2>Sık sorulan sorular</h2>
                <div class="faq-list">
                    <?php foreach ($group['faq'] as $i => $faq): ?>
                        <details class="faq-item"<?= $i === 0 ? ' open' : ''; ?>>
                            <summary><?= e($faq['q']); ?></summary>
                            <div class="faq-item__body"><p><?= e($faq['a']); ?></p></div>
                        </details>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <aside class="category-aside">
            <img src="<?= e($group['image']); ?>" alt="<?= e($group['title']); ?> kurumsal kırtasiye ürünleri" loading="lazy">
            <div class="quote-card">
                <h2><?= e($group['title']); ?> listeniz hazır mı?</h2>
                <p>Ürün, adet ve marka tercihinizi iletin; toptan ve proje bazlı fiyat hazırlayalım.</p>
                <a class="btn" href="<?= e(url('teklif-al?urun_grubu=' . rawurlencode($group['title']))); ?>" data-track="category_quote_click" data-category="<?= e($group['slug']); ?>">Bu kategori için teklif al</a>
                <a class="inline-link" href="https://wa.me/<?= e(CONTACT_WHATSAPP_E164); ?>?text=Merhaba%2C%20<?= e(rawurlencode($group['title'])); ?>%20i%C3%A7in%20kurumsal%20teklif%20almak%20istiyorum." target="_blank" rel="noopener" data-track="whatsapp_click">WhatsApp ile liste gönder</a>
            </div>
        </aside>
    </div>
</section>

<section class="section section--soft">
    <div class="container">
        <div class="cta-band">
            <div>
                <h2><?= e($group['title']); ?> alımını tek teklif sürecinde netleştirelim.</h2>
                <p>Ürün listenizi yükleyin veya WhatsApp’tan gönderin; satın alma ekibiniz için karşılaştırılabilir teklif hazırlayalım.</p>
            </div>
            <a class="btn btn--light" href="<?= e(url('teklif-al?urun_grubu=' . rawurlencode($group['title']))); ?>" data-track="category_quote_click" data-category="<?= e($group['slug']); ?>">Teklif Formuna Git</a>
        </div>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
