<?php

abstract class AbstractObjectHandler 
{
    abstract public function handle(SomeObject $object) : string;
}

class Object1Handler implements AbstractObjectHandler
{
    public function handle(SomeObject $object) : string {
        return 'handle_object_1';
    }
}

class Object2Handler implements AbstractObjectHandler
{
    public function handle(SomeObject $object) : string {
        return 'handle_object_2';
    }
}


class SomeObject {
    protected $name;

    public function __construct(string $name) { }

    public function getObjectName() { }
}

class SomeObjectsHandler {
    protected $handler;

    public function __construct(AbstractObjectHandler $handler) {
        $this->handler = $handler;
    }

    public function handleObjects(array $objects): array {
        $handlers = [];
        foreach ($objects as $object) {
            $handlers[] = $this->handler->handle($object);
        }

        return $handlers;
    }
}

$soh = new SomeObjectsHandler(new Object1Handler());
$soh2 = new SomeObjectsHandler(new Object2Handler());