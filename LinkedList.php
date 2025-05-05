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

}
