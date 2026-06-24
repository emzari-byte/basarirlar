<?php
require_once __DIR__ . '/config.php';

function whatsapp_quote_url(string $message = ''): string
{
    $text = $message !== '' ? $message : 'Merhaba, kurumsal kırtasiye ürün listemi paylaşıp teklif almak istiyorum.';
    return 'https://wa.me/' . CONTACT_WHATSAPP_E164 . '?text=' . rawurlencode($text);
}

function cta_group(array $options = []): string
{
    $primaryLabel = $options['primary_label'] ?? 'Kurumsal Teklif Alın';
    $primaryHref = $options['primary_href'] ?? url('teklif-al');
    $secondaryLabel = $options['secondary_label'] ?? "WhatsApp'tan Liste Gönderin";
    $secondaryHref = $options['secondary_href'] ?? whatsapp_quote_url();
    $secondaryClass = $options['secondary_class'] ?? 'btn--outline';
    $tertiaryLabel = $options['tertiary_label'] ?? '';
    $tertiaryHref = $options['tertiary_href'] ?? '#';
    $tertiaryClass = $options['tertiary_class'] ?? 'btn--text';
    $class = trim('cta-actions ' . ($options['class'] ?? ''));
    $trackCategory = $options['track_category'] ?? 'cta';

    $html = '<div class="' . e($class) . '">' .
        '<a class="btn" href="' . e($primaryHref) . '" data-track="category_quote_click" data-category="' . e($trackCategory) . '">' . e($primaryLabel) . '</a>' .
        '<a class="btn ' . e($secondaryClass) . '" href="' . e($secondaryHref) . '" target="_blank" rel="noopener" data-track="whatsapp_click">' . e($secondaryLabel) . '</a>';

    if ($tertiaryLabel !== '') {
        $html .= '<a class="' . e($tertiaryClass) . '" href="' . e($tertiaryHref) . '">' . e($tertiaryLabel) . '</a>';
    }

    return $html . '</div>';
}

function trust_metrics(array $items, string $class = ''): string
{
    $html = '<div class="' . e(trim('metric-grid trust-metrics ' . $class)) . '" aria-label="Kurumsal güven metrikleri">';
    foreach ($items as $item) {
        $html .= '<div class="metric-card">' .
            '<strong>' . e($item['value']) . '</strong>' .
            '<span>' . e($item['label']) . '</span>' .
            '</div>';
    }
    return $html . '</div>';
}

function product_group_card(array $group): string
{
    $samples = array_slice($group['samples'] ?? [], 0, 3);
    $detailUrl = url('urun-gruplari/' . $group['slug']);
    $quoteUrl = url('teklif-al?urun_grubu=' . rawurlencode($group['title']));

    $html = '<article class="card product-card" id="' . e($group['slug']) . '">' .
        '<a class="card__image" href="' . e($detailUrl) . '" aria-label="' . e($group['title']) . ' detaylarını incele">' .
        '<img src="' . e($group['image']) . '" alt="' . e($group['title']) . ' kurumsal ürün grubu" loading="lazy">' .
        '</a>' .
        '<div class="card__body">' .
        '<h3>' . e($group['title']) . '</h3>' .
        '<p>' . e($group['summary']) . '</p>';

    if ($samples) {
        $html .= '<ul class="card-samples">';
        foreach ($samples as $sample) {
            $html .= '<li>' . e($sample) . '</li>';
        }
        $html .= '</ul>';
    }

    $html .= '<div class="card__actions">' .
        '<a class="card__link card__link--primary" href="' . e($quoteUrl) . '" data-track="category_quote_click" data-category="' . e($group['slug']) . '">Bu Kategori İçin Teklif Alın</a>' .
        '</div>' .
        '</div>' .
        '</article>';

    return $html;
}
