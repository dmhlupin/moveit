<?php

function getFiles() {
    return array_splice(scandir('docs'), 2);
}

function getMainBlockParams($page){
    switch ($page) {
        case 'files':
            return [
                    "files" => getFiles(),
                    "localMenu" => []
            ];
            break;
        default: return ['files' => []];
    }
}
