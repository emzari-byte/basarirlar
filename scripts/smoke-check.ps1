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
    "/teklif-al",
    "/urun-gruplari",
    "/urun-gruplari/ofis-kirtasiye",
    "/blog",
    "/blog/kurumsal-kirtasiye-tedarikinde-planlama",
    "/markalar",
    "/sitemap.xml",
    "/robots.txt"
)

foreach ($path in $paths) {
    $url = $BaseUrl.TrimEnd("/") + $path
    $response = Invoke-WebRequest -Uri $url -UseBasicParsing -MaximumRedirection 5
    if ($response.StatusCode -lt 200 -or $response.StatusCode -ge 400) {
        throw "HTTP check failed: $url => $($response.StatusCode)"
    }
    Write-Host "OK $($response.StatusCode) $url"
}
