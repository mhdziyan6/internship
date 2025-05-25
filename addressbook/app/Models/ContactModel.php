<?php

namespace App\Models;

use CodeIgniter\Model;

class ContactModel extends Model
{
    protected $table            = 'contacts';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;

    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields = [
        'name',
        'email',
        'phone',
        'address',
        'location',
        'job_position',
        'tag'
    ];

    // Timestamps
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Validation
    protected $validationRules = [
        'name'         => 'required|min_length[2]',
        'email'        => 'required|valid_email',
        'phone'        => 'required|min_length[7]',
        'address'      => 'required',
        'location'     => 'required',
        'job_position' => 'required',
    ];

    protected $validationMessages = [
        'email' => [
            'valid_email' => 'Please enter a valid email address.',
        ],
    ];

    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
}