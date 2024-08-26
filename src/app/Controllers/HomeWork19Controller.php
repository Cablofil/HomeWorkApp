<?php

class HomeWork19Controller
{
    use Validator;

    private PDO $pdo;
    private MySqlQueryBuilder $builder;
    private Manufacturer $manufacturers;

    public function __construct()                                               // щоб не робити окремий клас, але і не дублювати виніс так
    {
        $this->pdo = Connector::getInstance();
        $this->builder = new MySqlQueryBuilder();
        $this->manufacturers = new Manufacturer($this->pdo, $this->builder);
    }

    public function index()
    {
        try {
            $sql = $this->builder->select($this->manufacturers->getTable(), ['full_name', 'short_name'])->getSql();

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($this->builder->getValues());

            echo "<pre>";
            print_r($stmt->fetchAll(PDO::FETCH_OBJ));
            echo "</pre>";

        } catch (PDOException $exception) {
            $this->handleException($exception);
        }
    }

    public function show()
    {
        $query = Request::getData();

        $id = (int)$query['id'];

        try {
            $this->idValidator($id);

            $manufacturerObj = $this->manufacturers->find($id);

            echo "<pre>";
            print_r($manufacturerObj);
            echo "</pre>";

        } catch (PDOException $exception) {
            $this->handleException($exception);
        }
    }

    public function createManufacturer(): void
    {
        require_once APP_DIR . 'views/createManufacturer.php';
    }

    public function create()
    {
        try {
            $full_name = Request::get('full_name');
            $short_name = Request::get('short_name');

            $this->validateString($full_name, 3, 255, true);
            $this->validateString($short_name, 3,50, true);

            $this->validateName($full_name);
            $this->validateName($short_name);

            $this->manufacturers->create([
                'full_name' => $full_name,
                'short_name' => $short_name,
            ]);

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
