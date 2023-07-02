const register = document.getElementById("register");

register.addEventListener("submit", async (e) => {
    e.preventDefault();
    const nom = document.getElementById("nom").value;
    const prenom = document.getElementById("prenom").value;
    const age = document.getElementById("age").value;
    const filiere = document.getElementById("filiere").value;
    const email = document.getElementById("email").value;
    const pwd = document.getElementById("pwd").value;
    const pwd_confirm = document.getElementById("pwd_confirm").value;

    if (
        nom.length !== 0 &&
        prenom.length !== 0 &&
        age.length !== 0 &&
        filiere.length !== 0 &&
        email.length !== 0 &&
        pwd.length !== 0 &&
        pwd_confirm.length !== 0
    ) {
        if (email.match(/^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/)) {
            if (
                pwd.match(
                    /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/
                )
            ) {
                if (pwd === pwd_confirm) {
                    const formdata = {
                        nom: nom,
                        prenom: prenom,
                        age: age,
                        filiere: filiere,
                        email: email,
                        pwd: pwd,
                        pwd_confirm: pwd_confirm,
                    };

                    const response = await fetch(
                        "./Controller/register.contr.php",
                        {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                            },
                            body: JSON.stringify(formdata),
                        }
                    );
                    const data = await response.json();
                    console.log(data);

                    if (data.success) {
                        window.location.href = "./?";
                    } else if (data.error) {
                        alert(data.error);
                    } else {
                        alert("Erreur lors de l'inscription");
                    }
                } else {
                    alert("Les mots de passe ne correspondent pas");
                }
            } else {
                alert(
                    "Le mot de passe doit contenir au moins 8 caractères, une majuscule, une minuscule, un chiffre et un caractère spécial"
                );
            }
        } else {
            alert("Veuillez entrer une adresse mail valide");
        }
    } else {
        alert("Veuillez remplir tous les champs");
    }
});
