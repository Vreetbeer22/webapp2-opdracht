document.getElementById("loginLink").onclick = function(event) {
    event.preventDefault();
    document.getElementById("loginModal").style.display = "block";
};

document.querySelector(".close").onclick = function() {
    document.getElementById("loginModal").style.display = "none";
};

window.onclick = function(event) {
    if (event.target === document.getElementById("loginModal")) {
        document.getElementById("loginModal").style.display = "none";
    }
};