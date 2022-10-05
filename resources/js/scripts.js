/*!
    * Start Bootstrap - SB Admin v6.0.2 (https://startbootstrap.com/template/sb-admin)
    * Copyright 2013-2020 Start Bootstrap
    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
    */
(function ($)
{
    "use strict";
    // Active ckfinder
    $(document).on('click', '.ckfinder', function ()
    {
        let el = $(this);
        CKFinder.popup({
            selectActionFunction: function (fileUrl)
            {
                el.val(fileUrl);
            }
        });
    });

    // Active slider
    // $(".owl-carousel").owlCarousel({
    //     items: 3,
    //     itemsDesktop: [1199, 3],
    //     itemsDesktopSmall: [980, 2],
    //     itemsMobile: [600, 1],
    //     pagination: true,
    //     navigationText: true
    // });

    // Token
    let token = $("meta[name='csrf-token']").attr("content");

    // Handle ajax
    $(document).ajaxError(function (event, request, settings)
    {
        modalAlert("Đã có lỗi xảy ra, vùi lòng F5 lại trang & thử lại.");
    });
    $(document).ajaxSuccess(function (event, request, settings)
    {
        if (request.responseJSON && request.responseJSON.reload)
        {
            location.reload();
        }
    });

    // Add active state to sidbar nav links
    $("#layoutSidenav_nav .sb-sidenav a.nav-link").click(function ()
    {
        $("#layoutSidenav_nav .sb-sidenav a.nav-link").removeClass("active");
        $(this).addClass("active");
    });

    var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
    $("#layoutSidenav_nav .sb-sidenav a.nav-link").each(function ()
    {
        if (this.href === path)
        {
            $(this).addClass("active");
        }
    });

    // Toggle the side navigation
    $("#sidebarToggle").on("click", function (e)
    {
        e.preventDefault();
        $("body").toggleClass("sb-sidenav-toggled");
    });

    // Form submit
    $(".form-ajax").submit(function (e)
    {
        e.preventDefault();
        let url = $(this).attr('action');
        url = url ? url : window.location.href;
        let data = $(this).serializeArray();
        data.push({ name: '_token', value: token });
        $.ajax({
            method: "POST",
            url: url,
            data: data,
            success: function ()
            {
                modalAlert('Cập nhật thành công.');
            }
        });
    });

    // Add more row
    $(".add_row").click(function ()
    {
        let clone = $(this).closest(".card-body").find(".row:first-child").clone(),
            input = clone.find("input[type='text']"),
            hidden = clone.find("input[type='hidden']");

        hidden.val(0);
        input.val("");
        input.attr("disabled", false);
        $(this).closest(".card-body").find(".form-input").append(clone);
    });

    // Delete row
    $(document).on("click", ".delete_row", function ()
    {
        $(this).closest(".row").remove();
    });

    // Handle form-toggle
    $(".form-toggle").change(function ()
    {
        $(this).closest("form").toggleClass("disabled", !$(this).prop("checked"));
    });

})(jQuery);

