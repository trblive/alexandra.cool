<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/findability/resources/includes/helpers.inc.php'; ?>
<main id="content">
    <hgroup>
        <h1>Manage Categories</h1>
    </hgroup>
    <section>
        <table>
            <tr>
                <th>Category Name</th>
                <th>Added by</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($categories as $category): ?>
                <tr>
                    <td><?php htmlout($category['name']); ?></td>
                    <td><?php htmlout($category['admin']); ?></td>
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="id" value="<?php
                            echo $category['id']; ?>">
                            <input type="submit" name="action" value="Edit">
                            <input type="submit" name="action" value="Delete">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <ul class="login">
            <li><a href="?add">Add new category</a></li>
            <li><?php include '../logout.inc.html.php'; ?></li>
        </ul>
        <a href=".." class="home-link">Return to CMS home</a>
    </section>
</main>
