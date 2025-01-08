<?php

namespace Francedepression\Bddconnect;

interface IUserRepository {
  public function saveAdherent(Adherent $adherent): bool;
  public function findAdherentByEmail(string $email): ? Adherent;

    public function findAdminByEmail(string $email): ? Admin;

    public function saveAdmin(Admin $admin) : bool;

    public function register_answer(string $email, array $anwser): bool;
}