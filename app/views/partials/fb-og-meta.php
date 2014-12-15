<?php
foreach ($data as $key => $value) {
    echo "<meta property='" . $key . "' content='" . $value . "' />";
}
?>
<meta property="fb:app_id" content="<?php echo Config::get('facebook.app_id'); ?>" />