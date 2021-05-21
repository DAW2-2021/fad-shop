function previewImage(id) {
    var file = $('#' + id).get(0).files[0]

    if (file) {
        var reader = new FileReader()

        reader.onload = function () {
            $('#' + id + '-show').attr('src', reader.result)
        }

        reader.readAsDataURL(file)
    }
}
