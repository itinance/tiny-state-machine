# TinyStateMachine


This StateMachine enables to set some state in an application and to request this state elsewhere, even in Twig.

Setting state:

```
StateMachine::instance()->setState('Foobar');
```

Setting state with value:

```
StateMachine::instance()->setState('Foobar', 'barfoo');
```

Request state:

```
StateMachine::instance()->getState('Foobar' /* , $default */);

StateMachine::instance()->hasState('Foobar');
StateMachine::instance()->hasStateWithValue('Foobar', 'barfoo');
```

Twig:

```
{% if hasState('Foobar') %}
```


