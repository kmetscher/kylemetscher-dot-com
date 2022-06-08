<!DOCTYPE html>
<?php
$date = "1969-04-20";
$dateExplode = explode("-", $date);
echo $dateExplode[0];
echo $dateExplode[1];
echo $dateExplode[2];

function euroDate($sqlDate) {
  $explodedDate = explode("-", $sqlDate);
  switch($explodedDate[1]) {
    case 01: $monthName = "January" break;
    case 02: $monthName = "February" break;
    case 03: $monthName = "March" break;
    case 04: $monthName = "April" break;
    case 05: $monthName = "May" break;
    case 06: $monthName = "June" break;
    case 07: $monthName = "July" break;
    case 08: $monthName = "August" break;
    case 09: $monthName = "September" break;
    case 10: $monthName = "October" break;
    case 11: $monthName = "November" break;
    case 12: $monthName = "December" break;
  }
  $formattedDate = "'.$explodedDate[2].' '.$monthName.', '.$explodedDate[0].'";
  return $formattedDate;
}
?>
