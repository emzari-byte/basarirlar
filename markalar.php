<?php
$pageTitle = 'Markalar | 100+ Kurumsal Kırtasiye ve Sarf Markası';
$pageDescription = 'Başarırlar Kurumsal Kırtasiye; yazı gereçleri, kağıt, dosyalama, ambalaj, etiket ve ofis sarf ürünlerinde 100+ marka için tedarik desteği sunar.';
$pagePath = 'markalar';
$activePage = 'markalar';
require __DIR__ . '/includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <p class="eyebrow">Markalar</p>
        <h1>Bilinen markalar ve bütçeye uygun alternatifler aynı teklif akışında.</h1>
        <p>Kurum standardınız varsa markayı koruruz; maliyet avantajı gerekiyorsa doğru muadil seçenekleri teklif aşamasında birlikte değerlendiririz.</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-head">
            <div>
                <p class="eyebrow">Öne çıkan markalar</p>
                <h2>Satın alma ekiplerinin sık talep ettiği markalar</h2>
            </div>
            <a class="btn btn--ghost" href="<?= e(url('teklif-al')); ?>">Marka Tercihiyle Teklif Al</a>
        </div>
        <div class="brand-grid brand-grid--featured">
            <?php foreach (featured_brands() as $brand): ?>
                <div class="brand-card"><?= e($brand['name']); ?></div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section section--soft">
    <div class="container">
        <div class="section-head">
            <div>
                <p class="eyebrow">Kategori filtresi</p>
                <h2>Markaları ürün alanına göre süzün</h2>
            </div>
        </div>
        <div class="filter-bar" data-brand-filters>
            <button class="filter-chip is-active" type="button" data-brand-filter="all">Tümü</button>
            <?php foreach (brand_categories() as $category): ?>
                <button class="filter-chip" type="button" data-brand-filter="<?= e($category); ?>"><?= e($category); ?></button>
            <?php endforeach; ?>
        </div>
        <div class="brand-grid" data-brand-grid>
            <?php foreach (brand_items() as $brand): ?>
                <div class="brand-card" data-brand-category="<?= e($brand['category']); ?>">
                    <strong><?= e($brand['name']); ?></strong>
                    <span><?= e($brand['category']); ?></span>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section">
    <div class="container split">
        <div>
            <p class="eyebrow">Marka tercihi</p>
            <h2>Standart markanızı koruyabilir, gerekirse muadil maliyet avantajı görebilirsiniz.</h2>
            <p>Teklif formunda kullandığınız marka, model veya muadil isteğini yazın. Satın alma ekibiniz için karşılaştırılabilir ve faturalı teklif hazırlanır.</p>
            <div class="hero__actions">
                <a class="btn" href="<?= e(url('teklif-al')); ?>">Marka Tercihiyle Teklif Al</a>
            </div>
        </div>
        <div class="split__media">
            <img src="<?= e(asset('images/products/yazi-gerecleri.jpg')); ?>" alt="Kurumsal yazı gereçleri markaları" loading="lazy">
        </div>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
