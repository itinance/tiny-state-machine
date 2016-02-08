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

namespace itinance\TinyStateMachine;

/**
 * Class StateMachine
 *
 * @package itinance\TinyStateMachine
 */
class StateMachine
{
    /**
     * @var StateMachine
     */
    private static $instance = null;

    /**
     * @var array
     */
    private $states;

    /**
     * @param array $initialStates optional
     */
    public function __construct($initialStates = [])
    {
        if (static::$instance === null) {
            static::$instance = $this;
        }
        $this->states = $initialStates;
    }

    /**
     * @param string $stateName
     * @param mixed  $value
     * @return StateMachine
     */
    public function setState($stateName, $value = null)
    {
        $this->states[$stateName] = $value;

        return $this;
    }

    /**
     * @param string $stateName
     * @param mixed  $default
     * @return mixed
     */
    public function getState($stateName, $default = null)
    {
        return array_key_exists($stateName, $this->states) ? $this->states[$stateName] : $default;
    }

    /**
     * @param string $stateName
     * @return bool
     */
    public function hasState($stateName)
    {
        return array_key_exists($stateName, $this->states);
    }

    /**
     * @param $stateName
     * @param $value
     * @return bool
     */
    public function hasStateWithValue($stateName, $value)
    {
        if (array_key_exists($stateName, $this->states)) {
            return $this->states[$stateName] === $value;
        }

        return false;
    }

    /**
     * @return StateMachine
     */
    static public function instance()
    {
        if (static::$instance === null) {
            return new StateMachine();
        }

        return static::$instance;
    }
}
