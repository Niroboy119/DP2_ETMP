function validateForm(){
    var clientName = document.getElementById("cName").value;
    sessionStorage.setItem("cName", clientName);

    var clientEmail = document.getElementById("cEmail").value;
    sessionStorage.setItem("cEmail", clientEmail);

    var clientPhoneNum = document.getElementById("cNumber").value;
    sessionStorage.setItem("clientNumber",clientPhoneNum);

    var clientRequestDesc = document.getElementById("requestDesc").value;
    sessionStorage.setItem("clientRequestDesc", clientRequestDesc);


}


function init(){
    var formEle = document.getElementById("training-request-form");

    // if(sessionStorage.getItem(cName) == null){
    //     clientName.value = sessionStorage.getItem("cName");
    // }

    // if(sessionStorage.getItem(cEmail) ==  null){
    //     clientEmail.value = sessionStorage.getItem("cEmail");
    // }

    // if(sessionStorage.getItem(clientNumber) ==  null){
    //     clientPhoneNum.value = sessionStorage.getItem("clientNumber");
    // }

    // if(sessionStorage.getItem(clientRequestDesc) == null){
    //     clientRequestDesc.value = sessionStorage.getItem("clientRequestDesc");
    // }

    formEle.onsubmit = validateForm();
}

window.onload = init;