var urlLocal = 'http://localhost:8080/';

init();

function init() {
	$(document).ready(function() {
		
		//validate();
	});
}

function validate() {
	var url = urlLocal+'login-usuario';
	var form = document.getElementById('form_login');
	var respuesta = document.getElementById('respuesta');

	form.addEventListener('submit', function (event) {
		event.preventDefault();
		var datos = new FormData(form);
		var username = datos.get('usuario');
		var password = datos.get('contrasena');
		var data = { RFC_usuario: username, password: password};
		const idSession = Date.now();
		data['session_id'] = idSession;

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
			if(response.code !== 200) {
				alert(response['mensaje']);
				alert(response);
			} else {
				
			}
		});
}
