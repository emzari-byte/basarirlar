<?php
$pageTitle = 'KVKK Aydınlatma Metni | Başarırlar Kurumsal Kırtasiye';
$pageDescription = 'Başarırlar Kurumsal Kırtasiye A.Ş. 6698 sayılı Kişisel Verilerin Korunması Kanunu kapsamında kişisel verilerin işlenmesine ilişkin aydınlatma metni.';
$pagePath = 'kvkk';
$activePage = '';
require __DIR__ . '/includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <p class="eyebrow">Yasal</p>
        <h1>KVKK Aydınlatma Metni</h1>
        <p>6698 sayılı Kişisel Verilerin Korunması Kanunu kapsamında kişisel verilerinizin işlenmesine ilişkin bilgilendirme.</p>
    </div>
</section>

<section class="section">
    <div class="container content-flow">
        <?php require __DIR__ . '/includes/kvkk-content.php'; ?>
        <p><a class="inline-link" href="<?= e(url('gizlilik-politikasi')); ?>">Gizlilik Politikası</a> · <a class="inline-link" href="<?= e(url('cerez-politikasi')); ?>">Çerez Politikası</a></p>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
