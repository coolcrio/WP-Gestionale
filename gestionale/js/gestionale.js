function gestionaleAjaxNewItem( d ){
	
	var r;
	
	d.action = 'Item_Add';
		
	jQuery.ajax({
	  url: "/wp-admin/admin-ajax.php",
	  data: d,
	  method: 'post',
	  async: false,
	}).done(function ( data ) {
	  r = data;
	});
	
	return r;
	
}

function stringToDate( datestring ) {

	var _date = datestring.split(' ');
	var _data = _date[0].split('-');
	var _ora = _date[1].split(':');
	
	return new Date(_data[0]*1, _data[1]*1, _data[2]*1, _ora[0]*1, _ora[1]*1, _ora[2]*1);
}

function stringToObject( datestring ) {

	var _date = datestring.split(' ');
	var _data = _date[0].split('-');
	var _ora = _date[1].split(':');
	
	var _r = {
		'y' : _data[0],
		'm' : _data[1],
		'd' : _data[2],
		'h' : _ora[0],
		'i' : _ora[1],
		's' : _ora[2]
	};
	
	return _r;
}