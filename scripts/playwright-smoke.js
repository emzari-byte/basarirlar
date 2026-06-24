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

  if (errors.length) {
    throw new Error(`Console errors:\n${errors.join('\n')}`);
  }

  await browser.close();
})();
