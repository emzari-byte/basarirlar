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

// TR telefon numarası canlı formatlama: 0XXX XXX XX XX
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

// KVKK aydınlatma metni popup
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

// Çerez bildirimi
const cookieBar = document.querySelector('[data-cookie-bar]');
if (cookieBar) {
    let accepted = false;
    try {
        accepted = localStorage.getItem('cookie-ok') === '1';
    } catch (e) {
        accepted = false;
    }

    if (!accepted) {
        cookieBar.hidden = false;
    }

    const acceptBtn = cookieBar.querySelector('[data-cookie-accept]');
    if (acceptBtn) {
        acceptBtn.addEventListener('click', () => {
            try {
                localStorage.setItem('cookie-ok', '1');
            } catch (e) { /* yoksay */ }
            cookieBar.hidden = true;
        });
    }
}

document.querySelectorAll('form[data-validate]').forEach((form) => {
    form.addEventListener('submit', (event) => {
        form.classList.add('is-submitted');
        if (!form.checkValidity()) {
            event.preventDefault();
            form.reportValidity();
            return;
        }

        const button = form.querySelector('button[type="submit"]');
        if (button) {
            button.disabled = true;
            button.dataset.originalText = button.textContent || '';
            button.textContent = 'Gönderiliyor...';
        }
    });
});
