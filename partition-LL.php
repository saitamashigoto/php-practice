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

function partition($head, $partitionElement) {
    $currentNode = $head;
    while($currentNode->next != null) {
        if ($currentNode->next->data < $partitionElement) {
            $tempNode = $currentNode->next;
            $currentNode->next = $currentNode->next->next;
            $tempNode->next = $head;
            $head = $tempNode;
        } else {
            if($currentNode->next != null) {
                $currentNode = $currentNode->next;
            }
        }
    }
    return $head;
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
$partitionElement = getPartionElement();
$head = partition($ll, $partitionElement);
printLL($head);