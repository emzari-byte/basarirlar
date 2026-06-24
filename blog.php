<?php
$pageTitle = 'Blog | Kurumsal Kırtasiye Satın Alma Rehberi';
$pageDescription = 'Kurumsal kırtasiye tedariği, toplu sipariş, ofis sarf stok planlama, toner kartuş seçimi ve aylık ihtiyaç listesi hakkında pratik rehberler.';
$pagePath = 'blog';
$activePage = 'blog';
require __DIR__ . '/includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <p class="eyebrow">Blog</p>
        <h1>Satın alma ekipleri için kısa, uygulanabilir kırtasiye rehberleri.</h1>
        <p>Kurumsal tedarik, toplu sipariş, stok sürekliliği ve ürün seçimi hakkında gereksiz uzatmadan karar destek içerikleri.</p>
    </div>
</section>

<section class="section section--soft">
    <div class="container">
        <div class="blog-grid">
            <?php foreach (blog_posts() as $post): ?>
                <article class="blog-card">
                    <div class="blog-card__meta">
                        <span><?= e($post['category']); ?></span>
                        <time datetime="<?= e($post['date']); ?>"><?= date('d.m.Y', strtotime($post['date'])); ?></time>
                        <span><?= e($post['read_time']); ?></span>
                    </div>
                    <h3><a href="<?= e(url('blog/' . $post['slug'])); ?>"><?= e($post['title']); ?></a></h3>
                    <p><?= e($post['excerpt']); ?></p>
                    <a class="card__link" href="<?= e(url('blog/' . $post['slug'])); ?>">Makaleyi oku</a>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section">
    <div class="container cta-band">
        <div>
            <h2>Rehber yetmezse listenizi gönderin, teklif hazırlayalım.</h2>
            <p>Ürün grubu, adet ve marka tercihinizi paylaşın; satın alma sürecini hızlandıralım.</p>
        </div>
        <a class="btn btn--light" href="<?= e(url('teklif-al')); ?>" data-track="blog_cta_click">Teklif Al</a>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
