<?php
require_once __DIR__ . '/includes/config.php';

$form = handle_form_submission('iletisim', [
    'firma' => 'Firma adı',
    'adsoyad' => 'Ad soyad',
    'telefon' => 'Telefon',
    'email' => 'E-posta',
    'mesaj' => 'Mesaj',
    'kvkk' => 'KVKK aydınlatma metni onayı',
], [
    'phone_fields' => ['telefon'],
    'labels' => [
        'firma' => 'Firma Adı',
        'adsoyad' => 'Ad Soyad',
        'telefon' => 'Telefon',
        'email' => 'E-posta',
        'mesaj' => 'Mesaj',
        'kvkk' => 'KVKK Onayı',
    ],
    'subject' => SITE_NAME . ' - İletişim Formu',
]);

$pageTitle = 'İletişim | Başarırlar Kurumsal Kırtasiye Denizli';
$pageDescription = 'Başarırlar Kurumsal Kırtasiye iletişim bilgileri: Dokuzkavaklar Mah. Ankara Bulvarı No:86 Pamukkale / Denizli. Telefon, WhatsApp, e-posta, çalışma saatleri ve yol tarifi.';
$pagePath = 'iletisim';
$activePage = 'iletisim';

$ico = [
    'phone' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2z"/></svg>',
    'whatsapp' => '<svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M19.05 4.94A9.82 9.82 0 0 0 12.04 2C6.6 2 2.17 6.43 2.17 11.87c0 1.74.46 3.44 1.32 4.94L2.09 22l5.34-1.4a9.86 9.86 0 0 0 4.61 1.17h.01c5.44 0 9.87-4.43 9.87-9.87 0-2.64-1.03-5.12-2.87-6.96zM12.05 20.1h-.01a8.2 8.2 0 0 1-4.18-1.15l-.3-.18-3.17.83.85-3.09-.2-.32a8.18 8.18 0 0 1-1.26-4.37c0-4.52 3.68-8.2 8.21-8.2a8.16 8.16 0 0 1 5.8 2.41 8.16 8.16 0 0 1 2.4 5.8c0 4.53-3.68 8.2-8.2 8.2zm4.5-6.14c-.25-.13-1.46-.72-1.68-.8-.23-.08-.39-.13-.56.12-.16.25-.64.8-.79.97-.14.16-.29.18-.54.06-.25-.12-1.04-.38-1.98-1.22-.73-.65-1.23-1.46-1.37-1.71-.14-.25-.02-.38.11-.51.11-.11.25-.29.37-.43.13-.14.17-.25.25-.41.08-.16.04-.31-.02-.43-.06-.12-.56-1.34-.76-1.84-.2-.48-.4-.42-.56-.42l-.48-.01c-.16 0-.43.06-.65.31-.22.25-.86.84-.86 2.05 0 1.21.88 2.38 1 2.54.12.16 1.74 2.65 4.2 3.72.59.25 1.04.4 1.4.52.59.18 1.12.16 1.54.1.47-.07 1.46-.6 1.66-1.17.2-.58.2-1.07.14-1.17-.06-.11-.22-.17-.47-.29z"/></svg>',
    'mail' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="m3 7 9 6 9-6"/></svg>',
    'pin' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 21s-7-6.3-7-11a7 7 0 0 1 14 0c0 4.7-7 11-7 11z"/><circle cx="12" cy="10" r="2.5"/></svg>',
    'clock' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3.5 2"/></svg>',
];

require __DIR__ . '/includes/header.php';
?>

<section class="page-hero contact-hero">
    <div class="container">
        <p class="eyebrow">İletişim</p>
        <h1>Kurumsal kırtasiye ihtiyaçlarınız için bize ulaşın.</h1>
        <p>Teklif, ürün bilgisi, teslimat planı veya toplu sipariş talepleriniz için telefon, WhatsApp, e-posta ya da iletişim formunu kullanabilirsiniz. Saat 13:00'a kadar verilen siparişler aynı gün teslim edilir.</p>
        <div class="hero__actions">
            <a class="btn" href="https://wa.me/<?= e(CONTACT_WHATSAPP_E164); ?>?text=Merhaba%2C%20kurumsal%20k%C4%B1rtasiye%20teklifi%20almak%20istiyorum." target="_blank" rel="noopener">WhatsApp'tan Yaz</a>
            <a class="btn btn--outline" href="<?= e(maps_directions_url()); ?>" target="_blank" rel="noopener">Yol Tarifi Al</a>
        </div>
    </div>
</section>

<section class="section contact-section">
    <div class="container contact-layout">
        <div>
            <div class="contact-tiles">
                <a class="contact-tile" href="tel:+902582634567">
                    <span class="contact-tile__icon"><?= $ico['phone']; ?></span>
                    <div>
                        <b>Telefon</b>
                        <p><?= e(CONTACT_PHONE); ?></p>
                    </div>
                </a>
                <a class="contact-tile contact-tile--wa" href="https://wa.me/<?= e(CONTACT_WHATSAPP_E164); ?>" target="_blank" rel="noopener">
                    <span class="contact-tile__icon"><?= $ico['whatsapp']; ?></span>
                    <div>
                        <b>WhatsApp</b>
                        <p><?= e(CONTACT_WHATSAPP); ?></p>
                    </div>
                </a>
                <a class="contact-tile" href="mailto:<?= e(CONTACT_EMAIL); ?>">
                    <span class="contact-tile__icon"><?= $ico['mail']; ?></span>
                    <div>
                        <b>E-posta</b>
                        <p><?= e(CONTACT_EMAIL); ?></p>
                    </div>
                </a>
                <a class="contact-tile" href="<?= e(maps_place_url()); ?>" target="_blank" rel="noopener">
                    <span class="contact-tile__icon"><?= $ico['pin']; ?></span>
                    <div>
                        <b>Adres</b>
                        <p><?= e(CONTACT_ADDRESS); ?></p>
                    </div>
                </a>
            </div>
            <div class="hours-panel">
                <span class="hours-panel__icon"><?= $ico['clock']; ?></span>
                <div>
                    <b>Çalışma Saatleri</b>
                    <p><?= e(WORKING_HOURS_WEEK); ?></p>
                    <p class="hours-panel__note"><?= e(WORKING_HOURS_SAME_DAY); ?></p>
                </div>
            </div>
        </div>
        <form class="form-panel" method="post" action="<?= e(url('iletisim')); ?>" data-validate novalidate>
            <input type="hidden" name="form_key" value="iletisim">
            <div class="honeypot">
                <label>Web site <input type="text" name="website" tabindex="-1" autocomplete="off"></label>
            </div>
            <h2>Bize mesaj gönderin</h2>
            <p class="form-panel__lead">Tüm alanları doldurun; en kısa sürede size dönüş yapalım.</p>
            <?php if ($form['status'] === 'success'): ?>
                <div class="alert alert--success">Mesajınız alındı. En kısa sürede size dönüş yapacağız.</div>
            <?php elseif ($form['status'] === 'error'): ?>
                <div class="alert alert--error"><?= e(implode(' ', $form['errors'])); ?></div>
            <?php endif; ?>
            <div class="form-grid">
                <div class="field field--full">
                    <label for="firma">Firma adı <span class="req">*</span></label>
                    <input id="firma" name="firma" value="<?= old_value($form, 'firma'); ?>" required>
                </div>
                <div class="field">
                    <label for="adsoyad">Ad soyad <span class="req">*</span></label>
                    <input id="adsoyad" name="adsoyad" value="<?= old_value($form, 'adsoyad'); ?>" required>
                </div>
                <div class="field">
                    <label for="telefon">Telefon <span class="req">*</span></label>
                    <input id="telefon" name="telefon" type="tel" inputmode="tel" data-phone
                           value="<?= old_value($form, 'telefon'); ?>"
                           placeholder="05XX XXX XX XX"
                           pattern="0[2-5][0-9]{2}\s?[0-9]{3}\s?[0-9]{2}\s?[0-9]{2}"
                           title="Geçerli bir TR telefon numarası girin (örn. 0532 123 45 67)" required>
                </div>
                <div class="field field--full">
                    <label for="email">E-posta <span class="req">*</span></label>
                    <input id="email" name="email" type="email" value="<?= old_value($form, 'email'); ?>" required>
                </div>
                <div class="field field--full">
                    <label for="mesaj">Mesaj <span class="req">*</span></label>
                    <textarea id="mesaj" name="mesaj" required><?= old_value($form, 'mesaj'); ?></textarea>
                </div>
                <div class="field field--full">
                    <label class="check-label">
                        <input type="checkbox" name="kvkk" value="1"<?= ($form['old']['kvkk'] ?? '') === '1' ? ' checked' : ''; ?> required>
                        <span><a href="<?= e(url('kvkk')); ?>" data-kvkk-open>KVKK Aydınlatma Metni</a>'ni okudum; kişisel verilerimin işlenmesini kabul ediyorum.</span>
                    </label>
                </div>
            </div>
            <button class="btn" type="submit">Mesaj Gönder</button>
        </form>
    </div>
</section>

<section class="section section--soft">
    <div class="container">
        <div class="section-head">
            <div>
                <p class="eyebrow">Konum & Ulaşım</p>
                <h2>Mağazamıza bekleriz</h2>
            </div>
            <a class="btn btn--ghost" href="<?= e(maps_directions_url()); ?>" target="_blank" rel="noopener">Yol Tarifi Al</a>
        </div>
        <div class="map-wrap">
            <iframe class="map-frame" src="<?= e(maps_embed_url()); ?>" loading="lazy" referrerpolicy="no-referrer-when-downgrade" title="Başarırlar Kurumsal Kırtasiye konum haritası" allowfullscreen></iframe>
        </div>
    </div>
</section>

<?php require __DIR__ . '/includes/kvkk-modal.php'; ?>
<?php require __DIR__ . '/includes/footer.php'; ?>
