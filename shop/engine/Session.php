<?php


namespace app\engine;


class Session
{
    public function regenerate()
    {
        session_regenerate_id();
    }

    public function destroy()
    {
        session_destroy();
    }

    public function getId()
    {
        return session_id();
    }

    public function set($name, $value)
    {
        $_SESSION[$name] = $value;
    }

    public function get($name)
    {
        return $_SESSION[$name];
    }
}