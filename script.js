// La fonction jouée onclick sur le bouton submit
async function handleRegister() {
  // Première étape, on récupere les values des inputs
  let firstName = document.querySelector(".firstName").value;
  let lastName = document.querySelector(".lastName").value;
  let email = document.querySelector(".email").value;
  let password = document.querySelector(".password").value;

  let user = {
    FIRST_NAME: firstName,
    LAST_NAME: lastName,
    EMAIL: email,
    PASSWORD: password,
  };

  let params = {
    method: "POST",
    headers: {
      "Content-Type": "application/json; charset=utf-8",
    },
    body: JSON.stringify(user),
  };

  fetch("./register.php", params)
    .then((res) => res.text())
    .then((data) => {
      window.location.href = "./connexion.php";
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
    let registerForm = document.querySelector("#connexion");
    registerForm.classList.add("hidden");
    // Le formulaire disparait
  }
}

async function handleConnect() {
  let email = document.querySelector(".email").value;
  let password = document.querySelector(".password").value;

  let user = {
    EMAIL: email,
    PASSWORD: password,
  };

  let params = {
    method: "POST",
    headers: {
      "Content-Type": "application/json; charset=utf-8",
    },
    body: JSON.stringify(user),
  };

  fetch("./register.php", params)
    .then((res) => res.text())
    .then((data) => {
      window.location.href = "./index.php";
      handleFetchResponse(data);
    })
    .catch((e) => {
      console.log(e);
    });
}

async function handleRegisterTask() {
  let taskTitle = document.querySelector(".taskTitle").value;
  let taskDate = document.querySelector(".taskDate").value;
  let taskPriority = document.querySelector(".taskPriority").value;
  // let taskCategory = document.querySelector(".taskCategory").value;
  let taskDescription = document.querySelector(".taskDescription").value;

  let task = {
    TITLE: taskTitle,
    DATE: taskDate,
    ID_PRIORITY: taskPriority,
    DESCRIPTION: taskDescription,
  };

  let params = {
    method: "POST",
    headers: {
      "Content-Type": "application/json; charset=utf-8",
    },
    body: JSON.stringify(task),
  };

  fetch("./createTask.php", params)
    .then((res) => res.text())
    .then((data) => {
      console.log(data);
    })
    .catch((e) => {
      console.log(e);
    });
}


// document.querySelector("#taskForm").addEventListener("submit", function(event) {
//     event.preventDefault(); // Empêche le rechargement de la page

//     // Récupère les données du formulaire
//     let formData = new FormData(event.target);

//     // Envoie la requête AJAX
//     fetch('./insertTask.php', {
//         method: 'POST',
//         body: formData
//     })
//     .then(response => response.json())
//     .then(data => {
//         // Ajoute la nouvelle tâche au DOM
//         let taskList = document.querySelector("#taskList");
//         let newTask = document.createElement("li");
//         newTask.textContent = data.title; // Supposons que le serveur renvoie le titre de la tâche
//         taskList.appendChild(newTask);
//     })
//     .catch(error => console.error('Error:', error));
// });
