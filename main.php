<?php

require_once 'LinkedList.php';

$list = new LinkedList();

//$list->insert(1);
//$list->insert(2);
//$list->insert(3);
//$list->insert(3);
//$list->insert(4);
//$list->insert(4);
//$list->insert(5);

$list1 = new LinkedList();
$list1->insert(4);
$list1->insert(1);

$list1->display();

$list2 = new LinkedList();
$list2->insert(5);
$list2->insert(6);
$list2->insert(1);

$list2->display();

$list->continuouslyNodes($list1, $list2, [8, 4, 5]);

$list1->display();
$list2->display();

//$list = LinkedList::mergeTwoLists($list1, $list2);

//$list->display();
//$list->addTwoNumbers($list1, $list2);
//$list->display();

//$list->removeNthFromEnd(5);

//$list->display();
$list->getIntersectionNode3($list1, $list2);
$list->display();