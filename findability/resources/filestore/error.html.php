<main id="content">
    <hgroup>
        <h1>PHP Error</h1>
    </hgroup>
    <section>
        <p>
            <?php echo $error; ?>
        </p>
    </section>
</main>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/findability/template/template.php';
echo $footer;
echo $script;