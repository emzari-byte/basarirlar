<?php
require_once __DIR__ . '/includes/config.php';

$slug = clean_input($_GET['slug'] ?? '');
$post = find_blog_post($slug);

if (!$post) {
    http_response_code(404);
    $pageTitle = 'Makale bulunamadı | ' . SITE_NAME;
    $pageDescription = 'Aradığınız blog yazısı bulunamadı. Kurumsal kırtasiye rehberindeki makaleleri inceleyebilirsiniz.';
    $pagePath = 'blog';
    $activePage = 'blog';
    require __DIR__ . '/includes/header.php';
    ?>
    <section class="page-hero">
        <div class="container">
            <p class="eyebrow">Blog</p>
            <h1>Bu makale bulunamadı.</h1>
            <p>Aradığınız içerik taşınmış olabilir. Kurumsal kırtasiye rehberindeki diğer yazılara göz atabilirsiniz.</p>
            <div class="hero__actions">
                <a class="btn" href="<?= e(url('blog')); ?>">Blog'a Dön</a>
            </div>
        </div>
    </section>
    <?php require __DIR__ . '/includes/footer.php'; ?>
    <?php exit; ?>
<?php
}

$pageTitle = $post['title'] . ' | ' . SITE_NAME;
$pageDescription = $post['excerpt'];
$pagePath = 'blog/' . $post['slug'];
$activePage = 'blog';
$pageOgType = 'article';
$breadcrumbTrail = [
    ['name' => 'Blog', 'path' => 'blog'],
    ['name' => $post['title'], 'path' => 'blog/' . $post['slug']],
];
$pageJsonLd = [blog_post_schema($post)];
require __DIR__ . '/includes/header.php';
?>

<article>
    <section class="page-hero article-hero">
        <div class="container">
            <p class="eyebrow"><?= e($post['category']); ?></p>
            <h1><?= e($post['title']); ?></h1>
            <p><?= e($post['excerpt']); ?></p>
            <div class="article-meta">
                <time datetime="<?= e($post['date']); ?>"><?= date('d.m.Y', strtotime($post['date'])); ?></time>
                <span><?= e($post['read_time']); ?> okuma</span>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container article-layout">
            <div class="article-body">
                <?php foreach ($post['content'] as $section): ?>
                    <h2><?= e($section['heading']); ?></h2>
                    <?php foreach ($section['body'] as $paragraph): ?>
                        <p><?= e($paragraph); ?></p>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </div>
            <aside class="quote-card article-aside">
                <h2>Listeyi birlikte netleştirelim</h2>
                <p>Kurumsal kırtasiye, kağıt, toner veya sarf listenizi gönderin; toptan fiyat ve teslimat planını paylaşalım.</p>
                <a class="btn" href="<?= e(url('teklif-al')); ?>">Teklif Al</a>
                <a class="inline-link" href="<?= e(url('urun-gruplari')); ?>">Ürün gruplarını incele</a>
            </aside>
        </div>
    </section>
</article>

<?php require __DIR__ . '/includes/footer.php'; ?>
