<?php
$pageTitle = 'Gizlilik Politikası | Başarırlar Kurumsal Kırtasiye';
$pageDescription = 'Başarırlar Kurumsal Kırtasiye A.Ş. gizlilik politikası: web sitesinde toplanan bilgilerin nasıl kullanıldığı, korunduğu ve saklandığı.';
$pagePath = 'gizlilik-politikasi';
$activePage = '';
require __DIR__ . '/includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <p class="eyebrow">Yasal</p>
        <h1>Gizlilik Politikası</h1>
        <p>Web sitemiz üzerinden paylaştığınız bilgilerin nasıl toplandığını, kullanıldığını ve korunduğunu açıklar.</p>
    </div>
</section>

<section class="section">
    <div class="container content-flow">
        <p><strong>Son güncelleme:</strong> 13.06.2026</p>

        <h2>1. Genel</h2>
        <p><?= e(COMPANY_NAME); ?> ("Şirket") olarak ziyaretçilerimizin ve müşterilerimizin gizliliğine önem veriyoruz. Bu politika, <?= e(SITE_URL); ?> web sitesi üzerinden toplanan kişisel bilgilerin işlenmesine ilişkin esasları açıklar. Kişisel verilerin işlenmesine dair detaylı bilgilendirme için <a class="inline-link" href="<?= e(url('kvkk')); ?>">KVKK Aydınlatma Metni</a>'ni inceleyebilirsiniz.</p>

        <h2>2. Hangi Bilgileri Topluyoruz?</h2>
        <ul>
            <li><strong>Form bilgileri:</strong> İletişim ve teklif formlarında ilettiğiniz ad-soyad, firma adı, telefon, e-posta, mesaj ve eklediğiniz dosyalar.</li>
            <li><strong>Teknik veriler:</strong> Sunucu kayıtlarında saklanan IP adresi ve gönderim tarihi (güvenlik ve kötüye kullanımın önlenmesi amacıyla).</li>
        </ul>

        <h2>3. Bilgileri Nasıl Kullanıyoruz?</h2>
        <p>Topladığımız bilgileri yalnızca; talebinize yanıt vermek, teklif hazırlamak, sipariş ve teslimat süreçlerini yürütmek, faturalandırmak ve sizinle iletişim kurmak amacıyla kullanırız. Bilgileriniz pazarlama amacıyla üçüncü taraflara satılmaz veya kiralanmaz.</p>

        <h2>4. Veri Güvenliği</h2>
        <p>Form aracılığıyla iletilen dosyalar ve kayıtlar web erişimine kapalı, korumalı bir alanda saklanır. Verilerinize yetkisiz erişimi önlemek için makul teknik ve idari tedbirler alınır.</p>

        <h2>5. Saklama Süresi</h2>
        <p>Kişisel verileriniz, işleme amacının gerektirdiği süre ve ilgili mevzuatta öngörülen yasal saklama süreleri boyunca muhafaza edilir; sürenin sonunda silinir, yok edilir veya anonim hâle getirilir.</p>

        <h2>6. Çerezler</h2>
        <p>Web sitemiz, oturum yönetimi için zorunlu çerezler kullanır. Ayrıntılar için <a class="inline-link" href="<?= e(url('cerez-politikasi')); ?>">Çerez Politikası</a>'na bakınız.</p>

        <h2>7. İletişim</h2>
        <p>Gizlilikle ilgili sorularınız için: <a class="inline-link" href="mailto:<?= e(CONTACT_EMAIL); ?>"><?= e(CONTACT_EMAIL); ?></a> · <?= e(CONTACT_PHONE); ?></p>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
