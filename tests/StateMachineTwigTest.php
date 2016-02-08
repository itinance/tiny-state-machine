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

use itinance\TinyStateMachine\StateMachine;
use itinance\TinyStateMachine\Twig\StateMachineExtension;

/**
 * Class StateMachineTwigTests
 */
class StateMachineTwigTests extends PHPUnit_Framework_TestCase
{
    public function testSetAndGetState()
    {
        $stateMachine = new StateMachine();
        $stateMachine->setState('FOO', 'bar');

        $twigExtension = new StateMachineExtension();

        $this->assertEquals('bar', $twigExtension->getState('FOO'));
        $this->assertTrue($twigExtension->hasState('FOO'));
    }

    public function testNotHasState()
    {
        $twigExtension = new StateMachineExtension();

        $stateMachine = new StateMachine();
        $stateMachine->setState('FOO', 'bar');

        $this->assertFalse($twigExtension->hasState('foo'));
        $this->assertTrue($twigExtension->hasState('FOO'));
    }

    public function testHasStateWithValue()
    {
        $twigExtension = new StateMachineExtension();

        $stateMachine = new StateMachine();
        $stateMachine->setState('FOO', 'bar');

        $this->assertTrue($twigExtension->hasStateWithValue('FOO', 'bar'));
        $this->assertFalse($twigExtension->hasStateWithValue('NOT PRESENT', 'foobar'));
    }

}