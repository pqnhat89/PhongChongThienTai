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
                    location.href = '/?s=' + searchInput.val()
                )
                :
                (
                    searchInput.val("")
                )
            )
    });

    var catSearchBtn = $('#cat_search'),
        catClrBtn = $('#cat_clear'),
        txtSearch = $('#txtSearchText');
    if (catClrBtn || catSearchBtn) {
        catClrBtn.on('click', function (e) {
            e.preventDefault();
            txtSearch.val('')
        });

        catSearchBtn.on('click', function (e) {
            e.preventDefault();
            var s = txtSearch.val();
            if (!isEmpty(s)) {
                $('#form_cat_search').submit()
            } else {
                txtSearch.val('')
            }
        });
    }
});
