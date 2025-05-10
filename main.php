<?php

require_once 'LinkedList.php';

$list = new LinkedList();

$list->insert(1);
$list->insert(2);
$list->insert(3);
$list->insert(3);
$list->insert(4);
$list->insert(4);
$list->insert(5);

//echo "before. \n";
//$list->display();
//
//echo "after insertion. \n";
//echo $list->insertAtPosition(77, 4);
//echo "\n";
//$list->display();

//$list->reverse();
//$list->display();

//$list1 = new LinkedList();
//$list1->insert(2);
//$list1->insert(4);
//$list1->insert(3);

//$list2 = new LinkedList();
//$list2->insert(5);
//$list2->insert(6);
//$list2->insert(4);

//$list = LinkedList::mergeTwoLists($list1, $list2);

//$list->display();
//$list->addTwoNumbers($list1, $list2);
//$list->display();

//$list->removeNthFromEnd(5);

$list->display();
$list->deleteDuplicates();
$list->display();