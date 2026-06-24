const toggle = document.querySelector('[data-nav-toggle]');
const menu = document.querySelector('[data-nav-menu]');

if (toggle && menu) {
    toggle.addEventListener('click', () => {
        const isOpen = menu.classList.toggle('is-open');
        toggle.setAttribute('aria-expanded', String(isOpen));
        toggle.setAttribute('aria-label', isOpen ? 'Menüyü kapat' : 'Menüyü aç');
    });

    menu.addEventListener('click', (event) => {
        if (event.target instanceof HTMLAnchorElement) {
            menu.classList.remove('is-open');
            toggle.setAttribute('aria-expanded', 'false');
            toggle.setAttribute('aria-label', 'Menüyü aç');
        }
    });
}

const trackEvent = (name, params = {}) => {
    if (typeof window.gtag === 'function') {
        window.gtag('event', name, params);
    }
};

let analyticsLoaded = false;
const loadAnalytics = () => {
    const id = window.BASARIRLAR_GA_ID;
    if (!id || analyticsLoaded || document.querySelector(`script[src*="${id}"]`)) return;
    analyticsLoaded = true;
    const script = document.createElement('script');
    script.async = true;
    script.src = `https://www.googletagmanager.com/gtag/js?id=${encodeURIComponent(id)}`;
    document.head.appendChild(script);
    window.gtag('js', new Date());
    window.gtag('config', id, { anonymize_ip: true });
};

document.querySelectorAll('[data-track]').forEach((element) => {
    element.addEventListener('click', () => {
        trackEvent(element.dataset.track, {
            link_url: element.getAttribute('href') || '',
            category: element.dataset.category || '',
            link_text: (element.textContent || '').trim(),
        });
    });
});

document.querySelectorAll('input[data-phone]').forEach((input) => {
    const formatPhone = () => {
        let d = input.value.replace(/\D/g, '');
        if (d.startsWith('0090')) {
            d = d.slice(4);
        } else if (d.startsWith('90') && d.length >= 12) {
            d = d.slice(2);
        } else if (d.startsWith('0')) {
            d = d.slice(1);
        }
        d = d.slice(0, 10);

        let out = '';
        if (d.length) {
            out = '0' + d.slice(0, 3);
            if (d.length > 3) out += ' ' + d.slice(3, 6);
            if (d.length > 6) out += ' ' + d.slice(6, 8);
            if (d.length > 8) out += ' ' + d.slice(8, 10);
        }
        input.value = out;
    };

    input.addEventListener('input', formatPhone);
    input.addEventListener('blur', formatPhone);
});

const kvkkModal = document.querySelector('[data-kvkk-modal]');
if (kvkkModal) {
    const openModal = (event) => {
        event.preventDefault();
        kvkkModal.hidden = false;
        document.body.classList.add('modal-open');
    };
    const closeModal = () => {
        kvkkModal.hidden = true;
        document.body.classList.remove('modal-open');
    };

    document.querySelectorAll('[data-kvkk-open]').forEach((trigger) => {
        trigger.addEventListener('click', openModal);
    });
    kvkkModal.querySelectorAll('[data-kvkk-close]').forEach((el) => {
        el.addEventListener('click', closeModal);
    });
    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && !kvkkModal.hidden) {
            closeModal();
        }
    });
}

const cookieBar = document.querySelector('[data-cookie-bar]');
if (cookieBar) {
    let consent = 'pending';
    try {
        consent = localStorage.getItem('analytics-consent') || 'pending';
    } catch (e) {
        consent = 'pending';
    }

    if (consent === 'accepted') {
        loadAnalytics();
    } else if (consent === 'pending') {
        cookieBar.hidden = false;
    }

    const acceptBtn = cookieBar.querySelector('[data-cookie-accept]');
    const rejectBtn = cookieBar.querySelector('[data-cookie-reject]');

    if (acceptBtn) {
        acceptBtn.addEventListener('click', () => {
            try {
                localStorage.setItem('analytics-consent', 'accepted');
            } catch (e) { /* yok say */ }
            cookieBar.hidden = true;
            loadAnalytics();
        });
    }

    if (rejectBtn) {
        rejectBtn.addEventListener('click', () => {
            try {
                localStorage.setItem('analytics-consent', 'rejected');
            } catch (e) { /* yok say */ }
            cookieBar.hidden = true;
        });
    }
}

document.querySelectorAll('[data-brand-filters]').forEach((filters) => {
    const grid = document.querySelector('[data-brand-grid]');
    if (!grid) return;

    filters.addEventListener('click', (event) => {
        const button = event.target instanceof HTMLElement ? event.target.closest('[data-brand-filter]') : null;
        if (!(button instanceof HTMLButtonElement)) return;

        const value = button.dataset.brandFilter || 'all';
        filters.querySelectorAll('[data-brand-filter]').forEach((item) => item.classList.remove('is-active'));
        button.classList.add('is-active');

        grid.querySelectorAll('[data-brand-category]').forEach((card) => {
            const visible = value === 'all' || card.getAttribute('data-brand-category') === value;
            card.hidden = !visible;
        });
    });
});

document.querySelectorAll('input[type="file"][data-file-limit]').forEach((input) => {
    input.addEventListener('change', () => {
        const limit = Number(input.dataset.fileLimit || 5);
        const maxSize = Number(input.dataset.fileMaxSize || 8388608);
        const files = Array.from(input.files || []);
        const tooMany = files.length > limit;
        const tooLarge = files.find((file) => file.size > maxSize);

        if (tooMany || tooLarge) {
            const message = tooMany
                ? `En fazla ${limit} dosya yükleyebilirsiniz.`
                : `${tooLarge.name} dosyası 8 MB sınırını aşıyor.`;
            input.value = '';
            input.setCustomValidity(message);
            input.reportValidity();
        } else {
            input.setCustomValidity('');
            if (files.length && input.dataset.trackChange) {
                trackEvent(input.dataset.trackChange, { file_count: files.length });
            }
        }
    });
});

document.querySelectorAll('form[data-validate]').forEach((form) => {
    form.addEventListener('submit', (event) => {
        form.classList.add('is-submitted');
        if (!form.checkValidity()) {
            event.preventDefault();
            form.reportValidity();
            return;
        }

        if (form.dataset.trackSubmit) {
            trackEvent(form.dataset.trackSubmit, { form_id: form.id || form.getAttribute('name') || 'form' });
        }

        const button = form.querySelector('button[type="submit"]');
        if (button) {
            button.disabled = true;
            button.dataset.originalText = button.textContent || '';
            button.textContent = 'Gönderiliyor...';
        }
    });
});
