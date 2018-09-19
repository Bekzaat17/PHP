<?php
$PHParray = Array
(
   Array ('id' => 1, 'parent_id' => '1', 'comment' => 'Comment1'),
   Array ('id' => 2, 'parent_id' => '1', 'comment' => 'Comment2'),
   Array ('id' => 3, 'parent_id' => '2', 'comment' => 'Comment3'),
   Array ('id' => 4, 'parent_id' => '1', 'comment' => 'Comment4'),
   Array ('id' => 5, 'parent_id' => '2', 'comment' => 'Comment5'),
   Array ('id' => 6, 'parent_id' => '3', 'comment' => 'Comment6'),
   Array ('id' => 7, 'parent_id' => '7', 'comment' => 'Comment7')
);

foreach ($PHParray as $item) {
    $item['subs'] = array();
    $indexedItems[$item['id']] = (object) $item;
}

$topParent = array();
foreach ($indexedItems as $item) {
    if ($item->parent_id == $item->id) {
        $topParent[] = $item;
    } else {
        $indexedItems[$item->parent_id]->subs[] = $item;
    }
}

function treeComments($PHParray) {
    $tree = '<ul>';
    foreach ($PHParray as $item) {
        $tree .= '<li>' . $item->comment;
        if (!empty($item->subs)) {
            $tree .= treeComments($item->subs);
        }
        $tree .= '</li>';
    }
    return $tree . '</ul>';
}
echo treeComments($topParent);