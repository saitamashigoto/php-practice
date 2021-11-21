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
}