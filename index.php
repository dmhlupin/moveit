<?php

function renderTemplate($page) {
    include $page . ".php";
}
$header = renderTemplate("header");
$sidebarMenu = renderTemplate("sidebarMenu");
$mainform = renderTemplate("mainform");
$gallery = renderTemplate("gallery");
$description = renderTemplate("description");
$footer = renderTemplate("footer");
