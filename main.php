<?php

require_once 'LinkedList.php';

$list = new LinkedList();

$list->insert(1);
$list->insert(2);
$list->insert(3);
$list->insert(4);

echo "before. \n";
$list->display();

echo "after insertion. \n";
echo $list->insertAtPosition(77, 4);
echo "\n";
$list->display();

//$list->reverse();
//$list->display();