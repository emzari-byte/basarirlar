<header class="site-header" data-header>
    <div class="top-strip">
        <div class="container top-strip__inner">
            <span><?= e(SITE_TAGLINE); ?> · <?= e(SITE_SLOGAN); ?></span>
            <a href="tel:+902582634567"><?= e(CONTACT_PHONE); ?></a>
            <a href="https://wa.me/<?= e(CONTACT_WHATSAPP_E164); ?>" target="_blank" rel="noopener">WhatsApp: <?= e(CONTACT_WHATSAPP); ?></a>
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
                <a class="nav-menu__quote" href="<?= e(url('teklif-al')); ?>">Teklif Al</a>
            </div>
            <a class="navbar__cta" href="<?= e(url('teklif-al')); ?>">Teklif Al</a>
        </div>
    </nav>
</header>
