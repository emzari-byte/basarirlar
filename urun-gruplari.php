<?php
$pageTitle = 'Ürün Grupları | Kurumsal Kırtasiye ve Ofis Sarf Tedariği';
$pageDescription = 'Ofis kırtasiye, kağıt, toner, dosyalama, arşivleme, bilgisayar sarf, ambalaj, promosyon, masaüstü ve yazı gereçleri için kurumsal teklif alın.';
$pagePath = 'urun-gruplari';
$activePage = 'urun-gruplari';
require __DIR__ . '/includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <p class="eyebrow">Ürün grupları</p>
        <h1>Kurumsal satın alma listelerini net ürün gruplarına ayırın.</h1>
        <p>10.000+ ürün kapsamını tek tek gezmek yerine, kurumunuzun ihtiyacını doğru kategoriyle başlatın. Her kategori için örnek ürün, marka ve SSS sayfası hazır.</p>
    </div>
</section>

<section class="section section--soft">
    <div class="container">
        <div class="product-grid">
            <?php foreach (product_groups() as $group): ?>
                <article class="card" id="<?= e($group['slug']); ?>">
                    <a class="card__image" href="<?= e(url('urun-gruplari/' . $group['slug'])); ?>">
                        <img src="<?= e($group['image']); ?>" alt="<?= e($group['title']); ?> ürünleri" loading="lazy">
                    </a>
                    <div class="card__body">
                        <h3><?= e($group['title']); ?></h3>
                        <p><?= e($group['summary']); ?></p>
                        <div class="card__actions">
                            <a class="card__link" href="<?= e(url('urun-gruplari/' . $group['slug'])); ?>">Detayları incele</a>
                            <a class="card__link card__link--muted" href="<?= e(url('teklif-al?urun_grubu=' . rawurlencode($group['title']))); ?>" data-track="category_quote_click" data-category="<?= e($group['slug']); ?>">Teklif al</a>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section">
    <div class="container cta-band">
        <div>
            <h2>Listeniz birden fazla kategori içeriyorsa tek dosya yeterli.</h2>
            <p>Kağıt, toner, dosyalama, ambalaj ve ofis sarf ürünlerini aynı teklif formunda paylaşabilirsiniz.</p>
        </div>
        <a class="btn btn--light" href="<?= e(url('teklif-al?urun_grubu=' . rawurlencode('Birden fazla ürün grubu'))); ?>">Toplu Teklif Al</a>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
