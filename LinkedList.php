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
        $current = $this->head;
        while ($current != null)
        {
            echo $current->data . " -> ";
            $current = $current->next;
        }
        echo "NULL\n";
    }

    public function delete($key)
    {
        if ($this->head === null)
        {
            return null;
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

}
