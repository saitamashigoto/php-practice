<?php

class Node {
    public $next = null;
    public $data;
    public function __construct($d) {
        $this->data = $d;
    }

    public function appendToTail($d) {
        $end = new Node($d);
        $n = $this;
        while ($n->next != null) {
            $n = $n->next;
        }
        $n->next = $end;
    }
}

function getInput() {
    $strings = readline('Linked List of Integers: ');
    $strings = explode(' ', $strings);
    return $strings;
}

function getPartionElement() {
    $ele = readline('Partition element: ');
    return $ele;
}


function createLinkedList($array) {
    $head = new Node(array_shift($array));
    $currentNode = $head;
    foreach ($array as $item) {
        $currentNode->next = new Node($item);
        $currentNode = $currentNode->next;
    }
    return $head;
}

function getLength($head) {
    $length = 0;
    while ($head != null) {
        $length++;
        $head = $head->next;
    }
    return $length;
}

function sumLists($ll1, $ll2) {
    $head2 = $ll2;
    $head1 = $ll1;
    $head = null;
    while($head1 != null) {
        $head1->data = $head1->data + $head2->data;
        
        $temp = $head;
        $head = $head1;
        $head1 = $head1->next;
        $head->next = $temp;
        $head2 = $head2->next;
    }
    $result = null;
    while($head != null) {
        $carryOver = (int)($head->data/10);
        $head->data = ($head->data%10);
        if ($carryOver > 0) {
            if ($head->next == null) {
                $head->next = new Node($carryOver);
            } else {
                $head->next->data += $carryOver;
            }
        }
        $temp = $result;
        $result = $head;
        $head = $head->next;
        $result->next = $temp;
    }
    return $result;
}

function printLL($head) {
    $currentNode = $head;
    while($currentNode != null) {
        echo $currentNode->data . " ";
        $currentNode = $currentNode->next;
    }
    echo PHP_EOL;
}

$array = getInput();
$ll1 = createLinkedList($array);
$array = getInput();
$ll2 = createLinkedList($array);

$head = sumLists($ll1, $ll2);
printLL($head);