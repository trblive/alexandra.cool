<main id="content">
    <hgroup>
        <h1>Error</h1>
    </hgroup>
    <div class="section">
        <p><?php echo $error; ?></p>
    </div>

</main>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/findability/template/template.php';
$utilities = 'https://alexandra.cool/findability/js/utilities.js';
echo $footer;
echo $script;
