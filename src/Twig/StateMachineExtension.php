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

namespace itinance\TinyStateMachine\Twig;

use itinance\TinyStateMachine\StateMachine;
use Twig_Extension;

/**
 * Class StateMachineExtension
 *
 * @package TinyStateMachine\Twig
 */
class StateMachineExtension extends Twig_Extension
{
    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName ()
    {
        return 'StateMachine Extension';
    }

    /**
     * @inheriteddocs
     */
    public function getFunctions ()
    {
        return array(
            new \Twig_SimpleFunction('hasState', [$this, 'hasState']),
            new \Twig_SimpleFunction('getState', [$this, 'getState']),
            new \Twig_SimpleFunction('hasStateWithValue', [$this, 'hasStateWithValue']),
        );
    }

    /**
     * @param $stateName
     * @return bool
     */
    public function hasState($stateName)
    {
        return StateMachine::instance()->hasState($stateName);
    }

    /**
     * @param string $stateName
     * @return mixed
     */
    public function getState($stateName)
    {
        return StateMachine::instance()->getState($stateName);
    }

    /**
     * @param string $stateName
     * @param mixed $value
     * @return bool
     */
    public function hasStateWithValue($stateName, $value)
    {
        return StateMachine::instance()->hasStateWithValue($stateName, $value);
    }

}
