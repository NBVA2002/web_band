<?php
    class Session {
        static function init() {
            session_start();
        }
        static function set($key, $value) {
            $_SESSION[$key] = $value;
        }
        static function get($key) {
            if (isset($_SESSION[$key])) {
                return $_SESSION[$key];
            }
            return FALSE;
        }
        static function destroy() {
            session_destroy();
        }
        static function unset($key) {
            session_unset($key);
        }
    }
?>