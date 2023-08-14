<?php

namespace AvegaCms\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use AvegaCms\Libraries\Authentication\AvegaCmsUser;

class AvegaCmsAPI extends ResourceController
{
    protected object|null $userData       = null;
    protected object|null $userPermission = null;

    public function __construct()
    {
        helper(['avegacms', 'date']);
        $this->userData = AvegaCmsUser::data();
        $this->userPermission = AvegaCmsUser::permission();
    }
}
