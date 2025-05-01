<?php

require_once 'LinkedList.php';

$list = new LinkedList();

$list->insert(10);
$list->insert(20);
$list->insert(30);
$list->insert(40);

echo "Original list:\n";
$list->display();

$list->delete(20);

echo "After deleting 20:\n";
$list->display();

