function makeRequest(url, method, formdata, callback){
    fetch(url, {
        method: method,
        body: formdata
    }).then((data) => {
        return data.json();
    })
    .then((result) => {
        callback(result);
    })
    .catch((err) => {
        console.log(err);
    });
}


function insertNewsletter(){
    document.getElementById('newsletter').style.display='none';
    var formdata = new FormData();
    var firstname = document.getElementById("firstName").value;
    var lastname = document.getElementById("lastName").value;
    var mail = document.getElementById("mail").value;
    var phone = document.getElementById("phone").value;

    console.log(firstname, lastname, mail, phone);

    formdata.append("firstname", firstname);
    formdata.append("lastname", lastname);
    formdata.append("mail", mail);
    formdata.append("phone", phone);
    
    if(firstname === "" || lastname === "" || mail === "" || phone === "") {
        window.alert("Please fill in the required fields!");
    } else {
        makeRequest( "../Api/sendNewsletterRequest.php", "POST", formdata, function(response) {
        if(response){
            alert("Thanks for choosing our newsletter!");
        }else{
            alert("det gick fel!");
        }
    });

    }
}