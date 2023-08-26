let searchIpt = document.querySelector("#searchIpt");
let searchSubmit = document.querySelector("#searchSubmit");
let searchForm = document.querySelector("#searchForm");

searchSubmit.addEventListener('click', function(e){
    e.preventDefault();
    if(searchIpt.value.trim() !== "")
    {
        searchForm.submit();
    }
})