<?php

namespace damianbal\QuizAPI\Entities;

use damianbal\enterium\Entity;

class User extends Entity
{
    protected static $table = 'users';

    /**
     * Attributes, fields from Table
     *
     * @var array
     */
    protected static $attributes = ['username', 'password'];
}