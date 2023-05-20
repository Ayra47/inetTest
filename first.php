<?php

abstract class ObjectBehavior 
{
    public abstract function doAction();
}

class MyObject
{
    public function doSomething() {}
}

function handleObjects(ObjectBehavior $behavior, MyObject $object) {
    $behavior->doAction();
    $object->doSomething();
}