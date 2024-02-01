<?php
    global $title;
    global $styleTemplate;
    global $heading;
    global $subtext;
    global $credit;
    $head = "
<!DOCTYPE html>
<html lang=\"en\">
    <head>
        <!-- Google tag (gtag.js) -->
        <script async src=\"https://www.googletagmanager.com/gtag/js?id=G-6W5DDS77YJ\"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            
            gtag('config', 'G-6W5DDS77YJ');
        </script>
        <meta charset=\"utf-8\">
        <meta name=\"description\" content=\"A personal portfolio of my work and experience as a web development student.\">
        <meta name=\"keywords\" content=\"front-end, portfolio, student, web development\">
        <meta name=\"author\" content=\"Alexandra Adams\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">  
        <title>$title – alexandra.cool</title>
        <link rel=\"apple-touch-icon\" sizes=\"180x180\" href=\"/apple-touch-icon.png\">
        <link rel=\"icon\" type=\"image/png\" href=\"/favicon.png\" sizes=\"48x48\">
        <link rel=\"shortcut icon\" href=\"/favicon.ico\">
        <link href=\"$styleTemplate\" rel=\"stylesheet\">
        <link href=\"css/styles.css\" rel=\"stylesheet\">
        <script src=\"https://kit.fontawesome.com/c1da7bdf26.js\" crossorigin=\"anonymous\" async></script>
    </head>";

    $wrapper = "
    <body>
    <div id=\"wrapper\">
        <a id=\"skipnav\" href=\"#maincontent\">Skip to main content</a>";

    $experienceWrapper = "
    <body>
    <div id=\"wrapper\" class=\"locked\">
        <a id=\"skipnav\" href=\"#maincontent\">Skip to main content</a>";

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
                        <li><a href=\"https://alexandra.cool/gallery/\"><i class=\"fa-solid fa-cat\"></i>Gallery</a></li>
                        <li><a href=\"https://alexandra.cool/blog/\"><i class=\"fa-solid fa-arrow-up-right-from-square\"></i>Blog</a></li>
                    </ul>
                </div>
            </nav>
        </header>";

    $footer = "
        <footer>
            <ul>
                <li><a href='https://alexandra.cool/resume/'>Resume</a></li>
                <li><a href='https://alexandra.cool/contact/'>Contact</a></li>
            </ul>
            $credit
            <ul class='social'>
                <li><a href='mailto:hello@alexandra.cool'><i class='fa-solid fa-envelope'></i></a></li>
                <li><a href='https://github.com/trblive'><i class='fa-brands fa-github-alt'></i></a></li>
                <li><a href='https://www.linkedin.com/in/alexandra-cool/'><i class='fa-brands fa-linkedin-in'></i></a></li>
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