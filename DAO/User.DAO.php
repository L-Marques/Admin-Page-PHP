<?php
include_once '../DAO/Connection.DAO.php';
include_once '../Model/User.Model.php';

class UserDAO extends Connection
{
    public function Insert(User $User)
    {
        try {
            $connection = $this->getConnection();
            $connection->beginTransaction();
            
            $sql = 'INSERT INTO user (First_Name, Last_Name, Email, Password, Gender, Birthdate, Admin) 
                    VALUES (?, ?, ?, ?, ?, ?, ?)';
            
            $stmt = $connection->prepare($sql);
            $stmt->bindValue(1, $User->getFirst_Name(), PDO::PARAM_STR);
            $stmt->bindValue(2, $User->getLast_Name(), PDO::PARAM_STR);
            $stmt->bindValue(3, $User->getEmail(), PDO::PARAM_STR);
            $stmt->bindValue(4, $User->getPassword(), PDO::PARAM_STR);
            $stmt->bindValue(5, $User->getGender(), PDO::PARAM_STR);
            $stmt->bindValue(6, $User->getBirthdate(), PDO::PARAM_STR);
            $stmt->bindValue(7, $User->getAdmin(), PDO::PARAM_BOOL);
            
            $executionResult = $stmt->execute();
            
            if($executionResult) {
                $connection->commit();
                return TRUE;
            } else {
                throw new PDOException('Execution Error. ' . $stmt->errorCode() . ' - '
                        . implode($stmt->errorInfo()));
            }
            
        } catch (PDOException $e) {
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
        try {
            $connection = $this->getConnection();

            $sql = 'SELECT * FROM user '. $where;
            $stmt = $connection->prepare($sql);
            $executionResult = $stmt->execute();
            
            if ($executionResult) {
                return $stmt->fetchAll(PDO::FETCH_CLASS, 'User');   
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

    public function update(User $User)
    {
        try {
            $connection = $this->getConnection();
            $connection->beginTransaction();

            $sql = 'UPDATE user SET First_Name = ?, Last_Name = ?, Email = ?, Password = ?, Gender = ?, '
                .  'Birthdate = ?, Admin = ? WHERE Id = ? ';

            $stmt = $connection->prepare($sql);
            $stmt->bindValue(1, $User->getFirst_Name(), PDO::PARAM_STR);
            $stmt->bindValue(2, $User->getLast_Name(), PDO::PARAM_STR);
            $stmt->bindValue(3, $User->getEmail(), PDO::PARAM_STR);
            $stmt->bindValue(4, $User->getPassword(), PDO::PARAM_STR);
            $stmt->bindValue(5, $User->getGender(), PDO::PARAM_STR);
            $stmt->bindValue(6, $User->getBirthdate(), PDO::PARAM_STR);
            $stmt->bindValue(7, $User->getAdmin(), PDO::PARAM_BOOL);
            $stmt->bindValue(8, $User->getId(), PDO::PARAM_INT);

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

    public function delete(User $User)
    {
        try {
            $connection = $this->getConnection();
            $connection->beginTransaction();

            $sql = "DELETE FROM user WHERE Id = ?";

            $stmt = $connection->prepare($sql);
            $stmt->bindValue(1, $User->getId(), PDO::PARAM_INT);
            
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

    public function disable(User $User) {
        try {
            $connection = $this->getConnection();
            $connection->beginTransaction();

            $sql = 'UPDATE user SET Status = 0 WHERE Id = ? ';

            $stmt = $connection->prepare($sql);
            $stmt->bindValue(1, $User->getId(), PDO::PARAM_INT);

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

    public function enable(User $User)
    {
        try {
            $connection = $this->getConnection();
            $connection->beginTransaction();

            $sql = 'UPDATE user SET Status = 1 WHERE Id = ? ';

            $stmt = $connection->prepare($sql);
            $stmt->bindValue(1, $User->getId(), PDO::PARAM_INT);

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
