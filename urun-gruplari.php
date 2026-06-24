<?php
$pageTitle = 'Ürün Grupları | Kurumsal Kırtasiye ve Ofis Sarf Tedariği';
$pageDescription = 'Ofis kırtasiye, kağıt, toner, dosyalama, arşivleme, bilgisayar sarf, ambalaj, promosyon, masaüstü ve yazı gereçleri için kurumsal teklif alın.';
$pagePath = 'urun-gruplari';
$activePage = 'urun-gruplari';
require_once __DIR__ . '/includes/components.php';
require __DIR__ . '/includes/header.php';
?>

<section class="page-hero">
    <div class="container">
        <p class="eyebrow">Ürün grupları</p>
        <h1>Kurumsal satın alma listelerini net ürün gruplarına ayırın.</h1>
        <p>Kurumsal kırtasiye, kağıt, toner, dosyalama, arşivleme, bilgisayar sarf ve ambalaj ihtiyaçlarınızı tek noktadan tekliflendirebilirsiniz. Ürün grubunu seçin, ihtiyaç listenizi gönderin; size özel fiyat ve teslimat planı hazırlayalım.</p>
    </div>
</section>

<section class="section section--soft">
    <div class="container">
        <div class="product-grid">
            <?php foreach (product_groups() as $group): ?>
                <?= product_group_card($group); ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section">
    <div class="container service-model service-model--light">
        <div>
            <p class="eyebrow">Tek tedarik noktası</p>
            <h2>Kurumsal satın alma için tek tedarik noktası</h2>
            <p>Birden fazla ürün grubunu tek teklif altında toplar, satın alma ekibinizin fiyat, marka ve teslimat karşılaştırmasını sadeleştiririz.</p>
        </div>
        <ul class="service-model__list">
            <li><strong>Tek dosya, tek teklif</strong><span>Kağıt, toner, dosyalama, ambalaj ve ofis sarf kalemlerini aynı listede paylaşabilirsiniz.</span></li>
            <li><strong>Marka ve muadil karşılaştırması</strong><span>Kurum standardınızı korur, gerektiğinde bütçeye uygun muadil seçenekleri birlikte değerlendiririz.</span></li>
            <li><strong>Toplu alım fiyat avantajı</strong><span>Yüksek adetli ve dönemsel alımlarda ürün grubu bazlı değil, toplam liste üzerinden fiyat çalışırız.</span></li>
            <li><strong>Faturalı satış ve düzenli teslimat</strong><span>Muhasebe kayıtlarınıza uygun fatura ve Denizli şehir içi planlı teslimat desteği sunarız.</span></li>
        </ul>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
