function init() {
	$(document).ready(function() {
		validate();
	});
}

function validate() {
	var url = 'http://localhost:8081/login-usuario';
	var form = document.getElementById('form_login');
	var respuesta = document.getElementById('respuesta');

	form.addEventListener('submit', function (event) {
		event.preventDefault();
		var datos = new FormData(form);
		var username = datos.get('usuario');
		var password = datos.get('contrasena');
		var data = { RFC_usuario: username, password: password};
		data['session_id'] =  btoa( JSON.stringify(data) );

		api(url, data);
	});
}

function api(url, data) {
	fetch(url, {
		method: 'POST',
		headers: {
			'Content-Type': 'application/json'
		},
		body: JSON.stringify(data)
	})
		.then(res => res.json())
		.catch(error => console.error('Error:', error))
		.then(response => {
			if(response['code'] !== 200) {
				alert(response['mensaje']);
			} else {
				localStorage.setItem('user', data);
				if(data['RFC_usuario'] === 'RFCadmin99') {
					//window.location = 'http://www.twitter.com';
					alert("Ventana administrador");
					console.log('Success:',data);
				} else {
					// Redireccionar a la pagina principal
					alert(response['mensaje']);
					//window.location = 'http://www.facebook.com';
					//console.log('Success:',data);
				}
			}
		});
}

init();
