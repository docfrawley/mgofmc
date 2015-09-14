<?
function redirect_to($new_location) {
	$host = $_SERVER['HTTP_HOST'];
	  header("Location: http://$host/mgofmc/public/$new_location");
	  exit;
	}	

function GetMonths() {
	$i = 1;
$month = strtotime('2013-01-01');
	while($i <= 12)
	{
		$month_name = date('F', $month);
		echo '<option value="'. $i. '">'.$month_name.'</option>';
		$month = strtotime('+1 month', $month);
		$i++;
	}
}

function GetDays() {
	for($i=1; $i<=31;$i++){
		?><option value="<? echo $i; ?>"><? echo $i; ?></option><?
	} 
}

function GetYears() {
	for($i=date("Y"); $i>=date("Y")-5;$i--){
		?><option value="<? echo $i; ?>"><? echo $i; ?></option><?
	} 
}
?>