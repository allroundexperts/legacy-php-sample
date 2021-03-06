<?php
function listData($data, $header){
    $content = '<table class="table"><thead><tr>';
    foreach($header as $col){
        $content .= "<th>$col</th>";
    }
    $content .= '</tr></thead>';
    foreach($data as $key => $value){
        $content .= '<tr>';
        foreach($value as $col){
            $content .= "<td>$col</td>";
        }
        $keys = array_keys($value);
        $content .= '<td><a class="btn btn-danger" href="?delete='.$value[$keys[0]].'">Delete</a></td>';
        $content .= '</tr>';
    }
    $content .= '</table>';
    return $content;
}