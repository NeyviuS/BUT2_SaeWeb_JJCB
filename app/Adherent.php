<?php

namespace Francedepression\Bddconnect;


class Adherent extends Admin
{
    public function __construct(private string $email,
                                private string $password,
                                private bool   $newsletter = false,
                                private bool   $hasdeclinedsurvey = false,
                                private bool   $surveyCompleted = false)
    {
        parent::__construct($email, $password);
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getNewsletter(): bool
    {
        return $this->newsletter;
    }

    public function hasDeclinedSurvey(): bool
    {
        return $this->hasdeclinedsurvey;
    }

    public function isSurveyCompleted(): bool
    {
        return $this->surveyCompleted;
    }

}