<?php

function sum($v1, $v2)
{
    return $v1 + $v2;
}

test('example', function () {
    expect(sum(2, 3))->toBe(5);
});
