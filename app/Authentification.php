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

        if($_SESSION['user']) {
            throw new Exception("Vous êtes déjà connecté");
        }

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
    public function authenticate_adherent(string $email, string $password) : bool {
        if($_SESSION['user']) {
            throw new Exception("Vous êtes déjà connecté");
        }
        $user = $this->userRepository->findAdherentByEmail($email);
        if(!$user || !password_verify($password, $user->getPassword())) {
            throw new Exception("Mot de pass ou email invalide");
        }
        return true;
    }

    /**
     * @throws Exception
     */
    public function authenticate_admin(string $email, string $password) : bool {
        if($_SESSION['admin']) {
            throw new Exception("Vous êtes déjà connecté");
        }
        $user = $this->userRepository->findAdminByEmail($email);
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

    /**
     * @throws Exception
     */
    public function isSurveyCompleted(string $email) : bool {
        $adherent = $this->userRepository->findAdherentByEmail($email);
        if ($adherent && $adherent->isSurveyCompleted()) {
            throw new Exception("Vous avez déjà participé à l'enquête");
        }
        return false;
    }

  private function invalideEmail(string $email) : bool {
    $email = trim($email);
    return !filter_var($email, FILTER_VALIDATE_EMAIL);
  }

    /**
     * @throws Exception
     */
    public function register_admin(string $email, string $password) : bool {

        if($this->invalideEmail($email)) {
            throw new Exception("Email invalide");
        }
        if($this->userRepository->findAdminByEmail($email)) {
            throw new Exception("Utilisateur déjà enregistré");
        }

        $admin = new Admin($email, $password);

        return $this->userRepository->saveAdmin($admin);
    }

}