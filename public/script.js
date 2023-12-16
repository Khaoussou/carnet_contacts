let open = document.querySelector(".open-modal");
let modal = document.querySelector(".modal");
let modal1 = document.querySelector(".modal1");
let cancel = document.querySelector(".cancel");
let cancel1 = document.querySelector(".cancel1");
let select = document.querySelector("#select");
let filtrer = document.querySelector("#filtrer");
let form = document.querySelector("#edit-form");
let valeurInput = document.querySelector("#valeur-a-filtrer");
let contacts = document.querySelectorAll(".contact");
let tBody = document.querySelector("tbody");
let tabContact;
const url = "http://localhost:8000/";

async function getData(url) {
  let data = await fetch(url);
  let d = await data.json();
  return d;
}

function creatingElement(elName, attributs, elementContent) {
  const element = document.createElement(elName);
  for (const cle in attributs) {
    element.setAttribute(cle, attributs[cle]);
  }
  element.textContent = elementContent;
  return element;
}

function getValue(select) {
  return select.options[select.selectedIndex].value;
}

function getName(select) {
  return select.options[select.selectedIndex].innerHTML;
}

function createTr(data) {
  tBody.innerHTML = "";
  data.forEach((d) => {
    let tr = creatingElement("tr", { class: "contact", id: d.id });
    let nom = creatingElement("td", {}, d.nom);
    let prenom = creatingElement("td", {}, d.prenom);
    let libelle = creatingElement("td", {}, d.libelle);
    tr.append(nom, prenom, libelle);
    tBody.append(tr);
  });
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

cancel1.addEventListener("click", () => {
  modal1.style.display = "none";
});

let valueSelect;
valeurInput.disabled = true;
filtrer.style.display = "none";
select.addEventListener("change", () => {
  valueSelect = getValue(select);
  valeurInput.disabled = false;
  filtrer.style.display = "block";
  console.log(valueSelect);
});

valeurInput.addEventListener("change", () => {
  if (valueSelect == "nom") {
    tabContact = contactsData.filter(
      (contact) => contact.nom.toLowerCase() == valeurInput.value.toLowerCase()
    );
    createTr(tabContact);
  }
  if (valueSelect == "prenom") {
    tabContact = contactsData.filter(
      (contact) =>
        contact.prenom.toLowerCase() == valeurInput.value.toLowerCase()
    );
    createTr(tabContact);
  }
  if (valueSelect == "categorie") {
    tabContact = contactsData.filter(
      (contact) =>
        contact.libelle.toLowerCase() == valeurInput.value.toLowerCase()
    );
    createTr(tabContact);
  }
});

contacts.forEach((contact) => {
  contact.addEventListener("click", () => {
    modal1.style.display = "flex";
    let nom = document.getElementById("nom");
    let prenom = document.getElementById("prenom");
    let categorie = document.getElementById("cat");
    let idContact = contact.getAttribute("id");
    let findContact = tabContact.find((contact) => contact.id == +idContact);
    nom.value = findContact.nom;
    prenom.value = findContact.prenom;
    categorie.options[categorie.selectedIndex].innerText = findContact.libelle;
  });
});
