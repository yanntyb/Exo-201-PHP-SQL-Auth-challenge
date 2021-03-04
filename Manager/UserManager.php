<?php


class UserManager
{
    private ?PDO $db;

    /**
     * RandoManager constructor.
     */
    public function __construct(){
        $this->db = DB::getInstance();
    }

    /**
     * @return array
     */
    public function getUsers(): array{
        $users = [];
        $conn = $this->db->prepare("SELECT * FROM user");
        if($conn->execute()){
            foreach($conn->fetchAll() as $item){
                //Create object with Article type
                $user = new User($item["id"]);
                $user
                    ->setName($item["name"])
                    ->setPass($item["pass"])
                ;
                $users[] = $user;
            }
        }
        return $users;
    }

    /**
     * @param User $user
     * @return bool
     */
    public function passAsh(User $user): bool{
        if($user->getId()){
            $conn = $this->db->prepare("
                UPDATE user SET
                    pass = :pass,
                    encode = 1
                WHERE id = :id AND encode = 0
            ");

            $conn->bindValue(":id", $user->getId());
            $conn->bindValue(":pass" , password_hash($user->getPass(), PASSWORD_DEFAULT));

            return $conn->execute();
        }
        return false;
    }

}