<?php

namespace app\models;

interface IModel {
    public function getById($id);
    public function getAll();
    public function getTableName();
    public function showInfo();
    public static function getCount();
}