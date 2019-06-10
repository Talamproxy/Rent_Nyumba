<?php
class DB {

        private static function connect() {
                $pdo = new PDO('mysql:host=127.0.0.1;port=3306;dbname=rentnyum_rentnyumbake;charset=utf8', 'rentnyum_talam', 'encrypto1');
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return $pdo;
        }
        
        public static function query($query, $params = array()) {
                $statement = self::connect()->prepare($query);
                $statement->execute($params);

                if (explode(' ', $query)[0] == 'SELECT') {
                $data = $statement->fetchAll();
                return $data;
                }
        }

}
