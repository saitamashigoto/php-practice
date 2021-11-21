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

function intersection($ll1, $ll2) {
    $head1 = $ll1;    
    while ($head1 != null) {
        $head2 = $ll2;
        while ($head2 != null) {
            if ($head1 == $head2) {
                return $head1->data;
            }
            $head2 = $head2->next;
        }
        $head1 = $head1->next;
    }
    return 'False';  
}

function createIntersection($ll1, $array) {
    $ll2 = null;
    for($i = 0; $i < count($array); $i++) {
        $item = $array[$i];
        $head = $ll1;
        while ($head != null) {
            if ($item == $head->data) {
                if ($ll2 == null) {
                    if ($i == 0 && $head->next == null) {
                        array_shift($array);
                        $copyHead = $head;
                        foreach ($array as $itm) {
                            $head->next = new Node($itm);
                            $head = $head->next;                      
                        }
                        return $copyHead;
                    }
                    return $head;
                } else {
                    $tail2 = $ll2;
                    while($tail2->next != null) {
                        $tail2 = $tail2->next;
                    }
                    $tail2->next = $head;
                    return $ll2;
                }
            }
            $head = $head->next;
        }
        $head = $ll2;
        if ($head == null) {
            $ll2 = new Node($item);
        } else {   
            while ($head->next != null) {
                $head = $head->next;
            }
            $head->next = new Node($item);
        }
    }
    return $ll2;
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
$ll2 = createIntersection($ll1, $array);
printLL($ll2);

echo intersection($ll1, $ll2) . PHP_EOL;