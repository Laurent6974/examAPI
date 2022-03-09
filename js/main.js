const content = document.querySelector(".content");
const form = document.querySelector("form");

form.addEventListener("submit", function(e) {
    e.preventDefault();
    create({nom: this.nom.value, adresse: this.adresse.value, ville: this.ville.value});
    form.reset();
})

function showAll() {
    fetch("http://localhost/apiexamphp/?type=cinemas&action=index")
        .then((res) => res.json())
        .then((cinema) => {
            content.innerHTML = "";
            restaurants.forEach((cinema) => {
                console.log(cinema);
                content.innerHTML += templateCinema(cinema);
                content.querySelector(".delBtn").addEventListener("click", function() {
                    suppr({id: this.id})
                });
            });
        })
}

const newCine = (body) => {
    fetch("http://localhost/apiexamphp/?type=cinemas&action=new", {
        method:"POST",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify(body)})
        .then((res)=>res.json()).then(data=>{
        console.log(data);
        showAll();
    });
};


const suppr = (id) => {

    fetch("http://localhost/apiexamphp/?type=cinema&action=suppr", {
        method: "DELETE",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify(id),
    })
        .then((res)=>res.json())
        .then((data)=> {
            console.log(data)
            showAll();
        })
}

