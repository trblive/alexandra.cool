<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/findability/resources/includes/helpers.inc.php';
include $_SERVER['DOCUMENT_ROOT'] . '/findability/template/template.php';
?>

<main id="content">
    <hgroup>
        <h1><?php htmlout($title); ?></h1>
    </hgroup>
    <section>
        <form action="?<?php htmlout($action); ?>" method="post">
            <label for="name">Name:
                <input type="text" name="name" id="name" value="<?php htmlout($name); ?>"></label>
            <label for="email">Email:
                <input type="text" name="email" id="email" value="<?php htmlout($email); ?>"></label>
            <label for="password">Set password:
                <input type="password" name="password" id="password"></label>
            <fieldset>
                <legend>Roles:</legend>
                <!-- The id attribute can’t contain spaces. We therefore have to go a little
                out of our way to generate a unique number for each role. Instead of using a
                foreach loop to step through our array of roles, we use an old-fashioned for
                loop - Page 304 -->
                <?php for ($i = 0; $i < count($roles); $i++): ?>
                    <div>
                        <label for="role<?php echo $i; ?>"><input type="checkbox"
                                                                  name="roles[]" id="role<?php echo $i; ?>"
                                                                  value="<?php htmlout($roles[$i]['id']); ?>"<?php
                            if ($roles[$i]['selected'])
                            {
                                echo ' checked';
                            }
                            ?>><?php htmlout($roles[$i]['id']); ?></label>:
                        <?php htmlout($roles[$i]['description']); ?>
                    </div>
                <?php endfor; ?>
            </fieldset>
            <input type="hidden" name="id" value="<?php
            htmlout($id); ?>">
            <input type="submit" value="<?php htmlout($button); ?>">
        </form>
        <a href=".." class="home-link">Return to CMS home</a>
    </section>
</main>
<?php
echo $footer;
echo $script;
?>