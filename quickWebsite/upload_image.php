<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <?php    
if(isset($_POST['SubmitButton'])){ //check if form was submitted
    $files = $_FILES['filepath']['name'];
    $xlsFile = $files;
    // echo $xlsFile;
    require_once 'PHPExcel/Reader/Excel2007.php';
    $objReader = new PHPExcel_Reader_Excel2007();
    // $objReader->setReadDataOnly(true);
    // echo $objReader;
    // $data = $objReader->load($xlsFile);
    // $objWorksheet = $data->getActiveSheet();
    echo 'dd';
//     foreach ($objWorksheet->getDrawingCollection() as $drawing) {
//     //for XLSX format
//     $string = $drawing->getCoordinates();
//     $coordinate = PHPExcel_Cell::coordinateFromString($string);
//     if ($drawing instanceof PHPExcel_Worksheet_Drawing){
//     $filename = $drawing->getPath();
//     $drawing->getDescription();
//     copy($filename, 'uploads/' . $drawing->getDescription());
//     }
// }
}    
?>
<form action="" method="post" enctype="multipart/form-data">
<input type="file"  name="filepath" id="filepath"/></td><td><input type="submit" name="SubmitButton"/>
</body>
</html>