<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/findability/resources/includes/helpers.inc.php'; ?>
<main id="content">
    <hgroup>
        <h1>Manage Resources</h1>
    </hgroup>
    <div class="section">
        <h2>Search for resource:</h2>
        <p>View resources satisfying the following criteria:</p>
        <form action="" method="get">
            <label for="admin">Added by user:
                <select name="admin" id="admin">
                    <option value="">Any user</option>
                    <?php foreach ($admins as $admin): ?>
                        <option value="<?php htmlout($admin['id']); ?>"><?php
                            htmlout($admin['name']); ?></option>
                    <?php endforeach; ?>
                </select>
            </label>
            <label for="category">By category:
                <select name="category" id="category">
                    <option value="">Any category</option>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?php htmlout($category['id']); ?>"><?php
                            htmlout($category['name']); ?></option>
                    <?php endforeach; ?>
                </select>
            </label>
            <input type="hidden" name="action" value="search">
            <input type="submit" value="Search">
        </form>
        <ul class="login">
            <li><a href="?add">Add new resource</a></li>
            <li><?php include '../logout.inc.html.php'; ?></li>
        </ul>
        <a href=".." class="home-link">Return to CMS home</a>
    </div>
</main>


