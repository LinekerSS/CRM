function getDados() {
    return {
        name: document.getElementById('name').value,
        email: document.getElementById('email').value,
        phone: document.getElementById('phone').value,
        comments: document.getElementById('comments').value,
    } 
}

function clearFormData() { 
    document.getElementById('name').value = "";
    document.getElementById('email').value = "";
    document.getElementById('phone').value = "";
    document.getElementById('comments').value = "";
}


function getAllInputs() {
    return {
        nome: document.getElementById('name').value,
        negocio: document.getElementById('title').value,
        data: document.getElementById('newDate').value,
        telefone: document.getElementById('phone').value,
        email: document.getElementById('email').value,
        responsavel: document.getElementById('comments').value,
    }
}

async function validateInputs() {
    const input = getAllInputs()
        if(input.nome == "" || input.negocio == "" || input.data == "" || input.telefone == "" || input.email == "" || input.responsavel == "") {
            alert("Favor preencha todos os campos!");
            console.log("O usuário não preencheu todos os campos");
        } else {
            let payload = getDados();
            console.log(payload);
            console.log('Acessei');
        
            fetch("https://chat1.myuc2b.com:1340/api/v1/contact/", {
                method: "POST",
                headers: {
                    "X-Auth-Token": "jVcMX20g9xp2_6k3i6nAI2iejPMmLJRXmyQ0ysAdfb-",
                    "Content-Type": "application/json"
                },
                body:JSON.stringify(payload)
            }).then((res) => res.json()).then((response) => {
                console.log(response);
                let data = getDados();
                console.log(data);
                clearFormData();
            })
        }    
};
