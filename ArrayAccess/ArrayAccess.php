<?php
/**
 * implements ArrayAccess
 * @author liyongheng
 * @date:2017.01.14
 */
class arrayAcs implements ArrayAccess
{
    protected $attributes = [];
    
    public function offsetGet($offset)
    {
        return $this->attributes[$offset];
    }
    
    public function offsetSet($offset, $value)
    {
        $this->attributes[$offset] = $value;
    }
    
    public function offsetExists($offset)
    {
        return isset($this->$attributes[$offset]);
    }
    
    public function offsetUnset($offset)
    {
        unset($this->attributes[$offset]);
    }
}

$aa = new arrayAcs();
$aa['name'] = 'liyongheng';
echo '<pre>';
print_r($aa);
print_r($aa['name']);
