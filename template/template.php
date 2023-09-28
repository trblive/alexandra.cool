<?php
    $head = "
<!DOCTYPE html>
<html lang=\"en\">
    <head>
        <meta charset=\"utf-8\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
        <meta name=\"author\" content=\"Alexandra Adams\">
        <title>Alexandra Adams • $title</title>
        <link rel=\"apple-touch-icon\" sizes=\"180x180\" href=\"/apple-touch-icon.png\">
        <link rel=\"icon\" type=\"image/png\" href=\"/favicon.png\" sizes=\"48x48\">
        <link rel=\"shortcut icon\" href=\"/favicon.ico\">
        <link href=\"css/styles.css\" rel=\"stylesheet\">
        <link href=\"$styleTemplate\" rel=\"stylesheet\">
        <script src=\"https://kit.fontawesome.com/c1da7bdf26.js\" crossorigin=\"anonymous\" async></script>
    </head>";

    $wrapper = "
    <body>
    <div id=\"wrapper\">";

    $experienceWrapper = "
    <body>
    <div id=\"wrapper\" class=\"locked\">";

    $header = "
        <header>
            <nav>
                <i id=\"menu\" class=\"fa-solid fa-bars fa-xl\"></i>
                <div id=\"navContainer\">
                    <ul id=\"nav\">
                        <li><a href=\"https://alexandra.cool/\">Home</a></li>
                        <li><a href=\"https://alexandra.cool/experience/\">Experience</a></li>
                        <li><a href=\"https://alexandra.cool/projects/\">Projects</a></li>
                        <li><a href=\"https://alexandra.cool/contact/\">Contact</a></li>
                        <li><i id=\"galleryButton\" class=\"fa-solid fa-cat\"></i></li>
                    </ul>
                </div>
            </nav>
        </header>";

    $main = "
        <main>
            <hgroup id=\"hgroup\">
                <h1>$heading</h1>
                <p>$subtext</p>
            </hgroup>";

    $footer = "
        </main>
        <footer>
        <ul>
            <li><h3>Other things</h3></li>
            <li><a href=\"https://alexandra.cool/experience/\">Work history</a></li>
            <li><a href=\"https://alexandra.cool/projects/\">Past projects</a></li>
        </ul>
        <ul>
            <li><h3>Get in touch</h3></li>
            <li><a href=\"https://alexandra.cool/contact/\">Contact</a></li>
            <li><a href=\"https://linkedin.com/in/alexandra-adams-237682236\">LinkedIn</a></li>
        </ul>
        <ul>
            <li><h3>Policies</h3></li>
            <li><a href=\"https://www.northmetrotafe.wa.edu.au/privacy\">Privacy</a></li>
            <li><a href=\"https://www.wa.gov.au/system/files/2022-01/WA%20Government%20Cyber%20Security%20Policy.pdf\">Security</a></li>
        </ul>
        </footer>
        </div>";
    $homeScript = "
        <script src=\"js/utilities.js\"></script>
        <script src=\"js/script.js\"></script>
    </body>
</html>";
    $pageScript = "
        <script src=\"../js/utilities.js\"></script>
        <script src=\"js/script.js\"></script>
    </body>
</html>";
    $innerScript = "
        <script src=\"../../js/utilities.js\"></script>
        <script src=\"js/script.js\"></script>
    </body>
</html>";
?>
            