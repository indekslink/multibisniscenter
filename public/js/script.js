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

$("input.with-preview").on("change", function (e) {
    const target = e.target.getAttribute("data-target");
    const [file] = e.target.files;
    if (file) {
        $(target).attr("src", URL.createObjectURL(file));
    }
});
