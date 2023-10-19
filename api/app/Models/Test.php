<?php

declare(strict_types = 1);

namespace App\Models;

use App\Helpers\Debug;
use App\Model;

class Test extends Model
{
    public function __construct(
        private string $myColumn = ''
    )
    {
        parent::__construct();
    }  

    public function create()
    {
        try {
            $this->database->beginTransaction();

            $statement = $this->database->prepare(
                <<<SQL
                    INSERT INTO tables
                        (my_column)
                    VALUES 
                        (:myColumn)
                SQL
            );
            $statement->bindValue(':myColumn', $this->getMyColumn());
            
            $statement->execute();
            
            $this->database->commit();

            return (int) $this->database->lastInsertId();
        } catch (\Exception $exception) {
            Debug::pd($exception->getMessage());
            $this->database->rollBack();
        }    
    }

        /**
         * Get the value of myColumn
         */ 
        public function getMyColumn()
        {
                return $this->myColumn;
        }
}