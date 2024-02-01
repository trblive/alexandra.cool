<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/findability/vocab/includes/helpers.inc.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/findability/template/template.php'; ?>
<main id="content">
    <hgroup>
        <h1><?php htmlout($title); ?></h1>
    </hgroup>
    <div class="section">
        <form action="?<?php htmlout($action); ?>" method="post">
            <label for="term">Term:
                <input id="term" name="term" type="text" value="<?php htmlout($term); ?>">
            </label>
            <label for="definition">Definition:
                <textarea id="definition" name="definition" rows="5"><?php htmlout($definition); ?></textarea>
            </label>
            <div>
                <input type="hidden" name="id" value="<?php
                htmlout($id); ?>">
                <input type="submit" value="<?php htmlout($button); ?>">
            </div>
        </form>
        <a href="../admin" class="home-link">Return to CMS home</a>
    </div>
</main>
<?php
echo $footer;
echo $script;
