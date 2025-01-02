<?php

namespace Francedepression\Bddconnect;

class MariaDBUserRepository implements IUserRepository
{

    public function __construct(private \PDO $dbConnexion)
    {
    }

    public function saveAdherent(Adherent $adherent): bool
    {
        $stmt = $this->dbConnexion->prepare(
            "INSERT INTO adhérent (Email, Password, Newsletter, HasDeclinedSurvey)
                    VALUES (:email, :password, :newsletter, :hasdeclinedsurvey)"
        );

        return $stmt->execute([
            'email' => $adherent->getEmail(),
            'password' => password_hash($adherent->getPassword(), PASSWORD_DEFAULT),
            'newsletter' => $adherent->getNewsletter() === true ? 1 : 0,
            'hasdeclinedsurvey' => $adherent->hasDeclinedSurvey() === true ? 1 : 0
        ]);
    }

    public function findAdherentByEmail(string $email): ? Adherent
    {
        $stmt = $this->dbConnexion->prepare(
            "SELECT * FROM Adhérent WHERE email = :email"
        );
        $stmt->execute(['email' => $email]);
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);

        if ($result) {
            return new Adherent($result['Email'], $result['Password'],
                $result['Newsletter'] === 1,
                $result['HasDeclinedSurvey'] === 1);
        }
        return null;
    }

    public function declineSurvey(string $email): void {
        $stmt = $this->dbConnexion->prepare(
            "UPDATE Adhérent SET HasDeclinedSurvey = 1 WHERE email = :email"
        );
        $stmt->execute(['email' => $email]);
    }

}