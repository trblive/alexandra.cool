<?php include_once $_SERVER['DOCUMENT_ROOT'] .'/findability/resources/includes/helpers.inc.php'; ?>
<main id="content">
    <hgroup>
        <h1>PHP/MySQL File Repository</h1>
    </hgroup>
    <section>
        <form action="" method="post" enctype="multipart/form-data">
            <div>
                <label for="upload">Upload File:
                    <input type="file" id="upload" name="upload"></label>
            </div>
            <div>
                <label for="desc">File Description:
                    <input type="text" id="desc" name="desc"
                           maxlength="255"></label>
            </div>
            <div>
                <input type="hidden" name="action" value="upload">
                <input type="submit" value="Upload">
            </div>
        </form>
        <?php if (count($files) > 0): ?>
            <p>The following files are stored in the database:</p>
            <table>
                <thead>
                <tr>
                    <th>Filename</th>
                    <th>Type</th>
                    <th>Description</th>
                    <th>Thumbnail</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                    <?php foreach($files as $f): ?>
                        <tr>
                            <td>
                                <a href="?action=view&amp;id=<?php htmlout($f['id']); ?>"
                                ><?php htmlout($f['filename']); ?></a>
                            </td>
                            <td><?php htmlout($f['mimetype']); ?></td>
                            <td><?php htmlout($f['description']); ?></td>
                            <td>
                                <img src="?action=view&amp;id=<?php htmlout($f['id']); ?>" alt="<?php htmlout($f['description']); ?>">
                            </td>
                            <td>
                                <form action="" method="get">
                                    <input type="hidden" name="action" value="download"/>
                                    <input type="hidden" name="id" value="<?php htmlout($f['id']); ?>"/>
                                    <input type="submit" value="Download"/>
                                </form>
                                <form action="" method="post">
                                    <input type="hidden" name="action" value="delete"/>
                                    <input type="hidden" name="id" value="<?php htmlout($f['id']); ?>"/>
                                    <input type="submit" value="Delete"/>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
        <a href="../" class="home-link">Go back to Resources page</a>
    </section>
</main>
