<?php
include 'url.php';
libxml_use_internal_errors(true);
function get_images($base_url) {
    $html = file_get_contents($base_url);
    $dom = new domDocument;
    $dom->loadHTML($html);
    $dom->preserveWhiteSpace = false;
    $images = $dom->getElementsByTagName('img');
    echo '<br><hr style="height:4px;border:none;color:#333;background-color:#333;" />';
    foreach ($images as $img) {
        $url = $img->getAttribute('src');
        $alt = $img->getAttribute('alt');
        $src = make_absolute($url, $base_url);
        echo '<div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="'.$src.'">
                    <img class="img-responsive" src="'.$src.'" alt="'.$alt.'">
                </a>
            </div>';
    }
}
function get_http_response_code($theURL) {
    $headers = get_headers($theURL);
    return substr($headers[0], 9, 3);
}
?>
