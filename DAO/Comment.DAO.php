<?php
include_once '../DAO/Connection.DAO.php';
include_once '../Model/Comment.Model.php';

class CommentDAO extends Connection
{
    public function Insert(Comment $Comment)
    {
        try {
            $connection = $this->getConnection();
            $connection->beginTransaction();
            
            $sql = 'INSERT INTO comment (Product_Id, User_Id, Text) VALUES (?, ?, ?)';
            
            $stmt = $connection->prepare($sql);
            
            $stmt->bindValue(1, $Comment->getProduct_Id(), PDO::PARAM_INT);
            $stmt->bindValue(2, $Comment->getUser_Id(), PDO::PARAM_INT);
            $stmt->bindValue(3, $Comment->getText(), PDO::PARAM_STR);
            
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

            $sql = 'SELECT (Id, Text, Product_Id, User_Id, Status, Register_Date, Modified_Date) FROM comment '. $where;
            
            $stmt = $connection->prepare($sql);
            $executionResult = $stmt->execute();
            
            if ($executionResult) {
                return $stmt->fetchAll(PDO::FETCH_CLASS, 'Comment');   
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

    public function update(Comment $Comment)
    {
        try {
            $connection = $this->getConnection();
            $connection->beginTransaction();

            $sql = 'UPDATE comment SET Text = ? WHERE Id = ? ';

            $stmt = $connection->prepare($sql);
            $stmt->bindValue(1, $Comment->getText(), PDO::PARAM_STR);
            $stmt->bindValue(2, $Comment->getId(), PDO::PARAM_INT);

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

    public function delete(Comment $Comment)
    {
        try {
            $connection = $this->getConnection();
            $connection->beginTransaction();

            $sql = "DELETE FROM comment WHERE Id = ?";

            $stmt = $connection->prepare($sql);
            $stmt->bindValue(1, $Comment->getId(), PDO::PARAM_INT);
            
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

    public function disable(Comment $Comment)
    {
        try {
            $connection = $this->getConnection();
            $connection->beginTransaction();

            $sql = 'UPDATE comment SET Status = 0 WHERE Id = ? ';

            $stmt = $connection->prepare($sql);
            $stmt->bindValue(1, $Comment->getId(), PDO::PARAM_INT);

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

    public function enable(Comment $Comment)
    {
        try {
            $connection = $this->getConnection();
            $connection->beginTransaction();

            $sql = 'UPDATE comment SET Status = 1 WHERE Id = ? ';

            $stmt = $connection->prepare($sql);
            $stmt->bindValue(1, $Image->getId(), PDO::PARAM_INT);

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
