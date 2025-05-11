<?php

require_once 'Node.php';

class LinkedList
{
    private ?Node $head;

    public function __construct()
    {
        $this->head = null;
    }

    public function insert($data): void
    {
        $newNode = new Node($data);

        if ($this->head === null)
        {
            $this->head = $newNode;
        } else {
            $current = $this->head;
            while ($current->next != null)
            {
                $current = $current->next;
            }
            $current->next = $newNode;
        }
    }

    public function display(): void
    {
        if ($this->head === null)
        {
            echo "List is empty\n";
            return ;
        }
        $current = $this->head;
        while ($current != null)
        {
            echo $current->data . " -> ";
            $current = $current->next;
        }
        echo "NULL.\n";
    }

    public function delete($key): void
    {
        if ($this->head === null)
        {
            return;
        }

        $current = $this->head;
        while ($current->next != null && $current->next->data != $key)
        {
            $current = $current->next;
        }

        if ($current->next != null)
        {
            $current->next = $current->next->next;
        }
    }

    public function insertAtBeginning($data): void
    {
        $newNode = new Node($data);
        $newNode->next = $this->head;
        $this->head = $newNode;
    }

    public function deleteFirst(): void
    {
        if ($this->head == null)
        {
            echo "List is already empty.\n";
        } else {
            $this->head = $this->head->next;
        }
    }

    public function search($value): bool
    {
        $current = $this->head;

        while ($current != null)
        {
            if ($current->data == $value)
            {
                return true;
            }
            $current = $current->next;
        }
        return false;
    }

    public function countNodes(): int
    {
        $current = $this->head;
        $count = 0;

        while ($current != null)
        {
            $current = $current->next;
            ++$count;
        }

        return $count;
    }

    public function reverse(): void
    {
        $prev = null;
        $current = $this->head;

        while ($current != null)
        {
            $next = $current->next;
            $current->next = $prev;
            $prev = $current;
            $current = $next;
        }

        $this->head = $prev;
    }

    public function insertAtPosition($data, $position): void
    {
        $current = $this->head;
        $newNode = new Node($data);
        $count = 0;

        if ($position == 0)
        {
            $newNode->next = $this->head;
            $this->head = $newNode;
            return;
        }

        while ($current != null && $count < $position - 1)
        {
            $current = $current->next;
            $count++;
        }

        if ($current === null) {
            echo "Error: Position out of bounds\n";
            return;
        }

        $newNode->next = $current->next;
        $current->next = $newNode;
    }

    public static function mergeTwoLists($list1, $list2): LinkedList
    {
        $dummy = new Node(0);
        $current = $dummy;

        $current1 = $list1->head;
        $current2 = $list2->head;

        while($current1 != null && $current2 != null)
        {
            if ($current1->data <= $current2->data)
            {
                $current->next = $current1;
                $current1 = $current1->next;
            } else {
                $current->next = $current2;
                $current2 = $current2->next;
            }
            $current = $current->next;
        }

        $current->next = $current1 ?? $current2;

        $mergedList = new self();
        $mergedList->head = $dummy->next;

        return $mergedList;
    }

    public function removeNthFromEnd($n): Node
    {
        $fast = $this->head;
        $slow = $this->head;

        for ($i = 0; $i <= $n; ++$i)
        {
            if ($fast->next === null) {
                $this->head = $this->head->next;
                return $this->head->next;
            }
            $fast = $fast->next;
        }

        while ($fast != null)
        {
            $fast = $fast->next;
            $slow = $slow->next;
        }

        $slow->next = $slow->next->next;

        return $this->head;
    }

    public function middleNode(): Node
    {
        $count = 0;
        $countHead = $this->head;

        while ($countHead != null)
        {
            ++$count;
            $countHead = $countHead->next;
        }

        $target = intdiv($count, 2) + 1;
        $count2 = 1;
        while ($this->head != null)
        {
            if ($count2 == $target)
            {
                return $this->head;
            }
            $this->head = $this->head->next;
            ++$count2;
        }
        return $this->head;
    }

    public function removeElements($val): Node
    {
        $dummy = new Node(0);
        $prev = $dummy;

        $current = $this->head;
        $prev->next = $current;

        while ($current != null)
        {
            if ($current->data == $val)
            {
                $prev->next = $current->next;
            } else {
                $prev = $current;
            }
            $current = $current->next;

        }
        $this->head = $dummy->next;
        return $this->head;
    }

    public function addTwoNumbers($l1, $l2): void {

        $dummy = new Node(0);
        $this->head = $dummy;

        $current1 = $l1->head;
        $current2 = $l2->head;

        $array1 = [];
        $array2 = [];

        $num1 = 0;
        $num2 = 0;

        while ($current1 != null)
        {
            $array1[] = $current1->data;
            $current1 = $current1->next;
        }

        while ($current2 != null)
        {
            $array2[] = $current2->data;
            $current2 = $current2->next;
        }

        for ($i = (count($array1) - 1); $i >= 0; $i--)
        {
            $num1 = 10 * $num1 + $array1[$i];
        }

        for ($i = (count($array2) - 1); $i >= 0; $i--)
        {
            $num2 = 10 * $num2 + $array2[$i];
        }

        $num = $num1 + $num2;

        if ($num == 0)
        {
            $newNode = new Node(0);
            $this->head = $newNode;
            return;
        }

        while ($num > 0)
        {
            $data = $num % 10;

            $newNode = new Node($data);

            $dummy->next = $newNode;
            $dummy = $dummy->next;

            $num = intdiv($num, 10);
        }

        $this->head = $this->head->next;
    }

    public function addTwoNumbers2($l1, $l2): ?Node
    {
        $dummy = new Node(0);
        $this->head = $dummy;
        $current = $dummy;

        $l1 = $l1->head;
        $l2 = $l2->head;

        $carry = 0;

        while ($l1 !== null || $l2 !== null) {
            $x = ($l1 !== null) ? $l1->data : 0;
            $y = ($l2 !== null) ? $l2->data : 0;

            $sum = $x + $y + $carry;
            $carry = (int)($sum / 10);

            $current->next = new Node($sum % 10);
            $current = $current->next;

            if ($l1 !== null) $l1 = $l1->next;
            if ($l2 !== null) $l2 = $l2->next;
        }

        if ($carry > 0) {
            $current->next = new Node($carry);
        }

        $this->head = $this->head->next;
        return $this->head;
    }

    public function deleteDuplicates(): void {

        $current = $this->head->next;
        $dummy = $this->head;

        while ($current != null)
        {
            if ($dummy->data != $current->data)
            {
                $dummy->next = $current;
                $dummy = $dummy->next;
            }
            $current = $current->next;
        }

        if ($dummy->next != null) {
            $dummy->next = null;
        }
    }

    public function continuouslyNodes($list1, $list2, $array): void
    {
        $head1 = $list1->head;
        $head2 = $list2->head;

        while($head1->next != null)
        {
            $head1 = $head1->next;
        }

        while($head2->next != null)
        {
            $head2 = $head2->next;
        }

        foreach ($array as $value)
        {
            $newNode = new Node($value);
            $head1->next = $newNode;
            $head1 = $head1->next;
            $head2->next = $newNode;
            $head2 = $head2->next;
        }
    }

    public function getIntersectionNode($list1, $list2): ?Node
    {
        $headA = $list1->head;
        $headB = $list2->head;

        $head1 = $headA;
        $head2 = $headB;

        $currentA = $headA;
        $currentB = $headB;

        $countA = 0;
        $countB = 0;

        while ($currentA != null || $currentB != null)
        {
            if ($currentA != null)
            {
                $currentA = $currentA->next;
                ++$countA;
            }

            if ($currentB != null)
            {
                $currentB = $currentB->next;
                ++$countB;
            }
        }

        $difference = $countA - $countB;

        if ($difference > 0)
        {
            while ($difference)
            {
                $head1 = $head1->next;
                --$difference;
            }
        }

        if ($difference < 0)
        {
            while ($difference)
            {
                $head2 = $head2->next;
                ++$difference;
            }
        }

        while($head1 != null)
        {
            if ($head1 === $head2)
            {
                $this->head = $head1;
                return $this->head;
            }
            $head1 = $head1->next;
            $head2 = $head2->next;
        }
        return null;
    }

    public function getIntersectionNode2($list1, $list2): ?Node
    {
        $head1 = $list1->head;
        $head2 = $list2->head;

        $current2 = $head2;

        while ($head1 != null)
        {
            while ($head2 != null)
            {
                if ($head1 === $head2)
                {
                    $this->head = $head1;
                    return $this->head;
                }
                $head2 = $head2->next;
            }
            $head1 = $head1->next;
            $head2 = $current2;
        }
        return null;
    }

    public function getIntersectionNode3($list1, $list2)
    {
        $head1 = $list1->head;
        $head2 = $list2->head;

        $current1 = $head1;
        $current2 = $head2;

        while ($current1 !== $current2)
        {
            $current1 = $current1 === null ? $head2 : $current1->next;
            $current2 = $current2 === null ? $head1 : $current2->next;
        }

        $this->head = $current1;
        return $this->head;
    }

    public function isPalindrome(): bool
    {
        if ($this->head === null || $this->head->next === null)
        {
            return true;
        }

        $slow = $this->head;
        $fast = $this->head;
        while ($fast !== null && $fast->next !== null) {
            $slow = $slow->next;
            $fast = $fast->next->next;
        }

        $prev = null;
        while ($slow !== null) {
            $next = $slow->next;
            $slow->next = $prev;
            $prev = $slow;
            $slow = $next;
        }

        $first = $this->head;
        $second = $prev;
        while ($second !== null) {
            if ($first->data !== $second->data) return false;
            $first = $first->next;
            $second = $second->next;
        }

        return true;
    }

}
