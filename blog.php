<?php
$pageTitle = 'Blog ve Faydalı Bilgiler | Kurumsal Kırtasiye Rehberi';
$pageDescription = 'Kurumsal kırtasiye tedariği, toplu sipariş, ofis sarf malzemeleri ve stok planlama hakkında faydalı bilgiler.';
$pagePath = 'blog';
$activePage = 'blog';
require __DIR__ . '/includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <p class="eyebrow">Blog</p>
        <h1>Satın alma, stok planlama ve kurumsal kırtasiye tedariği için faydalı bilgiler</h1>
        <p>Kurum ihtiyaçlarını daha düzenli yönetmeye yardımcı olacak kısa ve uygulanabilir notlar.</p>
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
                    </div>
                    <h3><?= e($post['title']); ?></h3>
                    <p><?= e($post['excerpt']); ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
