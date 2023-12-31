let submit_btn = document.querySelector("#submit");
let form = document.querySelector("#form");
let message = document.querySelector("#message");

form.onsubmit = (e)=>{
    e.preventDefault();
}

submit_btn.onclick = ()=>{
    var inputs = form.getElementsByTagName("INPUT");
    var data ={};
    for (var i = inputs.length - 1 ; i >=0 ; i--) {
       
        var key = inputs[i].name;
        switch (key) {
            case "username":
                data.username = inputs[i].value;
                break;
        
            case "email":
                data.email = inputs[i].value;
                break;
        
            case "password":
                data.password = inputs[i].value;
                break;
        
        }
    }
    send_data(data,"signup");
}

function send_data(data,type) {
    var xml = new XMLHttpRequest();
    xml.onload = function(){

        if(xml.readyState == 4 || xml.status == 200){
            message.style.display = "block";
            let fedeback = xml.responseText;
            message.innerHTML=fedeback;
            if (fedeback == 'done') {
                window.location = "/tik/login";
            }
        }
    }
        data.data_type = type;
        var data_string = JSON.stringify(data);

        xml.open("POST","signup.php",true);
        xml.send(data_string);
    
}
