<?php
function get_user()
    {
        $data = session('user');
        return $data;
    }
