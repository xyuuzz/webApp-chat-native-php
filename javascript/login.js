const form = document.querySelector(".signup form"),
    formButton = document.querySelector(".submit input"),
    errText = document.querySelector(".error-txt");

form.onsubmit = (e) => 
{
    e.preventDefault();
}

formButton.onclick = () => 
{
    // AJAX
    let xhr = new XMLHttpRequest();  // create xhr object
    xhr.open("POST", "php/login.php", true); // open xhr file
    xhr.onload = () =>  // if xhr loading done
    {
        if(xhr.readyState === XMLHttpRequest.DONE)  // request done
        {
            if(xhr.status === 200)  // status code is 200
            {
                let data = xhr.response; // xhr response 
                if(data === "success") 
                {   
                    location.href = "users.php";
                }
                else 
                {
                    errText.innerHTML = data;
                    errText.style.display = "block";
                }
            }
        }
    }

    // send data through ajax to php
    let formData = new FormData(form); 
    xhr.send(formData); // seding form data to php
}