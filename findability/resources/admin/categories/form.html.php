<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/findability/resources/includes/helpers.inc.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/findability/template/template.php'; ?>
<main id="content">
    <hgroup>
        <h1><?php htmlout($title); ?></h1>
    </hgroup>
    <section>
        <form action="?<?php htmlout($action); ?>" method="post">
            <label for="name">Name:
                <input type="text" name="name" id="name" value="<?php htmlout($name); ?>">
            </label>
            <input type="hidden" name="id" value="<?php htmlout($id); ?>">
            <input type="submit" value="<?php htmlout($button); ?>">
        </form>
        <a href=".." class="home-link">Return to CMS home</a>
    </section>
</main>
<?php
echo $footer;
echo $script;
