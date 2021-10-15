<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
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

    // Subscription
    public $subscribe = [
        'email' => [
			'label' => 'Email',
			'rules' => 'required|valid_email',
			'errors' => [
				'required' => '{field} harus diisi.',
				'valid_email' => '{field} harus valid.',
			],
		],
    ];

    // Login Admin
    public $login_admin = [
        'username' => [
            'label' => 'Username',
            'rules' => 'required',
            'errors' => [
                'required' => '{field} harus diisi.',
            ],
        ],
        'password' => [
            'label' => 'Password',
            'rules' => 'required',
            'errors' => [
                'required' => '{field} harus diisi.',
            ],
        ],
    ];
}
