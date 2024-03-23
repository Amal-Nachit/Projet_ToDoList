// La fonction jouée onclick sur le bouton submit
async function handleRegister() {
  // Première étape, on récupere les values des inputs
  let firstName = document.querySelector(".firstName").value;
  let lastName = document.querySelector(".lastName").value;
  let email = document.querySelector(".email").value;
  let password = document.querySelector(".password").value;

  // On construit un objet dont les clefs ( nom de champs) doivent être identiques à la classe User.
  let user = {
    firstName_user: firstName,
    lastName_user: lastName,
    email_user: email,
    password_user: password,
  };

  // On crée les paramètres de la requête HTTP qui sera envoyée à PHP
  let params = {
    // Méthode HTPP Post ( pour que le traitement puisse vérifier avec if(isset($_POST)))
    method: "POST",
    // On précise toujours le format de la requête HHTP
    // Ici du json, mais ca pourrait être du form data, du form url encoded , etc...
    headers: {
      "Content-Type": "application/json; charset=utf-8",
    },
    // Dans le corp de la requêter HTTP, va se trouver la donnée
    // On va lui passer nos données de l'objet user crée précédement

    body: JSON.stringify(user),
  };

  fetch("./register.php", params)
    .then((res) => res.text())
    .then((data) => {
      handleFetchResponse(data);
    })
    .catch((e) => {
      console.log(e);
    });
}

function handleFetchResponse(data) {
  console.log(data);
  // SI PHP renvoi le mot clef Email already taken
  if (data === "Email already taken") {
    let toast = document.querySelector(".toast");
    toast.innerText = data;
  } else {
    let registerForm = document.querySelector(".formRegister");
    // registerForm.classList.add("hidden");
    // Le formulaire disparait
  }
}
