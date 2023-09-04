//? Meno De Hamburguesa

document.addEventListener('DOMContentLoaded', () => {
	eventListeners();
	darkMode();
});

const darkMode = () => {
	const prefersDarkMode = window.matchMedia('(prefers-color-scheme: dark)');
	// console.log(prefersDarkMode.matches);

	if (prefersDarkMode.matches) {
		document.body.classList.add('dark-mode');
	} else {
		document.body.classList.remove('dark-mode');
	}

	prefersDarkMode.addEventListener('change', () => {
		if (prefersDarkMode.matches) {
			document.body.classList.add('dark-mode');
		} else {
			document.body.classList.remove('dark-mode');
		}
	});

	const darkModeBtn = document.querySelector('.dark-mode-btn');
	darkModeBtn.addEventListener('click', () => {
		document.body.classList.toggle('dark-mode');
	});
};

const eventListeners = () => {
	const mobileMenu = document.querySelector('.mobile-menu');

	mobileMenu.addEventListener('click', navigationResponsive);

	//? Muestra campos condicionales
	const metodoContacto = document.querySelectorAll(
		'input[name="contacto[contacto]"]',
	);

	metodoContacto.forEach((input) => {
		input.addEventListener('click', mostrarMetodoContacto);
	});
};

const navigationResponsive = () => {
	const navigation = document.querySelector('.navigation');
	navigation.classList.toggle('show');
};

function mostrarMetodoContacto(e) {
	const contacto = document.querySelector('#contacto');

	if (e.target.value === 'telefono') {
		contacto.innerHTML = `
			<label for="mobile">Número Teléfono</label>
      <input 
				type="tel" 
				id="mobile" 
				name="contacto[telefono]" 
				placeholder="Agrega tu número de teléfono. Ej: 123456789" 
				required
			/>

			<p>Elija la fecha y la hora para la llamada</p>

			<label for="contact-date">Fecha</label>
			<input type="date" id="contact-date" name="contacto[fecha]" required/>

			<label for="contact-hour">Hora</label>
			<input type="time" min="09:00" max="18:00" id="contact-hour" name="contacto[hora]" required/>
		`;
	} else {
		contacto.innerHTML = `
			<label for="email">E-mail</label>
      <input 
				type="text" 
				id="email" 
				name="contacto[email]" 
				placeholder="Agrega tu email. Ej: correo@ejemplo.com" 
				required
			/>
		`;
	}
}
