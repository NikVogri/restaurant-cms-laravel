$(document).on("click", "button[data-id]", function(e) {
    const itemId = $(this).attr("data-id");

    $.ajax({
        method: "POST",
        url: "/cart/" + itemId + "/store",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        }
    }).done(function() {
        console.log("Item added to cart");
    });
});
