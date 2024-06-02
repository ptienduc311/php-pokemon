var btnOpen = document.querySelector(".open-modal-btn");
var modal = document.querySelector(".modal");
var iconClose = document.querySelector(".modal__header i");
var btnClose = document.querySelector(".modal__footer button");

function toggleModal(e) {
  modal.classList.toggle("block");
}

btnOpen.addEventListener("click", toggleModal);
btnClose.addEventListener("click", toggleModal);
iconClose.addEventListener("click", toggleModal);
modal.addEventListener("click", function (e) {
  if (e.target === e.currentTarget) toggleModal(e);
});

document.addEventListener("DOMContentLoaded", function () {
  const statusMessage = document.querySelector(".status-message");
  if (statusMessage) {
    setTimeout(() => {
      statusMessage.classList.add("hide");
      setTimeout(() => {
        location.reload();
      }, 1000);
    }, 3000);
  }
});
