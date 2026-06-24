<header class="site-header" data-header>
    <div class="top-strip">
        <div class="container top-strip__inner">
            <span>Kurumsal teklif, faturalı satış ve 13:00'a kadar aynı gün teslimat desteği</span>
            <a href="tel:+902582634567" data-track="phone_click"><?= e(CONTACT_PHONE); ?></a>
            <a href="https://wa.me/<?= e(CONTACT_WHATSAPP_E164); ?>?text=<?= e(rawurlencode('Merhaba, kurumsal kırtasiye ürün listemi paylaşıp teklif almak istiyorum.')); ?>" target="_blank" rel="noopener" data-track="whatsapp_click">WhatsApp: <?= e(CONTACT_WHATSAPP); ?></a>
        </div>
    </div>
    <nav class="navbar" aria-label="Ana menü">
        <div class="container navbar__inner">
            <a class="brand" href="<?= e(url('')); ?>" aria-label="<?= e(SITE_NAME); ?>">
                <img src="<?= e(asset('images/basarirlar-logo.png')); ?>" alt="<?= e(SITE_NAME); ?>" width="750" height="182">
            </a>
            <button class="nav-toggle" type="button" aria-label="Menüyü aç" aria-expanded="false" aria-controls="site-menu" data-nav-toggle>
                <span></span>
                <span></span>
                <span></span>
            </button>
            <div class="nav-menu" id="site-menu" data-nav-menu>
                <?php
                $mobilePrimaryPages = ['anasayfa', 'urun-gruplari', 'hizmetlerimiz', 'iletisim'];
                foreach (nav_items() as $key => $item):
                    $classes = [];
                    if ($activePage === $key) {
                        $classes[] = 'is-active';
                    }
                    if (!in_array($key, $mobilePrimaryPages, true)) {
                        $classes[] = 'is-mobile-secondary';
                    }
                ?>
                    <a class="<?= e(implode(' ', $classes)); ?>" href="<?= e($item['href']); ?>"><?= e($item['label']); ?></a>
                <?php endforeach; ?>
                <a class="nav-menu__quote" href="<?= e(url('teklif-al')); ?>" data-track="category_quote_click" data-category="header">Kurumsal Teklif Alın</a>
            </div>
            <div class="navbar__actions">
                <a class="navbar__phone" href="tel:+902582634567" data-track="phone_click" aria-label="Başarırlar Kurumsal telefonla ara"><?= e(CONTACT_PHONE); ?></a>
                <a class="navbar__cta" href="<?= e(url('teklif-al')); ?>" data-track="category_quote_click" data-category="header">Kurumsal Teklif Alın</a>
            </div>
        </div>
    </nav>
</header>
