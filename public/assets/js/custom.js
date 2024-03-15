$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});

function buttons(button, type) {
    if (type == "start") {
        $(".spinner").show();
        $("#close-button").attr("disabled", "true");
        $("#" + button).attr("disabled", "true");
    }
    if (type == "finish") {
        $(".spinner").hide();
        $("#close-button").removeAttr("disabled");
        $("#" + button).removeAttr("disabled");
    }
}

//  for sweetalert
const toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 5000,
});
