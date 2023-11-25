new DataTable("#table");

$(function () {
    $("#select-form").on("change", function () {
        window.location.href = "/research-forms/submissions?formId=" + $(this).val();
    });

    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
});
