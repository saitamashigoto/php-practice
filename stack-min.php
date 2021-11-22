<?php

class Node {
    public $next = null;
    public $data;
    public function __construct($d) {
        $this->data = $d;
    }
}


class Stack {
    private $top = 0;
    private $size = 0;
    private $minTop = 0;
    private $mins = [];
    private $stack = [];

    
    public function isEmpty() {
        return $this->size === 0;
    }
    
    public function getSize() {
        return $this->size;
    }

    public function min()
    {
        if ($this->isEmpty()) {
            throw new \Exception('Stack is Empty');
        }
        return $this->stack[$this->mins[$this->minTop]];
    }

    public function push($item) {
        if ($this->isEmpty()) {
            $this->stack[$this->top] = $item;
            $this->mins[$this->minTop] = $this->top;
        } else {
            $this->stack[++$this->top] = $item;
            if ($this->min() >= $item) {
                $this->mins[++$this->minTop] =$this->top;
            }
        }
        $this->size++;
    }

    public function pop() 
    {
        if ($this->isEmpty()) {
            throw new \Exception('Stack is Empty');
        }
        $this->size--;
        $item = $this->stack[$this->top];
        if ($this->getSize() > 1) {
            if ($this->min() === $item) {
                $this->minTop--;
            }
        }
        if ($this->top > 0) {
            $this->top--;
        }
        
        return $item;
    }

    public function print()
    {
        for ($i = 0; $i <= $this->top; $i++) {
            echo $this->stack[$i] . ' ';
        }
        echo PHP_EOL;
    }
}

$stack = new Stack();

while (true) {
    $operation = readline('po|pu|pr|m|e: ');
    
    switch ($operation) {
        case 'po':
            echo $stack->pop() .PHP_EOL;
            break;
        case 'pu':
            $element = readline('Element: ');
            $stack->push($element);
            break;
        case 'pr':
            $stack->print();
            break;
        case 'm':
            echo $stack->min() .PHP_EOL;
            break;
        case 'e':
            break 2;
    }
}