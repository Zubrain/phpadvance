<?php
    require_once 'config.php';

    class User extends Database 
    {
        protected $tableName = "users";


        // function to add users
        public function add($data){
            if(!empty($data)) {
                $fields = $placeholder = [];
                foreach ($data as $field => $value) {
                    $fields[] = $field;
                    $placeholder[] = ":{$field}";

                }
            }
            $sql = "INSERT INTO {$this->tableName} (". implode(',',$fields).") VALUES (". implode(',',$placeholder).")";
            // $sql = "INSERT INTO {$this->tableName} (username,user_email,user_mobile) VALUES (:username,:user_email,:user_mobile)";

            $stmt = $this->connection->prepare($sql);
            try{
                $this->connection->beginTransaction();
                $stmt->execute($data);
                $lastInsertedId = $this->connection->lastInsertId();
                $this->connection->commit();
                return $lastInsertedId;
            }catch(PDOException $e){
                echo "Error:".$e->getMessage();
                $this->connection->rollback();

            }


        }


        //function to get rows
        public function getRows($start = 0, $limit = 4){
            $sql = "SELECT * FROM {$this->tableName} ORDER BY user_id DESC LIMIT {$start},{$limit}";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
            if($stmt->rowCount() > 0) {
                $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            }else{
                $results = [];
            }
            return $results;
        }



        //function to get row by ID (SINGLE ROW)
        public function getRow($field, $value)
        {
            $sql = "SELECT * FROM {$this->tableName} WHERE {$field}=:{$field}";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute([":{$field}" => $value]);
            if($stmt->rowCount() > 0) {
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
            }else{
                $result = [];
            }
            return $result;
        }




        //function to count number of rows

        public function getCount(){
            $sql = "SELECT count(*) as pcount FROM {$this->tableName}";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute();
            
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
           
            return $result['pcount'];
        }


        //function to upload photo
        public function uploadPhoto($file){
            if(!empty($file)) {
                $fileTempPath = $file['tmp_name'];
                $fileName = $file['name'];
                $fileSize = $file['size'];
                $fileType = $file['type'];
                $fileNameCmps = explode('.', $fileName);
                $fileExtension = strtolower(end($fileNameCmps));
                $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
                $allowedExtn = ["png", "jpg", "gif", "jpeg"];

                if(in_array($fileExtension, $allowedExtn)) {
                    $uploadFileDir = getcwd() . '/uploads/';
                    $destFilePath = $uploadFileDir . $newFileName;
                    if(move_uploaded_file($fileTempPath, $destFilePath)){
                        return $newFileName;
                    }
                }
            }
        }

        //function to update

        //function to delete

        //function to search
    }
?>