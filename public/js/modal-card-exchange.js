document.addEventListener("DOMContentLoaded", function () {
    const modal = document.querySelector(".modal");
    const iconClose = document.querySelector(".modal__header i");
    const hiddenInputCardUser = document.querySelector(
        'input[name="idCardUser"]'
    );
    const hiddenInputMyUser = document.querySelector('input[name="idMyCard"]');
    const exchangeBtns = document.querySelectorAll(
        ".card-exchange.open-modal-btn"
    );
    const btnClose = document.querySelector(".modal__footer button");

    exchangeBtns.forEach((btn) => {
        btn.addEventListener("click", function (event) {
        event.preventDefault();
        const cardUserId = this.getAttribute("data-card-user");
        const cardMyId = this.getAttribute("data-my-card");

        if (cardUserId) {
            hiddenInputCardUser.value = cardUserId;
            modal.classList.remove("hide");
        } else if (cardMyId) {
            hiddenInputMyUser.value = cardMyId;
            const form = this.closest("form");
            form.submit();
        }
        });
    });

    iconClose.addEventListener("click", function () {
        modal.classList.add("hide");
        hiddenInputCardUser.value = "";
    });

    btnClose.addEventListener("click", function () {
        modal.classList.add("hide");
        hiddenInputCardUser.value = "";
    });

    modal.addEventListener("click", function (e) {
        modal.classList.add("hide");
        hiddenInputCardUser.value = "";
    });

    const statusMessage = document.querySelector(".status-message");
    if (statusMessage) {
        setTimeout(() => {
        statusMessage.classList.add("hide");
        }, 5000);
    }
});
