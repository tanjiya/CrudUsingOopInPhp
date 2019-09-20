<?php

namespace Interfaces;

Interface ValidationInterface {
    public function check_empty_field($data, $fields);
    public function is_valid_data($name);
    public function is_valid_email($email);
    public function is_valid_website($website);
}