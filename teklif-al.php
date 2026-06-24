<?php
require_once __DIR__ . '/includes/config.php';

$form = handle_form_submission('teklif', [
    'firma' => 'Firma adı',
    'yetkili' => 'Yetkili adı soyadı',
    'telefon' => 'Telefon',
    'email' => 'E-posta',
    'urun_grubu' => 'Ürün grubu',
    'kvkk' => 'KVKK aydınlatma metni onayı',
], [
    'phone_fields' => ['telefon'],
    'file_field' => 'ekler',
    'labels' => [
        'firma' => 'Firma Adı',
        'yetkili' => 'Yetkili Adı Soyadı',
        'telefon' => 'Telefon',
        'email' => 'E-posta',
        'urun_grubu' => 'İlgilendiğiniz Ürün Grubu',
        'aciklama' => 'Açıklama',
        'kvkk' => 'KVKK Onayı',
    ],
    'subject' => SITE_NAME . ' - Teklif Talebi',
    'redirect' => url('tesekkurler'),
]);

if ($form['status'] === 'idle' && !empty($_GET['urun_grubu'])) {
    $form['old']['urun_grubu'] = clean_input($_GET['urun_grubu']);
}

$pageTitle = 'Teklif Al | Kurumsal Kırtasiye Teklif Formu';
$pageDescription = 'Başarırlar Kurumsal Kırtasiye teklif formu ile firma bilgilerinizi iletip ilgilendiğiniz ürün grubunu seçerek hızlıca kurumsal teklif alın.';
$pagePath = 'teklif-al';
$activePage = '';
require __DIR__ . '/includes/header.php';
?>

<section class="page-hero quote-hero">
    <div class="container">
        <p class="eyebrow">Teklif al</p>
        <h1>Listenizi yükleyin, kurumsal teklif sürecini başlatalım.</h1>
        <p>Excel, PDF, fotoğraf veya düz metin listenizi paylaşın. Ürün grubu, adet, marka tercihi ve teslimat beklentisine göre faturalı teklif hazırlayalım.</p>
        <div class="hero__actions">
            <a class="btn" href="#teklif-formu">Ürün Listesi Yükle</a>
            <a class="btn btn--outline" href="https://wa.me/<?= e(CONTACT_WHATSAPP_E164); ?>?text=Merhaba%2C%20%C3%BCr%C3%BCn%20listemi%20payla%C5%9F%C4%B1p%20kurumsal%20teklif%20almak%20istiyorum." target="_blank" rel="noopener" data-track="whatsapp_click">WhatsApp'tan Liste Gönder</a>
        </div>
    </div>
</section>

<section class="section quote-section">
    <div class="container form-layout">
        <aside class="info-panel">
            <h2>Teklif süreci</h2>
            <p>Talebiniz alındıktan sonra ürün grupları, miktarlar, marka tercihleri ve teslimat beklentisi değerlendirilir.</p>
            <ul class="check-list">
                <li>Excel, PDF, fotoğraf veya metin listeniz kontrol edilir.</li>
                <li>Marka standardı ve uygun muadil seçenekleri netleştirilir.</li>
                <li>13:00 öncesi uygun siparişlerde aynı gün teslimat planı değerlendirilir.</li>
            </ul>
            <div class="quote-help">
                <b>Liste hazır değilse sorun değil.</b>
                <span>Ürün grubunu seçip kısa açıklama yazmanız da ön teklif için yeterlidir.</span>
            </div>
        </aside>
        <form class="form-panel" id="teklif-formu" method="post" action="<?= e(url('teklif-al')); ?>" enctype="multipart/form-data" data-validate data-track-submit="quote_form_submit" novalidate>
            <input type="hidden" name="form_key" value="teklif">
            <div class="honeypot">
                <label>Web site <input type="text" name="website" tabindex="-1" autocomplete="off"></label>
            </div>
            <h2>Kurumsal teklif formu</h2>
            <p class="form-panel__lead">En hızlı dönüş için ürün listenizi dosya olarak ekleyin; liste yoksa açıklama alanına ürün ve adetleri yazın.</p>
            <?php if ($form['status'] === 'success'): ?>
                <div class="alert alert--success">Talebiniz alındı. En kısa sürede sizinle iletişime geçeceğiz.</div>
            <?php elseif ($form['status'] === 'error'): ?>
                <div class="alert alert--error"><?= e(implode(' ', $form['errors'])); ?></div>
            <?php endif; ?>
            <div class="form-grid">
                <div class="field">
                    <label for="firma">Firma adı</label>
                    <input id="firma" name="firma" value="<?= old_value($form, 'firma'); ?>" required>
                </div>
                <div class="field">
                    <label for="yetkili">Yetkili adı soyadı</label>
                    <input id="yetkili" name="yetkili" value="<?= old_value($form, 'yetkili'); ?>" required>
                </div>
                <div class="field">
                    <label for="telefon">Telefon</label>
                    <input id="telefon" name="telefon" type="tel" inputmode="tel" data-phone
                           value="<?= old_value($form, 'telefon'); ?>"
                           placeholder="05XX XXX XX XX"
                           pattern="0[2-5][0-9]{2}\s?[0-9]{3}\s?[0-9]{2}\s?[0-9]{2}"
                           title="Geçerli bir TR telefon numarası girin (örn. 0532 123 45 67)" required>
                </div>
                <div class="field">
                    <label for="email">E-posta</label>
                    <input id="email" name="email" type="email" value="<?= old_value($form, 'email'); ?>" required>
                </div>
                <div class="field field--full">
                    <label for="urun_grubu">İlgilendiğiniz ürün grubu</label>
                    <?php $selectedGroup = $form['old']['urun_grubu'] ?? ''; ?>
                    <select id="urun_grubu" name="urun_grubu" required>
                        <option value="" disabled<?= $selectedGroup === '' ? ' selected' : ''; ?>>Seçiniz...</option>
                        <?php foreach (product_groups() as $group): ?>
                            <option value="<?= e($group['title']); ?>"<?= $selectedGroup === $group['title'] ? ' selected' : ''; ?>><?= e($group['title']); ?></option>
                        <?php endforeach; ?>
                        <option value="Birden fazla ürün grubu"<?= $selectedGroup === 'Birden fazla ürün grubu' ? ' selected' : ''; ?>>Birden fazla ürün grubu</option>
                        <option value="Diğer / Belirtmek istiyorum"<?= $selectedGroup === 'Diğer / Belirtmek istiyorum' ? ' selected' : ''; ?>>Diğer / Belirtmek istiyorum</option>
                    </select>
                </div>
                <div class="field field--full">
                    <label for="aciklama">Ürün ve teslimat notu <span class="field-hint">(ürün, adet, marka tercihi, teslimat beklentisi)</span></label>
                    <textarea id="aciklama" name="aciklama" placeholder="Örn. A4 fotokopi kağıdı 20 koli, mavi klasör 100 adet, toner modeli..., 13:00 sonrası teslimat notu..."><?= old_value($form, 'aciklama'); ?></textarea>
                </div>
                <div class="field field--full">
                    <label for="ekler">Ürün listenizi yükleyin <span class="field-hint">(Excel, PDF, fotoğraf · en fazla 5 dosya, 8 MB)</span></label>
                    <input id="ekler" name="ekler[]" type="file" multiple data-file-limit="5" data-file-max-size="8388608" data-track-change="quote_file_upload"
                           accept=".jpg,.jpeg,.png,.gif,.webp,.heic,.heif,.pdf,.doc,.docx,.xls,.xlsx,.csv,.txt,image/*,application/pdf">
                    <small class="field-help">Satın alma listenizi aynen ekleyebilirsiniz; ürünleri tek tek seçmeniz gerekmez.</small>
                </div>
                <div class="field field--full">
                    <label class="check-label">
                        <input type="checkbox" name="kvkk" value="1"<?= ($form['old']['kvkk'] ?? '') === '1' ? ' checked' : ''; ?> required>
                        <span><a href="<?= e(url('kvkk')); ?>" data-kvkk-open>KVKK Aydınlatma Metni</a>'ni okudum; kişisel verilerimin işlenmesini kabul ediyorum.</span>
                    </label>
                </div>
            </div>
            <button class="btn" type="submit">Kurumsal Teklifimi İste</button>
        </form>
    </div>
</section>

<?php require __DIR__ . '/includes/kvkk-modal.php'; ?>
<?php require __DIR__ . '/includes/footer.php'; ?>
