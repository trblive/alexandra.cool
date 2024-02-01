<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/findability/vocab/includes/helpers.inc.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/findability/template/template.php'; ?>
<main id="content">
    <hgroup>
        <h1>Manage Definitions</h1>
    </hgroup>
    <div class="section">
        <table>
            <tr>
                <th>ID</th>
                <th>Term</th>
                <th>Definition</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($vocabs as $vocab): ?>
                <tr valign="top">
                    <td><?php htmlout($vocab['id']); ?></td>
                    <td><?php htmlout($vocab['term']); ?></td>
                    <td><?php htmlout($vocab['definition']); ?></td>
                    <td>
                        <form action="?" method="post">
                            <div>
                                <input type="hidden" name="id" value="<?php
                                    htmlout($vocab['id']); ?>">
                                <input type="submit" name="action" value="Edit">
                                <input type="submit" name="action" value="Delete">
                            </div>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <ul class="login">
            <li><a href="?add">Add new definition</a></li>
            <li><?php include 'logout.inc.html.php'; ?></li>
        </ul>
        <a href="../../vocab" class="home-link">Return to Vocab page</a>
    </div>
</main>
