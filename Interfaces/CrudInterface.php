<?php

namespace Interfaces;

Interface CrudInterface {
    public function read();
    public function create();
    public function show($id);
    public function update();
    public function delete();
}