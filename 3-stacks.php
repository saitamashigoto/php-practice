<?php
class ThreeStacks {
    private $top1 = 0;
    private $top2 = 1;
    private $top3 = 2;
    private $size1 = 0;
    private $size2 = 0;
    private $size3 = 0;
    private $stack = [];

    public function pushOnFirst($item) {
        if (!empty($this->stack)) {          
            $length = count($this->stack);
            for ($i = $length; $i >$this->top1+1 ; $i--) {
                $this->stack[$i] = $this->stack[$i-1];
            }
            $this->top1++;
            $this->top2++;
            $this->top3++;
        }
        $this->stack[$this->top1] = $item;
        $this->size1++; 
    }

    public function popFromFirst() {
        if ($this->size1 == 0) {
            throw new \RuntimeException('Empty First stack');
        }
        $item = $this->stack[$this->top1];
        $length = count($this->stack);
        for ($i = $this->top1; $i < $length-1 ; $i++) {
            $this->stack[$i] = $this->stack[$i+1];
        }
        if ($this->top1 > 0) {
            $this->top1--;
        }
        $this->top2--;
        $this->top3--;
        $this->size1--; 
    }

    public function peekFromFirst() {
        if ($this->size1 == 0) {
            throw new \RuntimeException('Empty First stack');
        }
        return $this->stack[$this->top1];
    }
    
    public function pushOnSecond($item) {
        if (!empty($this->stack)) {          
            $length = count($this->stack);
            for ($i = $length; $i >$this->top2+1 ; $i--) {
                $this->stack[$i] = $this->stack[$i-1];
            }
            $this->top2++;
            $this->top3++;
        }
        $this->stack[$this->top2] = $item;
        $this->size2++; 
    }

    public function popFromSecond() {
        if ($this->size2 == 0) {
            throw new \RuntimeException('Empty Second stack');
        }
        $item = $this->stack[$this->top2];
        $length = count($this->stack);
        for ($i = $this->top2; $i < $length-1 ; $i++) {
            $this->stack[$i] = $this->stack[$i+1];
        }
        if ($this->top2 > 0) {
            $this->top2--;
        }
        $this->top3--;
        $this->size2--; 
    }

    public function peekFromSecond() {
        if ($this->size2 == 0) {
            throw new \RuntimeException('Empty Second stack');
        }
        return $this->stack[$this->top2];
    }
    
    public function pushOnThird($item) {
        if (!empty($this->stack)) {          
            $length = count($this->stack);
            for ($i = $length; $i >$this->top3+1 ; $i--) {
                $this->stack[$i] = $this->stack[$i-1];
            }
            $this->top3++;
        }
        $this->stack[$this->top3] = $item;
        $this->size3++; 
    }

    public function popFromThird() {
        if ($this->size3 == 0) {
            throw new \RuntimeException('Empty Third stack');
        }
        $item = $this->stack[$this->top3];
        if ($this->top3 > 0) {
            $this->top3--;
        }
        $this->size3--; 
    }

    public function peekFromThird() {
        if ($this->size3 == 0) {
            throw new \RuntimeException('Empty Third stack');
        }
        return $this->stack[$this->top3];
    }

    public function isEmptyFirst() {
        return $this->size1 === 0;
    }

    public function isEmptySecond() {
        return $this->size2 === 0;
    }

    public function isEmptyThird() {
        return $this->size3 === 0;
    }
}

$stack = new ThreeStacks();

$stack->pushOnFirst();