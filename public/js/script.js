function copyToClipboard(target, msg) {
    const textContent = document.querySelector(target).textContent;
    navigator.clipboard.writeText(textContent);
    window.alert(msg);
}

function disabledSubmit(target) {
    const btn = document.querySelector(target);
    btn.setAttribute("disabled", true);
    btn.innerHTML = "Loading ...";
}
