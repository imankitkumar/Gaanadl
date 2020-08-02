const form = document.querySelector("form")
const results_container = document.querySelector("#results")
const searchUrl = "./search.php?q=";

function handleOnSubmit(event) {
    event.preventDefault(); // stop page changing to #, which will reload the page

    const query = form.querySelector("input").value.trim()

    if(query.length > 0) {
        doSearch(query);
    }
}

form.onsubmit = handleOnSubmit;


async function doSearch(query) {

    results_container.innerHTML = `<span class="loader">Searching</span>`;

    const response = await fetch(searchUrl + query);
    const json = await response.json();

    let results = [];

    for(let track of json) {
        results.push(`<a href="./${track.Main_URL}" class="track"><img src="${track.Pic_URL}"> <span>${track.Title}</span></a>`);
    }

    results_container.innerHTML = results.join(' ');

}
