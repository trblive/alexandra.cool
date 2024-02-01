<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/findability/resources/includes/helpers.inc.php'; ?>
<main id="content">
    <hgroup>
        <h1>Manage Admins</h1>
    </hgroup>
    <div class="section">
        <table>
            <tr>
                <th>Admin Name</th>
                <th>Permissions</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($admins as $admin): ?>
                <tr>
                    <td><?php htmlout($admin['adminName']); ?></td>
                    <td><?php htmlout($admin['roleID']); ?></td>
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="id" value="<?php
                            echo $admin['adminID']; ?>">
                            <input type="submit" name="action" value="Edit">
                            <input type="submit" name="action" value="Delete">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <ul class="login">
            <li><a href="?add">Add new admin</a></li>
            <li><?php include '../logout.inc.html.php'; ?></li>
        </ul>
        <a href=".." class="home-link">Return to CMS home</a>
    </div>
</main>
