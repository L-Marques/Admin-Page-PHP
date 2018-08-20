<?php
include_once '../DAO/Connection.DAO.php';
include_once '../Model/Product.Model.php';

class ProductDAO extends Connection
{
    public function Insert(Product $Product)
    {
        try {
            $connection = $this->getConnection();
            $connection->beginTransaction();
            
            $sql = 'INSERT INTO product (Name, Description, Price, Currency, Category_Id) VALUES (?, ?, ?, ?, ?)';
            
            $stmt = $connection->prepare($sql);
            $stmt->bindValue(1, $Product->getName(), PDO::PARAM_STR);
            $stmt->bindValue(2, $Product->getDescription(), PDO::PARAM_STR);
            $stmt->bindValue(3, $Product->getPrice());
            $stmt->bindValue(4, $Product->getCurrency(), PDO::PARAM_STR);
            $stmt->bindValue(5, $Product->getCategory_Id(), PDO::PARAM_INT);
            
            $executionResult = $stmt->execute();
            
            if($executionResult) {
                $connection->commit();
                return TRUE;
            } else {
                throw new PDOException('Execution Error. ' . $stmt->errorCode() . ' - '
                        . implode($stmt->errorInfo()));
            }
            
        } catch (PDOException $e){
            if((isset($connection)) && ($connection->inTransaction())) {
                $connection->rollBack();
            }
            
            echo $e->getMessage();
            return FALSE;
            
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

            $sql = 'SELECT (Id, Name, Description, Price, Currency, Category_Id, Category_Name, Status, Register_Date, Modified_Date) FROM product_category '. $where;
            
            $stmt = $connection->prepare($sql);
            $executionResult = $stmt->execute();
            
            if ($executionResult) {
                return $stmt->fetchAll(PDO::FETCH_CLASS, 'Product');   
            } else {
                throw new PDOException('Execution Error.' . $stmt->errorCode() . ' - ' .
                implode($stmt->errorInfo()));
            }   
        } catch (PDOException $exc) {
            if ((isset($connection)) && ($connection->inTransaction())) {
                $connection->rollBack();
            }
            
            echo $exc->getMessage();
            return FALSE;
        } finally {
            if (isset($connection)) {
                unset($connection);
            }
        }
    }

    public function update(Product $Product)
    {
        try {
            $connection = $this->getConnection();
            $connection->beginTransaction();

            $sql = 'UPDATE product SET Name = ?, Description = ?, Price = ?, Currency = ?, Category_Id = ? WHERE Id = ? ';

            $stmt = $connection->prepare($sql);
            $stmt->bindValue(1, $Product->getName(), PDO::PARAM_STR);
            $stmt->bindValue(2, $Product->getDescription(), PDO::PARAM_STR);
            $stmt->bindValue(3, $Product->getPrice());
            $stmt->bindValue(4, $Product->getCurrency(), PDO::PARAM_STR);
            $stmt->bindValue(5, $Product->getCategory_Id(), PDO::PARAM_INT);
            $stmt->bindValue(6, $Product->getId(), PDO::PARAM_INT);

            $executionResult = $stmt->execute();
            
            if ($executionResult) {
                $connection->commit();
                return TRUE;
            } else {
                throw new PDOException('Execution Error.' . $stmt->errorCode() . ' - ' .
                implode($stmt->errorInfo()));
            }
            
        } catch (PDOException $exc) {
            if ((isset($connection)) && ($connection->inTransaction())) {
                $connection->rollBack();
            }
            
            echo $exc->getMessage();
            return FALSE;
        } finally {
            if (isset($connection)) {
                unset($connection);
            }
        }
    }

    public function delete(Product $Product)
    {
        try {
            $connection = $this->getConnection();
            $connection->beginTransaction();

            $sql = "DELETE FROM product WHERE Id = ?";

            $stmt = $connection->prepare($sql);
            $stmt->bindValue(1, $Produto->getId(), PDO::PARAM_INT);
            
            $executionResult = $stmt->execute();
            
            if ($executionResult) {
                $connection->commit();
                return TRUE;
            } else {
                throw new PDOException("Execution Error." . $stmt->errorCode() . " - " .
                implode($stmt->errorInfo()));
            }
            
        } catch (PDOException $exc) {
            if ((isset($connection)) && ($connection->inTransaction())) {
                $connection->rollBack();
            }
            
            echo $exc->getMessage();
            return FALSE;
        } finally {
            if (isset($connection)) {
                unset($connection);
            }
        }
    }

    public function disable(Product $Product)
    {
        try {
            $connection = $this->getConnection();
            $connection->beginTransaction();

            $sql = 'UPDATE product SET Status = 0 WHERE Id = ? ';

            $stmt = $connection->prepare($sql);
            $stmt->bindValue(1, $Produto->getId(), PDO::PARAM_INT);

            $executionResult = $stmt->execute();
            
            if ($executionResult) {
                $connection->commit();
                return TRUE;
            } else {
                throw new PDOException('Execution Error.' . $stmt->errorCode() . ' - ' .
                implode($stmt->errorInfo()));
            }
            
        } catch (PDOException $exc) {
            if ((isset($connection)) && ($connection->inTransaction())) {
                $connection->rollBack();
            }
            
            echo $exc->getMessage();
            return FALSE;
        } finally {
            if (isset($connection)) {
                unset($connection);
            }
        }
    }

    public function enable(Product $Product)
    {
        try {
            $connection = $this->getConnection();
            $connection->beginTransaction();

            $sql = 'UPDATE product SET Status = 1 WHERE Id = ? ';

            $stmt = $connection->prepare($sql);
            $stmt->bindValue(1, $Produto->getId(), PDO::PARAM_INT);

            $executionResult = $stmt->execute();
            
            if ($executionResult) {
                $connection->commit();
                return TRUE;
            } else {
                throw new PDOException('Execution Error.' . $stmt->errorCode() . ' - ' .
                implode($stmt->errorInfo()));
            }
            
        } catch (PDOException $exc) {
            if ((isset($connection)) && ($connection->inTransaction())) {
                $connection->rollBack();
            }
            
            echo $exc->getMessage();
            return FALSE;
        } finally {
            if (isset($connection)) {
                unset($connection);
            }
        }
    }
}
