<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/findability/resources/includes/helpers.inc.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/findability/template/template.php'; ?>
<main id="content">
    <hgroup>
        <h1><?php htmlout($title); ?></h1>
    </hgroup>
    <section>
        <form action="?<?php htmlout($action); ?>" method="post">
            <label for="resourceName">Resource name:
                <input id="resourceName" name="resourceName" type="text" value="<?php htmlout($resourceName); ?>">
            </label>
            <label for="url">Resource URL:
                <input id="url" name="url" type="text" value="<?php htmlout($url); ?>">
            </label>
            <label for="admin">Admin:
                <select name="admin" id="admin">
                    <option value="">Select one</option>
                    <?php foreach ($admins as $admin): ?>
                        <option value="<?php htmlout($admin['id']); ?>"<?php
                        if ($admin['id'] == $adminID)
                        {
                            echo ' selected';
                        }
                        ?>><?php htmlout($admin['name']); ?></option>
                    <?php endforeach; ?>
                </select>
            </label>
            <fieldset>
                <legend>Categories:</legend>
                <?php foreach ($categories as $category): ?>
                    <div><label for="category<?php htmlout($category['id']);
                        ?>"><input type="checkbox" name="category"
                                   id="category<?php htmlout($category['id']); ?>"
                                   value="<?php htmlout($category['id']); ?>"<?php
                            if ($category['selected'])
                            {
                                echo ' checked';
                            }
                            ?>><?php htmlout($category['name']); ?></label></div>
                <?php endforeach; ?>
            </fieldset>
            <div>
                <input type="hidden" name="id" value="<?php
                htmlout($id); ?>">
                <input type="submit" value="<?php htmlout($button); ?>">
            </div>
        </form>
        <a href=".." class="home-link">Return to CMS home</a>
    </section>
</main>
<?php
echo $footer;
echo $script;
