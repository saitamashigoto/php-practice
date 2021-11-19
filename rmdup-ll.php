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


function createLinkedList($array) {
    $head = new Node(array_shift($array));
    $currentNode = $head;
    foreach ($array as $item) {
        $currentNode->next = new Node($item);
        $currentNode = $currentNode->next;
    }
    return $head;
}

function rmDups($head) {
    $first = $last = $head;
    while($last->next !== null) {
        $currentNode = $last->next;
        $candidate = $currentNode->data;
        $isCandidateFound = false;
        for($i = $first; $i !== $currentNode; $i=$i->next) {
            if ($i->data === $candidate) {
                $isCandidateFound = true;
                break;
            }
        }
        if ($isCandidateFound) {
            $last->next = $currentNode->next;
            $currentNode->next = null;
        } else {
            $last = $currentNode;
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


printLL(rmDups(createLinkedList(getInput())));