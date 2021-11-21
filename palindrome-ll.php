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
    $strings = readline('Characters space separated: ');
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

function isPalindrome($ll) {
    $len = getLength($ll);
    if ($len == 1) {
        return 'TRUE';
    }
    $p1 = $p2 = $ll;
    $halfLen = ((int)($len/2));
    for ($i = $halfLen - 1; $i > 0; $i--) {
        $p2 = $p2->next;
    }

    $temp = $p2;
    if ($len % 2 != 0) {
        $p2 = $p2->next->next;
    } else {
        $p2 = $p2->next;   
    }
    $temp->next = null;
    while ($p1->next != null) {
        $start = $p1;
        while ($start->next->next != null) {
            $start = $start->next;
        }
        if ($start->next->data != $p2->data) {
            return 'FALSE';
        }
        
        $p2 = $p2->next;
        $start->next = null;
    }
    
    return $p1->data == $p2->data ? 'TRUE' : 'FALSE';
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
echo isPalindrome($ll1);