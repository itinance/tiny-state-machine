<?php
/******************************************************************************
 *
 * (C) ITinance GmbH, 2015, Gauting & Munich, Germany
 *
 * www.itinance.com
 *
 * The MIT License (MIT)
 *
 * Copyright (c) 2016 Hagen Hübel
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 *
 *
 * All rights reserved.
 *
 *****************************************************************************/

use itinance\TinyStateMachine\StateMachine\StateMachine;

/**
 * Class StateMachineTests
 */
class StateMachineTests extends PHPUnit_Framework_TestCase
{
    public function testSetAndGetState()
    {
        $stateMachine = new StateMachine();
        $stateMachine->setState('FOO', 'bar');

        $this->assertEquals('bar', $stateMachine->getState('FOO'));
        $this->assertTrue($stateMachine->hasState('FOO'));
    }

    public function testNotHasState()
    {
        $stateMachine = new StateMachine();
        $stateMachine->setState('FOO', 'bar');

        $this->assertFalse($stateMachine->hasState('foo'));
        $this->assertTrue($stateMachine->hasState('FOO'));
    }
}