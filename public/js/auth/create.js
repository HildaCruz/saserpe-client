function init() {
	$(document).ready(function() {
		var formUser = document.getElementById('form_registro');
		var formCompany = document.getElementById('form_company');


		if(formUser !== null) {
			validate_user();
		}
		if(formCompany !== null) {
			validate_company();
		}
	});
}

function validate_user() {
	var url = 'http://localhost:8080/registro-usuario';
	var form = document.getElementById('form_registro');

	form.addEventListener('submit', function (event) {
		event.preventDefault();
		var datos = new FormData(form);
		var username = datos.get('usuario');
		var name = datos.get('nombre');
		var password = datos.get('password');
		var confirm = datos.get('confirm');
		var data = {RFC_usuario: username, nombre_usuario: name, contra_usuario: password};

		var pass_equals = confirm_password(password, confirm);

		if (pass_equals === 1) {
			api(url, data);
		} else {
			alert("La contraseña es diferente a la confirmación");
		}
	});
}

function validate_company() {
	var url = 'http://localhost:8080/registro-empresa';
	var form = document.getElementById('form_company');

	form.addEventListener('submit', function (event) {
		event.preventDefault();
		var datos = new FormData(form);
		var rfc = datos.get('rfc');
		var disponible = datos.get('acciones');
		var total = datos.get('accionesTotal');
		var precio = parseFloat(datos.get('precio')).toFixed(2);
		var data = {
			RFC_empresa : rfc,
			acciones_empr_disp : disponible,
			acciones_empr_total : total,
			precio_accion_empr : precio
		};

		api(url, data);
	});
}

function confirm_password(password, confirm) {
	if (password === confirm) {
		return 1;
	}
}

function api(url, data) {
	fetch(url, {
		method: 'POST',
		headers: {
			'Content-Type': 'application/json'
		},
		body: JSON.stringify(data)
	})
		.then(response => response.json())
		.then(data => {
			console.log('JSON:',data);
			if(data['code'] !== 200) {
				alert(data['mensaje']);
			} else {
				//Redireccionar
				alert(data['mensaje']);
				window.location.href = 'http://localhost/saserpe-client/';
			}
		});
}

init();
