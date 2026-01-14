<?php
// Avançado SEO & Meta Tags
function get_seo_tags($title, $description, $url) {
    return '
    <!-- SEO Básico -->
    <title>'.htmlspecialchars($title).' | Mestria Digital</title>
    <meta name="description" content="'.htmlspecialchars($description).'">
    <meta name="keywords" content="infoproduto, marketing digital, vendas, curso online, mentorias">
    <link rel="canonical" href="'.htmlspecialchars($url).'">
    
    <!-- Open Graph (Facebook / LinkedIn) -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="'.htmlspecialchars($url).'">
    <meta property="og:title" content="'.htmlspecialchars($title).'">
    <meta property="og:description" content="'.htmlspecialchars($description).'">
    <meta property="og:image" content="https://seusite.com/assets/tablet-mockup.png">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="'.htmlspecialchars($title).'">
    <meta name="twitter:description" content="'.htmlspecialchars($description).'">
    <meta name="twitter:image" content="https://seusite.com/assets/tablet-mockup.png">
    
    <!-- Viewport & Favicon -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    ';
}
