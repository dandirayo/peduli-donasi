$(document).ready(function (){

    $('#searchBusinessText').on( "keypress", function(event) {
        if (event.which == 13 && !event.shiftKey) {
            event.preventDefault();
            searchBusiness();
        }
    });

    appendSearchText();
    checkURL();
    urlCategory();

});

function appendSearchText(){
    let url = window.location.href;
    const urlParams = new URLSearchParams(window.location.search);
    let search = '';
    if(urlParams.has('search'))
    {
        search = getUrlParameter('search');
        $("#searchBusinessText").val(search);
    }
}

function getUrlParameter(sParam) {
    let sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
    return false;
};

function searchBusiness(){
    let searchText = $('#searchBusinessText').val();
    let url = window.location.origin + "/donasi";
    let modified = '?search=' + searchText;

    if(searchText==""){
        window.location = url;
    }
    else window.location = url + modified;

}
