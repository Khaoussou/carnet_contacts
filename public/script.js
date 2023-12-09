let open = document.querySelector(".open-modal");
let modal = document.querySelector(".modal");
let modal1 = document.querySelector(".modal1");
let cancel = document.querySelector(".cancel");
let add = document.querySelector("#add-contact");
let contact = document.querySelector(".contact");
const url = "http://localhost:8000/";

async function getData(url) {
  let data = await fetch(url);
  let d = await data.json();
  return d;
}

// fetch("ajax.php")
//   .then((res) => res.json())
//   .then((data) => {
//     // data contient les contacts
//     data.forEach((contact) => {
//       let row = `
//           <tr>
//             <td>${contact.nom}</td>
//             ...
//           </tr>
//         `;

//       document.querySelector("tbody").innerHTML += row;
//     });
//   });

open.addEventListener("click", () => {
  modal.style.display = "flex";
});

cancel.addEventListener("click", () => {
  modal.style.display = "none";
});

contact.addEventListener("click", () => {
  modal1.style.display = "flex";
});
