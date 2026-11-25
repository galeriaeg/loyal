function renderizarDivs() {
  const qtde = 20;
  const container = document.getElementById("container");

  if (!container) return;

  container.replaceChildren();

  const fragment = document.createDocumentFragment();

  for (let i = 1; i <= qtde; i++) {
    const div = document.createElement("div");
    div.className = "item-box";
    div.textContent = `${i}`;
    fragment.appendChild(div);
  }

  container.appendChild(fragment);
}

document.addEventListener("DOMContentLoaded", renderizarDivs);

function expande() {
  const dscCard = document.getElementById("dscCard");
  alert(dscCard);
  dscCard.style.display = "block";
}
