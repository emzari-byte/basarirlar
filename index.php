<?php
require_once __DIR__ . '/includes/config.php';

$pageTitle = "Başarırlar Kurumsal Kırtasiye | Denizli'nin En Büyük Kurumsal Kırtasiyesi";
$pageDescription = "Başarırlar Kurumsal Kırtasiye, Denizli'nin en büyük kurumsal kırtasiyesi. 10.000+ ürün, 100+ marka, hafta içi her gün şehir içi servis ve saat 13:00'a kadar aynı gün teslimat.";
$pagePath = '';
$activePage = 'anasayfa';
$pageJsonLd = [faq_schema()];
require __DIR__ . '/includes/header.php';
?>

<section class="hero">
    <div class="container hero__content">
        <span class="hero-badge">Toptan &amp; Proje Bazlı Tedarik</span>
        <h1>Kurumsal alımlarınızda <span class="accent">toptan fiyatın</span> rahatlığı.</h1>
        <p>Listenizi iletin, size özel teklifimizi hazırlayalım; toptan fiyat avantajını birlikte görelim. Şirketler, kamu kurumları ve sanayi işletmeleri için 10.000+ ürün ve düzenli şehir içi servis.</p>
        <div class="hero__actions">
            <a class="btn" href="<?= e(url('teklif-al')); ?>">Teklif Alın</a>
            <a class="btn btn--outline" href="<?= e(url('urun-gruplari')); ?>">Ürün Grupları</a>
        </div>
        <ul class="hero-trust" aria-label="Kurumsal avantajlar">
            <li>Toptan &amp; kurumsal fiyat</li>
            <li>Aynı gün teslimat</li>
            <li>Faturalı satış</li>
        </ul>
        <div class="hero__facts" aria-label="Rakamlarla Başarırlar">
            <div class="fact">
                <strong>10.000<em>+</em></strong>
                <span>kalem ürün çeşidi</span>
            </div>
            <div class="fact">
                <strong>100<em>+</em></strong>
                <span>güçlü marka</span>
            </div>
            <div class="fact">
                <strong>13:00<em>'a kadar</em></strong>
                <span>aynı gün teslimat</span>
            </div>
        </div>
    </div>
</section>

<section class="section mobile-hide">
    <div class="container">
        <div class="section-head">
            <div>
                <p class="eyebrow">Kurumsal güven</p>
                <h2>Satın alma sürecinizi hızlandıran tedarik yapısı</h2>
            </div>
            <p>Tekil ürün aramak yerine kurumsal ihtiyaç listesini tek noktadan toparlayan, tekliflendiren ve teslimat düzenini takip eden pratik bir çalışma modeli.</p>
        </div>
        <div class="trust-grid">
            <?php foreach (['Hızlı tedarik', 'Geniş ürün yelpazesi', 'Toplu sipariş desteği', 'Düzenli servis', 'Kurumsal faturalandırma'] as $item): ?>
                <div class="trust-item">
                    <b><?= e($item); ?></b>
                    <p>Kuruma özel ihtiyaç planına göre teklif, ürün muadili ve teslimat takibi yapılır.</p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section section--soft mobile-hide">
    <div class="container">
        <div class="section-head">
            <div>
                <p class="eyebrow">Bireysel mi, kurumsal mı?</p>
                <h2>Kurumsal alışverişin avantajını görün</h2>
            </div>
            <p>Tek tek perakende alımla, kurumsal toptan tedarik aynı şey değildir. İşletmeniz için doğru kanalı seçtiğinizde hem fiyat hem de zaman kazanırsınız.</p>
        </div>
        <div class="compare-grid">
            <article class="compare-card">
                <span class="compare-card__tag">Bireysel / Perakende</span>
                <h3>Tek tek, raf fiyatına alım</h3>
                <ul class="compare-list compare-list--muted">
                    <li>Küçük adetler ve günlük bireysel ihtiyaçlar</li>
                    <li>Perakende fiyat üzerinden satış</li>
                    <li>Sipariş ve teslimatı kendiniz takip edersiniz</li>
                </ul>
            </article>
            <article class="compare-card compare-card--featured">
                <span class="compare-card__tag">Kurumsal &amp; Toptan · Önerilen</span>
                <h3>İşletmenize özel toptan tedarik</h3>
                <ul class="compare-list">
                    <li>Toptan ve proje bazlı, kuruma özel fiyat</li>
                    <li>Faturalı satış ve düzenli tedarik planı</li>
                    <li>Hafta içi her gün servis · 13:00'a kadar aynı gün teslimat</li>
                    <li>Tek noktadan 10.000+ ürün, 100+ marka</li>
                </ul>
                <a class="btn" href="<?= e(url('teklif-al')); ?>">Kurumunuz İçin Teklif Alın</a>
            </article>
        </div>
    </div>
</section>

<section class="section mobile-hide">
    <div class="container">
        <div class="section-head">
            <div>
                <p class="eyebrow">Özel hizmetler</p>
                <h2>Sadece satmıyoruz; kapınıza kadar getiriyoruz.</h2>
            </div>
            <p>Kurumsal müşterilerimize sunduğumuz servis ve teslimat ayrıcalıkları, kırtasiye ihtiyacınızı operasyonunuzu hiç aksatmadan yönetmenizi sağlar.</p>
        </div>
        <div class="special-grid">
            <?php foreach (special_services() as $svc): ?>
                <article class="special-card">
                    <span class="special-card__icon"><?= service_icon($svc['icon']); ?></span>
                    <h3><?= e($svc['title']); ?></h3>
                    <p><?= e($svc['text']); ?></p>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section mobile-keep">
    <div class="container">
        <div class="delivery-band">
            <div class="delivery-band__clock">13:00<span>SON SİPARİŞ</span></div>
            <div>
                <h2>Saat 13:00'a kadar verin, bugün teslim alın.</h2>
                <p>Hafta içi her gün şehir içi servisimizle siparişiniz aynı gün ofisinizde. Acil ihtiyaçlarınızda işiniz beklemez.</p>
            </div>
            <a class="btn" href="<?= e(url('hizmetlerimiz')); ?>">Servis Detayları</a>
        </div>
    </div>
</section>

<section class="section section--soft">
    <div class="container">
        <div class="section-head">
            <div>
                <p class="eyebrow">Ürün grupları</p>
                <h2>Şirket ve kurum ihtiyaçları için geniş ürün kapsamı</h2>
            </div>
            <a class="btn btn--ghost" href="<?= e(url('urun-gruplari')); ?>">Tümünü Gör</a>
        </div>
        <div class="product-grid">
            <?php foreach (array_slice(product_groups(), 0, 8) as $group): ?>
                <article class="card" id="<?= e($group['slug']); ?>">
                    <div class="card__image">
                        <img src="<?= e($group['image']); ?>" alt="<?= e($group['title']); ?>" loading="lazy">
                    </div>
                    <div class="card__body">
                        <h3><?= e($group['title']); ?></h3>
                        <p><?= e($group['summary']); ?></p>
                        <a class="card__link" href="<?= e(url('urun-gruplari#' . $group['slug'])); ?>">Detayları incele</a>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section mobile-hide">
    <div class="container">
        <div class="section-head">
            <div>
                <p class="eyebrow">Markalar</p>
                <h2>Sektörün öncü markaları stoklarımızda</h2>
            </div>
            <a class="btn btn--ghost" href="<?= e(url('markalar')); ?>">Tüm Markalar</a>
        </div>
    </div>
    <div class="brand-marquee" aria-label="Çalıştığımız markalar">
        <div class="brand-track">
            <?php $allBrands = array_merge(brands(), brands()); ?>
            <?php foreach ($allBrands as $brand): ?>
                <span class="brand-chip"><?= e($brand); ?></span>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section section--soft mobile-hide">
    <div class="container split">
        <div>
            <p class="eyebrow">Neden Başarırlar?</p>
            <h2>İhtiyaç listeniz netleşir, teklif süreci düzenlenir, teslimat akışı takip edilir.</h2>
            <p>Kurumsal kırtasiye tedariğinde amaç yalnızca ürün satışı değil; satın alma ekibinin zamanını koruyan, stok sürekliliğini destekleyen ve ihtiyaç tekrarlarını azaltan bir sistem kurmaktır.</p>
            <ul class="check-list">
                <li>Şirket ve kamu kurumlarının toplu sipariş süreçlerine uygun teklif düzeni.</li>
                <li>Ürün muadili, marka standardı ve miktar planı için pratik danışmanlık.</li>
                <li>Faturalı satış, düzenli servis ve kuruma özel teslimat planı.</li>
            </ul>
        </div>
        <div class="split__media">
            <img src="<?= e(asset('images/products/dosyalama.jpg')); ?>" alt="Kurumsal dosyalama ve ofis kırtasiye ürünleri" loading="lazy">
        </div>
    </div>
</section>

<section class="section section--ink mobile-hide">
    <div class="container">
        <div class="section-head">
            <div>
                <p class="eyebrow">Teklif süreci</p>
                <h2>Kurumsal talepler için sade ve izlenebilir akış</h2>
            </div>
        </div>
        <div class="process-grid">
            <?php foreach (['İhtiyaç listesi alınır', 'Ürün ve muadil kontrolü yapılır', 'Teklif ve teslimat planı paylaşılır'] as $index => $step): ?>
                <div class="process-step">
                    <span><?= $index + 1; ?></span>
                    <h3><?= e($step); ?></h3>
                    <p>Talep edilen ürün, adet ve teslimat beklentisi netleştiğinde satın alma süreci gereksiz yazışmalardan arındırılır.</p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="price-ask">
            <div>
                <p class="eyebrow">Kurumsal müşterilerimize bir hatırlatma</p>
                <h2>Bize fiyat sormadan kırtasiye almaya karar vermeyin.</h2>
                <p>Denizli'nin en büyük kurumsal kırtasiyesi olarak güçlü stok, doğrudan marka tedariği ve toplu sipariş avantajıyla rakipsiz fiyat veriyoruz. Bir telefon, kurumunuzun bütçesini fark ettirir.</p>
            </div>
            <a class="btn btn--light" href="<?= e(url('teklif-al')); ?>">Fiyat Teklifi İste</a>
        </div>
    </div>
</section>

<section class="section section--soft mobile-hide">
    <div class="container">
        <div class="section-head">
            <div>
                <p class="eyebrow">Çalışılan sektörler</p>
                <h2>Ofislerden sanayi işletmelerine kadar farklı ihtiyaçlara uyum</h2>
            </div>
        </div>
        <div class="info-grid">
            <?php foreach (['Özel şirketler', 'Kamu kurumları', 'Sağlık kuruluşları', 'Organize sanayi işletmeleri', 'Muhasebe ve hukuk ofisleri', 'Üretim ve depo ekipleri'] as $sector): ?>
                <div class="info-panel">
                    <h3><?= e($sector); ?></h3>
                    <p>Departman bazlı ürün listeleri, sarf malzeme takibi ve dönemsel teslimat planlarıyla desteklenir.</p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section mobile-hide">
    <div class="container">
        <div class="section-head">
            <div>
                <p class="eyebrow">Sık sorulan sorular</p>
                <h2>Kurumsal kırtasiye tedariği hakkında merak edilenler</h2>
            </div>
            <p>Aklınıza takılan başka bir soru varsa <a class="inline-link" href="<?= e(url('iletisim')); ?>">bize ulaşın</a>; hızlıca yanıtlayalım.</p>
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

<section class="section">
    <div class="container">
        <div class="cta-band">
            <div>
                <h2>Kurumunuz için düzenli kırtasiye tedarik planı oluşturalım.</h2>
                <p>Ürün listenizi, tahmini adetleri ve teslimat beklentinizi iletin; size uygun kurumsal teklif akışını hazırlayalım.</p>
            </div>
            <a class="btn btn--light" href="<?= e(url('teklif-al')); ?>">Teklif Formuna Git</a>
        </div>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
