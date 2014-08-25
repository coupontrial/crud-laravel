<?php
/**
 * Created by PhpStorm.
 * User: LAB
 * Date: 8/25/14
 * Time: 11:59 AM
 */

class Product extends Eloquent{
    public $timestamps = false;
    protected $fillable = array('title', 'image');

} 