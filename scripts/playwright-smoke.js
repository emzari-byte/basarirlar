const { chromium } = require('playwright');

const baseUrl = process.env.BASE_URL || 'http://localhost/basarirlar';
const pages = [
  '/',
  '/teklif-al',
  '/urun-gruplari/ofis-kirtasiye',
  '/blog/kurumsal-kirtasiye-tedarikinde-planlama',
  '/markalar'
];

(async () => {
  const browser = await chromium.launch();
  const page = await browser.newPage({ viewport: { width: 390, height: 844 } });
  const errors = [];
  page.on('console', (msg) => {
    if (msg.type() === 'error') errors.push(msg.text());
  });
  page.on('pageerror', (err) => errors.push(err.message));

  for (const path of pages) {
    const response = await page.goto(`${baseUrl.replace(/\/$/, '')}${path}`, { waitUntil: 'networkidle' });
    if (!response || response.status() >= 400) {
      throw new Error(`HTTP ${response && response.status()} for ${path}`);
    }
    const overflow = await page.evaluate(() => document.documentElement.scrollWidth > window.innerWidth + 2);
    if (overflow) {
      throw new Error(`Horizontal overflow on ${path}`);
    }
    const title = await page.title();
    console.log(`OK ${path} :: ${title}`);
  }

  await page.goto(`${baseUrl.replace(/\/$/, '')}/urun-gruplari/ofis-kirtasiye`);
  await page.getByRole('link', { name: 'Bu kategori için teklif al' }).first().click();
  await page.waitForURL(/teklif-al/);
  const selectedGroup = await page.locator('#urun_grubu').inputValue();
  if (selectedGroup !== 'Ofis Kırtasiye') {
    throw new Error(`Category preselect failed: ${selectedGroup}`);
  }

  await page.locator('#teklif-formu button[type="submit"]').click();
  const submittedClass = await page.locator('#teklif-formu').evaluate((form) => form.classList.contains('is-submitted'));
  if (!submittedClass) {
    throw new Error('Quote form validation state did not activate');
  }

  await page.goto(`${baseUrl.replace(/\/$/, '')}/`);
  await page.setViewportSize({ width: 390, height: 844 });
  const mobileCtaVisible = await page.locator('.mobile-conversion-bar').isVisible();
  if (!mobileCtaVisible) {
    throw new Error('Mobile conversion CTA is not visible');
  }

  if (errors.length) {
    throw new Error(`Console errors:\n${errors.join('\n')}`);
  }

  await browser.close();
})();
