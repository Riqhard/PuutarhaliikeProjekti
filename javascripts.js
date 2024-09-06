const myFunction = () => {
    var x = document.querySelector("nav")
    x.classList.toggle("responsive")
}


var currentPath = window.location.pathname.split("/").pop();
var navLinks = document.querySelectorAll("nav a");

navLinks.forEach(link =>{
    if  (link.getAttribute("href")== currentPath){
        link.classList.add("active")
    }
});





const password = document.getElementById('salasana');
const confirmPassword = document.getElementById('salasana2');
const errorMessage = document.getElementById('errorMessage');
const form = document.getElementById('myForm');

confirmPassword.addEventListener('input', function() {
    if (confirmPassword.value !== password.value) {
      errorMessage.style.display = 'inline';
    } else {
      errorMessage.style.display = 'none';
    }
  });

  form.addEventListener('submit', function(e) {
    if (password.value !== confirmPassword.value) {
      e.preventDefault(); // Prevent form submission if passwords don't match
      alert('Salasana ei täsmää!');
    }
  });





// Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
    'use strict'
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation')
  
    // Loop over them and prevent submission
    forms.forEach(form => {
      form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
          event.preventDefault()
          event.stopPropagation()
        }
  
        form.classList.add('was-validated')
      }, false)
    })
  })()





const kaupungit = document.getElementById('kaupungitvalikko');

  fetch('http://localhost:3001/kaupungit')
.then(response => response.json())
.then(data => {
    console.log(data)
    data.map(note =>{
        console.log(note.nimi)
        const option = document.createElement('option');
        option.value = note.nimi;
        option.text = `${note.nimi}`;
        kaupungit.appendChild(option);   
    })
})
.catch(error => console.error('Error:', error))
