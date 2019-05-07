<?php
require("head.php");
require("nav.php");
require("footer.php");

$getPage = function($content) use($head, $nav, $footer){
    return "<!doctype html>
                <html lang=\"en\">
                        $head
                    <body>
                    <div class=\"container-fluid\">             
                        $nav
                        $content
                        $footer
                    </div>
                    </body>
                </html>";
};