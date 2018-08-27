<?php
include_once '../DAO/Connection.DAO.php';
include_once '../Model/Image.Model.php';

class ImageDAO extends Connection
{
    public function insert(Image $Image)
    {
        try {
            $connection = $this->getConnection();
            $connection->beginTransaction();
            
            $sql = 'INSERT INTO image (File_Name, File_Type, File_Size, File_Path, Product_Id, Thumbnail) '
                 . 'VALUES (?, ?, ?, ?, ?, ?)';
                    
            $stmt = $connection->prepare($sql);
            
            $stmt->bindValue(1, $Image->getFile_Name(), PDO::PARAM_STR);
            $stmt->bindValue(2, $Image->getFile_Type(), PDO::PARAM_STR);
            $stmt->bindValue(3, $Image->getFile_Size(), PDO::PARAM_STR);
            $stmt->bindValue(4, $Image->getFile_Path(), PDO::PARAM_STR);
            $stmt->bindValue(5, $Image->getProduct_Id(), PDO::PARAM_INT);
            $stmt->bindValue(6, $Image->getThumbnail(), PDO::PARAM_BOOL);
            
            $executionResult = $stmt->execute();
            
            if ($executionResult) {
                $connection->commit();
                return true;
            } else {
                throw new PDOException('Execution Error. ' . $stmt->errorCode() . ' - '
                        . implode($stmt->errorInfo()));
            }
            
        } catch (PDOException $e){
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

            $sql = 'SELECT Id, File_Name, File_Type, File_Size, File_Path, Product_Id, Thumbnail, Status, Register_Date, Modified_Date '
                 . 'FROM image '. $where;
            
            $stmt = $connection->prepare($sql);
            $executionResult = $stmt->execute();
            
            if ($executionResult) {
                return $stmt->fetchAll(PDO::FETCH_CLASS, 'Image');   
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

    public function update(Image $Image)
    {
        try {
            $connection = $this->getConnection();
            $connection->beginTransaction();

            $sql = 'UPDATE image SET File_Name = ?, File_Type = ?, File_Size = ?, File_Path = ?, Product_Id = ?, Thumbnail = ? '
                    . 'WHERE Id = ? ';

            $stmt = $connection->prepare($sql);
            $stmt->bindValue(1, $Image->getFile_Name(), PDO::PARAM_STR);
            $stmt->bindValue(2, $Image->getFile_type(), PDO::PARAM_STR);
            $stmt->bindValue(3, $Image->getFile_Size(), PDO::PARAM_STR);
            $stmt->bindValue(4, $Image->getFile_Path(), PDO::PARAM_STR);
            $stmt->bindValue(5, $Image->getProduct_Id(), PDO::PARAM_INT);
            $stmt->bindValue(6, $Image->getThumbnail(), PDO::PARAM_BOOL);
            $stmt->bindValue(7, $Image->getId(), PDO::PARAM_INT);

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

    public function delete(Image $Image)
    {
        try {
            $connection = $this->getConnection();
            $connection->beginTransaction();

            $sql = "DELETE FROM image WHERE Id = ?";
            
            $stmt = $connection->prepare($sql);
            
            $stmt->bindValue(1, $Image->getId(), PDO::PARAM_INT);
            
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
    
    public function disable(Image $Image)
    {
        try {
            $connection = $this->getConnection();
            $connection->beginTransaction();

            $sql = 'UPDATE image SET Status = 0 WHERE Id = ? ';

            $stmt = $connection->prepare($sql);
            $stmt->bindValue(1, $Image->getId(), PDO::PARAM_INT);

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

    public function enable(Image $Image)
    {
        try {
            $connection = $this->getConnection();
            $connection->beginTransaction();

            $sql = 'UPDATE image SET Status = 1 WHERE Id = ? ';

            $stmt = $connection->prepare($sql);
            $stmt->bindValue(1, $Image->getId(), PDO::PARAM_INT);

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
