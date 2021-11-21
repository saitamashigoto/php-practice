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

function getKthInput() {
    $ele = readline('kth element from the last: ');
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

function findKth($head, $kthFromLast) {
    $n = getLength($head);
    $kthFromFirst = $n - $kthFromLast;
    while($kthFromFirst > 0) {
        $head = $head->next;
        $kthFromFirst--;
    }
    return $head->data;
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
$ll = createLinkedList($array);
$kthFromLast = getKthInput();
printLL($ll);
echo findKth($ll, $kthFromLast) . PHP_EOL;
