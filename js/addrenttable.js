/*���ڼ��ظ������ӷ�Դ��html*/
$(document).ready(function(){
	$('button#resident').click(function(){
		$('p#add').load('/estate/index.php/AddHouse/RentResidence');
	});
	$('button#villa').click(function(){
		$('p#add').load('/estate/index.php/AddHouse/RentVilla');
	});
	$('button#shop').click(function(){
		$('p#add').load('/estate/index.php/AddHouse/RentShop');
	});
	$('button#office_building').click(function(){
		$('p#add').load('/estate/index.php/AddHouse/RentOfficeBuilding');
	});
});