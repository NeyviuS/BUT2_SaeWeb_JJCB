<?php

namespace Francedepression\Bddconnect;

interface IUserRepository {
  public function saveAdherent(Adherent $adherent): bool;
  public function findAdherentByEmail(string $email): ? Adherent;
}