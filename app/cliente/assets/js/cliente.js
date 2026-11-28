//teste
function expandir() {
  const el = document.getElementById("details");
  const icon = document.getElementById("icon");

  if (!el) return;

  if (el.style.display === "none") {
    el.style.display = "block";
    icon.style.rotate = "269deg";
  } else {
    el.style.display = "none";
    icon.style.rotate = "90deg";
  }
}
