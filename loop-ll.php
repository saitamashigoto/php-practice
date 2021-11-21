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

function createLoop($ll) {
    $tail = $ll;    
    while ($tail->next->next != null) {
        $tail = $tail->next;
    }
    $head = $ll;
    while ($head->data != $tail->next->data) {
        $head = $head->next;
    }
    $tail->next = $head;
}

function detectLoop($ll) {
    $p1 = $ll;
    $p2 = $ll;
    $alreadyCompared = [];
    while ($p2 != null) {
        $length = count($alreadyCompared);
        if ($length > 0) {
            for($i = 0; $i < $length; $i++) {
                $item = $alreadyCompared[$i];
                if ($p1 === $item['p1'] && $p2 === $item['p2']) {
                    $found  = true;
                    break;
                }
            }
        } else {
            $found = false;
        }
        if ($found) {
            return $p2->data;
        } else {
            $alreadyCompared[] = ['p1' => $p1, 'p2' => $p2];
        }
        $p2 = $p2->next;
    }
    return 'not found';
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
createLoop($ll1);
echo detectLoop($ll1) . PHP_EOL;