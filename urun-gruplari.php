<?php
$pageTitle = 'Ürün Grupları | Ofis, Kağıt, Toner ve Bilgisayar Sarf Ürünleri';
$pageDescription = 'Başarırlar Kurumsal Kırtasiye ürün grupları: ofis kırtasiye, okul kırtasiye, kağıt, toner, dosyalama, arşivleme, bilgisayar sarf malzemeleri, ambalaj ve promosyon ürünleri.';
$pagePath = 'urun-gruplari';
$activePage = 'urun-gruplari';
require __DIR__ . '/includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <p class="eyebrow">Ürün grupları</p>
        <h1>Kurumsal satın alma için sınıflandırılmış kırtasiye ve sarf ürünleri</h1>
        <p>İlk aşamada ürün grupları kart yapısıyla sunulur; altyapı ileride kategori detay sayfalarına ve teklif sepetine dönüşebilecek şekilde düzenlenmiştir.</p>
    </div>
</section>

<section class="section section--soft">
    <div class="container">
        <div class="product-grid">
            <?php foreach (product_groups() as $group): ?>
                <article class="card" id="<?= e($group['slug']); ?>">
                    <div class="card__image">
                        <img src="<?= e($group['image']); ?>" alt="<?= e($group['title']); ?>" loading="lazy">
                    </div>
                    <div class="card__body">
                        <h3><?= e($group['title']); ?></h3>
                        <p><?= e($group['summary']); ?></p>
                        <a class="card__link" href="<?= e(url('teklif-al')); ?>">Bu grup için teklif al</a>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section">
    <div class="container split">
        <div>
            <p class="eyebrow">Genişletilebilir altyapı</p>
            <h2>Ürün grupları ileride kategori ve ürün detaylarına dönüşebilir.</h2>
            <p>Her ürün grubu temiz slug yapısıyla tanımlandığı için yeni ürün fotoğrafları, marka filtreleri, stok bilgisi veya teklif sepeti eklemek kolaylaşır.</p>
        </div>
        <div class="split__media">
            <img src="<?= e(asset('images/products/ambalaj-sarf.jpg')); ?>" alt="Ambalaj ve sarf malzemeleri" loading="lazy">
        </div>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
