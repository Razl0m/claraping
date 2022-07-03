<?php
class dbConnect
{
    public $logs = [];

    public function __construct($FileName)
    {
        if (file_exists($FileName)) {
            $this->dbSettings = parse_ini_file($FileName);
            $this->host = $this->dbSettings['host'];
            $this->dbName = $this->dbSettings['dbName'];
            $this->username = $this->dbSettings['username'];
            $this->password = $this->dbSettings['password'];
            $this->unicod = $this->dbSettings['unicod'];
            $this->logs[] = "Successful parsed ini file";
        } else {
            $this->logs[] = "File with specified name doesn't exists";
        }
    }

    protected function connect()
    {
        try {
            // подключаемся к серверу
            $conn = new PDO("mysql:host=$this->host;dbname=$this->dbName;charset=$this->unicod;", $this->username, $this->password);
            $this->logs[] = "Database connection established";
            return $conn;
        } catch (PDOException $e) {
            $this->logs[] = "Connection failed: " . $e->getMessage();
        }
    }

    public function echoDebug()
    {
        var_dump($this->logs);
    }
}

class dbQueryingForm extends dbConnect
{

    public function Auth($dataPost)
    {
        $connection = $this->connect();
        $sql = "SELECT * FROM Users WHERE login = :login";
        $stmt = $connection->prepare("$sql");
        $stmt->bindValue(":login", $dataPost["login"]);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            foreach ($stmt as $row) {
                if (password_verify($dataPost["password"], $row["password"])) {
                    return $row;
                } else {
                    return 0;
                }
            }
        } else {
            return 0;
        }
    }

    public function Regit($dataPost)
    {
        $connection = $this->connect();
        $sql = "SELECT * FROM Users WHERE login = :login || email = :email";
        $stmt = $connection->prepare("$sql");
        $stmt->bindValue(":login", $dataPost["login"]);
        $stmt->bindValue(":email", $dataPost["email"]);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return -1;
        } else {
            $sql = "INSERT INTO users (login, password, email, role) VALUES (:login, :password, :email, :role)";
            $stmt = $connection->prepare("$sql");
            $password = password_hash($dataPost["password"], PASSWORD_DEFAULT);
            $stmt->bindValue(":login", $dataPost["login"]);
            $stmt->bindValue(":password", $password);
            $stmt->bindValue(":email", $dataPost["email"]);
            $stmt->bindValue(":role", "1");
            $stmt->execute();
            $sql = "SELECT * FROM Users WHERE login = :login && password = :password";
            $stmt = $connection->prepare("$sql");
            $stmt->bindValue(":login", $dataPost["login"]);
            $stmt->bindValue(":password", $password);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                foreach ($stmt as $row) {
                    return $row;
                }
            } else {
                return -1;
            }
        }
    }

    public function UpdateLogin($login, $newLogin)
    {
        $connection = $this->connect();
        $sql = "UPDATE Users SET login = :loginnew WHERE login = :login";
        $stmt = $connection->prepare("$sql");
        $stmt->bindValue(":login", $login);
        $stmt->bindValue(":loginnew", $newLogin);
        $stmt->execute();
    }

    public function UpdateEmail($login, $newEmail)
    {
        $connection = $this->connect();
        $sql = "UPDATE Users SET email = :newEmail WHERE login = :login";
        $stmt = $connection->prepare("$sql");
        $stmt->bindValue(":login", $login);
        $stmt->bindValue(":newEmail", $newEmail);
        $stmt->execute();
    }

    public function UpdatePassword($login, $newPassword)
    {
        $connection = $this->connect();
        $sql = "UPDATE Users SET password = :password WHERE login = :login";
        $stmt = $connection->prepare("$sql");
        $stmt->bindValue(":login", $login);
        $newPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $stmt->bindValue(":password", $newPassword);
        $stmt->execute();
    }

    public function NewTourist($fio, $passport, $gender, $birthday, $login)
    {
        $connection = $this->connect();
        // INSERT INTO News (img, newsHeader, newsText) VALUES('$img', '$newsHeader', '$newsText')
        $sql = "INSERT INTO tourists (fio, passport, gender, birthday) VALUES (:fio, :passport, :gender, :birthday)";
        $stmt = $connection->prepare("$sql");
        $stmt->bindValue(":fio", $fio);
        $stmt->bindValue(":passport", $passport);
        $stmt->bindValue(":gender", $gender);
        $stmt->bindValue(":birthday", $birthday);
        $stmt->execute();
        $sql = "SELECT idTourist FROM tourists WHERE fio = :fio";
        $stmt = $connection->prepare("$sql");
        $stmt->bindValue(":fio", $fio);
        $stmt->execute();
        foreach ($stmt as $row) {
            // echo $row["role"];
            $idRow = $row["idTourist"];
        }
        $sql = "SELECT idUser FROM users WHERE login = :login";
        $stmt = $connection->prepare("$sql");
        $stmt->bindValue(":login", $login);
        $stmt->execute();
        foreach ($stmt as $row) {
            // echo $row["role"];
            $idUser = $row["idUser"];
        }
        $sql = "INSERT INTO boundsTourists (idUser, idTourist) VALUES (:idUser, :idTourist)";
        $stmt = $connection->prepare("$sql");
        $stmt->bindValue(":idUser", $idUser);
        $stmt->bindValue(":idTourist", $idRow);
        $stmt->execute();
    }

    public function ShowTourist($iduser)
    {
        $connection = $this->connect();
        $sql = "SELECT tourists.* FROM tourists LEFT JOIN boundsTourists ON tourists.idTourist = boundsTourists.idTourist WHERE boundsTourists.idUser = :iduser";
        $stmt = $connection->prepare("$sql");
        $stmt->bindValue(":iduser", $iduser);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            echo '<section class="turists">
            <div class="turists__container">
                <h2 class="turists__title">Сохраненные туристы</h2>
                <div class="turists__cards">';
            foreach ($stmt as $row) {
                echo '<div class="turists__card card-turists">
                <p class="card-turists__fio">Фио: ' . $row["fio"] . '</p>
                <p class="card-turists__passport">Паспорт: ' . $row["passport"] . '</p>
                <p class="card-turists__gender">Пол: ' . $row["gender"] . '</p>
                <p class="card-turists__birthday">День рождениe: ' . $row["birthday"] . '</p>
                <a class="card-turists__link" href="user.php?delTourist=' . $row["idTourist"] . '">Удалить туриста</a>
                </div>';
            }
            echo '</div>
            </div>
        </section>';
        }
    }

    public function DelTourist($idTourist)
    {
        $connection = $this->connect();
        $sql = "DELETE FROM boundsTourists WHERE idTourist = :idTourist";
        $stmt = $connection->prepare("$sql");
        $stmt->bindValue(":idTourist", $idTourist);
        $stmt->execute();
        $sql = "DELETE FROM Tourists WHERE idTourist = :idTourist";
        $stmt = $connection->prepare("$sql");
        $stmt->bindValue(":idTourist", $idTourist);
        $stmt->execute();
    }

    public function ShowUsers()
    {
        $connection = $this->connect();
        $sql = "SELECT * FROM Users";
        $stmt = $connection->prepare("$sql");
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            foreach ($stmt as $row) {
                echo '<article class="users__item">
                <p class="users__id">id: ' . $row["idUser"] . '</p>
                <p class="users__login">login: ' . $row["login"] . '</p>
                <p class="users__email">email: ' . $row["email"] . '</p>
                <div class="users__line">
                    <p class="users__role">role: ' . $row["role"] . '</p>
                    <a href="user.php?userUp=' . $row["idUser"] . '" class="users__role-up">Повысить</a>
                    <a href="user.php?userDown=' . $row["idUser"] . '" class="users__role-up">Понизить</a>
                </div>
                <a href="user.php?deleteUser=' . $row["idUser"] . '" class="users_delete">Удалить пользователя</a>
            </article>';
            }
        }
    }

    public function ActionWithUser($id, $action)
    {
        if ($action == "delete") {
            $connection = $this->connect();
            $sql = "DELETE FROM users WHERE idUser = :id";
            $stmt = $connection->prepare("$sql");
            $stmt->bindValue(":id", $id);
            $stmt->execute();
        } elseif ($action == "userUp") {
            $connection = $this->connect();
            $sql = "SELECT * FROM Users Where idUser = :id";
            $stmt = $connection->prepare("$sql");
            $stmt->bindValue(":id", $id);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                foreach ($stmt as $row) {
                    $PastRole = $row["role"];
                }
            }
            if ($PastRole < 3) {
                $NewRole = $PastRole + 1;
            } else {
                $NewRole = $PastRole;
            }

            $sql = "UPDATE Users SET role = :NewRole WHERE idUser = :id";
            $stmt = $connection->prepare("$sql");
            $stmt->bindValue(":NewRole", $NewRole);
            $stmt->bindValue(":id", $id);
            $stmt->execute();
        } elseif ($action == "userDown") {
            $connection = $this->connect();
            $sql = "SELECT * FROM Users Where idUser = :id";
            $stmt = $connection->prepare("$sql");
            $stmt->bindValue(":id", $id);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                foreach ($stmt as $row) {
                    $PastRole = $row["role"];
                }
            }
            if ($PastRole > 1) {
                $NewRole = $PastRole - 1;
            } else {
                $NewRole = $PastRole;
            }

            $sql = "UPDATE Users SET role = :NewRole WHERE idUser = :id";
            $stmt = $connection->prepare("$sql");
            $stmt->bindValue(":NewRole", $NewRole);
            $stmt->bindValue(":id", $id);
            $stmt->execute();
        }
    }

    public function subscription($email)
    {
        $connection = $this->connect();
        $sql = "SELECT * FROM Subscription WHERE email = :email";
        $stmt = $connection->prepare("$sql");
        $stmt->bindValue(":email", $email);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return;
        } else {
            $sql = "INSERT INTO Subscription (Email) VALUES (:email)";
            $stmt = $connection->prepare("$sql");
            $stmt->bindValue(":email", $email);
            $stmt->execute();
        }
    }

    public function ShowNews($three = true)
    {
        $connection = $this->connect();
        $sql = "SELECT * FROM News";
        $stmt = $connection->prepare("$sql");
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $i = 0;
            foreach ($stmt as $row) {
                $i++;
                if ($i > 3 && $three == true) {
                    break;
                }
                echo '<div class="news__item">
                <div class="item-news">
                    <div class="item-news_photo">
                        <picture>
                            <source srcset="' . $row["imgPath"] . '.webp" type="image/webp"><img src="' . $row["imgPath"] . '.jpg" alt="news">
                        </picture>
                    </div>
                    <div class="item-news__body">
                        <h3 class="item-news__title">' . $row["title"] . '</h3>
                        <p class="item-news__paragraph">
                        ' . substr($row["paragraph"], 1, 110)  . '...
                        </p>
                        <a href="news.php?article=' . $row["idNews"] . '" class="item-news__read-all">Читать дальше</a>
                    </div>
                </div>
            </div>';
            }
        }
    }

    public function ShowExcursions()
    {
        $connection = $this->connect();
        $sql = "SELECT * FROM excursions";
        $stmt = $connection->prepare("$sql");
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $i = 0;
            foreach ($stmt as $row) {
                $i++;
                if ($i > 3) {
                    break;
                }
                echo '<div class="excursions__item">
                <a href=excursions.php?article="' . $row["idExcursion"] . '" class="item-excursions">
                    <div class="item-excursions_photo">
                        <picture>
                            <source srcset="' . $row["imgPath"] . '.webp" type="image/webp"><img src="' . $row["imgPath"] . '.jpg" alt="andaman">
                        </picture>
                    </div>
                    <div class="item-excursions__body">
                        <h3 class="item-excursions__title">' . $row["name"] . '</h3>
                        <p class="item-excursions__paragraph">' . substr($row["Paragraph"], 0, 350) . '...</p>
                    </div>
                </a>
            </div>';
            }
        }
    }

    public function ShowAgency()
    {
        $connection = $this->connect();
        $sql = "SELECT * FROM Agency";
        $stmt = $connection->prepare("$sql");
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $i = 0;
            foreach ($stmt as $row) {
                $i++;
                if ($i > 3) {
                    break;
                }
                echo '<div class="agency__item">
                <div class="item-agency">
                    <div class="item-agency_photo">
                        <picture>
                            <source srcset="' . $row["imgPath"] . '.webp" type="image/webp"><img src="' . $row["imgPath"] . '.jpg" alt="Алексей шевцов">
                        </picture>
                    </div>
                    <div class="item-agency__body">
                        <h3 class="item-agency__title">' . $row["title"] . '</h3>
                        <p class="item-agency__subtitle">' . $row["subtitle"] . '</p>
                        <p class="item-agency__paragraph">
                        ' . substr($row["paragraph"], 0, 350) . '...
                        </p>
                    </div>
                </div>
            </div>';
            }
        }
    }

    public function ShowTours()
    {
        $connection = $this->connect();
        $sql = "SELECT * FROM Hotels";
        $stmt = $connection->prepare("$sql");
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $i = 0;
            foreach ($stmt as $row) {
                $i++;
                if ($i > 3) {
                    break;
                }
                echo '<div class="tours__item">
                <a href="tours.php?id=' . $row["idHotel"] . '" class="item-tours">
                    <div class="item-tours_photo">
                        <picture>
                            <source srcset="' . $row["imgPath"] . '.webp" type="image/webp"><img src="' . $row["imgPath"] . '.jpg" alt="island beach">
                        </picture>
                    </div>
                    <div class="item-tours__body">
                        <h3 class="item-tours__title">' . $row["name"] . '</h3>
                        <div class="item-tours__preference">
                            <div class="item-tours__stars">
                                <img src="img/icons/5star.svg" alt="star">
                            </div>
                            <div class="item-tours__convenient">
                                <div class="item-tours__dishes">
                                    <img src="img/icons/dish.svg" alt="dish">
                                </div>
                                <div class="item-tours__wifi">
                                    <img src="img/icons/wifi.svg" alt="wifi">
                                </div>
                                <div class="item-tours__persons">
                                    <img src="img/icons/users-black.svg" alt="2 persons">
                                </div>
                            </div>
                        </div>
                        <p class="item-tours__country">' . $row["Country"] . '</p>
                        <p class="item-tours__paragraph">
                        ' . $row["description"] . '
                        </p>
                    </div>
                </a>
            </div>';
            }
        }
    }

    public function ShowToursAll()
    {
        $connection = $this->connect();
        $sql = "SELECT * FROM Hotels";
        $stmt = $connection->prepare("$sql");
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            foreach ($stmt as $row) {
                echo '<div class="tours__item">
                <a href="tours.php?id=' . $row["idHotel"] . '" class="item-tours">
                    <div class="item-tours_photo">
                        <picture>
                            <source srcset="' . $row["imgPath"] . '.webp" type="image/webp"><img src="' . $row["imgPath"] . '.jpg" alt="island beach">
                        </picture>
                    </div>
                    <div class="item-tours__body">
                        <h3 class="item-tours__title">' . $row["name"] . '</h3>
                        <div class="item-tours__preference">
                            <div class="item-tours__stars">
                                <img src="img/icons/5star.svg" alt="star">
                            </div>
                            <div class="item-tours__convenient">
                                <div class="item-tours__dishes">
                                    <img src="img/icons/dish.svg" alt="dish">
                                </div>
                                <div class="item-tours__wifi">
                                    <img src="img/icons/wifi.svg" alt="wifi">
                                </div>
                                <div class="item-tours__persons">
                                    <img src="img/icons/users-black.svg" alt="2 persons">
                                </div>
                            </div>
                        </div>
                        <p class="item-tours__country">' . $row["Country"] . '</p>
                        <p class="item-tours__paragraph">
                        ' . $row["description"] . '
                        </p>
                    </div>
                </a>
            </div>';
            }
        }
    }

    public function SearchTour($country)
    {
        $connection = $this->connect();
        $sql = "SELECT * FROM Hotels WHERE Country = :country";
        $stmt = $connection->prepare("$sql");
        $stmt->bindValue(":country", $country);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            foreach ($stmt as $row) {
                echo '<div class="tours__item">
                <a href="tours.php?id=' . $row["idHotel"] . '" class="item-tours">
                    <div class="item-tours_photo">
                        <picture>
                            <source srcset="' . $row["imgPath"] . '.webp" type="image/webp"><img src="' . $row["imgPath"] . '.jpg" alt="island beach">
                        </picture>
                    </div>
                    <div class="item-tours__body">
                        <h3 class="item-tours__title">' . $row["name"] . '</h3>
                        <div class="item-tours__preference">
                            <div class="item-tours__stars">
                                <img src="img/icons/5star.svg" alt="star">
                            </div>
                            <div class="item-tours__convenient">
                                <div class="item-tours__dishes">
                                    <img src="img/icons/dish.svg" alt="dish">
                                </div>
                                <div class="item-tours__wifi">
                                    <img src="img/icons/wifi.svg" alt="wifi">
                                </div>
                                <div class="item-tours__persons">
                                    <img src="img/icons/users-black.svg" alt="2 persons">
                                </div>
                            </div>
                        </div>
                        <p class="item-tours__country">' . $row["Country"] . '</p>
                        <p class="item-tours__paragraph">
                        ' . $row["description"] . '
                        </p>
                    </div>
                </a>
            </div>';
            }
        }
    }

    public function Tour($id)
    {
        $connection = $this->connect();
        $sql = "SELECT * FROM Hotels WHERE idHotel = :id";
        $stmt = $connection->prepare("$sql");
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            foreach ($stmt as $row) {
                echo '<div class="tours__item tours__item_full">
                <div class="item-tours">
                    <div class="item-tours_photo">
                        <picture>
                            <source srcset="' . $row["imgPath"] . '.webp" type="image/webp"><img src="' . $row["imgPath"] . '.jpg" alt="island beach">
                        </picture>
                    </div>
                    <div class="item-tours__body">
                        <h3 class="item-tours__title">' . $row["name"] . '</h3>
                        <div class="item-tours__preference">
                            <div class="item-tours__stars">
                                <img src="img/icons/5star.svg" alt="star">
                            </div>
                            <div class="item-tours__convenient">
                                <div class="item-tours__dishes">
                                    <img src="img/icons/dish.svg" alt="dish">
                                </div>
                                <div class="item-tours__wifi">
                                    <img src="img/icons/wifi.svg" alt="wifi">
                                </div>
                                <div class="item-tours__persons">
                                    <img src="img/icons/users-black.svg" alt="2 persons">
                                </div>
                            </div>
                        </div>
                        <p class="item-tours__country">' . $row["Country"] . '</p>
                        <p class="item-tours__paragraph">
                        ' . $row["description"] . '
                        </p>
                        <a class="item-tours__buy" href="tours.php?buy=' . $row["idHotel"] . '">Забронировать</a>    
                    </div>
                </div>
            </div>';
            }
        }
    }

    public function BookingTour($booking)
    {
        $connection = $this->connect();
        $sql = "SELECT tourists.* FROM tourists LEFT JOIN boundsTourists ON tourists.idTourist = boundsTourists.idTourist WHERE boundsTourists.idUser = :iduser";
        $stmt = $connection->prepare("$sql");
        $stmt->bindValue(":iduser", $booking["idUser"]);
        $stmt->execute();
        $amountTurists = $stmt->rowCount();
        $idTourist = [];
        if ($stmt->rowCount() > 0) {
            foreach ($stmt as $row) {
                $idTourist[] = $row["idTourist"];
            }
        }


        $sql = "SELECT * FROM hotels WHERE idHotel = :id";
        $stmt = $connection->prepare("$sql");
        $stmt->bindValue(":id", $booking["idHotel"]);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            foreach ($stmt as $row) {
                $priceHotel = $row["price"];
            }
        }

        $sql = "SELECT * FROM airplanesRaces WHERE idRace = :id";
        $stmt = $connection->prepare("$sql");
        $stmt->bindValue(":id", 1);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            foreach ($stmt as $row) {
                $priceAir = $row["price"];
            }
        }
        $finalValue = [];
        $finalValue["idHotel"] = $booking["idHotel"];
        $finalValue["idRace"] = 1;
        $finalValue["start_date"] = $booking["start_date"];
        $finalValue["amountNights"] = $booking["amountNights"];
        $finalValue["idTourists"] = $idTourist;


        $finalValue["price"] = (intval($amountTurists) * intval($priceAir)) * 2 + (intval($amountTurists) * intval($priceHotel)) * intval($booking["amountNights"]);
        $finalValue["price"] += 15000;

        return $finalValue;
    }

    public function ChargTour($finalValue)
    {
        $connection = $this->connect();
        foreach ($finalValue["idTourists"] as $value) {
            $sql = "INSERT INTO tours (idHotel, idRace, start_date, amountNights, idTourist, Price) VALUES (:idHotel, :idRace, :startDate, :amountNights, :idTourist, :Price)";
            $stmt = $connection->prepare("$sql");
            $stmt->bindValue(":idHotel", $finalValue["idHotel"]);
            $stmt->bindValue(":idRace", $finalValue["idRace"]);
            $date = date('Y-m-d', strtotime($finalValue["start_date"]));
            $stmt->bindValue(":startDate", $date);
            $stmt->bindValue(":amountNights", $finalValue["amountNights"]);
            $stmt->bindValue(":idTourist", $value);
            $stmt->bindValue(":Price", $finalValue["price"]);
            $stmt->execute();

            $sql = "SELECT idTour FROM tours ORDER BY `idTour` DESC LIMIT 1";
            $stmt = $connection->prepare("$sql");
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                foreach ($stmt as $row) {
                    $lastTour = $row["idTour"];
                }
            }

            $sql = "INSERT INTO incomeSummary (idIncomeCategory, total, date, idTour) VALUES ('1', '15000', CURRENT_DATE(), :idtour)";
            $stmt = $connection->prepare("$sql");
            $stmt->bindValue(":idtour", $lastTour);
            $stmt->execute();
        }
    }

    public function Test($loginsearch)
    {
        $connection = $this->connect();
        $sql = "SELECT idUser FROM users WHERE login = :loginsearch";
        $stmt = $connection->prepare("$sql");
        $stmt->bindValue(":loginsearch", $loginsearch);
        $stmt->execute();
        foreach ($stmt as $row) {
            // echo $row["role"];
            return $row["idUser"];
        }
    }
}
