<?php

namespace Francedepression\Bddconnect;


class Adherent extends User {
    public function __construct(private string $email,
                                private string $password,
                                private bool $newsletter,
                                private bool $hasdeclinedsurvey = false) {
        parent::__construct($email, $password);
    }

    public function getEmail() : string {
        return $this->email;
    }

    public function getNewsletter() : bool { return $this->newsletter; }

    public function hasDeclinedSurvey() : bool { return $this->hasdeclinedsurvey; }

}