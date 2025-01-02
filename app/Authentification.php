<?php

namespace Francedepression\Bddconnect;

use Exception;

class Authentification {

  public function __construct(private IUserRepository $userRepository) { }

  /**
   * @throws Exception
   */
    public function register_adherent(string $email, string $password, string $repeat, bool $newsletter, bool $cgu) : bool {
        if($cgu !== true) throw new Exception("Vous devez accepter les CGU");

        if($password !== $repeat) {
            throw new Exception("Mots de passe différents");
        }
        if($this->invalideEmail($email)) {
            throw new Exception("Email invalide");
        }
        if($this->userRepository->findAdherentByEmail($email)) {
            throw new Exception("Utilisateur déjà enregistré");
        }

        $adherent = new Adherent($email, $password, $newsletter);

        return $this->userRepository->saveAdherent($adherent);
    }

    /**
     * @throws Exception
     */
    public function authenticate(string $email, string $password) : bool {
        $user = $this->userRepository->findAdherentByEmail($email);
        if(!$user || !password_verify($password, $user->getPassword())) {
            throw new Exception("Mot de pass ou email invalide");
        }
        return true;
    }

    public function hasDeclinedSurvey(string $email) : bool {
        $adherent = $this->userRepository->findAdherentByEmail($email);
        if ($adherent) {
            return $adherent->hasDeclinedSurvey();
        }
        return false;
    }

  private function invalideEmail(string $email) : bool {
    $email = trim($email);
    return !filter_var($email, FILTER_VALIDATE_EMAIL);
  }

}