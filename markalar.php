<?php
$pageTitle = 'Markalar | Başarırlar Kurumsal Kırtasiye';
$pageDescription = 'Başarırlar Kurumsal Kırtasiye, şirketlerin ve kurumların ofis ihtiyaçlarında tercih ettiği kırtasiye, kağıt, sarf ve dosyalama markaları için tedarik desteği sunar.';
$pagePath = 'markalar';
$activePage = 'markalar';
require __DIR__ . '/includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <p class="eyebrow">Markalar</p>
        <h1>Kurumsal standartlarınıza uygun marka ve ürün seçenekleri</h1>
        <p>Satın alma sürecinde marka standardı, muadil ürün ve bütçe dengesi birlikte değerlendirilerek teklif hazırlanır.</p>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-head">
            <div>
                <p class="eyebrow">Tedarik ağı</p>
                <h2>Kırtasiye, kağıt, dosyalama ve sarf ürünlerinde 100+ öncü marka</h2>
            </div>
            <p>Faber-Castell, Stabilo, Staedtler, Pensan, Bic ve 100+ marka; orijinal ürün garantisiyle ve toplu sipariş avantajıyla stoklarımızda. Aşağıda öne çıkan markalarımızdan bir bölümünü bulabilirsiniz.</p>
        </div>
        <div class="brand-grid">
            <?php foreach (brands() as $brand): ?>
                <div class="brand-card"><?= e($brand); ?></div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section section--soft">
    <div class="container">
        <div class="section-head">
            <div>
                <p class="eyebrow">Ürün kategorileri</p>
                <h2>Tüm kırtasiye kategorilerinde tek tedarikçi</h2>
            </div>
        </div>
        <div class="pill-grid">
            <?php foreach (product_categories() as $category): ?>
                <span class="pill"><?= e($category); ?></span>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section">
    <div class="container split">
        <div>
            <h2>Marka tercihinizi teklif aşamasında belirtebilirsiniz.</h2>
            <p>Kurumunuzun kullandığı standart markalar varsa talep formuna ekleyin. Uygun ürün, muadil ve adet planı teklif sürecinde birlikte netleştirilir.</p>
        </div>
        <div class="split__media">
            <img src="<?= e(asset('images/products/yazi-gerecleri.jpg')); ?>" alt="Kurumsal yazı gereçleri markaları" loading="lazy">
        </div>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
