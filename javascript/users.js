const searchBar = document.querySelector(".users .search input"),
        searchButton = document.querySelector(".users .search button"),
        usersList = document.querySelector(".users .users-list"),
        logoutButton = document.querySelector(".logout");

searchButton.onclick = () => { // when search button clicked, then..
    searchBar.classList.toggle("active");
    searchBar.focus();
    searchButton.classList.toggle("active");
};

searchBar.onkeyup = () => {
    let searchTerm = searchBar.value;
    if(searchTerm != "") // if field input not ""
    {
        searchBar.classList.add("active"); // add active class to search bar when user input a text 
        let xhr = new XMLHttpRequest();  // create xhr object
        xhr.open("POST", "php/search.php", true); // open xhr file
        xhr.onload = () =>  // if xhr loading done
        {
            if(xhr.readyState === XMLHttpRequest.DONE)  // request done
            {
                if(xhr.status === 200)  // status code is 200
                {
                    let data = xhr.response; // xhr response 
                    usersList.innerHTML = data;
                }
            }
        }
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        // send searchTerm property with value searchTerm var
        xhr.send("searchTerm=" + searchTerm); 
    }
    else 
    {
        searchBar.classList.remove("active"); // remove active class when user away from search bar
    }
}

setInterval( () => { // setiap 0.5 detik, jalankan function dibawah..
    let xhr = new XMLHttpRequest();  // create xhr object
    xhr.open("GET", "php/users.php", true); // open xhr file
    xhr.onload = () =>  // if xhr loading done
    {
        if(xhr.readyState === XMLHttpRequest.DONE)  // request done
        {
            if(xhr.status === 200)  // status code is 200
            {
                let data = xhr.response; // xhr response 
                if(!searchBar.classList.contains("active")) // if search bar is not active/hidden / user away from search bar
                {
                    usersList.innerHTML = data; 
                }
            }
        }
    };
    xhr.send();
}, 500 );


// logout
logoutButton.onclick = () => {
    let xhr = new XMLHttpRequest();  // create xhr object
    xhr.open("GET", "php/logout.php", true); // open xhr file
    xhr.onload = () =>  // if xhr loading done
    {
        if(xhr.readyState === XMLHttpRequest.DONE)  // request done
        {
            if(xhr.status === 200)  // status code is 200
            {
                let data = xhr.response; // xhr response 
                location.href = "login.php";
            }
        }
    };
    xhr.send();
}

