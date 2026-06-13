    </main>
    <footer class="site-footer">
        <div class="container footer-grid">
            <div class="footer-brand">
                <img src="<?= e(asset('images/basarirlar-logo.png')); ?>" alt="<?= e(SITE_NAME); ?>" width="750" height="182">
                <p>Özel şirketlerden kamu kurumlarına, sanayi işletmelerinden ofislere kadar kurumsal kırtasiye ve sarf malzeme ihtiyaçları için düzenli tedarik çözümleri.</p>
            </div>
            <div>
                <h2>Sayfalar</h2>
                <ul class="footer-links">
                    <?php foreach (array_slice(nav_items(), 1, 5) as $item): ?>
                        <li><a href="<?= e($item['href']); ?>"><?= e($item['label']); ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div>
                <h2>Ürün Grupları</h2>
                <ul class="footer-links">
                    <li><a href="<?= e(url('urun-gruplari#ofis-kirtasiye')); ?>">Ofis Kırtasiye</a></li>
                    <li><a href="<?= e(url('urun-gruplari#kagit-urunleri')); ?>">Kağıt Ürünleri</a></li>
                    <li><a href="<?= e(url('urun-gruplari#dosyalama')); ?>">Dosyalama</a></li>
                    <li><a href="<?= e(url('urun-gruplari#ambalaj-sarf')); ?>">Ambalaj ve Sarf</a></li>
                </ul>
            </div>
            <div>
                <h2>İletişim</h2>
                <address>
                    <?= e(CONTACT_ADDRESS); ?><br>
                    <a href="tel:+902582634567"><?= e(CONTACT_PHONE); ?></a><br>
                    <a href="tel:+<?= e(CONTACT_WHATSAPP_E164); ?>"><?= e(CONTACT_WHATSAPP); ?></a><br>
                    <a href="mailto:<?= e(CONTACT_EMAIL); ?>"><?= e(CONTACT_EMAIL); ?></a>
                </address>
                <p class="footer-social__label">Bizi takip edin</p>
                <a class="footer-social" href="<?= e(SOCIAL_INSTAGRAM); ?>" target="_blank" rel="noopener" aria-label="Instagram'da Başarırlar Kurumsal Kırtasiye">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4"/><circle cx="17.5" cy="6.5" r="1" fill="currentColor" stroke="none"/></svg>
                    <span>@basarirlar_kurumsal_kirtasiye</span>
                </a>
            </div>
        </div>
        <div class="container footer-bottom">
            <span>© <?= date('Y'); ?> <?= e(COMPANY_NAME); ?></span>
            <ul class="footer-legal">
                <?php foreach (legal_nav() as $legal): ?>
                    <li><a href="<?= e($legal['href']); ?>"><?= e($legal['label']); ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
    </footer>
    <div class="cookie-bar" data-cookie-bar hidden>
        <p>Web sitemizde sitenin düzgün çalışması için zorunlu çerezler kullanılır. Ayrıntılar için <a href="<?= e(url('cerez-politikasi')); ?>">Çerez Politikası</a>'nı inceleyebilirsiniz.</p>
        <button type="button" class="btn" data-cookie-accept>Anladım</button>
    </div>
    <a class="whatsapp-float" href="https://wa.me/<?= e(CONTACT_WHATSAPP_E164); ?>?text=Merhaba%2C%20kurumsal%20k%C4%B1rtasiye%20teklifi%20almak%20istiyorum." target="_blank" rel="noopener" aria-label="WhatsApp ile yazın">
        <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M19.05 4.94A9.82 9.82 0 0 0 12.04 2C6.6 2 2.17 6.43 2.17 11.87c0 1.74.46 3.44 1.32 4.94L2.09 22l5.34-1.4a9.86 9.86 0 0 0 4.61 1.17h.01c5.44 0 9.87-4.43 9.87-9.87 0-2.64-1.03-5.12-2.87-6.96zM12.05 20.1h-.01a8.2 8.2 0 0 1-4.18-1.15l-.3-.18-3.17.83.85-3.09-.2-.32a8.18 8.18 0 0 1-1.26-4.37c0-4.52 3.68-8.2 8.21-8.2a8.16 8.16 0 0 1 5.8 2.41 8.16 8.16 0 0 1 2.4 5.8c0 4.53-3.68 8.2-8.2 8.2zm4.5-6.14c-.25-.13-1.46-.72-1.68-.8-.23-.08-.39-.13-.56.12-.16.25-.64.8-.79.97-.14.16-.29.18-.54.06-.25-.12-1.04-.38-1.98-1.22-.73-.65-1.23-1.46-1.37-1.71-.14-.25-.02-.38.11-.51.11-.11.25-.29.37-.43.13-.14.17-.25.25-.41.08-.16.04-.31-.02-.43-.06-.12-.56-1.34-.76-1.84-.2-.48-.4-.42-.56-.42l-.48-.01c-.16 0-.43.06-.65.31-.22.25-.86.84-.86 2.05 0 1.21.88 2.38 1 2.54.12.16 1.74 2.65 4.2 3.72.59.25 1.04.4 1.4.52.59.18 1.12.16 1.54.1.47-.07 1.46-.6 1.66-1.17.2-.58.2-1.07.14-1.17-.06-.11-.22-.17-.47-.29z"/></svg>
    </a>
    <script src="<?= e(versioned_asset('js/main.js')); ?>" defer></script>
</body>
</html>
