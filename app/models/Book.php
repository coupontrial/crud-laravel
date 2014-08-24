<?php


class Book extends Eloquent
{
    protected $fillable = array('isbn', 'title','author','publisher','language');
}