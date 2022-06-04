require("./bootstrap");
import Turbolinks from "turbolinks";
Turbolinks.start();
document.addEventListener("turbolinks:load", function (event) {
    window.livewire.restart();
});
