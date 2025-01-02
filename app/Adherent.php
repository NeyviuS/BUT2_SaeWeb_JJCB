<?php

namespace Francedepression\Bddconnect;

use Francedepression\Bddconnect\User;


class Adherent extends User {
    public function __construct(private string $email, private string $password, private bool $newsletter) {
        parent::__construct($email, $password);

    }

    public function getEmail() : string {
        return $this->email;
    }

    public function getNewsletter() : bool { return $this->newsletter; }

}