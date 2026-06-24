<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/components.php';

$homeMetrics = [
    ['value' => '40+', 'label' => 'yıl tedarik tecrübesi'],
    ['value' => '10.000+', 'label' => 'kurumsal ürün çeşidi'],
    ['value' => '100+', 'label' => 'marka ve muadil seçenek'],
    ['value' => "13:00'a", 'label' => 'kadar aynı gün teslimat'],
];

$homeAudiences = [
    ['title' => 'Şirketler', 'text' => 'Departmanlardan gelen kalem, kağıt ve sarf listelerini tek teklif altında toplayarak bütçe takibini kolaylaştırırız.'],
    ['title' => 'Kamu kurumları', 'text' => 'Faturalı satış, marka standardı ve belge düzeni ihtiyacına uygun karşılaştırılabilir teklif hazırlarız.'],
    ['title' => 'Sanayi işletmeleri', 'text' => 'Organize ve çevre sanayi bölgelerinde ofis, depo ve sevkiyat sarfları için planlı teslimat desteği veririz.'],
    ['title' => 'Muhasebe ve hukuk ofisleri', 'text' => 'Dosyalama, arşivleme, kağıt ve yazı gereçlerinde yoğun evrak akışını aksatmayacak tedarik kurarız.'],
    ['title' => 'Eğitim kurumları', 'text' => 'Dönem başı, idari ofis ve etkinlik listelerini toplu alım fiyatı ve teslimat takvimiyle netleştiririz.'],
    ['title' => 'Sağlık kuruluşları', 'text' => 'Etiket, dosya, kağıt ve ofis sarflarında düzenli tüketimi faturalı ve takip edilebilir akışa bağlarız.'],
];

$homeServiceItems = [
    ['title' => 'Hızlı tedarik', 'text' => 'Acil ofis sarf ihtiyaçlarında ürün listesini hızla netleştirir, uygun stok ve teslimat planıyla teklif sürecini kısaltırız.'],
    ['title' => 'Düzenli servis', 'text' => "Hafta içi şehir içi servis ve 13:00'a kadar gelen uygun siparişlerde aynı gün teslimat planı oluştururuz."],
    ['title' => 'Toplu sipariş desteği', 'text' => 'Yüksek adetli alımlarda marka, muadil ürün ve bütçe dengesini birlikte değerlendirerek kuruma özel fiyat hazırlarız.'],
    ['title' => 'Geniş ürün yelpazesi', 'text' => 'Kağıt, kalem, toner, dosyalama, arşivleme, ambalaj ve bilgisayar sarf ürünlerini tek tedarik noktasında toplarız.'],
    ['title' => 'Kurumsal faturalandırma', 'text' => 'Satın alma ve muhasebe süreçlerine uygun şekilde faturalı satış ve evrak düzeniyle ilerleriz.'],
];

$homeFaqs = [
    ['q' => 'Sadece kurumsal firmalara mı hizmet veriyorsunuz?', 'a' => 'Ana odağımız şirketler, kamu kurumları, eğitim ve sağlık kuruluşları ile sanayi işletmelerinin kurumsal ve faturalı satın alma süreçleridir.'],
    ['q' => 'Ürün listesi Excel olarak gönderilebilir mi?', 'a' => 'Evet. Excel, PDF, görsel veya metin formatındaki ürün listenizi teklif formundan yükleyebilir ya da WhatsApp üzerinden paylaşabilirsiniz.'],
    ['q' => 'Aynı gün teslimat her sipariş için geçerli mi?', 'a' => "Aynı gün teslimat, Denizli şehir içinde hafta içi 13:00'a kadar gelen ve stok/rota açısından uygun siparişler için planlanır."],
    ['q' => 'Marka tercihi belirtebilir miyiz?', 'a' => 'Evet. Kurumunuzun standart marka veya model tercihi varsa teklif aşamasında dikkate alınır.'],
    ['q' => 'Muadil ürün öneriyor musunuz?', 'a' => 'Evet. Bütçe ve kullanım amacına göre orijinal marka ile uygun muadil seçenekler birlikte değerlendirilebilir.'],
    ['q' => 'Faturalı satış yapıyor musunuz?', 'a' => 'Evet. Kurumsal satın alma süreçlerine uygun faturalı satış ve teslimat akışı sağlanır.'],
];

$featuredGroupSlugs = [
    'ofis-kirtasiye',
    'kagit-urunleri',
    'toner-kartus',
    'dosyalama-urunleri',
    'arsivleme-urunleri',
    'bilgisayar-sarf',
    'ambalaj-sarf',
    'promosyon-urunleri',
];
$featuredGroups = array_values(array_filter(product_groups(), static fn (array $group): bool => in_array($group['slug'], $featuredGroupSlugs, true)));

$pageTitle = 'Kurumsal Kırtasiye Tedariki | Başarırlar Denizli B2B Teklif';
$pageDescription = "Şirketler, kamu kurumları ve sanayi işletmeleri için 10.000+ ürün, 100+ marka, toptan fiyat, faturalı satış ve 13:00'a kadar aynı gün teslimat destekli kurumsal kırtasiye tedariği.";
$pagePath = '';
$activePage = 'anasayfa';
$pageJsonLd = [faq_schema($homeFaqs)];
require __DIR__ . '/includes/header.php';
?>

<div class="home-page b2b-home">
    <section class="hero b2b-hero">
        <div class="container hero__content">
            <span class="hero-badge">B2B kurumsal kırtasiye tedariği</span>
            <h1>Kurumsal kırtasiye ihtiyaçlarınız için hızlı, faturalı ve düzenli tedarik çözümü</h1>
            <p>Şirketler, kamu kurumları ve sanayi işletmeleri için 10.000+ ürün, 100+ marka, toptan fiyat avantajı ve şehir içi hızlı teslimat desteği sunuyoruz.</p>
            <?= cta_group([
                'class' => 'hero__actions',
                'primary_label' => 'Ürün Listenizi Yükleyin',
                'secondary_label' => "WhatsApp'tan Liste Gönderin",
                'tertiary_label' => 'Ürün Gruplarını İncele',
                'tertiary_href' => url('urun-gruplari'),
                'track_category' => 'home_hero',
            ]); ?>
            <?= trust_metrics($homeMetrics, 'hero__facts'); ?>
        </div>
    </section>

    <section class="section quick-quote-section" aria-labelledby="hizli-teklif">
        <div class="container quick-quote">
            <div class="quick-quote__copy">
                <p class="eyebrow">Hızlı teklif kutusu</p>
                <h2 id="hizli-teklif">Ürün listeniz hazırsa süreç birkaç dakikada başlar.</h2>
                <ul class="quick-steps">
                    <li>Excel/PDF ürün listenizi gönderin.</li>
                    <li>Marka, adet ve teslimat beklentinizi belirtin.</li>
                    <li>Size özel kurumsal teklif hazırlayalım.</li>
                </ul>
            </div>
            <?= cta_group([
                'class' => 'quick-quote__actions',
                'primary_label' => 'Teklif Formuna Git',
                'secondary_label' => "WhatsApp'tan Liste Gönderin",
                'secondary_class' => 'btn--ghost',
                'track_category' => 'home_quick_quote',
            ]); ?>
        </div>
    </section>

    <section class="section" aria-labelledby="kime-hizmet">
        <div class="container">
            <div class="section-head">
                <div>
                    <p class="eyebrow">Kime hizmet veriyoruz?</p>
                    <h2 id="kime-hizmet">Perakende kalabalığı değil, kurumsal satın alma akışı.</h2>
                </div>
                <p>Her kurum tipi için amaç aynı: ürün listesini netleştirmek, faturalı teklifi hızlandırmak ve teslimatı planlamak.</p>
            </div>
            <div class="audience-grid audience-grid--six">
                <?php foreach ($homeAudiences as $audience): ?>
                    <article class="info-panel audience-card">
                        <h3><?= e($audience['title']); ?></h3>
                        <p><?= e($audience['text']); ?></p>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="section section--soft" aria-labelledby="urun-gruplari-baslik">
        <div class="container">
            <div class="section-head">
                <div>
                    <p class="eyebrow">Ürün grupları</p>
                    <h2 id="urun-gruplari-baslik">Satın alma listenizi doğru kategoriyle başlatın.</h2>
                </div>
                <a class="btn btn--ghost" href="<?= e(url('urun-gruplari')); ?>">Tüm Ürün Grupları</a>
            </div>
            <div class="product-grid product-grid--b2b">
                <?php foreach ($featuredGroups as $group): ?>
                    <?= product_group_card($group); ?>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="section" aria-labelledby="teslimat-servis">
        <div class="container service-model">
            <div class="service-model__content">
                <p class="eyebrow">Teslimat ve servis modeli</p>
                <h2 id="teslimat-servis">Kurumsal siparişlerde hızlı teklif, düzenli teslimat, faturalı süreç</h2>
                <p>Tek seferlik toplu alımdan düzenli ofis sarf tedariğine kadar siparişin fiyat, marka, teslimat ve muhasebe tarafını birlikte planlıyoruz.</p>
            </div>
            <ul class="service-model__list">
                <?php foreach ($homeServiceItems as $item): ?>
                    <li>
                        <strong><?= e($item['title']); ?></strong>
                        <span><?= e($item['text']); ?></span>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>

    <section class="section section--soft" aria-labelledby="marka-tedarik">
        <div class="container">
            <div class="section-head">
                <div>
                    <p class="eyebrow">Markalar ve tedarik gücü</p>
                    <h2 id="marka-tedarik">100+ marka ile standart ürün ve muadil seçenekleri aynı teklif akışında.</h2>
                </div>
                <a class="btn btn--ghost" href="<?= e(url('markalar')); ?>">Markaları Gör</a>
            </div>
            <div class="brand-proof">
                <?php foreach (array_slice(featured_brands(), 0, 10) as $brand): ?>
                    <div class="brand-card brand-card--ready">
                        <strong><?= e($brand['name']); ?></strong>
                        <span><?= e($brand['category']); ?></span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="section section--ink" aria-labelledby="teklif-sureci">
        <div class="container">
            <div class="section-head">
                <div>
                    <p class="eyebrow">Teklif süreci</p>
                    <h2 id="teklif-sureci">Dört adımda karşılaştırılabilir kurumsal teklif.</h2>
                </div>
            </div>
            <div class="process-grid process-grid--four">
                <div class="process-step"><span>1</span><h3>Listenizi gönderin</h3><p>Excel, PDF, fotoğraf veya WhatsApp ile ürün listenizi paylaşın.</p></div>
                <div class="process-step"><span>2</span><h3>Ürün ve marka eşleşsin</h3><p>Marka standardı, adet ve uygun muadil seçenekleri netleşsin.</p></div>
                <div class="process-step"><span>3</span><h3>Size özel teklif hazırlansın</h3><p>Toptan fiyat ve faturalı satış bilgileri teklif akışına işlensin.</p></div>
                <div class="process-step"><span>4</span><h3>Teslimat planlansın</h3><p>Şehir içi servis ve 13:00 aynı gün teslimat uygunluğu değerlendirilsin.</p></div>
            </div>
        </div>
    </section>

    <section class="section" aria-labelledby="sss">
        <div class="container">
            <div class="section-head">
                <div>
                    <p class="eyebrow">SSS</p>
                    <h2 id="sss">Satın alma ekiplerinin ilk sorduğu sorular.</h2>
                </div>
            </div>
            <div class="faq-list">
                <?php foreach ($homeFaqs as $i => $faq): ?>
                    <details class="faq-item"<?= $i === 0 ? ' open' : ''; ?>>
                        <summary><?= e($faq['q']); ?></summary>
                        <div class="faq-item__body"><p><?= e($faq['a']); ?></p></div>
                    </details>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="section section--soft" aria-labelledby="final-teklif">
        <div class="container">
            <div class="cta-band final-cta">
                <div>
                    <p class="eyebrow">Teklif alın</p>
                    <h2 id="final-teklif">Kurumsal kırtasiye ihtiyaçlarınız için teklif alın</h2>
                    <p>Ürün listenizi paylaşın; marka, adet, teslimat ve fatura beklentinize göre kurumsal teklif hazırlayalım.</p>
                </div>
                <?= cta_group([
                    'class' => 'cta-actions--light',
                    'primary_label' => 'Kurumsal Teklif Alın',
                    'secondary_label' => "WhatsApp'tan Liste Gönderin",
                    'secondary_class' => 'btn--ghost',
                    'track_category' => 'home_final',
                ]); ?>
            </div>
        </div>
    </section>
</div>

<?php require __DIR__ . '/includes/footer.php'; ?>
