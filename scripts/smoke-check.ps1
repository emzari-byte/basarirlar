param(
    [string]$BaseUrl = "http://localhost/basarirlar",
    [string]$Php = "C:\xampp\php\php.exe"
)

$ErrorActionPreference = "Stop"

$phpFiles = @(
    "index.php",
    "teklif-al.php",
    "urun-gruplari.php",
    "urun-grubu-detay.php",
    "blog.php",
    "blog-detay.php",
    "markalar.php",
    "hizmetlerimiz.php",
    "iletisim.php",
    "tesekkurler.php",
    "includes/config.php",
    "includes/header.php",
    "includes/footer.php",
    "includes/navbar.php"
)

foreach ($file in $phpFiles) {
    & $Php -l $file | Out-Host
}

$paths = @(
    "/",
    "/hakkimizda",
    "/kurumsal-kirtasiye",
    "/urun-gruplari",
    "/urun-gruplari/ofis-kirtasiye",
    "/urun-gruplari/okul-kirtasiye",
    "/urun-gruplari/kagit-urunleri",
    "/urun-gruplari/toner-kartus",
    "/urun-gruplari/dosyalama-urunleri",
    "/urun-gruplari/arsivleme-urunleri",
    "/urun-gruplari/bilgisayar-sarf",
    "/urun-gruplari/ambalaj-sarf",
    "/urun-gruplari/promosyon-urunleri",
    "/urun-gruplari/masaustu-gerecleri",
    "/urun-gruplari/yazi-gerecleri",
    "/urun-gruplari/etiket-rulo",
    "/markalar",
    "/hizmetlerimiz",
    "/blog",
    "/blog/kurumsal-kirtasiye-tedarikinde-planlama",
    "/blog/toplu-kirtasiye-siparislerinde-dikkat-edilecekler",
    "/blog/ofis-sarf-malzemelerinde-stok-surekliligi",
    "/blog/denizlide-kurumsal-kirtasiye-tedarikcisi-secimi",
    "/blog/toner-kartus-tedarikinde-muadil-urun-secimi",
    "/blog/sirketler-icin-aylik-kirtasiye-ihtiyac-listesi",
    "/iletisim",
    "/teklif-al",
    "/kvkk",
    "/gizlilik-politikasi",
    "/cerez-politikasi",
    "/sitemap.xml",
    "/robots.txt"
)

foreach ($path in $paths) {
    $url = $BaseUrl.TrimEnd("/") + $path
    $response = Invoke-WebRequest -Uri $url -UseBasicParsing -MaximumRedirection 5
    if ($response.StatusCode -lt 200 -or $response.StatusCode -ge 400) {
        throw "HTTP check failed: $url => $($response.StatusCode)"
    }
    if ($path -notin @("/sitemap.xml", "/robots.txt")) {
        $html = [string]$response.Content
        $h1Count = ([regex]::Matches($html, "<h1\b", [System.Text.RegularExpressions.RegexOptions]::IgnoreCase)).Count
        if ($h1Count -ne 1) {
            throw "SEO check failed: $url has $h1Count H1 tags"
        }
        foreach ($pattern in @(
            "<title>[^<]+</title>",
            "<meta\s+name=""description""\s+content=""[^""]+""",
            "<link\s+rel=""canonical""\s+href=""[^""]+""",
            "<meta\s+property=""og:title""\s+content=""[^""]+""",
            "<meta\s+property=""og:description""\s+content=""[^""]+""",
            "<script\s+type=""application/ld\+json"""
        )) {
            if ($html -notmatch $pattern) {
                throw "SEO check failed: $url missing pattern $pattern"
            }
        }
    }
    Write-Host "OK $($response.StatusCode) $url"
}
