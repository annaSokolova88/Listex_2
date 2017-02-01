<?php
include ('config.php');
class importFile
{
    protected $connection;

    public function __construct($host, $username, $password, $db_name)
    {
        $this->connection = new PDO("mysql:dbname = $db_name;host = $host", $username, $password);
        if (!$this->connection) {
            throw new Exception('Could not connect to DB ');
        }
    }

    public function run($fileImport)
    {
        set_time_limit (0);
        $insertRecord = 0;
        $updateRecord = 0;
        if (is_file($fileImport) && ($dataXml = fopen($fileImport, 'r')) !== FALSE) {
            $xml = simplexml_load_file($fileImport);

            try {
                $this->connection->beginTransaction();

                $statementSelect = $this->connection->prepare(
                    "SELECT ShopPrice
                        FROM newBD.goods
                        WHERE ShopArticul = ?");
                $statementUpdate = $this->connection->prepare(
                    "UPDATE newBD.goods 
                          SET ShopPrice = ? 
                          WHERE ShopArticul = ?");

                $statementInsert = $this->connection->prepare(
                        "INSERT INTO newBD.goods
                          (ShopGoodId, ShopCatId, TM , ShopArticul, Barcode, Name, ShopUrl, ShopPrice, Description)
                          VALUES (:id, :categoryId, :vendor, :code, :barcode, :name, :url, :priceRUAH, :description)");

                foreach ($xml->items->item as $item) {
                    if(!empty($item->code)){

                        $code         = (string)$item->code;
                        $id           = (string)$item->id;
                        $categoryId   = (string)$item->categoryId;
                        $vendor       = (string)$item->vendor;
                        $barcode      = (string)$item->barcode;
                        $name         = (string)$item->name;
                        $url          = strstr((string)$item->url, '?', true);
                        $priceRUAH    = (string)$item->priceRUAH;
                        $description  = (string)$item->description;

                        $statementSelect->execute(array($code));
                        $query = $statementSelect->fetchAll();
                        if ($query && $statementUpdate->execute(array($priceRUAH, $code))){
                                $updateRecord++;
                        }else{
                            $statementInsert->bindParam(':id', $id, PDO::PARAM_STR);
                            $statementInsert->bindParam(':categoryId', $categoryId, PDO::PARAM_STR);
                            $statementInsert->bindParam(':vendor', $vendor, PDO::PARAM_STR);
                            $statementInsert->bindParam(':code', $code, PDO::PARAM_STR);
                            $statementInsert->bindParam(':barcode', $barcode, PDO::PARAM_INT);
                            $statementInsert->bindParam(':name', $name, PDO::PARAM_STR);
                            $statementInsert->bindParam(':url', $url, PDO::PARAM_STR);
                            $statementInsert->bindParam(':priceRUAH', $priceRUAH, PDO::PARAM_STR);
                            $statementInsert->bindParam(':description', $description, PDO::PARAM_STR);

                            if($statementInsert->execute())
                                $insertRecord++;
                        }
                    }
                }

                $this->connection->commit();
            }
            catch(PDOException $e)
            {
                $e->getMessage();
            }
        } else {
            throw new Exception('Could not open file');
        }

        fclose($dataXml);
        echo "Total insert records: {$insertRecord}. Total update records: {$updateRecord}.<br>";
    }

    public function copyFiles($fileImport){
        set_time_limit (0);

        if (is_file($fileImport) && ($dataXml = fopen($fileImport, 'r')) !== FALSE) {
            $xml = simplexml_load_file($fileImport);

            try {
                $this->connection->beginTransaction();
                $counter = 0;
                $fileDir = __DIR__ . DIRECTORY_SEPARATOR ."Img".DIRECTORY_SEPARATOR;
                    foreach ($xml->items->item as $item) {
                        if (!empty($item->image)) {
                            $fileName =  basename((string)$item->image);
                            if (!@copy((string)$item->image, $fileDir. $fileName)) {
                                $errors = error_get_last();
                            } else {
                                $this->resizeFile($fileDir, $fileName);
                                $counter++;
                                if($counter >= 20){
                                    fclose($dataXml);
                                    return $errors;
                                }
                            }
                        }
                    }
                $this->connection->commit();
            }
            catch(PDOException $e)
            {
                $e->getMessage();
            }
        } else {
            throw new Exception('Could not open file');
        }
        fclose($dataXml);
        return $errors;
    }

    private function resizeFile($fileDir, $fileName){

        $newFile    = imagecreatefromstring(file_get_contents($fileDir.$fileName));
        $width      = imagesx($newFile);
        $height     = imagesy($newFile);
        $max_width  = 100;
        $max_height = 100;
        $percentage = 1;

        if ( $width > $max_width ) {
            $percentage = ($height / ($width / $max_width)) > $max_height ?
                $height / $max_height :
                $width / $max_width;
        }
        elseif ( $height > $max_height) {
            $percentage = ($width / ($height / $max_height)) > $max_width ?
                $width / $max_width :
                $height / $max_height;
        }
        $new_width  = $width / $percentage;
        $new_height = $height / $percentage;

        $out = imagecreatetruecolor($new_width, $new_height);
        imagecopyresampled($out, $newFile, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
        imagepng($out, $fileDir.strstr($fileName, '.', true).".png");
    }
}

if ($_POST){
    if($_FILES['xml_file']['name'] && $_FILES['xml_file']['type'] == "text/xml"){
        if($_POST ['is_defaultConfig']){
            $newImport = new importFile ($host, $db_user, $db_password, $db_name);
            $newImport->run($_FILES['xml_file']['tmp_name']);
            $error = $newImport->copyFiles($_FILES['xml_file']['tmp_name']);
            if(isset($error)){
                foreach ($error as $item) {
                    echo $error['message']."<br>";
                }
            }
    }else{
            if($_POST['host'] && $_POST['dbName'] && $_POST['dbUser']){
                $newImport = new importFile ($_POST['host'], $_POST['dbUser'], $_POST['dbPassword'], $_POST['dbName']);
                $newImport->run($_FILES['xml_file']['tmp_name']);
            }else{
                echo "Select the default configuration or enter settings for connecting to the database";
            }
        }
    }else{
        echo "Import file format must be '.xml'. Operation canceled";
    }
}
?>
<br>
<a href="index.php">To main Page</a>
