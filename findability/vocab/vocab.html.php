<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/findability/resources/includes/helpers.inc.php';?>

<main id="content">
    <hgroup>
        <h1>Findability Vocab</h1>
    </hgroup>
    <div class="section">
        <table>
            <tr>
                <th>ID</th>
                <th>Term</th>
                <th>Definition</th>
            </tr>
            <?php foreach ($vocabs as $vocab): ?>
                <tr>
                    <td>
                        <?php htmlout($vocab['id']); ?>
                    </td>
                    <td>
                        <?php htmlout($vocab['term']); ?>
                    </td>
                    <td>
                        <?php htmlout($vocab['definition']); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <ul class="login">
            <li><a href="admin/">Admin portal</a></li>
        </ul>
    </div>
    <ul class="pagination">
        <li><a href="https://alexandra.cool/findability/resources/"><i class="fa-solid fa-arrow-left-long"></i>Previous module</a></li>
        <li><a href="https://alexandra.cool/findability/">Findability Home</a></li>
        <li><a href="https://alexandra.cool/findability/about/">Next module<i class="fa-solid fa-arrow-right-long"></i></a></li>
    </ul>
</main>