<?php
include_once '../DAO/Connection.DAO.php';
include_once '../Model/Category.Model.php';

class CategoryDAO extends Connection
{
    public function insert(Category $Category)
    {
        try {
            $connection = $this->getConnection();
            $connection->beginTransaction();
            
            $sql = 'INSERT INTO category (Name) VALUES (?)';
            
            $stmt = $connection->prepare($sql);
            $stmt->bindValue(1, $Category->getName(), PDO::PARAM_STR);
            
            $executionResult = $stmt->execute();
            
            if ($executionResult) {
                $connection->commit();
                return true;
            } else {
                throw new PDOException('Execution Error. ' . $stmt->errorCode() . ' - '
                        . implode($stmt->errorInfo()));
            }
            
        } catch (PDOException $e) {
            if ((isset($connection)) && ($connection->inTransaction())) {
                $connection->rollBack();
            }
            
            echo $e->getMessage();
            return false;
            
        } finally {
            if (isset($connection)) {
                unset($connection);
            }
        }
    }

    public function select($where = '')
    {
        try{
            $connection = $this->getConnection();

            $sql = 'SELECT Id, Name, Status, Register_Date, Modified_Date FROM category '. $where;
            $stmt = $connection->prepare($sql);
            $executionResult = $stmt->execute();
            
            if ($executionResult) {
                return $stmt->fetchAll(PDO::FETCH_CLASS, 'Category');   
            } else {
                throw new PDOException('Execution Error.' . $stmt->errorCode() . ' - ' .
                implode($stmt->errorInfo()));
            }   
        } catch (PDOException $exc) {
            if ((isset($connection)) && ($connection->inTransaction())) {
                $connection->rollBack();
            }
            
            echo $exc->getMessage();
            return false;
        } finally {
            if (isset($connection)) {
                unset($connection);
            }
        }
    }

    public function update(Category $Category)
    {
        try {
            $connection = $this->getConnection();
            $connection->beginTransaction();

            $sql = 'UPDATE category SET Name = ? WHERE Id = ? ';

            $stmt = $connection->prepare($sql);
            $stmt->bindValue(1, $Category->getName(), PDO::PARAM_STR);
            $stmt->bindValue(2, $Category->getId(), PDO::PARAM_INT);

            $executionResult = $stmt->execute();
            
            if ($executionResult) {
                $connection->commit();
                return true;
            } else {
                throw new PDOException('Execution Error.' . $stmt->errorCode() . ' - ' .
                implode($stmt->errorInfo()));
            }
            
        } catch (PDOException $exc) {
            if ((isset($connection)) && ($connection->inTransaction())) {
                $connection->rollBack();
            }
            
            echo $exc->getMessage();
            return false;
        } finally {
            if (isset($connection)) {
                unset($connection);
            }
        }
    }

    public function delete(Category $Category)
    {
        try {
            $connection = $this->getConnection();
            $connection->beginTransaction();

            $sql = "DELETE FROM category WHERE Id = ?";

            $stmt = $connection->prepare($sql);
            $stmt->bindValue(1, $Categoria->getId(), PDO::PARAM_INT);
            
            $executionResult = $stmt->execute();
            
            if ($executionResult) {
                $connection->commit();
                return true;
            } else {
                throw new PDOException("Execution Error." . $stmt->errorCode() . " - " .
                implode($stmt->errorInfo()));
            }
            
        } catch (PDOException $exc) {
            if ((isset($connection)) && ($connection->inTransaction())) {
                $connection->rollBack();
            }
            
            echo $exc->getMessage();
            return false;
        } finally {
            if (isset($connection)) {
                unset($connection);
            }
        }
    }
    
    public function disable(Category $Category)
    {
        try {
            $connection = $this->getConnection();
            $connection->beginTransaction();

            $sql = 'UPDATE category SET Status = 0 WHERE Id = ? ';

            $stmt = $connection->prepare($sql);
            $stmt->bindValue(1, $Category->getId(), PDO::PARAM_INT);

            $executionResult = $stmt->execute();
            
            if ($executionResult) {
                $connection->commit();
                return true;
            } else {
                throw new PDOException('Execution Error.' . $stmt->errorCode() . ' - ' .
                implode($stmt->errorInfo()));
            }
            
        } catch (PDOException $exc) {
            if ((isset($connection)) && ($connection->inTransaction())) {
                $connection->rollBack();
            }
            
            echo $exc->getMessage();
            return false;
        } finally {
            if (isset($connection)) {
                unset($connection);
            }
        }
    }

    public function enable(Category $Category)
    {
        try {
            $connection = $this->getConnection();
            $connection->beginTransaction();

            $sql = 'UPDATE category SET Status = 1 WHERE Id = ? ';

            $stmt = $connection->prepare($sql);
            $stmt->bindValue(1, $Category->getId(), PDO::PARAM_INT);

            $executionResult = $stmt->execute();
            
            if ($executionResult) {
                $connection->commit();
                return true;
            } else {
                throw new PDOException('Execution Error.' . $stmt->errorCode() . ' - ' .
                implode($stmt->errorInfo()));
            }
            
        } catch (PDOException $exc) {
            if ((isset($connection)) && ($connection->inTransaction())) {
                $connection->rollBack();
            }
            
            echo $exc->getMessage();
            return false;
        } finally {
            if (isset($connection)) {
                unset($connection);
            }
        }
    }
}
