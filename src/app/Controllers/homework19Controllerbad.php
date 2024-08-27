<?php

class homework19Controllerbad {          // назва класу має бути в StudlyCaps, дужка має бути з нового рядка

    use Validator;

    private PDO $pdo;
    private MySqlQueryBuilder $builder;
    private Manufacturer $manufacturers;

    public function __construct()
    {
        $this->pdo = Connector::getInstance();
        $this->builder = new MySqlQueryBuilder();
        $this -> manufacturers = new Manufacturer ( $this -> pdo , $this -> builder ) ;    // зайві пробіли
    }

    public function Index()                 // не однотипність стилю назв методів

        // сторока містить понад 80 символів та більше одного твердження, некоректні пробіли, некоректне оформлення try () catch () {} конструкції
    {try {$sql = $this->builder->select( $this->manufacturers->getTable(),['full_name','short_name'])->getSql();$stmt = $this->pdo->prepare($sql); $stmt->execute($this->builder->getValues());echo "<pre>"; print_r($stmt->fetchAll(PDO::FETCH_OBJ));echo "</pre>";
        } catch (PDOException $exception) {
            $this->handleException($exception);
        }
    }

    public function manufact()          // нелогічна і неочевидна назва методу
    {
        $query = Request::getData();

        $id = (int)$query['id'];

        try                                             // некоректне оформлення try () catch () {} конструкції
        { $this->idValidator($id);

            $manufacturerObj = $this->manufacturers->find($id);

            echo "<pre>";
            print_r($manufacturerObj);
            echo "</pre>";

        }
        catch(
            PDOException $exception){
            $this->handleException(
                $exception
            );
        }
    }

    public function Createmanufacturer(): void                      // назва методу має бути в camelCase
    {
        require_once APP_DIR . 'views/createManufacturer.php';
    }

    public function create()
    {
        try {
            $valuename1 = Request::get('full_name');   // назви змінних погано відображають, що в них містяться, між собою не узгоджуються, назва з двох слів вся в одному регістрі
            $value2 = Request::get('short_name');

            $this->validateString($valuename1, 3, 255, true);
            $this->validateString($value2, 3,50, true);

            $this->validateName($valuename1);
            $this->validateName($value2);

            $this->manufacturers            // некоректне оформлення виклику метода та передачі масиву
                ->
                create
            (
                [
                'full_name' => $valuename1,
                'short_name' => $value2,
            ]
            )
            ;

            Response::redirect(Request::referer());

        } catch (PDOException $exception) {
            $this->handleException($exception);
        }
    }

    private function handleException(PDOException $exception): void
    {
        echo $exception->getMessage();
    }
}
