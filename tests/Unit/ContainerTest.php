<?php

use Core\Container;

describe("Testing Container", function () {
    test('it can resolve something out of container', function () {
        $container = new Container();
        $container->bind("foo", fn() => "bar");
        $result = $container->resolve("foo");

        expect($result)->toBe("bar");
    });
});
