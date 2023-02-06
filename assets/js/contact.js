function getInfoData() {
    
    var myHeaders = new Headers();
    myHeaders.append("X-Auth-Token", "jVcMX20g9xp2_6k3i6nAI2iejPMmLJRXmyQ0ysAdfb-");

    var requestOptions = {
    method: 'GET',
    headers: myHeaders,
    redirect: 'follow'
    };

    fetch("https://chat2.myuc2b.com:1340/api/v1/activity/62e87f7b1b127f473d8f5769", requestOptions)
    .then(res => res.json())
    .then((response) => {
        const param = response.activity
        console.log(param);
        modifyDiv(param);
        const infoApp = response.activity;
        console.log(infoApp);
        geTInfosApp(infoApp)
    });
};
getInfoData()

function returnData() {
    return {
        app1: document.getElementById('telegram'),
        app2: document.getElementById('voIP')
    };
};

function modifyDiv(param) {
    var pegaTodosDados = "";
    for(var i = 0; i < param.length; i++) {

        pegaTodosDados += 
        `
        <div class="" id="${param[i].contactId}" style="border: none;">
                <div class="row" class="">
                    <div class="col-md-3">
                        <i class="bi bi-calendar-check" style="color: green;"></i>
                        <label>${param[i].tab}</label>
                    </div>                    
                    <div class="col-md-7">
                        <label>${param[i].ts}</label>
                    </div>
                </div>
                <hr>
                <div class="">
                    <div>
                        <label>Tipo de Atividade: ${param[i].activityType}</label>
                    </div>                    
                    <div>
                        <label>Observações: ${param[i].description}</label>
                    </div>
                    <div>
                        <label>Responsável: ${param[i].responsible}</label>
                    </div>
                    <div>
                        <a href="${param[i].link}">
                            <label>${param[i].link}</label>
                        </a>
                    </div>
                </div>
            </div>
            <hr>
        `

    };
    document.getElementById('todas').innerHTML = pegaTodosDados;
};

function geTInfosApp(infoApp) {
    

    var telegram = "";
    var instagram = "";
    var voIP = ""; 

    for(var i = 0; i < infoApp.length; i++) {
        if(infoApp[i].app == "Telegram") {
            telegram += 
            `
                <ul style="padding-left: 10px">
                    <li>${infoApp[i].app}</li>
                    <a href="${infoApp[i].link}">${infoApp[i].link}</a>
                </ul>
            `;
        } else if(infoApp[i].app == "Instagram") {
            instagram += 
            `
                <ul style="padding-left: 10px">
                    <li>${infoApp[i].app}</li>
                    <a href="${infoApp[i].link}">${infoApp[i].link}</a>
                </ul>
            `
        } else if(infoApp[i].app == "VoIP") {
            voIP += 
            `
                <ul style="padding-left: 10px">
                    <li>${infoApp[i].app}</li>
                    <a href="${infoApp[i].link}">${infoApp[i].link}</a>
                </ul>
            `
        };      
    };
        document.getElementById('telegram').innerHTML = telegram;
        document.getElementById('instagram').innerHTML = instagram;
        document.getElementById('voIP').innerHTML = voIP;
};


const bt = document.getElementById('salvarTarefa')
bt.addEventListener('click', function (e) {

    e.preventDefault();
    let teste = notes();
    console.log(teste);
    
});

function notes() {
    var texto = document.getElementById('comment').value

    var detalheNota = "";
    
        detalheNota += 
    `
        <ul class="p-l-30">
            <li>${texto}</li>
        </ul>
    `

    document.getElementById('notas').innerHTML = detalheNota;
    
}




