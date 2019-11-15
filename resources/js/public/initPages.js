const main = document.querySelector("main");
const pageId = main.getAttribute("id");
require("./functions");

pageId === "main-page" && require("./pages/mainPage.js");
pageId === "about-page" && require("./pages/aboutPage.js");
pageId === "event-page" && require("./pages/eventPage.js");


// global script

