<?php
require_once __DIR__ . '/config.php';

$pageTitle = $pageTitle ?? SITE_NAME;
$pageDescription = $pageDescription ?? 'Başarırlar Kurumsal Kırtasiye; şirketler ve kurumlar için hızlı, düzenli ve profesyonel kırtasiye tedarik çözümleri sunar.';
$pagePath = $pagePath ?? '';
$pageImage = $pageImage ?? asset('images/hero-kurumsal-kirtasiye.jpg');
$activePage = $activePage ?? 'anasayfa';
$breadcrumbTrail = $breadcrumbTrail ?? [];
$pageOgType = $pageOgType ?? 'website';
$pageImageCanonical = $pageImage;
if (!preg_match('#^https?://#i', $pageImageCanonical)) {
    $imagePath = parse_url($pageImageCanonical, PHP_URL_PATH) ?: $pageImageCanonical;
    $imagePath = ltrim($imagePath, '/');
    $basePath = trim(BASE_PATH, '/');
    if ($basePath !== '' && strpos($imagePath, $basePath . '/') === 0) {
        $imagePath = substr($imagePath, strlen($basePath) + 1);
    }
    $pageImageCanonical = canonical_url($imagePath);
}
?>
<!doctype html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($pageTitle); ?></title>
    <meta name="description" content="<?= e($pageDescription); ?>">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <meta name="author" content="<?= e(COMPANY_NAME); ?>">
    <meta name="language" content="Turkish">
    <meta name="geo.region" content="TR-20">
    <meta name="geo.placename" content="Pamukkale, Denizli">
    <meta name="geo.position" content="<?= e(GEO_LAT); ?>;<?= e(GEO_LNG); ?>">
    <meta name="ICBM" content="<?= e(GEO_LAT); ?>, <?= e(GEO_LNG); ?>">
    <meta name="theme-color" content="#f47a1f">
    <link rel="canonical" href="<?= e(canonical_url($pagePath)); ?>">
    <meta property="og:type" content="<?= e($pageOgType); ?>">
    <meta property="og:site_name" content="<?= e(SITE_NAME); ?>">
    <meta property="og:locale" content="tr_TR">
    <meta property="og:title" content="<?= e($pageTitle); ?>">
    <meta property="og:description" content="<?= e($pageDescription); ?>">
    <meta property="og:url" content="<?= e(canonical_url($pagePath)); ?>">
    <meta property="og:image" content="<?= e($pageImageCanonical); ?>">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= e($pageTitle); ?>">
    <meta name="twitter:description" content="<?= e($pageDescription); ?>">
    <meta name="twitter:image" content="<?= e($pageImageCanonical); ?>">
    <link rel="icon" type="image/png" href="<?= e(asset('images/favicon.png')); ?>">
    <link rel="preload" as="image" href="<?= e(asset('images/hero-kurumsal-kirtasiye.jpg')); ?>">
    <link rel="stylesheet" href="<?= e(versioned_asset('css/style.css')); ?>">
    <script>
        window.BASARIRLAR_GA_ID = <?= json_encode(GA_MEASUREMENT_ID, JSON_UNESCAPED_SLASHES); ?>;
        window.dataLayer = window.dataLayer || [];
        window.gtag = window.gtag || function(){window.dataLayer.push(arguments);};
    </script>
    <script type="application/ld+json">
<?= json_encode(page_schema(), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT); ?>
    </script>
    <script type="application/ld+json">
<?= json_encode(breadcrumb_schema($activePage, $breadcrumbTrail), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT); ?>
    </script>
<?php foreach (($pageJsonLd ?? []) as $jsonLdBlock): ?>
    <script type="application/ld+json">
<?= json_encode($jsonLdBlock, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT); ?>
    </script>
<?php endforeach; ?>
</head>
<body>
<a class="skip-link" href="#icerik">İçeriğe geç</a>
<?php require __DIR__ . '/navbar.php'; ?>
<main id="icerik">
