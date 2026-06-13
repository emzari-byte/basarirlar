<?php
$pageTitle = 'Çerez Politikası | Başarırlar Kurumsal Kırtasiye';
$pageDescription = 'Başarırlar Kurumsal Kırtasiye A.Ş. çerez politikası: web sitesinde kullanılan çerez türleri ve çerez tercihlerinizi nasıl yönetebileceğiniz.';
$pagePath = 'cerez-politikasi';
$activePage = '';
require __DIR__ . '/includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <p class="eyebrow">Yasal</p>
        <h1>Çerez Politikası</h1>
        <p>Web sitemizde kullanılan çerezler ve tercihlerinizi nasıl yönetebileceğiniz hakkında bilgilendirme.</p>
    </div>
</section>

<section class="section">
    <div class="container content-flow">
        <p><strong>Son güncelleme:</strong> 13.06.2026</p>

        <h2>1. Çerez Nedir?</h2>
        <p>Çerezler, bir web sitesini ziyaret ettiğinizde tarayıcınıza kaydedilen küçük metin dosyalarıdır. Sitenin düzgün çalışmasını ve deneyiminizin iyileştirilmesini sağlar.</p>

        <h2>2. Kullandığımız Çerezler</h2>
        <ul>
            <li><strong>Zorunlu çerezler:</strong> Oturum yönetimi ve sitenin temel işlevleri (örneğin form güvenliği) için kullanılır. Bu çerezler olmadan site düzgün çalışmaz ve kapatılamaz.</li>
            <li><strong>Tercih çerezleri:</strong> Çerez bildirimi onayınız gibi seçimlerinizi hatırlamak için tarayıcınızın yerel depolamasını kullanırız.</li>
        </ul>
        <p>Web sitemiz şu an için pazarlama veya üçüncü taraf takip (reklam) çerezleri kullanmamaktadır. İleride analiz/istatistik çerezleri eklenmesi hâlinde bu politika güncellenecektir.</p>

        <h2>3. Çerezleri Nasıl Yönetebilirsiniz?</h2>
        <p>Tarayıcınızın ayarlarından çerezleri silebilir veya engelleyebilirsiniz. Ancak zorunlu çerezlerin engellenmesi durumunda sitenin bazı bölümleri çalışmayabilir. Çoğu tarayıcıda çerez yönetimi "Ayarlar &gt; Gizlilik" bölümünden yapılır.</p>

        <h2>4. İletişim</h2>
        <p>Çerez politikamızla ilgili sorularınız için: <a class="inline-link" href="mailto:<?= e(CONTACT_EMAIL); ?>"><?= e(CONTACT_EMAIL); ?></a></p>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
