var cardsGlobal = [];

(function () {
  
    getAllCards();

})();

/* var valida

function createTaskAfterValidate() {
    valida = true;
    if(valida) {
        createTask()
        valida = false;
        console.log("O teste está correto");
    } else {
        console.log("Ocorreu um erro");
        return false;
    }
}
 */

function createTask() {
    insertData()
    /* generateCards(cards)
    generateCards(cardsglobal) */
};

function deleteCard(_id) {
    const takeId = document.getElementById(_id);
    takeId.classList.add('hidden')
    var myHeaders = new Headers();
    myHeaders.append("X-Auth-Token", "jVcMX20g9xp2_6k3i6nAI2iejPMmLJRXmyQ0ysAdfb-");

    var requestOptions = {
        method: 'delete',
        headers: myHeaders,
        redirect: 'follow'
        };
    fetch(`https://chat2.myuc2b.com:1340/api/v1/card/${_id}`,
    requestOptions
    ).then((res)=>res.json()).then(
        (response)=>{
            const erro = response;
            console.log(erro);
            generateCards(erro);
        }
    );
};

function returColumns() {
    return {
        name: document.getElementById('title').value,
        ts: document.getElementById('newDate').value,
        scheduler: document.getElementById('comments').value,
        column: document.getElementById('newStatus').value,
        card: document.getElementById('card')
    };
};



function insertData() {
    let insert = returColumns()
    fetch("https://chat2.myuc2b.com:1340/api/v1/card/", {
         method: "POST",
         headers: {
             "X-Auth-Token": "jVcMX20g9xp2_6k3i6nAI2iejPMmLJRXmyQ0ysAdfb-",
             "Content-Type": "application/json"
         },
         body:JSON.stringify(insert)
     }).then((res)=>res.json()).then((response)=> {
         console.log(response);
         console.log('acessou!');
         const card = {
            "_id": response._id,
            "name": insert.name,
            "contactId": null,
            "comments": null,
            "shedule": null,
            "scheduler": insert.scheduler,
            "column": insert.column,
            "status": null,
            "public": null,
            "ts": insert.ts
        }
        cardsGlobal.push(card)    
        generateCards(cardsGlobal)
   
     });     
};

function getAllCards() {    
    fetch(`https://chat2.myuc2b.com:1340/api/v1/card/`, {
        method: 'GET',
        headers: {
            "X-Auth-Token": "jVcMX20g9xp2_6k3i6nAI2iejPMmLJRXmyQ0ysAdfb-",
            "Content-Type": "application/json"
        },
    }).then((res)=>res.json()).then((response)=> {
        console.log("Edit info", response);
        cardsGlobal = response;
        console.log(cardsGlobal);
        generateCards(cardsGlobal)
    });  
}

function generateCards(cards) {    
           
    var plannedHTML = '';
    var startedHTML = '';
    var task3HTML = '';
    var task4HTML = '';

    for (var i = 0; i < cards.length; i++) {
        if (cards[i].column == 'planned') {
            plannedHTML += `
            <article class="kanban-entry" draggable="true" id=${cards[i]._id}>
                <button style='float: right;' type='button' class="btn btn-white" id=${i + "_id_label"} onclick='deleteCard("${cards[i]._id}");'><i class="bi bi-x"></i></button>
                <a href="https://developers.myuc2b.com/app/leads_contacs/contacts.php?=${cards[i]._id}">
                    <div class="kanban-entry-center">
                        <h5 id="${i + '_name_label'}">${cards[i].name}</h5>
                        <input style="display:none;" class="editTitulo" id="${i + '_name_input'}" onblur="saveValue(${i}, 'name');" value="${cards[i].name}" />
                    </div>
                    </hr>
                    <div class="kanban-details">
                        <b>Data:</b><span id=${i + "_ts_label"}> ${cards[i].ts}</span>
                        <input style="display:none;" class="editData" type="text" id=${i + "_ts_input"} onblur="saveValue(${i}, 'ts');" value="${cards[i].ts}">
                    </div>
                    <div class="kanban-details2">
                        <span id=${i + '_scheduler_label'} class="scheduler">${cards[i].scheduler}</span>
                        <input style="display:none;" class="editResponsavel" type="text" id=${i + "_scheduler_input"} onblur="saveValue(${i}, 'scheduler');" value="${cards[i].scheduler}">
                    </div>
                </a>
            </article>
          `;
        } else if(cards[i].column =='started') {
            startedHTML += `
            <article class="kanban-entry" draggable="true" id=${cards[i]._id}>
                <button style='float: right;' type='button' class="btn btn-white" id=${i + "_id_label"} onclick='deleteCard("${cards[i]._id}");'><i class="bi bi-x"></i></button>
                <a href="https://developers.myuc2b.com/app/leads_contacs/contacts.php?=${cards[i]._id}">
                    <div class="kanban-entry-center">                    
                        <h5 id="${i + '_name_label'}">${cards[i].name}</h5>
                        <input style="display:none;" class="editTitulo" type="text" id="${i + '_name_input'}" onblur="saveValue(${i}, 'name');" value="${cards[i].name}" />
                    </div
                    </hr>
                    <div class="kanban-details">
                        <b>Data:</b><span id=${i + "_ts_label"}> ${cards[i].ts}</span>
                        <input style="display:none;" class="editData" type="date" id=${i + "_ts_input"} onblur="saveValue(${i}, 'ts');" value="${cards[i].ts}">
                    </div>
                    <div class="kanban-details2">
                        <span id=${i + '_scheduler_label'} class="scheduler">${cards[i].scheduler}</span>
                        <input style="display:none;" class="editResponsavel" type="text" id=${i + "_scheduler_input"} onblur="saveValue(${i}, 'scheduler');" value="${cards[i].scheduler}">
                    </div>
                </a>
            </article>
          `;
        } else if(cards[i].column == 'task3') {
            task3HTML += `
            <article class="kanban-entry" draggable="true" id=${cards[i]._id}>
                <button style='float: right;' type='button' class="btn btn-white" id=${i + "_id_label"} onclick='deleteCard("${cards[i]._id}");'><i class="bi bi-x"></i></button>
                <a href="https://developers.myuc2b.com/app/leads_contacs/contacts.php?=${cards[i]._id}">
                    <div class="kanban-entry-center">
                        <h5 id="${i + '_name_label'}">${cards[i].name}</h5>
                        <input style="display:none;" class="editTitulo" type="text" id="${i + '_name_input'}" onblur="saveValue(${i}, 'name');" value="${cards[i].name}" />
                    </div>
                    </hr>
                    <div class="kanban-details">
                        <b>Data:</b><span id=${i + "_ts_label"}> ${cards[i].ts}</span>
                        <input style="display:none;" class="editData" type="date" id=${i + "_ts_input"} onblur="saveValue(${i}, 'ts');" value="${cards[i].ts}">
                    </div>
                    <div class="kanban-details2">
                        <span id=${i + '_scheduler_label'} class="scheduler">${cards[i].scheduler}</span>
                        <input style="display:none;" class="editResponsavel" type="text" id=${i + "_scheduler_input"} onblur="saveValue(${i}, 'scheduler');" value="${cards[i].scheduler}">
                    </div>
                </a>
            </article>
          `;
        } else if(cards[i].column == 'task4') {
            task4HTML += `
            <article class="kanban-entry" draggable="true" id=${cards[i]._id}>
                <button style='float: right;' type='button' class="btn btn-white" id=${i + "_id_label"} onclick='deleteCard("${cards[i]._id}");'><i class="bi bi-x"></i></button>
                <a href="https://developers.myuc2b.com/app/leads_contacs/contacts.php?=${cards[i]._id}">
                    <div class="kanban-entry-center">
                        <h5 id="${i + '_name_label'}">${cards[i].name}</h5>
                        <input style="display:none;" class="editTitulo" type="text" id="${i + '_name_input'}" onblur="saveValue(${i}, 'name');" value="${cards[i].name}" />
                    </div>
                    </hr>
                    <div class="kanban-details">
                        <b>Data:</b><span id=${i + "_ts_label"}> ${cards[i].ts}</span>
                        <input style="display:none;" class="editData" type="date" id=${i + "_ts_input"} onblur="saveValue(${i}, 'ts');" value="${cards[i].ts}">
                    </div>
                    <div class="kanban-details2">
                        <span id=${i + '_scheduler_label'} class="scheduler">${cards[i].scheduler}</span>
                        <input style="display:none;" class="editResponsavel" type="text" id=${i + "_scheduler_input"} onblur="saveValue(${i}, 'scheduler');" value="${cards[i].scheduler}">
                    </div>
                </a>
            </article>
          `;
        } 

        document.getElementById('planned').innerHTML = plannedHTML;
        document.getElementById('started').innerHTML = startedHTML;
        document.getElementById('task3').innerHTML = task3HTML;
        document.getElementById('task4').innerHTML = task4HTML;
        
    };
};


function changeSelect() {
    var myHeaders = new Headers();
    myHeaders.append("X-Auth-Token", "jVcMX20g9xp2_6k3i6nAI2iejPMmLJRXmyQ0ysAdfb-");

    var requestOptions = {
    method: 'GET',
    headers: myHeaders,
    redirect: 'follow'
    };

    fetch("https://chat2.myuc2b.com:1340/api/v1/card", requestOptions)
    .then(res => res.json())
    .then((response) => {
        var select = "";
        console.log(response);
        response.forEach((field) => {
            if(field.name == "") {
                console.log('nao funciona!');
            } else {
                select += 
                `
                <option>${field.name}</option>
                `
            }
            
        })
        document.getElementById('cards').innerHTML = select;
    })

}
changeSelect();































 
