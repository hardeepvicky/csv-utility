<?php
require './CsvUtility.php';

$csv = new csv\CsvUtility("data.csv");


$csv->setField("Sr", \csv\CsvDataType::NUMBER);
$csv->setField("Manufacture Order Complete Date", \csv\CsvDataType::DATETIME);
$csv->setField("Scan Datetime", \csv\CsvDataType::DATETIME);
$csv->setField("Ledger Transaction Datetime", \csv\CsvDataType::DATETIME);
$csv->setField("Amount", \csv\CsvDataType::NUMBER);

$wh = new \csv\CsvWhere("Ledger Transaction Datetime", "!=", "");
$order = new \csv\CsvOrder("Ledger Transaction Datetime", \csv\CsvOrder::DIR_ASC);

$fields = [
    "Sr", 
    "Ledger Account", 
    "Amount",
    "Ledger Transaction Datetime",
];
        
$records = $csv->find($fields, [$wh], [$order]);

echo "<pre>";
print_r($records);


$csv2 = new csv\CsvUtility("data2.csv");
$csv2->write($records);