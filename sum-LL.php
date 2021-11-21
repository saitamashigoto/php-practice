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
    $head1 = $ll1;
    $head2 = $ll2;
    while($head1 != null && $head2 != null) {
        $sum = $head1->data + $head2->data;
        $head1->data = $sum % 10;
        $carryOver = (int)($sum / 10);
        if (null == $head1->next && $head2->next != null) {
            $head1->next = new Node($carryOver);
        } elseif (null == $head2->next && $head1->next != null) {
            $head2->next = new Node($carryOver);
        } elseif (null == $head2->next && $head1->next == null && $carryOver > 0) {
            $head1->next = new Node($carryOver);
            $head2->next = new Node(0);
        } elseif ($head1->next != null && $carryOver > 0) {
            $head1->next->data += $carryOver;
        }
        $head1 = $head1->next;
        $head2 = $head2->next;
    }
    return $ll1;
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