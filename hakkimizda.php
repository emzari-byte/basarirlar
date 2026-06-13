<?php
$pageTitle = 'Hakkımızda | Başarırlar Kurumsal Kırtasiye';
$pageDescription = '40 yılı aşkın geçmişiyle Ege\'nin en büyük yayın dağıtım firması Başarırlar Yayın Dağıtım\'ın kurumsal markası olan Başarırlar Kurumsal Kırtasiye, kurumlara toptan ve proje bazlı kırtasiye tedarik çözümleri sunar.';
$pagePath = 'hakkimizda';
$activePage = 'hakkimizda';
require __DIR__ . '/includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <p class="eyebrow">Hakkımızda</p>
        <h1>40 yılı aşkın tedarik tecrübesinin kurumsal adresi.</h1>
        <p>Başarırlar Kurumsal Kırtasiye; Ege'nin en büyük yayın dağıtım firması Başarırlar Yayın Dağıtım'ın, kurumlara özel olarak yapılandırdığı toptan ve proje bazlı tedarik markasıdır.</p>
    </div>
</section>

<section class="section">
    <div class="container split">
        <div>
            <p class="eyebrow">Köklü geçmiş</p>
            <h2>Ege'nin en büyük yayın dağıtım firmasının gücü</h2>
            <p>Ana firmamız Başarırlar Yayın Dağıtım, 40 yılı aşkın süredir bölgenin yayın ve kırtasiye tedarik sektöründe faaliyet göstermekte olup, sahip olduğu geniş ürün ağı, güçlü stok yapısı ve köklü lojistik altyapısıyla Ege'nin en büyük yayın dağıtım firmasıdır.</p>
            <p>Bu birikim, doğrudan markalarla kurulan tedarik ilişkilerini, yüksek stok sürekliliğini ve rekabetçi maliyet avantajını beraberinde getirir. Başarırlar Kurumsal Kırtasiye, bu kurumsal gücü kurumların satın alma süreçlerine taşımak üzere kurulmuştur.</p>
            <ul class="check-list">
                <li>40 yılı aşkın sektör tecrübesi ve köklü tedarikçi ilişkileri.</li>
                <li>Ege genelinde geniş dağıtım ve lojistik altyapısı.</li>
                <li>Doğrudan marka tedariğine dayalı güçlü stok ve fiyat avantajı.</li>
            </ul>
        </div>
        <div class="split__media">
            <img src="<?= e(url('images/fotokopi-kagidi-vege-copier-80-gr.jpeg')); ?>" alt="Başarırlar Yayın Dağıtım kurumsal kırtasiye tedariki" loading="lazy">
        </div>
    </div>
</section>

<section class="section section--soft">
    <div class="container split">
        <div class="split__media">
            <img src="<?= e(asset('images/products/ofis-kirtasiye.jpg')); ?>" alt="Kurumlara toptan ve proje bazlı kırtasiye tedariki" loading="lazy">
        </div>
        <div>
            <p class="eyebrow">Kurumsal markamız</p>
            <h2>Kurumlara toptan ve proje bazlı tedarik</h2>
            <p>Başarırlar Kurumsal Kırtasiye, bireysel ve perakende satıştan farklı olarak yalnızca kurumsal müşterilere odaklanır. Şirketlere, kamu kurumlarına ve sanayi işletmelerine toptan veya proje bazlı çalışma modeliyle özel bir hizmet ve fiyat politikası sunar.</p>
            <p>10.000+ ürün çeşidi ve 100+ öncü marka ile kırtasiye, ofis sarf malzemeleri, kağıt ürünleri, dosyalama, arşivleme ve ambalaj ihtiyaçlarında kurumların tek noktadan tedarik adresidir. Bu yapısıyla Denizli'nin en büyük kurumsal kırtasiyesidir.</p>
            <ul class="check-list">
                <li>Yalnızca kurumsal firmalara özel toptan fiyat politikası.</li>
                <li>İhtiyaca göre proje bazlı tekliflendirme ve tedarik planı.</li>
                <li>Faturalı satış, düzenli servis ve aynı gün teslimat imkânı.</li>
            </ul>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="section-head">
            <div>
                <p class="eyebrow">Çalışma ilkeleri</p>
                <h2>Satın alma süreçlerine uyum sağlayan kurumsal yaklaşım</h2>
            </div>
        </div>
        <div class="info-grid">
            <div class="info-panel">
                <h3>Düzenli iletişim</h3>
                <p>Talep edilen ürünler, adetler, muadil seçenekleri ve teslimat beklentileri net bir akışla ele alınır.</p>
            </div>
            <div class="info-panel">
                <h3>Doğru ürün seçimi</h3>
                <p>Fiyat, kalite, marka standardı ve kullanım yoğunluğu birlikte değerlendirilerek teklif hazırlanır.</p>
            </div>
            <div class="info-panel">
                <h3>Genişletilebilir yapı</h3>
                <p>Ürün grupları ve teklif sistemi ileride kategori, sepet veya admin yönetimine dönüşebilecek şekilde planlanır.</p>
            </div>
        </div>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
