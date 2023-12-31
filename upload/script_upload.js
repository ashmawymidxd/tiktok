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
            case "title":
                data.title = inputs[i].value;
                break;
        
            case "description":
                data.description = inputs[i].value;
                break;
        
            case "file":
                data.file = inputs[i].value;
                break;
        
        }
    }
    send_data(data,"upload");
    
}

function send_data(data,type) {
    var xml = new XMLHttpRequest();
    xml.onload = function(){

        if(xml.readyState == 4 || xml.status == 200){
            message.style.display = "block";
            let fedeback = xml.responseText;
            message.innerHTML=fedeback;
            if (fedeback == 'done') {
              //  window.location = "/tiktok/login";
            }
        }
    }
        data.data_type = type;
        var data_string = JSON.stringify(data);
        //alert(data_string);
        xml.open("POST","upload.php",true);
        xml.send(data_string);
    
}
