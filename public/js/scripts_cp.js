function isEmpty(str) {
    return (!str || str.trim().length === 0 );
}

$(document).ready(function () {
    $(".navbar-nav.sm-collapsible .caret").click(function (e) {
        e.preventDefault()
    }),
    $('[data-toggle="tooltip"]').length &&
    $('[data-toggle="tooltip"]').tooltip(),
    $('<span class="search-toggle-icon"></span>').insertAfter(".search a.SearchButton");
    var searchBox = $(".search"),
        searchToggleIcon = $(".search-toggle-icon"),
        searchInput = $(".search .searchInputContainer input"),
        searchActive = false;
    searchToggleIcon.click(function (event) {
        event.stopPropagation();
        !searchActive
            ?
            (
                searchBox.addClass("search-open"),
                searchInput.focus(),
                searchActive = true
            )
            :
            (
                searchBox.removeClass("search-open"),
                searchInput.focusout(),
                $(".search").css({ "overflow": "hidden" }),
                searchActive = false,
                !isEmpty(searchInput.val())
                ?
                (
                    $('#search_form').submit()
                )
                :
                (
                    searchInput.val("")
                )
            )
    })
});
