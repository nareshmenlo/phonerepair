function imgError(image) {
    image.onerror = "";
    image.src = base_url+"assets/img/noimage.png";
    return true;
}

function adminimgError(image) {
    image.onerror = "";
    image.src = base_url+"assets/img/adminnoimage.png";
    return true;
}
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah')
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}