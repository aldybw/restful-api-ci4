<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation extends BaseConfig
{
    //--------------------------------------------------------------------
    // Setup
    //--------------------------------------------------------------------

    /**
     * Stores the classes that contain the
     * rules that are available.
     *
     * @var string[]
     */
    public $ruleSets = [
        Rules::class,
        FormatRules::class,
        FileRules::class,
        CreditCardRules::class,
    ];

    /**
     * Specifies the views that are used to display the
     * errors.
     *
     * @var array<string, string>
     */
    public $templates = [
        'list'   => 'CodeIgniter\Validation\Views\list',
        'single' => 'CodeIgniter\Validation\Views\single',
    ];

    //--------------------------------------------------------------------
    // Rules
    //--------------------------------------------------------------------

    public $register = [
        'username' => [
            'rules' => 'required|min_length[5]|is_unique[users.username]'
        ],
        'password' => [
            'rules' => 'required'
        ],
        'firstname' => [
            'rules' => 'required'
        ],
        'lastname' => [
            'rules' => 'required'
        ],
        'age' => [
            'rules' => 'required|is_natural'
        ]
    ];

    public $updateUser = [
        'username' => [
            'rules' => 'required|min_length[5]|is_unique[users.username,id,{id}]'
        ],
        'password' => [
            'rules' => 'required'
        ],
        'firstname' => [
            'rules' => 'required'
        ],
        'lastname' => [
            'rules' => 'required'
        ],
        'age' => [
            'rules' => 'required|is_natural'
        ]
    ];
}
