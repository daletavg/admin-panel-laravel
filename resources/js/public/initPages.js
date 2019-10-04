const main = document.querySelector("main");
const pageId = main.getAttribute("id");
require("./functions");

pageId === "main-page" && require("./pages/instaSlider.js");
pageId === "main-page" && require("./pages/mainPage.js");
pageId === "services" && require("./pages/services");
pageId === "stock" && require("./pages/stock");
pageId === "price" && require("./pages/price");
pageId === "contacts" && require("./pages/contacts");
pageId === "documents" && require("./pages/documents");


// global script

