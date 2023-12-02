<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/alexandra.cool/findability/resources/includes/helpers.inc.php'; ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/alexandra.cool/findability/template/template.php'; ?>
<main id="content">
    <hgroup>
        <h1>Search Results</h1>
    </hgroup>
    <section>
        <?php if (isset($resources)): ?>
            <table>
                <tr>
                    <th>Resource Name</th>
                    <th>Resource Url</th>
                    <th>Actions</th>
                </tr>
                <?php foreach ($resources as $resource): ?>
                    <tr valign="top">
                        <td><?php htmlout($resource['resourceName']); ?></td>
                        <td><a href="<?php htmlout($resource['url']); ?>"><?php htmlout($resource['url']); ?></a></td>
                        <td>
                            <form action="?" method="post">
                                <div>
                                    <input type="hidden" name="id" value="<?php
                                        htmlout($resource['id']); ?>">
                                    <input type="submit" name="action" value="Edit">
                                    <input type="submit" name="action" value="Delete">
                                </div>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
        <ul class="login">
            <li><a href="?">New search</a></li>
            <li><?php include '../logout.inc.html.php'; ?></li>
        </ul>
        <a href=".." class="home-link">Return to CMS home</a>
    </section>
</main>
<?php
echo $footer;
echo $script;
