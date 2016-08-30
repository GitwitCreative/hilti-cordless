<?php
$sitebase_url = 'http://fork:grueneWiese@cms.microsites-by-hilti.com/site/';
if ($_SERVER['SERVER_NAME'] == 'localhost') {
    $sitebase_url = 'http://localhost/site/';
} elseif ($_SERVER['SERVER_NAME'] == 'hilti.sndbx.r8tin.net') {
    $sitebase_url = 'http://hilti.sndbx.r8tin.net/site/';
}
$index__message = '';

/* gets the data from a URL */
function curl_data_from_url($url)
{
    $ch      = curl_init();
    $timeout = 5;
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    $data = curl_exec($ch);
    curl_close($ch);

    return $data;
}

function generate_file($site, $template, $exportfile)
{
    global $sitebase_url, $sites_directory;

    $data = curl_data_from_url($sitebase_url . '?action=page&site=' . $site . '&page=' . $template . '&deploy=1');

    @mkdir($sites_directory . $site . '/');

    return save_to_file($sites_directory . $site . '/' . $exportfile, $data);
}

function generate_file_product($site, $exportfile, $id)
{
    global $sitebase_url, $sites_directory;

    $data = curl_data_from_url($sitebase_url . '?action=page&site=' . $site . '&page=product&product=' . $id . '&deploy=1');

    @mkdir($sites_directory . $site . '/');

    return save_to_file($sites_directory . $site . '/' . $exportfile, $data);
}

function generate_file_category($site, $exportfile, $id)
{
    global $sitebase_url, $sites_directory;

    $data = curl_data_from_url($sitebase_url . '?action=page&site=' . $site . '&page=category&category=' . $id . '&deploy=1');

    @mkdir($sites_directory . $site . '/');

    return save_to_file($sites_directory . $site . '/' . $exportfile, $data);
}

function deploy_site($site)
{
    global $index__message;

    $pages = get_pages();

    $deployed = true;

    if ($pages) {
        foreach ($pages as $pagename => $page) {
            if ($page->general->export) {
                $deployed = generate_file($site, $pagename, $page->general->export);
            } else {
                foreach($page as $item) {
                    $deployed = true;

                    if ($pagename == 'categories' && isset($item->general->export)) {
                        $deployed = generate_file_category($site, $item->general->export, $item->general->id);
                    } elseif ($pagename == 'products' && isset($item->general->export)) {
                        $deployed = generate_file_product($site, $item->general->export, $item->general->id);
                    }
                }
            }
            if ($deployed) {
                $index__message = 'Site deployed successfully.';
            } else {
                $index__message = 'There was an error, deploying the site.';
            }
        }
    } else {
        $index__message = 'Site does not exist.';
    }

    return $index__message;
}

if (isset($_REQUEST['deploy']) && isset($_REQUEST['site'])) {
    deploy_site($_REQUEST['site']);
}
