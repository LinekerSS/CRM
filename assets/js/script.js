var editFormData;

function getFormData() {
    return {
        name: document.getElementById('name').value,
        email: document.getElementById('email').value,
        phone: document.getElementById('phone').value,
        comments: document.getElementById('comments').value
    }
}

function clearFormData() {
    document.getElementById('name').value = "";
    document.getElementById('email').value = "";
    document.getElementById('phone').value = "";
    document.getElementById('comments').value = "";
}

function setFormData(name, email, phone, comments) {
    document.getElementById("name").value = name;
    document.getElementById("email").value = email;
    document.getElementById("phone").value = phone;
    document.getElementById("comments").value = comments;
}


function editDataCall(id) {

    fetch(`https://chat1.myuc2b.com:1340/api/v1/contact/${id}`, {
        method: 'GET',
        headers: {
            "X-Auth-Token": "jVcMX20g9xp2_6k3i6nAI2iejPMmLJRXmyQ0ysAdfb-",
            "Content-Type": "application/json"
        },
    }).then((res) => res.json()).then((response) => {
        console.log("Edit info", response);
        editFormData = response[0];
        setFormData(editFormData.name, editFormData.email, editFormData.phone, editFormData.comments)
    })
}

function submitForm() {
    if (!editFormData) insert();
    else editData();
}


function insert() {

    let payload = getFormData();

    fetch("https://chat1.myuc2b.com:1340/api/v1/contact/", {
        method: "POST",
        headers: {
            "X-Auth-Token": "jVcMX20g9xp2_6k3i6nAI2iejPMmLJRXmyQ0ysAdfb-",
            "Content-Type": "application/json"
        },
        body: JSON.stringify(payload)
    }).then((res) => res.json()).then((response) => {
        console.log(response);
        // Limpar os inputs
        clearFormData();
        getData();
    })
}

function editData() {

    var formData = getFormData();
    formData['_id'] = editFormData._id;
    var myHeaders = new Headers();
    myHeaders.append("X-Auth-Token", "jVcMX20g9xp2_6k3i6nAI2iejPMmLJRXmyQ0ysAdfb-");
    myHeaders.append("Content-Type", "application/json");


    var raw = JSON.stringify(formData);
    //console.log(raw);

    var requestOptions = {
        method: 'PUT',
        headers: myHeaders,
        body: raw,
        redirect: 'follow'
    };
    fetch("https://chat1.myuc2b.com:1340/api/v1/contact/",
        requestOptions
    ).then((response) => response.json()).then((response) => {
        console.log(response);
        clearFormData();
        getData();

    })

};


function deleteData(id) {
    var myHeaders = new Headers();
    myHeaders.append("X-Auth-Token", "jVcMX20g9xp2_6k3i6nAI2iejPMmLJRXmyQ0ysAdfb-");

    var requestOptions = {
        method: 'DELETE',
        headers: myHeaders,
        redirect: 'follow'
    };
    fetch("https://chat1.myuc2b.com:1340/api/v1/contact/" + id,
        requestOptions
    ).then((res) => res.json()).then(
        (response) => {
            console.log(response);
            getData();
        }
    )
}


function getData() {
    var myHeaders = new Headers();
    myHeaders.append("X-Auth-Token", "jVcMX20g9xp2_6k3i6nAI2iejPMmLJRXmyQ0ysAdfb-");

    var requestOptions = {
        method: 'GET',
        headers: myHeaders,
        redirect: 'follow'
    };
    fetch("https://chat1.myuc2b.com:1340/api/v1/contact/", requestOptions).then(
        (res) => res.json()
    ).then((response) => {
        var tmpData = "";
        console.log(response);
        response.forEach((user) => {
            tmpData += "<tr>"
            tmpData += "<td></td>";
            tmpData += "<td>" + user.name + "</td>";
            tmpData += "<td>" + user.email + "</td>";
            tmpData += "<td>" + user.phone + "</td>";
            tmpData += "<td>" + user.comments + "</td>";
            tmpData += "<td><button class='btn' type='button' data-toggle='modal' data-target='#pageModal_1' onclick='editDataCall(`" + user._id + "`)'><i class='fal fa-edit'></i></button></td>";
            tmpData += "<td><button class='btn' onclick='deleteData(`" + user._id + "`)'><i class='fal fa-trash-alt'></i></button></td>";
            tmpData += "</tr>"
        });
        document.getElementById('tbData').innerHTML = tmpData;
    })
}
getData()

































