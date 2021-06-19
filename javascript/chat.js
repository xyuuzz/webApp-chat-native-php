const form = document.querySelector(".typing-area"),
        inputField = document.querySelector(".typing-area input"),
        sendButton = document.querySelector(".typing-area button"),
        chatBox = document.querySelector(".chat-box");


form.onsubmit = (e) => {
    e.preventDefault();
};

// button click
sendButton.onclick = () => {
    let xhr = new XMLHttpRequest();  // create xhr object
    xhr.open("POST", "php/insert-chat.php", true); // open xhr file
    xhr.onload = () =>  // if xhr loading done
    {
        if(xhr.readyState === XMLHttpRequest.DONE)  // request done
        {
            if(xhr.status === 200)  // status code is 200
            {
                let data = xhr.response; // xhr response 
                inputField.value = "";
                setTimeout(() => {
                    scrollToBottom();
                }, 100);
            }
        }
    };
    let formData = new FormData(form);
    xhr.send(formData);
};

chatBox.onmouseenter = () => { // if cursor hover on chatbox element
    chatBox.classList.add("active");
};
chatBox.onmouseleave = () => { // if cursor away from chat box element.
    chatBox.classList.remove("active");
};

// chat 
setInterval( () => { // setiap 0.5 detik, jalankan function dibawah..

    let xhr = new XMLHttpRequest();  // create xhr object
    xhr.open("POST", "php/get-chat.php", true); // open xhr file
    xhr.onload = () =>  // if xhr loading done
    {
        if(xhr.readyState === XMLHttpRequest.DONE)  // request done
        {
            if(xhr.status === 200)  // status code is 200
            {
                let data = xhr.response; // xhr response 
                chatBox.innerHTML = data;
                if(!chatBox.classList.contains("active")) // if cursor away from chat box element.
                {
                    scrollToBottom();
                }
            }
        }
    };
    let formData = new FormData(form);
    xhr.send(formData);
}, 100 );

const scrollToBottom = () => chatBox.scrollTop = chatBox.scrollHeight;