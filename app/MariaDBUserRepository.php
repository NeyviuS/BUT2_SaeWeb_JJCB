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
                $result['HasDeclinedSurvey'] === 1,
                $result['SurveyCompleted'] === 1);
        }
        return null;
    }

    public function declineSurvey(string $email): void {
        $stmt = $this->dbConnexion->prepare(
            "UPDATE Adhérent SET HasDeclinedSurvey = 1 WHERE email = :email"
        );
        $stmt->execute(['email' => $email]);
    }

    public function findAdminByEmail(string $email): ? Admin
    {
        $stmt = $this->dbConnexion->prepare(
        "SELECT * FROM Admin WHERE email = :email"
    );
        $stmt->execute(['email' => $email]);
        $result = $stmt->fetch(\PDO::FETCH_ASSOC);

        if ($result) {
            return new Admin($result['Email'], $result['Password']);
        }
        return null;
    }

    public function saveAdmin(Admin $admin): bool
    {
        $stmt = $this->dbConnexion->prepare(
            "INSERT INTO admin (Email, Password)
                    VALUES (:email, :password)"
        );

        return $stmt->execute([
            'email' => $admin->getEmail(),
            'password' => password_hash($admin->getPassword(), PASSWORD_DEFAULT),
        ]);
    }

    public function register_answer(string $email, array $anwser): bool {

        $stmt = $this->dbConnexion->prepare(
            "INSERT INTO ReponseEnquete(Age, SatisfactionLieu, recommandation,
            Suggestion, IdSituationH, IdRegion, IdSituationP) VALUES (
            :age, :satis, :recom, :suggestion, :idsituationh, :idregion, :idsituationp)"
        );

        $result =  $stmt->execute([
            'age' => $anwser['age'],
            'satis' => $anwser['satis-lieu'] === "oui" ? 1 : 0,
            'recom' => $anwser['recom-site'],
            'suggestion' => $anwser['message'],
            'idsituationh' => $this->getIdSituationH($_POST['situationh']),
            'idregion' => $this->getIdRegion($_POST['region']),
            'idsituationp' => $this->getIdSituationP($_POST['situationp'])
        ]);

        if ($result) {
            $stmt = $this->dbConnexion->prepare(
                "UPDATE Adhérent SET SurveyCompleted = 1 WHERE email = :email"
            );
            $stmt->execute(['email' => $email]);
        }

        return $result;
    }

    private function getIdSituationH(string $libelle) : int {
        $stmt = $this->dbConnexion->prepare(
            "SELECT IdSituation FROM SituationHebergement WHERE LibelleSituation = :libelleSituation"
        );

        $stmt->execute(['libelleSituation' => $libelle]);

        return $stmt->fetchColumn();
    }

    private function getIdSituationP(string $libelle) : int {
        $stmt = $this->dbConnexion->prepare(
            "SELECT IdSituation FROM SituationPersonnelle WHERE LibelleSituation = :libelleSituation"
        );

        $stmt->execute(['libelleSituation' => $libelle]);

        return $stmt->fetchColumn();
    }

    private function getIdRegion(string $nomregion) : int {
        $stmt = $this->dbConnexion->prepare(
            "SELECT IdRegion FROM Région WHERE NomRegion = :nomregion"
        );

        $stmt->execute(['nomregion' => $nomregion]);

        return $stmt->fetchColumn();
    }

}