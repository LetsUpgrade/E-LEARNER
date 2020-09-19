let superheroes = []

function display(superarray) {
    let tabledata = "";
    superarray.forEach(function(superhero,index) {
        let currentrow=`<tr>
        <td>${index+1}</td>
        <td>${superhero.tech}</td>
        <td>${superhero.ques}</td>
        <td>${superhero.desc}</td>
        <td>${superhero.ans}</td>
        <td>${superhero.link}</td>
     
        <button onclick="showModal(${index})">update</button></td>
        </tr>`;

        tabledata += currentrow;     
    });

    document.getElementsByClassName('tdata')[0].innerHTML = tabledata;
// document.getElementById('tdata').innerHTML = tabledata;
}

display(superheroes);

function addQuery(event) {
    event.preventDefault();
    let superhero={};
    let tech=document.getElementById('tech').value;
    let ques=document.getElementById('ques').value;
    let desc=document.getElementById('desc').value;
    // let name=document.getElementById('name').value;
    // let mail=document.getElementById('mail').value;
    let ans=document.getElementById('ans').value;
    let link=document.getElementById('link').value;
    //let quer=document.getElementById('quer').value;
    superhero.tech = tech
    superhero.ques = ques
    superhero.desc = desc
    // superhero.name = name
    // superhero.mail = mail
    superhero.ans = ans
    superhero.link = link
    superhero.quer = quer

    superheroes.push(superhero);

    display(superheroes);

    document.getElementById('tech').value="";
    document.getElementById('ques').value="";
    document.getElementById('desc').value="";
    // document.getElementById('name').value="";
    // document.getElementById('mail').value="";
    document.getElementById('ans').value="";
    document.getElementById('link').value="";
    //document.getElementById('quer').value="";

}

function searchByTech() {
    let searchValue = document.getElementById('searchTech').value;
    
    let newdata = superheroes.filter(function(superhero) {
        return (
            superhero.tech.toUpperCase().indexOf(searchValue.toUpperCase()) !=-1
        );
    });

    display(newdata);

}

function deleteQuery(index) {
    superheroes.splice(index,1);
    display(superheroes);
}

let updateIndex;

function copySuperhero(index) {
    updateIndex = index;

    let superhero = superheroes[index];
    document.getElementById('uptech').value = superhero.tech;
    document.getElementById('upques').value = superhero.ques;
    document.getElementById('updesc').value = superhero.desc;
    // document.getElementById('upname').value = superhero.name;
    // document.getElementById('upmail').value = superhero.mail;
    document.getElementById('upans').value = superhero.ans;
    document.getElementById('uplink').value = superhero.link;
    //document.getElementById('upquer').value = superhero.quer;

}

function updateQuery(e) {

    e.preventDefault();
    let superhero = superheroes[updateIndex];
    console.log(superhero);
    let tech=document.getElementById('uptech').value;
    let ques=document.getElementById('upques').value;
    let desc=document.getElementById('updesc').value;
    let name=document.getElementById('upname').value;
    let mail=document.getElementById('upmail').value;
    let ans=document.getElementById('upans').value;
    let link=document.getElementById('uplink').value;
    let quer=document.getElementById('upquer').value;
    superhero.tech = tech;
    superhero.ques = ques;
    superhero.desc = desc;
    superhero.name = name;
    superhero.mail = mail;
    superhero.ans = ans;
    superhero.link = link;
    superhero.quer = quer;
    console.log(superhero);

    display(superheroes);
    // code for hiding from anywhere
    let modal = document.getElementsByClassName('modal')[0];
        modal.style.display="none";
}

function showModal(index) {
    let modal = document.getElementsByClassName('modal')[0];
    modal.style.display="block";

    copySuperhero(index);
}

function hideModal(event) {
    if (event.target.className == "modal") {  
        let modal = document.getElementsByClassName('modal')[0];
        modal.style.display="none";
    }
}