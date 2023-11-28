<?php
global $title;
global $styleTemplate;
global $utilities;

$head = "
<!DOCTYPE html>
<html lang=\"en\" class='light-mode'>
    <head>
        <meta charset=\"utf-8\">
        <meta name=\"description\" content=\"A mini-website for all things discoverability and search engine optimisation.\">
        <meta name=\"keywords\" content=\"findability, discoverability, SEO, search engine optimisation\">
        <meta name=\"author\" content=\"Alexandra Adams\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">  
        <title>$title – alexandra.cool</title>
        <link rel=\"apple-touch-icon\" sizes=\"180x180\" href=\"/apple-touch-icon.png\">
        <link rel=\"icon\" type=\"image/png\" href=\"/favicon.png\" sizes=\"48x48\">
        <link rel=\"shortcut icon\" href=\"/favicon.ico\">
        <link href=\"$styleTemplate\" rel=\"stylesheet\">
        <link href=\"css/styles.css\" rel=\"stylesheet\">
        <script src=\"https://kit.fontawesome.com/c1da7bdf26.js\" crossorigin=\"anonymous\" async></script>
    </head>

    <!-- Google tag (gtag.js) -->
    <script async src=\"https://www.googletagmanager.com/gtag/js?id=G-6W5DDS77YJ\"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        
        gtag('config', 'G-6W5DDS77YJ');
    </script>";

$wrapper = "
    <body>
    <div id=\"wrapper\">
        <div id=\"skipnav\"><a href=\"#content\" data-content='Skip to main content'>Skip to main content</a></div>";

$header = "
        <header>
            <nav>
                <div class='main-site'>
                    <a href='https://alexandra.cool'>alexandra.cool</a>
                </div>
                <ul class='nav'>
                    <li><a href=''>about</a></li>
                    <li><a href='https://alexandra.cool/blog/'>blog</a></li>
                    <li><a href='https://alexandra.cool/contact/'>contact</a></li>
                </ul>
                <div class='nav-home'>
                    <a href='https://alexandra.cool/findability/'>Findability</a>
                </div>                
                <div>
                    <input type='checkbox' id='theme-toggle' class='toggle--checkbox' />
                    <label for='theme-toggle' class='toggle--label''>
                      <span class='toggle--label-background'></span>
                    </label>
                    <span class='theme-toggle-text'>Light</span>
                </div>
            </nav>
        </header>";

$footer = "
        <footer>
            <ul class='nav'>
                <li><a href=''>About</a></li>
                <li><a href='https://alexandra.cool/blog/'>Blog</a></li>
                <li><a href='https://alexandra.cool/contact/'>Contact</a></li>
            </ul>
            <p>Inspired by <a href='https://lynnandtonic.com/'>Lynn Fisher</a>.</p>
            <ul class='nav social'>
                <li><a href='mailto:hello@alexandra.cool'><i class='fa-solid fa-envelope'></i></a></li>
                <li><a href='https://github.com/trblive'><i class='fa-brands fa-github-alt'></i></a></li>
                <li><a href='https://www.linkedin.com/in/alexandra-cool/'><i class='fa-brands fa-linkedin-in'></i></a></li>
            </ul>

        </footer>
        </div>";
$script = "
        <script src=\"$utilities\"></script>
        <script src=\"js/script.js\"></script>
    </body>
</html>";
?>
