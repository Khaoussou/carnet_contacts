let open = document.querySelector(".open-modal");
let modal = document.querySelector(".modal");
let cancel = document.querySelector(".cancel");
let select = document.querySelector("#select");
let valeurInput = document.querySelector("#valeur-a-filtrer");
let tabContact;
const url = "http://localhost:8000/";

async function getData(url) {
  let data = await fetch(url);
  let d = await data.json();
  return d;
}

function getValue(select) {
  return select.options[select.selectedIndex].value;
}

document.addEventListener("DOMContentLoaded", () => {
  tabContact = contactsData;
});

open.addEventListener("click", () => {
  modal.style.display = "flex";
});

cancel.addEventListener("click", () => {
  modal.style.display = "none";
});

let valueSelect;
select.addEventListener("change", () => {
  valueSelect = getValue(select);
  console.log(contactsData);
  console.log(valueSelect);
});

valeurInput.addEventListener("change", () => {
  if (valueSelect == "nom") {
    let bap = tabContact.filter(
      (contact) => contact.nom.toLowerCase() == valeurInput.value.toLowerCase()
    );
    console.log(bap);
  }
  if (valueSelect == "prenom") {
    let bap = tabContact.filter(
      (contact) =>
        contact.prenom.toLowerCase() == valeurInput.value.toLowerCase()
    );
    console.log(bap);
  }
  if (valueSelect == "categorie") {
    let bap = tabContact.filter(
      (contact) => contact.categorie == valeurInput.value
    );
    console.log(bap);
  }
});


