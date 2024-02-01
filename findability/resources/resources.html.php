<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/findability/resources/includes/helpers.inc.php';?>

<main id="content">
    <hgroup>
        <h1>Findability Resources</h1>
    </hgroup>
    <div class="section">
        <table>
            <tr>
                <th>Resource</th>
                <th>Category</th>
                <th>Added by</th>
                <th>Date added</th>
            </tr>
            <?php foreach ($resources as $resource): ?>
                <tr>
                    <td>
                        <a href="<?php htmlout($resource['url']); ?>" class="resourceLink">
                            <?php htmlout($resource['resourceName']); ?></a>
                    </td>
                    <td>
                        <?php htmlout($resource['category']); ?>
                    </td>
                    <td>
                        <a href="mailto:<?php htmlout($resource['email']); ?>">
                            <?php htmlout($resource['adminName']); ?></a>
                    </td>
                    <td>
                        <?php htmlout($resource['resourceDate']); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <ul class="login">
            <li><a href="admin/">Admin portal</a></li>
            <li><a href="filestore/">Upload a file</a></li>
        </ul>
    </div>
    <ul class="pagination">
        <li><a href="https://alexandra.cool/findability/ajax/"><i class="fa-solid fa-arrow-left-long"></i>Previous module</a></li>
        <li><a href="https://alexandra.cool/findability/">Findability Home</a></li>
        <li><a href="https://alexandra.cool/findability/vocab/">Next module<i class="fa-solid fa-arrow-right-long"></i></a></li>
    </ul>
</main>