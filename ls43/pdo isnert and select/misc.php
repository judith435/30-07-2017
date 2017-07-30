<?php
    class Misc {
        public static function addRowsToHtmlContent($content) {
            return str_replace(".", ".<br>", $content);
        }
    }
?>