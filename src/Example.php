<?php
namespace App;

class Example
{
    protected $capacity;
    protected $stack = [];
    protected $top;

    public function __construct($capacity, $stack)
    {
        $this->capacity = $capacity;
        $this->stack = $stack;
    }

    public function getTop()
    {
        return $this->top = count($this->stack) - 1;
    }

    public function validate()
    {
        $error = '';
        if (!is_array($this->stack) && $this->capacity < 0) {
            $error = "Please check stack and capacity.";
        } else if (!is_array($this->stack)) {
            $error = "Stack is not an array.";
        } else if ($this->capacity < 0) {
            $error = "Capacity is invalid.";
        } else if (count($this->stack) > $this->capacity) {
            $error = "Stack is over.";
        }
        return $error;
    }

    public function isEmpty()
    {
        if ($error = $this->validate()) {
            return $error;
        }
        if ($this->getTop() == -1) {
            return true;
        } else {
            return false;
        }
    }

    public function isFull()
    {
        if ($this->getTop() >= $this->capacity - 1) {
            return true;
        } else {
            return false;
        }
    }

    public function push($value)
    {
        if ($error = $this->validate()) {
            return $error;
        }
        if ($this->isFull()) {
            return "Stack is full.";
        } else {
            $this->top = $this->getTop();
            ++$this->top;
            $this->stack[$this->top] = $value;
            return $this->stack;
        }
    }

    public function pop()
    {
        if ($error = $this->validate()) {
            return $error;
        }
        if ($this->isEmpty()) {
            return "Stack is empty.";
        } else {
            $this->top = $this->getTop();
            unset($this->stack[$this->top]);
            return $this->stack;
        }
    }

    public function peek()
    {
        if ($error = $this->validate()) {
            return $error;
        }
        if ($this->isEmpty()) {
            return "Stack is empty.";
        } else {
            $this->top = $this->getTop();
            return $this->stack[$this->top];
        }
    }

    public function clear()
    {
        if ($error = $this->validate()) {
            return $error;
        }
        if ($this->isEmpty()) {
            return "Stack is empty.";
        } else {
            $count = count($this->stack);
            for ($i = 0; $i < $count; $i++) {
                unset($this->stack[$i]);
            }
            return $this->isEmpty() ? true : false;
        }
    }

    public function contains($value)
    {
        if ($error = $this->validate()) {
            return $error;
        }
        if ($this->isEmpty()) {
            return "Stack is empty.";
        } else {
            $count = count($this->stack);
            for ($i = 0; $i < $count; $i++) {
                if ($value == $this->stack[$i]) {
                    $index = $i + 1;
                    return "Element at index $index in stack.";
                }
            }
            return "No element in stack.";
        }
    }
}