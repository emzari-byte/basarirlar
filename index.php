<?php
require_once __DIR__ . '/includes/config.php';

$pageTitle = "Başarırlar Kurumsal Kırtasiye | Denizli B2B Kırtasiye Teklif";
$pageDescription = "Denizli'nin en büyük kurumsal kırtasiyesi. 40+ yıl tedarik tecrübesi, 10.000+ ürün, 100+ marka, faturalı satış ve 13:00'a kadar aynı gün teslimat.";
$pagePath = '';
$activePage = 'anasayfa';
$pageJsonLd = [faq_schema()];
require __DIR__ . '/includes/header.php';
?>

<div class="home-page b2b-home">
    <section class="hero b2b-hero">
        <div class="container hero__content">
            <span class="hero-badge">Denizli B2B kırtasiye tedariği</span>
            <h1>Kurumunuzun kırtasiye listesini gönderin, <span class="accent">toptan teklifinizi</span> hazırlayalım.</h1>
            <p>Şirketler, kamu kurumları ve sanayi işletmeleri için 10.000+ ürün, 100+ marka, faturalı satış ve hafta içi şehir içi servis.</p>
            <div class="hero__actions">
                <a class="btn" href="<?= e(url('teklif-al')); ?>">Teklif Listesi Gönder</a>
                <a class="btn btn--outline" href="https://wa.me/<?= e(CONTACT_WHATSAPP_E164); ?>?text=Merhaba%2C%20kurumsal%20k%C4%B1rtasiye%20teklifi%20almak%20istiyorum." target="_blank" rel="noopener" data-track="whatsapp_click">WhatsApp'tan Yaz</a>
            </div>
            <ul class="hero-trust" aria-label="Kurumsal avantajlar">
                <li>Toptan ve proje bazlı fiyat</li>
                <li>Faturalı satış</li>
                <li>13:00’a kadar aynı gün teslimat</li>
            </ul>
        </div>
    </section>

    <section class="section quick-quote-section">
        <div class="container quick-quote">
            <div class="quick-quote__copy">
                <p class="eyebrow">Hızlı teklif</p>
                <h2>Ürün listeniz hazırsa beklemeyin.</h2>
                <p>Excel, PDF veya fotoğraf listenizi forma ekleyin; fiyat, muadil ürün ve teslimat planı için dönüş yapalım.</p>
            </div>
            <div class="quick-quote__actions">
                <a class="btn" href="<?= e(url('teklif-al')); ?>">Dosya Yükleyerek Teklif Al</a>
                <a class="btn btn--ghost" href="https://wa.me/<?= e(CONTACT_WHATSAPP_E164); ?>?text=Merhaba%2C%20%C3%BCr%C3%BCn%20listemi%20payla%C5%9F%C4%B1p%20kurumsal%20teklif%20almak%20istiyorum." target="_blank" rel="noopener" data-track="whatsapp_click">WhatsApp ile Gönder</a>
            </div>
        </div>
    </section>

    <section class="section section--soft">
        <div class="container metric-grid">
            <div class="metric-card"><strong>40+</strong><span>yıl tedarik tecrübesi</span></div>
            <div class="metric-card"><strong>10.000+</strong><span>ürün çeşidi</span></div>
            <div class="metric-card"><strong>100+</strong><span>güçlü marka</span></div>
            <div class="metric-card"><strong>13:00</strong><span>aynı gün teslimat sınırı</span></div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="section-head">
                <div>
                    <p class="eyebrow">Kime hizmet veriyoruz?</p>
                    <h2>Perakende kalabalığı yok; kurumsal satın alma odağı var.</h2>
                </div>
                <p>Tek hedefimiz kurumların tekrar eden kırtasiye, kağıt, toner ve sarf ihtiyaçlarını daha hızlı, ölçülebilir ve faturalı hale getirmek.</p>
            </div>
            <div class="audience-grid">
                <article class="info-panel">
                    <h3>Şirketler</h3>
                    <p>Departman bazlı ofis sarf listeleri, aylık tekrar eden alımlar ve yeni ofis kurulumları için.</p>
                </article>
                <article class="info-panel">
                    <h3>Kamu kurumları</h3>
                    <p>Faturalı satış, ürün standardı ve toplu alım süreçlerine uygun net teklif akışı için.</p>
                </article>
                <article class="info-panel">
                    <h3>Sanayi işletmeleri</h3>
                    <p>Organize ve çevre sanayi sitelerine planlı şehir içi servis ve operasyon sarf tedariği için.</p>
                </article>
            </div>
        </div>
    </section>

    <section class="section section--soft">
        <div class="container">
            <div class="section-head">
                <div>
                    <p class="eyebrow">Ürün grupları</p>
                    <h2>Satın alma listelerini kategori kategori netleştirin.</h2>
                </div>
                <a class="btn btn--ghost" href="<?= e(url('urun-gruplari')); ?>">Tüm Ürün Grupları</a>
            </div>
            <div class="product-grid">
                <?php foreach (array_slice(product_groups(), 0, 8) as $group): ?>
                    <article class="card" id="<?= e($group['slug']); ?>">
                        <a class="card__image" href="<?= e(url('urun-gruplari/' . $group['slug'])); ?>">
                            <img src="<?= e($group['image']); ?>" alt="<?= e($group['title']); ?> kurumsal ürün grubu" loading="lazy">
                        </a>
                        <div class="card__body">
                            <h3><?= e($group['title']); ?></h3>
                            <p><?= e($group['summary']); ?></p>
                            <a class="card__link" href="<?= e(url('urun-gruplari/' . $group['slug'])); ?>">Detayları incele</a>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container delivery-band">
            <div class="delivery-band__clock">13:00<span>SON SİPARİŞ</span></div>
            <div>
                <h2>Hafta içi şehir içi servis. 13:00’a kadar aynı gün teslimat.</h2>
                <p>Kağıt, toner, dosya, ambalaj veya acil ofis sarfı: uygun siparişler aynı gün teslimat planına alınır.</p>
            </div>
            <a class="btn" href="<?= e(url('hizmetlerimiz')); ?>">Servis Modeli</a>
        </div>
    </section>

    <section class="section section--soft">
        <div class="container">
            <div class="section-head">
                <div>
                    <p class="eyebrow">Markalar</p>
                    <h2>Bilinen markalar, gerektiğinde doğru muadil seçenekler.</h2>
                </div>
                <a class="btn btn--ghost" href="<?= e(url('markalar')); ?>">Markaları Gör</a>
            </div>
            <div class="brand-grid brand-grid--compact">
                <?php foreach (featured_brands() as $brand): ?>
                    <div class="brand-card"><?= e($brand['name']); ?></div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="section section--ink">
        <div class="container">
            <div class="section-head">
                <div>
                    <p class="eyebrow">Teklif süreci</p>
                    <h2>Üç adımda karşılaştırılabilir kurumsal teklif.</h2>
                </div>
            </div>
            <div class="process-grid">
                <div class="process-step"><span>1</span><h3>Listeyi gönderin</h3><p>Ürün, adet, marka ve teslimat beklentinizi form veya WhatsApp ile paylaşın.</p></div>
                <div class="process-step"><span>2</span><h3>Ürünler netleşsin</h3><p>Gerekirse muadil seçenek, stok ve fiyat avantajı birlikte değerlendirilir.</p></div>
                <div class="process-step"><span>3</span><h3>Teklif alın</h3><p>Faturalı satış ve teslimat planı ile kurumsal teklifiniz hazırlanır.</p></div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="section-head">
                <div>
                    <p class="eyebrow">SSS</p>
                    <h2>Satın alma ekiplerinin en çok sorduğu sorular.</h2>
                </div>
            </div>
            <div class="faq-list">
                <?php foreach (faqs() as $i => $faq): ?>
                    <details class="faq-item"<?= $i === 0 ? ' open' : ''; ?>>
                        <summary><?= e($faq['q']); ?></summary>
                        <div class="faq-item__body"><p><?= e($faq['a']); ?></p></div>
                    </details>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <section class="section section--soft">
        <div class="container">
            <div class="cta-band">
                <div>
                    <h2>Bize fiyat sormadan kırtasiye alımına karar vermeyin.</h2>
                    <p>Kurumsal listenizi gönderin; toptan ve proje bazlı fiyat avantajını birlikte görelim.</p>
                </div>
                <a class="btn btn--light" href="<?= e(url('teklif-al')); ?>">Teklif Formuna Git</a>
            </div>
        </div>
    </section>
</div>

<?php require __DIR__ . '/includes/footer.php'; ?>
